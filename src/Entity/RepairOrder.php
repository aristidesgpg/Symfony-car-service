<?php

namespace App\Entity;

use App\Repository\RepairOrderRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass=RepairOrderRepository::class)
 */
class RepairOrder
{
    public const GROUPS = [
        'ro_list',
        'customer_list',
        'user_list',
        'roq_list',
        'rot_list',
        'roqs_list',
        'operation_code_list',
        'rov_list',
        'ror_list',
        'roc_list',
        'roqp_list'
    ];

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $id;

    /**
     * @var Customer
     *
     * @ORM\ManyToOne (targetEntity="App\Entity\Customer", inversedBy="primaryRepairOrders")
     * @ORM\JoinColumn(nullable=false)
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $primaryCustomer;

    /**
     * @var User
     *
     * @ORM\ManyToOne (targetEntity="App\Entity\User", inversedBy="technicianRepairOrders")
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $primaryTechnician;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $primaryAdvisor;

    /**
     * @ORM\Column(name="number", type="string", length=255, unique=true)
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $number;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $videoStatus = 'Not Started';

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $mpiStatus = 'Not Started';

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $quoteStatus = 'Not Started';

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $paymentStatus = 'Not Started';

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $startValue;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $finalValue;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $approvedValue;

    /**
     * @ORM\Column(type="datetime")
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $dateCreated;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $dateClosed;

    /**
     * @ORM\Column(type="boolean")
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $waiter = true;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $pickupDate;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $linkHash;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $year;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $make;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $model;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $miles;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $vin;

    /**
     * @ORM\Column(type="boolean")
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $internal = false;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $dmsKey;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $waiverSignature;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $waiverVerbiage;

    /**
     * @ORM\Column(type="boolean")
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $upgradeQue = false;

    /**
     * @ORM\Column(type="boolean")
     */
    private $deleted = false;

    /**
     * @ORM\OneToOne(targetEntity=RepairOrderMPI::class, mappedBy="repairOrder", cascade={"persist", "remove"})
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $repairOrderMPI;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\RepairOrderVideo", mappedBy="repairOrder")
     */
    private $videos;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\RepairOrderNote", mappedBy="repairOrder")
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $notes;

    /**
     * @ORM\OneToOne(targetEntity=RepairOrderQuote::class, mappedBy="repairOrder", cascade={"persist", "remove"})
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $repairOrderQuote;

    /**
     * @ORM\OneToMany(targetEntity=RepairOrderInteraction::class, mappedBy="repairOrder")
     */
    private $repairOrderInteractions;

    /**
     * @ORM\OneToOne(targetEntity=RepairOrderReview::class, mappedBy="repairOrder", cascade={"persist", "remove"})
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $repairOrderReview;

    /**
     * @ORM\OneToMany(targetEntity=RepairOrderCustomer::class, mappedBy="repairOrder", orphanRemoval=true)
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $repairOrderCustomers;

    /**
     * @ORM\OneToMany(targetEntity=RepairOrderTeam::class, mappedBy="repairOrder", orphanRemoval=true)
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $repairOrderTeam;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\RepairOrderPayment", mappedBy="repairOrder")
     */
    private $payments;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $mpiStatusTimestamp;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $videoStatusTimestamp;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $quoteStatusTimestamp;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $iPayStatusTimestamp;

    /**
     * RepairOrder constructor.
     */
    public function __construct()
    {
        $this->dateCreated = new DateTime();
        $this->videos = new ArrayCollection();
        $this->repairOrderInteractions = new ArrayCollection();
        $this->repairOrderTeam = new ArrayCollection();
        $this->payments = new ArrayCollection();
        $this->repairOrderCustomers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrimaryCustomer(): ?Customer
    {
        return $this->primaryCustomer;
    }

    public function setPrimaryCustomer(Customer $primaryCustomer): self
    {
        $this->primaryCustomer = $primaryCustomer;

        return $this;
    }

    public function getPrimaryTechnician(): ?User
    {
        return $this->primaryTechnician;
    }

    public function setPrimaryTechnician(?User $primaryTechnician): self
    {
        $this->primaryTechnician = $primaryTechnician;

        return $this;
    }

    public function getPrimaryAdvisor(): ?User
    {
        return $this->primaryAdvisor;
    }

    public function setPrimaryAdvisor(User $primaryAdvisor): self
    {
        $this->primaryAdvisor = $primaryAdvisor;

        return $this;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getVideoStatus(): ?string
    {
        return $this->videoStatus;
    }

    public function setVideoStatus(string $videoStatus): self
    {
        $this->videoStatus = $videoStatus;

        return $this;
    }

    public function getMpiStatus(): ?string
    {
        return $this->mpiStatus;
    }

    public function setMpiStatus(string $mpiStatus): self
    {
        $this->mpiStatus = $mpiStatus;

        return $this;
    }

    public function getRepairOrderMPI(): ?RepairOrderMPI
    {
        return $this->repairOrderMPI;
    }

    public function setRepairOrderMPI(?RepairOrderMPI $repairOrderMPI): self
    {
        $this->repairOrderMPI = $repairOrderMPI;

        // set (or unset) the owning side of the relation if necessary
        $newRepairOrder = null === $repairOrderMPI ? null : $this;
        if ($repairOrderMPI->getRepairOrder() !== $newRepairOrder) {
            $repairOrderMPI->setRepairOrder($newRepairOrder);
        }

        return $this;
    }

    public function getQuoteStatus(): ?string
    {
        return $this->quoteStatus;
    }

    public function setQuoteStatus(string $quoteStatus): self
    {
        $this->quoteStatus = $quoteStatus;

        return $this;
    }

    public function getPaymentStatus(): ?string
    {
        return $this->paymentStatus;
    }

    public function setPaymentStatus(?string $paymentStatus): self
    {
        $this->paymentStatus = $paymentStatus;

        return $this;
    }

    public function getStartValue(): ?float
    {
        return $this->startValue;
    }

    public function setStartValue(?float $startValue): self
    {
        $this->startValue = $startValue;

        return $this;
    }

    public function getFinalValue(): ?float
    {
        return $this->finalValue;
    }

    public function setFinalValue(?float $finalValue): self
    {
        $this->finalValue = $finalValue;

        return $this;
    }

    public function getApprovedValue(): ?float
    {
        return $this->approvedValue;
    }

    public function setApprovedValue(?float $approvedValue): self
    {
        $this->approvedValue = $approvedValue;

        return $this;
    }

    public function getDateCreated(): ?DateTime
    {
        return $this->dateCreated;
    }

    public function setDateCreated(DateTime $dateCreated): self
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    public function getDateClosed(): ?DateTime
    {
        return $this->dateClosed;
    }

    public function setDateClosed(?DateTime $dateClosed): self
    {
        $this->dateClosed = $dateClosed;

        return $this;
    }

    public function isClosed(): bool
    {
        return $this->dateClosed !== null;
    }

    public function getWaiter(): ?bool
    {
        return $this->waiter;
    }

    public function setWaiter(bool $waiter): self
    {
        $this->waiter = $waiter;

        return $this;
    }

    public function getPickupDate(): ?DateTime
    {
        return $this->pickupDate;
    }

    public function setPickupDate(?DateTime $pickupDate): self
    {
        $this->pickupDate = $pickupDate;

        return $this;
    }

    public function getLinkHash(): ?string
    {
        return $this->linkHash;
    }

    public function setLinkHash(string $linkHash): self
    {
        $this->linkHash = $linkHash;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(?int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getMake(): ?string
    {
        return $this->make;
    }

    public function setMake(?string $make): self
    {
        $this->make = $make;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(?string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getMiles(): ?int
    {
        return $this->miles;
    }

    public function setMiles(?int $miles): self
    {
        $this->miles = $miles;

        return $this;
    }

    public function getVin(): ?string
    {
        return $this->vin;
    }

    public function setVin(?string $vin): self
    {
        $this->vin = $vin;

        return $this;
    }

    public function getInternal(): ?bool
    {
        return $this->internal;
    }

    public function setInternal(bool $internal): self
    {
        $this->internal = $internal;

        return $this;
    }

    public function getDmsKey(): ?string
    {
        return $this->dmsKey;
    }

    public function setDmsKey(?string $dmsKey): self
    {
        $this->dmsKey = $dmsKey;

        return $this;
    }

    public function getWaiverSignature(): ?string
    {
        return $this->waiverSignature;
    }

    public function setWaiverSignature(?string $waiverSignature): self
    {
        $this->waiverSignature = $waiverSignature;

        return $this;
    }

    public function getWaiverVerbiage(): ?string
    {
        return $this->waiverVerbiage;
    }

    public function setWaiverVerbiage(?string $waiverVerbiage): self
    {
        $this->waiverVerbiage = $waiverVerbiage;

        return $this;
    }

    public function getUpgradeQue(): ?bool
    {
        return $this->upgradeQue;
    }

    public function setUpgradeQue(bool $upgradeQue): self
    {
        $this->upgradeQue = $upgradeQue;

        return $this;
    }

    public function getDeleted(): ?bool
    {
        return $this->deleted;
    }

    public function setDeleted(bool $deleted): self
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * @return RepairOrderPayment[]
     */
    public function getPayments(): array
    {
        return $this->payments->toArray();
    }

    /**
     * @param RepairOrderPayment $payment
     *
     * @return $this
     */
    public function addPayment(RepairOrderPayment $payment): self
    {
        $this->payments->add($payment);

        return $this;
    }

    public function getRepairOrderQuote(): ?RepairOrderQuote
    {
        return $this->repairOrderQuote;
    }

    public function setRepairOrderQuote($repairOrderQuote): self
    {
        if (is_null($repairOrderQuote)) {
            $this->repairOrderQuote = null;

            return $this;
        }
        $this->repairOrderQuote = $repairOrderQuote;

        // set the owning side of the relation if necessary
        if ($repairOrderQuote->getRepairOrder() !== $this) {
            $repairOrderQuote->setRepairOrder($this);
        }

        return $this;
    }

    public function getVideos(): array
    {
        return $this->videos->toArray();
    }

    public function addVideo(RepairOrderVideo $video): self
    {
        $this->videos->add($video);

        return $this;
    }

    /**
     * @return Collection|RepairOrderInteraction[]
     */
    public function getRepairOrderInteractions(): Collection
    {
        return $this->repairOrderInteractions;
    }

    public function addRepairOrderInteraction(RepairOrderInteraction $repairOrderInteraction): self
    {
        if (!$this->repairOrderInteractions->contains($repairOrderInteraction)) {
            $this->repairOrderInteractions[] = $repairOrderInteraction;
            $repairOrderInteraction->setRepairOrder($this);
        }

        return $this;
    }

    public function getRepairOrderReview(): ?RepairOrderReview
    {
        return $this->repairOrderReview;
    }

    public function setRepairOrderReview(RepairOrderReview $repairOrderReview): self
    {
        $this->repairOrderReview = $repairOrderReview;

        // set the owning side of the relation if necessary
        if ($repairOrderReview->getRepairOrder() !== $this) {
            $repairOrderReview->setRepairOrder($this);
        }

        return $this;
    }

    /**
     * @return Collection|RepairOrderCustomer[]
     */
    public function getRepairOrderCustomers(): Collection
    {
        return $this->repairOrderCustomers;
    }

    public function addRepairOrderCustomer(RepairOrderCustomer $repairOrderCustomer): self
    {
        if (!$this->repairOrderCustomers->contains($repairOrderCustomer)) {
            $this->repairOrderCustomers[] = $repairOrderCustomer;
            $repairOrderCustomer->setRepairOrder($this);
        }

        return $this;
    }

    public function getNotes(): array
    {
        return $this->notes->toArray();
    }

    public function addNote(RepairOrderNote $note): self
    {
        $this->notes->add($note);

        return $this;
    }

    public function getRepairOrderTeam(): Collection
    {
        return $this->repairOrderTeam;
    }

    public function addRepairOrderTeam(RepairOrderTeam $repairOrderTeam): self
    {
        if (!$this->repairOrderTeam->contains($repairOrderTeam)) {
            $this->repairOrderTeam[] = $repairOrderTeam;
            $repairOrderTeam->setRepairOrder($this);
        }

        return $this;
    }

    public function removeRepairOrderInteraction(RepairOrderInteraction $repairOrderInteraction): self
    {
        if ($this->repairOrderInteractions->contains($repairOrderInteraction)) {
            $this->repairOrderInteractions->removeElement($repairOrderInteraction);
            // set the owning side to null (unless already changed)
            if ($repairOrderInteraction->getRepairOrder() === $this) {
                $repairOrderInteraction->setRepairOrder(null);
            }
        }

        return $this;
    }

    public function removeRepairOrderCustomer(RepairOrderCustomer $repairOrderCustomer): self
    {
        if ($this->repairOrderCustomers->contains($repairOrderCustomer)) {
            $this->repairOrderCustomers->removeElement($repairOrderCustomer);
            // set the owning side to null (unless already changed)
            if ($repairOrderCustomer->getRepairOrder() === $this) {
                $repairOrderCustomer->setRepairOrder(null);
            }
        }

        return $this;
    }

    public function removeRepairOrderTeam(RepairOrderTeam $repairOrderTeam): self
    {
        if ($this->repairOrderTeam->contains($repairOrderTeam)) {
            $this->repairOrderTeam->removeElement($repairOrderTeam);
            // set the owning side to null (unless already changed)
            if ($repairOrderTeam->getRepairOrder() === $this) {
                $repairOrderTeam->setRepairOrder(null);
            }
        }

        return $this;
    }

    public function getMpiStatusTimestamp(): ?DateTime
    {
        return $this->mpiStatusTimestamp;
    }

    public function setMpiStatusTimestamp(DateTime $date = null): self
    {
        $this->mpiStatusTimestamp = $date;

        return $this;
    }

    public function getVideoStatusTimestamp(): ?DateTime
    {
        return $this->videoStatusTimestamp;
    }

    public function setVideoStatusTimestamp(DateTime $date = null): self
    {
        $this->videoStatusTimestamp  = $date;

        return $this;
    }

    public function getQuoteStatusTimestamp(): ?DateTime
    {
        return $this->quoteStatusTimestamp;
    }

    public function setQuoteStatusTimestamp(DateTime $date = null): self
    {
        $this->quoteStatusTimestamp  = $date;

        return $this;
    }

    public function getIPayStatusTimestamp(): ?DateTime
    {
        return $this->iPayStatusTimestamp;
    }

    public function setIPayStatusTimestamp(DateTime $date = null): self
    {
        $this->iPayStatusTimestamp  = $date;

        return $this;
    }
}
