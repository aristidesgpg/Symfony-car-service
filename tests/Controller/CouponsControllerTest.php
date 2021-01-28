<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Response;

class CouponsControllerTest extends WebTestCase
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

    public function testList() {
        $this->requestAction('GET', '');

        $this->assertResponseIsSuccessful();
        $response = json_decode($this->client->getResponse()->getContent());
        $this->assertGreaterThanOrEqual(0, $response->totalResults);
    }

    public function testNew() {
        $params = ['title' => 'Qui neque veritatis omnis omnis.', 'image' => 'http://localhost/uploads/coupons/52f0e4f8e9c71c1eb5f468c87ec9d0b6.jpeg'];
        $this->requestAction('POST', '', $params);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());

        // image upload test
        $uploadedFile = new UploadedFile(
            dirname(__DIR__,1).'/Fixtures/uploads/testImage.jpeg',
            'testImage.jpeg' // If you run the CouponsFixture, it will download testImage.jpeg on test device !important
        );
        $crawler = $this->client->request('POST', '/api/coupons', ['title' => 'Qui neque veritatis omnis omnis.'], ['file' => $uploadedFile], [
            'HTTP_Authorization' => 'Bearer '.$this->token,
            'HTTP_CONTENT_TYPE'  => 'application/json',
            'HTTP_ACCEPT'        => 'application/json',
        ]);
        
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
    }

    public function testEdit() {
        // Ok
        $this->requestAction('PUT', '/1', ['title' => 'New title']);
        $this->assertResponseIsSuccessful();
        $response = json_decode($this->client->getResponse()->getContent());
        $this->assertEquals('New title', $response->title);

        // Missing required parameter
        $this->requestAction('PUT', '/1');
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
    }

    public function testDelete() {
        // Ok
        $id = 1;
        $this->requestAction('DELETE', '/'.$id);
        $this->assertResponseIsSuccessful();
        $this->assertEquals(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());

        $id = 2147483647;
        $this->requestAction('DELETE', '/'.$id);
        $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());
    }

    private function requestAction($method, $endpoint, $params=[]) {
        $apiUrl = '/api/coupons' . $endpoint;
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
