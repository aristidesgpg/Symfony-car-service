<?php

namespace App\Entity;

use App\Repository\FollowUpRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass=FollowUpRepository::class)
 */
class FollowUp
{
    public const GROUPS = ['fu_list', 'ro_list', 'fui_list','customer_list', 'user_list', 'roq_list', 'rot_list'];
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Serializer\Groups(groups={"fu_list"})
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=RepairOrder::class, inversedBy="followUp", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     * @Serializer\Groups(groups={"fu_list"})
     */
    private $repairOrder;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Serializer\Groups(groups={"fu_list"})
     */
    private $dateCreated;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Serializer\Groups(groups={"fu_list"})
     */
    private $dateSent;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Serializer\Groups(groups={"fu_list"})
     */
    private $dateViewed;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Serializer\Groups(groups={"fu_list"})
     */
    private $dateConverted;

    /**
     * @ORM\Column(type="string", length=12)
     * @Serializer\Groups(groups={"fu_list"})
     */
    private $status;

    /**
     * @ORM\OneToMany(targetEntity=FollowUpInteraction::class, mappedBy="followUp")
     * @Serializer\Groups(groups={"fu_list"})
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
