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
       
            $internalMessage->setFrom($this->getReference('user_5')) // for get messages test
                        ->setTo($this->getReference('user_3')) // test logged in user
                        ->setMessage($faker->sentence())
                        ->setDate($faker->dateTimeBetween('-1 year'))
                        ->setIsRead($faker->boolean(50));
        
            $manager->persist($internalMessage);
            $manager->flush();
        }

        for ($j = 1; $j <= 3; $j++) {
            for ($i = 1; $i <= 50; $i++) {
                $internalMessage = new InternalMessage();
                $userReferenceFrom   = $faker->numberBetween(1, 50);
                $userReferenceTo   = $faker->numberBetween(1, 50);

                if ($userReferenceFrom === $userReferenceTo) {
                    $userReferenceTo = $userReferenceFrom < 50 ? $userReferenceFrom + 1 : 1;
                }
            
                $internalMessage->setFrom($this->getReference('user_' . $userReferenceFrom))
                            ->setTo($this->getReference('user_' . $userReferenceTo))
                            ->setMessage($faker->sentence())
                            ->setDate($faker->dateTimeBetween('-1 year'))
                            ->setIsRead($faker->boolean(50));
            
                $manager->persist($internalMessage);
                $manager->flush();
            }
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
