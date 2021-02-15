<?php

namespace App\Service;

use App\Entity\RepairOrderQuote;
use App\Entity\RepairOrderQuoteRecommendation;
use App\Repository\OperationCodeRepository;
use App\Repository\PriceMatrixRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\ORMException;
use Symfony\Component\Security\Core\Security;
use Exception;

/**
 * Class RepairOrderQuoteHelper
 *
 * @package App\Service
 */
class RepairOrderQuoteHelper
{
    /** @var string[] */
    private const REQUIRED_FIELDS = [
        'operationCode',
        'description',
        'preApproved',
        'approved',
        'partsPrice',
        'suppliesPrice',
        // 'laborPrice',
    ];

    private const NOT_REQUIRED_FIELDS = [
        'notes',
    ];

    private $em;
    private $security;
    private $operationCodeRepository;
    private $pricingLaborRate;
    private $isPricingMatrix;
    private $pricingLaborTax;
    private $pricingPartsTax; 
    private $priceRepository;
    

    public function __construct( EntityManagerInterface $em, OperationCodeRepository $operationCodeRepository, 
                                SettingsHelper $settingsHelper, PriceMatrixRepository $priceRepository , Security $security)
    {
        $this->em = $em;
        $this->operationCodeRepository = $operationCodeRepository;
        $this->security = $security;
        $this->priceRepository  = $priceRepository;

        $this->pricingLaborRate = $settingsHelper->getSetting("pricingLaborRate");
        $this->isPricingMatrix  = $settingsHelper->getSetting('pricingUseMatrix') * 0.01;
        $this->pricingLaborTax  = $settingsHelper->getSetting("pricingLaborTax") * 0.01;
        $this->pricingPartsTax  = $settingsHelper->getSetting("pricingPartsTax") * 0.01;
    }

    /**
     * @throws Exception
     */
    public function validateRecommendationsJson(array $params)
    {
        foreach ($params as $recommendation) {
            if (!is_object($recommendation)) {
                throw new Exception('Recommendations data is invalid');
            }

            $fields = [];
            foreach ($recommendation as $field => $value) {
                array_push($fields, $field);
                $fields[$field] = $value;
            }

            foreach (self::REQUIRED_FIELDS as $field) {
                if (!isset($fields[$field])) {
                    throw new Exception($field.' is missing in recommendations json');
                } else {
                    if ($fields[$field] === '') {
                        throw new Exception($field.' has no value in recommendations json');
                    }

                    if ($field == 'partsPrice' || $field == 'suppliesPrice') {
                        if (!is_numeric($fields[$field])) {
                            throw new Exception($field.' has invalid value in recommendations json');
                        }
                    }
                }
            }

            // These are required to be set but not required to have a value
            foreach (self::NOT_REQUIRED_FIELDS as $field) {
                if (!isset($fields[$field])) {
                    throw new Exception($field.' is missing in recommendations json');
                }
            }
        }
    }

    /**
     * Ties recommendations to a quote then deletes the old ones.
     *
     * @throws Exception
     */
    public function buildRecommendations(RepairOrderQuote $repairOrderQuote, array $recommendations)
    {
        foreach ($recommendations as $recommendation) {
            $repairOrderQuoteRecommendation = new RepairOrderQuoteRecommendation();

            // Check if Operation Code exists
            $operationCode = $this->operationCodeRepository->findOneBy(['id' => $recommendation->operationCode]);
            if (!$operationCode) {
                throw new Exception('Invalid operationCode Parameter in recommendations JSON');
            }

            // Remove previous recommendations
            foreach ($repairOrderQuote->getRepairOrderQuoteRecommendations() as $oldRecommendation) {
                $this->em->remove($oldRecommendation);
            }

            $repairOrderQuoteRecommendation->setRepairOrderQuote($repairOrderQuote)
                                           ->setOperationCode($operationCode)
                                           ->setDescription($recommendation->description)
                                           ->setPreApproved(
                                               filter_var($recommendation->preApproved, FILTER_VALIDATE_BOOLEAN)
                                           )
                                           ->setApproved(
                                               filter_var($recommendation->approved, FILTER_VALIDATE_BOOLEAN)
                                           )
                                           ->setPartsPrice($recommendation->partsPrice)
                                           ->setSuppliesPrice($recommendation->suppliesPrice)
                                           ->setNotes($recommendation->notes);
                                           
            if ( $this->security->isGranted('ROLE_CUSTOMER') ){
                $partsPrice    = $recommendation->partsPrice;
                $suppliesPrice = $recommendation->suppliesPrice;
                $laborAndTax   = $this->getLaborAndTax($partsPrice, $suppliesPrice, $operationCode);
               
                $repairOrderQuoteRecommendation->setLaborPrice($laborAndTax['laborPrice'])
                                               ->setLaborTax($laborAndTax['laborTax'])
                                               ->setPartsTax($laborAndTax['partsTax'])
                                               ->setSuppliesTax($laborAndTax['suppliesTax']);
            }

            $this->em->persist($repairOrderQuoteRecommendation);
            $this->em->beginTransaction();

            try {
                $this->em->flush();
                $this->em->commit();
            } catch (ORMException | Exception $e) {
                $this->em->rollback();

                throw new Exception($e->getMessage());
            }
        }
    }

    public function getLaborAndTax($partsPrice, $suppliesPrice, $operationCode){
        $laborPrice        = null;
        $laborTax          = 0;
        $partsTax          = 0;
        $suppliesTax       = 0;
        $hours             = $operationCode->getLaborHours();

        if($this->isPricingMatrix){
            $laborPrice    = $this->priceRepository->getPrice($hours);
        }

        if( is_null( $laborPrice) ) {
            $laborPrice    = $hours * $this->pricingLaborRate;
        }

        if($operationCode->getLaborTaxable()){
            $laborTax       = $laborPrice * $this->pricingLaborTax;  
        }

        if($operationCode->getPartsTaxable()){
            $partsTax      = $partsPrice * $this->pricingPartsTax;
        }

        if($operationCode->getSuppliesTaxable()){
            $suppliesTax   = $suppliesPrice * $this->pricingPartsTax;
        }

        return [
            'laborPrice'  => $laborPrice,
            'laborTax'    => $laborTax,
            'partsTax'    => $partsTax,
            'suppliesTax' => $suppliesTax
        ];
    }

    /**
     * @param RepairOrderQuote $quote
     */
    public function calculateLaborAndTax(RepairOrderQuote $quote)
    {
        $newQuote = $quote;

        if($quote && $quote->getRepairOrderQuoteRecommendations() && $quote->getRepairOrderQuoteRecommendations()){
            $recommendations       = $quote->getRepairOrderQuoteRecommendations();
            
            if(count($recommendations) > 0)
            {
                foreach($recommendations as $index =>$recommendation){
                    $operationCode = $recommendation->getOperationCode();
                    $partsPrice    = $recommendation->getPartsPrice();
                    $suppliesPrice = $recommendation->getSuppliesPrice();
                    $laborAndTax   = $this->getLaborAndTax($partsPrice, $suppliesPrice, $operationCode );
                    
                    $newQuote->getRepairOrderQuoteRecommendations()[$index]->setLaborPrice($laborAndTax['laborPrice'])
                                                                           ->setLaborTax($laborAndTax['laborTax'])
                                                                           ->setPartsTax($laborAndTax['partsTax'])
                                                                           ->setSuppliesTax($laborAndTax['suppliesTax']);
                }
            }
        }

        return $newQuote;
    }
}
