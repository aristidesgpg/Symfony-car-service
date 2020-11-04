<?php

namespace App\Entity;

use App\Repository\MPITemplateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MPITemplateRepository::class)
 */
class MPITemplate
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\Column(type="boolean")
     */
    private $deleted;

    /**
     * @ORM\OneToMany(targetEntity=InspectionGroup::class, mappedBy="mpiTemplateId")
     */
    private $inspectionGroups;

    public function __construct()
    {
        $this->inspectionGroups = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
     * @return Collection|InspectionGroup[]
     */
    public function getInspectionGroups(): Collection
    {
        return $this->inspectionGroups;
    }

    public function addInspectionGroup(InspectionGroup $inspectionGroup): self
    {
        if (!$this->inspectionGroups->contains($inspectionGroup)) {
            $this->inspectionGroups[] = $inspectionGroup;
            $inspectionGroup->setMpiTemplateId($this);
        }

        return $this;
    }

    public function removeInspectionGroup(InspectionGroup $inspectionGroup): self
    {
        if ($this->inspectionGroups->contains($inspectionGroup)) {
            $this->inspectionGroups->removeElement($inspectionGroup);
            // set the owning side to null (unless already changed)
            if ($inspectionGroup->getMpiTemplateId() === $this) {
                $inspectionGroup->setMpiTemplateId(null);
            }
        }

        return $this;
    }
}
