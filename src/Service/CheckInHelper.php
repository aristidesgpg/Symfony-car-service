<?php

namespace App\Service;

use App\Entity\CheckIn;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use InvalidArgumentException;
use RuntimeException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class CheckInHelper.
 */
class CheckInHelper
{
    /** @var string[] */
    private const REQUIRED_FIELDS = ['identification', 'video'];

    /** @var EntityManagerInterface */
    private $em;

    /** @var UploadHelper */
    private $upload;

    /**
     * CheckInHelper constructor.
     */
    public function __construct(EntityManagerInterface $em, UploadHelper $upload)
    {
        $this->em = $em;
        $this->upload = $upload;
    }

    /**
     * @return array Empty on successful validation
     */
    public function validateParams(array $params, bool $checkRequiredFields = false): array
    {
        $errors = [];
        if (true === $checkRequiredFields) {
            foreach (self::REQUIRED_FIELDS as $field) {
                if (!isset($params[$field])) {
                    $errors[$field] = 'Field missing';
                }
            }
        }

        return $errors;
    }

    public function createCheckIn(array $params = []): void
    {
        $valid = empty($this->validateParams($params));

        if (true !== $valid) {
            throw new InvalidArgumentException('Params did not validate. Call validateParams first.');
        }

        $checkin = new CheckIn();

        foreach ($params as $k => $v) {
            switch ($k) {
                case 'identification':
                    $checkin->setIdentification($v);
                    break;
                case 'video':
                    $checkin->setVideo($v);
                    break;
                case 'user_id':
                    $checkin->setUser($v);
                    break;
            }
        }

        $this->em->persist($checkin);

        $this->em->beginTransaction();
        try {
            $this->em->flush();
            $this->em->commit();
        } catch (Exception $e) {
            $this->em->rollback();
            throw new RuntimeException('Caught exception during flush', 0, $e);
        }
    }

    /**
     * @param User ID|string $current user
     */
    public function createVideo(UploadedFile $file): ?string
    {
        if (!$this->upload->isValidVideo($file)) {
            throw new InvalidArgumentException('Invalid file format');
        }

        return $this->upload->uploadVideo($file, 'checkin');
    }
}
