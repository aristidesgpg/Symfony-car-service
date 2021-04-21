<?php

namespace App\Entity;

use App\Repository\RepairOrderReviewInteractionsRepository;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass=RepairOrderReviewInteractionsRepository::class)
 */
class RepairOrderReviewInteractions
{
    public const GROUPS = ['ror_interactions_list', 'user_list', 'customer_list'];
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Serializer\Groups(groups={"ror_interactions_list"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=RepairOrderReview::class, inversedBy="repairOrderReviewInteractions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $repairOrderReview;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="repairOrderReviewInteractions")
     * @Serializer\Groups(groups={"ror_interactions_list"})
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="repairOrderReviewInteractions")
     * @Serializer\Groups(groups={"ror_interactions_list"})
     */
    private $customer;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     * @Serializer\Groups(groups={"ror_interactions_list"})
     */
    private $type;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRepairOrderReview(): ?RepairOrderReview
    {
        return $this->repairOrderReview;
    }

    public function setRepairOrderReview(?RepairOrderReview $repairOrderReview): self
    {
        $this->repairOrderReview = $repairOrderReview;

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

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
