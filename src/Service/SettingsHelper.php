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
    const PAYMENT_REQUIRED_FIELDS = [
        'paymentToken' => 'paymentToken',
        'nmiUsername' => 'NMI_USERNAME',
        'nmiPassword' => 'NMI_PASSWORD'
    ];
    const VALID_SETTINGS = [
        'activateIntegrationSms' => [
            'default_value' => '0',
            'front_end' => 'TBD: Needed for integrated dealers to send/not send text message when RO pulled from DMS',
        ],
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
            'default_value' => '1',
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
        'generalAddress' => [
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
        'generalLogo' => [
            'default_value' => 'https://iserviceauto.com/wp-content/uploads/2017/10/iService-logo.png',
            'front_end' => 'General > Company Logo',
        ],
        'myReviewActivated' => [
            'default_value' => '1',
            'front_end' => 'Hidden',
        ],
        'myReviewGoogleUrl' => [
            'default_value' => null,
            'front_end' => 'myReview > Google URL',
        ],
        'myReviewFacebookUrl' => [
            'default_value' => null,
            'front_end' => 'myReview > Facebook URL',
        ],
        'myReviewText' => [
            'default_value' => null,
            'front_end' => 'Outgoing Messages > Review Text',
        ],
        'myReviewLogo' => [
            'default_value' => 'https://iserviceauto.com/wp-content/uploads/2017/10/iService-logo.png',
            'front_end' => 'myReview > Logo',
        ],
        'hasPayments' => [
            'default_value' => 0,
            'front_end' => 'N/A',
        ],
        'paymentToken' => [
            'default_value' => 'Qv593h-2PkH24-N2JKD8-Ze8NXU',
            'front_end' => 'N/A',
        ],
        'usingAutomate' => [
            'default_value' => 0,
            'front_end' => 'Hidden',
        ],
        'usingDealerBuilt' => [
            'default_value' => 0,
            'front_end' => 'Hidden',
        ],
        'usingCdk' => [
            'default_value' => 0,
            'front_end' => 'Hidden',
        ],
        'usingDealerTrack' => [
            'default_value' => 0,
            'front_end' => 'Hidden',
        ],
//        'offHoursIntegration' => [
//            'default_value' => 0,
//            'front_end' => 'Hidden',
//        ],
        'customerURL' => [
            'default_value' => 'https://client3.iserviceauto.com/',
            'front_end' => 'Hidden',
        ],
        'dmsFilter' => [
            'default_value' => 'Internal',
            'front_end' => 'Hidden',
        ],
        'mpiSendToCustomer' => [
            'default_value' => 0,
            'front_end' => 'TBD',
        ],
        'processTimeout' => [
            'default_value' => 0,
            'front_end' => 'Hidden',
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

        // Check and Update any setting that are text boolean to 0 or 1
        $dbSettingsValues = $this->em->getRepository(Settings::class)->findAll();
        $this->updateBooleansToNumeric($dbSettingsValues);

        return $settingsSynced;
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

    /**
     * @param ?string $value
     */
    public function addSetting(string $key, ?string $value): Settings
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
     * @throws Exception
     */
    public function getDefaultSettingValue(string $key): ?string
    {
        if ($this->isValidSetting(trim($key))) {
            return $this->getDefaultSettings()[$key];
        }

        throw new Exception('Invalid Setting Requested');
    }

    public function isValidSetting(string $key): bool
    {
        if (!in_array($key, $this->getValidSettings())) {
            return false;
        }

        return true;
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

    public function updateMultipleSettings(array $settings): bool
    {
        foreach ($settings as $key => $value) {
            $this->updateSetting($key, $value);
        }

        //If it doesn't throw an exception, all values have been updated.
        return true;
    }

    /**
     * @param ?string $value
     */
    public function updateSetting(string $key, ?string $value): bool
    {
        if (!$this->isValidSetting($key)) {
            throw new InvalidArgumentException('Invalid Setting: '.$key);
        }

        if ('false' === $value) {
            $value = 0;
        }

        if ('true' === $value) {
            $value = 1;
        }

        $obj = $this->addSetting($key, $value);
        if ($obj) {
            return true;
        }

        return false;
    }

    /**
     * TODO Should this do something besides fail quietly?
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
     * @throws Exception
     */
    public function getSetting($key)
    {
        // Throw exception because false is a valid option
        if (!$this->isValidSetting($key)) {
            throw new Exception('Invalid Setting Requested: '.$key);
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

        return $setting->getValue();
    }

    /**
     * Currently values are stored in a const array. This method should be changed
     * if the settings are wanting to be stored somewhere else.
     */
    public function getFrontendPathSettings(): array
    {
        return $this->settingsIterator('front_end');
    }

    public function updateBooleansToNumeric($dbSettingsValues)
    {
        foreach ($dbSettingsValues as $value) {
            if ('false' == $value->getValue()) {
                $value->setValue(0);
                $this->em->persist($value);
                $this->em->flush();
            }
            if ('true' == $value->getValue()) {
                $value->setValue(1);
                $this->em->persist($value);
                $this->em->flush();
            }
        }
    }

     /**
     * This should only be used when you are wanting to OVERRIDE all of the settings.
     *
     * @throws InvalidArgumentException
     */
    public function adminCommitSettings(array $settings): void
    {
        foreach ($settings as $key => $value) {
            if (!is_string($key)) {
                throw new InvalidArgumentException('"key" must be string');
            }
        }

        if (array_key_exists('myReviewActivated',$settings)) {
            $this->addSetting('myReviewActivated', $settings['myReviewActivated']);
        }

        if (array_key_exists('hasPayments',$settings)) {    
            if (filter_var($settings['hasPayments'], FILTER_VALIDATE_BOOLEAN)) {
                foreach (array_keys(self::PAYMENT_REQUIRED_FIELDS) as $key) {
                    if (!array_key_exists($key, $settings)) {
                        throw new InvalidArgumentException("$key doesn't exist");
                    } else {
                        if ($key === 'paymentToken') {
                            $this->addSetting('paymentToken', $settings['paymentToken']);
                        } else {
                            $this->updateEnvSetting(self::PAYMENT_REQUIRED_FIELDS[$key], $settings[$key]);
                        }
                    }
                }
            } 
            $this->addSetting('hasPayments', $settings['hasPayments']);
        }

        $keys = ['usingAutomate', 'usingDealerBuilt', 'usingDealerTrack', 'usingCdk'];
        $requiredKeys = [ 
            ['automateEndpointId' => 'AUTOMATE_ENDPOINT_ID'],
            ['dealerbuiltLocationId' => 'DEALERBUILT_LOCATION_ID'],
            ['dealertrackEnterprise' => 'DEALERTRACK_ENTERPRISE', 'dealertrackLocationId' => 'DEALERTRACK_LOCATION_ID'],
            ['cdkDealerId' => 'CDK_DEALER_ID']
        ];
        foreach($keys as $index => $key) {
            if (array_key_exists($key, $settings)) {    
                if (filter_var($settings[$key], FILTER_VALIDATE_BOOLEAN)) {
                    foreach($requiredKeys[$index] as $requiredKey => $envKey) {
                        if (!array_key_exists($requiredKey, $settings)) {
                            throw new InvalidArgumentException("$requiredKey doesn't exist");
                        } else {
                            $this->updateEnvSetting($envKey, $settings[$requiredKey]);    
                        }
                    }
                    foreach($keys as $otherKey) {
                        if ($key !== $otherKey) {
                            $this->addSetting($otherKey, 'false');
                        }
                    }
                } 
                $this->addSetting($key, $settings[$key]);
            }
        }
    }
    private function updateEnvSetting($key, $value) {
        $file = fopen(__DIR__."/../../.env.local", 'r');
        $data = "";
        //read file
        while (!feof($file)) {
            $row = fgets($file);
            $arr = explode("=", $row);
            if (count($arr) === 1) {
                continue;
            }
            if (trim($arr[0]) !== $key) {
                $data .= $row;
            }
        }
        $data .= "$key=$value\n";
        fclose($file);
        //rewrite file
        $file = fopen(__DIR__."/../../.env.local", 'w');
        fwrite($file, $data);
        fclose($file);
    }
}
