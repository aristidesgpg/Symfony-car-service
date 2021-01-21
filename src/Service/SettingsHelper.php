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

    const VALID_SETTINGS = [
//        'phase1' => [
//            'default_value' => '60',
//            'front_end' => '',
//        ],
//        'phase2' => [
//            'default_value' => '60',
//            'front_end' => '',
//        ],
//        'phase3' => [
//            'default_value' => '60',
//            'front_end' => '',
//        ],
        'techAppUsername' => [
            'default_value' => 'iService',
            'front_end' => 'iService App > App Username',
        ],
        'techAppPassword' => [
            'default_value' => '',
            'front_end' => 'iService App > App Password',
        ],
        'techAppReAuthenticate' => [
            'default_value' => false,
            'front_end' => '',
        ],
        'custAppAppraiseButtonText' => [
            'default_value' => 'Appraise My Car',
            'front_end' => 'Customer App > Appraise My Car',
        ],
        'custAppPostInspectionVideo' => [
            'default_value' => null,
            'front_end' => 'Customer App > Post Inspection Video Dealer Video',
        ],
        'custAppFinanceRepairUrl' => [
            'default_value' => null,
            'front_end' => 'Customer App > Finance My Repair URL',
        ],
        'serviceTwilioFromNumber' => [
            'default_value' => '8478137493',
            'front_end' => '',
        ],
        'serviceTextIntro' => [
            'default_value' => 'Welcome to (dealer name) Please text this number for status updates. Your inspection video will be sent from a separate number',
            'front_end' => 'Outgoing Messages > Intro Text',
        ],
        'serviceTextVideo' => [
            'default_value' => 'Your vehicle inspection video is ready, please click the link:',
            'front_end' => 'Outgoing Messages > Video Text',
        ],
        'serviceTextVideoResend' => [
            'default_value' => 'Friendly reminder from (dealer name), you have maintenance needed, please click the link:',
            'front_end' => 'Outgoing Messages > Video Resend Text',
        ],
        'serviceTextQuote' => [
            'default_value' => null,
            'front_end' => 'Outgoing Messages > Quote Text',
        ],
        'serviceTextPayment' => [
            'default_value' => null,
            'front_end' => 'Outgoing Messages > Payment Text',
        ],
        'pricingLaborRate' => [
            'default_value' => '110',
            'front_end' => 'Create A Quote > Labor Rate',
        ],
        'pricingUseMatrix' => [
            'default_value' => '0',
            'front_end' => 'Create A Quote > Use Matrix',
        ],
        'pricingLaborTax' => [
            'default_value' => '9.25',
            'front_end' => 'Create A Quote > Labor Tax',
        ],
        'pricingPartsTax' => [
            'default_value' => '9.25',
            'front_end' => 'Create A Quote > Parts Tax',
        ],
        'waiverEstimateText' => [
            'default_value' => 'Test Waiver Text',
            'front_end' => 'Waiver > Estimate Waiver Text',
        ],
        'waiverActivateAuthMessage' => [
            'default_value' => '0',
            'front_end' => 'Outgoing Messages > Activate Authorization Welcome Message',
        ],
        'waiverIntroText' => [
            'default_value' => null,
            'front_end' => 'Outgoing Messages > Waiver Text',
        ],
        'advisorUsageEmails' => [
            'default_value' => null,
            'front_end' => 'General > Add email address to be included in the daily advisor usage report',
        ],
        'openLate' => [
            'default_value' => '0',
            'front_end' => 'General > Does your service department operate outside of 3am-10pm?',
        ],
        'previewSalesVideoText' => [
            'default_value' => 'Welcome to the coolest dealership!',
            'front_end' => 'Outgoing Messages > Sales Video Text',
        ],
        'upgradeTradeInTax' => [
            'default_value' => '6.25',
            'front_end' => 'Upgrade > The percentage of tax to be paid on a trade in vehicle',
        ],
        'upgradeTradeInTaxLimit' => [
            'default_value' => '10000',
            'front_end' => 'Upgrade > The limit on applicable tax to be paid on a trade in vehicle',
        ],
        'upgradeOfferExpiration' => [
            'default_value' => '7',
            'front_end' => 'Upgrade > Total days until this offer expires',
        ],
        'upgradeInstantOfferUrl' => [
            'default_value' => 'https://www.performancetoyotastore.com/value-your-trade/',
            'front_end' => 'Upgrade > The website url to direct a user to obtain their instant cash offer',
        ],
        'upgradeIntroText' => [
            'default_value' => 'Click the link below to see the value of your vehicle.  Thank you for visiting Performance Toyota',
            'front_end' => 'Upgrade > Upgrade intro copy',
        ],
        'upgradeOfferText' => [
            'default_value' => 'Congratulations.  We have made you a cash offer.  Click the link to view.',
            'front_end' => 'Outgoing Messages > Upgrade Offer Text',
        ],
        'upgradeCashOfferCopy' => [
            'default_value' => 'Show to any sales agent to claim your offer.',
            'front_end' => 'Upgrade > Upgrade cash offer copy',
        ],
        'upgradeDisclaimer' => [
            'default_value' => 'The cash offer is contingent upon verifying the condition and trim levels are true that were selected.',
            'front_end' => 'Upgrade > Upgrade disclaimer',
        ],
        'percentageOfTax' => [
            'default_value' => '6.25',
            'front_end' => '',
        ],
        'limitOnTax' => [
            'default_value' => '10000',
            'front_end' => '',
        ],
        'totalDays' => [
            'default_value' => '7',
            'front_end' => '',
        ],
        'upgradeInitialText' => [
            'default_value' => 'Click the link below to see the value of your vehicle.  Thank you for visiting Performance Toyota',
            'front_end' => 'Outgoing Messages > Upgrade Initial Text',
        ],
        'upgradeCashOffer' => [
            'default_value' => 'Show to any sales agent to claim your offer.',
            'front_end' => 'Upgrade > Upgrade cash offer copy',
        ],
        'generalName' => [
            'default_value' => null,
            'front_end' => 'General > Company Name',
        ],
        'generalEmail' => [
            'default_value' => null,
            'front_end' => 'General > Company Email',
        ],
        'generalWebsiteUrl' => [
            'default_value' => 'https://www.performancetoyotastore.com/value-your-trade/',
            'front_end' => 'General > Website URL',
        ],
        'generalInventoryUrl' => [
            'default_value' => null,
            'front_end' => 'General > Website Inventory URL',
        ],
        'generaAddress' => [
            'default_value' => null,
            'front_end' => 'General > Address 1',
        ],
        'generalAddress2' => [
            'default_value' => null,
            'front_end' => 'General > Address 2',
        ],
        'generalCity' => [
            'default_value' => null,
            'front_end' => 'General > City',
        ],
        'generalState' => [
            'default_value' => null,
            'front_end' => 'General > State',
        ],
        'generalZip' => [
            'default_value' => null,
            'front_end' => 'General > Zip / Postal Code',
        ],
        'generalPhone' => [
            'default_value' => null,
            'front_end' => 'General > Phone',
        ],
        'reviewGoogleUrl' => [
            'default_value' => null,
            'front_end' => 'myReview > Google URL',
        ],
        'reviewFacebookUrl' => [
            'default_value' => null,
            'front_end' => 'myReview > Facebook URL',
        ],
        'reviewText' => [
            'default_value' => null,
            'front_end' => 'Outgoing Messages > Review Text',
        ],
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
     * @param ?string $value
     * @return Settings
     */
    private function addSetting(string $key, ?string $value): Settings
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
     * Persist pending transactions to DB helper function.
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
     * TODO Should this do something besides fail quietly?
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
     * This returns a list of valid settings.
     */
    public function getValidSettings(): array
    {
        return array_keys($this->getDefaultSettings());
    }

    /**
     * Currently values are stored in a const array. This method should be changed
     * if the settings are wanting to be stored somewhere else.
     *
     * This pulls
     */
    public function getDefaultSettings(): array
    {
        return $this->settingsIterator('default_value');
    }

    /**
     * Currently values are stored in a const array. This method should be changed
     * if the settings are wanting to be stored somewhere else.
     */
    public function getFrontendPathSettings(): array
    {
        return $this->settingsIterator('front_end');
    }

    /**
     * Used to iterate through the settings array and extract the required key. Useful if more keys are added in the future.
     */
    private function settingsIterator(string $array_key): array
    {
        $setting = [];
        foreach ($this->getDefaultSettingsAndFrontendPathSettings() as $key => $value) {
            $setting[$key] = $value[$array_key];
        }

        return $setting;
    }

    /**
     * Currently values are stored in a const array. This method should be changed
     * if the settings are wanting to be stored somewhere else.
     */
    private function getDefaultSettingsAndFrontendPathSettings(): array
    {
        return self::VALID_SETTINGS;
    }
}
