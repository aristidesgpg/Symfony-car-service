<?php

namespace App\DataFixtures;

use App\Entity\RepairOrder;
use App\Entity\RepairOrderVideo;
use App\Entity\RepairOrderVideoInteraction;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class RepairOrderVideoFixture extends Fixture implements DependentFixtureInterface {
    private const VIDEO_FIXTURES = [
        'https://autoboost.sfo2.digitaloceanspaces.com/fixtures/fixture-video-1.mp4',
        'https://autoboost.sfo2.digitaloceanspaces.com/fixtures/fixture-video-2.mp4',
    ];

    public function load (ObjectManager $manager) {
        $faker = Factory::create();
        for ($i = 1; $i < 100; $i++) {
            /** @var RepairOrder $repairOrder */
            $repairOrderReference = $faker->numberBetween(1, 150);
            $repairOrder = $this->getReference('repairOrder_' . $repairOrderReference);
            
            $dateUploaded = $faker->dateTimeThisYear;
            $status       = "Uploaded";
            //create repairOrderVideo
            $repairOrderVideo = new RepairOrderVideo();
            $repairOrderVideo->setRepairOrder($repairOrder)
                              ->setTechnician($repairOrder->getPrimaryTechnician())
                              ->setDateUploaded($dateUploaded)
                              ->setPath($faker->randomElement(self::VIDEO_FIXTURES));
            //create repairOrderVideoInteraction
            $repairOrderMPIInteraction = new RepairOrderVideoInteraction();
            $repairOrderMPIInteraction->setRepairOrderVideo($repairOrderVideo)
                                      ->setUser($repairOrder->getPrimaryTechnician())
                                      ->setCustomer($repairOrder->getPrimaryCustomer())
                                      ->setType($status)
                                      ->setDate($dateUploaded);
            $repairOrderVideo->addInteraction($repairOrderMPIInteraction);
            //Sent
            if($faker->boolean(50)){
                $dateSent       = clone $dateUploaded;
                $dateSentModify = random_int(1, 12);
                $dateSent       = $dateSent->modify('+' . $dateSentModify . ' hours');
                $status         = "Sent";
                //update repairOrderVideo sent date
                $repairOrderVideo->setDateSent($dateSent);
                //create repairOrderVideoInteraction
                $repairOrderMPIInteraction = new RepairOrderVideoInteraction();
                $repairOrderMPIInteraction->setRepairOrderVideo($repairOrderVideo)
                                          ->setUser($repairOrder->getPrimaryTechnician())
                                          ->setCustomer($repairOrder->getPrimaryCustomer())
                                          ->setType($status)
                                          ->setDate($dateUploaded);
                $repairOrderVideo->addInteraction($repairOrderMPIInteraction);
                //Viewed
                if($faker->boolean(50)){
                    $viewCount  = $faker->numberBetween(1, 5);
                    $dateViewed = clone $dateSent;
                    for($j = 0; $j < $viewCount; $j++){
                        $dateViewed       = clone $dateViewed;
                        $dateViewedModify = random_int(1, 12);
                        $dateViewed       = $dateViewed->modify('+' . $dateViewedModify . ' hours');
                        $status           = "Viewed";
                        //update repairOrderVideo viewed date
                        $repairOrderVideo->setDateViewed($dateSent);
                        //create repairOrderVideoInteraction
                        $repairOrderMPIInteraction = new RepairOrderVideoInteraction();
                        $repairOrderMPIInteraction->setRepairOrderVideo($repairOrderVideo)
                                                  ->setUser($repairOrder->getPrimaryTechnician())
                                                  ->setCustomer($repairOrder->getPrimaryCustomer())
                                                  ->setType($status)
                                                  ->setDate($dateViewed);
                        $repairOrderVideo->addInteraction($repairOrderMPIInteraction);
                    }
                }
            }

            //update repairOrderVideo status
            $repairOrderVideo->setStatus($status);
            $manager->persist($repairOrderVideo);
            $manager->persist($repairOrder);
        }
        $manager->flush();
    }

    /**
     * @return string[]
     */
    public function getDependencies (): array {
        return [
            RepairOrderFixture::class,
        ];
    }
}