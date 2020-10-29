<?php

namespace App\Controller;

use App\Entity\User;
use App\Helper\iServiceLoggerTrait;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use App\Service\UserHelper;

/**
 * Class UserController
 *
 * @package App\Controller
 */
class UserController extends AbstractFOSRestController {
    use iServiceLoggerTrait;

    /**
     * @Rest\Get("/api/users")
     *
     * @SWG\Tag(name="Users")
     * @SWG\Get(description="Get all users")
     * @SWG\Parameter(
     *     name="role",
     *     in="query",
     *     required=true,
     *     type="string",
     *     description="permission role for users you are trying to get",
     *     enum={"ROLE_ADMIN", "ROLE_SERVICE_MANAGER", "ROLE_SERVICE_ADVISOR", "ROLE_TECHNICIAN", "ROLE_PARTS_ADVISOR", "ROLE_SALES_MANAGER", "ROLE_SALES_AGENT"}
     * )
     * @SWG\Response(
     *     response=200,
     *     description="Return users",
     *     @SWG\Items(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=User::class, groups={"user_list"})),
     *         description="first name, last name, email, phone, roles, active, last login"
     *     )
     * )
     *
     * @param Request        $request
     * @param UserRepository $userRepo
     * @param UserHelper     $userHelper
     *
     * @return Response
     */
    public function getUsers (Request $request, UserRepository $userRepo, UserHelper $userHelper) {
        $role = $request->query->get('role');

        // role is invalid
        if (!$role || !$userHelper->isValidRole($role)) {
            return $this->handleView($this->view('Invalid Role Parameter', Response::HTTP_BAD_REQUEST));
        }

        $users = $userRepo->getUserByRole($role);

        return $this->userView($users);
    }

    /**
     * @Rest\Post("/api/users")
     *
     * @SWG\Tag(name="Users")
     * @SWG\Post(description="Create a new user")
     *
     * @SWG\Parameter(
     *     name="role",
     *     in="query",
     *     required=true,
     *     type="string",
     *     description="permission role for users you are trying to get",
     *     enum={"ROLE_ADMIN", "ROLE_SERVICE_MANAGER", "ROLE_SERVICE_ADVISOR", "ROLE_TECHNICIAN", "ROLE_PARTS_ADVISOR", "ROLE_SALES_MANAGER", "ROLE_SALES_AGENT"}
     * )
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
     * @SWG\Parameter(
     *     name="pin",
     *     in="formData",
     *     required=false,
     *     type="string",
     *     description="The Pin of User",
     * )
     * @SWG\Parameter(
     *     name="certification",
     *     in="formData",
     *     required=false,
     *     type="string",
     *     description="The certification of Technician",
     * )
     * @SWG\Parameter(
     *     name="experience",
     *     in="formData",
     *     required=false,
     *     type="string",
     *     description="The experience of Technician",
     * )
     *
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "Successfully created" }),
     *         )
     * )
     *
     * @param Request                $request
     * @param EntityManagerInterface $em
     * @param UserHelper             $userHelper
     *
     * @return Response
     */
    public function new (Request $request, EntityManagerInterface $em, UserHelper $userHelper) {
        $role          = $request->get('role');
        $firstName     = $request->get('firstName');
        $lastName      = $request->get('lastName');
        $email         = $request->get('email');
        $phone         = $request->get('phone');
        $password      = $request->get('password');
        $pin           = $request->get('pin');
        $certification = $request->get('certification');
        $experience    = $request->get('experience');

        //role is invalid
        if (!$role || !$userHelper->isValidRole($role)) {
            return $this->handleView($this->view('Invalid Role Parameter', Response::HTTP_BAD_REQUEST));
        }

        //check if parameters are valid
        if (!$firstName || !$lastName || !$email || !$phone || !$password) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }
        if ($role == 'ROLE_TECHNICIAN' && (!$certification || !$experience)) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        $user = new User();
        $user->setFirstName($firstName)
             ->setLastName($lastName)
             ->setEmail($email)
             ->setPhone($phone)
             ->setPin($pin)
             ->setPassword($userHelper->passwordEncoder($user, $password))
             ->setRole($role);

        if ($role == 'ROLE_TECHNICIAN') {
            $user->setCertification($certification)
                 ->setExperience($experience);
        }

        $em->persist($user);
        $em->flush();

        $this->logInfo('New User "' . $user->getFirstName() . '" Created');

        return $this->handleView($this->view([
            'message' => 'New User Created'
        ]));
    }

    /**
     * @Rest\Put("/api/users/{id}")
     *
     * @SWG\Tag(name="Users")
     * @SWG\Put(description="Update a User")
     *
     * @SWG\Parameter(
     *     name="role",
     *     in="query",
     *     required=true,
     *     type="string",
     *     description="permission role for users you are trying to get",
     *     enum={"ROLE_ADMIN", "ROLE_SERVICE_MANAGER", "ROLE_SERVICE_ADVISOR", "ROLE_TECHNICIAN", "ROLE_PARTS_ADVISOR", "ROLE_SALES_MANAGER", "ROLE_SALES_AGENT"}
     * )
     * @SWG\Parameter(
     *     name="firstName",
     *     in="formData",
     *     required=false,
     *     type="string",
     *     description="The First Name of User",
     * )
     * @SWG\Parameter(
     *     name="lastName",
     *     in="formData",
     *     required=false,
     *     type="string",
     *     description="The Last Name of User",
     * )
     * @SWG\Parameter(
     *     name="email",
     *     in="formData",
     *     required=false,
     *     type="string",
     *     description="The Email of User",
     * )
     * @SWG\Parameter(
     *     name="phone",
     *     in="formData",
     *     required=false,
     *     type="string",
     *     description="The Phone of User",
     * )
     * @SWG\Parameter(
     *     name="password",
     *     in="formData",
     *     required=false,
     *     type="string",
     *     description="The Password of User",
     * )
     * @SWG\Parameter(
     *     name="pin",
     *     in="formData",
     *     required=false,
     *     type="string",
     *     description="The Pin of User",
     * )
     * @SWG\Parameter(
     *     name="certification",
     *     in="formData",
     *     required=false,
     *     type="string",
     *     description="The certification of Technician",
     * )
     * @SWG\Parameter(
     *     name="experience",
     *     in="formData",
     *     required=false,
     *     type="string",
     *     description="The experience of Technician",
     * )
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "Successfully created" }),
     *         )
     * )
     *
     * @param User                   $user
     * @param Request                $request
     * @param EntityManagerInterface $em
     * @param UserHelper             $userHelper
     *
     * @return Response
     */
    public function edit (User $user, Request $request, EntityManagerInterface $em, UserHelper $userHelper) {
        $role          = $request->get('role');
        $firstName     = $request->get('firstName');
        $lastName      = $request->get('lastName');
        $email         = $request->get('email');
        $phone         = $request->get('phone');
        $password      = $request->get('password');
        $pin           = $request->get('pin');
        $certification = $request->get('certification');
        $experience    = $request->get('experience');

        //role is invalid
        if ($role && !$userHelper->isValidRole($role)) {
            return $this->handleView($this->view('Invalid Role Parameter', Response::HTTP_BAD_REQUEST));
        }

        //check if parameters are valid
        if ($role != 'ROLE_TECHNICIAN' && ($certification || $experience)) {
            return $this->handleView($this->view('Certification and Experience is Only for Technicians', Response::HTTP_BAD_REQUEST));
        }

        // update user
        $user->setFirstName($firstName)
             ->setLastName($lastName)
             ->setEmail($email)
             ->setPhone($phone)
             ->setPassword($userHelper->passwordEncoder($user, $password))
             ->setPin($pin)
             ->setRole($role);

        if ($role == 'ROLE_TECHNICIAN') {
            $user->setCertification($certification)
                 ->setExperience($experience);
        }

        $em->persist($user);
        $em->flush();

        $this->logInfo('User "' . $user->getFirstName() . '" Has Been Updated');

        return $this->handleView($this->view([
            'message' => 'User Updated'
        ], Response::HTTP_OK));
    }

    /**
     * @Rest\Delete("/api/users/{id}")
     *
     * @SWG\Tag(name="Users")
     * @SWG\Delete(description="Delete a user")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "Successfully deleted" }),
     *         )
     * )
     *
     * @param User                   $user
     * @param EntityManagerInterface $em
     *
     * @return object|void
     */
    public function delete (User $user, EntityManagerInterface $em) {
        $user->setActive(false);

        $em->persist($user);
        $em->flush();

        return $this->handleView($this->view([
            'message' => 'User Deleted'
        ], Response::HTTP_OK));
    }

    /**
     * @param mixed $data
     *
     * @return Response
     */
    private function userView ($data): Response {
        $view = $this->view($data);
        $view->getContext()->setGroups(['user_list']);

        return $this->handleView($view);
    }
}
