<?php

namespace App\DataFixtures;

use App\Entity\RepairOrderMPI;
use App\Entity\RepairOrderMPIInteraction;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;
use Faker\Factory;

/**
 * Class RepairOrderMPIFixture
 *
 * @package App\DataFixtures
 */
class RepairOrderMPIFixture extends Fixture implements DependentFixtureInterface {

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
        
        //read a csv file
        $filepath = $this->container->getParameter('csv_directory').'repairOrderMPI.csv';
        $csv      = fopen($filepath, 'r');

        //load data from a csv file
        $i = 0;
        while (!feof($csv)) {
            $row = fgetcsv($csv);

            $repairOrderReference = $faker->unique()->numberBetween(1, 150);
            $repairOrder = $this->getReference('repairOrder_' . $repairOrderReference);
            //Completed
            $status         = "Complete";
            $dateCompleted  = $faker->dateTimeBetween('-1 year');

            $repairOrderMPI = new RepairOrderMPI();
            $repairOrderMPI->setRepairOrder($repairOrder)
                           ->setDateCompleted($dateCompleted)
                           ->setResults($row[0]);
            $manager->persist($repairOrderMPI);
            //create MPI interaction
            $repairOrderMPIInteraction = new RepairOrderMPIInteraction();
            $repairOrderMPIInteraction->setRepairOrderMPI($repairOrderMPI)
                                      ->setUser($repairOrder->getPrimaryTechnician())
                                      ->setCustomer($repairOrder->getPrimaryCustomer())
                                      ->setType($status)
                                      ->setDate($dateCompleted);
            $manager->persist($repairOrderMPIInteraction);
            if($faker->boolean(70)){
                //Sent
                $dateSent       = clone $dateCompleted;
                $dateSentModify = random_int(1, 12);
                $dateSent       = $dateSent->modify('+' . $dateSentModify . ' hours');
                $status         = "Sent";
                //update RepairOrderMPI sent date
                $repairOrderMPI->setDateSent($dateSent);
                $manager->persist($repairOrderMPI);
                //create MPI interaction
                $repairOrderMPIInteraction = new RepairOrderMPIInteraction();
                $repairOrderMPIInteraction->setRepairOrderMPI($repairOrderMPI)
                                            ->setUser($repairOrder->getPrimaryTechnician())
                                            ->setCustomer($repairOrder->getPrimaryCustomer())
                                            ->setType($status)
                                            ->setDate($dateSent);
                $manager->persist($repairOrderMPIInteraction);

                if($faker->boolean(70)){
                    //Viewed
                    $viewCount  = $faker->numberBetween(1, 5);
                    $dateViewed = clone $dateSent;
                    for($j = 0; $j < $viewCount; $j++){
                        $dateViewed       = clone $dateViewed;
                        $dateViewedModify = random_int(1, 12);
                        $dateViewed       = $dateViewed->modify('+' . $dateViewedModify . ' hours');
                        $status           = "Viewed";
                        //create MPI interaction
                        $repairOrderMPIInteraction = new RepairOrderMPIInteraction();
                        $repairOrderMPIInteraction->setRepairOrderMPI($repairOrderMPI)
                                                    ->setUser($repairOrder->getPrimaryTechnician())
                                                    ->setCustomer($repairOrder->getPrimaryCustomer())
                                                    ->setType($status)
                                                    ->setDate($dateViewed);
                        $manager->persist($repairOrderMPIInteraction);
                        //update RepairOrderMPI sent date
                        $repairOrderMPI->setDateViewed($dateViewed);
                    }
                }
            }
            
            //update repairOrder MPI status
            $repairOrder->setMpiStatus($status);
            $manager->persist($repairOrder);
            //update repairOrderMPI status
            $repairOrderMPI->setStatus($status);
            $manager->persist($repairOrderMPI);
            $manager->flush();

            $this->addReference('repairOrderMPI_' . $i, $repairOrderMPI);
            $i ++;
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
