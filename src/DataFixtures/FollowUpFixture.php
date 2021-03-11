<?php

namespace App\DataFixtures;

use App\Entity\FollowUp;
use App\Entity\FollowUpInteraction;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;
use Faker\Factory;

/**
 * Class FollowUpFixture
 *
 * @package App\DataFixtures
 */
class FollowUpFixture extends Fixture implements DependentFixtureInterface {

    /**
     * @var Container
     */
    private $container;

    /**
     * CouponFixtures constructor.
     *
     * @param Container $container
     */
    public function __construct (Container $container) {
        $this->container = $container;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load (ObjectManager $manager) {
        $faker = Factory::create();
        
        //create FollowUp
        for($i = 0; $i < 50 ; $i++){

            $repairOrderReference = $faker->unique()->numberBetween(1, 150);
            $repairOrder = $this->getReference('repairOrder_' . $repairOrderReference);
            //Created
            $status      = "Created";
            $dateCreated = $faker->dateTimeBetween('-1 year');

            $followUp = new FollowUp();
            $followUp->setRepairOrder($repairOrder)
                     ->setDateCreated($dateCreated);
            // $manager->persist($followUp);
            //create FollowUp interaction
            $followUpInteraction = new FollowUpInteraction();
            $followUpInteraction->setFollowUp($followUp)
                                ->setUser($repairOrder->getPrimaryTechnician())
                                ->setCustomer($repairOrder->getPrimaryCustomer())
                                ->setType($status)
                                ->setDate($dateCreated);
            $manager->persist($followUpInteraction);
            if($faker->boolean(70)){
                if($faker->boolean(90)) {
                    //Sent
                    $dateSent       = clone $dateCreated;
                    $dateSentModify = random_int(1, 12);
                    $dateSent       = $dateSent->modify('+' . $dateSentModify . ' hours');
                    $status         = "Sent";
                    //update FollowUp sent date
                    $followUp->setDateSent($dateSent);
                    // $manager->persist($followUp);
                    //create FollowUp interaction
                    $followUpInteraction = new FollowUpInteraction();
                    $followUpInteraction->setFollowUp($followUp)
                                        ->setUser($repairOrder->getPrimaryTechnician())
                                        ->setCustomer($repairOrder->getPrimaryCustomer())
                                        ->setType($status)
                                        ->setDate($dateSent);
                    $manager->persist($followUpInteraction);

                    if($faker->boolean(70)){
                        //Viewed
                        $viewCount  = $faker->numberBetween(1, 5);
                        $dateViewed = clone $dateSent;
                        for($j = 0; $j < $viewCount; $j++){
                            $dateViewed       = clone $dateViewed;
                            $dateViewedModify = random_int(1, 12);
                            $dateViewed       = $dateViewed->modify('+' . $dateViewedModify . ' hours');
                            $status           = "Viewed";
                            //create FollowUp interaction
                            $followUpInteraction = new FollowUpInteraction();
                            $followUpInteraction->setFollowUp($followUp)
                                                ->setUser($repairOrder->getPrimaryTechnician())
                                                ->setCustomer($repairOrder->getPrimaryCustomer())
                                                ->setType($status)
                                                ->setDate($dateViewed);
                            $manager->persist($followUpInteraction);
                            //update FollowUp sent date
                            $followUp->setDateViewed($dateViewed);
                        }

                        if($faker->boolean(70)){
                            //Converted
                            $dateConverted       = clone $dateViewed;
                            $dateConvertedModify = random_int(1, 12);
                            $dateConverted       = $dateConverted->modify('+' . $dateConvertedModify . ' hours');
                            $status              = "Converted";
                            //update FollowUp converted date
                            $followUp->setDateConverted($dateConverted);
                            // $manager->persist($followUp);
                            //create FollowUp interaction
                            $followUpInteraction = new FollowUpInteraction();
                            $followUpInteraction->setFollowUp($followUp)
                                                ->setUser($repairOrder->getPrimaryTechnician())
                                                ->setCustomer($repairOrder->getPrimaryCustomer())
                                                ->setType($status)
                                                ->setDate($dateConverted);
                            $manager->persist($followUpInteraction);
                        }
                    }
                } else {
                    $status = "Not Delivered";
                    $followUpInteraction = new FollowUpInteraction();
                    $followUpInteraction->setFollowUp($followUp)
                                        ->setUser($repairOrder->getPrimaryTechnician())
                                        ->setCustomer($repairOrder->getPrimaryCustomer())
                                        ->setType($status)
                                        ->setDate($dateCreated);
                    $manager->persist($followUpInteraction);
                }
                
            }
            //update followUp status
            $followUp->setStatus($status);
            $manager->persist($followUp);
            $manager->flush();

            $this->addReference('followUp_' . $i, $followUp);
        }
    }

    /**
     * @return string[]
     */
    public function getDependencies () {
        return [
            RepairOrderFixture::class
        ];
    }
}
