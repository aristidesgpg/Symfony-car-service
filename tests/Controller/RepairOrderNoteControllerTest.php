<?php

namespace App\Tests;

use App\Entity\RepairOrder;
use App\Entity\RepairOrderNote;
use Faker\Factory;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RepairOrderNoteControllerTest extends WebTestCase
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

    public function testAddNote()
    {
        // OK
        $ro   = $this->entityManager
                     ->getRepository(RepairOrder::class)
                     ->createQueryBuilder('ro')
                     ->where('ro.deleted = 0')
                     ->setMaxResults(1)
                     ->getQuery()
                     ->getOneOrNullResult();

        if ($ro) {
            $params = [
                'repairOrderID' => $ro->getId(),
                'note'          => $this->faker->sentence()
            ];
            $this->requestActions('POST', '', $params);
            $this->assertResponseIsSuccessful();
            $response = json_decode($this->client->getResponse()->getContent());
            $this->assertObjectHasAttribute('id', $response);
        }
    }

    public function testDeleteNote() {
        // OK
        $roNote = $this->entityManager
                       ->getRepository(RepairOrderNote::class)
                       ->createQueryBuilder('ron')
                       ->setMaxResults(1)
                       ->getQuery()
                       ->getOneOrNullResult();

        if ($roNote) {
            $this->requestActions('DELETE', '/'.$roNote->getId());
            $this->assertResponseIsSuccessful();
        }
    }

    private function requestActions($method, $endpoint, $params=[]) {
        $apiUrl = '/api/repair-order-note' . $endpoint;

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
