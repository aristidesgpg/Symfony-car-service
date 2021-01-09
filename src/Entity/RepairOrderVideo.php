<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity
 */
class RepairOrderVideo
{
    public const GROUPS = ['rov_list'];

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Serializer\Groups(groups={"rov_list"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\RepairOrder")
     * @ORM\JoinColumn(nullable=false)
     */
    private $repairOrder;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    private $technician;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups(groups={"rov_list"})
     */
    private $path;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups(groups={"rov_list"})
     */
    private $status = 'Created';

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $shortUrl;

    /**
     * @ORM\Column(type="datetime")
     * @Serializer\Groups(groups={"rov_list"})
     */
    private $dateCreated;

    /**
     * @ORM\Column(type="boolean")
     */
    private $deleted = false;

    /**
     * @ORM\OneToMany(
     *     targetEntity="App\Entity\RepairOrderVideoInteraction",
     *     mappedBy="repairOrderVideo",
     *     cascade={"PERSIST"}
     * )
     * @ORM\OrderBy({"date"="DESC"})
     */
    private $interactions;

    public function __construct()
    {
        $this->dateCreated = new \DateTime();
        $this->interactions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRepairOrder(): ?RepairOrder
    {
        return $this->repairOrder;
    }

    /**
     * @return $this
     */
    public function setRepairOrder(RepairOrder $repairOrder): self
    {
        $this->repairOrder = $repairOrder;

        return $this;
    }

    public function getTechnician(): ?User
    {
        return $this->technician;
    }

    /**
     * @return $this
     */
    public function setTechnician(User $technician): self
    {
        $this->technician = $technician;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    /**
     * @return $this
     */
    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return $this
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getShortUrl(): ?string
    {
        return $this->shortUrl;
    }

    /**
     * @return $this
     */
    public function setShortUrl(string $shortUrl): self
    {
        $this->shortUrl = $shortUrl;

        return $this;
    }

    public function getDateCreated(): \DateTime
    {
        return $this->dateCreated;
    }

    /**
     * @return $this
     */
    public function setDateCreated(\DateTime $dateCreated): self
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    public function isDeleted(): bool
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
     * @return RepairOrderVideoInteraction[]
     */
    public function getInteractions(): array
    {
        return $this->interactions->toArray();
    }

    /**
     * @return $this
     */
    public function addInteraction(RepairOrderVideoInteraction $interaction): self
    {
        $status = $interaction->getType();
        $this->setStatus($status);
        $this->getRepairOrder()->setVideoStatus($status);
        $this->interactions->add($interaction);

        return $this;
    }
}
