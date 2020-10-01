<?php

namespace App\Service;

use App\Entity\Setting;
use App\Repository\SettingRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class SettingsHelper
 *
 * @package App\Service
 */
class SettingsHelper {
    /**
     * @var SettingRepository
     */
    private $settingRepository;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * SettingsHelper constructor.
     *
     * @param SettingRepository      $settingRepository
     * @param EntityManagerInterface $em
     */
    public function __construct (SettingRepository $settingRepository, EntityManagerInterface $em) {
        $this->settingRepository = $settingRepository;
        $this->em                = $em;
    }

    /**
     * @param SettingRepository $settingRepository
     *
     * @return Setting[]
     */
    public function getAllSettings (SettingRepository $settingRepository) {
        return $this->settingRepository->findAll();
    }

    /**
     * Will retrieve the setting if one is found, if not maybe create one
     *
     * @param string $settingName
     * @param bool   $createIfMissing
     * @param string $defaultValue
     *
     * @return Setting|boolean
     */
    public function getSettingByName (string $settingName, $createIfMissing = true, string $defaultValue = '') {
        $foundSetting = $this->settingRepository->findOneBy(['name' => $settingName]);

        if ($foundSetting) {
            return $foundSetting;
        }

        // Don't create the setting if it's missing
        if (!$createIfMissing) {
            return false;
        }

        // Create the setting
        $setting = new Setting();
        $setting->setName($settingName)->setValue($defaultValue);

        $this->em->persist($setting);
        $this->em->flush();

        return $setting;
    }

    /**
     * @param string $settingName
     * @param string $settingValue
     *
     * @return Setting
     */
    public function createOrUpdateSetting (string $settingName, string $settingValue) {
        $setting = $this->getSettingByName($settingName, true);

        $setting->setValue($settingValue);
        $this->em->persist($setting);
        $this->em->flush();

        return $setting;
    }

    /**
     * @param array $settingArray
     *
     * @return boolean
     */
    public function bulkUpdate (array $settingArray) {
        // First validate without updating
        foreach ($settingArray as $settingKey => $settingName) {
            if (!is_string($settingKey) || empty($settingKey)) {
                return false;
            }
        }

        // Update if valid
        foreach ($settingArray as $settingKey => $settingName) {
            $this->createOrUpdateSetting($settingKey, $settingName);
        }

        return true;
    }

}
