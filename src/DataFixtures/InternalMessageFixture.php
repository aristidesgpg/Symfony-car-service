<?php

namespace App\DataFixtures;

use App\Entity\InternalMessage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class InternalMessageFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 1; $i <= 50; $i++) {
            $internalMessage = new InternalMessage();

            $from = 'user_5';
            $to   = 'user_3';

            if ($i % 3 === 0)
            {
                $from = 'user_3';
                $to   = 'user_5';
            }
       
            $internalMessage->setFrom($this->getReference($from)) // for get messages test
                        ->setTo($this->getReference($to)) // test logged in user
                        ->setMessage($faker->sentence())
                        ->setDate($faker->dateTimeBetween('-1 year'))
                        ->setIsRead($i % 2 === 0);
        
            $manager->persist($internalMessage);
            $manager->flush();

            $internalMessage = new InternalMessage();

            $from = 'user_8';
            $to   = 'user_3';

            if ($i % 2 === 0)
            {
                $from = 'user_3';
                $to   = 'user_8';
            }

            $internalMessage->setFrom($this->getReference($from)) // for get messages test
            ->setTo($this->getReference($to)) // test logged in user
            ->setMessage($faker->sentence())
                ->setDate($faker->dateTimeBetween('-1 year'))
                ->setIsRead($i % 3 === 0);

            $manager->persist($internalMessage);
            $manager->flush();
        }

        for ($i = 1; $i <= 50; $i++) {
            $internalMessage = new InternalMessage();

            $userReferenceFrom = $i;
            $userReferenceTo = 3;

            if ($userReferenceFrom === $userReferenceTo) {
                $userReferenceTo = $userReferenceFrom < 50 ? $userReferenceFrom + 1 : 1;
            }

            $internalMessage->setFrom($this->getReference('user_' . $userReferenceFrom))
                        ->setTo($this->getReference('user_' . $userReferenceTo))
                        ->setMessage($faker->sentence())
                        ->setDate($faker->dateTimeBetween('-1 year'))
                        ->setIsRead($i % 4 === 0);

            $manager->persist($internalMessage);
            $manager->flush();
        }
    }

    /**
     * @return string[]
     */
    public function getDependencies()
    {
        return [ UserFixture::class ];
    }
}
