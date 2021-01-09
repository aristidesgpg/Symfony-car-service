<?php

namespace App\Entity;

use App\Repository\RepairOrderRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass=RepairOrderRepository::class)
 */
class RepairOrder
{
    public const GROUPS = ['ro_list', 'customer_list', 'user_list', 'roq_list'];

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
     */
    private $waiver;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $waiverVerbiage;

    /**
     * @ORM\Column(type="boolean")
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $upgradeQue = false;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $note;

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
     * @ORM\Column(type="boolean")
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $archived = false;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\RepairOrderVideo", mappedBy="repairOrder")
     */
    private $videos;

    /**
     * @ORM\OneToOne(targetEntity=RepairOrderQuote::class, mappedBy="repairOrder", cascade={"persist", "remove"})
     * @Serializer\Groups(groups={"ro_list"})
     */
    private $repairOrderQuote;

    /**
     * RepairOrder constructor.
     */
    public function __construct()
    {
        $this->dateCreated = new DateTime();
        $this->videos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Customer
     */
    public function getPrimaryCustomer(): ?Customer
    {
        return $this->primaryCustomer;
    }

    /**
     * @return $this
     */
    public function setPrimaryCustomer(Customer $primaryCustomer): self
    {
        $this->primaryCustomer = $primaryCustomer;

        return $this;
    }

    /**
     * @return User
     */
    public function getPrimaryTechnician(): ?User
    {
        return $this->primaryTechnician;
    }

    /**
     * @return $this
     */
    public function setPrimaryTechnician(User $primaryTechnician): self
    {
        $this->primaryTechnician = $primaryTechnician;

        return $this;
    }

    public function getPrimaryAdvisor(): ?User
    {
        return $this->primaryAdvisor;
    }

    /**
     * @return $this
     */
    public function setPrimaryAdvisor(User $primaryAdvisor): self
    {
        $this->primaryAdvisor = $primaryAdvisor;

        return $this;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    /**
     * @return $this
     */
    public function setNumber(string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getVideoStatus(): ?string
    {
        return $this->videoStatus;
    }

    /**
     * @return $this
     */
    public function setVideoStatus(string $videoStatus): self
    {
        $this->videoStatus = $videoStatus;

        return $this;
    }

    public function getMpiStatus(): ?string
    {
        return $this->mpiStatus;
    }

    /**
     * @return $this
     */
    public function setMpiStatus(string $mpiStatus): self
    {
        $this->mpiStatus = $mpiStatus;

        return $this;
    }

    public function getQuoteStatus(): ?string
    {
        return $this->quoteStatus;
    }

    /**
     * @return $this
     */
    public function setQuoteStatus(string $quoteStatus): self
    {
        $this->quoteStatus = $quoteStatus;

        return $this;
    }

    public function getPaymentStatus(): ?string
    {
        return $this->paymentStatus;
    }

    /**
     * @return $this
     */
    public function setPaymentStatus(string $paymentStatus): self
    {
        $this->paymentStatus = $paymentStatus;

        return $this;
    }

    public function getStartValue(): ?float
    {
        return $this->startValue;
    }

    /**
     * @return $this
     */
    public function setStartValue(?float $startValue): self
    {
        $this->startValue = $startValue;

        return $this;
    }

    public function getFinalValue(): ?float
    {
        return $this->finalValue;
    }

    /**
     * @return $this
     */
    public function setFinalValue(?float $finalValue): self
    {
        $this->finalValue = $finalValue;

        return $this;
    }

    public function getApprovedValue(): ?float
    {
        return $this->approvedValue;
    }

    /**
     * @return $this
     */
    public function setApprovedValue(?float $approvedValue): self
    {
        $this->approvedValue = $approvedValue;

        return $this;
    }

    public function getDateCreated(): ?DateTime
    {
        return $this->dateCreated;
    }

    /**
     * @return $this
     */
    public function setDateCreated(DateTime $dateCreated): self
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    public function getDateClosed(): ?DateTime
    {
        return $this->dateClosed;
    }

    public function isClosed(): bool
    {
        return null !== $this->dateClosed;
    }

    /**
     * @return $this
     */
    public function setDateClosed(?DateTime $dateClosed): self
    {
        $this->dateClosed = $dateClosed;

        return $this;
    }

    public function getWaiter(): ?bool
    {
        return $this->waiter;
    }

    /**
     * @return $this
     */
    public function setWaiter(bool $waiter): self
    {
        $this->waiter = $waiter;

        return $this;
    }

    public function getPickupDate(): ?DateTime
    {
        return $this->pickupDate;
    }

    /**
     * @return $this
     */
    public function setPickupDate(?DateTime $pickupDate): self
    {
        $this->pickupDate = $pickupDate;

        return $this;
    }

    public function getLinkHash(): ?string
    {
        return $this->linkHash;
    }

    /**
     * @return $this
     */
    public function setLinkHash(string $linkHash): self
    {
        $this->linkHash = $linkHash;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    /**
     * @return $this
     */
    public function setYear(?int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getMake(): ?string
    {
        return $this->make;
    }

    /**
     * @return $this
     */
    public function setMake(?string $make): self
    {
        $this->make = $make;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    /**
     * @return $this
     */
    public function setModel(?string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getMiles(): ?int
    {
        return $this->miles;
    }

    /**
     * @return $this
     */
    public function setMiles(?int $miles): self
    {
        $this->miles = $miles;

        return $this;
    }

    public function getVin(): ?string
    {
        return $this->vin;
    }

    /**
     * @return $this
     */
    public function setVin(?string $vin): self
    {
        $this->vin = $vin;

        return $this;
    }

    public function getInternal(): ?bool
    {
        return $this->internal;
    }

    /**
     * @return $this
     */
    public function setInternal(bool $internal): self
    {
        $this->internal = $internal;

        return $this;
    }

    public function getDmsKey(): ?string
    {
        return $this->dmsKey;
    }

    /**
     * @return $this
     */
    public function setDmsKey(?string $dmsKey): self
    {
        $this->dmsKey = $dmsKey;

        return $this;
    }

    public function getWaiver(): ?string
    {
        return $this->waiver;
    }

    /**
     * @return $this
     */
    public function setWaiver(?string $waiver): self
    {
        $this->waiver = $waiver;

        return $this;
    }

    public function getWaiverVerbiage(): ?string
    {
        return $this->waiverVerbiage;
    }

    /**
     * @return $this
     */
    public function setWaiverVerbiage(?string $waiverVerbiage): self
    {
        $this->waiverVerbiage = $waiverVerbiage;

        return $this;
    }

    public function getUpgradeQue(): ?bool
    {
        return $this->upgradeQue;
    }

    /**
     * @return $this
     */
    public function setUpgradeQue(bool $upgradeQue): self
    {
        $this->upgradeQue = $upgradeQue;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @return $this
     */
    public function setNote(?string $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getDeleted(): ?bool
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

    public function isArchived(): bool
    {
        return true === $this->archived;
    }

    /**
     * @return $this
     */
    public function setArchived(bool $archived): self
    {
        $this->archived = $archived;

        return $this;
    }

    public function getRepairOrderQuote(): ?RepairOrderQuote
    {
        return $this->repairOrderQuote;
    }

    public function setRepairOrderQuote(RepairOrderQuote $repairOrderQuote): self
    {
        $this->repairOrderQuote = $repairOrderQuote;

        // set the owning side of the relation if necessary
        if ($repairOrderQuote->getRepairOrder() !== $this) {
            $repairOrderQuote->setRepairOrder($this);
        }

        return $this;
    }

    /**
     * @return RepairOrderVideo[]
     */
    public function getVideos(): array
    {
        return $this->videos->toArray();
    }

    public function addVideo(RepairOrderVideo $video): self
    {
        $this->videos->add($video);

        return $this;
    }
}
