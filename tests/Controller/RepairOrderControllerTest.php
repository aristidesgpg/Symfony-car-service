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

    public function testWaiverSigned() {
        // Ok
        $endpoint = '/{id}/waiver/signed';
        $params   = ['repairOrderId' => 1];

        $this->requestWaiverActions($endpoint, $params);
        $roInteractionRes = json_decode($this->client->getResponse()->getContent());
        $this->assertResponseIsSuccessful();
        $this->assertEquals('roInteractionRes', $roInteractionRes);

        // 
        $this->requestWaiverActions($endpoint, $params);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
    }

    public function testWaiverViewed() {
        // Ok
        $endpoint = '/{id}/waiver/viewed';
        $params   = ['repairOrderId' => 1];

        $this->requestWaiverActions($endpoint, $params);
        $roInteractionRes = json_decode($this->client->getResponse()->getContent());
        $this->assertResponseIsSuccessful();
        $this->assertEquals('roInteractionRes', $roInteractionRes);

        // 
        $this->requestWaiverActions($endpoint, $params);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
    }

    public function testWaiverAcknowledged() {
        // Ok
        $endpoint = '/{id}/waiver/acknowledged';
        $params   = ['repairOrderId' => 1];

        $this->requestWaiverActions($endpoint, $params);
        $roInteractionRes = json_decode($this->client->getResponse()->getContent());
        $this->assertResponseIsSuccessful();
        $this->assertEquals('roInteractionRes', $roInteractionRes);

        // 
        $this->requestWaiverActions($endpoint, $params);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
    }

    public function testWaiverResend() {
        // Ok
        $endpoint = '/{id}/waiver/resend';
        $params   = ['repairOrderId' => 1];

        $this->requestWaiverActions($endpoint, $params);
        $roInteractionRes = json_decode($this->client->getResponse()->getContent());
        $this->assertResponseIsSuccessful();
        $this->assertEquals('roInteractionRes', $roInteractionRes);

        // 
        $this->requestWaiverActions($endpoint, $params);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
    }

    private function requestWaiverActions($endpoint, $params=null) {
        $apiUrl = '/api/repair-order' . $endpoint;

        $waiverCrawler = $this->client->request('POST', $apiUrl, [], [], [
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