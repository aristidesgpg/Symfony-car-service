<?php

namespace App\Entity;

use App\Repository\RepairOrderCustomerRepository;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
/**
 * @ORM\Entity(repositoryClass=RepairOrderCustomerRepository::class)
 */
class RepairOrderCustomer
{
    public const GROUPS = ['roc_list','ro_list', 'customer_list'];
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer"),
     * @Serializer\Groups(groups={"roc_list"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=RepairOrder::class, inversedBy="repairOrderCustomers")
     * @ORM\JoinColumn(nullable=false),
     * @Serializer\Groups(groups={"roc_list"})
     * 
     */
    private $repairOrder;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="repairOrderCustomers")
     * @ORM\JoinColumn(nullable=false),
     * @Serializer\Groups(groups={"roc_list"})}
     */

    private $customer;

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

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }
}
