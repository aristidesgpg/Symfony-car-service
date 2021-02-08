<?php

namespace App\DataFixtures;

use App\Entity\RepairOrderQuote;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

/**
 * Class RepairOrderQuoteFixture
 *
 * @package App\DataFixtures
 */
class RepairOrderQuoteFixture extends Fixture implements DependentFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i < 100; $i++) {
            $repairOrderReference        = $faker->unique()->numberBetween(1, 150);

            $dateCreated                 = $faker->dateTimeBetween('-1 year');

            $dateSent                    = $dateCreated ? clone $dateCreated : null;
            $dateSentModify              = random_int(1, 12);
            $dateSent                    = $dateSent && random_int(0, 100) > 30 ? $dateSent->modify('+' . $dateSentModify . ' hours') : null;

            $dateCustomerViewed          = $dateSent ? clone $dateSent : null;
            $dateCustomerViewedModify    = random_int(1, 12);
            $dateCustomerViewed          = $dateCustomerViewed && random_int(0, 100) > 30 ? $dateCustomerViewed->modify('+' . $dateCustomerViewedModify . ' hours') : null;

            $dateCustomerCompleted       = $dateCustomerViewed ? clone $dateCustomerViewed : null;
            $dateCustomerCompletedModify = random_int(1, 12);
            $dateCustomerCompleted       = $dateCustomerCompleted && random_int(0, 100) > 30 ? $dateCustomerCompleted->modify('+' . $dateCustomerCompletedModify . ' hours') : null;

            $dateCompletedViewed         = $dateCustomerCompleted ? clone $dateCustomerCompleted : null;
            $dateCompletedViewedModify   = random_int(1, 12);
            $dateCompletedViewed         = $dateCompletedViewed && random_int(0, 100) ? $dateCompletedViewed->modify('+' . $dateCompletedViewedModify . ' hours') : null;

            $repairOrderQuote = new RepairOrderQuote();
            $repairOrderQuote->setRepairOrder($this->getReference('repairOrder_' . $repairOrderReference))
                ->setDateCreated($dateCreated)
                ->setDateSent($dateSent)
                ->setDateCustomerViewed($dateCustomerViewed)
                ->setDateCustomerCompleted($dateCustomerCompleted)
                ->setDateCompletedViewed($dateCompletedViewed);

            $manager->persist($repairOrderQuote);
            $manager->flush();

            $this->addReference('repairOrderQuote_' . $i, $repairOrderQuote);

            
        }

        // for ($i = 1; $i < 100; $i++) {
        //     $repairOrderReference = $faker->numberBetween(1, 150);
        //     $repairOrder = $this->getReference('repairOrder_' . $repairOrderReference);
            
        //     $dateNotStarted = $faker->dateTimeThisYear;
        //     $status   = "Not Started";
        //     //create repairOrderQuote
        //     $repairOrderQuote = new RepairOrderQuote();
        //     $repairOrderQuote->setRepairOrder($repairOrder)
        //                       ->setStatus($repairOrder->getPrimaryTechnician())
        //                       ->setDateSent($dateSent);
        //     //create repairOrderVideoInteraction
        //     $repairOrderMPIInteraction = new RepairOrderVideoInteraction();
        //     $repairOrderMPIInteraction->setRepairOrderVideo($repairOrderVideo)
        //                               ->setUser($repairOrder->getPrimaryTechnician())
        //                               ->setCustomer($repairOrder->getPrimaryCustomer())
        //                               ->setType($status)
        //                               ->setDate($dateUploaded);
        //     $repairOrderVideo->addInteraction($repairOrderMPIInteraction);
        //     //Sent
        //     if($faker->boolean(50)){
        //         $dateSent       = clone $dateUploaded;
        //         $dateSentModify = random_int(1, 12);
        //         $dateSent       = $dateSent->modify('+' . $dateSentModify . ' hours');
        //         $status         = "Sent";
        //         //update repairOrderVideo sent date
        //         $repairOrderVideo->setDateSent($dateSent);
        //         //create repairOrderVideoInteraction
        //         $repairOrderMPIInteraction = new RepairOrderVideoInteraction();
        //         $repairOrderMPIInteraction->setRepairOrderVideo($repairOrderVideo)
        //                                   ->setUser($repairOrder->getPrimaryTechnician())
        //                                   ->setCustomer($repairOrder->getPrimaryCustomer())
        //                                   ->setType($status)
        //                                   ->setDate($dateUploaded);
        //         $repairOrderVideo->addInteraction($repairOrderMPIInteraction);
        //         //Viewed
        //         if($faker->boolean(50)){
        //             $viewCount  = $faker->numberBetween(1, 5);
        //             $dateViewed = clone $dateSent;
        //             for($j = 0; $j < $viewCount; $j++){
        //                 $dateViewed       = clone $dateViewed;
        //                 $dateViewedModify = random_int(1, 12);
        //                 $dateViewed       = $dateViewed->modify('+' . $dateViewedModify . ' hours');
        //                 $status           = "Viewed";
        //                 //update repairOrderVideo viewed date
        //                 $repairOrderVideo->setDateViewed($dateSent);
        //                 //create repairOrderVideoInteraction
        //                 $repairOrderMPIInteraction = new RepairOrderVideoInteraction();
        //                 $repairOrderMPIInteraction->setRepairOrderVideo($repairOrderVideo)
        //                                           ->setUser($repairOrder->getPrimaryTechnician())
        //                                           ->setCustomer($repairOrder->getPrimaryCustomer())
        //                                           ->setType($status)
        //                                           ->setDate($dateViewed);
        //                 $repairOrderVideo->addInteraction($repairOrderMPIInteraction);
        //             }
        //         }
        //     }

        //     //update repairOrderVideo status
        //     $repairOrderVideo->setStatus($status);
        //     $manager->persist($repairOrderVideo);
        //     $manager->persist($repairOrder);
    }

    /**
     * @return string[]
     */
    public function getDependencies()
    {
        return [
            RepairOrderFixture::class
        ];
    }
}
