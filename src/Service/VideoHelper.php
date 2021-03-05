<?php

namespace App\Service;

use App\Entity\Customer;
use App\Entity\RepairOrder;
use App\Entity\RepairOrderVideo;
use App\Entity\RepairOrderVideoInteraction;
use App\Entity\User;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use InvalidArgumentException;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Security\Core\Security;

class VideoHelper
{
    private $em;
    private $upload;
    private $urlHelper;
    private $settingsHelper;
    private $user;
    private $twilioHelper;
    private $parameterBag;

    public function __construct(
        EntityManagerInterface $em,
        UploadHelper $upload,
        ShortUrlHelper $urlHelper,
        SettingsHelper $settingsHelper,
        Security $security,
        TwilioHelper $twilioHelper,
        ParameterBagInterface $parameterBag
    ) {
        $this->em = $em;
        $this->upload = $upload;
        $this->urlHelper = $urlHelper;
        $this->settingsHelper = $settingsHelper;
        $this->user = $security->getUser();
        $this->twilioHelper = $twilioHelper;
        $this->parameterBag = $parameterBag;
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
                    ->setRepairOrderVideo($video);
        $video->addInteraction($interaction);
        $ro->addVideo($video);

        $this->em->persist($video);
        $this->em->flush();

        $this->sendVideo($video);

        return $video;
    }

    public function sendVideo(RepairOrderVideo $video): void
    {
        $customer = $video->getRepairOrder()->getPrimaryCustomer();
        $message = $this->settingsHelper->getSetting('serviceTextVideo');
        $url = $this->parameterBag->get('customer_url').$video->getRepairOrder()->getLinkHash();
        $shortUrl = $this->urlHelper->generateShortUrl($url);
        $message = $message.' '.$shortUrl;

        try {
            $this->twilioHelper->sendSms($customer, $message);
        } catch (Exception $e) {
            return;
        }

        $interaction = new RepairOrderVideoInteraction();
        $interaction->setType('Sent')
                    ->setUser($this->user)
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
