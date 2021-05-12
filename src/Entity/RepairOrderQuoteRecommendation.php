<?php

namespace App\Entity;

use App\Repository\RepairOrderQuoteRecommendationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass=RepairOrderQuoteRecommendationRepository::class)
 */
class RepairOrderQuoteRecommendation
{
    public const GROUPS = ['roqs_list', 'roq_list', 'roqp_list', 'operation_code_list'];
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Serializer\Groups(groups={"roqs_list"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=RepairOrderQuote::class, inversedBy="RepairOrderQuoteRecommendations")
     * @ORM\JoinColumn(nullable=false)
     * @Serializer\Groups(groups={"roqs_list"})
     */
    private $repairOrderQuote;

    /**
     * @ORM\Column(type="string", nullable=false)
     * @Serializer\Groups(groups={"roqs_list"})
     */
    private $operationCode;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Serializer\Groups(groups={"roqs_list"})
     */
    private $description;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Serializer\Groups(groups={"roqs_list"})
     */
    private $preApproved = false;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Serializer\Groups(groups={"roqs_list"})
     */
    private $approved;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Serializer\Groups(groups={"roqs_list"})
     */
    private $partsPrice;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Serializer\Groups(groups={"roqs_list"})
     */
    private $suppliesPrice;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Serializer\Groups(groups={"roqs_list"})
     */
    private $laborPrice;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Serializer\Groups(groups={"roqs_list"})
     */
    private $laborTax;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Serializer\Groups(groups={"roqs_list"})
     */
    private $partsTax;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Serializer\Groups(groups={"roqs_list"})
     */
    private $suppliesTax;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Serializer\Groups(groups={"roqs_list"})
     */
    private $laborHours;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Serializer\Groups(groups={"roqs_list"})
     */
    private $laborTaxable;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Serializer\Groups(groups={"roqs_list"})
     */
    private $partsTaxable;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Serializer\Groups(groups={"roqs_list"})
     */
    private $suppliesTaxable;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Serializer\Groups(groups={"roqs_list"})
     */
    private $notes;

    /**
     * @ORM\OneToMany(targetEntity=RepairOrderQuoteRecommendationPart::class, mappedBy="repairOrderRecommendation", orphanRemoval=true)
     * @Serializer\Groups(groups={"roqs_list"})
     */
    private $repairOrderQuoteRecommendationParts;

    public function __construct()
    {
        $this->repairOrderQuoteRecommendationParts = new ArrayCollection();
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

    public function getOperationCode(): ?string
    {
        return $this->operationCode;
    }

    public function setOperationCode(?string $operationCode): self
    {
        $this->operationCode = $operationCode;

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

    public function getPreApproved(): ?bool
    {
        return $this->preApproved;
    }

    public function setPreApproved(?bool $preApproved): self
    {
        $this->preApproved = $preApproved;

        return $this;
    }

    public function getApproved(): ?bool
    {
        return $this->approved;
    }

    public function setApproved(?bool $approved): self
    {
        $this->approved = $approved;

        return $this;
    }

    public function getPartsPrice(): ?float
    {
        return $this->partsPrice;
    }

    public function setPartsPrice(?float $partsPrice): self
    {
        $this->partsPrice = $partsPrice;

        return $this;
    }

    public function getSuppliesPrice(): ?float
    {
        return $this->suppliesPrice;
    }

    public function setSuppliesPrice(?float $suppliesPrice): self
    {
        $this->suppliesPrice = $suppliesPrice;

        return $this;
    }

    public function getLaborPrice(): ?float
    {
        return $this->laborPrice;
    }

    public function setLaborPrice(?float $laborPrice): self
    {
        $this->laborPrice = $laborPrice;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * @return Collection|RepairOrderQuoteRecommendationParts[]
     */
    public function getRepairOrderQuoteRecommendationParts(): Collection
    {
        return $this->repairOrderQuoteRecommendationParts;
    }

    public function addRepairOrderQuoteRecommendationPart(RepairOrderQuoteRecommendationPart $repairOrderQuoteRecommendationPart): self
    {
        if (!$this->repairOrderQuoteRecommendationParts->contains($repairOrderQuoteRecommendationPart)) {
            $this->repairOrderQuoteRecommendationParts[] = $repairOrderQuoteRecommendationPart;
            $repairOrderQuoteRecommendationPart->setRepairOrderRecommendation($this);
        }

        return $this;
    }

    public function removeRepairOrderQuoteRecommendationPart(RepairOrderQuoteRecommendationPart $repairOrderQuoteRecommendationPart): self
    {
        if ($this->repairOrderQuoteRecommendationParts->contains($repairOrderQuoteRecommendationPart)) {
            $this->repairOrderQuoteRecommendationParts->removeElement($repairOrderQuoteRecommendationPart);
            // set the owning side to null (unless already changed)
            if ($repairOrderQuoteRecommendationPart->getRepairOrderRecommendation() === $this) {
                $repairOrderQuoteRecommendationPart->setRepairOrderRecommendation(null);
            }
        }

        return $this;
    }

    public function setLaborTax(?float $laborTax): self
    {
        $this->laborTax = $laborTax;

        return $this;
    }

    public function getLaborTax(): ?float
    {
        return $this->laborTax;
    }


    public function setPartsTax(?float $partsTax): self
    {
        $this->partsTax = $partsTax;

        return $this;
    }

    public function getPartsTax(): ?float
    {
        return $this->partsTax;
    }

    public function setSuppliesTax(?float $suppliesTax): self
    {
        $this->suppliesTax = $suppliesTax;

        return $this;
    }

    public function getSuppliesTax(): ?float
    {
        return $this->suppliesTax;
    }

    public function setLaborHours(?float $laborHours): self
    {
        $this->laborHours = $laborHours;

        return $this;
    }

    public function getLaborHours(): ?float
    {
        return $this->laborHours;
    }

    public function getLaborTaxable(): ?bool
    {
        return $this->laborTaxable;
    }

    public function setLaborTaxable(?bool $laborTaxable): self
    {
        $this->laborTaxable = $laborTaxable;

        return $this;
    }

    public function getPartsTaxable(): ?bool
    {
        return $this->partsTaxable;
    }

    public function setPartsTaxable(?bool $partsTaxable): self
    {
        $this->partsTaxable = $partsTaxable;

        return $this;
    }

    public function getSuppliesTaxable(): ?bool
    {
        return $this->suppliesTaxable;
    }

    public function setSuppliesTaxable(?bool $suppliesTaxable): self
    {
        $this->suppliesTaxable = $suppliesTaxable;

        return $this;
    }
}
