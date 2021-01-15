<?php

namespace App\DataFixtures;

use App\Entity\PriceMatrix;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

/**
 * Class PriceMatrixFixtures
 *
 * @package App\DataFixtures
 */
class PriceMatrixFixture extends Fixture {
    
    /**
     * @param ObjectManager $manager
     */
    public function load (ObjectManager $manager) {
        $faker = Factory::create();
 
        // Load some PriceMatrixs
        for ($hours = 0; $hours <= 10; $hours+=0.1) {
            $priceMatrix = new PriceMatrix();

            $priceMatrix->setHours($hours)
                        ->setPrice($faker->randomFloat(1, 0, 10));
 
            $manager->persist($priceMatrix);
            $manager->flush();

            $this->addReference('pricematrix_' . $hours, $priceMatrix);
        }
    }
}
