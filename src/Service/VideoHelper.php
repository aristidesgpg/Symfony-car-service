<?php

namespace App\Service;

use App\Entity\RepairOrder;
use App\Entity\RepairOrderVideo;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class VideoHelper {
    /** @var EntityManagerInterface */
    private $em;

    /** @var UploadHelper */
    private $upload;

    /**
     * VideoHelper constructor.
     * @param EntityManagerInterface $em
     * @param UploadHelper           $upload
     */
    public function __construct(EntityManagerInterface $em, UploadHelper $upload) {
        $this->em = $em;
        $this->upload = $upload;
    }

    /**
     * @param RepairOrder  $ro
     * @param UploadedFile $file
     * @param User|null    $tech
     *
     * @return RepairOrderVideo
     */
    public function createVideo(RepairOrder $ro, UploadedFile $file, ?User $tech = null): RepairOrderVideo {
        if (!$this->upload->isValidVideo($file)) {
            throw new \InvalidArgumentException('Invalid file format');
        }
        $path = $this->upload->upload($file, 'ro-videos');
        $video = new RepairOrderVideo();
        $video->setRepairOrder($ro)
              ->setPath($path); // TODO
        if ($tech !== null) {
            $video->setTechnician($tech);
        }
        $ro->addVideo($video);

        $this->em->persist($video);
        $this->em->flush();

        return $video;
    }

    /**
     * @param RepairOrderVideo $video
     */
    public function deleteVideo(RepairOrderVideo $video): void {
        if ($video->isDeleted()) {
            throw new \InvalidArgumentException('Video already deleted');
        }

        $video->setDeleted(true);
        $this->em->flush();
    }
}