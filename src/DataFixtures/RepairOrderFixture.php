<?php

namespace App\DataFixtures;

use App\Entity\RepairOrder;
use App\Entity\RepairOrderNote;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Exception;
use Faker\Factory;

/**
 * Class RepairOrderFixture
 *
 * @package App\DataFixtures
 */
class RepairOrderFixture extends Fixture implements DependentFixtureInterface
{
    /**
     * @param ObjectManager $manager
     *
     * @throws Exception
     */
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        $mpiOptions = [
            'Not Started',
            'Complete',
            'Sent',
            'Viewed',
        ];
        $videoOptions = [
            'Not Started',
            'Uploaded',
            'Sent',
            'Viewed',
        ];
        $quoteOptions = [
            'Not Started',
            'Technician In Progress',
            'Parts In Progress',
            'Advisor In Progress',
            'Sent',
            'Viewed',
            'Completed',
            'Confirmed',
        ];
        $paymentOptions = [
            'Not Started',
            'Sent',
            'Viewed',
            'Paid',
            'Confirmed',
        ];

        // @TODO: Make this better w/ optional completions/values/cars/etc.
        // Make one constant RO
        $repairOrder = new RepairOrder();
        $userReference = $faker->numberBetween(1, 50);
        $customerReference = $faker->numberBetween(1, 50);
        $advisorReference = $faker->numberBetween(1, 30);

        $repairOrder->setNumber(1234567)
                    ->setPrimaryCustomer($this->getReference('customer_' . $customerReference))
                    ->setPrimaryTechnician($this->getReference('user_' . $userReference))
                    ->setPrimaryAdvisor($this->getReference('user_' . $advisorReference))
                    ->setVideoStatus('Not Started')
                    ->setMPIStatus('Not Started')
                    ->setPaymentStatus($faker->randomElement($paymentOptions))
                    ->setQuoteStatus($faker->randomElement($quoteOptions))
                    ->setWaiter($faker->boolean(25))
                    ->setLinkHash(sha1('test'))
                    ->setDeleted($faker->boolean(2))
                    ->setArchived($faker->boolean(5));

        $manager->persist($repairOrder);
        $manager->flush();

        // Now make 150 more
        for ($i = 1; $i <= 150; $i++) {
            $repairOrder = new RepairOrder();
            $userReference = $faker->numberBetween(1, 50);
            $customerReference = $faker->numberBetween(1, 50);
            $advisorReference = $faker->numberBetween(1, 30);
            $waiter = $faker->boolean(75);
            $pickupDate = null;
            $dateCreated = $faker->dateTimeBetween('-1 year');
            $dateClosed = clone $dateCreated;
            $dateModify = random_int(1, 12);
            $dateClosed = $dateClosed->modify('+'.$dateModify.' hours');
            $closedRandom = random_int(0, 100);
            $startValue = $faker->randomFloat(2, 100, 3000);
            $approvedValue = null;
            $finalValue = null;
            $approvedValueRandom = random_int(0, 100);

            if (!$waiter) {
                $pickupDate = clone $dateCreated;
                $pickupDate->modify('+'.$faker->numberBetween(1, 24).' hours');
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
                        ->setVideoStatus('Not Started')
                        ->setMPIStatus('Not Started')
                        ->setPaymentStatus($faker->randomElement($paymentOptions))
                        ->setQuoteStatus($faker->randomElement($quoteOptions))
                        ->setWaiter($waiter)
                        ->setPickupDate($pickupDate)
                        ->setLinkHash(sha1($faker->unique()->randomAscii.$i))
                        ->setDeleted($faker->boolean(2))
                        ->setArchived($faker->boolean(5))
                        ->setDateCreated($dateCreated)
                        ->setDateClosed($dateClosed)
                        ->setInternal($faker->boolean(1))
                        ->setYear($faker->year)
                        ->setMake('Toyota')
                        ->setModel('Corolla')
                        ->setMiles($faker->numberBetween(1000, 250000))
                        ->setVin(sha1($faker->unique()->randomAscii.$i))
                        ->setStartValue($startValue)
                        ->setApprovedValue($approvedValue)
                        ->setFinalValue($finalValue);

            $manager->persist($repairOrder);
            $manager->flush();

            $this->addReference('repairOrder_'.$i, $repairOrder);

            // Determine if it should a note
            $noteCount = $faker->numberBetween(0, 3);

            if ($noteCount > 0) {
                for ($x = 1; $x <= $noteCount; $x++) {
                    $dateCreated = $faker->dateTimeBetween($dateCreated, $dateClosed);
                    $note = new RepairOrderNote();
                    $note->setRepairOrder($repairOrder)
                         ->setNote($faker->realText(400))
                         ->setDateCreated($dateCreated);

                    $manager->persist($note);
                    $manager->flush();
                }
            }
        }
    }

    /**
     * @return string[]
     */
    public function getDependencies(): array
    {
        return [
            UserFixture::class,
            CustomerFixture::class,
        ];
    }
}
