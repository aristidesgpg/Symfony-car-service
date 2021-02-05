<?php

namespace App\Entity;

use App\Repository\RepairOrderMPIInteractionRepository;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use DateTime;

/**
 * @ORM\Entity(repositoryClass=RepairOrderMPIInteractionRepository::class)
 * @ORM\Table(name="repair_order_mpi_interaction")
 */
class RepairOrderMPIInteraction
{
    public const GROUPS = ['romi_list', 'rom_list', 'user_list', 'customer_list'];
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Serializer\Groups(groups={"romi_list"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=RepairOrderMPI::class, inversedBy="repairOrderMPIInteractions")
     * @ORM\JoinColumn(nullable=false)
     * @Serializer\Groups(groups={"romi_list"})
     */
    private $repairOrderMPI;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="repairOrderMPIInteractions")
     * @ORM\JoinColumn(nullable=true)
     * @Serializer\Groups(groups={"romi_list"})
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="repairOrderMPIInteractions")
     * @ORM\JoinColumn(nullable=true)
     * @Serializer\Groups(groups={"romi_list"})
     */
    private $customer;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups(groups={"romi_list"})
     */
    private $type;

    /**
     * @ORM\Column(type="datetime")
     * @Serializer\Groups(groups={"romi_list"})
     */
    private $date;

    public function __construct()
    {
        $this->date = new DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRepairOrderMPI(): ?RepairOrderMPI
    {
        return $this->repairOrderMPI;
    }

    public function setRepairOrderMPI(?RepairOrderMPI $repairOrderMPI): self
    {
        $this->repairOrderMPI = $repairOrderMPI;

        return $this;
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

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
}
