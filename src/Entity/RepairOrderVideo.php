<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity
 */
class RepairOrderVideo {
    public const GROUPS = ['rov_list'];
    public const STATUSES = [
        0 => 'Created',
        1 => 'Awaiting Approval',
        2 => 'Advisor Viewed',
        3 => 'Advisor Approved',
        4 => 'Customer Sent',
        5 => 'Customer Viewed',
        6 => 'Advisor Confirmed Viewed',
    ];

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
     * @ORM\JoinColumn(nullable=false)
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

    public function __construct () {
        $this->dateCreated  = new \DateTime();
        $this->interactions = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId (): ?int {
        return $this->id;
    }

    /**
     * @return RepairOrder|null
     */
    public function getRepairOrder (): ?RepairOrder {
        return $this->repairOrder;
    }

    /**
     * @param RepairOrder $repairOrder
     *
     * @return $this
     */
    public function setRepairOrder (RepairOrder $repairOrder): self {
        $this->repairOrder = $repairOrder;

        return $this;
    }

    /**
     * @return User|null
     */
    public function getTechnician (): ?User {
        return $this->technician;
    }

    /**
     * @param User $technician
     *
     * @return $this
     */
    public function setTechnician (User $technician): self {
        $this->technician = $technician;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPath (): ?string {
        return $this->path;
    }

    /**
     * @param string $path
     *
     * @return $this
     */
    public function setPath (string $path): self {
        $this->path = $path;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus (): string {
        return $this->status;
    }

    /**
     * @param string $status
     *
     * @return $this
     */
    public function setStatus (string $status): self {
        $this->status = $status;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateCreated (): \DateTime {
        return $this->dateCreated;
    }

    /**
     * @param \DateTime $dateCreated
     *
     * @return $this
     */
    public function setDateCreated (\DateTime $dateCreated): self {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDeleted (): bool {
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
     * @return RepairOrderVideoInteraction[]
     */
    public function getInteractions (): array {
        return $this->interactions->toArray();
    }

    /**
     * @param RepairOrderVideoInteraction $interaction
     *
     * @return $this
     */
    public function addInteraction (RepairOrderVideoInteraction $interaction): self {
        $this->setStatus($interaction->getType());
        $this->interactions->add($interaction);

        return $this;
    }
}