<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

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
        for ($i = 1; $i <= 10; $i++) {
            $user = new User();
            $user->setFirstName('Laramie' . $i)
                 ->setLastName('Rugen' . $i)
                 ->setEmail('lrugen+' . $i . '@iserviceauto.com')
                 ->setPhone('847902599' . $i)
                 ->setPassword('asdf' . $i);

            $manager->persist($user);
        }

        $manager->flush();
    }
}
