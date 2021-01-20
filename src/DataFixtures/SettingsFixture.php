<?php

namespace App\DataFixtures;

use App\Service\PasswordHelper;
use App\Service\SettingsHelper;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Exception;

/**
 * Class SettingFixture.
 */
class SettingsFixture extends Fixture
{
    /**
     * @var PasswordHelper
     */
    private $passwordHelper;

    /**
     * @var SettingsHelper
     */
    private $settingsHelper;

    /**
     * SettingsFixture constructor.
     */
    public function __construct(PasswordHelper $passwordHelper, SettingsHelper $settingsHelper)
    {
        $this->passwordHelper = $passwordHelper;
        $this->settingsHelper = $settingsHelper;
    }

    /**
     * @throws Exception
     */
    public function load(ObjectManager $manager)
    {
        $settings = $this->getSettingsHelper()->getDefaultSettings();

        //updated calculated settings.
        $settings['techAppPassword'] = $this->getPasswordHelper()->hashPassword('test');
        $this->getSettingsHelper()->commitSettings($settings);
    }

    public function getPasswordHelper(): PasswordHelper
    {
        return $this->passwordHelper;
    }

    public function setPasswordHelper(PasswordHelper $passwordHelper): void
    {
        $this->passwordHelper = $passwordHelper;
    }

    public function getSettingsHelper(): SettingsHelper
    {
        return $this->settingsHelper;
    }

    public function setSettingsHelper(SettingsHelper $settingsHelper): void
    {
        $this->settingsHelper = $settingsHelper;
    }
}
