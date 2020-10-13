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
use Swagger\Annotations as SWG;

/**
 * Class UserController
 *
 * @package App\Controller
 */
class UserController extends AbstractFOSRestController {
    use iServiceLoggerTrait;

    /**
     * @Rest\Get("/api/user/get-users/{role}")
     *
     * @SWG\Tag(name="Users")
     * @SWG\Get(description="Get all users")
     * 
     * @SWG\Response(
     *     response=200,
     *     description="Return users",
     *     @SWG\Items(
     *         type="object",
     *             description="first name, last name, email, phone, roles, active, last login"
     *         )
     * )
     *
     * @param String         $role
     * @param UserRepository $userRepo
     *
     * @return Response
     */
    public function getUsers (String $role, UserRepository $userRepo) {
        $roles = [
            "ROLE_ADMIN", 
            "ROLE_SERVICE_MANAGER",
            "ROLE_SERVICE_ADVISOR",
            "ROLE_TECHNICIAN",
            "ROLE_PARTS_ADVISTOR",
            "ROLE_SALES_MANAGER",
            "ROLE_SALES_AGENT"
        ];

        //role is valid
        if(!$role || !in_array($role, $roles)){
            return $this->handleView($this->view('Invalid Role Parameter', Response::HTTP_BAD_REQUEST));
        }

        $users = $userRepo->getUserByRole($role);

        return $this->handleView($this->view($users, Response::HTTP_OK));
    }

    /**
     * @Rest\Post("/api/user/new")
     *
     * @SWG\Tag(name="Users")
     * @SWG\Post(description="Create a new user")
     * 
     * @SWG\Parameter(
     *     name="firstName",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The First Name of User",
     * )
     * @SWG\Parameter(
     *     name="lastName",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Last Name of User",
     * )
     * @SWG\Parameter(
     *     name="email",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Email of User",
     * )
     * @SWG\Parameter(
     *     name="phone",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Phone of User",
     * )
     * @SWG\Parameter(
     *     name="password",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Password of User",
     * )
     * 
     * @SWG\Response(
     *     response=200,
     *     description="Return users",
     *     @SWG\Items(
     *         type="object",
     *             description="first name, last name, email, phone, roles, active, last login"
     *         )
     * )
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
