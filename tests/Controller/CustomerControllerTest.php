<?php

namespace App\Tests;

use App\Entity\User;
use App\Entity\Customer;
use App\Service\Authentication;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class CustomerControllerTest extends WebTestCase
{
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
        // Get all, Ok
        $this->requestAction('GET');

        $this->assertResponseIsSuccessful();
        $response = json_decode($this->client->getResponse()->getContent());
        $this->assertGreaterThanOrEqual(0, $response->totalResults);

        // Page not found, 404
        $page = 0;
        $this->requestAction('GET', '', ['page' => $page]);
        $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());

        // Page limit validation, 406
        $pageLimit = 0;
        $this->requestAction('GET', '', ['pageLimit' => $pageLimit]);
        $this->assertEquals(Response::HTTP_NOT_ACCEPTABLE, $this->client->getResponse()->getStatusCode());

        // sortField, sortDirection, searchField, searchTerm
        $params = [
            'page' => 1,
            'pageLimit' => 25,
            'sortField' => ['phone', 'emai'],
            'sortDirection' => 'ASC',
            'searchField' => ['name', 'emai'],
            'searchTerm' => 'Prof'
        ];
        $this->requestAction('GET', '', $params);
        $this->assertEquals(Response::HTTP_NOT_ACCEPTABLE, $this->client->getResponse()->getStatusCode());
    }

    public function testGetCustomer() {
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
            // Ok
            $id = $customer->getId();
            $this->requestAction('GET', '/'.$id);
            $this->assertResponseIsSuccessful();
            $response = json_decode($this->client->getResponse()->getContent());
            $this->assertGreaterThanOrEqual($id, $response->id);
        } else {
            $this->assertEmpty($customer, 'Customer is null');
            return;
        }
    }

    public function testAddCustomer() {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');
            return;
        }
        // Ok
        $name   = 'John Doe';
        $params = [
            'name'         => $name,
            'phone'        => '8623456789',
            'email'        => 'test@test.com',
            'doNotContact' => true
        ];
        $this->requestAction('POST', '', $params);
        $this->assertResponseIsSuccessful();
        $response = json_decode($this->client->getResponse()->getContent());
        $this->assertEquals($name, $response->name);

        // Validate parameters
        $params = [
            'name'          => $name,
            'email'         => '',
            'doNotContact'  => false
        ];

        $this->requestAction('POST', '', $params);
        $this->assertEquals(Response::HTTP_NOT_ACCEPTABLE, $this->client->getResponse()->getStatusCode());
    }

    public function testUpdateCustomer() {
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
            // Ok
            $id     = $customer->getId();
            $name   = 'Jane Doe';
            $params = [
                'name'          => $name,
                'phone'         => '8623456788',
                'email'         => 'updated@test.com',
                'doNotContact'  => false
            ];
            $this->requestAction('PUT', '/'.$id, $params);
            $this->assertResponseIsSuccessful();
            $response = json_decode($this->client->getResponse()->getContent());
            $this->assertEquals($name, $response->name);
        } else {
            $this->assertEmpty($customer, 'Customer is null');
            return;
        }
    }

    public function testDeleteCustomer() {
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
            // Ok
            $id     = $customer->getId();
            $this->requestAction('DELETE', '/'.$id);
            $this->assertResponseIsSuccessful();
            $response = json_decode($this->client->getResponse()->getContent());
            $this->assertEquals($id, $response->id);
        } else {
            $this->assertEmpty($customer, 'Customer is null');
            return;
        }
    }

    private function requestAction($method, $endpoint='', $params=[]) {
        $apiUrl = '/api/customer' . $endpoint;
        $crawler = $this->client->request($method, $apiUrl, $params, [], [
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
