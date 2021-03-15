<?php

namespace App\Entity;

use App\Repository\RecommendationPartRepository;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass=RecommendationPartRepository::class)
 */
class RecommendationPart
{
    public const GROUPS = ['rp_list'];
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=RepairOrderQuoteRecommendation::class, inversedBy="recommendationParts")
     * @ORM\JoinColumn(nullable=false)
     * @Serializer\Groups(groups={"rp_list"})
     */
    private $repairOrderRecommendation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Serializer\Groups(groups={"rp_list"})
     */
    private $number;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Serializer\Groups(groups={"rp_list"})
     */
    private $description;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Serializer\Groups(groups={"rp_list"})
     */
    private $price;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Serializer\Groups(groups={"rp_list"})
     */
    private $quantity;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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
}
