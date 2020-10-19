<?php

namespace App\DataFixtures;

use App\Entity\Coupon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

/**
 * Class CouponFixtures
 *
 * @package App\DataFixtures
 */
class CouponFixture extends Fixture {

    /**
     * CouponFixtures constructor.
     *
     */
    public function __construct () {
    }

    /**
     * @param ObjectManager $manager
     */
    public function load (ObjectManager $manager) {
        $faker = Factory::create();

        // Load some coupons
        for ($i = 1; $i <= 50; $i++) {
            $coupon = new Coupon();

            $coupon->setTitle($faker->sentence($nbWords = 3, $variableNbWords = true))
                    ->setImage($faker->imageUrl($width = 640, $height = 480))
                    ->setDeleted($faker->boolean($i));

            $manager->persist($coupon);
            $manager->flush();

            $this->addReference('coupon_' . $i, $coupon);
        }
    }
}
