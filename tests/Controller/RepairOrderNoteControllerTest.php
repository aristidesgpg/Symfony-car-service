<?php

namespace App\Tests;

use App\Entity\User;
use App\Service\Authentication;
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

        $user = self::$container->get('doctrine')
                                ->getManager()
                                ->getRepository(User::class)
                                ->createQueryBuilder('u')
                                ->setMaxResults(1)
                                ->getQuery()
                                ->getOneOrNullResult();

        $authentication = self::$container->get(Authentication::class);
        $ttl            = 31536000;
        $this->token    = $authentication->getJWT($user->getEmail(), $ttl);

        $this->entityManager = self::$container->get('doctrine')
                                               ->getManager();
        $this->faker = Factory::create();
    }

    public function testAddNote() {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');
            return;
        }
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
        } else {
            $this->assertEmpty($ro, 'RepairOrder is null');
        }
    }

    public function testDeleteNote() {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');
            return;
        }
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
        } else {
            $this->assertEmpty($roNote, 'RepairOrderNote is null');
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
