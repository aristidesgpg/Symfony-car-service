<?php

namespace App\Entity;

use App\Money\MoneyHelper;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Money\Money;

/**
 * @ORM\Entity
 */
class RepairOrderPayment {
    public const GROUPS = ['rop_list'];

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Serializer\Groups(groups={"rop_list"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\RepairOrder")
     */
    private $repairOrder;

    /**
     * @ORM\Column(type="money")
     * @Serializer\Accessor(getter="getAmountString")
     * @Serializer\Groups(groups={"rop_list"})
     * @Serializer\Type(name="string")
     */
    private $amount;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Serializer\Groups(groups={"rop_list"})
     */
    private $transactionId;

    /**
     * @ORM\Column(type="money", nullable=true)
     * @Serializer\Accessor(getter="getRefundedAmountString")
     * @Serializer\Groups(groups={"rop_list"})
     * @Serializer\Type(name="string")
     */
    private $refundedAmount;

    /**
     * @ORM\Column(type="datetime")
     * @Serializer\Groups(groups={"rop_list"})
     */
    private $dateCreated;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Serializer\Groups(groups={"rop_list"})
     */
    private $dateSent;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Serializer\Groups(groups={"rop_list"})
     */
    private $dateViewed;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Serializer\Groups(groups={"rop_list"})
     */
    private $datePaid;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Serializer\Groups(groups={"rop_list"})
     */
    private $datePaidViewed;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Serializer\Groups(groups={"rop_list"})
     */
    private $dateRefunded;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Serializer\Groups(groups={"rop_list"})
     */
    private $dateDeleted;

    /**
     * @ORM\Column(type="boolean")
     */
    private $deleted = false;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Serializer\Groups(groups={"rop_list"})
     */
    private $cardType;

    /**
     * @ORM\Column(type="string", length=4, nullable=true)
     * @Serializer\Groups(groups={"rop_list"})
     */
    private $cardNumber;

    /**
     * @ORM\OneToMany(
     *     targetEntity="App\Entity\RepairOrderPaymentInteraction",
     *     mappedBy="repairOrderPayment",
     *     cascade={"PERSIST"}
     * )
     * @ORM\OrderBy({"date"="DESC"})
     */
    private $interactions;

    public function __construct () {
        $this->interactions = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId (): ?int {
        return $this->id;
    }

    /**
     * @return RepairOrder
     */
    public function getRepairOrder (): RepairOrder {
        return $this->repairOrder;
    }

    /**
     * @param RepairOrder $repairOrder
     *
     * @return $this
     */
    public function setRepairOrder (RepairOrder $repairOrder): self {
        $this->repairOrder = $repairOrder;

        return $this;
    }

    /**
     * @return Money
     */
    public function getAmount (): Money {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getAmountString (): string {
        return MoneyHelper::getFormatter()->format($this->amount);
    }

    /**
     * @param Money $amount
     *
     * @return $this
     */
    public function setAmount (Money $amount): self {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTransactionId (): ?string {
        return $this->transactionId;
    }

    /**
     * @param string $transactionId
     *
     * @return $this
     */
    public function setTransactionId (string $transactionId): self {
        $this->transactionId = $transactionId;

        return $this;
    }

    /**
     * @return Money|null
     */
    public function getRefundedAmount (): ?Money {
        return $this->refundedAmount;
    }

    /**
     * @return string|null
     */
    public function getRefundedAmountString (): ?string {
        if ($this->refundedAmount === null) {
            return null;
        }

        return MoneyHelper::getFormatter()->format($this->refundedAmount);
    }

    /**
     * @param Money $refundedAmount
     *
     * @return $this
     */
    public function setRefundedAmount (Money $refundedAmount): self {
        $this->refundedAmount = $refundedAmount;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateCreated (): \DateTime {
        return $this->dateCreated;
    }

    /**
     * @param \DateTime $dateCreated
     *
     * @return $this
     */
    public function setDateCreated (\DateTime $dateCreated): self {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateSent (): ?\DateTime {
        return $this->dateSent;
    }

    /**
     * @param \DateTime $dateSent
     *
     * @return $this
     */
    public function setDateSent (\DateTime $dateSent): self {
        $this->dateSent = $dateSent;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateViewed (): ?\DateTime {
        return $this->dateViewed;
    }

    /**
     * @param \DateTime $dateViewed
     *
     * @return $this
     */
    public function setDateViewed (\DateTime $dateViewed): self {
        $this->dateViewed = $dateViewed;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getDatePaid (): ?\DateTime {
        return $this->datePaid;
    }

    /**
     * @param \DateTime $datePaid
     *
     * @return $this
     */
    public function setDatePaid (\DateTime $datePaid) {
        $this->datePaid = $datePaid;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getDatePaidViewed (): ?\DateTime {
        return $this->datePaidViewed;
    }

    /**
     * @param \DateTime $datePaidViewed
     *
     * @return $this
     */
    public function setDatePaidViewed (\DateTime $datePaidViewed): self {
        $this->datePaidViewed = $datePaidViewed;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateRefunded (): ?\DateTime {
        return $this->dateRefunded;
    }

    /**
     * @param \DateTime $dateRefunded
     *
     * @return $this
     */
    public function setDateRefunded (\DateTime $dateRefunded): self {
        $this->dateRefunded = $dateRefunded;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateDeleted (): ?\DateTime {
        return $this->dateDeleted;
    }

    /**
     * @param \DateTime $dateDeleted
     *
     * @return $this
     */
    public function setDateDeleted (\DateTime $dateDeleted): self {
        $this->dateDeleted = $dateDeleted;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDeleted (): bool {
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

    /**
     * @return int|null
     */
    public function getCardType (): ?int {
        return $this->cardType;
    }

    /**
     * @param int $cardType
     *
     * @return $this
     */
    public function setCardType (int $cardType): self {
        $this->cardType = $cardType;

        return $this;
    }

    /**
     * @return ?string
     */
    public function getCardNumber (): ?string {
        return $this->cardNumber;
    }

    /**
     * @param string $cardNumber
     *
     * @return $this
     */
    public function setCardNumber (string $cardNumber): self {
        $this->cardNumber = $cardNumber;

        return $this;
    }

    /**
     * @return RepairOrderPaymentInteraction[]
     */
    public function getInteractions (): array {
        return $this->interactions->toArray();
    }

    /**
     * @param RepairOrderPaymentInteraction $interaction
     *
     * @return $this
     */
    public function addInteraction (RepairOrderPaymentInteraction $interaction): self {
        $this->interactions->add($interaction);

        return $this;
    }
}