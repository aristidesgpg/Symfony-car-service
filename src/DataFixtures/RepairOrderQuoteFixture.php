<?php

namespace App\DataFixtures;

use App\Entity\RepairOrderQuote;
use App\Entity\RepairOrderQuoteInteraction;
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

        for ($i = 1; $i < 100; $i++) {
            $repairOrderReference = $faker->numberBetween(1, 150);
            $repairOrder = $this->getReference('repairOrder_' . $repairOrderReference);
            
            $dateCreated = $faker->dateTimeThisYear;
            $status      = "Not Started";
            //create repairOrderQuote
            $repairOrderQuote = new RepairOrderQuote();
            $repairOrderQuote->setRepairOrder($repairOrder)
                             ->setDateCreated($dateCreated);
            //create repairOrderQuoteInteraction
            $repairOrderQuoteInteraction = new RepairOrderQuoteInteraction();
            $repairOrderQuoteInteraction->setRepairOrderQuote($repairOrderQuote)
                                        ->setUser($repairOrder->getPrimaryTechnician())
                                        ->setCustomer($repairOrder->getPrimaryCustomer())
                                        ->setType($status)
                                        ->setDate($dateCreated);
            $repairOrderQuote->addRepairOrderQuoteInteraction($repairOrderQuoteInteraction);
            //Sent
            if($faker->boolean(50)){
                $dateSent       = clone $dateCreated;
                $dateSentModify = random_int(1, 12);
                $dateSent       = $dateSent->modify('+' . $dateSentModify . ' hours');
                $status         = "Sent";
                //update repairOrderQuote sent date
                $repairOrderQuote->setDateSent($dateSent);
                //create repairOrderQuoteInteraction
                $repairOrderQuoteInteraction = new RepairOrderQuoteInteraction();
                $repairOrderQuoteInteraction->setRepairOrderQuote($repairOrderQuote)
                                            ->setUser($repairOrder->getPrimaryTechnician())
                                            ->setCustomer($repairOrder->getPrimaryCustomer())
                                            ->setType($status)
                                            ->setDate($dateCreated);
                $repairOrderQuote->addRepairOrderQuoteInteraction($repairOrderQuoteInteraction);
                //Viewed
                if($faker->boolean(50)){
                    $viewCount  = $faker->numberBetween(1, 5);
                    $dateViewed = clone $dateSent;
                    for($j = 0; $j < $viewCount; $j++){
                        $dateViewed       = clone $dateViewed;
                        $dateViewedModify = random_int(1, 12);
                        $dateViewed       = $dateViewed->modify('+' . $dateViewedModify . ' hours');
                        $status           = "Viewed";
                        //update repairOrderQuote viewed date
                        $repairOrderQuote->getDateCustomerViewed($dateSent);
                        //create repairOrderQuoteInteraction
                        $repairOrderQuoteInteraction = new RepairOrderQuoteInteraction();
                        $repairOrderQuoteInteraction->setRepairOrderQuote($repairOrderQuote)
                                                    ->setUser($repairOrder->getPrimaryTechnician())
                                                    ->setCustomer($repairOrder->getPrimaryCustomer())
                                                    ->setType($status)
                                                    ->setDate($dateCreated);
                        $repairOrderQuote->addRepairOrderQuoteInteraction($repairOrderQuoteInteraction);
                    }
                    //Completed
                    if($faker->boolean(50)){
                        $dateCompleted       = clone $dateViewed;
                        $dateCompletedModify = random_int(1, 12);
                        $dateCompleted       = $dateCompleted->modify('+' . $dateCompletedModify . ' hours');
                        $status              = "Completed";
                        //update repairOrderQuote sent date
                        $repairOrderQuote->getDateCustomerCompleted($dateCompleted);
                        //create repairOrderQuoteInteraction
                        $repairOrderQuoteInteraction = new RepairOrderQuoteInteraction();
                        $repairOrderQuoteInteraction->setRepairOrderQuote($repairOrderQuote)
                                                    ->setUser($repairOrder->getPrimaryTechnician())
                                                    ->setCustomer($repairOrder->getPrimaryCustomer())
                                                    ->setType($status)
                                                    ->setDate($dateCompleted);
                        $repairOrderQuote->addRepairOrderQuoteInteraction($repairOrderQuoteInteraction);

                        //Confirmed
                        if($faker->boolean(50)){
                            $dateConfirmed       = clone $dateViewed;
                            $dateConfirmedModify = random_int(1, 12);
                            $dateConfirmed       = $dateConfirmed->modify('+' . $dateConfirmedModify . ' hours');
                            $status              = "Confirmed";
                            //update repairOrderQuote sent date
                            $repairOrderQuote->setDateCustomerConfirmed($dateCompleted);
                            //create repairOrderQuoteInteraction
                            $repairOrderQuoteInteraction = new RepairOrderQuoteInteraction();
                            $repairOrderQuoteInteraction->setRepairOrderQuote($repairOrderQuote)
                                                        ->setUser($repairOrder->getPrimaryTechnician())
                                                        ->setCustomer($repairOrder->getPrimaryCustomer())
                                                        ->setType($status)
                                                        ->setDate($dateCompleted);
                            $repairOrderQuote->addRepairOrderQuoteInteraction($repairOrderQuoteInteraction);
                        }
                    }

                }
            }
            $repairOrder->setQuoteStatus($status);
            //update repairOrderQuote status
            $repairOrderQuote->setStatus($status);
            $manager->persist($repairOrderQuote);
            $manager->persist($repairOrder);

            $this->addReference('repairOrderQuote_' . $i, $repairOrderQuote);
        }
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
