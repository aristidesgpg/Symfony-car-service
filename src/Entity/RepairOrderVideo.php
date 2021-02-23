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

    public const STATUSES = ['Not Started', 'Uploaded', 'Sent', 'Viewed'];

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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTechnician(): ?User
    {
        return $this->technician;
    }

    public function setTechnician(User $technician): self
    {
        $this->technician = $technician;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function getShortUrl(): ?string
    {
        return $this->shortUrl;
    }

    public function setShortUrl(string $shortUrl): self
    {
        $this->shortUrl = $shortUrl;

        return $this;
    }

    public function isDeleted(): bool
    {
        return $this->deleted;
    }

    public function setDeleted(bool $deleted): self
    {
        $this->deleted = $deleted;
        $this->updateRepairOrderVideoStatus();

        return $this;
    }

    public function updateRepairOrderVideoStatus(): self
    {
        $repairVideos = $this->getRepairOrder()->getVideos();
        $repairOrderVideoStatus = null;

        // No videos
        if (!$repairVideos) {
            $this->getRepairOrder()->setVideoStatus(self::STATUSES[0]);

            return $this;
        }

        foreach ($repairVideos as $repairOrderVideo) {
            if ($repairOrderVideo->isDeleted()) {
                continue;
            }

            // If null, default to the first video we find
            if ($repairOrderVideoStatus === null) {
                $repairOrderVideoStatus = $repairOrderVideo->getStatus();
                continue;
            }

            $videoKey = array_search($repairOrderVideo->getStatus(), self::STATUSES);
            $roVideoKey = array_search($repairOrderVideoStatus, self::STATUSES);

            if ($videoKey < $roVideoKey) {
                $repairOrderVideoStatus = $repairOrderVideo->getStatus();
            }
        }

        if ($repairOrderVideoStatus === null) {
            $repairOrderVideoStatus = self::STATUSES[0];
        }

        $this->getRepairOrder()->setVideoStatus($repairOrderVideoStatus);

        return $this;
    }

    public function getRepairOrder(): ?RepairOrder
    {
        return $this->repairOrder;
    }

    public function setRepairOrder(RepairOrder $repairOrder): self
    {
        $this->repairOrder = $repairOrder;

        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getInteractions(): array
    {
        return $this->interactions->toArray();
    }

    public function addInteraction(RepairOrderVideoInteraction $interaction): self
    {
        $status = $interaction->getType();
        $this->setStatus($status);
        $this->updateRepairOrderVideoStatus();

        $videoStatus = $this->getRepairOrder()->getVideoStatus();

        if ($videoStatus == 'Not Started' || array_search($status, self::STATUSES) < array_search(
                $videoStatus,
                self::STATUSES
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
