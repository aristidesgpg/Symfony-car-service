<?php

namespace App\Controller;

use App\Entity\User;
use App\Helper\iServiceLoggerTrait;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UserController
 *
 * @package App\Controller
 */
class UserController extends AbstractFOSRestController {
    use iServiceLoggerTrait;

    /**
     * @Rest\Get("/api/user/get-users")
     *
     * @param UserRepository $userRepo
     *
     * @return Response
     */
    public function getUsers (UserRepository $userRepo) {
        $users = $userRepo->getActiveUsers();

        return $this->handleView($this->view($users, Response::HTTP_OK));
    }

    /**
     * @Rest\Post("/api/user/new")
     *
     * @param EntityManagerInterface $em
     *
     * @return JsonResponse
     */
    public function new (EntityManagerInterface $em) {
        $user = new User();
        $user->setFirstName('Laramie')
             ->setLastName('Rugen')
             ->setEmail('lrugen@iserviceauto.com')
             ->setPhone('8479025995')
             ->setPassword('asdf');

        $em->persist($user);
        $em->flush();

        $this->logInfo('New User "' . $user->getFirstName() . '" Created');

        return new JsonResponse([
            'message' => 'New User Created'
        ]);
    }

    /**
     * @Rest\Post("/api/user/{id}/edit")
     *
     * @param User                   $user
     * @param EntityManagerInterface $em
     *
     * @return JsonResponse
     */
    public function edit (User $user, EntityManagerInterface $em) {
        $user->setFirstName('Laramie' . rand(10, 100));

        $em->flush();

        $this->logInfo('User "' . $user->getFirstName() . '" Has Been Edited');

        return new JsonResponse([
            'message' => 'User Edited'
        ]);
    }

    /**
     * @Rest\Get("/api/user/{id}/get")
     *
     * @param User $user
     *
     * @return object|void
     */
    public function userGet (User $user) {
        $repairOrders = $user->getTechnicianRepairOrders();
        foreach ($repairOrders as $repairOrder) {
            dump($repairOrder);
        }
        exit;
    }
}
