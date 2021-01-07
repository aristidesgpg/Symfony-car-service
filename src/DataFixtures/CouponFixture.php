<?php

namespace App\DataFixtures;

use App\Entity\Coupon;
use App\Service\ImageUploader;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class CouponFixtures.
 */
class CouponFixture extends Fixture
{
    /**
     * @var ImageUploader
     */
    private $imageUploader;

    /**
     * @var Container
     */
    private $container;

    /**
     * CouponFixtures constructor.
     */
    public function __construct(ImageUploader $imageUploader, Container $container)
    {
        $this->imageUploader = $imageUploader;
        $this->container = $container;
    }

    /**
     * Create UploadedFile object from public url.
     *
     * @return UploadedFile|null
     *
     * @var array
     */
    public function createFileObject($url)
    {
        $rawData = file_get_contents($url);
        $imgRaw = imagecreatefromstring($rawData);

        if (false !== $imgRaw) {
            imagejpeg($imgRaw, $this->container->getParameter('uploads_directory').'tmp.jpg', 100);
            imagedestroy($imgRaw);

            return new UploadedFile($this->container->getParameter('uploads_directory').'tmp.jpg', 'tmp.jpg', 'image/jpeg');
        }

        return null;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        $image = 'https://picsum.photos/400/200';

        // Load some coupons
        for ($i = 1; $i <= 10; ++$i) {
            $coupon = new Coupon();
            //upload a random image
            $file = $this->createFileObject($image);
            $path = '';

            if ($file) {
                $path = $this->imageUploader->uploadImage($file, 'coupons');
            }

            if (!$path) {
                continue;
            }

            $coupon->setTitle($faker->sentence($nbWords = 3, $variableNbWords = true))
                   ->setImage($path)
                   ->setDeleted($faker->boolean(30));

            $manager->persist($coupon);
            $manager->flush();

            $this->addReference('coupon_'.$i, $coupon);
        }
    }
}
