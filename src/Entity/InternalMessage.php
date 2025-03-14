<?php

namespace App\Entity;

use App\Repository\InternalMessageRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass=InternalMessageRepository::class)
 */
class InternalMessage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Serializer\Groups({"internal_message"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="internalMessages")
     * @ORM\JoinColumn(nullable=false)
     * @Serializer\Groups({"internal_message"})
     */
    private $from;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="internalMessages")
     * @ORM\JoinColumn(nullable=false)
     * @Serializer\Groups({"internal_message"})
     */
    private $to;

    /**
     * @ORM\Column(type="text")
     * @Serializer\Groups({"internal_message"})
     */
    private $message;

    /**
     * @ORM\Column(type="datetime")
     * @Serializer\Groups({"internal_message"})
     */
    private $date;

    /**
     * @ORM\Column(type="boolean")
     * @Serializer\Groups({"internal_message"})
     */
    private $isRead;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFrom(): ?User
    {
        return $this->from;
    }

    public function setFrom(?User $from): self
    {
        $this->from = $from;

        return $this;
    }

    public function getTo(): ?User
    {
        return $this->to;
    }

    public function setTo(?User $to): self
    {
        $this->to = $to;

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

    public function setDate($date = null): self
    {
        if (!$date) {
            try {
                $this->date = new DateTime();
            } catch (Exception $e) {
                //
            }
        } else {
            $this->date = $date;
        }

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
