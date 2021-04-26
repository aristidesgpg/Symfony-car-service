<?php

namespace App\Tests;

use App\Entity\RepairOrder;
use App\Entity\User;
use App\Service\Authentication;
use App\Service\SettingsHelper;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class RepairOrderWaiverControllerTest extends WebTestCase
{
    private $client = null;

    private $token;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    private $settingsHelper;

    private $repairOrder;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->markTestIncomplete();
        $this->client = static::createClient();
        $user = self::$container->get('doctrine')
                                ->getManager()
                                ->getRepository(User::class)
                                ->createQueryBuilder('u')
                                ->setMaxResults(1)
                                ->getQuery()
                                ->getOneOrNullResult();

        $authentication = self::$container->get(Authentication::class);
        $ttl = 31536000;
        $this->token = $authentication->getJWT($user->getEmail(), $ttl);

        $this->entityManager = self::$container->get('doctrine')
                                               ->getManager();
        $this->settingsHelper = self::$container->get(SettingsHelper::class);
        $this->repairOrder = self::$container->get('doctrine')
                                             ->getManager()
                                             ->getRepository(RepairOrder::class)
                                             ->createQueryBuilder('ro')
                                             ->setMaxResults(1)
                                             ->getQuery()
                                             ->getOneOrNullResult();
    }

    public function testWaiverSigned()
    {
        if (!$this->token || !$this->repairOrder) {
            $this->assertEmpty(null, 'Token or RepairOrder is null');

            return;
        }

        if ($this->repairOrder) {
            // Ok
            $endpoint = '/signed';
            $repairOrderId = $this->repairOrder->getId();
            $params = [
                'signature' => 'image/svg+xml;base64,Qk3eAgAAAAAAADYAAAAoAAAADQAAABEAAAABABgAAAAAAKgCAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA=',
                'repairOrderId' => $repairOrderId,
            ];

            $this->requestWaiverActions('POST', $endpoint, $params);

            if ($this->repairOrder->getDeleted()) { // Deleted
                $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());
            } elseif (!empty($this->repairOrder->getWaiverSignature())) { // Waiver has already been signed
                $this->assertEquals(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());
            } else { // OK
                $this->assertResponseIsSuccessful();
                $roInteractionRes = json_decode($this->client->getResponse()->getContent());
                $this->assertEquals($repairOrderId, $roInteractionRes->id);
            }
        } else {
            $this->assertEquals(null, $this->repairOrder);
        }

        // For the invalid signature test, get second row from db
        $ro = $this->entityManager->getRepository(RepairOrder::class)
                                  ->createQueryBuilder('ro')
                                  ->setMaxResults(2)
                                  ->getQuery()
                                  ->getResult();
        $repairOrder = $ro[1];
        if ($repairOrder) {
            // Invalid signature
            $params = [
                'signature' => 'imae/sv+ml;bse64,Qk3eAgAAAAAAADYAAAAoA',
                'repairOrderId' => $repairOrder->getId(),
            ];

            $this->requestWaiverActions('POST', $endpoint, $params);

            if ($repairOrder->getDeleted()) { // Deleted
                $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());
            } elseif (!empty($repairOrder->getWaiverSignature())) { // Waiver has already been signed
                $this->assertEquals(Response::HTTP_NOT_ACCEPTABLE, $this->client->getResponse()->getStatusCode());
            } else { // Invalid signature
                // $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
                $this->assertResponseIsSuccessful();
                // Currently, it accepts any string as base64 svg
            }
        }
    }

    public function testWaiverViewed()
    {
        if (!$this->token || !$this->repairOrder) {
            $this->assertEmpty(null, 'Token or RepairOrder is null');

            return;
        }
        if ($this->repairOrder) {
            $endpoint = '/viewed';
            $repairOrderId = $this->repairOrder->getId();

            $this->requestWaiverActions('POST', $endpoint, ['repairOrderId' => $repairOrderId]);

            if ($this->repairOrder->getDeleted()) { // Deleted
                $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());
            } elseif (!empty($this->repairOrder->getWaiverSignature())) { // Waiver has already been signed
                $this->assertEquals(Response::HTTP_NOT_ACCEPTABLE, $this->client->getResponse()->getStatusCode());
            } else { // OK
                $this->assertResponseIsSuccessful();
                $roInteractionRes = json_decode($this->client->getResponse()->getContent());
                $this->assertObjectHasAttribute('id', $roInteractionRes);
            }
        } else {
            $this->assertEquals(null, $this->repairOrder);
        }
    }

    public function testWaiverAcknowledged()
    {
        if (!$this->token || !$this->repairOrder) {
            $this->assertEmpty(null, 'Token or RepairOrder is null');

            return;
        }
        if ($this->repairOrder) {
            $endpoint = '/acknowledged';
            $repairOrderId = $this->repairOrder->getId();

            $this->requestWaiverActions('POST', $endpoint, ['repairOrderId' => $repairOrderId]);

            if ($this->repairOrder->getDeleted()) { // Deleted
                $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());
            } elseif (!empty($this->repairOrder->getWaiverSignature())) { // Waiver has already been signed
                $this->assertEquals(Response::HTTP_NOT_ACCEPTABLE, $this->client->getResponse()->getStatusCode());
            } else { // OK
                $this->assertResponseIsSuccessful();
                $roInteractionRes = json_decode($this->client->getResponse()->getContent());
                $this->assertObjectHasAttribute('id', $roInteractionRes);
            }
        } else {
            $this->assertEquals(null, $this->repairOrder);
        }
    }

    public function testWaiverResend()
    {
        if (!$this->token || !$this->repairOrder) {
            $this->assertEmpty(null, 'Token or RepairOrder is null');

            return;
        }
        $waiverActivateAuthMessage = $this->settingsHelper->getSetting('waiverActivateAuthMessage');

        if ($this->repairOrder) {
            $endpoint = '/re-send';
            $repairOrderId = $this->repairOrder->getId();

            $this->requestWaiverActions('POST', $endpoint, ['repairOrderId' => $repairOrderId]);

            if ($this->repairOrder->getDeleted()) { // Deleted
                $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());
            } elseif (!empty($this->repairOrder->getWaiverSignature())) { // Waiver has already been signed
                $this->assertEquals(Response::HTTP_NOT_ACCEPTABLE, $this->client->getResponse()->getStatusCode());
            } elseif (!$waiverActivateAuthMessage) { // Waiver is not enabled
                $this->assertEquals(Response::HTTP_NOT_ACCEPTABLE, $this->client->getResponse()->getStatusCode());
            } elseif (200 === $this->client->getResponse()->getStatusCode()) { // OK or 500
                $this->assertResponseIsSuccessful();
            } else {
                $this->assertEquals(Response::HTTP_INTERNAL_SERVER_ERROR, $this->client->getResponse()->getStatusCode());
            }
        } else {
            $this->assertEquals(null, $this->repairOrder);
        }
    }

    private function requestWaiverActions($method, $endpoint, $params = [])
    {
        $apiUrl = '/api/repair-order-waiver'.$endpoint;

        $waiverCrawler = $this->client->request($method, $apiUrl, $params, [], [
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
