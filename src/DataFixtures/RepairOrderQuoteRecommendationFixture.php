<?php

namespace App\DataFixtures;

use App\Entity\RepairOrderQuoteRecommendation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

/**
 * Class RepairOrderQuoteRecommendationFixture
 *
 * @package App\DataFixtures
 */
class RepairOrderQuoteRecommendationFixture extends Fixture implements DependentFixtureInterface {
    /**
     * @param ObjectManager $manager
     */
    public function load (ObjectManager $manager) {
        $faker = Factory::create();
        
        for($i = 1; $i <= 50; $i ++){
            $repairOrderQuoteReference   = $faker->numberBetween(1, 100);
            $repairOrderQuote            = $this->getReference('repairOrderQuote_' . $repairOrderQuoteReference);
            $operationCodeReference      = $faker->numberBetween(2, 50);
           
            $repairOrderQuoteRecommendation = new RepairOrderQuoteRecommendation();
            $repairOrderQuoteRecommendation->setRepairOrderQuote($repairOrderQuote)
                                           ->setOperationCode($this->getReference('operationCode_' . $operationCodeReference))
                                           ->setDescription($faker->sentence($nbWords = 5, $variableNbWords = true))
                                           ->setPreApproved($faker->boolean(70))
                                           ->setApproved($faker->boolean(50))
                                           ->setPartsPrice($faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL))
                                           ->setSuppliesPrice($faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL))
                                           ->setLaborPrice($faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL))
                                           ->setNotes($faker->sentence($nbWords = 3, $variableNbWords = true));

            $manager->persist($repairOrderQuote);
            $manager->flush();

            $this->addReference('repairOrderQuoteRecommendation_' . $i, $repairOrderQuoteRecommendation);
        }
    }

    /**
     * @return string[]
     */
    public function getDependencies () {
        return [
            RepairOrderQuoteFixture::class,
            OperationCodeFixture::class
        ];
    }
}
