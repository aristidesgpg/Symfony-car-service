<?php

namespace App\Tests;

use App\Entity\User;
use App\Service\Authentication;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class InternalMessageControllerTest extends WebTestCase {
    private $client = null;

    private $token;
    
    private $authenticatedUserId;

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
        $this->authenticatedUserId = $user->getId();
    }

    public function testGetThreads() {
        // Page Not Found
        $page = 0;
        $this->requestAction('GET', '/threads?page=' . $page );
        $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());

        // Ok
        $page = 1;
        $this->requestAction('GET', '/threads?page=' . $page );
        $threadsData = json_decode($this->client->getResponse()->getContent());
        $this->assertResponseIsSuccessful();
        $this->assertGreaterThanOrEqual(0, $threadsData->totalResults);
    }

    public function testGetMessagesNewest() {
        $users = self::$container->get('doctrine')
                                ->getManager()
                                ->getRepository(User::class)
                                ->createQueryBuilder('u')
                                ->setMaxResults(2)
                                ->getQuery()
                                ->getResult();
        $user = $users[1];
        if ($user) {
            // Page Not Found
            $otherUserId = $user->getId();
            $page        = 0;

            $this->requestAction('GET', '/messages?otherUserId=' . $otherUserId . '&page=' . $page);
            $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());

            // Ok
            $otherUserId = $user->getId();
            $page        = 1;

            $this->requestAction('GET', '/messages?otherUserId=' . $otherUserId . '&page=' . $page);
            $messagesData = json_decode($this->client->getResponse()->getContent());
            $this->assertResponseIsSuccessful();
            $this->assertGreaterThanOrEqual(0, $messagesData->totalResults);
        } else {
            $this->assertEmpty($user, 'User is null');
            return;
        }
    }

    public function testSendMessage() {
        $users = self::$container->get('doctrine')
                                ->getManager()
                                ->getRepository(User::class)
                                ->createQueryBuilder('u')
                                ->setMaxResults(2)
                                ->getQuery()
                                ->getResult();
        $user = $users[1];
        if ($user) {
            // Ok
            $toId    = $user->getId();
            $message = "Hello World";

            $this->requestAction('POST', '?toId=' . $toId . '&message=' . $message);
            $messagesData = json_decode($this->client->getResponse()->getContent());
            $this->assertResponseIsSuccessful();
            $this->assertEquals($message, $messagesData->message);

            // Message from You to You
            $toId    = $this->authenticatedUserId;
            $message = "Hello World";

            $this->requestAction('POST', '?toId=' . $toId . '&message=' . $message);
            $this->assertEquals(Response::HTTP_NOT_ACCEPTABLE, $this->client->getResponse()->getStatusCode());

            // Parameter(s) Required
            $this->requestAction('POST', '');
            $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
        } else {
            $this->assertEmpty($user, 'User is null');
            return;
        }
    }

    private function requestAction($method, $apiUrl, $params=[]) {
        $crawler = $this->client->request($method, '/api/internal-message'.$apiUrl, $params, [], [
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
