<?php

namespace App\DataFixtures;

use App\Entity\Setting;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

/**
 * Class SettingFixture
 * @package App\DataFixtures
 */
class SettingFixture extends Fixture {
    /**
     * @param ObjectManager $manager
     */
    public function load (ObjectManager $manager) {
        $settings = [
            'phase1'             => '60',
            'phase2'             => '60',
            'phase3'             => '60',
            'techUsername'       => 'iService',
            'techPassword'       => null,
            'custAppraise'       => 'Appraise My Car',
            'custVideo'          => null,
            'custFinanceUrl'     => null,
            'introText'          => 'Welcome to (dealer name) Please text this number for status updates. Your inspection video will be sent from a separate number',
            'videoText'          => 'Your vehicle inspection video is ready, please click the link:',
            'videoResendText'    => 'Friendly reminder from (dealer name), you have maintenance needed, please click the link:',
            'quoteText'          => null,
            'paymentText'        => null,
            'laborRate'          => '110',
            'useMatrix'          => '0',
            'laborTax'           => '9.25',
            'partsTax'           => '9.25',
            'estimateWaiverText' => 'Test Waiver Text',
            'activateAuthMsg'    => '0',
            'waiverText'         => null,
            'usageEmails'        => null,
            'openLate'           => '0',
            'salesVideoText'     => 'Welcome to the coolest dealership!',
            'percentageOfTax'    => '6.25',
            'limitOnTax'         => '10000',
            'totalDays'          => '7',
            'websiteUrl'         => 'https://www.performancetoyotastore.com/value-your-trade/',
            'upgradeInitialText' => 'Click the link below to see the value of your vehicle.  Thank you for visiting Performance Toyota',
            'upgradeOfferText'   => 'Congratulations.  We have made you a cash offer.  Click the link to view.',
            'upgradeCashOffer'   => 'Show to any sales agent to claim your offer.',
            'upgradeDisclaimer'  => 'The cash offer is contingent upon verifying the condition and trim levels are true that were selected.',
            'name'               => null,
            'email'              => null,
            'dealerWebsiteUrl'   => null,
            'inventoryUrl'       => null,
            'address'            => null,
            'address2'           => null,
            'city'               => null,
            'state'              => null,
            'zip'                => null,
            'phone'              => null,
            'spotLightUrl'       => 'https://www.performancetoyotastore.com/',
            'googleUrl'          => null,
            'facebookUrl'        => null,
            'reviewText'         => null,
        ];
        foreach ($settings as $k => $v) {
            $s = new Setting();
            $s->setName($k);
            $s->setValue($v);
            $manager->persist($s);
        }
        $manager->flush();
    }
}