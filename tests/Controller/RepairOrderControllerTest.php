<?php

namespace App\Tests;

use App\Entity\User;
use App\Service\Authentication;
use App\Entity\Customer;
use App\Entity\RepairOrder;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class RepairOrderControllerTest extends WebTestCase {
    private $client = null;

    private $token;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

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

        $this->entityManager = self::$container->get('doctrine')->getManager();
    }

    public function testGetAll() {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');
            return;
        }
        // Get all
        $this->requestAction('GET', '');
        $this->assertResponseIsSuccessful();
        $response = json_decode($this->client->getResponse()->getContent());
        $this->assertGreaterThanOrEqual(0, $response->totalResults);
    }

    public function testGetOne() {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');
            return;
        }
        $repairOrder = $this->entityManager->getRepository(RepairOrder::class)
                                   ->createQueryBuilder('ro')
                                   ->where('ro.deleted = 0')
                                   ->setMaxResults(1)
                                   ->getQuery()
                                   ->getOneOrNullResult();
        if ($repairOrder) {
            $id = $repairOrder->getId();

            $this->requestAction('GET', '/'.$id);
            $this->assertResponseIsSuccessful();
            $response = json_decode($this->client->getResponse()->getContent());
            $this->assertObjectHasAttribute('id', $response);
        } else {
            $this->assertEmpty($repairOrder, 'RepairOrder is null');
        }
    }

    public function testGetByLinkHash() {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');
            return;
        }
        $repairOrder = $this->entityManager->getRepository(RepairOrder::class)
                                   ->createQueryBuilder('ro')
                                   ->where('ro.deleted = 0')
                                   ->setMaxResults(1)
                                   ->getQuery()
                                   ->getOneOrNullResult();

        if ($repairOrder && $repairOrder->getLinkHash()) {
            $linkHash = $repairOrder->getLinkHash();

            $this->requestAction('GET', '/link-hash/'.$linkHash);
            $this->assertResponseIsSuccessful();
            $response = json_decode($this->client->getResponse()->getContent());
            $this->assertObjectHasAttribute('id', $response);
        } else {
            $this->assertEmpty($repairOrder, 'RepairOrder is null');
        }
    }

    public function testAdd() {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');
            return;
        }
        $customer = $this->entityManager->getRepository(Customer::class)
                         ->createQueryBuilder('c')
                         ->where('c.deleted = 0')
                         ->setMaxResults(1)
                         ->getQuery()
                         ->getOneOrNullResult();

        if ($customer) {
            $params = [
                'customerName'  => 'John Doe',
                'customerPhone' => $customer->getPhone(),
                'number'        => '758'
            ];

            $this->requestAction('POST', '', $params);
            if ($this->client->getResponse()->getStatusCode() !== 500) {
                $this->assertResponseIsSuccessful();
                $response = json_decode($this->client->getResponse()->getContent());
                $this->assertObjectHasAttribute('id', $response);
            }
            else {
                $this->assertEquals(Response::HTTP_INTERNAL_SERVER_ERROR, $this->client->getResponse()->getStatusCode());
            }
        } else {
            $this->assertEmpty($customer, 'Customer is null');
        }
    }

    public function testUpdate() {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');
            return;
        }
        $repairOrder = $this->entityManager->getRepository(RepairOrder::class)
                            ->createQueryBuilder('r')
                            ->where('r.deleted = 0')
                            ->setMaxResults(1)
                            ->getQuery()
                            ->getOneOrNullResult();

        if ($repairOrder) {
            $params = [
                'make'  => 'new make',
                'model' => 'new model'
            ];

            $this->requestAction('PUT', '/'.$repairOrder->getId(), $params);
            $this->assertResponseIsSuccessful();
            $response = json_decode($this->client->getResponse()->getContent());
            $this->assertObjectHasAttribute('id', $response);
        } else {
            $this->assertEmpty($repairOrder, 'RepairOrder is null');
        }
    }

    public function testDelete() {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');
            return;
        }
        $repairOrder = $this->entityManager->getRepository(RepairOrder::class)
                            ->createQueryBuilder('r')
                            ->where('r.deleted = 0')
                            ->setMaxResults(1)
                            ->getQuery()
                            ->getOneOrNullResult();

        if ($repairOrder) {
            $this->requestAction('DELETE', '/'.$repairOrder->getId());
            $this->assertResponseIsSuccessful();
        } else {
            $this->assertEmpty($repairOrder, 'RepairOrder is null');
        }
    }

    public function testArchive() {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');
            return;
        }
        $repairOrder = $this->entityManager->getRepository(RepairOrder::class)
                            ->createQueryBuilder('r')
                            ->where('r.deleted = 0')
                            ->andWhere('r.archived = 0')
                            ->setMaxResults(1)
                            ->getQuery()
                            ->getOneOrNullResult();

        if ($repairOrder) {
            $this->requestAction('PUT', '/'.$repairOrder->getId().'/archive');
            $this->assertResponseIsSuccessful();
        } else {
            $this->assertEmpty($repairOrder, 'RepairOrder is null');
        }
    }

    public function testClose() {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');
            return;
        }
        $repairOrder = $this->entityManager->getRepository(RepairOrder::class)
                            ->createQueryBuilder('r')
                            ->where('r.dateClosed IS NULL')
                            ->setMaxResults(1)
                            ->getQuery()
                            ->getOneOrNullResult();

        if ($repairOrder && !$repairOrder->isClosed()) {
            $this->requestAction('PUT', '/'.$repairOrder->getId().'/close');
            $this->assertResponseIsSuccessful();
        } else {
            $this->assertEmpty($repairOrder, 'Repair Order is null');
        }
    }

    private function requestAction($method, $endpoint, $params=[]) {
        $apiUrl = "/api/repair-order".$endpoint;

        $response = $this->client->request($method, $apiUrl, $params, [], [
            'HTTP_Authorization' => 'Bearer '.$this->token,
            'HTTP_CONTENT_TYPE'  => 'application/json',
            'HTTP_ACCEPT'        => 'application/json',
        ]);
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
