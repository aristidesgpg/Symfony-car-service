<?php

namespace App\Tests;

use App\Entity\User;
use App\Service\Authentication;
use App\Entity\Customer;
use App\Entity\Part;
use App\Entity\RepairOrderQuote;
use App\Entity\RepairOrderQuoteRecommendation;
use App\Entity\RepairOrderQuoteRecommendationPart;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class RepairOrderControllerTest extends WebTestCase {
    private $client = null;

    private $token;
    private $serviceAdvisorToken;
    private $technicanToken;
    private $customerToken;
    private $partsAdviosrToken;


    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    /**
     * {@inheritDoc}
     */
    public function setUp() {
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
       
        $customer = self::$container->get('doctrine')
                                        ->getManager()
                                        ->getRepository(Customer::class)
                                        ->createQueryBuilder('c')
                                        ->where('c.deleted = 0')
                                        ->setMaxResults(1)
                                        ->getQuery()
                                        ->getOneOrNullResult();
        
        $authentication = self::$container->get(Authentication::class);
        $ttl            = 31536000;
        $this->serviceAdvisorToken = $authentication->getJWT($serviceAdvisor->getEmail(), $ttl);
        $this->technicanToken = $authentication->getJWT($technican->getEmail(), $ttl);
        $this->partsAdvisorToken = $authentication->getJWT($partsAdvisor->getEmail(), $ttl);
        $this->customerToken = $authentication->getJWT($customer->getPhone(), $ttl);

        $this->token = $this->serviceAdvisorToken;
        $this->entityManager = self::$container->get('doctrine')->getManager();
    }

    public function testGetRepairOrderQuote() {
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

    public function testCreateRepairOrderQuote() {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');
            return;
        }
        $repairOrderQuote = $this->entityManager->getRepository(RepairOrderQuote::class)
                                        ->createQueryBuilder('roq')
                                        ->setMaxResults(1)
                                        ->getQuery()
                                        ->getOneOrNullResult();
        //A quote already exist
        if ($repairOrderQuote) {
            $params = [
                'repairOrderID'  => $repairOrderQuote->getRepairOrder()->getId(),
                'recommendations' => '[{"operationCode":14, "description":"Neque maxime ex dolorem ut.","preApproved":true,"approved":true,"partsPrice":1.0,"suppliesPrice":14.02,"laborPrice":5.3,"laborTax":5.3,"partsTax":2.1,"suppliesTax":4.3,"notes":"Cumque tempora ut nobis.", "parts":[{"number":"34843434", "name":"name1", "price":23.3, "quantity":23,"bin":"eifkdo838f833kd9"}, {"number":"12254345", "name":"name2", "price":13.3, "quantity":13,"bin":"dkf939f8d8f8dd"}]},{"operationCode":11, "description":"Quidem earum sapiente at dolores quia natus.","preApproved":false,"approved":true,"partsPrice":2.6,"suppliesPrice":509.02,"laborPrice":36.9,"laborTax":4.3,"partsTax":2.4,"suppliesTax":4.1,"notes":"Et accusantium rerum."},{"operationCode":4, "description":"Mollitia unde nobis doloribus sed.","preApproved":true,"approved":false,"partsPrice":1.1,"suppliesPrice":71.7,"laborPrice":55.1,"laborTax":5.1,"partsTax":2.6,"suppliesTax":3.3,"notes":"Voluptates et aut debitis."}]'
            ];

            $this->requestAction('POST', '', $params);
            $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
        } else {
            $this->assertEmpty($repairOrderQuote, 'RepairOrderQuote is null');
        }

        //create repairOrderQuote with valid JSON
        $params = [
            'repairOrderID'  => 53,
            'recommendations' => '[{"operationCode":14, "description":"Neque maxime ex dolorem ut.","preApproved":true,"approved":true,"partsPrice":1.0,"suppliesPrice":14.02,"laborPrice":5.3,"laborTax":5.3,"partsTax":2.1,"suppliesTax":4.3,"notes":"Cumque tempora ut nobis.", "parts":[{"number":"34843434", "name":"name1", "price":23.3, "quantity":23,"bin":"eifkdo838f833kd9"}, {"number":"12254345", "name":"name2", "price":13.3, "quantity":13,"bin":"dkf939f8d8f8dd"}]},{"operationCode":11, "description":"Quidem earum sapiente at dolores quia natus.","preApproved":false,"approved":true,"partsPrice":2.6,"suppliesPrice":509.02,"laborPrice":36.9,"laborTax":4.3,"partsTax":2.4,"suppliesTax":4.1,"notes":"Et accusantium rerum."},{"operationCode":4, "description":"Mollitia unde nobis doloribus sed.","preApproved":true,"approved":false,"partsPrice":1.1,"suppliesPrice":71.7,"laborPrice":55.1,"laborTax":5.1,"partsTax":2.6,"suppliesTax":3.3,"notes":"Voluptates et aut debitis."}]'
        ];
        $this->requestAction('POST', '', $params);
        $this->assertResponseIsSuccessful();
        $response = json_decode($this->client->getResponse()->getContent());
        $this->assertObjectHasAttribute('id', $response);

        //missing repairOrder
        $params = [
            'recommendations' => '["operationCode":14, "description":"Neque maxime ex dolorem ut.","preApproved":true,"approved":true,"partsPrice":1.0,"suppliesPrice":14.02,"laborPrice":5.3,"laborTax":5.3,"partsTax":2.1,"suppliesTax":4.3,"notes":"Cumque tempora ut nobis.", "parts":[{"number":"34843434", "name":"name1", "price":23.3, "quantity":23,"bin":"eifkdo838f833kd9"}, {"number":"12254345", "name":"name2", "price":13.3, "quantity":13,"bin":"dkf939f8d8f8dd"}]},{"operationCode":11, "description":"Quidem earum sapiente at dolores quia natus.","preApproved":false,"approved":true,"partsPrice":2.6,"suppliesPrice":509.02,"laborPrice":36.9,"laborTax":4.3,"partsTax":2.4,"suppliesTax":4.1,"notes":"Et accusantium rerum."},{"operationCode":4, "description":"Mollitia unde nobis doloribus sed.","preApproved":true,"approved":false,"partsPrice":1.1,"suppliesPrice":71.7,"laborPrice":55.1,"laborTax":5.1,"partsTax":2.6,"suppliesTax":3.3,"notes":"Voluptates et aut debitis."}]'
        ];
        $this->requestAction('POST', '', $params);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
        $response = json_decode($this->client->getResponse()->getContent());
        $this->assertEquals('Missing Required Parameter', $response);
       
        //repairOrder not found
        $params = [
            'repairOrderID'  => 999,
            'recommendations' => '["operationCode":14, "description":"Neque maxime ex dolorem ut.","preApproved":true,"approved":true,"partsPrice":1.0,"suppliesPrice":14.02,"laborPrice":5.3,"laborTax":5.3,"partsTax":2.1,"suppliesTax":4.3,"notes":"Cumque tempora ut nobis.", "parts":[{"number":"34843434", "name":"name1", "price":23.3, "quantity":23,"bin":"eifkdo838f833kd9"}, {"number":"12254345", "name":"name2", "price":13.3, "quantity":13,"bin":"dkf939f8d8f8dd"}]},{"operationCode":11, "description":"Quidem earum sapiente at dolores quia natus.","preApproved":false,"approved":true,"partsPrice":2.6,"suppliesPrice":509.02,"laborPrice":36.9,"laborTax":4.3,"partsTax":2.4,"suppliesTax":4.1,"notes":"Et accusantium rerum."},{"operationCode":4, "description":"Mollitia unde nobis doloribus sed.","preApproved":true,"approved":false,"partsPrice":1.1,"suppliesPrice":71.7,"laborPrice":55.1,"laborTax":5.1,"partsTax":2.6,"suppliesTax":3.3,"notes":"Voluptates et aut debitis."}]'
        ];
        $this->requestAction('POST', '', $params);
        $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());
        
        //invalid JSON (missing '{')
        $params = [
            'repairOrderID'  => 53,
            'recommendations' => '["operationCode":14, "description":"Neque maxime ex dolorem ut.","preApproved":true,"approved":true,"partsPrice":1.0,"suppliesPrice":14.02,"laborPrice":5.3,"laborTax":5.3,"partsTax":2.1,"suppliesTax":4.3,"notes":"Cumque tempora ut nobis.", "parts":[{"number":"34843434", "name":"name1", "price":23.3, "quantity":23,"bin":"eifkdo838f833kd9"}, {"number":"12254345", "name":"name2", "price":13.3, "quantity":13,"bin":"dkf939f8d8f8dd"}]},{"operationCode":11, "description":"Quidem earum sapiente at dolores quia natus.","preApproved":false,"approved":true,"partsPrice":2.6,"suppliesPrice":509.02,"laborPrice":36.9,"laborTax":4.3,"partsTax":2.4,"suppliesTax":4.1,"notes":"Et accusantium rerum."},{"operationCode":4, "description":"Mollitia unde nobis doloribus sed.","preApproved":true,"approved":false,"partsPrice":1.1,"suppliesPrice":71.7,"laborPrice":55.1,"laborTax":5.1,"partsTax":2.6,"suppliesTax":3.3,"notes":"Voluptates et aut debitis."}]'
        ];
        $this->requestAction('POST', '', $params);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
  
        //invalid JSON (missing '[')
        $params = [
            'repairOrderID'  => 53,
            'recommendations' => '"operationCode":14, "description":"Neque maxime ex dolorem ut.","preApproved":true,"approved":true,"partsPrice":1.0,"suppliesPrice":14.02,"laborPrice":5.3,"laborTax":5.3,"partsTax":2.1,"suppliesTax":4.3,"notes":"Cumque tempora ut nobis.", "parts":[{"number":"34843434", "name":"name1", "price":23.3, "quantity":23,"bin":"eifkdo838f833kd9"}, {"number":"12254345", "name":"name2", "price":13.3, "quantity":13,"bin":"dkf939f8d8f8dd"}]},{"operationCode":11, "description":"Quidem earum sapiente at dolores quia natus.","preApproved":false,"approved":true,"partsPrice":2.6,"suppliesPrice":509.02,"laborPrice":36.9,"laborTax":4.3,"partsTax":2.4,"suppliesTax":4.1,"notes":"Et accusantium rerum."},{"operationCode":4, "description":"Mollitia unde nobis doloribus sed.","preApproved":true,"approved":false,"partsPrice":1.1,"suppliesPrice":71.7,"laborPrice":55.1,"laborTax":5.1,"partsTax":2.6,"suppliesTax":3.3,"notes":"Voluptates et aut debitis."}]'
        ];
        $this->requestAction('POST', '', $params);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
       
        //empty json
        $params = [
            'repairOrderID'  => 53,
            'recommendations' => '[]'
        ];
        $this->requestAction('POST', '', $params);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
 
        //each item of recommendation is not object
        $params = [
            'repairOrderID'  => 53,
            'recommendations' => '[operationCode":14, "description":"Neque maxime ex dolorem ut."]'
        ];
        $this->requestAction('POST', '', $params);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
     
        //discription field is missed
        $params = [
            'repairOrderID'  => 53,
            'recommendations' => '["operationCode":14, "preApproved":true,"approved":true,"partsPrice":1.0,"suppliesPrice":14.02,"laborPrice":5.3,"laborTax":5.3,"partsTax":2.1,"suppliesTax":4.3,"notes":"Cumque tempora ut nobis.", "parts":[{"number":"34843434", "name":"name1", "price":23.3, "quantity":23,"bin":"eifkdo838f833kd9"}, {"number":"12254345", "name":"name2", "price":13.3, "quantity":13,"bin":"dkf939f8d8f8dd"}]},{"operationCode":11, "description":"Quidem earum sapiente at dolores quia natus.","preApproved":false,"approved":true,"partsPrice":2.6,"suppliesPrice":509.02,"laborPrice":36.9,"laborTax":4.3,"partsTax":2.4,"suppliesTax":4.1,"notes":"Et accusantium rerum."},{"operationCode":4, "description":"Mollitia unde nobis doloribus sed.","preApproved":true,"approved":false,"partsPrice":1.1,"suppliesPrice":71.7,"laborPrice":55.1,"laborTax":5.1,"partsTax":2.6,"suppliesTax":3.3,"notes":"Voluptates et aut debitis."}]'
        ];
        $this->requestAction('POST', '', $params);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
  
        //discription field is empty
        $params = [
            'repairOrderID'  => 53,
            'recommendations' => '[{"operationCode":14, "description":"","preApproved":true,"approved":true,"partsPrice":1.0,"suppliesPrice":14.02,"laborPrice":5.3,"laborTax":5.3,"partsTax":2.1,"suppliesTax":4.3,"notes":"Cumque tempora ut nobis.", "parts":[{"number":"34843434", "name":"name1", "price":23.3, "quantity":23,"bin":"eifkdo838f833kd9"}, {"number":"12254345", "name":"name2", "price":13.3, "quantity":13,"bin":"dkf939f8d8f8dd"}]},{"operationCode":11, "description":"Quidem earum sapiente at dolores quia natus.","preApproved":false,"approved":true,"partsPrice":2.6,"suppliesPrice":509.02,"laborPrice":36.9,"laborTax":4.3,"partsTax":2.4,"suppliesTax":4.1,"notes":"Et accusantium rerum."},{"operationCode":4, "description":"Mollitia unde nobis doloribus sed.","preApproved":true,"approved":false,"partsPrice":1.1,"suppliesPrice":71.7,"laborPrice":55.1,"laborTax":5.1,"partsTax":2.6,"suppliesTax":3.3,"notes":"Voluptates et aut debitis."}]'
        ];
        $this->requestAction('POST', '', $params);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());

        //partsPrice is not number
        $params = [
            'repairOrderID'  => 53,
            'recommendations' => '[{"operationCode":14, "description":"","preApproved":true,"approved":true,"partsPrice":"string","suppliesPrice":14.02,"laborPrice":5.3,"laborTax":5.3,"partsTax":2.1,"suppliesTax":4.3,"notes":"Cumque tempora ut nobis.", "parts":[{"number":"34843434", "name":"name1", "price":23.3, "quantity":23,"bin":"eifkdo838f833kd9"}, {"number":"12254345", "name":"name2", "price":13.3, "quantity":13,"bin":"dkf939f8d8f8dd"}]},{"operationCode":11, "description":"Quidem earum sapiente at dolores quia natus.","preApproved":false,"approved":true,"partsPrice":2.6,"suppliesPrice":509.02,"laborPrice":36.9,"laborTax":4.3,"partsTax":2.4,"suppliesTax":4.1,"notes":"Et accusantium rerum."},{"operationCode":4, "description":"Mollitia unde nobis doloribus sed.","preApproved":true,"approved":false,"partsPrice":1.1,"suppliesPrice":71.7,"laborPrice":55.1,"laborTax":5.1,"partsTax":2.6,"suppliesTax":3.3,"notes":"Voluptates et aut debitis."}]'
        ];
        $this->requestAction('POST', '', $params);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());

        //Part json is invalid
        $params = [
            'repairOrderID'  => 53,
            'recommendations' => '[{"operationCode":14, "description":"","preApproved":true,"approved":true,"partsPrice":"string","suppliesPrice":14.02,"laborPrice":5.3,"laborTax":5.3,"partsTax":2.1,"suppliesTax":4.3,"notes":"Cumque tempora ut nobis.", "parts":["number":"34843434", "name":"name1", "price":23.3, "quantity":23,"bin":"eifkdo838f833kd9"]},{"operationCode":11, "description":"Quidem earum sapiente at dolores quia natus.","preApproved":false,"approved":true,"partsPrice":2.6,"suppliesPrice":509.02,"laborPrice":36.9,"laborTax":4.3,"partsTax":2.4,"suppliesTax":4.1,"notes":"Et accusantium rerum."},{"operationCode":4, "description":"Mollitia unde nobis doloribus sed.","preApproved":true,"approved":false,"partsPrice":1.1,"suppliesPrice":71.7,"laborPrice":55.1,"laborTax":5.1,"partsTax":2.6,"suppliesTax":3.3,"notes":"Voluptates et aut debitis."}]'
        ];
        $this->requestAction('POST', '', $params);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());

        //Invalid operation code
        $params = [
            'repairOrderID'  => 53,
            'recommendations' => '[{"operationCode":999, "description":"Neque maxime ex dolorem ut.","preApproved":true,"approved":true,"partsPrice":1.0,"suppliesPrice":14.02,"laborPrice":5.3,"laborTax":5.3,"partsTax":2.1,"suppliesTax":4.3,"notes":"Cumque tempora ut nobis.", "parts":[{"number":"34843434", "name":"name1", "price":23.3, "quantity":23,"bin":"eifkdo838f833kd9"}, {"number":"12254345", "name":"name2", "price":13.3, "quantity":13,"bin":"dkf939f8d8f8dd"}]},{"operationCode":11, "description":"Quidem earum sapiente at dolores quia natus.","preApproved":false,"approved":true,"partsPrice":2.6,"suppliesPrice":509.02,"laborPrice":36.9,"laborTax":4.3,"partsTax":2.4,"suppliesTax":4.1,"notes":"Et accusantium rerum."},{"operationCode":4, "description":"Mollitia unde nobis doloribus sed.","preApproved":true,"approved":false,"partsPrice":1.1,"suppliesPrice":71.7,"laborPrice":55.1,"laborTax":5.1,"partsTax":2.6,"suppliesTax":3.3,"notes":"Voluptates et aut debitis."}]'
        ];
        $this->requestAction('POST', '', $params);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
    }

    public function testUpdateRepairOrderQuote() {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');
            return;
        }
        
        $repairOrderQuote = $this->entityManager->getRepository(RepairOrderQuote::class)
                                                    ->createQueryBuilder('roq')
                                                    ->andWhere("roq.status = 'Completed' or roq.status = 'Confirmed'")
                                                    ->setMaxResults(1)
                                                    ->getQuery()
                                                    ->getOneOrNullResult();
        //not customer, and the repairOrderQuote status is 'Completed' or 'Confirmed'
        if ($this->token !== $this->customerToken) {
            if ($repairOrderQuote) {
                $params = [
                    'recommendations' => '[{"operationCode":14, "description":"Neque maxime ex dolorem ut.","preApproved":true,"approved":true,"partsPrice":1.0,"suppliesPrice":14.02,"laborPrice":5.3,"laborTax":5.3,"partsTax":2.1,"suppliesTax":4.3,"notes":"Cumque tempora ut nobis.", "parts":[{"number":"34843434", "name":"name1", "price":23.3, "quantity":23,"bin":"eifkdo838f833kd9"}, {"number":"12254345", "name":"name2", "price":13.3, "quantity":13,"bin":"dkf939f8d8f8dd"}]},{"operationCode":11, "description":"Quidem earum sapiente at dolores quia natus.","preApproved":false,"approved":true,"partsPrice":2.6,"suppliesPrice":509.02,"laborPrice":36.9,"laborTax":4.3,"partsTax":2.4,"suppliesTax":4.1,"notes":"Et accusantium rerum."},{"operationCode":4, "description":"Mollitia unde nobis doloribus sed.","preApproved":true,"approved":false,"partsPrice":1.1,"suppliesPrice":71.7,"laborPrice":55.1,"laborTax":5.1,"partsTax":2.6,"suppliesTax":3.3,"notes":"Voluptates et aut debitis."}]'
                ];
                $this->requestAction('PUT', "/".$repairOrderQuote->getId(), $params);
                $this->assertEquals(Response::HTTP_FORBIDDEN, $this->client->getResponse()->getStatusCode());
            } else {
                $this->assertEmpty($repairOrderQuote, 'RepairOrderQuote is null');
            }
        }

        
    }
  
    public function testDeleteRepairOrderQuote() {
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
   
    private function requestAction($method, $endpoint, $params=[]) {
        $apiUrl = "/api/repair-order-quote".$endpoint;

        $response = $this->client->request($method, $apiUrl, $params, [], [
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
