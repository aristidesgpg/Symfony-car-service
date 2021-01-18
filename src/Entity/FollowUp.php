<?php

namespace App\Entity;

use App\Repository\FollowUpRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FollowUpRepository::class)
 */
class FollowUp
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=RepairOrder::class, inversedBy="followUp", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $repairOrder;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateCreated;

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
    private $dateConverted;

    /**
     * @ORM\Column(type="string", length=12)
     */
    private $status;

    /**
     * @ORM\OneToMany(targetEntity=FollowUpInteraction::class, mappedBy="followUp")
     */
    private $followUpInteractions;

    public function __construct()
    {
        $this->followUpInteractions = new ArrayCollection();
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

    public function setDateCreated(?\DateTimeInterface $dateCreated): self
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

    public function getDateViewed(): ?\DateTimeInterface
    {
        return $this->dateViewed;
    }

    public function setDateViewed(?\DateTimeInterface $dateViewed): self
    {
        $this->dateViewed = $dateViewed;

        return $this;
    }

    public function getDateConverted(): ?\DateTimeInterface
    {
        return $this->dateConverted;
    }

    public function setDateConverted(?\DateTimeInterface $dateConverted): self
    {
        $this->dateConverted = $dateConverted;

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

    /**
     * @return Collection|FollowUpInteraction[]
     */
    public function getFollowUpInteractions(): Collection
    {
        return $this->followUpInteractions;
    }

    public function addFollowUpInteraction(FollowUpInteraction $followUpInteraction): self
    {
        if (!$this->followUpInteractions->contains($followUpInteraction)) {
            $this->followUpInteractions[] = $followUpInteraction;
            $followUpInteraction->setFollowUp($this);
        }

        return $this;
    }

    public function removeFollowUpInteraction(FollowUpInteraction $followUpInteraction): self
    {
        if ($this->followUpInteractions->contains($followUpInteraction)) {
            $this->followUpInteractions->removeElement($followUpInteraction);
            // set the owning side to null (unless already changed)
            if ($followUpInteraction->getFollowUp() === $this) {
                $followUpInteraction->setFollowUp(null);
            }
        }

        return $this;
    }
}
