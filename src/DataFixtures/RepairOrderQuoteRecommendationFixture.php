<?php

namespace App\DataFixtures;

use App\Entity\RepairOrderQuoteRecommendation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

/**
 * Class RepairOrderQuoteRecommendationFixture.
 *
 * @package App\DataFixtures
 */
class RepairOrderQuoteRecommendationFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i < 50; ++$i) {
            $repairOrderQuoteReference = $faker->numberBetween(1, 49);
            $operationCodeReference = $faker->numberBetween(2, 50);

            $repairOrderQuoteRecommendation = new RepairOrderQuoteRecommendation();
            $repairOrderQuoteRecommendation->setRepairOrderQuote($this->getReference('repairOrderQuote_'.$repairOrderQuoteReference))
                                           ->setOperationCode($this->getReference('operationCode_'.$operationCodeReference))
                                           ->setDescription($faker->sentence($nbWords = 5, $variableNbWords = true))
                                           ->setPreApproved($faker->boolean(70))
                                           ->setApproved($faker->boolean(50))
                                           ->setPartsPrice($faker->randomFloat($nbMaxDecimals = null, $min = 0, $max = null))
                                           ->setSuppliesPrice($faker->randomFloat($nbMaxDecimals = null, $min = 0, $max = null))
                                           ->setLaborPrice($faker->randomFloat($nbMaxDecimals = null, $min = 0, $max = null))
                                           ->setNotes($faker->sentence($nbWords = 3, $variableNbWords = true));

            $manager->persist($repairOrderQuoteRecommendation);
            $manager->flush();

            $this->addReference('repairOrderQuoteRecommendation_'.$i, $repairOrderQuoteRecommendation);
        }
    }

    /**
     * @return string[]
     */
    public function getDependencies(): array
    {
        return [
            RepairOrderQuoteFixture::class,
            OperationCodeFixture::class,
        ];
    }
}
