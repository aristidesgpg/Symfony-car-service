<?php

namespace App\Entity;

use App\Repository\InternalMessageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InternalMessageRepository::class)
 */
class InternalMessage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="internalMessages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fromId;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="internalMessages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $toId;

    /**
     * @ORM\Column(type="text")
     */
    private $message;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isRead;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFromId(): ?User
    {
        return $this->fromId;
    }

    public function setFromId(?User $fromId): self
    {
        $this->fromId = $fromId;

        return $this;
    }

    public function getToId(): ?User
    {
        return $this->toId;
    }

    public function setToId(?User $toId): self
    {
        $this->toId = $toId;

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

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
}
