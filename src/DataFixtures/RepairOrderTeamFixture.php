<?php

namespace App\DataFixtures;

use App\Entity\RepairOrderTeam;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class RepairOrderTeamFixture extends Fixture implements DependentFixtureInterface
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
            $repairOrderTeam = new RepairOrderTeam();
            $repairOrderTeam->setUser($this->getReference('user_' . $faker->numberBetween(1, 50)))
                            ->setRepairOrder($this->getReference('repairOrder_' . $faker->numberBetween(1, 50)));

            $manager->persist($repairOrderTeam);
            $manager->flush();
        }
    }

    /**
     * @return string[]
     */
    public function getDependencies (): array {
        return [
            RepairOrderFixture::class,
            UserFixture::class
        ];
    }
}
