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
        
        $ids = [1, 33, 999];

        foreach($ids as $id){
            $this->requestNew($id);
            $code = $this->client->getResponse()->getStatusCode();
    
            if($code === 200){
                $this->assertResponseIsSuccessful();
                $messagesData = json_decode($this->client->getResponse()->getContent());

                $this->assertEquals($id, $messagesData->repairOrder->id);
            }else if($code === 404){
                $this->assertEquals(Response::HTTP_NOT_FOUND, 404);
            }
        }
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
        $ids = [1, 33, 999];
        
        foreach($ids as $id){
            $this->requestDelete($id);
            $code = $this->client->getResponse()->getStatusCode();
            
            if($code === 200){
                $this->assertResponseIsSuccessful();
                $messagesData = json_decode($this->client->getResponse()->getContent());
                $this->assertEquals("Successfully removed", $messagesData->message);
            }else if($code === 404){
                $this->assertEquals(Response::HTTP_NOT_FOUND, 404);
            }
        }
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
