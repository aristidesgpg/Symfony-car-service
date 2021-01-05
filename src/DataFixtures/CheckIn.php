<?php

namespace App\DataFixtures;

use App\Entity\CheckIn;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

/**
 * Class CheckInFixtures
 *
 * @package App\DataFixtures
 */
class CheckInFixture extends Fixture {
    private const VIDEO_FIXTURES = [
        'https://autoboost.sfo2.digitaloceanspaces.com/fixtures/fixture-video-1.mp4',
        'https://autoboost.sfo2.digitaloceanspaces.com/fixtures/fixture-video-2.mp4',
    ];
    /**
     * @param ObjectManager $manager
     */
    public function load (ObjectManager $manager) {
        $faker = Factory::create();
 
        // Load some CheckIns
        for ($i = 1; $i <= 10; $i++) {
            $CheckIn = new CheckIn();

            $CheckIn->setIdentification($faker->sentence($nbWords = 3, $variableNbWords = true))
                    ->setDate(new \DateTime())
                    ->setVideo($faker->randomElement(self::VIDEO_FIXTURES));
 
            $manager->persist($CheckIn);
            $manager->flush();

            $this->addReference('checkin_' . $i, $CheckIn);
        }
    }
}
