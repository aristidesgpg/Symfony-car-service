<?php

namespace App\Entity;

use DateTime;
use DateTimeInterface;
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
    private $status = 'Not Started';

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $shortUrl;

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
     * @Serializer\Groups(groups={"rov_list"})
     */
    private $interactions;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateUploaded;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateSent;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateViewed;

    public function __construct()
    {
        $this->dateUploaded = new DateTime();
        $this->interactions = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return User|null
     */
    public function getTechnician(): ?User
    {
        return $this->technician;
    }

    /**
     * @param User $technician
     *
     * @return $this
     */
    public function setTechnician(User $technician): self
    {
        $this->technician = $technician;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPath(): ?string
    {
        return $this->path;
    }

    /**
     * @param string $path
     *
     * @return $this
     */
    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     *
     * @return $this
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getShortUrl(): ?string
    {
        return $this->shortUrl;
    }

    /**
     * @param string $shortUrl
     *
     * @return $this
     */
    public function setShortUrl(string $shortUrl): self
    {
        $this->shortUrl = $shortUrl;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDeleted(): bool
    {
        return $this->deleted;
    }

    /**
     * @param bool $deleted
     *
     * @return $this
     */
    public function setDeleted(bool $deleted): self
    {
        $this->deleted = $deleted;
        $this->updateRepairOrderVideoStatus();

        return $this;
    }

    public function updateRepairOrderVideoStatus(): self
    {
        $statusArray = [0 => "Uploaded", 1 => "Sent", 2 => "Viewed"];
        $repairVideos = $this->getRepairOrder()->getVideos();
        $repairOrderVideoStatus = "Viewed";
        foreach ($repairVideos as $repairOrderVideo) {
            if (!$repairOrderVideo->isDeleted() && array_search(
                    $repairOrderVideo->getStatus(),
                    $statusArray
                ) < array_search($repairOrderVideoStatus, $statusArray)) {
                $repairOrderVideoStatus = $repairOrderVideo->getStatus();
            }
        }

        $this->getRepairOrder()->setVideoStatus($repairOrderVideoStatus);

        return $this;
    }

    /**
     * @return RepairOrder|null
     */
    public function getRepairOrder(): ?RepairOrder
    {
        return $this->repairOrder;
    }

    /**
     * @param RepairOrder $repairOrder
     *
     * @return $this
     */
    public function setRepairOrder(RepairOrder $repairOrder): self
    {
        $this->repairOrder = $repairOrder;

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
     * @param RepairOrderVideoInteraction $interaction
     *
     * @return $this
     */
    public function addInteraction(RepairOrderVideoInteraction $interaction): self
    {
        $statusArray = [0 => "Uploaded", 1 => "Sent", 2 => "Viewed"];

        $status = $interaction->getType();
        $this->setStatus($status);
        $this->updateRepairOrderVideoStatus();

        $videoStatus = $this->getRepairOrder()->getVideoStatus();

        if ($videoStatus == "Not Started" || array_search($status, $statusArray) < array_search(
                $videoStatus,
                $statusArray
            )) {
            $this->getRepairOrder()->setVideoStatus($status);
        }

        $this->interactions->add($interaction);

        return $this;
    }

    public function getDateUploaded(): ?DateTimeInterface
    {
        return $this->dateUploaded;
    }

    public function setDateUploaded(?DateTimeInterface $dateUploaded): self
    {
        $this->dateUploaded = $dateUploaded;

        return $this;
    }

    public function getDateSent(): ?DateTimeInterface
    {
        return $this->dateSent;
    }

    public function setDateSent(?DateTimeInterface $dateSent): self
    {
        $this->dateSent = $dateSent;

        return $this;
    }

    public function getDateViewed(): ?DateTimeInterface
    {
        return $this->dateViewed;
    }

    public function setDateViewed(?DateTimeInterface $dateViewed): self
    {
        $this->dateViewed = $dateViewed;

        return $this;
    }
}
