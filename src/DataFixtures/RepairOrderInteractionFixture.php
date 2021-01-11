<?php

namespace App\DataFixtures;

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
        for ($i = 1; $i <= 50; $i++) {
            $repairOrderInteraction = new RepairOrderInteraction();
            $userReference          = $faker->numberBetween(1, 50);
            $customerReference      = $faker->numberBetween(1, 50);
            $repairOrderReference   = $faker->numberBetween(1, 50);
            $interactionType        = ['waiver_signed', 'waiver_sent', 'waiver_viewed', 'waiver_acknowledged', 'waiver_re-sent'];

            $repairOrderInteraction->setRepairOrder($this->getReference('repairOrder_' . $repairOrderReference))
                                ->setCustomer($this->getReference('customer_' . $customerReference))
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
