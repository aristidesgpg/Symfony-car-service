<?php

namespace App\Entity;

use App\Repository\FollowUpInteractionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FollowUpInteractionRepository::class)
 */
class FollowUpInteraction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=FollowUp::class, inversedBy="followUpInteractions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $followUp;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="followUpInteractions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $customer;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="followUpInteractions")
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=12)
     */
    private $type;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFollowUp(): ?FollowUp
    {
        return $this->followUp;
    }

    public function setFollowUp(?FollowUp $followUp): self
    {
        $this->followUp = $followUp;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

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
