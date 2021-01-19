<?php

namespace App\Entity;

use App\Repository\FollowUpInteractionRepository;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass=FollowUpInteractionRepository::class)
 */
class FollowUpInteraction
{
    public const GROUPS = ['user_list', 'customer_list', 'fui_list'];
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Serializer\Groups(groups={"fui_list"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=FollowUp::class, inversedBy="followUpInteractions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $followUp;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="followUpInteractions")
     * @Serializer\Groups(groups={"fui_list"})
     */
    private $customer;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="followUpInteractions")
     * @Serializer\Groups(groups={"fui_list"})
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=12)
     * @Serializer\Groups(groups={"fui_list"})
     */
    private $type;

    /**
     * @ORM\Column(type="datetime")
     * @Serializer\Groups(groups={"fui_list"})
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
