<?php

namespace App\Entity;

use App\Repository\MPIGroupRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MPIGroupRepository::class)
 */
class MPIGroup {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=MPITemplate::class, inversedBy="mpiGroups")
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
     * @ORM\OneToMany(targetEntity=MPIItem::class, mappedBy="mpiGroup")
     */
    private $mpiItems;

    /**
     * MPIGroup constructor.
     */
    public function __construct () {
        $this->mpiItems = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId (): ?int {
        return $this->id;
    }

    /**
     * @return MPITemplate|null
     */
    public function getMPITemplate (): ?MPITemplate {
        return $this->mpiTemplate;
    }

    /**
     * @param MPITemplate|null $mpiTemplate
     *
     * @return $this
     */
    public function setMPITemplate (?MPITemplate $mpiTemplate): self {
        $this->mpiTemplate = $mpiTemplate;

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
    public function getActive (): ?bool {
        return $this->active;
    }

    /**
     * @param bool $active
     *
     * @return $this
     */
    public function setActive (bool $active): self {
        $this->active = $active;

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

    /**
     * @return Collection|MPIItem[]
     */
    public function getMPIItems (): Collection {
        return $this->mpiItems;
    }

    /**
     * @param MPIItem $mpiItem
     *
     * @return $this
     */
    public function addMPIItem (MPIItem $mpiItem): self {
        if (!$this->mpiItems->contains($mpiItem)) {
            $this->mpiItems[] = $mpiItem;
            $mpiItem->setMPIGroup($this);
        }

        return $this;
    }

    /**
     * @param MPIItem $mpiItem
     *
     * @return $this
     */
    public function removeMPIItem (MPIItem $mpiItem): self {
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
