<?php

namespace App\DataFixtures;

use App\Entity\RepairOrderReview;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

/**
 * Class RepairOrderReviewFixtures
 *
 * @package App\DataFixtures
 */
class RepairOrderReviewFixture extends Fixture implements DependentFixtureInterface {
    private const STATUS_FIXTURES  = ['Sent', 'Viewed', 'Complete'] ;
    private const RATING_FIXTURES = ['poor', 'average', 'great'];
    private const PLATFORM_FIXTURES = ['facebook', 'google'];
    /**
     * @param ObjectManager $manager
     */
    public function load (ObjectManager $manager) {
        $faker = Factory::create();
 
        // Load some RepairOrderReviews
        for ($i = 1; $i <= 20; $i++) {
            $repairOrderReview = new RepairOrderReview();

            $status          = $faker->randomElement(self::STATUS_FIXTURES);
            $repairOrderReview->setRepairOrder($this->getReference('repairOrder_' . $i))
                              ->setStatus($status);

            if($status ==='Sent')
                $repairOrderReview->setDateSent($faker->dateTime($max='now'));
            else if($status === 'Viewed'){
                $viewed_date = $faker->dateTime($max='now');
                $repairOrderReview->setDateViewed($viewed_date)
                                  ->setDateSent($faker->dateTime($viewed_date));
            }
            else if($status === 'Complete'){
                $completed_date = $faker->dateTime($max='now');
                $viewed_date = $faker->dateTime($completed_date);
                $repairOrderReview->setDateCompleted($completed_date)
                                  ->setDateViewed($viewed_date)
                                  ->setDateSent($faker->dateTime($viewed_date));

                $rating      = $faker->randomElement(self::RATING_FIXTURES);
                $repairOrderReview->setRating($rating)
                                  ->setPlatform($faker->randomElement(self::PLATFORM_FIXTURES));
            }
            
            

            $manager->persist($repairOrderReview);
            $manager->flush();

            $this->addReference('repairOrderReview_' . $i, $repairOrderReview);
        }
    }
    public function getDependencies()
    {
        return [
            RepairOrderFixture::class
        ];
    }
}
