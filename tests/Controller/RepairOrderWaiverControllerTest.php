<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class RepairOrderWaiverControllerTest extends WebTestCase {
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
        $endpoint      = '/signed';
        $repairOrderId = 1;
        $params        = [
            'signature'     => 'image/svg+xml;base64,Qk3eAgAAAAAAADYAAAAoAAAADQAAABEAAAABABgAAAAAAKgCAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA=',
            'repairOrderId' => $repairOrderId,
        ];

        $this->requestWaiverActions('POST', $endpoint, $params);
        $roInteractionRes = json_decode($this->client->getResponse()->getContent());
        $this->assertResponseIsSuccessful();
        $this->assertEquals($repairOrderId, $roInteractionRes->id);

        // Invalid signature
        $params = ['signature' => 'Invalid base 64 svg'];

        $this->requestWaiverActions('POST', $endpoint, $params);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
    }

    public function testWaiverViewed() {
        // Ok
        $endpoint      = '/viewed';
        $repairOrderId = 2;

        $this->requestWaiverActions('POST', $endpoint, ['repairOrderId' => $repairOrderId]);
        $roInteractionRes = json_decode($this->client->getResponse()->getContent());
        $this->assertResponseIsSuccessful();
    }

    public function testWaiverAcknowledged() {
        // Ok
        $endpoint      = '/acknowledged';
        $repairOrderId = 3;

        $this->requestWaiverActions('POST', $endpoint, ['repairOrderId' => $repairOrderId]);
        $roInteractionRes = json_decode($this->client->getResponse()->getContent());
        $this->assertResponseIsSuccessful();

        // Not found
        $endpoint = '/acknowledged';
        $repairOrderId = 2147483647;

        $this->requestWaiverActions('POST', $endpoint, ['repairOrderId' => $repairOrderId]);
        $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());
    }

    public function testWaiverResend() {
        // Ok
        $endpoint      = '/re-send';
        $repairOrderId = 5;

        $this->requestWaiverActions('POST', $endpoint, ['repairOrderId' => $repairOrderId]);
        $this->assertEquals(Response::HTTP_NOT_ACCEPTABLE, $this->client->getResponse()->getStatusCode());

        // Waiver is already signed
        $endpoint = '/re-send'; // TODO: fixture update
        $this->requestWaiverActions('POST', $endpoint, ['repairOrderId' => $repairOrderId]);
        $this->assertEquals(Response::HTTP_NOT_ACCEPTABLE, $this->client->getResponse()->getStatusCode());

        // Not found
        $endpoint      = '/re-send';
        $repairOrderId = 2147483647;
        $this->requestWaiverActions('POST', $endpoint, ['repairOrderId' => $repairOrderId]);
        $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());
    }

    private function requestWaiverActions($method, $endpoint, $params=[]) {
        $apiUrl = '/api/repair-order-waiver' . $endpoint;

        $waiverCrawler = $this->client->request($method, $apiUrl, $params, [], [
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