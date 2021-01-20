<?php

namespace App\Service;

use App\Entity\Settings;
use App\Helper\iServiceLoggerTrait;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use InvalidArgumentException;
use RuntimeException;

/**
 * Class SettingsHelper.
 */
class SettingsHelper
{
    use iServiceLoggerTrait;

    //TODO Need to add front end values??
    const VALID_SETTINGS = [
        'phase1' => '60',
        'phase2' => '60',
        'phase3' => '60',
        'techAppUsername' => 'iService',
        'techAppPassword' => '',
        'techAppReAuthenticate' => false,
        'custAppAppraiseButtonText' => 'Appraise My Car',
        'custAppPostInspectionVideo' => null,
        'custAppFinanceRepairUrl' => null,
        'serviceTwilioFromNumber' => '8478137493',
        'serviceTextIntro' => 'Welcome to (dealer name) Please text this number for status updates. Your inspection video will be sent from a separate number',
        'serviceTextVideo' => 'Your vehicle inspection video is ready, please click the link:',
        'serviceTextVideoResend' => 'Friendly reminder from (dealer name), you have maintenance needed, please click the link:',
        'serviceTextQuote' => null,
        'serviceTextPayment' => null,
        'pricingLaborRate' => '110',
        'pricingUseMatrix' => '0',
        'pricingLaborTax' => '9.25',
        'pricingPartsTax' => '9.25',
        'waiverEstimateText' => 'Test Waiver Text',
        'waiverActivateAuthMessage' => '0',
        'waiverIntroText' => null,
        'advisorUsageEmails' => null,
        'openLate' => '0',
        'previewSalesVideoText' => 'Welcome to the coolest dealership!',
        'upgradeTradeInTax' => '6.25',
        'upgradeTradeInTaxLimit' => '10000',
        'upgradeOfferExpiration' => '7',
        'upgradeInstantOfferUrl' => 'https://www.performancetoyotastore.com/value-your-trade/',
        'upgradeIntroText' => 'Click the link below to see the value of your vehicle.  Thank you for visiting Performance Toyota',
        'upgradeOfferText' => 'Congratulations.  We have made you a cash offer.  Click the link to view.',
        'upgradeCashOfferCopy' => 'Show to any sales agent to claim your offer.',
        'upgradeDisclaimer' => 'The cash offer is contingent upon verifying the condition and trim levels are true that were selected.',
        'percentageOfTax' => '6.25',
        'limitOnTax' => '10000',
        'totalDays' => '7',
        'upgradeInitialText' => 'Click the link below to see the value of your vehicle.  Thank you for visiting Performance Toyota',
        'upgradeCashOffer' => 'Show to any sales agent to claim your offer.',
        'generalName' => null,
        'generalEmail' => null,
        'generalWebsiteUrl' => 'https://www.performancetoyotastore.com/value-your-trade/',
        'generalInventoryUrl' => null,
        'generaAddress' => null,
        'generalAddress2' => null,
        'generalCity' => null,
        'generalState' => null,
        'generalZip' => null,
        'generalPhone' => null,
        'reviewGoogleUrl' => null,
        'reviewFacebookUrl' => null,
        'reviewText' => null,
    ];

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * SettingsHelper constructor.
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * This goes through and makes sure the DB has all of the settings defined in getDefaultSettings().
     * Does not update existing settings.
     * TODO Should we remove settings from the db if they are no longer in the default list?
     */
    public function syncSettings(): int
    {
        //get default settings
        $defaultSettings = $this->getValidSettings();

        //get db settings
        $dbSettings = $this->em->getRepository(Settings::class)->findKeys();

        //This updates all of the settings that do not exist in the database.
        $settingsSynced = 0;
        foreach (array_diff($defaultSettings, $dbSettings) as $key) {
            $this->addSetting($key, $this->getDefaultSettingValue($key));
            $settingsSynced = $settingsSynced + 1;
        }

        return $settingsSynced;
    }

    /**
     * This should only be used when you are wanting to OVERRIDE all of the settings.
     *
     * @throws InvalidArgumentException
     */
    public function commitSettings(array $settings): void
    {
        foreach ($settings as $key => $value) {
            if (!is_string($key)) {
                throw new InvalidArgumentException('"key" must be string');
            }

            $obj = $this->em->find(Settings::class, $key);
            if (!$obj instanceof Settings) {
                $obj = new Settings($key, $value);
                $this->em->persist($obj);
            } else {
                $obj->setValue($value);
            }
        }

        $this->persistToDb();
    }

    /**
     * Helper method, but set setting is weird.
     *
     * @param ?string $value
     * @return Settings
     */
    public function addSetting(string $key, ?string $value): Settings
    {
        return $this->setSetting($key, $value);
    }

    /**
     * @param string $key
     */
    public function removeSetting(string $key)
    {
        $setting = $this->em->getRepository(Settings::class)->findOneBy(
            ['key' => $key]
        );
        if ($setting) {
            $this->em->remove($setting);
            $this->em->flush();
        }
    }

    /**
     * @param ?string $value
     */
    public function setSetting(string $key, ?string $value): Settings
    {
        if (!is_string($key)) {
            throw new InvalidArgumentException('"key" must be string');
        }
        $obj = $this->em->find(Settings::class, $key);
        if (!$obj instanceof Settings) {
            $obj = new Settings($key, $value);
            $this->em->persist($obj);
        } else {
            $obj->setValue($value);
        }
        $this->persistToDb();

        return $obj;
    }

    /**
     * Persist pending transactions to DB.
     */
    private function persistToDb()
    {
        $this->em->beginTransaction();

        try {
            $this->em->flush();
            $this->em->commit();
        } catch (Exception $e) {
            $this->logger->error(sprintf('Caught exception during flush: "%s"', $e->getMessage()));
            $this->em->rollback();
            throw new RuntimeException('An error occurred'); // TODO: More helpful message
        }
    }

    /**
     * @param $key
     *
     * @return Settings
     *
     * @throws Exception
     */
    public function getSetting($key): ?Settings
    {
        // Throw exception because false is a valid option
        if (!$this->isValidSetting($key)) {
            throw new Exception('Invalid Setting Requested');
        }

        $setting = $this->em->getRepository(Settings::class)->findOneBy([
            'key' => $key,
        ]);

        if (!$setting) {
            // Create it because it's valid if we got here
            $setting = $this->addSetting($key, $this->getDefaultSettingValue($key));

            // Throw exception because false is a valid option
            if (!$setting) {
                throw new Exception('Unable to retrieve setting');
            }
        }

        return $setting;
    }

    /**
     * @throws Exception
     */
    public function getSettingValue(string $key): ?string
    {
        return $this->getSetting($key)->getValue();
    }

    public function isValidSetting(string $key): bool
    {
        if (!in_array($key, $this->getValidSettings())) {
            return false;
        }

        return true;
    }

    /**
     * @throws Exception
     */
    public function getDefaultSettingValue(string $key): ?string
    {
        if ($this->isValidSetting(trim($key))) {
            return $this->getDefaultSettings()[$key];
        }

        throw new Exception('Invalid Setting Requested');
    }

    /**
     * Currently values are stored in a const array. This method should be changed
     * if the settings are wanting to be stored somewhere else.
     */
    public function getDefaultSettings(): array
    {
        return self::VALID_SETTINGS;
    }

    /**
     * This returns a list of valid settings.
     */
    public function getValidSettings(): array
    {
        return array_keys($this->getDefaultSettings());
    }
}
