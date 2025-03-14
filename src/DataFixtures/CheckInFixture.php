<?php

namespace App\DataFixtures;

use App\Entity\CheckIn;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

/**
 * Class CheckInFixtures
 *
 * @package App\DataFixtures
 */
class CheckInFixture extends Fixture implements DependentFixtureInterface {
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
        for ($i = 1; $i <= 110; $i++) {
            $CheckIn = new CheckIn();

            $CheckIn->setIdentification(sha1($faker->unique(true)->randomAscii))
                    ->setDate(new \DateTime())
                    ->setUser($this->getReference('user_' . ( $i % 50 + 1)))
                    ->setVideo($faker->randomElement(self::VIDEO_FIXTURES));
 
            $manager->persist($CheckIn);
            $manager->flush();

            $this->addReference('checkin_' . $i, $CheckIn);
        }
    }
    public function getDependencies()
    {
        return [
            UserFixture::class
        ];
    }
}
