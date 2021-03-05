<?php

namespace App\Tests;

use App\Entity\User;
use App\Service\Authentication;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class MessageControllerTest extends WebTestCase
{
    private $client = null;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->client = static::createClient();
    }

    public function testUnread()
    {
        $user = self::$container->get('doctrine')
                                ->getManager()
                                ->getRepository(User::class)
                                ->createQueryBuilder('u')
                                ->setMaxResults(1)
                                ->getQuery()
                                ->getOneOrNullResult();
        if (!$user) {
            $this->assertEmpty($user, 'User is null');
            return;
        }

        $authentication = self::$container->get(Authentication::class);
        $ttl            = 31536000;
        $token          = $authentication->getJWT($user->getEmail(), $ttl);

        $unReadCrawler = $this->client->request('GET', '/api/message/unread', [], [], [
                'HTTP_Authorization' => 'Bearer '.$token,
                'HTTP_CONTENT_TYPE'  => 'application/json',
                'HTTP_ACCEPT'        => 'application/json',
            ]);
        
        $unreadData = json_decode($this->client->getResponse()->getContent());
        $this->assertResponseIsSuccessful();
        $this->assertGreaterThanOrEqual(0, $unreadData->internal);
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();
        $this->client = null;
    }
}
