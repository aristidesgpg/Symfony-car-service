<?php

namespace App\Service;

use App\Entity\RepairOrderQuote;
use App\Entity\RepairOrderQuoteRecommendation;
use App\Repository\OperationCodeRepository;
use App\Repository\PriceMatrixRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\ORMException;
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
    private $operationCodeRepository;
    private $settingsHelper;
    private $priceRepository;

    public function __construct( EntityManagerInterface $em, OperationCodeRepository $operationCodeRepository, 
                                SettingsHelper $settingsHelper, PriceMatrixRepository $priceRepository )
    {
        $this->em = $em;
        $this->operationCodeRepository = $operationCodeRepository;
        $this->settingsHelper  = $settingsHelper;
        $this->priceRepository = $priceRepository;
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

    /**
     * @param RepairOrder $ro
     */
    public function calculateLaborPrice(RepairOrderQuote $quote)
    {
        if($quote && $quote->getRepairOrderQuoteRecommendations() && $quote->getRepairOrderQuoteRecommendations()){
            $recommendations            = $quote->getRepairOrderQuoteRecommendations();
            
            if(count($recommendations) > 0)
            {
                $labor_price            = 0;
                $pricingLaborRate       = $this->settingsHelper->getSetting("pricingLaborRate");

                foreach($recommendations as $index =>$recommendation){
                    $hours              = $recommendation->getOperationCode()->getLaborHours();

                    if($this->settingsHelper->getSetting('pricingUseMatrix')){
                        $labor_price    = $this->priceRepository->getPrice($hours);
                        
                        if( is_null( $labor_price ) ) {
                           $labor_price = $hours * $pricingLaborRate;
                        } 
                    }
                    else{
                        $labor_price    = $hours * $pricingLaborRate;
                    }

                    $isLaborTaxable     = $recommendation->getOperationCode()->getLaborTaxable();

                    if($isLaborTaxable){
                       $labor_tax       = $labor_price * $this->settingsHelper->getSetting("pricingLaborTax") * 0.01;  
                    }
                    else{
                        $labor_tax      = 0;
                    }

                    if($recommendation->getOperationCode()->getPartsTaxable()){
                        $parts_tax      = $recommendation->getPartsPrice() * $this->settingsHelper->getSetting("pricingPartsTax") * 0.01;
                    }
                    else{
                        $parts_tax      = 0;
                    }

                    if($recommendation->getOperationCode()->getSuppliesTaxable()){
                        $supplies_tax   = $recommendation->getSuppliesPrice() * $this->settingsHelper->getSetting("pricingPartsTax") * 0.01;
                    }
                    else{
                        $supplies_tax   = 0;
                    }

                    $quote->getRepairOrderQuoteRecommendations()[$index]->setLaborPrice($labor_price)
                                                                        ->setLaborTax($labor_tax)
                                                                        ->setPartsTax($parts_tax)
                                                                        ->setSuppliesTax($supplies_tax);
                }
            }
        }

        return $quote;
    }
}
