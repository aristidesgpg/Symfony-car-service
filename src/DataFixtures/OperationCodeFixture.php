<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
Use Faker\Factory;
use App\Entity\OperationCode;

class OperationCodeFixture extends Fixture
{
    public function load(ObjectManager $manager) {
        $faker = Factory::create();

        for ($i = 1; $i <= 10; $i++) {
            $operationCode = new OperationCode();

            $operationCode->setCode($faker->unique()->word)
                    ->setDescription($faker->sentence($nbWords = 6, $variableNbWords = true))
                    ->setLaborHours($faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL))
                    ->setLaborTaxable($faker->boolean(50))
                    ->setPartsPrice($faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL))
                    ->setPartsTaxable($faker->boolean(50))
                    ->setSuppliesPrice($faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL))
                    ->setSuppliesTaxable($faker->boolean(50));

            $manager->persist($operationCode);
            $manager->flush();

            $this->addReference('OperationCode_' . $i, $operationCode);
        }
    }
}
