<?php

namespace App\DataFixtures;

use App\Entity\Coupon;
use App\Service\ImageUploader;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Exception;
use Faker\Factory;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class CouponFixture extends Fixture
{
    private $imageUploader;

    private $container;

    private $parameterBag;

    public function __construct(ImageUploader $imageUploader, ParameterBagInterface $parameterBag)
    {
        $this->imageUploader = $imageUploader;
        $this->parameterBag = $parameterBag;
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

            $this->addReference('coupon_'.$i, $coupon);
        }
    }
}
