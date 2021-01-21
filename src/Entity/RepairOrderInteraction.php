<?php

namespace App\Entity;

use App\Repository\RepairOrderInteractionRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass=RepairOrderInteractionRepository::class)
 */
class RepairOrderInteraction
{
    public const GROUPS = ['ro_interaction_list', 'customer_list'];

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Serializer\Groups(groups={"ro_interaction_list"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=RepairOrder::class, inversedBy="repairOrderInteractions")
     */
    private $repairOrder;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="repairOrderInteractions")
     * @ORM\JoinColumn(nullable=true)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="repairOrderInteractions")
     * @ORM\JoinColumn(nullable=true)
     * @Serializer\Groups(groups={"ro_interaction_list"})
     */
    private $customer;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups(groups={"ro_interaction_list"})
     */
    private $type;

    /**
     * @ORM\Column(type="datetime")
     * @Serializer\Groups(groups={"ro_interaction_list"})
     */
    private $date;

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

    public function setDate(\DateTimeInterface $date = null): self
    {
        if (!$date) {
            $this->date = new DateTime();
        }
        else {
            $this->date = $date;
        }
        
        return $this;
    }
}
