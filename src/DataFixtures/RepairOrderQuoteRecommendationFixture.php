<?php

namespace App\DataFixtures;

use App\Entity\RepairOrderQuoteRecommendation;
use App\Entity\RepairOrderQuoteRecommendationPart;
use App\Repository\PartRepository;
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
            $operationCode = $this->getReference('operationCode_'.$operationCodeReference);

            $repairOrderQuoteRecommendation = new RepairOrderQuoteRecommendation();
            $repairOrderQuoteRecommendation->setRepairOrderQuote($this->getReference('repairOrderQuote_'.$repairOrderQuoteReference))
                                           ->setOperationCode($operationCode)
                                           ->setDescription($faker->sentence(5, true))
                                           ->setPreApproved($faker->boolean(70))
                                           ->setApproved($faker->boolean(50))
                                           ->setPartsPrice($faker->randomFloat(2, 1, 2000))
                                           ->setSuppliesPrice($faker->randomFloat(2, 1, 500))
                                           ->setLaborPrice($faker->randomFloat(2, 1, 1000))
                                           ->setNotes($faker->sentence(3, true));

            $repairOrderQuoteRecommendationPart = new RepairOrderQuoteRecommendationPart();

            $quantity = $faker->randomFloat($nbMaxDecimals = null, $min = 0, $max = null);
            $price = $faker->randomFloat($nbMaxDecimals = null, $min = 0, $max = null);
            $part = $this->getReference('Parts_'.$i);

            $repairOrderQuoteRecommendationPart->setRepairOrderRecommendation($repairOrderQuoteRecommendation)
                                               ->setPart($part)
                                               ->setNumber($part->getNumber())
                                               ->setName($faker->sentence($nbWords = 5, $variableNbWords = true))
                                               ->setPrice($price)
                                               ->setQuantity($quantity)
                                               ->setTotalPrice($price * $quantity);
            $manager->persist($repairOrderQuoteRecommendation);
            $manager->persist($repairOrderQuoteRecommendationPart);

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
            PartFixture::class,
        ];
    }
}
