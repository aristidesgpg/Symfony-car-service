<?php

namespace App\Controller;

use App\Entity\User;
use App\Helper\iServiceLoggerTrait;
use App\Repository\UserRepository;
use App\Service\MailerHelper;
use App\Service\SecurityHelper;
use App\Service\UserHelper;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Class SecurityController.
 */
class SecurityController extends AbstractFOSRestController
{
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
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "Security Question Has Been Updated" }),
     *         )
     * )
     */
    public function security(User $user, Request $request, UserHelper $userHelper, EntityManagerInterface $em): Response
    {
        $question = $request->get('question');
        $answer = $request->get('answer');

        //check if parameters are valid
        if (!$question || !$answer) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        //set security question and answer
        $user->setSecurityQuestion($question)
             ->setSecurityAnswer($userHelper->passwordEncoder($user, strtolower($answer)));

        $em->persist($user);
        $em->flush();

        return $this->handleView($this->view([
            'message' => 'Security Question Has Been Updated',
        ], Response::HTTP_OK));
    }

    /**
     * @Rest\Post("/api/security/get-security-question")
     *
     * @SWG\Tag(name="Security")
     * @SWG\Post(description="Return Security Question")
     *
     * @SWG\Parameter(
     *     name="email",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Email of the User",
     * )
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return Security Question",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="security question", example={"status":
     *                                              "What is your name?" }),
     *         )
     * )
     */
    public function getSecurityQuestion(Request $request, UserRepository $userRepo): Response
    {
        $email = $request->get('email');

        // check if parameter is valid
        if (!$email) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        // email is invalid
        $user = $userRepo->findOneBy(['email' => $email]);
        if (!$user) {
            return $this->handleView($this->view('Invalid Email Parameter', Response::HTTP_BAD_REQUEST));
        }

        return $this->handleView($this->view([
            'securityQuestion' => $user->getSecurityQuestion(),
        ], Response::HTTP_OK));
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
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "Security Question Has Been Validated" }),
     *         )
     * )
     */
    public function validate(
        Request $request,
        SecurityHelper $securityHelper,
        MailerHelper $mailerHelper,
        UserRepository $userRepo,
        UrlGeneratorInterface $urlGenerator
    ): Response {
        $answer = $request->get('answer');
        $email = $request->get('email');

        // check if parameter is valid
        if (!$answer || !$email) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        // email is invalid
        $user = $userRepo->findOneBy(['email' => $email]);
        if (!$user) {
            return $this->handleView($this->view('Invalid Email Parameter', Response::HTTP_BAD_REQUEST));
        }

        if (!$securityHelper->validateSecurity($user, $answer)) {
            return $this->handleView($this->view('Invalid Security Answer', Response::HTTP_UNAUTHORIZED));
        }

        // get reset password token
        $token = $securityHelper->generateToken($user, $email);

        // get reset password request url with token
        $resetPasswordURL = $urlGenerator->generate('app_security_validatetoken', ['token' => $token], UrlGeneratorInterface::ABSOLUTE_URL);
        if (!$mailerHelper->sendMail('Reset Password Link', $email, $resetPasswordURL)) {
            return $this->handleView($this->view(
                'Something Went Wrong Trying to Send the Email',
                Response::HTTP_INTERNAL_SERVER_ERROR
            ));
        }

        return $this->handleView($this->view([
            'message' => 'Security Question Has Been Validated',
        ], Response::HTTP_OK));
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
     */
    public function validateToken(string $token, SecurityHelper $securityHelper, UserRepository $userRepo): Response
    {
        // check if parameter is valid
        if (!$token) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        // token is invalid
        if (!$securityHelper->validateToken($token)) {
            return $this->handleView($this->view('Invalid Token', Response::HTTP_UNAUTHORIZED));
        }

        return $this->handleView($this->view([
            'message' => 'Reset Password Token Has Been Validated',
        ], Response::HTTP_OK));
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
     */
    public function resetPassword(Request $request, SecurityHelper $securityHelper, UserRepository $userRepo): Response
    {
        $token = $request->get('token');
        $password = $request->get('password');

        // check if parameter is valid
        if (!$password || !$token) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        // token is invalid
        if (!$securityHelper->validateToken($token)) {
            return $this->handleView($this->view('Invalid Token', Response::HTTP_UNAUTHORIZED));
        }

        if (!$securityHelper->resetPassword($token, $password)) {
            return $this->handleView($this->view(
                'Something Went Wrong Trying to Reset the Password',
                Response::HTTP_INTERNAL_SERVER_ERROR
            ));
        }

        return $this->handleView($this->view([
            'message' => 'Password Has Been Reset',
        ], Response::HTTP_OK));
    }
}
