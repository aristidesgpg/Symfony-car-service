<?php

namespace App\Entity;

use App\Repository\RepairOrderQuoteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use DateTime;

/**
 * @ORM\Entity(repositoryClass=RepairOrderQuoteRepository::class)
 */
class RepairOrderQuote
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Serializer\Groups(groups={"roq_list"})
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=RepairOrder::class, inversedBy="repairOrderQuote", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     * @Serializer\Groups(groups={"roq_list"})
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
     * @ORM\Column(type="boolean")
     * @Serializer\Groups(groups={"roq_list"})
     */
    private $deleted = false;

    /**
     * @ORM\OneToMany(targetEntity=RepairOrderQuoteService::class, mappedBy="repairOrderQuote")
     */
    private $repairOrderQuoteServices;

    public function __construct()
    {
        $this->dateCreated              = new DateTime();
        $this->repairOrderQuoteServices = new ArrayCollection();
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

    public function getDateCreated(): ?\DateTimeInterface
    {
        return $this->dateCreated;
    }

    public function setDateCreated(\DateTimeInterface $dateCreated): self
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    public function getDateSent(): ?\DateTimeInterface
    {
        return $this->dateSent;
    }

    public function setDateSent(?\DateTimeInterface $dateSent): self
    {
        $this->dateSent = $dateSent;

        return $this;
    }

    public function getDateCustomerViewed(): ?\DateTimeInterface
    {
        return $this->dateCustomerViewed;
    }

    public function setDateCustomerViewed(?\DateTimeInterface $dateCustomerViewed): self
    {
        $this->dateCustomerViewed = $dateCustomerViewed;

        return $this;
    }

    public function getDateCustomerCompleted(): ?\DateTimeInterface
    {
        return $this->dateCustomerCompleted;
    }

    public function setDateCustomerCompleted(?\DateTimeInterface $dateCustomerCompleted): self
    {
        $this->dateCustomerCompleted = $dateCustomerCompleted;

        return $this;
    }

    public function getDateCompletedViewed(): ?\DateTimeInterface
    {
        return $this->dateCompletedViewed;
    }

    public function setDateCompletedViewed(?\DateTimeInterface $dateCompletedViewed): self
    {
        $this->dateCompletedViewed = $dateCompletedViewed;

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
     * @return Collection|RepairOrderQuoteService[]
     */
    public function getRepairOrderQuoteServices(): Collection
    {
        return $this->repairOrderQuoteServices;
    }

    public function addRepairOrderQuoteService(RepairOrderQuoteService $repairOrderQuoteService): self
    {
        if (!$this->repairOrderQuoteServices->contains($repairOrderQuoteService)) {
            $this->repairOrderQuoteServices[] = $repairOrderQuoteService;
            $repairOrderQuoteService->setRepairOrderQuote($this);
        }

        return $this;
    }

    public function removeRepairOrderQuoteService(RepairOrderQuoteService $repairOrderQuoteService): self
    {
        if ($this->repairOrderQuoteServices->removeElement($repairOrderQuoteService)) {
            // set the owning side to null (unless already changed)
            if ($repairOrderQuoteService->getRepairOrderQuote() === $this) {
                $repairOrderQuoteService->setRepairOrderQuote(null);
            }
        }

        return $this;
    }
}
