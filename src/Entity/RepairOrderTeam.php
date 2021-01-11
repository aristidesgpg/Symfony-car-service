<?php

namespace App\Entity;

use App\Repository\RepairOrderTeamRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RepairOrderTeamRepository::class)
 */
class RepairOrderTeam
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="repairOrderTeams")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=RepairOrder::class, inversedBy="repairOrderTeams")
     * @ORM\JoinColumn(nullable=false)
     */
    private $repairOrder;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
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
}
