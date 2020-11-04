<?php

namespace App\Entity;

use App\Repository\MPIItemRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MPIItemRepository::class)
 */
class MPIItem
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=InspectionGroup::class, inversedBy="mpiItems")
     * @ORM\JoinColumn(nullable=false)
     */
    private $mpiInspectionGroupId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hasRange;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $rangeMaximum;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $rangeUnit;

    /**
     * @ORM\Column(type="boolean")
     */
    private $deleted;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMpiInspectionGroupId(): ?InspectionGroup
    {
        return $this->mpiInspectionGroupId;
    }

    public function setMpiInspectionGroupId(?InspectionGroup $mpiInspectionGroupId): self
    {
        $this->mpiInspectionGroupId = $mpiInspectionGroupId;

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

    public function getHasRange(): ?bool
    {
        return $this->hasRange;
    }

    public function setHasRange(bool $hasRange): self
    {
        $this->hasRange = $hasRange;

        return $this;
    }

    public function getRangeMaximum(): ?int
    {
        return $this->rangeMaximum;
    }

    public function setRangeMaximum(int $rangeMaximum): self
    {
        $this->rangeMaximum = $rangeMaximum;

        return $this;
    }

    public function getRangeUnit(): ?string
    {
        return $this->rangeUnit;
    }

    public function setRangeUnit(?string $rangeUnit): self
    {
        $this->rangeUnit = $rangeUnit;

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
