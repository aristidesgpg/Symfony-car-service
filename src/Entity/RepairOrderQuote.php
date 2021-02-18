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
    public const GROUPS = ['roq_list', 'ro_list', 'roqs_list'];

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
    private $dateCustomerCompleted;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Serializer\Groups(groups={"roq_list"})
     */
    private $dateCompletedViewed;

    /**
     * @ORM\OneToMany(targetEntity=RepairOrderQuoteRecommendation::class, mappedBy="repairOrderQuote", cascade={"persist", "remove"})
     * @Serializer\Groups(groups={"roq_list"})
     */
    private $repairOrderQuoteRecommendations;

    public function __construct()
    {
        $this->dateCreated = new DateTime();
        $this->repairOrderQuoteRecommendations = new ArrayCollection();
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

    public function getDateCustomerCompleted(): ?DateTimeInterface
    {
        return $this->dateCustomerCompleted;
    }

    public function setDateCustomerCompleted(?DateTimeInterface $dateCustomerCompleted): self
    {
        $this->dateCustomerCompleted = $dateCustomerCompleted;

        return $this;
    }

    public function getDateCompletedViewed(): ?DateTimeInterface
    {
        return $this->dateCompletedViewed;
    }

    public function setDateCompletedViewed(?DateTimeInterface $dateCompletedViewed): self
    {
        $this->dateCompletedViewed = $dateCompletedViewed;

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
}
