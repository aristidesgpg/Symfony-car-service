<?php

namespace App\DataFixtures;

use App\Entity\Settings;
use App\Service\PasswordHelper;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Exception;

/**
 * Class SettingFixture
 *
 * @package App\DataFixtures
 */
class SettingsFixture extends Fixture {

    /**
     * @var PasswordHelper
     */
    private $passwordHelper;

    /**
     * SettingsFixture constructor.
     *
     * @param PasswordHelper $passwordHelper
     */
    public function __construct (PasswordHelper $passwordHelper) {
        $this->passwordHelper = $passwordHelper;
    }

    /**
     * @param ObjectManager $manager
     *
     * @throws Exception
     *
     * @return void
     */
    public function load (ObjectManager $manager) {
        $settings = [
            'phase1'                     => '60',
            'phase2'                     => '60',
            'phase3'                     => '60',
            'techAppUsername'            => 'iService',
            'techAppPassword'            => $this->passwordHelper->hashPassword('test'),
            'techAppReAuthenticate'      => false,
            'custAppAppraiseButtonText'  => 'Appraise My Car',
            'custAppPostInspectionVideo' => null,
            'custAppFinanceRepairUrl'    => null,
            'serviceTwilioFromNumber'    => '8478137493',
            'serviceTextIntro'           => 'Welcome to (dealer name) Please text this number for status updates. Your inspection video will be sent from a separate number',
            'serviceTextVideo'           => 'Your vehicle inspection video is ready, please click the link:',
            'serviceTextVideoResend'     => 'Friendly reminder from (dealer name), you have maintenance needed, please click the link:',
            'serviceTextQuote'           => null,
            'serviceTextPayment'         => null,
            'pricingLaborRate'           => '110',
            'pricingUseMatrix'           => '0',
            'pricingLaborTax'            => '9.25',
            'pricingPartsTax'            => '9.25',
            'waiverEstimateText'         => 'Test Waiver Text',
            'waiverActivateAuthMessage'  => '0',
            'waiverIntroText'            => null,
            'advisorUsageEmails'         => null,
            'openLate'                   => '0',
            'previewSalesVideoText'      => 'Welcome to the coolest dealership!',
            'upgradeTradeInTax'          => '6.25',
            'upgradeTradeInTaxLimit'     => '10000',
            'upgradeOfferExpiration'     => '7',
            'upgradeInstantOfferUrl'     => 'https://www.performancetoyotastore.com/value-your-trade/',
            'upgradeIntroText'           => 'Click the link below to see the value of your vehicle.  Thank you for visiting Performance Toyota',
            'upgradeOfferText'           => 'Congratulations.  We have made you a cash offer.  Click the link to view.',
            'upgradeCashOfferCopy'       => 'Show to any sales agent to claim your offer.',
            'upgradeDisclaimer'          => 'The cash offer is contingent upon verifying the condition and trim levels are true that were selected.',
            'percentageOfTax'            => '6.25',
            'limitOnTax'                 => '10000',
            'totalDays'                  => '7',
            'upgradeInitialText'         => 'Click the link below to see the value of your vehicle.  Thank you for visiting Performance Toyota',
            'upgradeCashOffer'           => 'Show to any sales agent to claim your offer.',
            'generalName'                => null,
            'generalEmail'               => null,
            'generalWebsiteUrl'          => 'https://www.performancetoyotastore.com/value-your-trade/',
            'generalInventoryUrl'        => null,
            'generaAddress'              => null,
            'generalAddress2'            => null,
            'generalCity'                => null,
            'generalState'               => null,
            'generalZip'                 => null,
            'generalPhone'               => null,
            'myReviewGoogleURL' => null,
            'myReviewFacebookURL' => null,
            'myReviewText' => 'Please leave your review for our company.',
            'myReviewActivated' => 0,
            'usingAutomate'              => 'false',
            'usingDealerTrack'           => 'false',
            'usingDealerBuilt'           => 'false',
            'usingCdk'                   => 'true',
            'activateIntegrationSms'     => 'true',
            'dmsFilter'                  => 'Internal',
            'customerURL'                => 'http://client3.iserviceauto.com/',
            'offHoursIntegration'        => 'false'
        ];

        foreach ($settings as $k => $v) {
            $setting = new Settings($k, $v);
            $manager->persist($setting);
        }
        $manager->flush();
    }
}
