<?php

namespace App\Entity;

use App\Repository\MPIItemRepository;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass=MPIItemRepository::class)
 * @ORM\Table(name="mpi_item")
 */
class MPIItem
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Serializer\Groups(groups={"mpi_item_list", "mpi_group_list"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=MPIGroup::class, inversedBy="mpiItems")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private $mpiGroup;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups(groups={"mpi_item_list", "mpi_group_list"})
     */
    private $name;

    /**
     * @ORM\Column(type="boolean")
     * @Serializer\Groups(groups={"mpi_item_list", "mpi_group_list"})
     */
    private $hasRange = false;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Serializer\Groups(groups={"mpi_item_list", "mpi_group_list"})
     */
    private $rangeMaximum;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Serializer\Groups(groups={"mpi_item_list", "mpi_group_list"})
     */
    private $rangeUnit;

    /**
     * @ORM\Column(type="boolean")
     */
    private $deleted = false;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMPIGroup(): ?MPIGroup
    {
        return $this->mpiGroup;
    }

    /**
     * @return $this
     */
    public function setMPIGroup(?MPIGroup $mpiGroup): self
    {
        $this->mpiGroup = $mpiGroup;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getHasRange(): ?bool
    {
        return $this->hasRange;
    }

    /**
     * @return $this
     */
    public function setHasRange(bool $hasRange): self
    {
        $this->hasRange = $hasRange;

        return $this;
    }

    public function getRangeMaximum(): ?int
    {
        return $this->rangeMaximum;
    }

    /**
     * @return $this
     */
    public function setRangeMaximum(int $rangeMaximum): self
    {
        $this->rangeMaximum = $rangeMaximum;

        return $this;
    }

    public function getRangeUnit(): ?string
    {
        return $this->rangeUnit;
    }

    /**
     * @return $this
     */
    public function setRangeUnit(?string $rangeUnit): self
    {
        $this->rangeUnit = $rangeUnit;

        return $this;
    }

    public function getDeleted(): ?bool
    {
        return $this->deleted;
    }

    /**
     * @return $this
     */
    public function setDeleted(bool $deleted): self
    {
        $this->deleted = $deleted;

        return $this;
    }
}
