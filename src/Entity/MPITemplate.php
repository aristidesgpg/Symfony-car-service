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
    private $active = true;

    /**
     * @ORM\Column(type="boolean")
     */
    private $deleted = false;

    /**
     * @ORM\OneToMany(targetEntity=MPIGroup::class, mappedBy="mpiTemplate")
     */
    private $mpiGroups;

    public function __construct()
    {
        $this->mpiGroups = new ArrayCollection();
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
     * @return Collection|MPIGroup[]
     */
    public function getMPIGroups(): Collection
    {
        return $this->mpiGroups;
    }

    public function addMPIGroup(MPIGroup $mpiGroup): self
    {
        if (!$this->mpiGroups->contains($mpiGroup)) {
            $this->mpiGroups[] = $mpiGroup;
            $mpiGroup->setMPITemplate($this);
        }

        return $this;
    }

    public function removeMPIGroup(MPIGroup $mpiGroup): self
    {
        if ($this->mpiGroups->contains($mpiGroup)) {
            $this->mpiGroups->removeElement($mpiGroup);
            // set the owning side to null (unless already changed)
            if ($mpiGroup->getMPITemplate() === $this) {
                $mpiGroup->setMPITemplate(null);
            }
        }

        return $this;
    }
}
