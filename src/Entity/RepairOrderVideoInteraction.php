<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class RepairOrderVideoInteraction
{
    public const GROUPS = ['int_list', 'user_list', 'customer_list'];

    use InteractionTrait;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\RepairOrderVideo")
     */
    private $repairOrderVideo;

    public function getRepairOrderVideo(): RepairOrderVideo
    {
        return $this->repairOrderVideo;
    }

    public function setRepairOrderVideo(RepairOrderVideo $video): self
    {
        $this->repairOrderVideo = $video;

        return $this;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
