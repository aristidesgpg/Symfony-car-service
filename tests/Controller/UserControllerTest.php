<?php

namespace App\Tests;

use App\Entity\User;
use App\Service\Authentication;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class UserControllerTest extends WebTestCase
{
    private $client = null;

    private $token;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    /**
     * {@inheritDoc}
     */
    public function setUp() {
        $this->client = static::createClient();

        $user = self::$container->get('doctrine')
                                ->getManager()
                                ->getRepository(User::class)
                                ->createQueryBuilder('u')
                                ->setMaxResults(1)
                                ->getQuery()
                                ->getOneOrNullResult();

        $authentication = self::$container->get(Authentication::class);
        $ttl            = 31536000;
        $this->token    = $authentication->getJWT($user->getEmail(), $ttl);

        $this->entityManager = self::$container->get('doctrine')->getManager();
    }

    public function testGetUsers() {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');
            return;
        }
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
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');
            return;
        }
        // Ok
        $email  = 'test@test.com';
        $params = [
            'role'              => 'ROLE_ADMIN',
            'firstName'         => 'John',
            'lastName'          => 'Doe',
            'email'             => $email,
            'phone'             => '8623456789',
            'password'          => 'testpass',
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
            'firstName' => 'Jane',
            'lastName' => 'Doe',
            'email' => $email
        ];

        $this->requestAction('POST', '/users', $params);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
    }

    public function testEdit() {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');
            return;
        }
        $user = $this->entityManager->getRepository(User::class)
                                    ->createQueryBuilder('u')
                                    ->where('u.active = 1')
                                    ->setMaxResults(1)
                                    ->getQuery()
                                    ->getOneOrNullResult();
        if ($user) {
            // Ok
            $id     = $user->getId();
            $email  = 'newupdater@test.com';
            $params = [
                'role'              => 'ROLE_ADMIN',
                'firstName'         => 'John',
                'lastName'          => 'Doe',
                'email'             => $email,
                'phone'             => '8623456789',
                'password'          => 'test',
                'pin'               => '3753',
                'processRefund'     => true,
                'shareRepairOrders' => true
            ];
            $this->requestAction('PUT', '/users/'.$id, $params);
            $this->assertResponseIsSuccessful();
            $response = json_decode($this->client->getResponse()->getContent());
            $this->assertEquals($email, $response->email);
        }
    }

    public function testDelete() {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');
            return;
        }
        // Ok
        $user = $this->entityManager->getRepository(User::class)
                                    ->createQueryBuilder('u')
                                    ->where('u.active = 1')
                                    ->setMaxResults(1)
                                    ->getQuery()
                                    ->getOneOrNullResult();
        if ($user) {
            // Ok
            $id = $user->getId();
            $this->requestAction('DELETE', '/users/'.$id);
            $this->assertResponseIsSuccessful();
        }
    }

    public function testSecurity() {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');
            return;
        }
        $user = $this->entityManager->getRepository(User::class)
                                    ->createQueryBuilder('u')
                                    ->where('u.active = 1')
                                    ->setMaxResults(1)
                                    ->getQuery()
                                    ->getOneOrNullResult();
        if ($user) {
            // Ok
            $id     = $user->getId();
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
    }

    public function testGetSecurityQuestion() {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');
            return;
        }
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
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');
            return;
        }
        // Ok
        $params = [
            'token'    => $this->token, // this is not the rest password token, it's user auth token
            'password' => 'new password'
        ];
        $this->requestAction('PATCH', '/security/reset-password', $params);
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
