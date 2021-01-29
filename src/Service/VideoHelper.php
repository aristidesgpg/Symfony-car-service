<?php

namespace App\Service;

use App\Entity\Customer;
use App\Entity\RepairOrder;
use App\Entity\RepairOrderVideo;
use App\Entity\RepairOrderVideoInteraction;
use App\Entity\User;
use App\Repository\SettingsRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use InvalidArgumentException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;

class VideoHelper
{
    /** @var EntityManagerInterface */
    private $em;

    /** @var UploadHelper */
    private $upload;

    /** @var ShortUrlHelper */
    private $urlHelper;

    /** @var SettingsRepository */
    private $settings;

    /** @var UserInterface|null */
    private $user;

    public function __construct(
        EntityManagerInterface $em,
        UploadHelper $upload,
        ShortUrlHelper $urlHelper,
        SettingsRepository $settings,
        Security $security
    ) {
        $this->em = $em;
        $this->upload = $upload;
        $this->urlHelper = $urlHelper;
        $this->settings = $settings;
        $this->user = $security->getUser();
    }

    public function uploadVideo(RepairOrder $ro, UploadedFile $file, ?User $tech = null): RepairOrderVideo
    {
        if (!$this->upload->isValidVideo($file)) {
            throw new InvalidArgumentException('Invalid file format');
        }
        $url = $this->upload->uploadVideo($file, 'ro-videos');
        $video = new RepairOrderVideo();
        $video->setRepairOrder($ro)->setPath($url);

        // should only ever be a tech, but just in case
        if ($this->user instanceof User && $this->user->isTechnician()) {
            $video->setTechnician($tech);
        }

        $interaction = new RepairOrderVideoInteraction();
        $interaction->setType('Uploaded')
                    ->setUser($this->user)
                    ->setCustomer($ro->getPrimaryCustomer())
                    ->setRepairOrderVideo($video);
        $video->addInteraction($interaction);
        $ro->addVideo($video);

        $this->em->persist($video);
        $this->em->flush();

        $this->sendVideo($ro, $video);

        return $video;
    }

    public function sendVideo(RepairOrder $ro, RepairOrderVideo $video): void
    {
        $phone = $video->getRepairOrder()->getPrimaryCustomer()->getPhone();
        $message = $this->settings->find('serviceTextVideo')->getValue();
        $url = $_SERVER['CUSTOMER_URL'].'/'.$video->getRepairOrder()->getLinkHash();
        $shortUrl = $this->urlHelper->generateShortUrl($url);
        try {
            $this->urlHelper->sendShortenedLink($phone, $message, $shortUrl, true);
        } catch (Exception $e) {
            return;
        }

        $interaction = new RepairOrderVideoInteraction();
        $interaction->setType('Sent')
                    ->setUser($this->user)
                    ->setCustomer($ro->getPrimaryCustomer())
                    ->setRepairOrderVideo($video);
        $video->addInteraction($interaction)
              ->setDateSent(new DateTime())
              ->setShortUrl($shortUrl);

        $this->em->persist($video);
        $this->em->flush();
    }

    public function deleteVideo(RepairOrderVideo $video): void
    {
        if ($video->isDeleted()) {
            throw new InvalidArgumentException('Video already deleted');
        }

        $video->setDeleted(true);
        $this->em->flush();
    }

    public function viewVideo(RepairOrderVideo $video, $user): void
    {
        $repairOrder = $video->getRepairOrder();
        $interaction = new RepairOrderVideoInteraction();
        if ($user instanceof Customer) {
            $interaction->setCustomer($user);
        } elseif ($user instanceof User) {
            $interaction->setUser($user);
        } else {
            throw new InvalidArgumentException(sprintf('Invalid type for $user: %s', get_class($user)));
        }

        $interaction->setRepairOrderVideo($video)
                    ->setCustomer($repairOrder->getPrimaryCustomer())
                    ->setType('Viewed');

        $video->addInteraction($interaction)
              ->setDateViewed(new DateTime());

        $this->em->flush();
    }
}
