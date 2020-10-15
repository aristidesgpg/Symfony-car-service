<?php

namespace App\Controller;

use App\Entity\User;
use App\Helper\iServiceLoggerTrait;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
     * @param UserHelper     $userHelper
     *
     * @return Response
     */
    public function getUsers (String $role, UserRepository $userRepo, UserHelper $userHelper) {

        //role is invalid
        if(!$role || !$userHelper->isValidRole($role)){
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
     *     name="role",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Role of User",
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
     * @return JsonResponse
     */
    public function new (Request $request, EntityManagerInterface $em,UserHelper $userHelper) {
        
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
        if(!$role || !$userHelper->isValidRole($role)){
            return $this->handleView($this->view('Invalid Role Parameter', Response::HTTP_BAD_REQUEST));
        }

        //check if parameters are valid
        if(!$firstName || !$lastName || !$email || !$phone || !$password){
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }
        if($role == 'ROLE_TECHNICIAN' && (!$certification || !$experience)){
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }
        
        $user = new User();
        $roles = [];
        array_push($roles, $role);
        $user->setFirstName($firstName)
             ->setLastName($lastName)
             ->setEmail($email)
             ->setPhone($phone)
             ->setPin($pin)
             ->setPassword($userHelper->passwordEncoder($user, $password))
             ->setRoles($roles);

        if($role == 'ROLE_TECHNICIAN'){
            $user->setCertification($certification)
                 ->setExperience($experience);
        }

        $em->persist($user);
        $em->flush();

        $this->logInfo('New User "' . $user->getFirstName() . '" Created');

        return new JsonResponse([
            'message' => 'New User Created'
        ]);
    }

    /**
     * @Rest\Put("/api/user/{id}/edit")
     * 
     * @SWG\Tag(name="Users")
     * @SWG\Put(description="Update a User")
     * 
     * @SWG\Parameter(
     *     name="role",
     *     in="formData",
     *     required=false,
     *     type="string",
     *     description="The Role of User",
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
     * @return JsonResponse
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
        if($role && !$userHelper->isValidRole($role)){
            return $this->handleView($this->view('Invalid Role Parameter', Response::HTTP_BAD_REQUEST));
        }

        //check if parameters are valid
        if($role != 'ROLE_TECHNICIAN' && ($certification || $experience)){
            return $this->handleView($this->view('Certification and Experience is Only for Technicians', Response::HTTP_BAD_REQUEST));
        }

        $roles = [];
        array_push($roles, $role);
        $array = [
            'roles'         => $roles,
            'firstName'     => $firstName,
            'lastName'      => $lastName,
            'email'         => $email,
            'phone'         => $phone,
            'password'      => $password,
            'pin'           => $pin,
            'certification' => $certification,
            'experience'    => $experience
        ];

        if(!$userHelper->massAssign($user, $array)){
            return $this->handleView($this->view('Something Went Wrong Trying to Update the User', Response::HTTP_INTERNAL_SERVER_ERROR));
        }

        $this->logInfo('User "' . $user->getFirstName() . '" Has Been Updated');

        return new JsonResponse([
            'message' => 'User Updated'
        ]);
    }

    /**
     * @Rest\Put("/api/user/{id}/security")
     * 
     * @SWG\Tag(name="Users")
     * @SWG\Put(description="Set Security question and answer for a User")
     * 
     * @SWG\Parameter(
     *     name="question",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Security Question of a User",
     * )
     * @SWG\Parameter(
     *     name="answer",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Security Answer of a User",
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
     * @param User                   $user
     * @param Request                $request
     * @param EntityManagerInterface $em
     * @param UserHelper             $userHelper
     *
     * @return JsonResponse
     */
    public function security (User $user, Request $request, EntityManagerInterface $em, UserHelper $userHelper) {

        $question = $request->get('question');
        $answer   = $request->get('answer');

        //check if parameters are valid
        if(!$question || !$answer){
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        $array = [
            'question' => $question,
            'answer'    => strtolower($answer)
        ];

        if(!$userHelper->massAssign($user, $array)){
            return $this->handleView($this->view('Something Went Wrong Trying to Set Security for the User', Response::HTTP_INTERNAL_SERVER_ERROR));
        }

        return new JsonResponse([
            'message' => 'Security Questions Has Been Updated'
        ]);
    }

    /**
     * @Rest\Delete("/api/user/{id}/delete")
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

        return $this->handleView($this->view('User Deleted', Response::HTTP_OK));
    }
}
