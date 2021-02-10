<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class InternalMessageControllerTest extends WebTestCase {
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

    public function testGetThreads() {
        // Page Not Found
        $page = 0;
        $this->requestGetThreads($page);
        $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());

        // Ok
        $page = 1;
        $this->requestGetThreads($page);
        $threadsData = json_decode($this->client->getResponse()->getContent());
        $this->assertResponseIsSuccessful();
        $this->assertEquals(49, $threadsData->totalResults);
    }

    public function testGetMessagesNewest() {
        // Page Not Found
        $otherUserId = 5;
        $page        = 0;

        $this->requestGetMessagesNewest($otherUserId, $page);
        $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());

        // Ok
        $otherUserId = 5;
        $page        = 1;

        $this->requestGetMessagesNewest($otherUserId, $page);
        $messagesData = json_decode($this->client->getResponse()->getContent());
        $this->assertResponseIsSuccessful();
        $this->assertEquals(51, $messagesData->totalResults);
        
        // User Not Found
        $otherUserId = 99999999999999;
        $page        = 1;

        $this->requestGetMessagesNewest($otherUserId, $page);
        $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());

        // User Parameter Required
        $this->requestGetMessagesNewest();
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
    }

    public function testSendMessage() {
        // Ok
        $toId    = 5;
        $message = "Hello World";

        $this->requestSendMessage($toId, $message);
        $messagesData = json_decode($this->client->getResponse()->getContent());
        $this->assertResponseIsSuccessful();
        $this->assertEquals($message, $messagesData->message);

        // User Not Found
        $toId    = 1005;
        $message = "Hello World";

        $this->requestSendMessage($toId, $message);
        $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());

        // Message from You to You
        $toId    = 3;
        $message = "Hello World";

        $this->requestSendMessage($toId, $message);
        $this->assertEquals(Response::HTTP_NOT_ACCEPTABLE, $this->client->getResponse()->getStatusCode());

        // Parameter(s) Required
        $this->requestSendMessage();
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
    }

    private function requestGetThreads($page=null) {
        if ($page === null) {
            $apiUrl = '/api/internal-message/threads';
        }
        else {
            $apiUrl = '/api/internal-message/threads?page=' . $page;
        }

        $threadsCrawler = $this->client->request('GET', $apiUrl, [], [], [
            'HTTP_Authorization' => 'Bearer '.$this->token,
            'HTTP_CONTENT_TYPE'  => 'application/json',
            'HTTP_ACCEPT'        => 'application/json',
        ]);
    }

    private function requestGetMessagesNewest($otherUserId=null, $page=null) {
        if ($otherUserId === null && $page === null) {
            $apiUrl = '/api/internal-message/messages';
        }
        else {
            $apiUrl = '/api/internal-message/messages?otherUserId=' . $otherUserId . '&page=' . $page;
        }

        $messagesCrawler = $this->client->request('GET', $apiUrl, [], [], [
            'HTTP_Authorization' => 'Bearer '.$this->token,
            'HTTP_CONTENT_TYPE'  => 'application/json',
            'HTTP_ACCEPT'        => 'application/json',
        ]);
    }

    private function requestSendMessage($toId=null, $message=null) {
        if ($toId === null && $message === null) {
            $apiUrl = '/api/internal-message';
        }
        else {
            $apiUrl = '/api/internal-message?toId=' . $toId . '&message=' . $message;
        }

        $messageCrawler = $this->client->request('POST', $apiUrl, [], [], [
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
