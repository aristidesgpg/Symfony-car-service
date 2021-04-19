<?php

namespace App\Entity;

use App\Repository\RepairOrderQuoteLogRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass=RepairOrderQuoteLogRepository::class)
 */
class RepairOrderQuoteLog
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Serializer\Groups(groups={"roq_log"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=RepairOrderQuote::class, inversedBy="repairOrderQuoteLogs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $repairOrderQuote;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @Serializer\Groups(groups={"roq_log"})
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class)
     * @Serializer\Groups(groups={"roq_log"})
     */
    private $customer;

    /**
     * @ORM\Column(type="datetime")
     * @Serializer\Groups(groups={"roq_log"})
     */
    private $date;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Serializer\Groups(groups={"roq_log"})
     */
    private $data;

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

    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getData(): ?string
    {
        return $this->data;
    }

    public function setData(?string $data): self
    {
        $this->data = $data;

        return $this;
    }
}
