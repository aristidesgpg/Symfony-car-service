<?php

namespace App\Entity;

use App\Repository\RepairOrderQuoteServiceRepository;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use DateTime;

/**
 * @ORM\Entity(repositoryClass=RepairOrderQuoteServiceRepository::class)
 */
class RepairOrderQuoteService
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Serializer\Groups(groups={"roqs_list"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=RepairOrderQuote::class, inversedBy="repairOrderQuoteServices")
     * @ORM\JoinColumn(nullable=false)
     * @Serializer\Groups(groups={"roqs_list"})
     */
    private $repairOrderQuote;

    /**
     * @ORM\ManyToOne(targetEntity=OperationCode::class, inversedBy="repairOrderQuoteServices")
     * @ORM\JoinColumn(nullable=false)
     * @Serializer\Groups(groups={"roqs_list"})
     */
    private $operationCode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
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
    private $approved = false;

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
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Serializer\Groups(groups={"roqs_list"})
     */
    private $notes;

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

    public function getOperationCode(): ?OperationCode
    {
        return $this->operationCode;
    }

    public function setOperationCode(?OperationCode $operationCode): self
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
}
