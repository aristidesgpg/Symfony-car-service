<?php

namespace App\Tests;

use App\Entity\Customer;
use App\Entity\RepairOrderPayment;
use App\Entity\User;
use App\Service\Authentication;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class ReportingControllerTest extends WebTestCase
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

            $this->entityManager = self::$container->get('doctrine')
                                                   ->getManager();
        }
    }

    public function testArchive()
    {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');

            return;
        }

        // Ok
        $this->requestActionNormalized('archive');
        $listData = json_decode($this->client->getResponse()->getContent());
        $this->assertResponseIsSuccessful();
        $this->assertGreaterThanOrEqual(0, $listData->totalResults);

        // Page limit validation
        $params = ['page' => 1, 'pageLimit' => 0];
        $this->requestActionNormalized('archive', $params);
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

        // Give date range
        $params = ['startDate' => '2019-02-20 06:04:41', 'endDate' => '2021-08-07 06:04:41'];
        $this->requestActionNormalized('advisors', $params);
        $listData = json_decode($this->client->getResponse()->getContent());
        $this->assertResponseIsSuccessful();
        $this->assertGreaterThanOrEqual(0, $listData->totalResults);

        // Reversed dates
        $params = ['startDate' => '2021-08-07 06:04:41', 'endDate' => '2019-02-20 06:04:41'];
        $this->requestActionNormalized('advisors', $params);
        $listData = json_decode($this->client->getResponse()->getContent());
        $this->assertResponseIsSuccessful();
        $this->assertGreaterThanOrEqual(0, $listData->totalResults);
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

        // Give date range
        $params = ['startDate' => '2019-02-20 06:04:41', 'endDate' => '2021-08-07 06:04:41'];
        $this->requestActionNormalized('advisors-usage', $params);
        $listData = json_decode($this->client->getResponse()->getContent());
        $this->assertResponseIsSuccessful();
        $this->assertGreaterThanOrEqual(0, $listData->totalResults);

        // Reversed dates
        $params = ['startDate' => '2021-08-07 06:04:41', 'endDate' => '2019-02-20 06:04:41'];
        $this->requestActionNormalized('advisors-usage', $params);
        $listData = json_decode($this->client->getResponse()->getContent());
        $this->assertResponseIsSuccessful();
        $this->assertGreaterThanOrEqual(0, $listData->totalResults);
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

        // Give date range
        $params = ['startDate' => '2019-02-20 06:04:41', 'endDate' => '2021-08-07 06:04:41'];
        $this->requestActionNormalized('technicians', $params);
        $listData = json_decode($this->client->getResponse()->getContent());
        $this->assertResponseIsSuccessful();
        $this->assertGreaterThanOrEqual(0, $listData->totalResults);

        // Reversed dates
        $params = ['startDate' => '2021-08-07 06:04:41', 'endDate' => '2019-02-20 06:04:41'];
        $this->requestActionNormalized('technicians', $params);
        $listData = json_decode($this->client->getResponse()->getContent());
        $this->assertResponseIsSuccessful();
        $this->assertGreaterThanOrEqual(0, $listData->totalResults);
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

        // Give date range
        $params = ['startDate' => '2019-02-20 06:04:41', 'endDate' => '2021-08-07 06:04:41'];
        $this->requestActionNormalized('customer-engagements', $params);
        $listData = json_decode($this->client->getResponse()->getContent());
        $this->assertResponseIsSuccessful();
        $this->assertGreaterThanOrEqual(0, $listData->totalResults);

        // Reversed dates
        $params = ['startDate' => '2021-08-07 06:04:41', 'endDate' => '2019-02-20 06:04:41'];
        $this->requestActionNormalized('customer-engagements', $params);
        $listData = json_decode($this->client->getResponse()->getContent());
        $this->assertResponseIsSuccessful();
        $this->assertGreaterThanOrEqual(0, $listData->totalResults);

        // Wrong date format
        $params = ['startDate' => '2021-08-07 06-04-41', 'endDate' => '2019-02-20 06:04:41'];
        $this->requestActionNormalized('customer-engagements', $params);
        $this->assertEquals(Response::HTTP_INTERNAL_SERVER_ERROR, $this->client->getResponse()->getStatusCode());
    }

    public function testTrend()
    {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');

            return;
        }

        // Ok
        $this->requestActionNormalized('trend');
        $this->assertResponseIsSuccessful();

        // Give date range
        $params = ['startDate' => '2019-02-20 06:04:41', 'endDate' => '2021-08-07 06:04:41'];
        $this->requestActionNormalized('trend', $params);
        $listData = json_decode($this->client->getResponse()->getContent());
        $this->assertResponseIsSuccessful();
        $this->assertGreaterThanOrEqual(0, $listData->totalRepairOrders);
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

        // Give date range
        $params = ['startDate' => '2019-02-20 06:04:41', 'endDate' => '2021-08-07 06:04:41'];
        $this->requestActionNormalized('mpi', $params);
        $listData = json_decode($this->client->getResponse()->getContent());
        $this->assertResponseIsSuccessful();
        $this->assertGreaterThanOrEqual(0, $listData->totalResults);
    }

    public function testIPay()
    {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');

            return;
        }

        // Ok
        $this->requestActionNormalized('ipay');
        $this->assertResponseIsSuccessful();

        // Give date range
        $params = ['startDate' => '2019-02-20 06:04:41', 'endDate' => '2021-08-07 06:04:41'];
        $this->requestActionNormalized('ipay', $params);
        $listData = json_decode($this->client->getResponse()->getContent());
        $this->assertResponseIsSuccessful();
        $this->assertGreaterThanOrEqual(0, $listData->totalResults);

        // Get customer name from db and test, e.g. "Dimitri Simonis" for searchTerm
        $rop = $this->entityManager->getRepository(RepairOrderPayment::class)
                                  ->createQueryBuilder('rop')
                                  ->where('rop.amount IS NOT NULL')
                                  ->andWhere('rop.refundedAmount IS NOT NULL')
                                  ->andWhere('rop.deleted = 0')
                                  ->setMaxResults(1)
                                  ->getQuery()
                                  ->getOneOrNullResult();
        if (!$rop) {
            return;
        }
        $ro = $rop->getRepairOrder();
        if (!$ro) {
            return;
        }
        $customer = $ro->getPrimaryCustomer();
        if (!$customer) {
            return;
        }
        $customerName = $customer->getName();
        if (!$customerName) {
            return;
        }

        $params = ['searchTerm' => $customerName];
        $this->requestActionNormalized('ipay', $params);
        $listData = json_decode($this->client->getResponse()->getContent());
        $this->assertResponseIsSuccessful();
        $this->assertGreaterThanOrEqual(0, $listData->totalResults);
    }

    private function requestActionNormalized($url, $params = null)
    {
        $url = '/api/reporting/'.$url;
        if ($params) {
            $keys = array_keys($params);
            foreach ($keys as $key => $value) {
                if (0 === $key) {
                    $url = $url.'?'.$value.'='.$params[$value];
                } else {
                    $url = $url.'&'.$value.'='.$params[$value];
                }
            }
        }

        $crawler = $this->client->request('GET', $url, [], [], [
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
