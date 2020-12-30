<?php

namespace App\Service;

use App\Entity\CheckIn;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class CheckInHelper
 *
 * @package App\Service
 */
class CheckInHelper {
    /** @var string[] */
    private const REQUIRED_FIELDS = ['identification', 'video'];

    /** @var EntityManagerInterface */
    private $em;

   /**
     * CheckInHelper constructor.
     *
     * @param EntityManagerInterface $em
     */
    public function __construct (EntityManagerInterface $em) {
        $this->em             = $em;
    }

    /**
     * @param array $params
     * @param bool  $checkRequiredFields
     *
     * @return array Empty on successful validation
     */
    public function validateParams (array $params, bool $checkRequiredFields = false): array {
        $errors = [];
        if ($checkRequiredFields === true) {
            foreach (self::REQUIRED_FIELDS as $field) {
                if (!isset($params[$field])) {
                    $errors[$field] = 'Field missing';
                }
            }
        }

        return $errors;
    }

    /**
     * @param CheckIn $checkin
     * @param array    $params
     */
    public function createCheckIn (array $params = []): void {
        $valid = empty($this->validateParams($params));
        if ($valid !== true) {
            throw new \InvalidArgumentException('Params did not validate. Call validateParams first.');
        }

        $checkin = new CheckIn();

        $checkin->setDate(new Date("Y-m-d H:i:s"));

        foreach ($params as $k => $v) {
            switch ($k) {
                case 'identification':
                    $checkin->setIdentification($v);
                    break;
                case 'video':
                    $checkin->setVideo($v);
                    break;
                case 'user_id':
                    $checkin->setUserId($v);
                    break;
            }
        }

        if ($checkin->getId() === null) {
            $this->em->persist($checkin);
        }
        $this->em->beginTransaction();
        try {
            $this->em->flush();
            $this->em->commit();
        } catch (\Exception $e) {
            $this->em->rollback();
            throw new \RuntimeException('Caught exception during flush', 0, $e);
        }
    }

   /**
     * @param UploadedFile $file
     * @param User ID|string    $current user
     *
     * @return String
     */
    public function createVideo (UploadedFile $file) {
        return 'Sample url';
        if (!$this->upload->isValidVideo($file)) {
            throw new \InvalidArgumentException('Invalid file format');
        }
        $url = $this->upload->uploadVideo($file, 'ro-videos');
        
        return $url;
    }

}
