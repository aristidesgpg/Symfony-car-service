<?php

namespace App\DataFixtures;

use App\Entity\Parts;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

/**
 * Class PartsFixtures
 *
 * @package App\DataFixtures
 */
class PartsFixture extends Fixture {
    /**
     * @param ObjectManager $manager
     */
    public function load (ObjectManager $manager) {
        $faker = Factory::create();
 
        // Load some Partss
        for ($i = 1; $i <= 110; $i++) {
            $Parts = new Parts();

            $Parts->setNumber( $faker->randomNumber($nbDigits = null, $strict = false) )
                  ->setName($faker->name)
                  ->setBin( $faker->regexify('[A-Za-z0-9]{20}') )
                  ->setAvailable( $faker->boolean(75) );
 
            $manager->persist($Parts);
            $this->addReference('Parts_' . $i, $Parts);
        }

        $manager->flush();
    }
}
