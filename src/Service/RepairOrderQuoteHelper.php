<?php

namespace App\Service;

use App\Entity\RepairOrderQuote;
use App\Entity\RepairOrderQuoteRecommendation;
use App\Repository\OperationCodeRepository;
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

    public function __construct(EntityManagerInterface $em, OperationCodeRepository $operationCodeRepository)
    {
        $this->em = $em;
        $this->operationCodeRepository = $operationCodeRepository;
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
}
