<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class UserFixtures
 *
 * @package App\DataFixtures
 */
class UserFixtures extends Fixture {

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * UserFixtures constructor.
     *
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct (UserPasswordEncoderInterface $passwordEncoder) {
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load (ObjectManager $manager) {
        $faker = Factory::create();

        // Load some employees
        $user     = new User();
        $password = $this->passwordEncoder->encodePassword($user, 'test');
        $user->setFirstName('Laramie')
             ->setLastName('Rugen')
             ->setEmail('lrugen@iserviceauto.com')
             ->setPhone(8475551234)
             ->setPassword($password)
             ->setRoles(['ROLE_ADMIN']);
        $manager->persist($user);
        $manager->flush();

        $user     = new User();
        $password = $this->passwordEncoder->encodePassword($user, 'test');
        $user->setFirstName('Joe')
             ->setLastName('Mule')
             ->setEmail('jmule@iserviceauto.com')
             ->setPhone(8475551235)
             ->setPassword($password)
             ->setRoles(['ROLE_ADMIN']);
        $manager->persist($user);
        $manager->flush();

        $user     = new User();
        $password = $this->passwordEncoder->encodePassword($user, 'test');
        $user->setFirstName('Test')
             ->setLastName('Person')
             ->setEmail('tperson@iserviceauto.com')
             ->setPhone(8475551236)
             ->setPassword($password)
             ->setRoles(['ROLE_ADMIN']);
        $manager->persist($user);
        $manager->flush();

        for ($i = 1; $i <= 50; $i++) {
            $user     = new User();
            $phone    = $faker->phoneNumber;
            $phone    = str_replace(['.', '-', '\\', '(', ')', 'x', ' ', '+'], '', $phone);
            $phone    = substr($phone, 0, 10);
            $password = $this->passwordEncoder->encodePassword($user, 'test');

            $user->setFirstName($faker->firstName)
                 ->setLastName($faker->lastName)
                 ->setEmail($faker->email)
                 ->setPhone($phone)
                 ->setPassword($password)
                 ->setLastLogin($faker->dateTime);

            $manager->persist($user);
            $manager->flush();

            $this->addReference('user_' . $i, $user);
        }
    }
}
