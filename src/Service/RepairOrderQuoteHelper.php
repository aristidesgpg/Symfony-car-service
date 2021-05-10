<?php

namespace App\Service;

use App\Entity\DMSResult;
use App\Entity\OperationCode;
use App\Entity\Part;
use App\Entity\PriceMatrix;
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
        'laborTaxable',
        'partsTaxable',
        'suppliesTaxable',
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

    private const BOOLEAN_VALUES = [
        'true',
        'false',
        '0',
        '1',
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
        SettingsHelper $settingsHelper,
        Security $security,
        RepairOrderQuoteLogHelper $repairOrderQuoteLogHelper
    ) {
        $this->em = $em;
        $this->operationCodeRepository = $em->getRepository(OperationCode::class);
        $this->security = $security;
        $this->priceRepository = $em->getRepository(PriceMatrix::class);
        $this->partRepository = $em->getRepository(Part::class);
        $this->repairOrderQuoteRecommendationRepository = $em->getRepository(RepairOrderQuote::class);

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

                    if (str_contains($field, 'Taxable')) {
                        if (!in_array($fields[$field], self::BOOLEAN_VALUES)) {
                            throw new Exception($field.' is not boolean in recommendations json');
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

    public function isTrue($val)
    {
        $boolval = (is_string($val) ? filter_var($val, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) : (bool) $val);

        return null === $boolval ? false : $boolval;
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
//                throw new Exception('Invalid operationCode Parameter in recommendations JSON');
                $operationCode = 'MISC';
            } else {
                $operationCode = $operationCode->getCode();
            }

            $repairOrderQuoteRecommendation->setOperationCode($operationCode)
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
                ->setLaborTaxable($this->isTrue($recommendation->laborTaxable))
                ->setPartsTaxable($this->isTrue($recommendation->partsTaxable))
                ->setSuppliesTaxable($this->isTrue($recommendation->suppliesTaxable))
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
            // If the recommendation was pre-approved, just approve it and bail
            if ($repairOrderQuoteRecommendation->getPreApproved()) {
                $repairOrderQuoteRecommendation->setApproved(true);
            } else {
                $recommendationOutcome = false;

                foreach ($recommendations as $recommendation) {
                    if ($recommendation->repairOrderQuoteRecommendationId === $repairOrderQuoteRecommendation->getId()) {
                        $recommendationOutcome = $recommendation;
                        break;
                    }
                }

                if (!$recommendationOutcome) {
                    throw new Exception('Recommendation '.$repairOrderQuoteRecommendation->getId().' was not pre-approved, but it is missing');
                }

                $repairOrderQuoteRecommendation->setApproved(filter_var($recommendationOutcome->approved, FILTER_VALIDATE_BOOLEAN));
            }

            $this->em->persist($repairOrderQuoteRecommendation);

            if ($repairOrderQuoteRecommendation->getApproved()) {
                $subtotal += $repairOrderQuoteRecommendation->getLaborPrice()
                    + $repairOrderQuoteRecommendation->getPartsPrice()
                    + $repairOrderQuoteRecommendation->getSuppliesPrice();
                $tax += $repairOrderQuoteRecommendation->getLaborTax()
                    + $repairOrderQuoteRecommendation->getPartsTax()
                    + $repairOrderQuoteRecommendation->getSuppliesTax();
            }
        }

        $repairOrderQuote->setSubtotal($subtotal)
            ->setTax($tax)
            ->setTotal($subtotal + $tax);

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
                ->setBin($part->bin)
                ->setQuantity($part->quantity);

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

    public function getEm(): EntityManagerInterface
    {
        return $this->em;
    }

    public function setEm(EntityManagerInterface $em): void
    {
        $this->em = $em;
    }

    public function getSecurity(): Security
    {
        return $this->security;
    }

    public function setSecurity(Security $security): void
    {
        $this->security = $security;
    }

    public function getOperationCodeRepository(): OperationCodeRepository
    {
        return $this->operationCodeRepository;
    }

    public function setOperationCodeRepository(OperationCodeRepository $operationCodeRepository): void
    {
        $this->operationCodeRepository = $operationCodeRepository;
    }

    public function getPartRepository(): PartRepository
    {
        return $this->partRepository;
    }

    public function setPartRepository(PartRepository $partRepository): void
    {
        $this->partRepository = $partRepository;
    }

    public function getPricingLaborRate(): \App\Entity\Settings
    {
        return $this->pricingLaborRate;
    }

    public function setPricingLaborRate(\App\Entity\Settings $pricingLaborRate): void
    {
        $this->pricingLaborRate = $pricingLaborRate;
    }

    public function getIsPricingMatrix(): \App\Entity\Settings
    {
        return $this->isPricingMatrix;
    }

    public function setIsPricingMatrix(\App\Entity\Settings $isPricingMatrix): void
    {
        $this->isPricingMatrix = $isPricingMatrix;
    }

    public function getPricingLaborTax(): float
    {
        return $this->pricingLaborTax;
    }

    public function setPricingLaborTax(float $pricingLaborTax): void
    {
        $this->pricingLaborTax = $pricingLaborTax;
    }

    public function getPricingPartsTax(): float
    {
        return $this->pricingPartsTax;
    }

    public function setPricingPartsTax(float $pricingPartsTax): void
    {
        $this->pricingPartsTax = $pricingPartsTax;
    }

    public function getPriceRepository(): PriceMatrixRepository
    {
        return $this->priceRepository;
    }

    public function setPriceRepository(PriceMatrixRepository $priceRepository): void
    {
        $this->priceRepository = $priceRepository;
    }

    public function getRepairOrderQuoteRecommendationRepository(): RepairOrderQuoteRecommendationRepository
    {
        return $this->repairOrderQuoteRecommendationRepository;
    }

    public function setRepairOrderQuoteRecommendationRepository(RepairOrderQuoteRecommendationRepository $repairOrderQuoteRecommendationRepository): void
    {
        $this->repairOrderQuoteRecommendationRepository = $repairOrderQuoteRecommendationRepository;
    }

    public function getSettingsHelper(): SettingsHelper
    {
        return $this->settingsHelper;
    }

    public function setSettingsHelper(SettingsHelper $settingsHelper): void
    {
        $this->settingsHelper = $settingsHelper;
    }

    public function getRepairOrderQuoteLogHelper(): RepairOrderQuoteLogHelper
    {
        return $this->repairOrderQuoteLogHelper;
    }

    public function setRepairOrderQuoteLogHelper(RepairOrderQuoteLogHelper $repairOrderQuoteLogHelper): void
    {
        $this->repairOrderQuoteLogHelper = $repairOrderQuoteLogHelper;
    }
}
