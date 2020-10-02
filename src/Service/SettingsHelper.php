<?php

namespace App\Service;

use App\Entity\Settings;
use App\Helper\iServiceLoggerTrait;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class SettingsHelper
 *
 * @package App\Service
 */
class SettingsHelper {
    use iServiceLoggerTrait;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * SettingsHelper constructor.
     *
     * @param EntityManagerInterface $em
     */
    public function __construct (EntityManagerInterface $em) {
        $this->em = $em;
    }

    /**
     * @param array $settings
     *
     * @throws
     */
    public function commitSettings (array $settings): void {
        foreach ($settings as $key => $value) {
            if (!is_string($key)) {
                throw new \InvalidArgumentException('"key" must be string');
            }

            $obj = $this->em->find(Settings::class, $key);
            if (!$obj instanceof Settings) {
                $obj = new Settings($key, $value);
                $this->em->persist($obj);
            } else {
                $obj->setValue($value);
            }
        }

        $this->em->beginTransaction();

        try {
            $this->em->flush();
            $this->em->commit();
        } catch (\Exception $e) {
            $this->logger->error(sprintf('Caught exception during flush: "%s"', $e->getMessage()));
            $this->em->rollback();
            throw new \RuntimeException('An error occurred'); // TODO: More helpful message
        }
    }
}
