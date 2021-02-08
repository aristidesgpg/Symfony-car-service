<?php

namespace App\Tests;

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

        $authCrawler = $this->client->request('POST', '/api/authentication/authenticate', [
            'username' => 'tperson@iserviceauto.com',
            'password' => 'test'
        ]);

        $authData = json_decode($this->client->getResponse()->getContent());
        $this->token = $authData->token;

        $this->entityManager = self::$container->get('doctrine')->getManager();
    }

    public function testGetAll() {
        // Get all
        $this->requestAction('GET', '');
        $this->assertResponseIsSuccessful();
        $response = json_decode($this->client->getResponse()->getContent());
        $this->assertGreaterThanOrEqual(0, $response->totalResults);
    }

    public function testGetOne() {
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
        }
    }

    public function testGetByLinkHash() {
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
        }
    }

    public function testAdd() {
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
            $this->assertResponseIsSuccessful();
            $response = json_decode($this->client->getResponse()->getContent());
            $this->assertObjectHasAttribute('id', $response);
        }
    }

    public function testUpdate() {
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
        }
    }

    public function testDelete() {
        $repairOrder = $this->entityManager->getRepository(RepairOrder::class)
                            ->createQueryBuilder('r')
                            ->where('r.deleted = 0')
                            ->setMaxResults(1)
                            ->getQuery()
                            ->getOneOrNullResult();

        if ($repairOrder) {
            $this->requestAction('DELETE', '/'.$repairOrder->getId());
            $this->assertResponseIsSuccessful();
        }
    }

    public function testArchive() {
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
        }
    }

    public function testClose() {
        $repairOrder = $this->entityManager->getRepository(RepairOrder::class)
                            ->createQueryBuilder('r')
                            ->where('r.deleted = 0')
                            ->setMaxResults(1)
                            ->getQuery()
                            ->getOneOrNullResult();

        if ($repairOrder && !$repairOrder->isClosed()) {
            $this->requestAction('PUT', '/'.$repairOrder->getId().'/close');
            $this->assertResponseIsSuccessful();
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