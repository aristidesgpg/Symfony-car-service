<?php

namespace App\DataFixtures;

use App\Entity\PriceMatrix;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PriceMatrixFixture extends Fixture
{

    public function load(ObjectManager $manager)
    {
        // Load a Price Matrix
        for ($hours = 0; $hours <= 1.9; $hours += 0.1) {
            $priceMatrix = new PriceMatrix();

            $priceMatrix->setHours($hours)
                        ->setPrice($hours * 5);

            $manager->persist($priceMatrix);
            $manager->flush();

            $this->addReference('pricematrix_'.$hours, $priceMatrix);
        }
    }
}
