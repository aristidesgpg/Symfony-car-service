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
     * @return Response
     */
    public function validate (Request $request, SecurityHelper $securityHelper, MailerHelper $mailerHelper,
                              UserRepository $userRepo, UrlGeneratorInterface $urlGenerator) {
        $answer = $request->get('answer');
        $email  = $request->get('email');

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
        try {
            $emailBody = $mailerHelper->renderEmail('email-forgot-password.html.twig', ['link' => $resetPasswordURL]);
            $emailBody['text'] = "Follow this link to reset password: {$resetPasswordURL}";
            if (!$mailerHelper->sendHtmlMail("Reset Password Link", $email, $emailBody)) {
                throw new \Exception('Could not send mail');
            }
        } catch (\Throwable $e) {
            return $this->handleView($this->view(
                'Something Went Wrong Trying to Send the Email', Response::HTTP_INTERNAL_SERVER_ERROR
            ));
        }

        return $this->handleView($this->view([
            'message' => 'Security Question Has Been Validated'
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
     *
     * @param String         $token
     * @param SecurityHelper $securityHelper
     * @param UserRepository $userRepo
     *
     * @return Response
     */
    public function validateToken (string $token, SecurityHelper $securityHelper, UserRepository $userRepo) {
        // check if parameter is valid
        if (!$token) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        // token is invalid
        if (!$securityHelper->validateToken($token)) {
            return $this->handleView($this->view('Invalid Token', Response::HTTP_UNAUTHORIZED));
        }

        return $this->handleView($this->view([
            'message' => 'Reset Password Token Has Been Validated'
        ], Response::HTTP_OK));
    }
}
