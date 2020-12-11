<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\OperationCode;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class OperationCodeFixture extends Fixture
{
    /**
     * @var Container
     */
    private $container;

    /**
     * CouponFixtures constructor.
     *
     * @param Container     $container
     */
    public function __construct (Container $container) {
        $this->container = $container;
    }

    public function load(ObjectManager $manager) {
        $manager->getConnection()->getConfiguration()->setSQLLogger(null);
        //read a csv file
        $filepath = $this->container->getParameter('csv_directory').'operationCode.csv';
        $csv      = fopen($filepath, 'r');

        //load data from a csv file
        $i = 0;
        while (!feof($csv)) {
            $row = fgetcsv($csv);
            if($i++ == 0){
                continue;
            }

            $operationCode = new OperationCode();
            $operationCode->setCode($row[1])
                        ->setDescription($row[2])
                        ->setLaborHours(floatval($row[3]))
                        ->setLaborTaxable($row[4])
                        ->setPartsPrice(floatval($row[5]))
                        ->setPartsTaxable($row[6])
                        ->setSuppliesPrice(floatval($row[7]))
                        ->setSuppliesTaxable($row[8]);
            $manager->persist($operationCode);
            $manager->flush();

            $this->addReference('operationCode_' . $i, $operationCode);
        }

        fclose($csv);
    }
}
