<?php

namespace App\DataFixtures;

use App\Entity\RepairOrder;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

/**
 * Class RepairOrderFixture
 *
 * @package App\DataFixtures
 */
class RepairOrderFixture extends Fixture implements DependentFixtureInterface {
    /**
     * @param ObjectManager $manager
     */
    public function load (ObjectManager $manager) {
        $faker         = Factory::create();
        $statusOptions = [
            'Not Started',
            'In Progress',
            'Sent to Customer',
            'Customer Viewed',
            'Customer Complete',
            'Advisor Viewed Complete'
        ];

        // @TODO: Make this better w/ optional completions/values/cars/etc.
        // Make one constant RO
        $repairOrder       = new RepairOrder();
        $userReference     = $faker->numberBetween(1, 50);
        $customerReference = $faker->numberBetween(1, 50);
        $advisorReference  = $faker->numberBetween(1, 30);

        $repairOrder->setNumber(1234567)
                    ->setPrimaryCustomer($this->getReference('customer_' . $customerReference))
                    ->setPrimaryTechnician($this->getReference('user_' . $userReference))
                    ->setPrimaryAdvisor($this->getReference('user_' . $advisorReference))
                    ->setVideoStatus($statusOptions[$faker->numberBetween(0, 5)])
                    ->setMpiStatus($statusOptions[$faker->numberBetween(0, 5)])
                    ->setPaymentStatus($statusOptions[$faker->numberBetween(0, 5)])
                    ->setQuoteStatus($statusOptions[$faker->numberBetween(0, 5)])
                    ->setWaiter($faker->boolean(25))
                    ->setLinkHash(sha1('test'))
                    ->setDeleted($faker->boolean(2))
                    ->setArchived($faker->boolean(5));

        $manager->persist($repairOrder);
        $manager->flush();

        // Now make 150 more
        for ($i = 1; $i <= 150; $i++) {
            $repairOrder       = new RepairOrder();
            $userReference     = $faker->numberBetween(1, 50);
            $customerReference = $faker->numberBetween(1, 50);
            $advisorReference  = $faker->numberBetween(1, 30);
            $repairOrder->setNumber($faker->unique(true)->numberBetween(100000, 999999))
                        ->setPrimaryCustomer($this->getReference('customer_' . $customerReference))
                        ->setPrimaryTechnician($this->getReference('user_' . $userReference))
                        ->setPrimaryAdvisor($this->getReference('user_' . $advisorReference))
                        ->setVideoStatus($statusOptions[$faker->numberBetween(0, 5)])
                        ->setMpiStatus($statusOptions[$faker->numberBetween(0, 5)])
                        ->setPaymentStatus($statusOptions[$faker->numberBetween(0, 5)])
                        ->setQuoteStatus($statusOptions[$faker->numberBetween(0, 5)])
                        ->setWaiter($faker->boolean(25))
                        ->setLinkHash(sha1($faker->unique(true)->randomAscii))
                        ->setDeleted($faker->boolean(2))
                        ->setArchived($faker->boolean(5));

            $manager->persist($repairOrder);
            $manager->flush();
        }
    }

    /**
     * @return string[]
     */
    public function getDependencies () {
        return [
            UserFixture::class,
            CustomerFixture::class
        ];
    }
}
