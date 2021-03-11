<?php

namespace App\Service;

use App\Entity\Settings;
use App\Helper\iServiceLoggerTrait;
use App\Repository\SettingsRepository;
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
        'phase1', 'phase2', 'phase3',
        'techAppUsername', 'techAppPassword',
        'custAppAppraiseButtonText', 'custAppFinanceRepairUrl', 'serviceTwilioFromNumber',
        'serviceTextIntro', 'serviceTextVideo', 'serviceTextVideoResend', 'serviceTextQuote', 'serviceTextPayment',
        'pricingLaborRate', 'pricingUseMatrix', 'pricingLaborTax', 'pricingPartsTax',
        'waiverEstimateText', 'waiverActivateAuthMessage', 'waiverIntroText',
        'advisorUsageEmails', 'openLate',
        'previewSalesVideoText',
        'upgradeInitialText', 'upgradeTradeInTax', 'upgradeTradeInTaxLimit', 'upgradeOfferExpiration', 'upgradeInstantOfferUrl',
        'upgradeIntroText', 'upgradeOfferText', 'upgradeCashOfferCopy', 'upgradeDisclaimer',
        'generalName', 'generalEmail', 'generalWebsiteUrl', 'generalInventoryUrl', 'generaAddress',
        'generalAddress2', 'generalCity', 'generalState', 'generalZip', 'generalPhone',
        'myReviewActivated', 'myReviewGoogleUrl', 'myReviewFacebookUrl', 'myReviewText',
        'usingAutomate', 'usingDealerBuilt', 'usingDealerTrack', 'usingCdk', 'dmsFilter', 'offHoursIntegration', 'customerURL',
    ];

    const VALID_FILE_SETTINGS = ['custAppPostInspectionVideo', 'generalLogo', 'reviewLogo'];

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var SettingsRepository
     */
    private $settingsRepository;

    /**
     * SettingsHelper constructor.
     */
    public function __construct(EntityManagerInterface $em, SettingsRepository $settingsRepository)
    {
        $this->em = $em;
        $this->settingsRepository = $settingsRepository;
    }

    /**
     * @throws
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
     * @throws Exception
     */
    public function getSetting(string $key): ?string
    {
        // Throw exception because false is a valid option
        if (!in_array($key, self::VALID_SETTINGS) && !in_array($key, self::VALID_FILE_SETTINGS)) {
            throw new Exception('Invalid Setting Requested');
        }

        $setting = $this->settingsRepository->findOneBy([
            'key' => $key,
        ]);

        if (!$setting) {
            // Create it because it's valid if we got here
            $settingArray = [
                $key => '',
            ];

            $this->commitSettings($settingArray);

            // Now get it again
            $setting = $this->settingsRepository->findOneBy([
                'key' => $key,
            ]);

            // Throw exception because false is a valid option
            if (!$setting) {
                throw new Exception('Unable to retrieve setting');
            }
        }

        return $setting->getValue();
    }
}
