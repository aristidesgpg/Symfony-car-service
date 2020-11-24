<?php

namespace App\Entity;

use App\Repository\RepairOrderQuoteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RepairOrderQuoteRepository::class)
 */
class RepairOrderQuote
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=RepairOrder::class, inversedBy="repairOrderQuote", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $repairOrder;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreated;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateSent;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateCustomerViewed;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateCustomerCompleted;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateCompletedViewed;

    /**
     * @ORM\Column(type="boolean")
     */
    private $deleted;

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
}
