<?php

namespace App\Entity;

use App\Repository\PartRepository;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass=PartRepository::class)
 */
class Part
{
    public const GROUPS = ['part_list'];
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Serializer\Groups(groups={"part_list"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     * @Serializer\Groups(groups={"part_list"})
     */
    private $number;

    /**
     * @ORM\Column(type="string", length=30)
     * @Serializer\Groups(groups={"part_list"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Serializer\Groups(groups={"part_list"})
     */
    private $bin;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Serializer\Groups(groups={"part_list"})
     */
    private $available;
    
    /**
     * @ORM\Column(type="float", nullable=true)
     * @Serializer\Groups(groups={"part_list"})
     */
    private $price;
    
    /**
     * @ORM\Column(type="boolean")
     */
    private $deleted = false;
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(?string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getBin(): ?string
    {
        return $this->bin;
    }

    public function setBin(?string $bin): self
    {
        $this->bin = $bin;

        return $this;
    }

    public function getAvailable(): ?int
    {
        return $this->available;
    }

    public function setAvailable(?int $available): self
    {
        $this->available = $available;

        return $this;
    }
    
    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): self
    {
        $this->price = $price;

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
