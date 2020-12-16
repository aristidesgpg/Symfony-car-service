<?php

namespace App\Entity;

use App\Repository\ServiceSMSRepository;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use DateTime;

/**
 * @ORM\Entity(repositoryClass=ServiceSMSRepository::class)
 */
class ServiceSMS
{
    public const GROUPS = ['sms_list'];

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Serializer\Groups({"sms_list"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="serviceSMS")
     * @Serializer\Groups({"sms_list"})
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="serviceSMS")
     * @Serializer\Groups({"sms_list"})
     */
    private $customer;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups({"sms_list"})
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups({"sms_list"})
     */
    private $message;

    /**
     * @ORM\Column(type="boolean")
     * @Serializer\Groups({"sms_list"})
     */
    private $incoming;

    /**
     * @ORM\Column(type="boolean")
     * @Serializer\Groups({"sms_list"})
     */
    private $is_read = false;

    /**
     * @ORM\Column(type="datetime")
     * @Serializer\Groups({"sms_list"})
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

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getIncoming(): ?bool
    {
        return $this->incoming;
    }

    public function setIncoming(bool $incoming): self
    {
        $this->incoming = $incoming;

        return $this;
    }

    public function getIsRead(): ?bool
    {
        return $this->is_read;
    }

    public function setIsRead(bool $is_read): self
    {
        $this->is_read = $is_read;

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
