<?php

namespace App\DataFixtures;

use App\Entity\RepairOrderQuote;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

/**
 * Class RepairOrderQuoteFixture.
 */
class RepairOrderQuoteFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i < 50; ++$i ) {
            $repairOrderReference = $faker->unique()->numberBetween(1, 150);

            $dateCreated = $faker->dateTimeBetween('-1 year');

            $dateSent = $dateCreated ? clone $dateCreated : null;
            $dateSentModify = random_int(1, 12);
            $dateSent = $dateSent && random_int(0, 100) > 30 ? $dateSent->modify('+'.$dateSentModify.' hours') : null;

            $dateCustomerViewed = $dateSent ? clone $dateSent : null;
            $dateCustomerViewedModify = random_int(1, 12);
            $dateCustomerViewed = $dateCustomerViewed && random_int(0, 100) > 30 ? $dateCustomerViewed->modify('+'.$dateCustomerViewedModify.' hours') : null;

            $dateCustomerCompleted = $dateCustomerViewed ? clone $dateCustomerViewed : null;
            $dateCustomerCompletedModify = random_int(1, 12);
            $dateCustomerCompleted = $dateCustomerCompleted && random_int(0, 100) > 30 ? $dateCustomerCompleted->modify('+'.$dateCustomerCompletedModify.' hours') : null;

            $dateCompletedViewed = $dateCustomerCompleted ? clone $dateCustomerCompleted : null;
            $dateCompletedViewedModify = random_int(1, 12);
            $dateCompletedViewed = $dateCompletedViewed && random_int(0, 100) ? $dateCompletedViewed->modify('+'.$dateCompletedViewedModify.' hours') : null;

            $repairOrderQuote = new RepairOrderQuote();
            $repairOrderQuote->setRepairOrder($this->getReference('repairOrder_'.$repairOrderReference))
                             ->setDateCreated($dateCreated)
                             ->setDateSent($dateSent)
                             ->setDateCustomerViewed($dateCustomerViewed)
                             ->setDateCustomerCompleted($dateCustomerCompleted)
                             ->setDateCompletedViewed($dateCompletedViewed)
                             ->setDeleted($faker->boolean(30));

            $manager->persist($repairOrderQuote);
            $manager->flush();

            $this->addReference('repairOrderQuote_'.$i, $repairOrderQuote);
        }
    }

    /**
     * @return string[]
     */
    public function getDependencies()
    {
        return [
            RepairOrderFixture::class,
        ];
    }
}
