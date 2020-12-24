<?php

namespace App\Tests;

use App\Entity\User;
use Lexik\Bundle\JWTAuthenticationBundle\Exception\JWTEncodeFailureException;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MessageControllerTest extends WebTestCase
{
    private $client = null;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    public function setUp()
    {
        $this->client = static::createClient();
        $this->entityManager = $this->client->getContainer()
             ->get('doctrine')
             ->getManager();
    }

    public function testUnread()
    {
        $authCrawler = $this->client->request('POST', '/api/authentication/authenticate', [
            'username' => 'tperson@iserviceauto.com',
            'password' => 'test'
        ]);

        $authData = json_decode($this->client->getResponse()->getContent());
        error_log($authData->token);

        $unReadCrawler = $this->client->request('GET', '/api/message/unread', [], [], [
                'HTTP_Authorization' => 'Bearer '.$authData->token,
                'HTTP_CONTENT_TYPE' => 'application/json',
                'HTTP_ACCEPT'       => 'application/json',
            ]);
        
        print_r($this->client->getResponse());

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());

        $this->assertResponseIsSuccessful();
    }

    private function logIn()
    {
        $username = "tperson@iserviceauto.com";
        $password = "test";

        if ($username && $password) {
            /** @var User $user */
            $user = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $username]);

            // User was found
            if ($user) {
                $isValid = $this->passwordEncoder->isPasswordValid($user, $password);

                if ($isValid) {
                    // Successful regular user login
                    $tokenUsername = $user->getEmail();
                    $ttl           = 28800; // Default 8 hours

                    try {
                        $this->token = $this->JWTEncoder->encode([
                            'username' => $tokenUsername,
                            'exp'      => time() + $ttl
                        ]);
                    } catch (JWTEncodeFailureException $e) {
                        $this->token = null;
                    }
                }
            }
        }
    }
}
