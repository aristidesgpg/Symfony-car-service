<?php

namespace App\DataFixtures;

use App\Entity\ServiceSMS;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

/**
 * Class ServiceSMSFixture
 *
 * @package App\DataFixtures
 */
class ServiceSMSFixture extends Fixture implements DependentFixtureInterface {
    /**
     * @param ObjectManager $manager
     */
    public function load (ObjectManager $manager) {
        $faker = Factory::create();
        
        for($i = 0; $i < 50; $i ++){
            $userReference     = $faker->numberBetween(1, 49);
            $customerReference = $faker->numberBetween(1, 49);
            $user              = $this->getReference('user_' . $userReference);
            $customer          = $this->getReference('customer_' . $customerReference);
           
            $serviceSMS = new ServiceSMS();
            $serviceSMS->setUser($user)
                       ->setCustomer($customer)
                       ->setPhone($customer->getPhone())
                       ->setMessage($faker->sentence($nbWords = 5, $variableNbWords = true))
                       ->setIncoming($faker->boolean(60))
                       ->setIsRead($faker->boolean(80));
                       
            $manager->persist($serviceSMS);
            $manager->flush();

            $this->addReference('serviceSMS_' . $i, $serviceSMS);
        }
    }

    /**
     * @return string[]
     */
    public function getDependencies () {
        return [
            UserFixture::class,
            CustomerFixture::class
        ];
    }
}
