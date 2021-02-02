<?php

namespace App\Entity;

use App\Repository\ServiceSMSRepository;
use DateTime;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass=ServiceSMSRepository::class)
 * @ORM\Table(name="service_sms")
 */
class ServiceSMS
{
    public const GROUPS = ['sms_list', 'user_list', 'customer_list'];

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Serializer\Groups({"sms_list"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="serviceSMS")
     * @ORM\JoinColumn(nullable=true)
     * @Serializer\Groups({"sms_list"})
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="serviceSMS")
     * @ORM\JoinColumn(nullable=false)
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
    private $isRead = false;

    /**
     * @ORM\Column(type="datetime")
     * @Serializer\Groups({"sms_list"})
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sid;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $status;

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
        return $this->isRead;
    }

    public function setIsRead(bool $isRead): self
    {
        $this->isRead = $isRead;

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

    public function getSid(): ?string
    {
        return $this->sid;
    }

    public function setSid(string $sid): self
    {
        $this->sid = $sid;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }
}
