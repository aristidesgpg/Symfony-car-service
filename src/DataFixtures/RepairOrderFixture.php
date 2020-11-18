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
                    ->setMPIStatus($statusOptions[$faker->numberBetween(0, 5)])
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
            $repairOrder         = new RepairOrder();
            $userReference       = $faker->numberBetween(1, 50);
            $customerReference   = $faker->numberBetween(1, 50);
            $advisorReference    = $faker->numberBetween(1, 30);
            $waiter              = $faker->boolean(75);
            $pickupDate          = null;
            $dateCreated         = $faker->dateTimeBetween('-1 year');
            $dateClosed          = clone $dateCreated;
            $dateModify          = random_int(1, 12);
            $dateClosed          = $dateClosed->modify('+' . $dateModify . ' hours');
            $closedRandom        = random_int(0, 100);
            $startValue          = $faker->randomFloat(2, 100, 3000);
            $approvedValue       = null;
            $finalValue          = null;
            $approvedValueRandom = random_int(0, 100);

            if (!$waiter) {
                $pickupDate = clone $dateCreated;
                $pickupDate->modify('+' . $faker->numberBetween(1, 24) . ' hours');
            }

            // 80% chance it's closed
            if ($closedRandom > 80) {
                $dateClosed = null;
            }

            if ($dateClosed) {
                $finalValue = $startValue + $faker->randomFloat(2, 0, 1000);
            }

            // 50% chance if open to have approved, or if it is closed already, set approved value
            if ($approvedValueRandom > 50 || $dateClosed) {
                $approvedMax = 1000;
                if ($finalValue) {
                    $approvedMax = $finalValue - $startValue;
                }

                $approvedValue = $startValue + $faker->randomFloat(2, 0, $approvedMax);
            }

            $repairOrder->setNumber($faker->unique(true)->numberBetween(100000, 999999))
                        ->setPrimaryCustomer($this->getReference('customer_' . $customerReference))
                        ->setPrimaryTechnician($this->getReference('user_' . $userReference))
                        ->setPrimaryAdvisor($this->getReference('user_' . $advisorReference))
                        ->setVideoStatus($statusOptions[$faker->numberBetween(0, 5)])
                        ->setMPIStatus($statusOptions[$faker->numberBetween(0, 5)])
                        ->setPaymentStatus($statusOptions[$faker->numberBetween(0, 5)])
                        ->setQuoteStatus($statusOptions[$faker->numberBetween(0, 5)])
                        ->setWaiter($waiter)
                        ->setPickupDate($pickupDate)
                        ->setLinkHash(sha1($faker->unique(true)->randomAscii))
                        ->setDeleted($faker->boolean(2))
                        ->setArchived($faker->boolean(5))
                        ->setDateCreated($dateCreated)
                        ->setDateClosed($dateClosed)
                        ->setInternal($faker->boolean(1))
                        ->setYear($faker->year)
                        ->setMake('Toyota')
                        ->setModel('Corolla')
                        ->setMiles($faker->numberBetween(1000, 250000))
                        ->setVin(sha1($faker->unique(true)->randomAscii))
                        ->setStartValue($startValue)
                        ->setApprovedValue($approvedValue)
                        ->setFinalValue($finalValue);

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
