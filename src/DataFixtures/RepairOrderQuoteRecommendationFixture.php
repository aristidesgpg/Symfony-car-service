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

        for ($i = 0; $i < 50; ++$i ) {
            $repairOrderQuoteReference = $faker->numberBetween(1, 49);
            $operationCodeReference = $faker->numberBetween(2, 50);

            $repairOrderQuoteRecommendation = new RepairOrderQuoteRecommendation();
            $repairOrderQuoteRecommendation->setRepairOrderQuote($this->getReference('repairOrderQuote_'.$repairOrderQuoteReference))
                                           ->setOperationCode($this->getReference('operationCode_'.$operationCodeReference))
                                           ->setDescription($faker->sentence(5, true))
                                           ->setPreApproved($faker->boolean(70))
                                           ->setApproved($faker->boolean(50))
                                           ->setPartsPrice($faker->randomFloat(2, 1, 2000))
                                           ->setSuppliesPrice($faker->randomFloat(2, 1, 500))
                                           ->setLaborPrice($faker->randomFloat(2, 1, 1000))
                                           ->setNotes($faker->sentence(3, true));

            $manager->persist($repairOrderQuoteRecommendation);
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
