<?php

namespace App\Entity;

use App\Repository\RepairOrderQuoteRecommendationPartRepository;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass=RepairOrderQuoteRecommendationPartRepository::class)
 */
class RepairOrderQuoteRecommendationPart
{
    public const GROUPS = ['roqp_list'];
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=RepairOrderQuoteRecommendation::class, inversedBy="repairOrderQuoteRecommendationParts")
     * @ORM\JoinColumn(nullable=false)
     * @Serializer\Groups(groups={"roqp_list"})
     */
    private $repairOrderRecommendation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Serializer\Groups(groups={"roqp_list"})
     */
    private $number;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Serializer\Groups(groups={"roqp_list"})
     */
    private $name;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Serializer\Groups(groups={"roqp_list"})
     */
    private $price;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Serializer\Groups(groups={"roqp_list"})
     */
    private $quantity;
    
    /**
     * @ORM\Column(type="float", nullable=true)
     * @Serializer\Groups(groups={"roqp_list"})
     */
    private $totalPrice;

     /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Serializer\Groups(groups={"roqp_list"})
     */
    private $bin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRepairOrderRecommendation(): ?RepairOrderQuoteRecommendation
    {
        return $this->repairOrderRecommendation;
    }

    public function setRepairOrderRecommendation(?RepairOrderQuoteRecommendation $repairOrderRecommendation): self
    {
        $this->repairOrderRecommendation = $repairOrderRecommendation;

        return $this;
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

    public function setName(?string $name): self
    {
        $this->name = $name;

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

    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    public function setQuantity(?float $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getTotalPrice(): ?float
    {
        return $this->totalPrice;
    }

    public function setTotalPrice(?float $totalPrice): self
    {
        $this->totalPrice = $totalPrice;

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
}
