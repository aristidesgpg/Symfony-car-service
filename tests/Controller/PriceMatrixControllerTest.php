<?php

namespace App\Tests;

use App\Entity\User;
use App\Service\Authentication;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class PriceMatrixControllerTest extends WebTestCase
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

        $authentication = self::$container->get(Authentication::class);
        $ttl = 31536000;
        $this->token = $authentication->getJWT($user->getEmail(), $ttl);
    }

    public function testList()
    {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');

            return;
        }
        $this->requestActions('GET');
        $roInteractionRes = json_decode($this->client->getResponse()->getContent());
        $this->assertResponseIsSuccessful();
        $this->assertGreaterThanOrEqual(0, sizeof($roInteractionRes));
    }

    public function testPost()
    {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');

            return;
        }
        // Ok
        $data = '[{"hours":0,"price":0},{"hours":0.1,"price":0.5},{"hours":0.2,"price":1},
            {"hours":0.3,"price":1.5},{"hours":0.4,"price":2},{"hours":0.5,"price":2.5},
            {"hours":0.6,"price":3},{"hours":0.7,"price":3.5},{"hours":0.8,"price":4},
            {"hours":0.9,"price":4.5},{"hours":1,"price":5},{"hours":1.1,"price":5.5},
            {"hours":1.2,"price":6},{"hours":1.3,"price":6.5},{"hours":1.4,"price":7},
            {"hours":1.5,"price":7.5},{"hours":1.6,"price":8},{"hours":1.7,"price":8.5},
            {"hours":1.8,"price":9},{"hours":1.9,"price":9.5}]';
        $this->requestActions('POST', ['payload' => $data]);
        $roInteractionRes = json_decode($this->client->getResponse()->getContent());
        $this->assertResponseIsSuccessful();
        $this->assertEquals('Successfully created', $roInteractionRes->message);

        //wrong json object.  " is missing
        $data = '[{"hours":0, price":0}, {"hours":0.1,"price":0.5}]';
        $this->requestActions('POST', ['payload' => $data]);
        $roInteractionRes = json_decode($this->client->getResponse()->getContent());
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());

        //wrong json object.  use " instead of '
        $data = "[{'hours':0, 'price':0}, {'hours':0.1,'price':0.5}]";
        $this->requestActions('POST', ['payload' => $data]);
        $roInteractionRes = json_decode($this->client->getResponse()->getContent());
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());

        //wrong jon object.  It should be array type
        $data = '{"hours":0, price":0}';
        $this->requestActions('POST', ['payload' => $data]);
        $roInteractionRes = json_decode($this->client->getResponse()->getContent());
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());

        //wrong json object.  Each item should be object
        $data = '["hours":0]';
        $this->requestActions('POST', ['payload' => $data]);
        $roInteractionRes = json_decode($this->client->getResponse()->getContent());
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());

        //missing field
        $data = '[{"hours":0}, {"hours":0.1,"price":0.5}]';
        $this->requestActions('POST', ['payload' => $data]);
        $roInteractionRes = json_decode($this->client->getResponse()->getContent());
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());

        //invalid value. Each value should be a number
        $data = '[{"hours":0,"price":"aa"}, {"hours":0.1,"price":0.5}]';
        $this->requestActions('POST', ['payload' => $data]);
        $roInteractionRes = json_decode($this->client->getResponse()->getContent());
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
    }

    private function requestActions($method, $params = [])
    {
        $apiUrl = '/api/price-matrix';

        $this->client->request($method, $apiUrl, $params, [], [
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
