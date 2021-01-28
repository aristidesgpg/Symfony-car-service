<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class InternalMessageControllerTest extends WebTestCase {
    private $client = null;

    private $token;
    
    private $authenticatedUserId;

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
        $this->token               = $authData->token;
        $this->authenticatedUserId = $authData->user->id;
    }

    public function testGetThreads() {
        // Page Not Found
        $page = 0;
        $this->requestAction('GET', '/threads?page=' . $page );
        $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());

        // Ok
        $page = 1;
        $this->requestAction('GET', '/threads?page=' . $page );
        $threadsData = json_decode($this->client->getResponse()->getContent());
        $this->assertResponseIsSuccessful();
        $this->assertGreaterThanOrEqual(0, $threadsData->totalResults);
    }

    public function testGetMessagesNewest() {
        // Page Not Found
        $otherUserId = 5;
        $page        = 0;

        $this->requestAction('GET', '/messages?otherUserId=' . $otherUserId . '&page=' . $page);
        $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());

        // Ok
        $otherUserId = 5;
        $page        = 1;

        $this->requestAction('GET', '/messages?otherUserId=' . $otherUserId . '&page=' . $page);
        $messagesData = json_decode($this->client->getResponse()->getContent());
        $this->assertResponseIsSuccessful();
        $this->assertGreaterThanOrEqual(0, $messagesData->totalResults);
        
        // User Not Found
        $otherUserId = 2147483647;
        $page        = 1;

        $this->requestAction('GET', '/messages?otherUserId=' . $otherUserId . '&page=' . $page);
        $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());

        // User Parameter Required
        $this->requestAction('GET', '/messages');
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
    }

    public function testSendMessage() {
        // Ok
        $toId    = 5;
        $message = "Hello World";

        $this->requestAction('POST', '?toId=' . $toId . '&message=' . $message);
        $messagesData = json_decode($this->client->getResponse()->getContent());
        $this->assertResponseIsSuccessful();
        $this->assertEquals($message, $messagesData->message);

        // User Not Found
        $toId    = 2147483647;
        $message = "Hello World";

        $this->requestAction('POST', '?toId=' . $toId . '&message=' . $message);
        $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());

        // Message from You to You
        $toId    = $this->authenticatedUserId;
        $message = "Hello World";

        $this->requestAction('POST', '?toId=' . $toId . '&message=' . $message);
        $this->assertEquals(Response::HTTP_NOT_ACCEPTABLE, $this->client->getResponse()->getStatusCode());

        // Parameter(s) Required
        $this->requestAction('POST', '');
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
    }

    private function requestAction($method, $apiUrl, $params=[]) {
        $crawler = $this->client->request($method, '/api/internal-message'.$apiUrl, $params, [], [
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
