<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

/**
 * Class UserFixtures
 *
 * @package App\DataFixtures
 */
class UserFixtures extends Fixture {

    /**
     * @param ObjectManager $manager
     */
    public function load (ObjectManager $manager) {
        $faker = Factory::create();

        for ($i = 1; $i <= 50; $i++) {
            $user  = new User();
            $phone = $faker->phoneNumber;
            $phone = str_replace(['.', '-', '\\', '(', ')', 'x', ' ', '+'], '', $phone);
            $phone = substr($phone, 0, 10);

            $user->setFirstName($faker->firstName)
                 ->setLastName($faker->lastName)
                 ->setEmail($faker->email)
                 ->setPhone($phone)
                 ->setPassword($faker->password)
                 ->setLastLogin($faker->dateTime);

            $manager->persist($user);
        }

        $manager->flush();
    }
}
