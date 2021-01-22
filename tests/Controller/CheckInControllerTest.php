<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class CheckInControllerTest extends WebTestCase
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

    public function testList()
    {
        // Ok
        $this->requestList();
        $listData = json_decode($this->client->getResponse()->getContent());
        $this->assertResponseIsSuccessful();
        $this->assertGreaterThanOrEqual(0, $listData->totalResults);
        
        // Page not found
        $page      = 0;
        $pageLimit = 1;
        $this->requestList($page, $pageLimit);
        $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());

        // Page limit validation
        $page      = 1;
        $pageLimit = 0;
        $this->requestList($page, $pageLimit);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
    }

    private function requestList($page=null, $pageLimit=null) {
        $apiUrl = '/api/check-in';
        if ($page !== null && $pageLimit !== null) {
            $apiUrl = $apiUrl . '?page=' . $page . '&pageLimit=' . $pageLimit;
        }

        $crawler = $this->client->request('GET', $apiUrl, [], [], [
            'HTTP_Authorization' => 'Bearer '.$this->token,
            'HTTP_CONTENT_TYPE'  => 'application/json',
            'HTTP_ACCEPT'        => 'application/json',
        ]);
    }

    public function testNew() {
        $identification = "4345cb1fa27885a8fbfe7c0c830a592cc76a552b";
        $video          = "https://autoboost.sfo2.digitaloceanspaces.com/fixtures/fixture-video-2.mp4";
        $apiUrl         = '/api/check-in';

        $crawler = $this->client->request('POST', $apiUrl, ['identification'=>$identification, 'video' => $video], [], [
            'HTTP_Authorization' => 'Bearer '.$this->token,
            'HTTP_CONTENT_TYPE'  => 'application/json',
            'HTTP_ACCEPT'        => 'application/json',
        ]);

        $response = json_decode($this->client->getResponse()->getContent());
        $this->assertEquals(Response::HTTP_NOT_ACCEPTABLE, $this->client->getResponse()->getStatusCode());
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
