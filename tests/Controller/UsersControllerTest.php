<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class UserControllerTest extends WebTestCase
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

    public function testGetUsers() {
        // Get all, Ok
        $this->requestAction('GET', '/users');

        $this->assertResponseIsSuccessful();
        $response = json_decode($this->client->getResponse()->getContent());
        $this->assertGreaterThanOrEqual(0, $response->totalResults);

        // Page not found, 404
        $page = 0;
        $this->requestAction('GET', '/users', ['page' => $page]);
        $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());

        // Page limit validation, 406
        $pageLimit = 0;
        $this->requestAction('GET', '/users', ['pageLimit' => $pageLimit]);
        $this->assertEquals(Response::HTTP_NOT_ACCEPTABLE, $this->client->getResponse()->getStatusCode());
        
        // Invalid role, 406
        // Valid: {"ROLE_ADMIN", "ROLE_SERVICE_MANAGER", "ROLE_SERVICE_ADVISOR", "ROLE_TECHNICIAN", "ROLE_PARTS_ADVISOR", "ROLE_SALES_MANAGER", "ROLE_SALES_AGENT"}
        $role = "ROLE_ADMIN@";
        $this->requestAction('GET', '/users', ['role' => $role]);
        $this->assertEquals(Response::HTTP_NOT_ACCEPTABLE, $this->client->getResponse()->getStatusCode());

        // sortField, sortDirection, searchField, searchTerm
        $params = [
            'page'          => 1,
            'pageLimit'     => 25,
            'sortField'     => ['phone', 'emai'],
            'sortDirection' => 'ASC',
            'searchField'   => ['name', 'emai'],
            'searchTerm'    => 'Prof'
        ];
        $this->requestAction('GET', '/users', $params);
        $this->assertEquals(Response::HTTP_NOT_ACCEPTABLE, $this->client->getResponse()->getStatusCode());
    }

    public function testNew() {
        // Ok
        $email  = 'tempmail@gmail.com';
        $params = [
            'role'              => 'ROLE_ADMIN',
            'firstName'         => 'Fisrt',
            'lastName'          => 'Last',
            'email'             => $email,
            'phone'             => '8623082654',
            'password'          => 'test',
            'pin'               => '3753',
            'certification'     => 'certification of technician',
            'experience'        => 'experience of technician',
            'processRefund'     => true,
            'shareRepairOrders' => true
        ];
        $this->requestAction('POST', '/users', $params);
        $this->assertResponseIsSuccessful();
        $response = json_decode($this->client->getResponse()->getContent());
        $this->assertEquals($email, $response->email);

        // Validate parameters
        $params = [
            'role' => 'ROLE_ADMIN',
            'firstName' => 'Fisrt',
            'lastName' => 'Last',
            'email' => $email
        ];

        $this->requestAction('POST', '/users', $params);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
    }

    public function testEdit() {
        // Ok
        $email  = 'newupdater@iserviceauto.com';
        $params = [
            'role'              => 'ROLE_ADMIN',
            'firstName'         => 'Fisrt',
            'lastName'          => 'Last',
            'email'             => $email,
            'phone'             => '8623082654',
            'password'          => 'test',
            'pin'               => '3753',
            'processRefund'     => true,
            'shareRepairOrders' => true
        ];
        $this->requestAction('PUT', '/users/1', $params);
        $this->assertResponseIsSuccessful();
        $response = json_decode($this->client->getResponse()->getContent());
        $this->assertEquals($email, $response->email);

        // Certification and Experience is Only for Technicians
        $email = 'newupdater@iserviceauto.com';
        $params = [
            'role'              => 'ROLE_ADMIN',
            'firstName'         => 'Fisrt',
            'lastName'          => 'Last',
            'email'             => $email,
            'phone'             => '8623082654',
            'password'          => 'test',
            'pin'               => '3753',
            'certification'     => 'certification of technician',
            'experience'        => 'experience of technician',
            'processRefund'     => true,
            'shareRepairOrders' => true
        ];
        $this->requestAction('PUT', '/users/1', $params);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());

        // Validate parameters
        $params = [
            'phone'     => '',
            'email'     => $email,
            'firstName' => 'John',
            'lastName'  => 'Doe',
            'role'      =>'Invalid Role'
        ];
        $this->requestAction('PUT', '/users/1', $params);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
    }

    public function testDelete() {
        // Ok
        $id = 1;
        $this->requestAction('DELETE', '/users/'.$id);
        $this->assertResponseIsSuccessful();
    }

    public function testSecurity() {
        // Ok
        $id     = 1;
        $params = [
            'question' => 'Your pet?',
            'answer'   => 'Bunny'
        ];
        $this->requestAction('PATCH', '/security/'.$id.'/set', $params);
        $this->assertResponseIsSuccessful();

        // Missing required parameters
        $this->requestAction('PATCH', '/security/'.$id.'/set');
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
    }

    public function testGetSecurityQuestion() {
        // Ok
        $params = [
            'email' => 'tperson@iserviceauto.com'
        ];
        $this->requestAction('POST', '/security/get-security-question', $params);
        $this->assertResponseIsSuccessful();

        // Missing required parameters
        $this->requestAction('POST', '/security/get-security-question');
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
    }

    public function testResetPassword() {
        // Ok
        $params = [
            'token'    => $this->token, // this is not the rest password token, it's user auth token
            'password' => 'new password'
        ];
        $this->requestAction('PATCH', '/security/reset-password', $params);
        // $this->assertResponseIsSuccessful();
        $this->assertEquals(Response::HTTP_UNAUTHORIZED, $this->client->getResponse()->getStatusCode());

        // Invalid token
        $params = [
            'token'    => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE2MTE2NTc4NjgsInVzZXJuYW1lIjoidHBlcnNvbkBpc2VydmljZWF1dG8uY29tIiwiZXhwIjoxNjExNjg2NjY4fQ.Vh52A_oMsbBPFjcDIFvWLVabVuIBI_G15IRUQaSivg2QD_XK8svSCctQouH1YsIkLPCeyR3BeMMmT-MTmmDXlK0ixt3zdHXRjF49tYJ-UGzgSadrauRtmWZFBvmnp4LU-_M3uhITrzHUI5W8kTFJCwUTmm39D1bfSc2Dq4uMi34g1Kcih467julRIXaTiDikNEsTNqe-71oJbdLjAEM2C-jW_MDhCt-b_dYz6Ud-7oJj52EHNLqhG4aTf-Hcyywqe3x8QExcsI6TEBk6P08rEh70ggHxJAdoNEhNKxy1Ii2QTOiZr4_8rHY-HaUsb1Gsde69HollKHUcbM-RTSucWF4NB8xuzld07o_-cKHgmNOrcOjDvXEtvTScMJLs93gSrAxVfYbzCDeGpIWG5T3ujEg8oK9XTDhj1S6U42Gz6f0Ghs3QqGNRV_hFZO5cnHCUYSqCJp7953DHjAqfFhRYQtMa-0aM_6GMszQ_GNud5bPJbzLwlCz6ywvFbMwzctivOa5BrInDHzCksppem6nDrt4uRmBTI0BOTuDksEjmYRcFCTtmug2KbgC1r0xkxZTJh5uFnKcEcv-K9O88tVF58GwE8pGWDfTNVtLzViCDzjYCoG82SAoiYvRaCEXep9LHc8QstW12mq9FnPZn7O',
            'password' => 'new password'
        ];
        $this->requestAction('PATCH', '/security/reset-password', $params);
        $this->assertEquals(Response::HTTP_UNAUTHORIZED, $this->client->getResponse()->getStatusCode());

        // Missing required parameters
        $this->requestAction('PATCH', '/security/reset-password');
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
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
