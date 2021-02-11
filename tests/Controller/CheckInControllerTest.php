<?php

namespace App\Tests;

use App\Entity\User;
use App\Service\Authentication;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class CheckInControllerTest extends WebTestCase
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

        $authentication = self::$container->get(Authentication::class);
        $ttl            = 31536000;
        $this->token    = $authentication->getJWT($user->getEmail(), $ttl);
    }

    public function testList()
    {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');
            return;
        }

        // Ok
        $this->requestList();
        $listData = json_decode($this->client->getResponse()->getContent());
        $this->assertResponseIsSuccessful();
        $this->assertGreaterThanOrEqual(0, $listData->totalResults);
        
        // Page not found
        $page      = 0;
        $pageLimit = 1;
        $this->requestList($page, $pageLimit);
        $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());

        // Page limit validation
        $page      = 1;
        $pageLimit = 0;
        $this->requestList($page, $pageLimit);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
    }

    private function requestList($page=null, $pageLimit=null) {
        $apiUrl = '/api/check-in';
        if ($page !== null && $pageLimit !== null) {
            $apiUrl = $apiUrl . '?page=' . $page . '&pageLimit=' . $pageLimit;
        }

        $crawler = $this->client->request('GET', $apiUrl, [], [], [
            'HTTP_Authorization' => 'Bearer '.$this->token,
            'HTTP_CONTENT_TYPE'  => 'application/json',
            'HTTP_ACCEPT'        => 'application/json',
        ]);
    }

    public function testNew() {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');
            return;
        }
        
        $identification = "4345cb1fa27885a8fbfe7c0c830a592cc76a552b";
        $video          = "https://autoboost.sfo2.digitaloceanspaces.com/fixtures/fixture-video-2.mp4";
        $apiUrl         = '/api/check-in';

        $crawler = $this->client->request('POST', $apiUrl, ['identification'=>$identification, 'video' => $video], [], [
            'HTTP_Authorization' => 'Bearer '.$this->token,
            'HTTP_CONTENT_TYPE'  => 'application/json',
            'HTTP_ACCEPT'        => 'application/json',
        ]);
        $this->assertEquals(Response::HTTP_NOT_ACCEPTABLE, $this->client->getResponse()->getStatusCode());
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
