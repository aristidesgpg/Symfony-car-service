<?php

namespace App\Entity;

use App\Repository\CheckInRepository;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass=CheckInRepository::class)
 */
class CheckIn
{
    public const GROUPS = ['check_list'];
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Serializer\Groups(groups={"check_list"})
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $user_id;

    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="id")
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups(groups={"check_list"})
     */
    private $identification;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups(groups={"check_list"})
     */
    private $video;

    /**
     * @ORM\Column(type="datetime")
     * @Serializer\Groups(groups={"check_list"})
     */
    private $date;

    /**
     * @ORM\Column(type="boolean")
     * @Serializer\Groups(groups={"check_list"})
     */
    private $deleted = false;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(?int $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getIdentification(): ?string
    {
        return $this->identification;
    }

    public function setIdentification(string $identification): self
    {
        $this->identification = $identification;

        return $this;
    }

    public function getVideo(): ?string
    {
        return $this->video;
    }

    public function setVideo(string $video): self
    {
        $this->video = $video;

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

    public function getDeleted(): ?bool
    {
        return $this->deleted;
    }

    public function setDeleted(bool $deleted): self
    {
        $this->deleted = $deleted;

        return $this;
    }
}
