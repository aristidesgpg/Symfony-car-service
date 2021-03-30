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
        $serviceAdvisorBulider = $builder;
        $serviceAdvisor = $serviceAdvisorBulider->andWhere("u.role = 'ROLE_SERVICE_ADVISOR'")
                                                      ->getQuery()
                                                      ->getOneOrNullResult();
        
        $technicanBulider = $builder;
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
                                        ->createQueryBuilder('ro')
                                        ->where('ro.deleted = 0')
                                        ->setMaxResults(1)
                                        ->getQuery()
                                        ->getOneOrNullResult();
        
        $authentication = self::$container->get(Authentication::class);
        $ttl            = 31536000;
        $this->serviceAdvisorToken = $authentication->getJWT($serviceAdvisor->getEmail(), $ttl);
        $this->partsAdvisorToken = $authentication->getJWT($partsAdvisor->getEmail(), $ttl);
        $this->technicanToken = $authentication->getJWT($technican->getEmail(), $ttl);
        $this->customerToken = $authentication->getJWT($customer->getPhone(), $ttl);

        $this->token = $this->serviceAdvisorToken;
        $this->entityManager = self::$container->get('doctrine')->getManager();
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
