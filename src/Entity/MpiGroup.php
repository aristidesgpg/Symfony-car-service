<?php

namespace App\Entity;

use App\Repository\MpiGroupRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MpiGroupRepository::class)
 */
class MpiGroup
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=MpiTemplate::class, inversedBy="mpiGroups")
     * @ORM\JoinColumn(nullable=false)
     */
    private $mpiTemplate;

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
     * @ORM\OneToMany(targetEntity=MpiItem::class, mappedBy="mpiGroup")
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

    public function getMpiTemplate(): ?MpiTemplate
    {
        return $this->mpiTemplate;
    }

    public function setMpiTemplate(?MpiTemplate $mpiTemplate): self
    {
        $this->mpiTemplate = $mpiTemplate;

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

    public function addMpiItem(MpiItem $mpiItem): self
    {
        if (!$this->mpiItems->contains($mpiItem)) {
            $this->mpiItems[] = $mpiItem;
            $mpiItem->setMpiGroup($this);
        }

        return $this;
    }

    public function removeMpiItem(MpiItem $mpiItem): self
    {
        if ($this->mpiItems->contains($mpiItem)) {
            $this->mpiItems->removeElement($mpiItem);
            // set the owning side to null (unless already changed)
            if ($mpiItem->getMpiGroup() === $this) {
                $mpiItem->setMpiGroup(null);
            }
        }

        return $this;
    }
}
