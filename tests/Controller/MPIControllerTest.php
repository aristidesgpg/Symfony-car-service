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

        $authCrawler  = $this->client->request('POST', '/api/authentication/authenticate', [
            'username' => 'tperson@iserviceauto.com',
            'password' => 'test'
        ]);

        $authData = json_decode($this->client->getResponse()->getContent());
        $this->token = $authData->token;
    }

    public function testGetTemplates() {
        // Get all, Ok
        $this->requestAction('GET', '/mpi-template');

        $this->assertResponseIsSuccessful();
        $response = json_decode($this->client->getResponse()->getContent());
        $this->assertGreaterThanOrEqual(0, $response->totalResults);

        // Page not found, 404
        $page = 0;
        $this->requestAction('GET', '/mpi-template', ['page' => $page]);
        $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());

        // Page limit validation, 406
        $pageLimit = 0;
        $this->requestAction('GET', '/mpi-template', ['pageLimit' => $pageLimit]);
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
        $this->requestAction('GET', '/mpi-template', $params);
        $this->assertEquals(Response::HTTP_NOT_ACCEPTABLE, $this->client->getResponse()->getStatusCode());
    }

    public function testGetTemplate() {
        // Ok
        $id = 1;
        $this->requestAction('GET', '/mpi-template/'.$id);
        $this->assertResponseIsSuccessful();
        $response = json_decode($this->client->getResponse()->getContent());
        $this->assertGreaterThanOrEqual($id, $response->id);

        // Not found
        $id = 2147483647;
        $this->requestAction('GET', '/mpi-template/'.$id);
        $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());
    }

    public function testCreateTemplate() {
        // Ok
        $name     = 'MPI Template Name';
        $axleInfo = '[{"wheels":2,"brakesRangeMaximum":10,"tireRangeMaximum":6},{"wheels":4,"brakesRangeMaximum":12,"tireRangeMaximum":12},{"wheels":2,"brakesRangeMaximum":10,"tireRangeMaximum":6}]';
        $params   = [
            'name'     => $name,
            'axleInfo' => $axleInfo
        ];
        $this->requestAction('POST', '/mpi-template', $params);
        $this->assertResponseIsSuccessful();
        $response = json_decode($this->client->getResponse()->getContent());
        $this->assertEquals($name, $response->name);

        // Validate parameters
        $params = [
            'name' => $name,
        ];

        $this->requestAction('POST', '/mpi-template', $params);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
    }

    public function testEditTemplate() {
        // Ok
        $id     = 1;
        $name   = 'MPI template name for update';
        $params = [
            'name' => $name
        ];
        $this->requestAction('PUT', '/mpi-template/'.$id, $params);
        $this->assertResponseIsSuccessful();
        $response = json_decode($this->client->getResponse()->getContent());
        $this->assertEquals($name, $response->name);

        // Require parameters
        $this->requestAction('PUT', '/mpi-template/'.$id);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
    }

    public function testDeactivateTemplate() {
        // Ok
        $id = 1;
        $this->requestAction('PUT', '/mpi-template/de-activate/'.$id);
        $this->assertResponseIsSuccessful();
    }

    public function testReactivateTemplate() {
        // Ok
        $id = 1;
        $this->requestAction('PUT', '/mpi-template/re-activate/'.$id);
        $this->assertResponseIsSuccessful();
    }

    public function testDeleteTemplate() {
        // Ok
        $id = 1;
        $this->requestAction('DELETE', '/mpi-template/'.$id);
        $this->assertResponseIsSuccessful();
    }

    public function testCreateGroup() {
        // Ok
        $name   = 'New MPI group name';
        $params = [
            'id'   => 1, // MPI template ID
            'name' => $name
        ];
        $this->requestAction('POST', '/mpi-group', $params);
        $this->assertResponseIsSuccessful();
        $response = json_decode($this->client->getResponse()->getContent());
        $this->assertEquals($name, $response->name);

        // Missing required parameter
        $this->requestAction('POST', '/mpi-group');
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());

        // Invalid Template Parameter
        $params = [
            'id'   => 2147483647, // MPI template ID
            'name' => $name
        ];
        $this->requestAction('POST', '/mpi-group', $params);
        $this->assertEquals(Response::HTTP_NOT_ACCEPTABLE, $this->client->getResponse()->getStatusCode());
    }

    public function testEditGroup() {
        // Ok
        $id   = 1;
        $name = 'New name of MPI group';
        $this->requestAction('PUT', '/mpi-group/'.$id, ['name' => $name]);
        $this->assertResponseIsSuccessful();
        $response = json_decode($this->client->getResponse()->getContent());
        $this->assertEquals($name, $response->name);

        // Missing required parameter
        $this->requestAction('PUT', '/mpi-group/'.$id);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
    }

    public function testDeactivateGroup() {
        $id = 1;
        $this->requestAction('PUT', '/mpi-group/de-activate/'.$id);
        $this->assertResponseIsSuccessful();
    }

    public function testReactivateGroup() {
        $id = 1;
        $this->requestAction('PUT', '/mpi-group/re-activate/'.$id);
        $this->assertResponseIsSuccessful();
    }

    public function testDeleteGroup() {
        $id = 1;
        $this->requestAction('DELETE', '/mpi-group/'.$id);
        $this->assertResponseIsSuccessful();
    }

    public function testCreateItem() {
        // Ok
        $name   = 'New MPI item name';
        $params = [
            'id'   => 1, // MPI group ID
            'name' => $name
        ];
        $this->requestAction('POST', '/mpi-item', $params);
        $this->assertResponseIsSuccessful();
        $response = json_decode($this->client->getResponse()->getContent());
        $this->assertEquals($name, $response->name);

        // Missing required parameter
        $this->requestAction('POST', '/mpi-item');
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());

        // Invalid Template Parameter
        $params = [
            'id'   => 2147483647,
            'name' => $name
        ];
        $this->requestAction('POST', '/mpi-item', $params);
        $this->assertEquals(Response::HTTP_NOT_ACCEPTABLE, $this->client->getResponse()->getStatusCode());
    }

    public function testEditItem() {
        // Ok
        $id = 1;
        $name = 'New name of MPI item';
        $this->requestAction('PUT', '/mpi-item/'.$id, ['name' => $name]);
        $this->assertResponseIsSuccessful();
        $response = json_decode($this->client->getResponse()->getContent());
        $this->assertEquals($name, $response->name);

        // Missing required parameter
        $this->requestAction('PUT', '/mpi-item/'.$id);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
    }

    public function testDeleteItem() {
        $id = 1;
        $this->requestAction('DELETE', '/mpi-item/'.$id);
        $this->assertResponseIsSuccessful();
    }

    private function requestAction($method, $endpoint='', $params=[]) {
        $apiUrl = '/api' . $endpoint;
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
