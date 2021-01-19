<?php

namespace App\DataFixtures;

use App\Entity\RepairOrder;
use App\Entity\RepairOrderInteraction;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Exception;
use Faker\Factory;

class RepairOrderInteractionFixture extends Fixture implements DependentFixtureInterface
{
    /**
     * @param ObjectManager $manager
     *
     * @throws Exception
     */
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        $interactionType        = ['Waiver Signed', 'Waiver Sent', 'Waiver Viewed', 'Waiver Acknowledged', 'Waiver Resent'];
        // for functional testing
        for ($i = 1; $i <= 50; $i++) {
            $repairOrderInteraction = new RepairOrderInteraction();
            $repairOrderReference   = $i;
            $userReference          = $i;
            
            $ro = $manager->getRepository(RepairOrder::class)->findOneBy(['id' => $repairOrderReference]);
            if ($ro) {
                $customer           = $ro->getPrimaryCustomer();
            }
            else {
                $customer           = $this->getReference('customer_' . $faker->numberBetween(1, 50));
            }

            $repairOrderInteraction->setRepairOrder($this->getReference('repairOrder_' . $repairOrderReference))
                                ->setCustomer($customer)
                                ->setUser($this->getReference('user_' . $userReference))
                                ->setType($faker->randomElement($interactionType))
                                ->setDate($faker->dateTimeBetween('-1 year'));

            $manager->persist($repairOrderInteraction);
            $manager->flush();
        }

        for ($i = 1; $i <= 50; $i++) {
            $repairOrderInteraction = new RepairOrderInteraction();
            $repairOrderReference   = $faker->numberBetween(1, 50);
            $userReference          = $faker->numberBetween(1, 50);

            $ro = $manager->getRepository(RepairOrder::class)->findOneBy(['id' => $repairOrderReference]);
            if ($ro) {
                $customer           = $ro->getPrimaryCustomer();
            }
            else {
                $customer           = $this->getReference('customer_' . $faker->numberBetween(1, 50));
            }

            $repairOrderInteraction->setRepairOrder($this->getReference('repairOrder_' . $repairOrderReference))
                                ->setCustomer($customer)
                                ->setUser($this->getReference('user_' . $userReference))
                                ->setType($faker->randomElement($interactionType))
                                ->setDate($faker->dateTimeBetween('-1 year'));

            $manager->persist($repairOrderInteraction);
            $manager->flush();
        }
    }

    /**
     * @return string[]
     */
    public function getDependencies (): array {
        return [
            RepairOrderFixture::class,
            UserFixture::class,
            CustomerFixture::class
        ];
    }
}
