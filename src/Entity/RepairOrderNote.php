<?php

namespace App\Entity;

use App\Repository\RepairOrderNoteRepository;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use DateTime;

/**
 * @ORM\Entity(repositoryClass=RepairOrderNoteRepository::class)
 */
class RepairOrderNote
{
    public const GROUPS = ['note_list'];

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Serializer\Groups(groups={"ro_list", "note_list"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\RepairOrder")
     * @ORM\JoinColumn(nullable=false)
     */
    private $repairOrder;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Serializer\Groups(groups={"ro_list", "note_list"})
     */
    private $note;

    /**
     * @ORM\Column(type="datetime")
     * @Serializer\Groups(groups={"ro_list", "note_list"})
     */
    private $dateCreated;

    /**
     * RepairOrderNote constructor.
     */
    public function __construct () {
        $this->dateCreated = new DateTime();
    }

    public function getId(): ?int
    {
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
     * @return string|null
     */
    public function getNote (): ?string {
        return $this->note;
    }

    /**
     * @param string $note
     *
     * @return $this
     */
    public function setNote (string $note): self {
        $this->note = $note;

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
}
