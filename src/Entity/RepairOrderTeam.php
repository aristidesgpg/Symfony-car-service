<?php

namespace App\Entity;

use App\Repository\RepairOrderTeamRepository;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass=RepairOrderTeamRepository::class)
 */
class RepairOrderTeam
{
    public const GROUPS = ['rot_list','ro_list', 'user_list'];
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Serializer\Groups(groups={"rot_list"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="repairOrderTeams")
     * @Serializer\Groups(groups={"rot_list"})
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=RepairOrder::class, inversedBy="repairOrderTeams")
     * @ORM\JoinColumn(nullable=false)
     * @Serializer\Groups(groups={"rot_list"})
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
