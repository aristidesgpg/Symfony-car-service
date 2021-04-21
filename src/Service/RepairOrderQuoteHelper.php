<?php

namespace App\Service;

use App\Entity\DMSResult;
use App\Entity\Part;
use App\Entity\RepairOrder;
use App\Entity\RepairOrderQuote;
use App\Entity\RepairOrderQuoteInteraction;
use App\Entity\RepairOrderQuoteRecommendation;
use App\Entity\RepairOrderQuoteRecommendationPart;
use App\Repository\OperationCodeRepository;
use App\Repository\PartRepository;
use App\Repository\PriceMatrixRepository;
use App\Repository\RepairOrderQuoteRecommendationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\ORMException;
use Exception;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Security\Core\Security;

class RepairOrderQuoteHelper
{
    /** @var string[] */
    private const RECOMMENDATION_REQUIRED_FIELDS = [
        'operationCode',
        'description',
        'preApproved',
        'partsPrice',
        'suppliesPrice',
        'laborPrice',
        'laborTax',
        'partsTax',
        'suppliesTax',
        'laborHours',
    ];
    private const COMPLETE_REQUIRED_FIELDS = [
        'repairOrderQuoteRecommendationId',
        'approved',
    ];
    private const RECOMMENDATION_NUMBER_FIELDS = [
        'partsPrice',
        'suppliesPrice',
        'laborPrice',
        'laborTax',
        'partsTax',
        'suppliesTax',
        'laborHours',
    ];
    private const PART_REQUIRED_FIELDS = [
        'number',
        'name',
        'price',
        'quantity',
    ];

    private const NOT_REQUIRED_FIELDS = [
        'notes',
    ];

    private const QUOTE_STATUSES = [
        'Not Started' => 0,
        'Advisor In Progress' => 1,
        'Technician In Progress' => 1,
        'Parts In Progress' => 1,
        'In Progress' => 1,
        'Sent' => 2,
        'Viewed' => 3,
        'Completed' => 4,
        'Confirmed' => 5,
    ];

    private $em;
    private $security;
    private $operationCodeRepository;
    private $partRepository;
    private $pricingLaborRate;
    private $isPricingMatrix;
    private $pricingLaborTax;
    private $pricingPartsTax;
    private $priceRepository;
    private $repairOrderQuoteRecommendationRepository;
    /**
     * @var SettingsHelper
     */
    private $settingsHelper;
    /**
     * @var RepairOrderQuoteLogHelper
     */
    private $repairOrderQuoteLogHelper;

    public function __construct(
        EntityManagerInterface $em,
        OperationCodeRepository $operationCodeRepository,
        SettingsHelper $settingsHelper,
        PriceMatrixRepository $priceRepository,
        partRepository $partRepository,
        Security $security,
        RepairOrderQuoteRecommendationRepository $repairOrderQuoteRecommendationRepository,
        RepairOrderQuoteLogHelper $repairOrderQuoteLogHelper
    ) {
        $this->em = $em;
        $this->operationCodeRepository = $operationCodeRepository;
        $this->security = $security;
        $this->priceRepository = $priceRepository;
        $this->partRepository = $partRepository;
        $this->repairOrderQuoteRecommendationRepository = $repairOrderQuoteRecommendationRepository;

        $this->pricingLaborRate = $settingsHelper->getSetting('pricingLaborRate');
        $this->isPricingMatrix = $settingsHelper->getSetting('pricingUseMatrix');
        $this->pricingLaborTax = $settingsHelper->getSetting('pricingLaborTax') * 0.01;
        $this->pricingPartsTax = $settingsHelper->getSetting('pricingPartsTax') * 0.01;
        $this->settingsHelper = $settingsHelper;
        $this->repairOrderQuoteLogHelper = $repairOrderQuoteLogHelper;
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
                    if ('' === $fields[$field]) {
                        throw new Exception($field.' has no value in parts json');
                    }

                    if ('price' == $field || 'quantity' == $field) {
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
    public function validateCompletedJson(array $params)
    {
        foreach ($params as $recommendation) {
            if (!is_object($recommendation)) {
                throw new Exception('Recommendation data is invalid');
            }

            $fields = [];
            foreach ($recommendation as $field => $value) {
                array_push($fields, $field);
                $fields[$field] = $value;
            }

            foreach (self::COMPLETE_REQUIRED_FIELDS as $field) {
                if (!isset($fields[$field])) {
                    throw new Exception($field.' is missing in recommendations json');
                } else {
                    if ('' === $fields[$field]) {
                        throw new Exception($field.' has no value in recommendations json');
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

            if (property_exists($recommendation, 'parts')) {
                $this->validatePartsJson($recommendation->parts);
            }

            $fields = [];
            foreach ($recommendation as $field => $value) {
                array_push($fields, $field);
                $fields[$field] = $value;
            }

            foreach (self::RECOMMENDATION_REQUIRED_FIELDS as $field) {
                if (!isset($fields[$field])) {
                    throw new Exception($field.' is missing in recommendations json');
                } else {
                    if ('' === $fields[$field]) {
                        throw new Exception($field.' has no value in recommendations json');
                    }

                    if (in_array($field, self::RECOMMENDATION_NUMBER_FIELDS)) {
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
    public function buildRecommendations(RepairOrderQuote $repairOrderQuote, array $recommendations, bool $wipeAll = true, bool $wipePreApproved = false)
    {
        // Remove previous recommendations
        if ($wipeAll) {
            foreach ($repairOrderQuote->getRepairOrderQuoteRecommendations() as $oldRecommendation) {
                $this->em->remove($oldRecommendation);
            }
        }
        if ($wipePreApproved) {
            foreach ($repairOrderQuote->getRepairOrderQuoteRecommendations() as $oldRecommendation) {
                if ($oldRecommendation->getPreApproved()) {
                    $this->em->remove($oldRecommendation);
                }
            }
        }

        foreach ($recommendations as $recommendation) {
            $repairOrderQuoteRecommendation = new RepairOrderQuoteRecommendation();
            // Check if Operation Code exists
            $operationCode = $this->operationCodeRepository->findOneBy(['code' => $recommendation->operationCode]);
            if (!$operationCode) {
                throw new Exception('Invalid operationCode Parameter in recommendations JSON');
            }

            $repairOrderQuoteRecommendation->setOperationCode($operationCode->getCode())
                                            ->setDescription($recommendation->description)
                                            ->setPreApproved(
                                                filter_var($recommendation->preApproved, FILTER_VALIDATE_BOOLEAN)
                                            )
                                            ->setLaborPrice($recommendation->laborPrice)
                                            ->setPartsPrice($recommendation->partsPrice)
                                            ->setSuppliesPrice($recommendation->suppliesPrice)
                                            ->setLaborTax($recommendation->laborTax)
                                            ->setPartsTax($recommendation->partsTax)
                                            ->setSuppliesTax($recommendation->suppliesTax)
                                            ->setLaborHours($recommendation->laborHours)
                                            ->setNotes($recommendation->notes);

            $repairOrderQuote->addRepairOrderQuoteRecommendation($repairOrderQuoteRecommendation);

            $this->em->persist($repairOrderQuoteRecommendation);

            if (property_exists($recommendation, 'parts')) {
                $this->buildParts($repairOrderQuoteRecommendation, $recommendation->parts);
            }
        }

        $this->em->beginTransaction();

        try {
            $this->em->flush();
            $this->em->commit();
        } catch (ORMException | Exception $e) {
            $this->em->rollback();

            throw new Exception($e->getMessage());
        }
    }

    /**
     * complete the repairOrderQuote.
     *
     * @throws Exception
     */
    public function completeRepairOrderQuote(RepairOrderQuote $repairOrderQuote, array $recommendations)
    {
        $subtotal = 0;
        $tax = 0;
        $repairOrderQuoteRecommendations = $repairOrderQuote->getRepairOrderQuoteRecommendations();

        foreach ($repairOrderQuoteRecommendations as $repairOrderQuoteRecommendation) {
            $currentRecommendation = '';

            foreach ($recommendations as $recommendation) {
                if ($recommendation->repairOrderQuoteRecommendationId === $repairOrderQuoteRecommendation->getId()) {
                    $currentRecommendation = $recommendation;
                    break;
                }
            }

            if ($repairOrderQuoteRecommendation->getPreApproved()) {
                if ($currentRecommendation && !filter_var($currentRecommendation->approved, FILTER_VALIDATE_BOOLEAN)) {
                    throw new Exception('The recommendation'.$repairOrderQuoteRecommendation->getId().' was pre-approved');
                }

                $repairOrderQuoteRecommendation->setApproved(true);
            } else {
                if (!$currentRecommendation) {
                    throw new Exception('Recommendation '.$repairOrderQuoteRecommendation->getId().' was not pre-approved, but it is missing');
                }

                $repairOrderQuoteRecommendation->setApproved(filter_var($currentRecommendation->approved, FILTER_VALIDATE_BOOLEAN));
            }

            if ($repairOrderQuoteRecommendation->getApproved()) {
                $subtotal += $repairOrderQuoteRecommendation->getLaborPrice()
                          + $repairOrderQuoteRecommendation->getPartsPrice()
                          + $repairOrderQuoteRecommendation->getSuppliesPrice();
                $tax += $repairOrderQuoteRecommendation->getLaborTax()
                     + $repairOrderQuoteRecommendation->getPartsTax()
                     + $repairOrderQuoteRecommendation->getSuppliesPrice();
            }

            $this->em->persist($repairOrderQuoteRecommendation);
        }

        $repairOrderQuote->setSubtotal($subtotal);
        $repairOrderQuote->setTax($tax);
        $repairOrderQuote->setTotal($subtotal + $tax);

        $this->em->beginTransaction();

        try {
            $this->em->flush();
            $this->em->commit();
        } catch (ORMException | Exception $e) {
            $this->em->rollback();

            throw new Exception($e->getMessage());
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

            $repairOrderQuoteRecommendation->addRepairOrderQuoteRecommendationPart($repairOrderQuoteRecommendationPart);

            $repairOrderQuoteRecommendationPart->setNumber($part->number)
                                               ->setName($part->name)
                                               ->setprice($part->price)
                                               ->setTotalPrice($part->quantity * $part->price)
                                               ->setQuantity($part->quantity);

            $newPart = $this->partRepository->findOneBy(['number' => $part->number]);
            if (!$newPart) {
                $newPart = new Part();

                $newPart->setNumber($part->number)
                        ->setName($part->name)
                        ->setPrice($part->price)
                        ->setBin($part->bin);

                $this->em->persist($newPart);
            }

            $repairOrderQuoteRecommendationPart->setPart($newPart);

            $this->em->persist($repairOrderQuoteRecommendationPart);
        }
        $this->em->persist($repairOrderQuoteRecommendation);
        $this->em->beginTransaction();

        try {
            $this->em->flush();
            $this->em->commit();
        } catch (Exception $e) {
            $this->em->rollback();

            throw new Exception($e->getMessage());
        }
    }

    public function getProgressStatus()
    {
        $user = $this->security->getUser();
        $roles = $user->getRoles();
        $status = 'Advisor In Progress';
        if ('ROLE_TECHNICIAN' == $roles[0]) {
            $status = 'Technician In Progress';
        } elseif ('ROLE_PARTS_ADVISOR' == $roles[0]) {
            $status = 'Parts In Progress';
        }

        return $status;
    }

    public function checkStatusUpdate($prevStatus, $newStatus)
    {
        if (self::QUOTE_STATUSES[$prevStatus] >= self::QUOTE_STATUSES['Sent']) {
            if (self::QUOTE_STATUSES[$prevStatus] >= self::QUOTE_STATUSES[$newStatus]) {
                return false;
            }
        }

        return true;
    }

    public function addRecommendationsFromDMS(RepairOrder $repairOrder, DMSResult $DMSResult)
    {
        /*
         * Sync Repair Order Quote Recomendations
         * Get Repair Order from DMS
         * Check if Repair Order Quote Exists, Create if it does not.
         * SYnc "Preapproved" tasks, delete existing pre approved tasks.
         *
         *description should be the opcode text.
        Comments should be notes
        Should only wipe the pre_approved ones.

        Description is opcode
        If there is no op code, default to misc opcode.
        Merging if the same.
        Misc(Empty) do not merge.
        Wipe preapproved everytime.

        After you update the quote, there is a helper method that will update the repair order quote log
        Need to merge
         *
         *
         * How to Log.

         *
         *
         */

        try {
            // TODO: Should we validate recommendations coming from the DMS?
            //$this->validateRecommendationsJson($DMSResult->getRecommendations());

            $this->buildRecommendations($repairOrder->getRepairOrderQuote(), $DMSResult->getRecommendations(), false, true);
        } catch (Exception $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        $status = $this->getProgressStatus();

        // Create RepairOrderQuoteInteraction
        $repairOrderQuoteInteraction = new RepairOrderQuoteInteraction();
        $repairOrderQuoteInteraction->setUser($repairOrder->getPrimaryTechnician())
                ->setCustomer($repairOrder->getPrimaryCustomer())
                ->setType($status);

        // Update repairOrderQuote Status
        $repairOrder->getRepairOrderQuote()->addRepairOrderQuoteInteraction($repairOrderQuoteInteraction)
                ->setStatus($status);

        // Update repairOrder quote_status
        $repairOrder->setQuoteStatus($status);

        return $repairOrder;
    }

    /**
     * @return EntityManagerInterface
     */
    public function getEm(): EntityManagerInterface
    {
        return $this->em;
    }

    /**
     * @param EntityManagerInterface $em
     */
    public function setEm(EntityManagerInterface $em): void
    {
        $this->em = $em;
    }

    /**
     * @return Security
     */
    public function getSecurity(): Security
    {
        return $this->security;
    }

    /**
     * @param Security $security
     */
    public function setSecurity(Security $security): void
    {
        $this->security = $security;
    }

    /**
     * @return OperationCodeRepository
     */
    public function getOperationCodeRepository(): OperationCodeRepository
    {
        return $this->operationCodeRepository;
    }

    /**
     * @param OperationCodeRepository $operationCodeRepository
     */
    public function setOperationCodeRepository(OperationCodeRepository $operationCodeRepository): void
    {
        $this->operationCodeRepository = $operationCodeRepository;
    }

    /**
     * @return PartRepository
     */
    public function getPartRepository(): PartRepository
    {
        return $this->partRepository;
    }

    /**
     * @param PartRepository $partRepository
     */
    public function setPartRepository(PartRepository $partRepository): void
    {
        $this->partRepository = $partRepository;
    }

    /**
     * @return \App\Entity\Settings
     */
    public function getPricingLaborRate(): \App\Entity\Settings
    {
        return $this->pricingLaborRate;
    }

    /**
     * @param \App\Entity\Settings $pricingLaborRate
     */
    public function setPricingLaborRate(\App\Entity\Settings $pricingLaborRate): void
    {
        $this->pricingLaborRate = $pricingLaborRate;
    }

    /**
     * @return \App\Entity\Settings
     */
    public function getIsPricingMatrix(): \App\Entity\Settings
    {
        return $this->isPricingMatrix;
    }

    /**
     * @param \App\Entity\Settings $isPricingMatrix
     */
    public function setIsPricingMatrix(\App\Entity\Settings $isPricingMatrix): void
    {
        $this->isPricingMatrix = $isPricingMatrix;
    }

    /**
     * @return float
     */
    public function getPricingLaborTax(): float
    {
        return $this->pricingLaborTax;
    }

    /**
     * @param float $pricingLaborTax
     */
    public function setPricingLaborTax(float $pricingLaborTax): void
    {
        $this->pricingLaborTax = $pricingLaborTax;
    }

    /**
     * @return float
     */
    public function getPricingPartsTax(): float
    {
        return $this->pricingPartsTax;
    }

    /**
     * @param float $pricingPartsTax
     */
    public function setPricingPartsTax(float $pricingPartsTax): void
    {
        $this->pricingPartsTax = $pricingPartsTax;
    }

    /**
     * @return PriceMatrixRepository
     */
    public function getPriceRepository(): PriceMatrixRepository
    {
        return $this->priceRepository;
    }

    /**
     * @param PriceMatrixRepository $priceRepository
     */
    public function setPriceRepository(PriceMatrixRepository $priceRepository): void
    {
        $this->priceRepository = $priceRepository;
    }

    /**
     * @return RepairOrderQuoteRecommendationRepository
     */
    public function getRepairOrderQuoteRecommendationRepository(): RepairOrderQuoteRecommendationRepository
    {
        return $this->repairOrderQuoteRecommendationRepository;
    }

    /**
     * @param RepairOrderQuoteRecommendationRepository $repairOrderQuoteRecommendationRepository
     */
    public function setRepairOrderQuoteRecommendationRepository(RepairOrderQuoteRecommendationRepository $repairOrderQuoteRecommendationRepository): void
    {
        $this->repairOrderQuoteRecommendationRepository = $repairOrderQuoteRecommendationRepository;
    }

    /**
     * @return SettingsHelper
     */
    public function getSettingsHelper(): SettingsHelper
    {
        return $this->settingsHelper;
    }

    /**
     * @param SettingsHelper $settingsHelper
     */
    public function setSettingsHelper(SettingsHelper $settingsHelper): void
    {
        $this->settingsHelper = $settingsHelper;
    }

    /**
     * @return RepairOrderQuoteLogHelper
     */
    public function getRepairOrderQuoteLogHelper(): RepairOrderQuoteLogHelper
    {
        return $this->repairOrderQuoteLogHelper;
    }

    /**
     * @param RepairOrderQuoteLogHelper $repairOrderQuoteLogHelper
     */
    public function setRepairOrderQuoteLogHelper(RepairOrderQuoteLogHelper $repairOrderQuoteLogHelper): void
    {
        $this->repairOrderQuoteLogHelper = $repairOrderQuoteLogHelper;
    }



}
