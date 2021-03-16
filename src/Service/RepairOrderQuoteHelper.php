<?php

namespace App\Service;

use App\Entity\RepairOrderQuote;
use App\Entity\RepairOrderQuoteRecommendation;
use App\Entity\RepairOrderQuoteRecommendationPart;
use App\Repository\OperationCodeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\ORMException;
use Exception;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
/**
 * Class RepairOrderQuoteHelper
 *
 * @package App\Service
 */
class RepairOrderQuoteHelper
{
    /** @var string[] */
    private const RECOMMENDATION_REQUIRED_FIELDS = [
        'operationCode',
        'description',
        'preApproved',
        'approved',
        'partsPrice',
        'suppliesPrice',
        'laborPrice',
    ];
    private const PART_REQUIRED_FIELDS = [
        'number',
        'description',
        'price',
        'quantity',
    ];

    private const NOT_REQUIRED_FIELDS = [
        'notes',
    ];

    private $em;
    private $operationCodeRepository;

    public function __construct(EntityManagerInterface $em, OperationCodeRepository $operationCodeRepository)
    {
        $this->em = $em;
        $this->operationCodeRepository = $operationCodeRepository;
    }

    /**
     * @throws Exception
     */
    public function validatePartsJson(array $params)
    {
        foreach ($params as $part) {
            if (!is_object($part)) {
                throw new Exception('Part data is invalid');
            }

            $fields = [];
            foreach ($part as $field => $value) {
                array_push($fields, $field);
                $fields[$field] = $value;
            }

            foreach (self::PART_REQUIRED_FIELDS as $field) {
                if (!isset($fields[$field])) {
                    throw new Exception($field.' is missing in parts json');
                } else {
                    if ($fields[$field] === '') {
                        throw new Exception($field.' has no value in parts json');
                    }

                    if ($field == 'price' || $field == 'quantity') {
                        if (!is_numeric($fields[$field])) {
                            throw new Exception($field.' has invalid value in parts json');
                        }
                    }
                }
            }
        }
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
            
            if(property_exists($recommendation, "parts"))
                $this->validatePartsJson($recommendation->parts);

            $fields = [];
            foreach ($recommendation as $field => $value) {
                array_push($fields, $field);
                $fields[$field] = $value;
            }

            foreach (self::RECOMMENDATION_REQUIRED_FIELDS as $field) {
                if (!isset($fields[$field])) {
                    throw new Exception($field.' is missing in recommendations json');
                } else {
                    if ($fields[$field] === '') {
                        throw new Exception($field.' has no value in recommendations json');
                    }

                    if ($field == 'partsPrice' || $field == 'suppliesPrice' || $field == 'laborPrice') {
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

            $repairOrderQuote->addRepairOrderQuoteRecommendation($repairOrderQuoteRecommendation);
            $this->em->persist($repairOrderQuote);

            $this->em->beginTransaction();

            try {
                $this->em->flush();
                $this->em->getConnection()->commit();
                
            } catch (ORMException | Exception $e) {
                $this->em->rollback();

                throw new Exception($e->getMessage());
            }
            
            if(property_exists($recommendation, "parts")){
                $this->buildParts($repairOrderQuoteRecommendation, $recommendation->parts);
            }
        }
    }

        /**
     * Ties parts to a recommendation then deletes the old ones.
     *
     * @throws Exception
     */
    public function buildParts(RepairOrderQuoteRecommendation $repairOrderQuoteRecommendation, array $parts)
    {
        foreach ($parts as $part) {
            $repairOrderQuoteRecommendationPart = new RepairOrderQuoteRecommendationPart();

            $repairOrderQuoteRecommendationPart->setRepairOrderRecommendation($repairOrderQuoteRecommendation)
                               ->setNumber($part->number)
                               ->setDescription($part->description)
                               ->setprice($part->price)
                               ->setQuantity($part->quantity);

            $this->em->persist($repairOrderQuoteRecommendationPart);

            $repairOrderQuoteRecommendation->addRepairOrderQuoteRecommendationPart($repairOrderQuoteRecommendationPart);
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
}
