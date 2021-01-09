<?php

namespace App\Entity;

use App\Repository\MPIGroupRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass=MPIGroupRepository::class)
 * @ORM\Table(name="mpi_group")
 */
class MPIGroup
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Serializer\Groups(groups={"mpi_group_list"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=MPITemplate::class, inversedBy="mpiGroups")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private $mpiTemplate;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups(groups={"mpi_group_list"})
     */
    private $name;

    /**
     * @ORM\Column(type="boolean")
     * @Serializer\Groups(groups={"mpi_group_list"})
     */
    private $active = true;

    /**
     * @ORM\Column(type="boolean")
     */
    private $deleted = false;

    /**
     * @ORM\OneToMany(targetEntity=MPIItem::class, mappedBy="mpiGroup")
     * @Serializer\Groups(groups={"mpi_group_list"})
     */
    private $mpiItems;

    /**
     * MPIGroup constructor.
     */
    public function __construct()
    {
        $this->mpiItems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMPITemplate(): ?MPITemplate
    {
        return $this->mpiTemplate;
    }

    /**
     * @return $this
     */
    public function setMPITemplate(?MPITemplate $mpiTemplate): self
    {
        $this->mpiTemplate = $mpiTemplate;

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

    public function getActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @return $this
     */
    public function setActive(bool $active): self
    {
        $this->active = $active;

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

    /**
     * @return Collection|MPIItem[]
     */
    public function getMPIItems(): Collection
    {
        return $this->mpiItems;
    }

    /**
     * @return $this
     */
    public function addMPIItem(MPIItem $mpiItem): self
    {
        if (!$this->mpiItems->contains($mpiItem)) {
            $this->mpiItems[] = $mpiItem;
            $mpiItem->setMPIGroup($this);
        }

        return $this;
    }

    /**
     * @return $this
     */
    public function removeMPIItem(MPIItem $mpiItem): self
    {
        if ($this->mpiItems->contains($mpiItem)) {
            $this->mpiItems->removeElement($mpiItem);
            // set the owning side to null (unless already changed)
            if ($mpiItem->getMPIGroup() === $this) {
                $mpiItem->setMPIGroup(null);
            }
        }

        return $this;
    }
}
