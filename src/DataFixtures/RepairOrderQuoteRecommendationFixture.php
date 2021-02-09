<?php

namespace App\DataFixtures;

use App\Entity\RepairOrderQuoteRecommendation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

/**
 * Class RepairOrderQuoteRecommendationFixture.
 */
class RepairOrderQuoteRecommendationFixture extends Fixture implements DependentFixtureInterface
{
    /**
     * @return void
     */
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 1; $i <= 50; ++$i) {
            $repairOrderQuoteReference = $faker->numberBetween(1, 100);
            $repairOrderQuote = $this->getReference('repairOrderQuote_'.$repairOrderQuoteReference);
            $operationCodeReference = $faker->numberBetween(2, 50);
            $operationCode = $this->getReference('operationCode_'.$operationCodeReference);

            $repairOrderQuoteRecommendation = new RepairOrderQuoteRecommendation();
            $repairOrderQuoteRecommendation->setRepairOrderQuote($repairOrderQuote)
                                           ->setOperationCode($operationCode)
                                           ->setDescription($faker->sentence($nbWords = 5, $variableNbWords = true))
                                           ->setPreApproved($faker->boolean(70))
                                           ->setApproved($faker->boolean(50))
                                           ->setPartsPrice($faker->randomFloat($nbMaxDecimals = null, $min = 0, $max = null))
                                           ->setSuppliesPrice($faker->randomFloat($nbMaxDecimals = null, $min = 0, $max = null))
                                           ->setLaborPrice($faker->randomFloat($nbMaxDecimals = null, $min = 0, $max = null))
                                           ->setNotes($faker->sentence($nbWords = 3, $variableNbWords = true));

            $manager->persist($repairOrderQuote);
            $manager->flush();

            $this->addReference('repairOrderQuoteRecommendation_'.$i, $repairOrderQuoteRecommendation);
        }
    }

    /**
     * @return string[]
     */
    public function getDependencies()
    {
        return [
            RepairOrderQuoteFixture::class,
            OperationCodeFixture::class,
        ];
    }
}
