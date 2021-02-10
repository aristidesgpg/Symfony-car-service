<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class PriceMatrixControllerTest extends WebTestCase {
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
        $this->requestActions('GET');
        $roInteractionRes = json_decode($this->client->getResponse()->getContent());
        $this->assertResponseIsSuccessful();
        $this->assertEquals(20, sizeof($roInteractionRes));
    }

    public function testPost() {
        // Ok
        $data = '[{"hours":0,"price":0}, {"hours":0.1,"price":0.5}]';
        $this->requestActions('POST', ["payload"=>$data]);
        $roInteractionRes = json_decode($this->client->getResponse()->getContent());
        $this->assertResponseIsSuccessful();
        $this->assertEquals("Successfully created", $roInteractionRes->message);

        //wrong json object.  " is missing 
        $data = '[{"hours":0, price":0}, {"hours":0.1,"price":0.5}]';
        $this->requestActions('POST', ["payload"=>$data]);
        $roInteractionRes = json_decode($this->client->getResponse()->getContent());
        $this->assertEquals( Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());

        //wrong json object.  use " instead of '
        $data = "[{'hours':0, 'price':0}, {'hours':0.1,'price':0.5}]";
        $this->requestActions('POST', ["payload"=>$data]);
        $roInteractionRes = json_decode($this->client->getResponse()->getContent());
        $this->assertEquals( Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());

        //wrong jon object.  It should be array type
        $data = '{"hours":0, price":0}';
        $this->requestActions('POST', ["payload"=>$data]);
        $roInteractionRes = json_decode($this->client->getResponse()->getContent());
        $this->assertEquals( Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());

        //wrong json object.  Each item should be object
        $data = '["hours":0]';
        $this->requestActions('POST', ["payload"=>$data]);
        $roInteractionRes = json_decode($this->client->getResponse()->getContent());
        $this->assertEquals( Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());

        //missing field
        $data = '[{"hours":0}, {"hours":0.1,"price":0.5}]';
        $this->requestActions('POST', ["payload"=>$data]);
        $roInteractionRes = json_decode($this->client->getResponse()->getContent());
        $this->assertEquals( Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
        
        //invalid value. Each value should be a number
        $data = '[{"hours":0,"price":"aa"}, {"hours":0.1,"price":0.5}]';
        $this->requestActions('POST', ["payload"=>$data]);
        $roInteractionRes = json_decode($this->client->getResponse()->getContent());
        $this->assertEquals( Response::HTTP_NOT_ACCEPTABLE, $this->client->getResponse()->getStatusCode());
    }

    private function requestActions($method, $params=[]) {
        $apiUrl = '/api/price-matrix';

        $this->client->request($method, $apiUrl, $params, [], [
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