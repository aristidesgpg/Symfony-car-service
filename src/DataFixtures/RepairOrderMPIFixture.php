<?php

namespace App\DataFixtures;

use App\Entity\RepairOrderMPI;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

/**
 * Class RepairOrderMPIFixture.
 *
 * @package App\DataFixtures
 */
class RepairOrderMPIFixture extends Fixture implements DependentFixtureInterface
{
    /**
     * @var Container
     */
    private $container;

    /**
     * CouponFixtures constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @return void
     */
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        //read a csv file
        $filepath = $this->container->getParameter('csv_directory').'repairOrderMPI.csv';
        $csv = fopen($filepath, 'r');

        //load data from a csv file
        $i = 0;
        while (!feof($csv)) {
            $row = fgetcsv($csv);

            $repairOrderReference = $faker->unique()->numberBetween(1, 150);

            $dateCompleted = $faker->dateTimeBetween('-1 year');

            $dateSent = clone $dateCompleted;
            $dateSentModify = random_int(1, 12);
            $dateSent = $dateSent->modify('+'.$dateSentModify.' hours');

            $repairOrderMPI = new RepairOrderMPI();
            $repairOrderMPI->setRepairOrder($this->getReference('repairOrder_'.$repairOrderReference))
                           ->setDateCompleted($dateCompleted)
                           ->setDateSent($dateSent)
                           ->setResults($row[0]);

            $manager->persist($repairOrderMPI);
            $manager->flush();

            $this->addReference('repairOrderMPI_'.$i, $repairOrderMPI);
            ++$i;
        }
    }

    /**
     * @return string[]
     */
    public function getDependencies(): array
    {
        return [
            RepairOrderFixture::class,
        ];
    }
}
