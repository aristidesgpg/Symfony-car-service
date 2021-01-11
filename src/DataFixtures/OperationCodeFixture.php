<?php

namespace App\DataFixtures;

use App\Entity\OperationCode;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/**
 * Class OperationCodeFixture.
 */
class OperationCodeFixture extends Fixture
{
    /**
     * @var ParameterBagInterface
     */
    private $parameterBag;

    /**
     * CouponFixtures constructor.
     */
    public function __construct(ParameterBagInterface $parameterBag)
    {
        $this->parameterBag = $parameterBag;
    }

    /**
     * @return void
     */
    public function load(ObjectManager $manager)
    {
        $manager->getConnection()->getConfiguration()->setSQLLogger(null);
        //read a csv file
        $filepath = $this->parameterBag->get('csv_directory').'operationCode.csv';
        $csv = fopen($filepath, 'r');

        //load data from a csv file
        $i = 0;
        while (!feof($csv)) {
            $row = fgetcsv($csv);
            if (0 == $i++) {
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

            $this->addReference('operationCode_'.$i, $operationCode);
        }

        fclose($csv);
    }
}
