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
class RepairOrderPayment
{
    public const GROUPS = ['rop_list', 'int_list'];

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Serializer\Groups(groups={"rop_list", "int_list"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\RepairOrder")
     */
    private $repairOrder;

    /**
     * @ORM\Column(type="money")
     * @Serializer\Accessor(getter="getAmountString")
     * @Serializer\Groups(groups={"rop_list", "int_list"})
     * @Serializer\Type(name="string")
     */
    private $amount;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Serializer\Groups(groups={"rop_list", "int_list"})
     */
    private $transactionId;

    /**
     * @ORM\Column(type="money", nullable=true)
     * @Serializer\Accessor(getter="getRefundedAmountString")
     * @Serializer\Groups(groups={"rop_list", "int_list"})
     * @Serializer\Type(name="string")
     */
    private $refundedAmount;

    /**
     * @ORM\Column(type="datetime")
     * @Serializer\Groups(groups={"rop_list", "int_list"})
     */
    private $dateCreated;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Serializer\Groups(groups={"rop_list", "int_list"})
     */
    private $dateSent;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Serializer\Groups(groups={"rop_list", "int_list"})
     */
    private $dateViewed;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Serializer\Groups(groups={"rop_list", "int_list"})
     */
    private $datePaid;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Serializer\Groups(groups={"rop_list", "int_list"})
     */
    private $dateConfirmed;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Serializer\Groups(groups={"rop_list", "int_list"})
     */
    private $dateRefunded;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Serializer\Groups(groups={"rop_list", "int_list"})
     */
    private $dateDeleted;

    /**
     * @ORM\Column(type="boolean")
     */
    private $deleted = false;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Serializer\Groups(groups={"rop_list", "int_list"})
     */
    private $cardType;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Serializer\Groups(groups={"rop_list", "int_list"})
     */
    private $cardNumber;

    /**
     * @ORM\OneToMany(
     *     targetEntity="App\Entity\RepairOrderPaymentInteraction",
     *     mappedBy="repairOrderPayment",
     *     cascade={"PERSIST"}
     * )
     * @ORM\OrderBy({"date"="DESC"})
     * @Serializer\Groups(groups={"int_list"})
     */
    private $interactions;

    public function __construct()
    {
        $this->interactions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRepairOrder(): RepairOrder
    {
        return $this->repairOrder;
    }

    /**
     * @return $this
     */
    public function setRepairOrder(RepairOrder $repairOrder): self
    {
        $this->repairOrder = $repairOrder;

        return $this;
    }

    public function getAmount(): Money
    {
        return $this->amount;
    }

    public function getAmountString(): string
    {
        return MoneyHelper::getFormatter()->format($this->amount);
    }

    /**
     * @return $this
     */
    public function setAmount(Money $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getTransactionId(): ?string
    {
        return $this->transactionId;
    }

    /**
     * @return $this
     */
    public function setTransactionId(string $transactionId): self
    {
        $this->transactionId = $transactionId;

        return $this;
    }

    public function getRefundedAmount(): ?Money
    {
        return $this->refundedAmount;
    }

    public function getRefundedAmountString(): ?string
    {
        if (null === $this->refundedAmount) {
            return null;
        }

        return MoneyHelper::getFormatter()->format($this->refundedAmount);
    }

    /**
     * @return $this
     */
    public function setRefundedAmount(Money $refundedAmount): self
    {
        $this->refundedAmount = $refundedAmount;

        return $this;
    }

    public function getDateCreated(): \DateTime
    {
        return $this->dateCreated;
    }

    /**
     * @return $this
     */
    public function setDateCreated(\DateTime $dateCreated): self
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    public function getDateSent(): ?\DateTime
    {
        return $this->dateSent;
    }

    /**
     * @return $this
     */
    public function setDateSent(\DateTime $dateSent): self
    {
        $this->dateSent = $dateSent;

        return $this;
    }

    public function getDateViewed(): ?\DateTime
    {
        return $this->dateViewed;
    }

    /**
     * @return $this
     */
    public function setDateViewed(\DateTime $dateViewed): self
    {
        $this->dateViewed = $dateViewed;

        return $this;
    }

    public function getDatePaid(): ?\DateTime
    {
        return $this->datePaid;
    }

    /**
     * @return $this
     */
    public function setDatePaid(\DateTime $datePaid)
    {
        $this->datePaid = $datePaid;

        return $this;
    }

    public function getDateConfirmed(): ?\DateTime
    {
        return $this->dateConfirmed;
    }

    /**
     * @return $this
     */
    public function setDateConfirmed(\DateTime $dateConfirmed): self
    {
        $this->dateConfirmed = $dateConfirmed;

        return $this;
    }

    public function getDateRefunded(): ?\DateTime
    {
        return $this->dateRefunded;
    }

    /**
     * @return $this
     */
    public function setDateRefunded(\DateTime $dateRefunded): self
    {
        $this->dateRefunded = $dateRefunded;

        return $this;
    }

    public function getDateDeleted(): ?\DateTime
    {
        return $this->dateDeleted;
    }

    /**
     * @return $this
     */
    public function setDateDeleted(\DateTime $dateDeleted): self
    {
        $this->dateDeleted = $dateDeleted;

        return $this;
    }

    public function isDeleted(): bool
    {
        return $this->deleted;
    }

    /**
     * @return $this
     */
    public function setDeleted(bool $deleted): self
    {
        $this->deleted = $deleted;

        return $this;
    }

    public function getCardType(): ?string
    {
        return $this->cardType;
    }

    /**
     * @return $this
     */
    public function setCardType(string $cardType): self
    {
        $this->cardType = $cardType;

        return $this;
    }

    /**
     * @return ?string
     */
    public function getCardNumber(): ?string
    {
        return $this->cardNumber;
    }

    /**
     * @return $this
     */
    public function setCardNumber(string $cardNumber): self
    {
        $this->cardNumber = $cardNumber;

        return $this;
    }

    /**
     * @return RepairOrderPaymentInteraction[]
     */
    public function getInteractions(): array
    {
        return $this->interactions->toArray();
    }

    /**
     * @return $this
     */
    public function addInteraction(RepairOrderPaymentInteraction $interaction): self
    {
        $this->interactions->add($interaction);

        return $this;
    }
}
