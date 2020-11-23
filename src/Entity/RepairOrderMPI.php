<?php

namespace App\Entity;

use App\Repository\RepairOrderMPIRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use DateTime;

/**
 * @ORM\Entity(repositoryClass=RepairOrderMPIRepository::class)
 * @ORM\Table(name="repair_order_mpi")
 */
class RepairOrderMPI
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Serializer\Groups(groups={"rom_list"})
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=RepairOrder::class, inversedBy="repairOrderMPI", cascade={"persist", "remove"})
     * @Serializer\Groups(groups={"rom_list"})
     */
    private $repairOrder;

    /**
     * @ORM\Column(type="datetime")
     * @Serializer\Groups(groups={"rom_list"})
     */
    private $dateCompleted;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Serializer\Groups(groups={"rom_list"})
     */
    private $dateSent;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Serializer\Groups(groups={"rom_list"})
     */
    private $results;

    /**
     * @ORM\OneToMany(targetEntity=RepairOrderMPIInteraction::class, mappedBy="repairOrderMPI")
     */
    private $repairOrderMPIInteractions;

    public function __construct()
    {
        $this->dateCompleted = new DateTime();
        $this->repairOrderMPIInteractions = new ArrayCollection(); 
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRepairOrder(): ?RepairOrder
    {
        return $this->repairOrder;
    }

    public function setRepairOrder(?RepairOrder $repairOrder): self
    {
        $this->repairOrder = $repairOrder;

        return $this;
    }

    public function getDateCompleted(): ?\DateTimeInterface
    {
        return $this->dateCompleted;
    }

    public function setDateCompleted(\DateTimeInterface $dateCompleted): self
    {
        $this->dateCompleted = $dateCompleted;

        return $this;
    }

    public function getDateSent(): ?\DateTimeInterface
    {
        return $this->dateSent;
    }

    public function setDateSent(\DateTimeInterface $dateSent): self
    {
        $this->dateSent = $dateSent;

        return $this;
    }

    public function getResults(): ?string
    {
        return $this->results;
    }

    public function setResults(?string $results): self
    {
        $this->results = $results;

        return $this;
    }

    /**
     * @return Collection|RepairOrderMPIInteraction[]
     */
    public function getRepairOrderMPIInteractions(): Collection
    {
        return $this->repairOrderMPIInteractions;
    }

    public function addRepairOrderMPIInteraction(RepairOrderMPIInteraction $repairOrderMPIInteraction): self
    {
        if (!$this->repairOrderMPIInteractions->contains($repairOrderMPIInteraction)) {
            $this->repairOrderMPIInteractions[] = $repairOrderMPIInteraction;
            $repairOrderMPIInteraction->setRepairOrderMPI($this);
        }

        return $this;
    }

    public function removeRepairOrderMPIInteraction(RepairOrderMPIInteraction $repairOrderMPIInteraction): self
    {
        if ($this->repairOrderMPIInteractions->contains($repairOrderMPIInteraction)) {
            $this->repairOrderMPIInteractions->removeElement($repairOrderMPIInteraction);
            // set the owning side to null (unless already changed)
            if ($repairOrderMPIInteraction->getRepairOrderMPI() === $this) {
                $repairOrderMPIInteraction->setRepairOrderMPI(null);
            }
        }

        return $this;
    }
}
