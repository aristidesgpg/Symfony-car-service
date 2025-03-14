<?php

namespace App\DataFixtures;

use App\Entity\RepairOrderQuoteRecommendation;
use App\Entity\RepairOrderQuoteRecommendationPart;
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
            $repairOrderQuoteReference = $faker->numberBetween(1, 49);
            $operationCodeReference = $faker->numberBetween(2, 50);
            $operationCode = $this->getReference('operationCode_' . $operationCodeReference);

            $repairOrderQuoteRecommendation = new RepairOrderQuoteRecommendation();
            $repairOrderQuoteRecommendation->setRepairOrderQuote($this->getReference('repairOrderQuote_' . $repairOrderQuoteReference))
                ->setOperationCode($operationCode->getCode())
                ->setDescription($operationCode->getDescription())
                ->setPreApproved($faker->boolean(70))
                ->setApproved($faker->boolean(50))
                ->setPartsPrice($faker->randomFloat(2, 1, 2000))
                ->setSuppliesPrice($faker->randomFloat(2, 1, 500))
                ->setLaborPrice($faker->randomFloat(2, 1, 1000))
                ->setLaborHours($faker->randomFloat(1, .1, 9.9))
                ->setLaborTaxable($faker->boolean(50))
                ->setPartsTaxable($faker->boolean(50))
                ->setSuppliesTaxable($faker->boolean(50))
                ->setNotes($faker->sentence(3, true));

            $repairOrderQuoteRecommendationPart = new RepairOrderQuoteRecommendationPart();

            $quantity = $faker->randomFloat(2, 1, 100);
            $price = $faker->randomFloat(2, 1, 2000);
            $repairOrderQuoteRecommendationPart->setRepairOrderRecommendation($repairOrderQuoteRecommendation)
                ->setNumber($faker->unique(true)->numberBetween(10000, 99999))
                ->setName($faker->sentence($nbWords = 5, $variableNbWords = true))
                ->setPrice($price)
                ->setBin(substr($faker->regexify('[A-Za-z0-9]{20}'), 0, 5))
                ->setQuantity($quantity)
                ->setTotalPrice($price * $quantity);
            $manager->persist($repairOrderQuoteRecommendation);
            $manager->persist($repairOrderQuoteRecommendationPart);

            $manager->flush();

            $this->addReference('repairOrderQuoteRecommendation_' . $i, $repairOrderQuoteRecommendation);
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
