<?php

namespace App\Entity;

use App\Repository\OperationCodeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OperationCodeRepository::class)
 */
class OperationCode
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $laborHours;

    /**
     * @ORM\Column(type="boolean")
     */
    private $laborTaxable = false;

    /**
     * @ORM\Column(type="float")
     */
    private $partsPrice;

    /**
     * @ORM\Column(type="boolean")
     */
    private $partsTaxable = false;

    /**
     * @ORM\Column(type="float")
     */
    private $suppliesPrice;

    /**
     * @ORM\Column(type="boolean")
     */
    private $suppliesTaxable = false;

    /**
     * @ORM\Column(type="boolean")
     */
    private $deleted = false;

    /**
     * @ORM\OneToMany(targetEntity=RepairOrderQuoteService::class, mappedBy="operationCode")
     */
    private $repairOrderQuoteServices;

    public function __construct()
    {
        $this->repairOrderQuoteServices = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

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

    public function getLaborHours(): ?float
    {
        return $this->laborHours;
    }

    public function setLaborHours(float $laborHours): self
    {
        $this->laborHours = $laborHours;

        return $this;
    }

    public function getLaborTaxable(): ?bool
    {
        return $this->laborTaxable;
    }

    public function setLaborTaxable(bool $laborTaxable): self
    {
        $this->laborTaxable = $laborTaxable;

        return $this;
    }

    public function getPartsPrice(): ?float
    {
        return $this->partsPrice;
    }

    public function setPartsPrice(float $partsPrice): self
    {
        $this->partsPrice = $partsPrice;

        return $this;
    }

    public function getPartsTaxable(): ?bool
    {
        return $this->partsTaxable;
    }

    public function setPartsTaxable(bool $partsTaxable): self
    {
        $this->partsTaxable = $partsTaxable;

        return $this;
    }

    public function getSuppliesPrice(): ?float
    {
        return $this->suppliesPrice;
    }

    public function setSuppliesPrice(float $suppliesPrice): self
    {
        $this->suppliesPrice = $suppliesPrice;

        return $this;
    }

    public function getSuppliesTaxable(): ?bool
    {
        return $this->suppliesTaxable;
    }

    public function setSuppliesTaxable(bool $suppliesTaxable): self
    {
        $this->suppliesTaxable = $suppliesTaxable;

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

    /**
     * @return Collection|RepairOrderQuoteService[]
     */
    public function getRepairOrderQuoteServices(): Collection
    {
        return $this->repairOrderQuoteServices;
    }

    public function addRepairOrderQuoteService(RepairOrderQuoteService $repairOrderQuoteService): self
    {
        if (!$this->repairOrderQuoteServices->contains($repairOrderQuoteService)) {
            $this->repairOrderQuoteServices[] = $repairOrderQuoteService;
            $repairOrderQuoteService->setOperationCode($this);
        }

        return $this;
    }

    public function removeRepairOrderQuoteService(RepairOrderQuoteService $repairOrderQuoteService): self
    {
        if ($this->repairOrderQuoteServices->removeElement($repairOrderQuoteService)) {
            // set the owning side to null (unless already changed)
            if ($repairOrderQuoteService->getOperationCode() === $this) {
                $repairOrderQuoteService->setOperationCode(null);
            }
        }

        return $this;
    }
}
