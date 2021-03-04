<?php

namespace App\DataFixtures;

use App\Entity\Parts;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PartFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        // Load some Parts
        for ($i = 1; $i <= 100; $i++) {
            $part = new Part();
            $name = $faker->unique(true)->words($faker->numberBetween(1, 2));
            $name = implode(' ', $name);

            $part->setNumber($faker->unique(true)->numberBetween(10000, 99999))
                  ->setName($name)
                  ->setBin(substr($faker->regexify('[A-Za-z0-9]{20}'), 0, 5))
                  ->setAvailable($faker->numberBetween(0, 20));

            $manager->persist($part);
            $this->addReference('Parts_'.$i, $part);
        }

        $manager->flush();
    }
}
