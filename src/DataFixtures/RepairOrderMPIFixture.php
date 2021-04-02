<?php

namespace App\DataFixtures;

use App\Entity\RepairOrderMPI;
use App\Entity\RepairOrderMPIInteraction;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

/**
 * Class RepairOrderMPIFixture.
 */
class RepairOrderMPIFixture extends Fixture implements DependentFixtureInterface
{
    /**
     * @var Container
     */
    private $container;

    /**
     * CouponFixtures constructor.
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        //read a txt file
        $filepath = $this->container->getParameter('csv_directory').'repairOrderMPI.txt';
        $file = file($filepath);

        foreach ($file as $k => $line) {
            $repairOrderReference = $faker->unique()->numberBetween(1, 150);
            $repairOrder = $this->getReference('repairOrder_'.$repairOrderReference);
            //Completed
            $status = 'Complete';
            $dateCompleted = $faker->dateTimeBetween('-1 year');

            $repairOrderMPI = new RepairOrderMPI();
            $repairOrderMPI->setRepairOrder($repairOrder)
                           ->setDateCompleted($dateCompleted)
                           ->setResults($line);
            $manager->persist($repairOrderMPI);
            //create MPI interaction
            $repairOrderMPIInteraction = new RepairOrderMPIInteraction();
            $repairOrderMPIInteraction->setRepairOrderMPI($repairOrderMPI)
                                      ->setUser($repairOrder->getPrimaryTechnician())
                                      ->setCustomer($repairOrder->getPrimaryCustomer())
                                      ->setType($status)
                                      ->setDate($dateCompleted);
            $manager->persist($repairOrderMPIInteraction);
            if ($faker->boolean(70)) {
                //Sent
                $dateSent = clone $dateCompleted;
                $dateSentModify = random_int(1, 12);
                $dateSent = $dateSent->modify('+'.$dateSentModify.' hours');
                $status = 'Sent';

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

                if ($faker->boolean(70)) {
                    //Viewed
                    $viewCount = $faker->numberBetween(1, 5);
                    $dateViewed = clone $dateSent;
                    for ($j = 0; $j < $viewCount; ++$j) {
                        $dateViewed = clone $dateViewed;
                        $dateViewedModify = random_int(1, 12);
                        $dateViewed = $dateViewed->modify('+'.$dateViewedModify.' hours');
                        $status = 'Viewed';

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

            ++$k;
            $this->addReference('repairOrderMPI_'.$k, $repairOrderMPI);
        }
    }

    /**
     * @return string[]
     */
    public function getDependencies()
    {
        return [
            RepairOrderFixture::class,
        ];
    }
}
