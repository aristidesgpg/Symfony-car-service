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
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Swagger\Annotations as SWG;


use App\Service\UserHelper;
use App\Service\SecurityHelper;
use App\Service\MailerHelper;

/**
 * Class SecurityController
 *
 * @package App\Controller
 */
class SecurityController extends AbstractFOSRestController {
    use iServiceLoggerTrait;

    /**
     * @Rest\Post("/api/security/{id}/set")
     * 
     * @SWG\Tag(name="Security")
     * @SWG\Post(description="Set Security question and answer for a User")
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
     *                                              "Security Question Has Been Updated" }),
     *         )
     * )
     * 
     * @param User           $user
     * @param Request        $request
     * @param UserHelper     $userHelper
     *
     * @return JsonResponse
     */
    public function security (User $user, Request $request, UserHelper $userHelper) {

        $question = $request->get('question');
        $answer   = $request->get('answer');

        //check if parameters are valid
        if(!$question || !$answer){
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }
        //id is invalid
        if(!$user){
            return $this->handleView($this->view('Invalid ID Parameter', Response::HTTP_BAD_REQUEST));
        }

        $array = [
            'question' => $question,
            'answer'   => strtolower($answer)
        ];

        if(!$userHelper->massAssign($user, $array)){
            return $this->handleView($this->view('Something Went Wrong Trying to Set Security for the User', Response::HTTP_INTERNAL_SERVER_ERROR));
        }

        return new JsonResponse([
            'message' => 'Security Question Has Been Updated'
        ]);
    }

    /**
     * @Rest\Post("/api/security/validate")
     * 
     * @SWG\Tag(name="Security")
     * @SWG\Post(description="Check if security answer is correct")
     * 
     * @SWG\Parameter(
     *     name="email",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Email of the User",
     * )
     * @SWG\Parameter(
     *     name="answer",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Security Answer of the User",
     * )
     * 
     * 
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "Security Question Has Been Validated" }),
     *         )
     * )
     * 
     * @param Request               $request
     * @param SecurityHelper        $securityHelper
     * @param MailerHelper          $mailerHelper
     * @param UserRepository        $userRepo
     * @param UrlGeneratorInterface $urlGenerator
     * 
     * @return JsonResponse
     */
    public function validate (Request $request, SecurityHelper $securityHelper, MailerHelper $mailerHelper, UserRepository $userRepo, UrlGeneratorInterface $urlGenerator) {

        $answer = $request->get('answer');
        $email  = $request->get('email');

        //check if parameter is valid
        if(!$answer || !$email){
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }
        //email is invalid
        $user = $userRepo->findOneByEmail($email);
        if(!$user){
            return $this->handleView($this->view('Invalid Email Parameter', Response::HTTP_BAD_REQUEST));
        }

        if(!$securityHelper->validateSecurity($user, $answer)){
            return $this->handleView($this->view('Invalid Security Answer', Response::HTTP_UNAUTHORIZED));
        }

        //get reset password token
        $token = $securityHelper->generateToken($email);
        //get reset password request url with token
        $resetPasswordURL = $urlGenerator->generate('app_security_validatetoken', ['token' => $token], UrlGeneratorInterface::ABSOLUTE_URL);
        if(!$mailerHelper->sendMail("Reset Password Link", $email, $resetPasswordURL)){
            return $this->handleView($this->view('Something Went Wrong Trying to Send the Email', Response::HTTP_INTERNAL_SERVER_ERROR));
        }
        
        return new JsonResponse([
            'message' => 'Security Question Has Been Validated'
        ]);
    }

    /**
     * @Rest\Get("/api/security/reset-password/{token}")
     * 
     * @SWG\Tag(name="Security")
     * @SWG\Get(description="Validate Password Reset token")
     * 
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "Reset Password Token Has Been Validated" }),
     *         )
     * )
     * 
     * @param String         $token
     * @param SecurityHelper $securityHelper
     * @param UserRepository $userRepo
     *
     * @return JsonResponse
     */
    public function validateToken (String $token, SecurityHelper $securityHelper, UserRepository $userRepo) {

        //check if parameter is valid
        if(!$token){
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }
        //token is invalid
        if(!$securityHelper->validateToken($token)){
            return $this->handleView($this->view('Invalid Token', Response::HTTP_UNAUTHORIZED));
        }
        
        return new JsonResponse([
            'message' => 'Reset Password Token Has Been Validated'
        ]);
    }

    /**
     * @Rest\Post("/api/security/reset-password")
     * 
     * @SWG\Tag(name="Security")
     * @SWG\Post(description="Reset User Password")
     * 
     * @SWG\Parameter(
     *     name="token",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Reset Password Token of the User",
     * )
     * @SWG\Parameter(
     *     name="password",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The New Password of the User",
     * )
     * 
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "Password Has Been Reset" }),
     *         )
     * )
     * 
     * @param Request        $request
     * @param SecurityHelper $securityHelper
     * @param UserRepository $userRepo
     *
     * @return JsonResponse
     */
    public function resetPassword (Request $request, SecurityHelper $securityHelper, UserRepository $userRepo) {

        $token    = $request->get('token');
        $password = $request->get('password');

        //check if parameter is valid
        if(!$password || !$token){
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }
        //token is invalid
        if(!$securityHelper->validateToken($token)){
            return $this->handleView($this->view('Invalid Token', Response::HTTP_UNAUTHORIZED));
        }

        if(!$securityHelper->resetPassword($token, $password)){
            return $this->handleView($this->view('Something Went Wrong Trying to Reset the Password', Response::HTTP_INTERNAL_SERVER_ERROR));
        }

        return new JsonResponse([
            'message' => 'Password Has Been Reset'
        ]);
    }
}
