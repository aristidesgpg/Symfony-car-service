<?php

namespace App\Entity;

use App\Repository\RepairOrderRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RepairOrderRepository::class)
 */
class RepairOrder {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $primaryCustomer;

    /**
     * @var User
     *
     * @ORM\ManyToOne (targetEntity="App\Entity\User", inversedBy="technicianRepairOrders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $primaryTechnician;

    /**
     * @ORM\Column(type="integer")
     */
    private $primaryAdvisor;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $videoStatus;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mpiStatus;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $quoteStatus;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $paymentStatus;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $startValue;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $finalValue;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $approvedValue;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreated;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateClosed;

    /**
     * @ORM\Column(type="boolean")
     */
    private $waiter;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $pickupDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $linkHash;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $year;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $make;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $model;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $miles;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $vin;

    /**
     * @ORM\Column(type="boolean")
     */
    private $internal = false;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dmsKey;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $waiver;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $waiverVerbiage;

    /**
     * @ORM\Column(type="boolean")
     */
    private $upgradeQue = false;

    /**
     * @ORM\Column(type="boolean")
     */
    private $deleted = false;

    /**
     * RepairOrder constructor.
     */
    public function __construct () {
        $this->dateCreated = new DateTime();
    }

    /**
     * @return int|null
     */
    public function getId (): ?int {
        return $this->id;
    }

    /**
     * @return int|null
     */
    public function getPrimaryCustomer (): ?int {
        return $this->primaryCustomer;
    }

    /**
     * @param int $primaryCustomer
     *
     * @return $this
     */
    public function setPrimaryCustomer (int $primaryCustomer): self {
        $this->primaryCustomer = $primaryCustomer;

        return $this;
    }

    /**
     * @return User
     */
    public function getPrimaryTechnician (): ?User {
        return $this->primaryTechnician;
    }

    /**
     * @param User $primaryTechnician
     *
     * @return $this
     */
    public function setPrimaryTechnician (User $primaryTechnician): self {
        $this->primaryTechnician = $primaryTechnician;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPrimaryAdvisor (): ?int {
        return $this->primaryAdvisor;
    }

    /**
     * @param int $primaryAdvisor
     *
     * @return $this
     */
    public function setPrimaryAdvisor (int $primaryAdvisor): self {
        $this->primaryAdvisor = $primaryAdvisor;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getNumber (): ?string {
        return $this->number;
    }

    /**
     * @param string $number
     *
     * @return $this
     */
    public function setNumber (string $number): self {
        $this->number = $number;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getVideoStatus (): ?string {
        return $this->videoStatus;
    }

    /**
     * @param string $videoStatus
     *
     * @return $this
     */
    public function setVideoStatus (string $videoStatus): self {
        $this->videoStatus = $videoStatus;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMpiStatus (): ?string {
        return $this->mpiStatus;
    }

    /**
     * @param string $mpiStatus
     *
     * @return $this
     */
    public function setMpiStatus (string $mpiStatus): self {
        $this->mpiStatus = $mpiStatus;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getQuoteStatus (): ?string {
        return $this->quoteStatus;
    }

    /**
     * @param string $quoteStatus
     *
     * @return $this
     */
    public function setQuoteStatus (string $quoteStatus): self {
        $this->quoteStatus = $quoteStatus;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaymentStatus (): ?string {
        return $this->paymentStatus;
    }

    /**
     * @param string $paymentStatus
     *
     * @return $this
     */
    public function setPaymentStatus (string $paymentStatus): self {
        $this->paymentStatus = $paymentStatus;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getStartValue (): ?float {
        return $this->startValue;
    }

    /**
     * @param float|null $startValue
     *
     * @return $this
     */
    public function setStartValue (?float $startValue): self {
        $this->startValue = $startValue;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getFinalValue (): ?float {
        return $this->finalValue;
    }

    /**
     * @param float|null $finalValue
     *
     * @return $this
     */
    public function setFinalValue (?float $finalValue): self {
        $this->finalValue = $finalValue;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getApprovedValue (): ?float {
        return $this->approvedValue;
    }

    /**
     * @param float|null $approvedValue
     *
     * @return $this
     */
    public function setApprovedValue (?float $approvedValue): self {
        $this->approvedValue = $approvedValue;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDateCreated (): ?DateTime {
        return $this->dateCreated;
    }

    /**
     * @param DateTime $dateCreated
     *
     * @return $this
     */
    public function setDateCreated (DateTime $dateCreated): self {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDateClosed (): ?DateTime {
        return $this->dateClosed;
    }

    /**
     * @param DateTime|null $dateClosed
     *
     * @return $this
     */
    public function setDateClosed (?DateTime $dateClosed): self {
        $this->dateClosed = $dateClosed;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getWaiter (): ?bool {
        return $this->waiter;
    }

    /**
     * @param bool $waiter
     *
     * @return $this
     */
    public function setWaiter (bool $waiter): self {
        $this->waiter = $waiter;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getPickupDate (): ?DateTime {
        return $this->pickupDate;
    }

    /**
     * @param DateTime|null $pickupDate
     *
     * @return $this
     */
    public function setPickupDate (?DateTime $pickupDate): self {
        $this->pickupDate = $pickupDate;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLinkHash (): ?string {
        return $this->linkHash;
    }

    /**
     * @param string $linkHash
     *
     * @return $this
     */
    public function setLinkHash (string $linkHash): self {
        $this->linkHash = $linkHash;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getYear (): ?int {
        return $this->year;
    }

    /**
     * @param int|null $year
     *
     * @return $this
     */
    public function setYear (?int $year): self {
        $this->year = $year;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMake (): ?string {
        return $this->make;
    }

    /**
     * @param string|null $make
     *
     * @return $this
     */
    public function setMake (?string $make): self {
        $this->make = $make;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getModel (): ?string {
        return $this->model;
    }

    /**
     * @param string|null $model
     *
     * @return $this
     */
    public function setModel (?string $model): self {
        $this->model = $model;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMiles (): ?int {
        return $this->miles;
    }

    /**
     * @param int|null $miles
     *
     * @return $this
     */
    public function setMiles (?int $miles): self {
        $this->miles = $miles;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getVin (): ?string {
        return $this->vin;
    }

    /**
     * @param string|null $vin
     *
     * @return $this
     */
    public function setVin (?string $vin): self {
        $this->vin = $vin;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getInternal (): ?bool {
        return $this->internal;
    }

    /**
     * @param bool $internal
     *
     * @return $this
     */
    public function setInternal (bool $internal): self {
        $this->internal = $internal;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDmsKey (): ?string {
        return $this->dmsKey;
    }

    /**
     * @param string|null $dmsKey
     *
     * @return $this
     */
    public function setDmsKey (?string $dmsKey): self {
        $this->dmsKey = $dmsKey;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getWaiver (): ?string {
        return $this->waiver;
    }

    /**
     * @param string|null $waiver
     *
     * @return $this
     */
    public function setWaiver (?string $waiver): self {
        $this->waiver = $waiver;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getWaiverVerbiage (): ?string {
        return $this->waiverVerbiage;
    }

    /**
     * @param string|null $waiverVerbiage
     *
     * @return $this
     */
    public function setWaiverVerbiage (?string $waiverVerbiage): self {
        $this->waiverVerbiage = $waiverVerbiage;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getUpgradeQue (): ?bool {
        return $this->upgradeQue;
    }

    /**
     * @param bool $upgradeQue
     *
     * @return $this
     */
    public function setUpgradeQue (bool $upgradeQue): self {
        $this->upgradeQue = $upgradeQue;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getDeleted (): ?bool {
        return $this->deleted;
    }

    /**
     * @param bool $deleted
     *
     * @return $this
     */
    public function setDeleted (bool $deleted): self {
        $this->deleted = $deleted;

        return $this;
    }
}
