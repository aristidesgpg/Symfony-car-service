<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class MPIControllerTest extends WebTestCase
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

    public function testGetTemplates() {
        // Get all, Ok
        $this->requestAction('GET');

        $this->assertResponseIsSuccessful();
        $response = json_decode($this->client->getResponse()->getContent());
        $this->assertGreaterThanOrEqual(0, $response->totalResults);

        // Page not found, 404
        $page = 0;
        $this->requestAction('GET', '', ['page' => $page]);
        $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());

        // Page limit validation, 406
        $pageLimit = 0;
        $this->requestAction('GET', '', ['pageLimit' => $pageLimit]);
        $this->assertEquals(Response::HTTP_NOT_ACCEPTABLE, $this->client->getResponse()->getStatusCode());

        // sortField, sortDirection, searchField, searchTerm
        $params = [
            'page'          => 1,
            'pageLimit'     => 25,
            'sortField'     => 'emal',
            'sortDirection' => 'ASC',
            'searchField'   => 'name',
            'searchTerm'    => 'Prof'
        ];
        $this->requestAction('GET', '', $params);
        $this->assertEquals(Response::HTTP_NOT_ACCEPTABLE, $this->client->getResponse()->getStatusCode());
    }

    public function testGetTemplate() {
        // Ok
        $id = 1;
        $this->requestAction('GET', '/'.$id);
        $this->assertResponseIsSuccessful();
        $response = json_decode($this->client->getResponse()->getContent());
        $this->assertGreaterThanOrEqual($id, $response->id);

        // Not found
        $this->requestAction('GET', '/{9999999999999999}');
        $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());
    }

    public function testCreateTemplate() {
        // Ok
        $name = 'MPI Template Name';
        $axleInfo = "[{'wheels':2,'brakesRangeMaximum':10,'tireRangeMaximum':6},{'wheels':4,'brakesRangeMaximum':12,'tireRangeMaximum':12},{'wheels':2,'brakesRangeMaximum':10,'tireRangeMaximum':6}]";
        $params = [
            'name'     => $name,
            'axleInfo' => $axleInfo
        ];
        $this->requestAction('POST', '', $params);
        $this->assertResponseIsSuccessful();
        $response = json_decode($this->client->getResponse()->getContent());
        $this->assertEquals($name, $response->name);

        // Validate parameters
        $params = [
            'name' => $name,
        ];

        $this->requestAction('POST', '', $params);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
    }

    public function testEditTemplate() {
        // Ok
        $name = 'MPI template name for update';
        $params = [
            'name' => $name
        ];
        $this->requestAction('PUT', '/1', $params);
        $this->assertResponseIsSuccessful();
        $response = json_decode($this->client->getResponse()->getContent());
        $this->assertEquals($name, $response->name);

        // Require parameters
        $this->requestAction('PUT', '/1');
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
    }

    public function testDeactivateTemplate() {
        // Ok
        $this->requestAction('PUT', '/de-activate/1');
        $this->assertResponseIsSuccessful();
    }

    public function testReactivateTemplate() {
        // Ok
        $this->requestAction('PUT', '/re-activate/1');
        $this->assertResponseIsSuccessful();
    }

    public function testDeleteTemplate() {
        // Ok
        $id = 1;
        $this->requestAction('DELETE', '/'.$id);
        $this->assertResponseIsSuccessful();
    }

    private function requestAction($method, $endpoint='', $params=[]) {
        $apiUrl = '/api/mpi-template' . $endpoint;
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
