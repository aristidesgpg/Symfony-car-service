<?php

namespace App\Entity;

use App\Repository\RepairOrderQuoteInteractionRepository;
use Doctrine\ORM\Mapping as ORM;
use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass=RepairOrderQuoteInteractionRepository::class)
 */
class RepairOrderQuoteInteraction
{
    public const GROUPS = ['roqi_list', 'user_list', 'customer_list'];
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Serializer\Groups(groups={"roqi_list"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=RepairOrderQuote::class, inversedBy="repairOrderQuoteInteractions")
     * @ORM\JoinColumn(nullable=false)
     * @Serializer\Groups(groups={"roqi_list"})
     */
    private $repairOrderQuote;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="repairOrderQuoteInteractions")
     * @Serializer\Groups(groups={"roqi_list"})
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="type")
     * @Serializer\Groups(groups={"roqi_list"})
     */
    private $customer;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups(groups={"roqi_list"})
     */
    private $type;

    /**
     * @ORM\Column(type="datetime")
     * @Serializer\Groups(groups={"roqi_list"})
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

    public function getRepairOrderQuote(): ?RepairOrderQuote
    {
        return $this->repairOrderQuote;
    }

    public function setRepairOrderQuote(?RepairOrderQuote $repairOrderQuote): self
    {
        $this->repairOrderQuote = $repairOrderQuote;

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
