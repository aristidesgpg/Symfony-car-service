<?php

namespace App\Entity;

use App\Repository\InspectionGroupRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InspectionGroupRepository::class)
 */
class InspectionGroup
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=MPITemplate::class, inversedBy="inspectionGroups")
     * @ORM\JoinColumn(nullable=false)
     */
    private $mpiTemplateId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active = true;

    /**
     * @ORM\Column(type="boolean")
     */
    private $deleted = false;

    /**
     * @ORM\OneToMany(targetEntity=MPIItem::class, mappedBy="mpiInspectionGroupId")
     */
    private $mpiItems;

    public function __construct()
    {
        $this->mpiItems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMpiTemplateId(): ?MPITemplate
    {
        return $this->mpiTemplateId;
    }

    public function setMpiTemplateId(?MPITemplate $mpiTemplateId): self
    {
        $this->mpiTemplateId = $mpiTemplateId;

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

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

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
     * @return Collection|MPIItem[]
     */
    public function getMpiItems(): Collection
    {
        return $this->mpiItems;
    }

    public function addMpiItem(MPIItem $mpiItem): self
    {
        if (!$this->mpiItems->contains($mpiItem)) {
            $this->mpiItems[] = $mpiItem;
            $mpiItem->setMpiInspectionGroupId($this);
        }

        return $this;
    }

    public function removeMpiItem(MPIItem $mpiItem): self
    {
        if ($this->mpiItems->contains($mpiItem)) {
            $this->mpiItems->removeElement($mpiItem);
            // set the owning side to null (unless already changed)
            if ($mpiItem->getMpiInspectionGroupId() === $this) {
                $mpiItem->setMpiInspectionGroupId(null);
            }
        }

        return $this;
    }
}
