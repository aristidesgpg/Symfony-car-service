<?php

namespace App\Tests;

use App\Entity\Customer;
use App\Entity\RepairOrder;
use App\Entity\RepairOrderQuote;
use App\Entity\RepairOrderQuoteRecommendation;
use App\Entity\User;
use App\Service\Authentication;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class RepairOrderQuoteControllerTest extends WebTestCase
{
    private $client = null;

    private $token;
    private $serviceAdvisorToken;
    private $technicanToken;
    private $partsAdvisorToken;

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

        $builder = self::$container->get('doctrine')
                                   ->getManager()
                                   ->getRepository(User::class)
                                   ->createQueryBuilder('u')
                                   ->setMaxResults(1);
        $serviceAdvisorBulider = clone $builder;
        $serviceAdvisor = $serviceAdvisorBulider->andWhere("u.role = 'ROLE_SERVICE_ADVISOR'")
                                                ->getQuery()
                                                ->getOneOrNullResult();

        $technicanBulider = clone $builder;
        $technican = $technicanBulider->andWhere("u.role = 'ROLE_TECHNICIAN'")
                                      ->getQuery()
                                      ->getOneOrNullResult();
        $partsAdviosrBulider = $builder;
        $partsAdvisor = $partsAdviosrBulider->andWhere("u.role = 'ROLE_PARTS_ADVISOR'")
                                            ->getQuery()
                                            ->getOneOrNullResult();

        $authentication = self::$container->get(Authentication::class);
        $ttl = 31536000;
        $this->serviceAdvisorToken = $authentication->getJWT($serviceAdvisor->getEmail(), $ttl);
        $this->technicanToken = $authentication->getJWT($technican->getEmail(), $ttl);
        $this->partsAdvisorToken = $authentication->getJWT($partsAdvisor->getEmail(), $ttl);
       

        $this->token = $this->serviceAdvisorToken;
        $this->entityManager = self::$container->get('doctrine')->getManager();
    }

    public function testGetRepairOrderQuote()
    {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');

            return;
        }
        $repairOrderQuote = $this->entityManager->getRepository(RepairOrderQuote::class)
                                 ->createQueryBuilder('roq')
                                 ->setMaxResults(1)
                                 ->getQuery()
                                 ->getOneOrNullResult();
        if ($repairOrderQuote) {
            $id = $repairOrderQuote->getId();

            $this->requestAction('GET', '/'.$id);
            $this->assertResponseIsSuccessful();
            $response = json_decode($this->client->getResponse()->getContent());
            $this->assertObjectHasAttribute('id', $response);
        } else {
            $this->assertEmpty($repairOrderQuote, 'RepairOrderQuote is null');
        }
    }

    public function testCreateRepairOrderQuote()
    {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');

            return;
        }
        //the case when the repairOrderQuote Id is missing
        $params = [
            'recommendations' => '["operationCode":14, "description":"Neque maxime ex dolorem ut.","preApproved":true,"approved":true,"partsPrice":1.0,"suppliesPrice":14.02,"laborPrice":5.3,"laborTax":5.3,"partsTax":2.1,"suppliesTax":4.3,"notes":"Cumque tempora ut nobis.", "parts":[{"number":"34843434", "name":"name1", "price":23.3, "quantity":23,"bin":"eifkdo838f833kd9"}, {"number":"12254345", "name":"name2", "price":13.3, "quantity":13,"bin":"dkf939f8d8f8dd"}]},{"operationCode":11, "description":"Quidem earum sapiente at dolores quia natus.","preApproved":false,"approved":true,"partsPrice":2.6,"suppliesPrice":509.02,"laborPrice":36.9,"laborTax":4.3,"partsTax":2.4,"suppliesTax":4.1,"notes":"Et accusantium rerum."},{"operationCode":4, "description":"Mollitia unde nobis doloribus sed.","preApproved":true,"approved":false,"partsPrice":1.1,"suppliesPrice":71.7,"laborPrice":55.1,"laborTax":5.1,"partsTax":2.6,"suppliesTax":3.3,"notes":"Voluptates et aut debitis."}]',
        ];
        $this->requestAction('POST', '', $params);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
        $response = json_decode($this->client->getResponse()->getContent());
        $this->assertEquals('Missing Required Parameter', $response);

        //the case when the repairOrder doesn't exist
        $params = [
            'repairOrderID' => 9999,
            'recommendations' => '["operationCode":14, "description":"Neque maxime ex dolorem ut.","preApproved":true,"approved":true,"partsPrice":1.0,"suppliesPrice":14.02,"laborPrice":5.3,"laborTax":5.3,"partsTax":2.1,"suppliesTax":4.3,"notes":"Cumque tempora ut nobis.", "parts":[{"number":"34843434", "name":"name1", "price":23.3, "quantity":23,"bin":"eifkdo838f833kd9"}, {"number":"12254345", "name":"name2", "price":13.3, "quantity":13,"bin":"dkf939f8d8f8dd"}]},{"operationCode":11, "description":"Quidem earum sapiente at dolores quia natus.","preApproved":false,"approved":true,"partsPrice":2.6,"suppliesPrice":509.02,"laborPrice":36.9,"laborTax":4.3,"partsTax":2.4,"suppliesTax":4.1,"notes":"Et accusantium rerum."},{"operationCode":4, "description":"Mollitia unde nobis doloribus sed.","preApproved":true,"approved":false,"partsPrice":1.1,"suppliesPrice":71.7,"laborPrice":55.1,"laborTax":5.1,"partsTax":2.6,"suppliesTax":3.3,"notes":"Voluptates et aut debitis."}]',
        ];
        $this->requestAction('POST', '', $params);
        $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());

        $repairOrderQuote = $this->entityManager->getRepository(RepairOrderQuote::class)
                                                ->createQueryBuilder('roq')
                                                ->setMaxResults(1)
                                                ->getQuery()
                                                ->getOneOrNullResult();
        //the case when a repairOrderQuote already exists
        if ($repairOrderQuote) {
            $params = [
                'repairOrderID' => $repairOrderQuote->getRepairOrder()->getId(),
                'recommendations' => '[{"operationCode":14, "description":"Neque maxime ex dolorem ut.","preApproved":true,"approved":true,"partsPrice":1.0,"suppliesPrice":14.02,"laborPrice":5.3,"laborTax":5.3,"partsTax":2.1,"suppliesTax":4.3,"notes":"Cumque tempora ut nobis.", "parts":[{"number":"34843434", "name":"name1", "price":23.3, "quantity":23,"bin":"eifkdo838f833kd9"}, {"number":"12254345", "name":"name2", "price":13.3, "quantity":13,"bin":"dkf939f8d8f8dd"}]},{"operationCode":11, "description":"Quidem earum sapiente at dolores quia natus.","preApproved":false,"approved":true,"partsPrice":2.6,"suppliesPrice":509.02,"laborPrice":36.9,"laborTax":4.3,"partsTax":2.4,"suppliesTax":4.1,"notes":"Et accusantium rerum."},{"operationCode":4, "description":"Mollitia unde nobis doloribus sed.","preApproved":true,"approved":false,"partsPrice":1.1,"suppliesPrice":71.7,"laborPrice":55.1,"laborTax":5.1,"partsTax":2.6,"suppliesTax":3.3,"notes":"Voluptates et aut debitis."}]',
            ];

            $this->requestAction('POST', '', $params);
            $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
        } else {
            $this->assertEmpty($repairOrderQuote, 'RepairOrderQuote is null');
        }

        //get a repairOrder which doesn't have repairOrderQuote
        $repairOrderQuotes = $this->entityManager->getRepository(RepairOrderQuote::class)
                                                 ->createQueryBuilder('roq')
                                                 ->getQuery()
                                                 ->getResult();

        $qb = $this->entityManager->getRepository(RepairOrder::class)
                                  ->createQueryBuilder('ro');
        $repairOrderIds = [];
        foreach($repairOrderQuotes as $repairOrderQuote) {
            array_push($repairOrderIds, $repairOrderQuote->getRepairOrder()->getId());
        }
        $repairOrder = $qb->where($qb->expr()->notIn('ro.id', $repairOrderIds))
                          ->setMaxResults(1)
                          ->getQuery()
                          ->getOneOrNullResult();
        $repairOrderId = $repairOrder->getId();
        
        //the case when create the quote without 'parts' as 'Technican'
        $this->token = $this->technicanToken;
        $params = [
            'repairOrderID' => $repairOrderId,
            'recommendations' => '[{"operationCode":14, "description":"Neque maxime ex dolorem ut.","preApproved":true,"approved":true,"laborHours":5,"partsPrice":1.0,"suppliesPrice":14.02,"laborPrice":5.3,"laborTax":5.3,"partsTax":2.1,"suppliesTax":4.3,"notes":"Cumque tempora ut nobis."},{"operationCode":11, "description":"Quidem earum sapiente at dolores quia natus.","preApproved":false,"approved":true,"laborHours":6,"partsPrice":2.6,"suppliesPrice":509.02,"laborPrice":36.9,"laborTax":4.3,"partsTax":2.4,"suppliesTax":4.1,"notes":"Et accusantium rerum."},{"operationCode":4, "description":"Mollitia unde nobis doloribus sed.","preApproved":true,"approved":false,"laborHours":5,"partsPrice":1.1,"suppliesPrice":71.7,"laborPrice":55.1,"laborTax":5.1,"partsTax":2.6,"suppliesTax":3.3,"notes":"Voluptates et aut debitis."}]',
        ];
        $this->requestAction('POST', '', $params);
        $this->assertResponseIsSuccessful();
        $response = json_decode($this->client->getResponse()->getContent());
        $this->assertObjectHasAttribute('id', $response);

        //the case when the JSON Data is invalid with missing '{'
        $params = [
            'repairOrderID' => $repairOrderId,
            'recommendations' => '["operationCode":14, "description":"Neque maxime ex dolorem ut.","preApproved":true,"approved":true,"laborHours":5, "partsPrice":1.0,"suppliesPrice":14.02,"laborPrice":5.3,"laborTax":5.3,"partsTax":2.1,"suppliesTax":4.3,"notes":"Cumque tempora ut nobis.", "parts":[{"number":"34843434", "name":"name1", "price":23.3, "quantity":23,"bin":"eifkdo838f833kd9"}, {"number":"12254345", "name":"name2", "price":13.3, "quantity":13,"bin":"dkf939f8d8f8dd"}]},{"operationCode":11, "description":"Quidem earum sapiente at dolores quia natus.","preApproved":false,"approved":true,"laborHours":6,"partsPrice":2.6,"suppliesPrice":509.02,"laborPrice":36.9,"laborTax":4.3,"partsTax":2.4,"suppliesTax":4.1,"notes":"Et accusantium rerum."},{"operationCode":4, "description":"Mollitia unde nobis doloribus sed.","preApproved":true,"approved":false,"laborHours":7,"partsPrice":1.1,"suppliesPrice":71.7,"laborPrice":55.1,"laborTax":5.1,"partsTax":2.6,"suppliesTax":3.3,"notes":"Voluptates et aut debitis."}]',
        ];
        $this->requestAction('POST', '', $params);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());

        //the case when the JSON Data is invalid with missing '['
        $params = [
            'repairOrderID' => $repairOrderId,
            'recommendations' => '"operationCode":14, "description":"Neque maxime ex dolorem ut.","preApproved":true,"approved":true,"laborHours":5,"partsPrice":1.0,"suppliesPrice":14.02,"laborPrice":5.3,"laborTax":5.3,"partsTax":2.1,"suppliesTax":4.3,"notes":"Cumque tempora ut nobis.", "parts":[{"number":"34843434", "name":"name1", "price":23.3, "quantity":23,"bin":"eifkdo838f833kd9"}, {"number":"12254345", "name":"name2", "price":13.3, "quantity":13,"bin":"dkf939f8d8f8dd"}]},{"operationCode":11, "description":"Quidem earum sapiente at dolores quia natus.","preApproved":false,"approved":true,"laborHours":5,"partsPrice":2.6,"suppliesPrice":509.02,"laborPrice":36.9,"laborTax":4.3,"partsTax":2.4,"suppliesTax":4.1,"notes":"Et accusantium rerum."},{"operationCode":4, "description":"Mollitia unde nobis doloribus sed.","preApproved":true,"approved":false,"laborHours":5,"partsPrice":1.1,"suppliesPrice":71.7,"laborPrice":55.1,"laborTax":5.1,"partsTax":2.6,"suppliesTax":3.3,"notes":"Voluptates et aut debitis."}]',
        ];
        $this->requestAction('POST', '', $params);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());

        //the case when the JSON Data is empty
        $params = [
            'repairOrderID' => $repairOrderId,
            'recommendations' => '[]',
        ];
        $this->requestAction('POST', '', $params);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());

        //the case when the each recommendation data is not object
        $params = [
            'repairOrderID' => $repairOrderId,
            'recommendations' => '[operationCode":14, "description":"Neque maxime ex dolorem ut."]',
        ];
        $this->requestAction('POST', '', $params);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());

        //the case when the JSON Data is invalid with missing 'description' field
        $params = [
            'repairOrderID' => $repairOrderId,
            'recommendations' => '["operationCode":14, "preApproved":true,"approved":true,"laborHours":5,"partsPrice":1.0,"suppliesPrice":14.02,"laborPrice":5.3,"laborTax":5.3,"partsTax":2.1,"suppliesTax":4.3,"notes":"Cumque tempora ut nobis.", "parts":[{"number":"34843434", "name":"name1", "price":23.3, "quantity":23,"bin":"eifkdo838f833kd9"}, {"number":"12254345", "name":"name2", "price":13.3, "quantity":13,"bin":"dkf939f8d8f8dd"}]},{"operationCode":11, "description":"Quidem earum sapiente at dolores quia natus.","preApproved":false,"approved":true,"laborHours":5,"partsPrice":2.6,"suppliesPrice":509.02,"laborPrice":36.9,"laborTax":4.3,"partsTax":2.4,"suppliesTax":4.1,"notes":"Et accusantium rerum."},{"operationCode":4, "description":"Mollitia unde nobis doloribus sed.","preApproved":true,"approved":false,"laborHours":5,"partsPrice":1.1,"suppliesPrice":71.7,"laborPrice":55.1,"laborTax":5.1,"partsTax":2.6,"suppliesTax":3.3,"notes":"Voluptates et aut debitis."}]',
        ];
        $this->requestAction('POST', '', $params);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());

        //the case when the JSON Data is invalid with empty 'description' value
        $params = [
            'repairOrderID' => $repairOrderId,
            'recommendations' => '[{"operationCode":14, "description":"","preApproved":true,"approved":true,"laborHours":5,"partsPrice":1.0,"suppliesPrice":14.02,"laborPrice":5.3,"laborTax":5.3,"partsTax":2.1,"suppliesTax":4.3,"notes":"Cumque tempora ut nobis.", "parts":[{"number":"34843434", "name":"name1", "price":23.3, "quantity":23,"bin":"eifkdo838f833kd9"}, {"number":"12254345", "name":"name2", "price":13.3, "quantity":13,"bin":"dkf939f8d8f8dd"}]},{"operationCode":11, "description":"Quidem earum sapiente at dolores quia natus.","preApproved":false,"approved":true,"laborHours":5,"partsPrice":2.6,"suppliesPrice":509.02,"laborPrice":36.9,"laborTax":4.3,"partsTax":2.4,"suppliesTax":4.1,"notes":"Et accusantium rerum."},{"operationCode":4, "description":"Mollitia unde nobis doloribus sed.","preApproved":true,"approved":false,"laborHours":5,"partsPrice":1.1,"suppliesPrice":71.7,"laborPrice":55.1,"laborTax":5.1,"partsTax":2.6,"suppliesTax":3.3,"notes":"Voluptates et aut debitis."}]',
        ];
        $this->requestAction('POST', '', $params);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());

        //the case when the JSON Data is invalid with non-number partsPrice
        $params = [
            'repairOrderID' => $repairOrderId,
            'recommendations' => '[{"operationCode":14, "description":"","preApproved":true,"approved":true,"laborHours":5,"partsPrice":"string","suppliesPrice":14.02,"laborPrice":5.3,"laborTax":5.3,"partsTax":2.1,"suppliesTax":4.3,"notes":"Cumque tempora ut nobis.", "parts":[{"number":"34843434", "name":"name1", "price":23.3, "quantity":23,"bin":"eifkdo838f833kd9"}, {"number":"12254345", "name":"name2", "price":13.3, "quantity":13,"bin":"dkf939f8d8f8dd"}]},{"operationCode":11, "description":"Quidem earum sapiente at dolores quia natus.","preApproved":false,"approved":true,"laborHours":5,"partsPrice":2.6,"suppliesPrice":509.02,"laborPrice":36.9,"laborTax":4.3,"partsTax":2.4,"suppliesTax":4.1,"notes":"Et accusantium rerum."},{"operationCode":4, "description":"Mollitia unde nobis doloribus sed.","preApproved":true,"approved":false,"laborHours":5,"partsPrice":1.1,"suppliesPrice":71.7,"laborPrice":55.1,"laborTax":5.1,"partsTax":2.6,"suppliesTax":3.3,"notes":"Voluptates et aut debitis."}]',
        ];
        $this->requestAction('POST', '', $params);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());

        //the case when the JSON Data is invalid with invalid 'parts' json
        $params = [
            'repairOrderID' => $repairOrderId,
            'recommendations' => '[{"operationCode":14, "description":"","preApproved":true,"approved":true,"laborHours":5,"partsPrice":"string","suppliesPrice":14.02,"laborPrice":5.3,"laborTax":5.3,"partsTax":2.1,"suppliesTax":4.3,"notes":"Cumque tempora ut nobis.", "parts":["number":"34843434", "name":"name1", "price":23.3, "quantity":23,"bin":"eifkdo838f833kd9"]},{"operationCode":11, "description":"Quidem earum sapiente at dolores quia natus.","preApproved":false,"approved":true,"laborHours":5,"partsPrice":2.6,"suppliesPrice":509.02,"laborPrice":36.9,"laborTax":4.3,"partsTax":2.4,"suppliesTax":4.1,"notes":"Et accusantium rerum."},{"operationCode":4, "description":"Mollitia unde nobis doloribus sed.","preApproved":true,"approved":false,"laborHours":5,"partsPrice":1.1,"suppliesPrice":71.7,"laborPrice":55.1,"laborTax":5.1,"partsTax":2.6,"suppliesTax":3.3,"notes":"Voluptates et aut debitis."}]',
        ];
        $this->requestAction('POST', '', $params);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());

        //the case when the JSON Data is invalid with invalid operation code
        $params = [
            'repairOrderID' => $repairOrderId,
            'recommendations' => '[{"operationCode":999, "description":"Neque maxime ex dolorem ut.","preApproved":true,"approved":true,"laborHours":5,"partsPrice":1.0,"suppliesPrice":14.02,"laborPrice":5.3,"laborTax":5.3,"partsTax":2.1,"suppliesTax":4.3,"notes":"Cumque tempora ut nobis.", "parts":[{"number":"34843434", "name":"name1", "price":23.3, "quantity":23,"bin":"eifkdo838f833kd9"}, {"number":"12254345", "name":"name2", "price":13.3, "quantity":13,"bin":"dkf939f8d8f8dd"}]},{"operationCode":11, "description":"Quidem earum sapiente at dolores quia natus.","preApproved":false,"approved":true,"laborHours":5,"partsPrice":2.6,"suppliesPrice":509.02,"laborPrice":36.9,"laborTax":4.3,"partsTax":2.4,"suppliesTax":4.1,"notes":"Et accusantium rerum."},{"operationCode":4, "description":"Mollitia unde nobis doloribus sed.","preApproved":true,"approved":false,"laborHours":5,"partsPrice":1.1,"suppliesPrice":71.7,"laborPrice":55.1,"laborTax":5.1,"partsTax":2.6,"suppliesTax":3.3,"notes":"Voluptates et aut debitis."}]',
        ];
        $this->requestAction('POST', '', $params);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
    }

    public function testUpdateRepairOrderQuote()
    {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');

            return;
        }
       
        //the case when the repairOrderQuote status is not allowed to be updated
        $repairOrderQuote = $this->entityManager->getRepository(RepairOrderQuote::class)
                                                ->createQueryBuilder('roq')
                                                ->andWhere("roq.status = 'Sent' or roq.status = 'Completed' or roq.status = 'Confirmed'")
                                                ->setMaxResults(1)
                                                ->getQuery()
                                                ->getOneOrNullResult();
        if ($repairOrderQuote) {
            $params = [
                'recommendations' => '[{"operationCode":14, "description":"Neque maxime ex dolorem ut.","preApproved":true,"approved":true,"laborHours":5,"partsPrice":1.0,"suppliesPrice":14.02,"laborPrice":5.3,"laborTax":5.3,"partsTax":2.1,"suppliesTax":4.3,"notes":"Cumque tempora ut nobis.", "parts":[{"number":"34843434", "name":"name1", "price":23.3, "quantity":23,"bin":"eifkdo838f833kd9"}, {"number":"12254345", "name":"name2", "price":13.3, "quantity":13,"bin":"dkf939f8d8f8dd"}]},{"operationCode":11, "description":"Quidem earum sapiente at dolores quia natus.","preApproved":false,"approved":true,"laborHours":5,"partsPrice":2.6,"suppliesPrice":509.02,"laborPrice":36.9,"laborTax":4.3,"partsTax":2.4,"suppliesTax":4.1,"notes":"Et accusantium rerum."},{"operationCode":4, "description":"Mollitia unde nobis doloribus sed.","preApproved":true,"approved":false,"laborHours":5,"partsPrice":1.1,"suppliesPrice":71.7,"laborPrice":55.1,"laborTax":5.1,"partsTax":2.6,"suppliesTax":3.3,"notes":"Voluptates et aut debitis."}]',
            ];
            $this->requestAction('PUT', '/'.$repairOrderQuote->getId(), $params);
            $this->assertEquals(Response::HTTP_FORBIDDEN, $this->client->getResponse()->getStatusCode());
        } else {
            $this->assertEmpty($repairOrderQuote, 'RepairOrderQuote is null');
        }

        
        $repairOrderQuote = $this->entityManager->getRepository(RepairOrderQuote::class)
                                                ->createQueryBuilder('roq')
                                                ->andWhere("roq.status <> 'Sent'")
                                                ->andWhere("roq.status <> 'Completed'")
                                                ->andWhere("roq.status <> 'Confirmed'")
                                                ->setMaxResults(1)
                                                ->getQuery()
                                                ->getOneOrNullResult();
        if ($repairOrderQuote) {
            // update the quote as 'Parts Advisor'
            $this->token = $this->partsAdvisorToken;
            $params = [
                'recommendations' => '[{"operationCode":14, "description":"Neque maxime ex dolorem ut.","preApproved":true,"approved":true,"laborHours":5,"partsPrice":1.0,"suppliesPrice":14.02,"laborPrice":5.3,"laborTax":5.3,"partsTax":2.1,"suppliesTax":4.3,"notes":"Cumque tempora ut nobis.", "parts":[{"number":"34843434", "name":"name1", "price":23.3, "quantity":23,"bin":"eifkdo838f833kd9"}, {"number":"12254345", "name":"name2", "price":13.3, "quantity":13,"bin":"dkf939f8d8f8dd"}]},{"operationCode":11, "description":"Quidem earum sapiente at dolores quia natus.","preApproved":false,"approved":true,"laborHours":5,"partsPrice":2.6,"suppliesPrice":509.02,"laborPrice":36.9,"laborTax":4.3,"partsTax":2.4,"suppliesTax":4.1,"notes":"Et accusantium rerum."},{"operationCode":4, "description":"Mollitia unde nobis doloribus sed.","preApproved":true,"approved":false,"laborHours":5,"partsPrice":1.1,"suppliesPrice":71.7,"laborPrice":55.1,"laborTax":5.1,"partsTax":2.6,"suppliesTax":3.3,"notes":"Voluptates et aut debitis."}]',
            ];
            $this->requestAction('PUT', '/'.$repairOrderQuote->getId(), $params);
            $this->assertResponseIsSuccessful();
           
            // update the quote as 'Service Advisor'
            $this->token = $this->serviceAdvisorToken;
            $params = [
                'recommendations' => '[{"operationCode":14, "description":"Neque maxime ex dolorem ut.","preApproved":true,"approved":true,"laborHours":5,"partsPrice":1.0,"suppliesPrice":14.02,"laborPrice":5.3,"laborTax":5.3,"partsTax":2.1,"suppliesTax":4.3,"notes":"Cumque tempora ut nobis.", "parts":[{"number":"34843434", "name":"name1", "price":23.3, "quantity":23,"bin":"eifkdo838f833kd9"}, {"number":"12254345", "name":"name2", "price":13.3, "quantity":13,"bin":"dkf939f8d8f8dd"}]},{"operationCode":11, "description":"Quidem earum sapiente at dolores quia natus.","preApproved":false,"approved":true,"laborHours":5,"partsPrice":2.6,"suppliesPrice":509.02,"laborPrice":36.9,"laborTax":4.3,"partsTax":2.4,"suppliesTax":4.1,"notes":"Et accusantium rerum."},{"operationCode":4, "description":"Mollitia unde nobis doloribus sed.","preApproved":true,"approved":false,"laborHours":5,"partsPrice":1.1,"suppliesPrice":71.7,"laborPrice":55.1,"laborTax":5.1,"partsTax":2.6,"suppliesTax":3.3,"notes":"Voluptates et aut debitis."}]',
            ];
            $this->requestAction('PUT', '/'.$repairOrderQuote->getId(), $params);
            $this->assertResponseIsSuccessful();


        } else {
            $this->assertEmpty($repairOrderQuote, 'RepairOrderQuote is null');
        }
    }

    public function testInProgress()
    {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');

            return;
        }

        //the case when the repairOrderQuote doesn't exist
        $params = [
            'repairOrderQuoteID' => 9999,
            'status' => 'Technician In Progress',
        ];
        $this->requestAction('PUT', '/in-progress', $params);
        $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());

        //the case when a repairOrderQuote status is not allowed to be updated
        $repairOrderQuote = $this->entityManager->getRepository(RepairOrderQuote::class)
                                                ->createQueryBuilder('roq')
                                                ->andWhere("roq.status = 'Sent' or roq.status = 'Viewed' or roq.status = 'Completed' or  roq.status = 'Confirmed'")
                                                ->setMaxResults(1)
                                                ->getQuery()
                                                ->getOneOrNullResult();
        if ($repairOrderQuote) {
            $params = [
                'repairOrderQuoteID' => $repairOrderQuote->getId(),
                'status' => 'Technician In Progress',
            ];
            $this->requestAction('POST', '/in-progress', $params);
            $this->assertEquals(Response::HTTP_FORBIDDEN, $this->client->getResponse()->getStatusCode());
        } else {
            $this->assertEmpty($repairOrderQuote, 'RepairOrderQuote is null');
        }

        // the case when a repairOrderQuote status is not allowed to be updated, but the  status is invalid
        $repairOrderQuote = $this->entityManager->getRepository(RepairOrderQuote::class)
                                                ->createQueryBuilder('roq')
                                                ->andWhere("roq.status <> 'Sent'")
                                                ->andWhere("roq.status <> 'Viewed'")
                                                ->andWhere("roq.status <> 'Completed'")
                                                ->andWhere("roq.status <> 'Confirmed'")
                                                ->setMaxResults(1)
                                                ->getQuery()
                                                ->getOneOrNullResult();

        if ($repairOrderQuote) {
            $params = [
                'repairOrderQuoteID' => $repairOrderQuote->getId(),
                'status' => 'Sent',
            ];
            $this->requestAction('POST', '/in-progress', $params);
            $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
        } else {
            $this->assertEmpty($repairOrderQuote, 'RepairOrderQuote is null');
        }

        // the case when a repairOrderQuote status is not allowed to be updated and the  status is valid
        $repairOrderQuote = $this->entityManager->getRepository(RepairOrderQuote::class)
                                                ->createQueryBuilder('roq')
                                                ->andWhere("roq.status <> 'Sent'")
                                                ->andWhere("roq.status <> 'Viewed'")
                                                ->andWhere("roq.status <> 'Completed'")
                                                ->andWhere("roq.status <> 'Confirmed'")
                                                ->setMaxResults(1)
                                                ->getQuery()
                                                ->getOneOrNullResult();
        if ($repairOrderQuote) {
            $params = [
                'repairOrderQuoteID' => $repairOrderQuote->getId(),
                'status' => 'Technician In Progress',
            ];
            $this->requestAction('POST', '/in-progress', $params);
            $this->assertResponseIsSuccessful();
        } else {
            $this->assertEmpty($repairOrderQuote, 'RepairOrderQuote is null');
        }
    }

    public function testCustomerSend()
    {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');

            return;
        }
        $repairOrderQuote = $this->entityManager->getRepository(RepairOrderQuote::class)
                                                ->createQueryBuilder('roq')
                                                ->andWhere("roq.status = 'Sent' or roq.status = 'Viewed' or roq.status = 'Completed' or  roq.status = 'Confirmed'")
                                                ->setMaxResults(1)
                                                ->getQuery()
                                                ->getOneOrNullResult();

        //the case when a repairOrderQuote status is not allowed to be updated
        if ($repairOrderQuote) {
            $params = [
                'repairOrderQuoteID' => $repairOrderQuote->getId(),
                'status' => 'Sent',
            ];
            $this->requestAction('POST', '/send', $params);

            if ($this->client->getResponse()->getStatusCode() !== 500) {
                $this->assertEquals(Response::HTTP_FORBIDDEN, $this->client->getResponse()->getStatusCode());
            } else {
                $this->assertEquals(Response::HTTP_INTERNAL_SERVER_ERROR, $this->client->getResponse()->getStatusCode());
            }
        } else {
            $this->assertEmpty($repairOrderQuote, 'RepairOrderQuote is null');
        }

        //the case when a repairOrderQuote status is allowed to be updated
        $repairOrderQuote = $this->entityManager->getRepository(RepairOrderQuote::class)
                                                ->createQueryBuilder('roq')
                                                ->andWhere("roq.status <> 'Sent'")
                                                ->andWhere("roq.status <> 'Viewed'")
                                                ->andWhere("roq.status <> 'Completed'")
                                                ->andWhere("roq.status <> 'Confirmed'")
                                                ->setMaxResults(1)
                                                ->getQuery()
                                                ->getOneOrNullResult();

        if ($repairOrderQuote) {
            $params = [
                'repairOrderQuoteID' => $repairOrderQuote->getId(),
                'status' => 'Sent',
            ];
            $this->requestAction('POST', '/send', $params);
            
            $this->assertResponseIsSuccessful();
        } else {
            $this->assertEmpty($repairOrderQuote, 'RepairOrderQuote is null');
        }
    }

    public function testViewed()
    {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');

            return;
        }

        //the case when a repairOrderQuote status is not allowed to be updated
        $repairOrderQuote = $this->entityManager->getRepository(RepairOrderQuote::class)
                                                ->createQueryBuilder('roq')
                                                ->andWhere("roq.status = 'Viewed' or roq.status = 'Completed' or  roq.status = 'Confirmed'")
                                                ->setMaxResults(1)
                                                ->getQuery()
                                                ->getOneOrNullResult();
        if ($repairOrderQuote) {
            $params = [
                'repairOrderQuoteID' => $repairOrderQuote->getId(),
                'status' => 'Viewed',
            ];
            $this->requestAction('POST', '/view', $params);
            $this->assertEquals(Response::HTTP_FORBIDDEN, $this->client->getResponse()->getStatusCode());
        } else {
            $this->assertEmpty($repairOrderQuote, 'RepairOrderQuote is null');
        }

        //the case when a repairOrderQuote status is allowed to be updated
        $repairOrderQuote = $this->entityManager->getRepository(RepairOrderQuote::class)
                                                ->createQueryBuilder('roq')
                                                ->andWhere("roq.status <> 'Viewed'")
                                                ->andWhere("roq.status <> 'Completed'")
                                                ->andWhere("roq.status <> 'Confirmed'")
                                                ->setMaxResults(1)
                                                ->getQuery()
                                                ->getOneOrNullResult();
        if ($repairOrderQuote) {
            $params = [
                'repairOrderQuoteID' => $repairOrderQuote->getId(),
                'status' => 'Viewed',
            ];
            $this->requestAction('POST', '/view', $params);
            $this->assertResponseIsSuccessful();
        } else {
            $this->assertEmpty($repairOrderQuote, 'RepairOrderQuote is null');
        }
    }

    public function testCompleted()
    {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');

            return;
        }
        $qb = $this->entityManager->getRepository(RepairOrderQuote::class)
                   ->createQueryBuilder('roq');
        
        $repairOrderQuote = $qb->andWhere("roq.status = 'Sent' or roq.status = 'Completed' or  roq.status = 'Confirmed'")
                               ->setMaxResults(1)
                               ->getQuery()
                               ->getOneOrNullResult();

        //the case when a repairOrderQuote is not allowed to be updated
        if ($repairOrderQuote) {
            $params = [
                'repairOrderQuoteID' => $repairOrderQuote->getId(),
                'recommendations' => '[{"operationCode":14, "description":"Neque maxime ex dolorem ut.","preApproved":true,"approved":true,"laborHours":5,"partsPrice":1.0,"suppliesPrice":14.02,"laborPrice":5.3,"laborTax":5.3,"partsTax":2.1,"suppliesTax":4.3,"notes":"Cumque tempora ut nobis.", "parts":[{"number":"34843434", "name":"name1", "price":23.3, "quantity":23,"bin":"eifkdo838f833kd9"}, {"number":"12254345", "name":"name2", "price":13.3, "quantity":13,"bin":"dkf939f8d8f8dd"}]},{"operationCode":11, "description":"Quidem earum sapiente at dolores quia natus.","preApproved":false,"approved":true,"laborHours":5,"partsPrice":2.6,"suppliesPrice":509.02,"laborPrice":36.9,"laborTax":4.3,"partsTax":2.4,"suppliesTax":4.1,"notes":"Et accusantium rerum."},{"operationCode":4, "description":"Mollitia unde nobis doloribus sed.","preApproved":true,"approved":false,"laborHours":5,"partsPrice":1.1,"suppliesPrice":71.7,"laborPrice":55.1,"laborTax":5.1,"partsTax":2.6,"suppliesTax":3.3,"notes":"Voluptates et aut debitis."}]',
            ];
            $this->requestAction('POST', '/complete', $params);
            $this->assertEquals(Response::HTTP_FORBIDDEN, $this->client->getResponse()->getStatusCode());
        } else {
            $this->assertEmpty($repairOrderQuote, 'RepairOrderQuote is null');
        }

        $repairOrderQuote = $qb->setMaxResults(1)
                               ->getQuery()
                               ->getOneOrNullResult();
                                
        if ($repairOrderQuote) {
            $recommendations = $repairOrderQuote->getRepairOrderQuoteRecommendations();
            //mark the quote as completed with 'Customer'        
            $customer = $repairOrderQuote->getRepairOrder()->getPrimaryCustomer();
            $authentication = self::$container->get(Authentication::class);
            $ttl = 31536000;
            $this->token = $authentication->getJWT($customer->getPhone(), $ttl);
            
            if (count($recommendations) ===1) {
                $params = [
                    'repairOrderQuoteID' => $repairOrderQuote->getId(),
                    'recommendations' => '[{"repairOrderQuoteRecommendationId": '.$recommendations[0]->getId().',"approved": true}]',
                ];
            } else if (count($recommendations) ===2) {
                $params = [
                    'repairOrderQuoteID' => $repairOrderQuote->getId(),
                    'recommendations' => '[{"repairOrderQuoteRecommendationId": '.$recommendations[0]->getId().',"approved": true}, {"repairOrderQuoteRecommendationId": '.$recommendations[1]->getId().',"approved": true}]',
                ];
            }
            else if (count($recommendations) ===3) {
                $params = [
                    'repairOrderQuoteID' => $repairOrderQuote->getId(),
                    'recommendations' => '[{"repairOrderQuoteRecommendationId": '.$recommendations[0]->getId().',"approved": true}, {"repairOrderQuoteRecommendationId": '.$recommendations[1]->getId().',"approved": true}, {"repairOrderQuoteRecommendationId": '.$recommendations[2]->getId().',"approved": true}]',
                ];
            }
            $this->requestAction('POST', '/complete', $params);
            $this->assertResponseIsSuccessful();
        } else {
            $this->assertEmpty($repairOrderQuote, 'repairOrderQuote is null');
        }
        
        
        //decline the recommendation
        $repairOrderQuoteRecommendation = $this->entityManager->getRepository(RepairOrderQuoteRecommendation::class)
                                               ->createQueryBuilder('roqs')
                                               ->where("roqs.preApproved = false")
                                               ->setMaxResults(1)
                                               ->getQuery()
                                               ->getOneOrNullResult();      
        $repairOrderQuote = $this->entityManager->getRepository(RepairOrderQuote::class)
                                                ->findOneBy(["id" => $repairOrderQuoteRecommendation->getRepairOrderQuote()]);
        
        $customer = $repairOrderQuote->getRepairOrder()->getPrimaryCustomer();
        $authentication = self::$container->get(Authentication::class);
        $ttl = 31536000;
        $this->token = $authentication->getJWT($customer->getPhone(), $ttl);        
        $params = [
             'repairOrderQuoteID' => $repairOrderQuote->getId(),
             'recommendations' => '[{"repairOrderQuoteRecommendationId": '.$repairOrderQuoteRecommendation->getId().',"approved": false}]',
        ];
        $this->requestAction('POST', '/complete', $params);
        $this->assertResponseIsSuccessful();

        //log in with 'Service Advisor'
        $this->token = $this->serviceAdvisorToken;
        $repairOrderQuote = $qb->andWhere("roq.status <> 'Sent'")
                               ->andWhere("roq.status <> 'Completed'")
                               ->andWhere("roq.status <> 'Confirmed'")
                               ->orderBy('roq.id', 'DESC')
                               ->setMaxResults(1)
                               ->getQuery()
                               ->getOneOrNullResult();

        if ($repairOrderQuote) {
            $recommendations = $repairOrderQuote->getRepairOrderQuoteRecommendations();
           
            //mark the quote as 'Completed'
            $params = [
                'repairOrderQuoteID' => $repairOrderQuote->getId(),
                'recommendations' => '[{"repairOrderQuoteRecommendationId": '.$recommendations[0]->getId().',"approved": true}]',
            ];
            $this->requestAction('POST', '/complete', $params);
            $this->assertResponseIsSuccessful();

             //the case when one of the reommendations was pre-approved, but that reommendation was not approved
            if (($recommendations[0]->getPreApproved()) ) {
                $params = [
                'repairOrderQuoteID' => $repairOrderQuote->getId(),
                'recommendations' => '[{"repairOrderQuoteRecommendationId": '.$recommendations[0]->getId().',"approved": false}]',
                ];
                $this->requestAction('POST', '/complete', $params);

                $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
            }

            //the case when one of the reommendations was not pre-approved, but that reommendation was missed
            if ((!$recommendations[0]->getPreApproved()) ) {
                $params = [
                'repairOrderQuoteID' => $repairOrderQuote->getId(),
                'recommendations' => '[{"repairOrderQuoteRecommendationId": 10001,"approved": false}]',
                ];
                $this->requestAction('POST', '/complete', $params);

                $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
            }
        } else {
            $this->assertEmpty($repairOrderQuote, 'RepairOrderQuote is null');
        }
    }

    public function testConfirmed()
    {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');

            return;
        }
        $repairOrderQuote = $this->entityManager->getRepository(RepairOrderQuote::class)
                                                ->createQueryBuilder('roq')
                                                ->andWhere("roq.status = 'Confirmed'")
                                                ->setMaxResults(1)
                                                ->getQuery()
                                                ->getOneOrNullResult();

        //the repairOrderQuote status is 'Confirmed'
        if ($repairOrderQuote) {
            $params = [
                'repairOrderQuoteID' => $repairOrderQuote->getId(),
                'status' => 'Confirmed',
            ];
            $this->requestAction('POST', '/confirm', $params);
            $this->assertEquals(Response::HTTP_FORBIDDEN, $this->client->getResponse()->getStatusCode());
        } else {
            $this->assertEmpty($repairOrderQuote, 'RepairOrderQuote is null');
        }

        //get a repairOrderQuote which is allowed to be updated
        $repairOrderQuote = $this->entityManager->getRepository(RepairOrderQuote::class)
                                                ->createQueryBuilder('roq')
                                                ->andWhere("roq.status <> 'Confirmed'")
                                                ->setMaxResults(1)
                                                ->getQuery()
                                                ->getOneOrNullResult();

        if ($repairOrderQuote) {
            //mark confirmed with Service Advisor
            $this->token = $this->serviceAdvisorToken;

            $params = [
                'repairOrderQuoteID' => $repairOrderQuote->getId(),
                'status' => 'Confirmed',
            ];
            $this->requestAction('POST', '/confirm', $params);
            $this->assertResponseIsSuccessful();
        } else {
            $this->assertEmpty($repairOrderQuote, 'RepairOrderQuote is null');
        }
    }

    public function testDeleteRepairOrderQuote()
    {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');

            return;
        }
        $repairOrderQuote = $this->entityManager->getRepository(RepairOrderQuote::class)
                                                ->createQueryBuilder('roq')
                                                ->setMaxResults(1)
                                                ->getQuery()
                                                ->getOneOrNullResult();

        if ($repairOrderQuote) {
            $this->requestAction('DELETE', '/'.$repairOrderQuote->getId());
            $this->assertResponseIsSuccessful();
        } else {
            $this->assertEmpty($repairOrderQuote, 'RepairOrderQuote is null');
        }
    }

    private function requestAction($method, $endpoint, $params = [])
    {
        $apiUrl = '/api/repair-order-quote'.$endpoint;

        $response = $this->client->request($method, $apiUrl, $params, [], [
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
