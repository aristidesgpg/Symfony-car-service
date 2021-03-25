<?php

namespace App\DataFixtures;

use App\Entity\RepairOrderQuoteRecommendation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

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
                                           ->setDescription($faker->sentence(5, true))
                                           ->setPreApproved($faker->boolean(70))
                                           ->setApproved($faker->boolean(50))
                                           ->setPartsPrice($faker->randomFloat(2, 1, 2000))
                                           ->setSuppliesPrice($faker->randomFloat(2, 1, 500))
                                           ->setLaborPrice($faker->randomFloat(2, 1, 1000))
                                           ->setNotes($faker->sentence(3, true));

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
