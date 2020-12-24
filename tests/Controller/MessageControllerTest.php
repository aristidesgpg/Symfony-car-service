<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class MessageControllerTest extends WebTestCase
{
    private $client = null;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->client = static::createClient();
    }

    public function testUnread()
    {
        $authCrawler = $this->client->request('POST', '/api/authentication/authenticate', [
            'username' => 'tperson@iserviceauto.com',
            'password' => 'test'
        ]);

        $authData = json_decode($this->client->getResponse()->getContent());

        $unReadCrawler = $this->client->request('GET', '/api/message/unread', [], [], [
                'HTTP_Authorization' => 'Bearer '.$authData->token,
                'HTTP_CONTENT_TYPE'  => 'application/json',
                'HTTP_ACCEPT'        => 'application/json',
            ]);
        
        $unreadData = json_decode($this->client->getResponse()->getContent());

        $this->assertEquals(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());
        $this->assertResponseIsSuccessful();

        $this->assertEquals(6, $unreadData->internal);
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();
        $this->client = null;
    }
}
