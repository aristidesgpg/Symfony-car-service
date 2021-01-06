<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Service\UserHelper;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class UserFixtures.
 *
 * @package App\DataFixtures
 */
class UserFixture extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * @var UserHelper
     */
    private $userHelper;

    /** @var array */
    private $userRoles;

    /**
     * UserFixtures constructor.
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param UserHelper $userHelper
     */
    public function __construct(UserPasswordEncoderInterface $passwordEncoder, UserHelper $userHelper)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->userHelper = $userHelper;
        $this->userRoles = $userHelper::USER_ROLES;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        // Load some employees
        $user = new User();
        $password = $this->passwordEncoder->encodePassword($user, 'test');
        $user->setFirstName('Laramie')
             ->setLastName('Rugen')
             ->setEmail('lrugen@iserviceauto.com')
             ->setPhone(8475551234)
             ->setPassword($password)
             ->setRole('ROLE_ADMIN');
        $manager->persist($user);
        $manager->flush();

        $user = new User();
        $password = $this->passwordEncoder->encodePassword($user, 'test');
        $user->setFirstName('Joe')
             ->setLastName('Mule')
             ->setEmail('jmule@iserviceauto.com')
             ->setPhone(8475551235)
             ->setPassword($password)
             ->setRole('ROLE_ADMIN');
        $manager->persist($user);
        $manager->flush();

        $user = new User();
        $password = $this->passwordEncoder->encodePassword($user, 'test');
        $user->setFirstName('Test')
             ->setLastName('Person')
             ->setEmail('tperson@iserviceauto.com')
             ->setPhone(8475551236)
             ->setPassword($password)
             ->setRole('ROLE_ADMIN');
        $manager->persist($user);
        $manager->flush();

        $user = new User();
        $password = $this->passwordEncoder->encodePassword($user, 'test');
        $user->setFirstName('Test')
             ->setLastName('Technician')
             ->setEmail('ttechnician@iserviceauto.com')
             ->setPhone(8475556665)
             ->setPassword($password)
             ->setRole('ROLE_TECHNICIAN')
             ->setPin(1234);
        $manager->persist($user);
        $manager->flush();

        for ($i = 1; $i <= 50; ++$i) {
            $user = new User();
            $phone = $faker->phoneNumber;
            $phone = str_replace(['.', '-', '\\', '(', ')', 'x', ' ', '+'], '', $phone);
            $phone = substr($phone, 0, 10);
            $password = $this->passwordEncoder->encodePassword($user, 'test');
            $role = $faker->randomElement($this->userRoles);

            if ('ROLE_TECHNICIAN' == $role) {
                $user->setPin(1234)
                     ->setExperience('10')
                     ->setCertification('Master');
            }

            $user->setFirstName($faker->firstName)
                 ->setLastName($faker->lastName)
                 ->setEmail($faker->email)
                 ->setPhone($phone)
                 ->setPassword($password)
                 ->setLastLogin($faker->dateTime)
                 ->setRole($role)
                 ->setActive($faker->boolean(95));

            $manager->persist($user);
            $manager->flush();

            $this->addReference('user_'.$i, $user);
        }
    }
}
