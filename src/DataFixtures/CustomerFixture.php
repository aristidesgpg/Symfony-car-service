<?php

namespace App\DataFixtures;

use App\Entity\Customer;
use App\Service\PhoneValidator;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Exception;
use Faker\Factory;

/**
 * Class UserFixtures.
 */
class CustomerFixture extends Fixture
{
    /**
     * @var PhoneValidator
     */
    private $phoneValidator;

    /**
     * CustomerFixture constructor.
     */
    public function __construct(PhoneValidator $phoneValidator)
    {
        $this->phoneValidator = $phoneValidator;
    }

    /**
     * @throws Exception
     */
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        // Load some customers
        for ($i = 1; $i <= 50; ++$i) {
            $customer = new Customer();
            $areaCode = $faker->numberBetween(100, 999);
            $restOfNumber = $faker->numberBetween(1000, 9999);
            $phone = $areaCode. 555 .$restOfNumber;

            $customer->setName($faker->name)
                     ->setPhone($phone)
                     ->setEmail($faker->optional(.05)->email)
                     ->setMobileConfirmed($faker->boolean(80))
                     ->setDoNotContact($faker->boolean(2));

            $manager->persist($customer);
            $manager->flush();

            $this->addReference('customer_'.$i, $customer);
        }
    }
}
