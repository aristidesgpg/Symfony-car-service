<?php

namespace App\DataFixtures;

use App\Entity\RepairOrderReviewInteractions;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

/**
 * Class RepairOrderReviewInteractionsFixtures
 *
 * @package App\DataFixtures
 */
class RepairOrderReviewInteractionsFixture extends Fixture implements DependentFixtureInterface {
    private const STATUS_FIXTURES  = ['Sent', 'Viewd', 'Completed'] ;
    /**
     * @param ObjectManager $manager
     */
    public function load (ObjectManager $manager) {
        $faker = Factory::create();
 
        // Load some RepairOrderReviews
        for ($i = 1; $i <= 50; $i++) {
            $reviewInteractions = new RepairOrderReviewInteractions();

            $status = $faker->randomElement(self::STATUS_FIXTURES);
            $reviewInteractions->setRepairOrderReview($this->getReference('repairOrderReview_' . $i))
                               ->setType($status);

            if($status ==='Sent')
                $reviewInteractions->setUser($this->getReference('user_' . $faker->numberBetween(50,1)));
            else{
                $reviewInteractions->setCustomer($this->getReference('customer_' . $faker->numberBetween(50,1)));
            }

            $manager->persist($reviewInteractions);
            $manager->flush();

            $this->addReference('repairOrderReviewInteractions_' . $i, $reviewInteractions);
        }
    }
    public function getDependencies()
    {
        return [
            RepairOrderReviewFixture::class
        ];
    }
}
