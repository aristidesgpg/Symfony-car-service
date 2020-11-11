<?php

namespace App\Entity;

use App\Repository\MPIItemRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MPIItemRepository::class)
 * @ORM\Table(name="mpi_item")
 */
class MPIItem {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=MPIGroup::class, inversedBy="mpiItems")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private $mpiGroup;

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
    private $deleted = false;

    /**
     * @return int|null
     */
    public function getId (): ?int {
        return $this->id;
    }

    /**
     * @return MPIGroup|null
     */
    public function getMPIGroup (): ?MPIGroup {
        return $this->mpiGroup;
    }

    /**
     * @param MPIGroup|null $mpiGroup
     *
     * @return $this
     */
    public function setMPIGroup (?MPIGroup $mpiGroup): self {
        $this->mpiGroup = $mpiGroup;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName (): ?string {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName (string $name): self {
        $this->name = $name;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHasRange (): ?bool {
        return $this->hasRange;
    }

    /**
     * @param bool $hasRange
     *
     * @return $this
     */
    public function setHasRange (bool $hasRange): self {
        $this->hasRange = $hasRange;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getRangeMaximum (): ?int {
        return $this->rangeMaximum;
    }

    /**
     * @param int $rangeMaximum
     *
     * @return $this
     */
    public function setRangeMaximum (int $rangeMaximum): self {
        $this->rangeMaximum = $rangeMaximum;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRangeUnit (): ?string {
        return $this->rangeUnit;
    }

    /**
     * @param string|null $rangeUnit
     *
     * @return $this
     */
    public function setRangeUnit (?string $rangeUnit): self {
        $this->rangeUnit = $rangeUnit;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getDeleted (): ?bool {
        return $this->deleted;
    }

    /**
     * @param bool $deleted
     *
     * @return $this
     */
    public function setDeleted (bool $deleted): self {
        $this->deleted = $deleted;

        return $this;
    }
}
