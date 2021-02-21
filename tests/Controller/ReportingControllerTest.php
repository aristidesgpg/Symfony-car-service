<?php

namespace App\Tests;

use App\Entity\User;
use App\Service\Authentication;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class ReportingControllerTest extends WebTestCase
{
    private $client = null;
    
    private $token;

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

        if ($user) {
            $authentication = self::$container->get(Authentication::class);
            $ttl            = 31536000;
            $this->token    = $authentication->getJWT($user->getEmail(), $ttl);
        }
    }

    public function testArchive()
    {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');
            return;
        }
    }

    private function requestList($page=null, $pageLimit=null) {
        $apiUrl = '/api/reporting';
        if ($page !== null && $pageLimit !== null) {
            $apiUrl = $apiUrl . '?page=' . $page . '&pageLimit=' . $pageLimit;
        }

        $crawler = $this->client->request('GET', $apiUrl, [], [], [
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
