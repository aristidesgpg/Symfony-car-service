<?php

namespace App\Tests;

use App\Entity\RepairOrder;
use App\Entity\RepairOrderTeam;
use App\Entity\User;
use Faker\Factory;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RepairOrderTeamTest extends WebTestCase
{
    private $client = null;

    private $token;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    private $faker;

    /**
     * {@inheritDoc}
     */
    public function setUp() {
        $this->client = static::createClient();

        $authCrawler = $this->client->request('POST', '/api/authentication/authenticate', [
            'username' => 'tperson@iserviceauto.com',
            'password' => 'test'
        ]);

        $authData = json_decode($this->client->getResponse()->getContent());
        $this->token = $authData->token;

        $this->entityManager = self::$container->get('doctrine')
                                               ->getManager();
        $this->faker = Factory::create();
    }

    public function testNew()
    {
        $role = $this->faker->randomElements(['ROLE_TECHNICIAN', 'ROLE_PARTS_ADVISOR', 'ROLE_SERVICE_ADVISOR']);
        $user = $this->entityManager
                     ->getRepository(User::class)
                     ->createQueryBuilder('u')
                     ->where('u.active = 1')
                     ->andWhere('u.role = :role')
                     ->setParameter('role', $role)
                     ->setMaxResults(1)
                     ->getQuery()
                     ->getOneOrNullResult();
        $ro   = $this->entityManager
                     ->getRepository(RepairOrder::class)
                     ->createQueryBuilder('ro')
                     ->where('ro.deleted = 0')
                     ->setMaxResults(1)
                     ->getQuery()
                     ->getOneOrNullResult();

        if ($user && $ro) {
            $params = [
                'repairOrderID' => $ro->getId(),
                'userID'        => $user->getId()
            ];
            $this->requestActions('POST', '', $params);
            $this->assertResponseIsSuccessful();
            $response = json_decode($this->client->getResponse()->getContent());
            $this->assertObjectHasAttribute('id', $response);
        }
    }

    public function testDelete() {
        $roTeam = $this->entityManager
                       ->getRepository(RepairOrderTeam::class)
                       ->createQueryBuilder('rot')
                       ->setMaxResults(1)
                       ->getQuery()
                       ->getOneOrNullResult();

        if ($roTeam) {
            $this->requestActions('DELETE', '/'.$roTeam->getId());
            $this->assertResponseIsSuccessful();
        }
    }

    private function requestActions($method, $endpoint, $params=[]) {
        $apiUrl = '/api/repair-order-team' . $endpoint;

        $crawler = $this->client->request($method, $apiUrl, $params, [], [
            'HTTP_Authorization' => 'Bearer '.$this->token,
            'HTTP_CONTENT_TYPE'  => 'application/json',
            'HTTP_ACCEPT'        => 'application/json',
        ]);

        return $crawler;
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown() {
        parent::tearDown();
        $this->client = null;
        $this->token  = null;
    }
}
