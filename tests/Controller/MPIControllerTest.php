<?php

namespace App\Tests;

use App\Entity\MPIGroup;
use App\Entity\MPIItem;
use App\Entity\MPITemplate;
use App\Entity\User;
use App\Service\Authentication;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class MPIControllerTest extends WebTestCase
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

        $authentication = self::$container->get(Authentication::class);
        $ttl = 31536000;
        $this->token = $authentication->getJWT($user->getEmail(), $ttl);

        $this->entityManager = self::$container->get('doctrine')->getManager();
    }

    public function testGetTemplates()
    {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');

            return;
        }

        // Get all, Ok
        $this->requestAction('GET', '/mpi-template');

        $this->assertResponseIsSuccessful();
        $response = json_decode($this->client->getResponse()->getContent());
        $this->assertGreaterThanOrEqual(0, $response->totalResults);

        // Page not found, 404
        $page = 0;
        $this->requestAction('GET', '/mpi-template', ['page' => $page]);
        $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());

        // Page limit validation, 406
        $pageLimit = 0;
        $this->requestAction('GET', '/mpi-template', ['pageLimit' => $pageLimit]);
        $this->assertEquals(Response::HTTP_NOT_ACCEPTABLE, $this->client->getResponse()->getStatusCode());

        // sortField, sortDirection, searchField, searchTerm
        $params = [
            'page' => 1,
            'pageLimit' => 25,
            'sortField' => 'emal',
            'sortDirection' => 'ASC',
            'searchField' => 'name',
            'searchTerm' => 'Prof',
        ];
        $this->requestAction('GET', '/mpi-template', $params);
        $this->assertEquals(Response::HTTP_NOT_ACCEPTABLE, $this->client->getResponse()->getStatusCode());
    }

    public function testGetTemplate()
    {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');

            return;
        }

        $mpi = $this->entityManager->getRepository(MPITemplate::class)
                                   ->createQueryBuilder('mpi')
                                   ->setMaxResults(1)
                                   ->getQuery()
                                   ->getOneOrNullResult();

        if ($mpi && !$mpi->getDeleted()) { // Ok
            $id = $mpi->getId();

            $this->requestAction('GET', '/mpi-template/'.$id);
            $this->assertResponseIsSuccessful();
            $response = json_decode($this->client->getResponse()->getContent());
            $this->assertEquals($id, $response->id);
        } elseif ($mpi && $mpi->getDeleted()) { // Not found
            $id = $mpi->getId();
            $this->requestAction('GET', '/mpi-template/'.$id);
            $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());
        } else {
            $this->assertEmpty($mpi, 'Mpi is null');
        }
    }

    public function testCreateTemplate()
    {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');

            return;
        }

        // Ok
        $name = 'MPI Template Name';
        $axleInfo = '[{"wheels":2,"brakesRangeMaximum":10,"tireRangeMaximum":6},{"wheels":4,"brakesRangeMaximum":12,"tireRangeMaximum":12},{"wheels":2,"brakesRangeMaximum":10,"tireRangeMaximum":6}]';
        $params = [
            'name' => $name,
            'axleInfo' => $axleInfo,
        ];
        $this->requestAction('POST', '/mpi-template', $params);
        $this->assertResponseIsSuccessful();
        $response = json_decode($this->client->getResponse()->getContent());
        $this->assertEquals($name, $response->name);

        // Validate parameters
        $params = [
            'name' => $name,
        ];

        $this->requestAction('POST', '/mpi-template', $params);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
    }

    public function testEditTemplate()
    {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');

            return;
        }

        $mpi = $this->entityManager->getRepository(MPITemplate::class)
                                   ->createQueryBuilder('mpi')
                                   ->where('mpi.deleted = 0')
                                   ->setMaxResults(1)
                                   ->getQuery()
                                   ->getOneOrNullResult();
        if ($mpi) {
            // Ok
            $id = $mpi->getId();
            $name = 'MPI template name for update';
            $params = [
                'name' => $name,
            ];
            $this->requestAction('PUT', '/mpi-template/'.$id, $params);
            $this->assertResponseIsSuccessful();
            $response = json_decode($this->client->getResponse()->getContent());
            $this->assertEquals($name, $response->name);

            // Require parameters
            $this->requestAction('PUT', '/mpi-template/'.$id);
            $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
        }
    }

    public function testDeactivateTemplate()
    {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');

            return;
        }

        $mpi = $this->entityManager->getRepository(MPITemplate::class)
                                   ->createQueryBuilder('mpi')
                                   ->where('mpi.deleted = 0')
                                   ->andWhere('mpi.active = 1')
                                   ->setMaxResults(1)
                                   ->getQuery()
                                   ->getOneOrNullResult();
        // Ok
        $id = $mpi->getId();
        $this->requestAction('PUT', '/mpi-template/de-activate/'.$id);
        $this->assertResponseIsSuccessful();
    }

    public function testReactivateTemplate()
    {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');

            return;
        }

        $mpi = $this->entityManager->getRepository(MPITemplate::class)
                                   ->createQueryBuilder('mpi')
                                   ->where('mpi.deleted = 0')
                                   ->setMaxResults(1)
                                   ->getQuery()
                                   ->getOneOrNullResult();
        // Ok
        $id = $mpi->getId();
        $this->requestAction('PUT', '/mpi-template/re-activate/'.$id);
        $this->assertResponseIsSuccessful();
    }

    public function testDeleteTemplate()
    {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');

            return;
        }

        $mpi = $this->entityManager->getRepository(MPITemplate::class)
                                   ->createQueryBuilder('mpi')
                                   ->where('mpi.deleted = 0')
                                   ->setMaxResults(1)
                                   ->getQuery()
                                   ->getOneOrNullResult();
        // Ok
        $id = $mpi->getId();
        $this->requestAction('DELETE', '/mpi-template/'.$id);
        $this->assertResponseIsSuccessful();
    }

    public function testCreateGroup()
    {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');

            return;
        }

        $mpiTemplate = $this->entityManager->getRepository(MPITemplate::class)
                                           ->createQueryBuilder('mpi')
                                           ->where('mpi.deleted = 0')
                                           ->setMaxResults(1)
                                           ->getQuery()
                                           ->getOneOrNullResult();
        // Ok
        $name = 'New MPI group name';
        $params = [
            'id' => $mpiTemplate->getId(), // MPI template ID
            'name' => $name,
        ];
        $this->requestAction('POST', '/mpi-group', $params);
        $this->assertResponseIsSuccessful();
        $response = json_decode($this->client->getResponse()->getContent());
        $this->assertEquals($name, $response->name);

        // Missing required parameter
        $this->requestAction('POST', '/mpi-group');
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());

        // Invalid Template Parameter
        // $params = [
        //     'id'   => 2147483647, // MPI template ID
        //     'name' => $name
        // ];
        // $this->requestAction('POST', '/mpi-group', $params);
        // $this->assertEquals(Response::HTTP_NOT_ACCEPTABLE, $this->client->getResponse()->getStatusCode());
    }

    public function testEditGroup()
    {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');

            return;
        }

        $mpiGroup = $this->entityManager->getRepository(MPIGroup::class)
                                        ->createQueryBuilder('mpi')
                                        ->where('mpi.deleted = 0')
                                        ->setMaxResults(1)
                                        ->getQuery()
                                        ->getOneOrNullResult();
        // Ok
        $id = $mpiGroup->getId();
        $name = 'New name of MPI group';
        $this->requestAction('PUT', '/mpi-group/'.$id, ['name' => $name]);
        $this->assertResponseIsSuccessful();
        $response = json_decode($this->client->getResponse()->getContent());
        $this->assertEquals($name, $response->name);

        // Missing required parameter
        $this->requestAction('PUT', '/mpi-group/'.$id);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
    }

    public function testDeactivateGroup()
    {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');

            return;
        }

        $mpiGroup = $this->entityManager->getRepository(MPIGroup::class)
                                        ->createQueryBuilder('mpi')
                                        ->where('mpi.deleted = 0')
                                        ->andWhere('mpi.active = 1')
                                        ->setMaxResults(1)
                                        ->getQuery()
                                        ->getOneOrNullResult();
        $id = $mpiGroup->getId();
        $this->requestAction('PUT', '/mpi-group/de-activate/'.$id);
        $this->assertResponseIsSuccessful();
    }

    public function testReactivateGroup()
    {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');

            return;
        }

        $mpiGroup = $this->entityManager->getRepository(MPIGroup::class)
                                        ->createQueryBuilder('mpi')
                                        ->where('mpi.deleted = 0')
                                        ->setMaxResults(1)
                                        ->getQuery()
                                        ->getOneOrNullResult();
        $id = $mpiGroup->getId();
        $this->requestAction('PUT', '/mpi-group/re-activate/'.$id);
        $this->assertResponseIsSuccessful();
    }

    public function testDeleteGroup()
    {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');

            return;
        }

        $mpiGroup = $this->entityManager->getRepository(MPIGroup::class)
                                        ->createQueryBuilder('mpi')
                                        ->where('mpi.deleted = 0')
                                        ->setMaxResults(1)
                                        ->getQuery()
                                        ->getOneOrNullResult();
        $id = $mpiGroup->getId();
        $this->requestAction('DELETE', '/mpi-group/'.$id);
        $this->assertResponseIsSuccessful();
    }

    public function testCreateItem()
    {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');

            return;
        }

        $mpiGroup = $this->entityManager->getRepository(MPIGroup::class)
                                        ->createQueryBuilder('mpi')
                                        ->where('mpi.deleted = 0')
                                        ->setMaxResults(1)
                                        ->getQuery()
                                        ->getOneOrNullResult();

        $id = $mpiGroup->getId();
        // Ok
        $name = 'New MPI item name';
        $params = [
            'id' => 1, // MPI group ID
            'name' => $name,
        ];
        $this->requestAction('POST', '/mpi-item', $params);
        $this->assertResponseIsSuccessful();
        $response = json_decode($this->client->getResponse()->getContent());
        $this->assertEquals($name, $response->name);

        // Missing required parameter
        $this->requestAction('POST', '/mpi-item');
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
    }

    public function testEditItem()
    {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');

            return;
        }

        // Ok
        $mpiItem = $this->entityManager->getRepository(MPIItem::class)
                                        ->createQueryBuilder('mpi')
                                        ->where('mpi.deleted = 0')
                                        ->setMaxResults(1)
                                        ->getQuery()
                                        ->getOneOrNullResult();
        if ($mpiItem) {
            $id = $mpiItem->getId();
            $name = 'New name of MPI item';
            $this->requestAction('PUT', '/mpi-item/'.$id, ['name' => $name]);
            $this->assertResponseIsSuccessful();
            $response = json_decode($this->client->getResponse()->getContent());
            $this->assertEquals($name, $response->name);

            // Missing required parameter
            $this->requestAction('PUT', '/mpi-item/'.$id);
            $this->assertEquals(Response::HTTP_BAD_REQUEST, $this->client->getResponse()->getStatusCode());
        } else {
            $this->assertEmpty($mpiItem, 'MPIItem is null');
        }
    }

    public function testDeleteItem()
    {
        if (!$this->token) {
            $this->assertEmpty($this->token, 'Token is null');

            return;
        }

        $mpiItem = $this->entityManager->getRepository(MPIItem::class)
                                        ->createQueryBuilder('mpi')
                                        ->where('mpi.deleted = 0')
                                        ->setMaxResults(1)
                                        ->getQuery()
                                        ->getOneOrNullResult();
        if ($mpiItem) {
            $id = $mpiItem->getId();
            $this->requestAction('DELETE', '/mpi-item/'.$id);
            $this->assertResponseIsSuccessful();
        } else {
            $this->assertEmpty($mpiItem, 'MPIItem is null');
        }
    }

    private function requestAction($method, $endpoint = '', $params = [])
    {
        $apiUrl = '/api'.$endpoint;
        $crawler = $this->client->request($method, $apiUrl, $params, [], [
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
