<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class CustomerControllerTest extends WebTestCase
{
    private $client = null;

    private $token;

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
    }

    public function testGetAll() {
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
        // Not found
        $id = 2147483647;
        $this->requestAction('GET', '/'.$id);
        $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());

        // Ok
        $id = 1;
        $this->requestAction('GET', '/'.$id);
        $this->assertResponseIsSuccessful();
        $response = json_decode($this->client->getResponse()->getContent());
        $this->assertGreaterThanOrEqual($id, $response->id);
    }

    public function testAddCustomer() {
        // Ok
        $name   = 'John Doe';
        $params = [
            'name' => $name,
            'phone' => '8623456789',
            'email' => 'test@test.com',
            'doNotContact' => true,
            'skipMobileVerification' => true
        ];
        $this->requestAction('POST', '', $params);
        $this->assertResponseIsSuccessful();
        $response = json_decode($this->client->getResponse()->getContent());
        $this->assertEquals($name, $response->name);

        // Validate parameters
        $params = [
            'name' => $name,
            'email' => '',
            'doNotContact' => false,
            'skipMobileVerification' => true
        ];

        $this->requestAction('POST', '', $params);
        $this->assertEquals(Response::HTTP_NOT_ACCEPTABLE, $this->client->getResponse()->getStatusCode());
    }

    public function testUpdateCustomer() {
        // Ok
        $name = 'Jane Doe';
        $params = [
            'name' => $name,
            'phone' => '8623456788',
            'email' => 'updated@test.com',
            'doNotContact' => false,
            'skipMobileVerification' => false
        ];
        $this->requestAction('PUT', '/1', $params);
        $this->assertResponseIsSuccessful();
        $response = json_decode($this->client->getResponse()->getContent());
        $this->assertEquals($name, $response->name);

        // Validate parameters
        $params = [
            'name' => $name,
            'phone' => '',
            'email' => 'updated@test.com',
            'doNotContact' => false,
            'skipMobileVerification' => false
        ];
        $this->requestAction('PUT', '/1', $params);
        $this->assertEquals(Response::HTTP_NOT_ACCEPTABLE, $this->client->getResponse()->getStatusCode());
    }

    public function testDeleteCustomer() {
        // Ok
        $id = 1;
        $this->requestAction('DELETE', '/'.$id);
        $this->assertResponseIsSuccessful();
        $response = json_decode($this->client->getResponse()->getContent());
        $this->assertEquals($id, $response->id);

        // Not found
        $id = 2147483647;
        $this->requestAction('DELETE', '/'.$id);
        $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());
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
