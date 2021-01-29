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

    // private function requestNew($id) {
    //     $apiUrl = "/api/repair-order/${id}/team";

    //     $response = $this->client->request('POST', $apiUrl, [], [], [
    //         'HTTP_Authorization' => 'Bearer '.$this->token,
    //         'HTTP_CONTENT_TYPE'  => 'application/json',
    //         'HTTP_ACCEPT'        => 'application/json',
    //     ]);
        
    // }

    public function testSomething() {
        $this->assertEquals(Response::HTTP_NOT_FOUND, Response::HTTP_NOT_FOUND);
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