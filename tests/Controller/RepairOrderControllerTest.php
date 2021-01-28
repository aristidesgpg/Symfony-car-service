<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class RepairOrderControllerTest extends WebTestCase {
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

    public function testNew() {
        $id = 1;
        $this->requestNew($id);
        $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());
        // $this->assertResponseIsSuccessful();
        // $messagesData = json_decode($this->client->getResponse()->getContent());
        // $this->assertEquals($id, $messagesData->repairOrder->id);

        $id = 2147483647;
        $this->requestNew($id);
        // $this->assertResponseIsSuccessful();
        $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());
    }

    private function requestNew($id) {
        $apiUrl = "/api/repair-order/${id}/team";

        $response = $this->client->request('POST', $apiUrl, [], [], [
            'HTTP_Authorization' => 'Bearer '.$this->token,
            'HTTP_CONTENT_TYPE'  => 'application/json',
            'HTTP_ACCEPT'        => 'application/json',
        ]);
        
    }

    public function testDelete() {
        $id = 1;
        $this->requestDelete($id);
        $this->assertResponseIsSuccessful();

        $id = 2147483647;
        $this->requestDelete($id);
        $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());
    }
    
    private function requestDelete($id) {
        $apiUrl = "/api/repair-order-team/${id}";

        $response = $this->client->request('Delete', $apiUrl, [], [], [
            'HTTP_Authorization' => 'Bearer '.$this->token,
            'HTTP_CONTENT_TYPE'  => 'application/json',
            'HTTP_ACCEPT'        => 'application/json',
        ]);
        
        return $response;
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