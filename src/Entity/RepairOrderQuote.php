<?php

namespace App\Entity;

use App\Repository\RepairOrderQuoteRepository;
use DateTime;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass=RepairOrderQuoteRepository::class)
 */
class RepairOrderQuote
{
    public const GROUPS = ['roq_list', 'ro_list', 'roqs_list', 'roqp_list', 'operation_code_list'];

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Serializer\Groups(groups={"roq_list"})
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=RepairOrder::class, inversedBy="repairOrderQuote")
     * @ORM\JoinColumn(nullable=false)
     */
    private $repairOrder;
    
    /**
     * @ORM\ManyToOne(targetEntity=User::class )
     * @ORM\JoinColumn(nullable=true)
     */
    private $completedUser;

    /**
     * @ORM\Column(type="datetime")
     * @Serializer\Groups(groups={"roq_list"})
     */
    private $dateCreated;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Serializer\Groups(groups={"roq_list"})
     */
    private $dateSent;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Serializer\Groups(groups={"roq_list"})
     */
    private $dateCustomerViewed;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Serializer\Groups(groups={"roq_list"})
     */
    private $dateCompleted;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Serializer\Groups(groups={"roq_list"})
     */
    private $dateConfirmed;

    /**
     * @ORM\OneToMany(targetEntity=RepairOrderQuoteRecommendation::class, mappedBy="repairOrderQuote", cascade={"persist", "remove"})
     * @Serializer\Groups(groups={"roq_list"})
     */
    private $repairOrderQuoteRecommendations;

    /**
     * @ORM\OneToMany(targetEntity=RepairOrderQuoteInteraction::class, mappedBy="repairOrderQuote", cascade={"persist", "remove"})
     */
    private $repairOrderQuoteInteractions;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status = 'Not Started';
    
    /**
     * @ORM\Column(type="float", nullable=true)
     * @Serializer\Groups(groups={"roqs_list"})
     */
    private $subtotal;
   
    /**
     * @ORM\Column(type="float", nullable=true)
     * @Serializer\Groups(groups={"roqs_list"})
     */
    private $tax;
    
    /**
     * @ORM\Column(type="float", nullable=true)
     * @Serializer\Groups(groups={"roqs_list"})
     */
    private $total;

    /**
     * @ORM\OneToMany(targetEntity=RepairOrderQuoteLog::class, mappedBy="repairOrderQuote", orphanRemoval=true)
     * @Serializer\Groups(groups={"roq_log"})
     */
    private $repairOrderQuoteLogs;


    public function __construct()
    {
        $this->dateCreated = new DateTime();
        $this->repairOrderQuoteRecommendations = new ArrayCollection();
        $this->repairOrderQuoteInteractions = new ArrayCollection();
        $this->repairOrderQuoteLogs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRepairOrder(): ?RepairOrder
    {
        return $this->repairOrder;
    }

    public function setRepairOrder(RepairOrder $repairOrder): self
    {
        $this->repairOrder = $repairOrder;

        return $this;
    }

    public function getDateCreated(): ?DateTimeInterface
    {
        return $this->dateCreated;
    }

    public function setDateCreated(DateTimeInterface $dateCreated): self
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    public function getDateSent(): ?DateTimeInterface
    {
        return $this->dateSent;
    }

    public function setDateSent(?DateTimeInterface $dateSent): self
    {
        $this->dateSent = $dateSent;

        return $this;
    }

    public function getDateCustomerViewed(): ?DateTimeInterface
    {
        return $this->dateCustomerViewed;
    }

    public function setDateCustomerViewed(?DateTimeInterface $dateCustomerViewed): self
    {
        $this->dateCustomerViewed = $dateCustomerViewed;

        return $this;
    }

    public function getDateCompleted(): ?DateTimeInterface
    {
        return $this->dateCompleted;
    }

    public function setDateCompleted(?DateTimeInterface $dateCompleted): self
    {
        $this->dateCompleted = $dateCompleted;

        return $this;
    }

    public function getDateConfirmed(): ?DateTimeInterface
    {
        return $this->dateConfirmed;
    }

    public function setDateConfirmed(?DateTimeInterface $dateConfirmed): self
    {
        $this->dateConfirmed = $dateConfirmed;

        return $this;
    }

    /**
     * @return Collection|RepairOrderQuoteRecommendation[]
     */
    public function getRepairOrderQuoteRecommendations(): Collection
    {
        return $this->repairOrderQuoteRecommendations;
    }

    public function addRepairOrderQuoteRecommendation(RepairOrderQuoteRecommendation $repairOrderQuoteRecommendation
    ): self {
        if (!$this->repairOrderQuoteRecommendations->contains($repairOrderQuoteRecommendation)) {
            $this->repairOrderQuoteRecommendations[] = $repairOrderQuoteRecommendation;
            $repairOrderQuoteRecommendation->setRepairOrderQuote($this);
        }

        return $this;
    }

    public function removeRepairOrderQuoteRecommendation(RepairOrderQuoteRecommendation $repairOrderQuoteRecommendation
    ): self {
        if ($this->repairOrderQuoteRecommendations->removeElement($repairOrderQuoteRecommendation)) {
            // set the owning side to null (unless already changed)
            if ($repairOrderQuoteRecommendation->getRepairOrderQuote() === $this) {
                $repairOrderQuoteRecommendation->setRepairOrderQuote(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|RepairOrderQuoteInteraction[]
     */
    public function getRepairOrderQuoteInteractions(): Collection
    {
        return $this->repairOrderQuoteInteractions;
    }

    public function addRepairOrderQuoteInteraction(RepairOrderQuoteInteraction $repairOrderQuoteInteraction): self
    {
        if (!$this->repairOrderQuoteInteractions->contains($repairOrderQuoteInteraction)) {
            $this->repairOrderQuoteInteractions[] = $repairOrderQuoteInteraction;
            $repairOrderQuoteInteraction->setRepairOrderQuote($this);
        }

        return $this;
    }

    public function removeRepairOrderQuoteInteraction(RepairOrderQuoteInteraction $repairOrderQuoteInteraction): self
    {
        if ($this->repairOrderQuoteInteractions->contains($repairOrderQuoteInteraction)) {
            $this->repairOrderQuoteInteractions->removeElement($repairOrderQuoteInteraction);
            // set the owning side to null (unless already changed)
            if ($repairOrderQuoteInteraction->getRepairOrderQuote() === $this) {
                $repairOrderQuoteInteraction->setRepairOrderQuote(null);
            }
        }

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function setSubtotal(?float $subtotal): self
    {
        $this->subtotal = $subtotal;

        return $this;
    }

    public function getSubtotal(): ?float
    {
        return $this->subtotal;
    }
    
    public function setTax(?float $tax): self
    {
        $this->tax = $tax;

        return $this;
    }

    public function getTax(): ?float
    {
        return $this->tax;
    }

    public function setTotal(?float $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setCompletedUser(?User $user): self
    {
        $this->completedUser = $user;

        return $this;
    }

    public function getCompletedUser(): ?User
    {
        return $this->completedUser;
    }

    /**
     * @return Collection|RepairOrderQuoteLog[]
     */
    public function getRepairOrderQuoteLogs(): Collection
    {
        return $this->repairOrderQuoteLogs;
    }

    public function addRepairOrderQuoteLog(RepairOrderQuoteLog $repairOrderQuoteLog): self
    {
        if (!$this->repairOrderQuoteLogs->contains($repairOrderQuoteLog)) {
            $this->repairOrderQuoteLogs[] = $repairOrderQuoteLog;
            $repairOrderQuoteLog->setRepairOrderQuote($this);
        }

        return $this;
    }

    public function removeRepairOrderQuoteLog(RepairOrderQuoteLog $repairOrderQuoteLog): self
    {
        if ($this->repairOrderQuoteLogs->removeElement($repairOrderQuoteLog)) {
            // set the owning side to null (unless already changed)
            if ($repairOrderQuoteLog->getRepairOrderQuote() === $this) {
                $repairOrderQuoteLog->setRepairOrderQuote(null);
            }
        }

        return $this;
    }
}
