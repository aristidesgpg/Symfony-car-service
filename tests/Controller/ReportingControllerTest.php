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
    public function setUp()
    {
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
            $ttl = 31536000;
            $this->token = $authentication->getJWT($user->getEmail(), $ttl);
        }
    }

    public function testArchive()
    {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');

            return;
        }

        // Ok
        $this->requestAction();
        $listData = json_decode($this->client->getResponse()->getContent());
        $this->assertResponseIsSuccessful();
        $this->assertGreaterThanOrEqual(0, $listData->totalResults);

        // Page limit validation
        $page = 1;
        $pageLimit = 0;
        $this->requestAction($page, $pageLimit);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
    }

    public function testAdvisorUsage()
    {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');

            return;
        }

        // Ok
        $this->requestActionNormalized('advisors');
        $this->assertResponseIsSuccessful();
    }

    public function testAdvisor()
    {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');

            return;
        }

        // Ok
        $this->requestActionNormalized('advisors-usage');
        $this->assertResponseIsSuccessful();
    }

    public function testTechnicians()
    {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');

            return;
        }

        // Ok
        $this->requestActionNormalized('technicians');
        $this->assertResponseIsSuccessful();
    }

    public function testCustomerEngagements()
    {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');

            return;
        }

        // Ok
        $this->requestActionNormalized('customer-engagements');
        $this->assertResponseIsSuccessful();
    }

    public function testMpi()
    {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');

            return;
        }

        // Ok
        $this->requestActionNormalized('mpi');
        $this->assertResponseIsSuccessful();
    }

    // TODO: Will refactor on this weekend
    private function requestActionNormalized($url)
    {
        $url = '/api/reporting/'.$url;
        $crawler = $this->client->request('GET', $url, [], [], [
            'HTTP_Authorization' => 'Bearer '.$this->token,
            'HTTP_CONTENT_TYPE' => 'application/json',
            'HTTP_ACCEPT' => 'application/json',
        ]);
    }

    private function requestAction($page = null, $pageLimit = null)
    {
        $apiUrl = '/api/reporting/archive';

        if (null !== $page && null !== $pageLimit) {
            $apiUrl = $apiUrl.'?page='.$page.'&pageLimit='.$pageLimit;
        }

        $crawler = $this->client->request('GET', $apiUrl, [], [], [
            'HTTP_Authorization' => 'Bearer '.$this->token,
            'HTTP_CONTENT_TYPE' => 'application/json',
            'HTTP_ACCEPT' => 'application/json',
        ]);
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();
        $this->client = null;
        $this->token = null;
    }
}
