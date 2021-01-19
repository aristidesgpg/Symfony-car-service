<?php

namespace App\Service;

use App\Entity\Customer;
use App\Entity\RepairOrder;
use App\Entity\RepairOrderVideo;
use App\Entity\RepairOrderVideoInteraction;
use App\Entity\User;
use App\Repository\SettingsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class VideoHelper {
    /** @var EntityManagerInterface */
    private $em;

    /** @var UploadHelper */
    private $upload;

    /** @var ShortUrlHelper */
    private $urlHelper;

    /** @var SettingsRepository */
    private $settings;

    /**
     * VideoHelper constructor.
     *
     * @param EntityManagerInterface $em
     * @param UploadHelper           $upload
     * @param ShortUrlHelper         $urlHelper
     * @param SettingsRepository     $settings
     */
    public function __construct (
        EntityManagerInterface $em,
        UploadHelper $upload,
        ShortUrlHelper $urlHelper,
        SettingsRepository $settings
    ) {
        $this->em        = $em;
        $this->upload    = $upload;
        $this->urlHelper = $urlHelper;
        $this->settings  = $settings;
    }

    /**
     * @param RepairOrder  $ro
     * @param UploadedFile $file
     * @param User|null    $tech
     *
     * @return RepairOrderVideo
     */
    public function createVideo (RepairOrder $ro, UploadedFile $file, ?User $tech = null): RepairOrderVideo {
        if (!$this->upload->isValidVideo($file)) {
            throw new \InvalidArgumentException('Invalid file format');
        }
        $url = $this->upload->uploadVideo($file, 'ro-videos');
        $video = new RepairOrderVideo();
        $video->setRepairOrder($ro)
              ->setPath($url);
        if ($tech !== null) {
            $video->setTechnician($tech);
        }
        $interaction = new RepairOrderVideoInteraction();
        $interaction->setType('Uploaded')
                    ->setRepairOrderVideo($video);
        $video->addInteraction($interaction);
        $ro->addVideo($video);

        $this->em->persist($video);
        $this->em->flush();

        $this->sendVideo($video);

        return $video;
    }

    /**
     * @param RepairOrderVideo $video
     */
    public function deleteVideo (RepairOrderVideo $video): void {
        if ($video->isDeleted()) {
            throw new \InvalidArgumentException('Video already deleted');
        }

        $video->setDeleted(true);
        $this->em->flush();
    }

    /**
     * @param RepairOrderVideo $video
     */
    public function sendVideo (RepairOrderVideo $video): void {
        $phone = $video->getRepairOrder()->getPrimaryCustomer()->getPhone();
        $message = $this->settings->find('serviceTextVideo')->getValue();
        $url = rtrim($_SERVER['CUSTOMER_URL'], '/') . '/' . $video->getRepairOrder()->getLinkHash();
        $shortUrl = $this->urlHelper->generateShortUrl($url);
        try {
            $this->urlHelper->sendShortenedLink($phone, $message, $shortUrl, true);
        } catch (\Exception $e) {
            return;
        }

        $interaction = new RepairOrderVideoInteraction();
        $interaction->setType('Sent')
                    ->setRepairOrderVideo($video);
        $video->addInteraction($interaction)
              ->setShortUrl($shortUrl);

        $this->em->flush();
    }

    /**
     * @param RepairOrderVideo $video
     * @param Customer|User    $user
     */
    public function viewVideo (RepairOrderVideo $video, $user): void {
        $interaction = new RepairOrderVideoInteraction();
        if ($user instanceof Customer) {
            $interaction->setCustomer($user);
        } elseif ($user instanceof User) {
            $interaction->setUser($user);
        } else {
            throw new \InvalidArgumentException(sprintf('Invalid type for $user: %s', get_class($user)));
        }

        $interaction->setRepairOrderVideo($video)
                    ->setType('Viewed');
        $video->addInteraction($interaction);

        $this->em->flush();
    }
}