<?php

namespace App\Entity;

use App\Repository\RepairOrderReviewRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RepairOrderReviewRepository::class)
 */
class RepairOrderReview
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=RepairOrder::class, inversedBy="repairOrderReview", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $repairOrder;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $status;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateSent;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateViewed;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateCompleted;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $rating;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $platform;

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

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

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

    public function getDateViewed(): ?\DateTimeInterface
    {
        return $this->dateViewed;
    }

    public function setDateViewed(?\DateTimeInterface $dateViewed): self
    {
        $this->dateViewed = $dateViewed;

        return $this;
    }

    public function getDateCompleted(): ?\DateTimeInterface
    {
        return $this->dateCompleted;
    }

    public function setDateCompleted(?\DateTimeInterface $dateCompleted): self
    {
        $this->dateCompleted = $dateCompleted;

        return $this;
    }

    public function getRating(): ?string
    {
        return $this->rating;
    }

    public function setRating(?string $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getPlatform(): ?string
    {
        return $this->platform;
    }

    public function setPlatform(?string $platform): self
    {
        $this->platform = $platform;

        return $this;
    }
}
