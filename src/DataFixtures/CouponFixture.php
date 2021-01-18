<?php

namespace App\DataFixtures;

use App\Entity\Coupon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

/**
 * Class CouponFixtures
 *
 * @package App\DataFixtures
 */
class CouponFixture extends Fixture {

    /**
     * @var Container
     */
    private $container;

    /**
     * CouponFixtures constructor.
     *
     * @param Container     $container
     */
    public function __construct (Container $container) {
        $this->container     = $container;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load (ObjectManager $manager) {
        $faker = Factory::create();
        $image = 'https://picsum.photos/400/200';

        // Load some coupons
        for ($i = 1; $i <= 10; $i++) {
            $coupon = new Coupon();
            $coupon->setTitle($faker->sentence($nbWords = 3, $variableNbWords = true))
                   ->setImage($image)
                   ->setDeleted($faker->boolean(30));

            $manager->persist($coupon);
            $manager->flush();

            $this->addReference('coupon_' . $i, $coupon);
        }
    }
}
