<?php

namespace App\DataFixtures;

use App\Entity\RepairOrder;
use App\Entity\RepairOrderVideo;
use App\Entity\RepairOrderVideoInteraction;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

/**
 * Class RepairOrderVideoFixture.
 * @package App\DataFixtures
 */
class RepairOrderVideoFixture extends Fixture implements DependentFixtureInterface
{
    private const VIDEO_FIXTURES = [
        'https://autoboost.sfo2.digitaloceanspaces.com/fixtures/fixture-video-1.mp4',
        'https://autoboost.sfo2.digitaloceanspaces.com/fixtures/fixture-video-2.mp4',
    ];

    /**
     * @return void
     */
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        for ($i = 1; $i < 51; ++$i) {
            /** @var RepairOrder $ro */
            $ro = $this->getReference("repairOrder_{$i}");
            $created = $faker->dateTimeThisYear;
            $video = new RepairOrderVideo();
            $video->setRepairOrder($ro)
                  ->setTechnician($ro->getPrimaryTechnician())
                  ->setDateCreated($created)
                  ->setPath($faker->randomElement(self::VIDEO_FIXTURES));
            $interaction = new RepairOrderVideoInteraction();
            $interaction->setRepairOrderVideo($video)
                        ->setType('Created')
                        ->setDate($created);
            $video->addInteraction($interaction);
            $manager->persist($video);
        }
        $manager->flush();
    }

    /**
     * @return array<array-key, class-string>
     */
    public function getDependencies(): array
    {
        return [
            RepairOrderFixture::class,
        ];
    }
}
