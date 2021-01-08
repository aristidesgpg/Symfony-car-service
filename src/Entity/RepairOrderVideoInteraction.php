<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class RepairOrderVideoInteraction
{
    public const GROUPS = ['int_list'];

    use InteractionTrait;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\RepairOrderVideo")
     */
    private $repairOrderVideo;

    public function getRepairOrderVideo(): RepairOrderVideo
    {
        return $this->repairOrderVideo;
    }

    /**
     * @return $this
     */
    public function setRepairOrderVideo(RepairOrderVideo $video): self
    {
        $this->repairOrderVideo = $video;

        return $this;
    }

    /**
     * @return $this
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
