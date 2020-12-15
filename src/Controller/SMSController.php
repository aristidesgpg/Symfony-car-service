<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Customer;
use App\Entity\SMSService;
use App\Repository\UserRepository;
use App\Repository\CustomerRepository;
use App\Repository\SMSServiceRepository;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Swagger\Annotations as SWG;
use App\Helper\iServiceLoggerTrait;
use App\Service\TwilioHelper;

/**
 * Class SMSController
 *
 * @package App\Controller
 */
class SMSController extends AbstractFOSRestController {
    use iServiceLoggerTrait;

    /**
     * @Rest\Post("/api/messages/send")
     *
     * @SWG\Tag(name="Messages")
     * @SWG\Post(description="Send a message to a customer")
     *
     * @SWG\Parameter(
     *     name="user_id",
     *     in="formData",
     *     required=true,
     *     type="integer",
     *     description="The User ID",
     * )
     * @SWG\Parameter(
     *     name="customer_id",
     *     in="formData",
     *     required=true,
     *     type="integer",
     *     description="The Customer ID",
     * )
     * @SWG\Parameter(
     *     name="message",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The message body",
     * )
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "Message Was Sent" }),
     *         )
     * )
     *
     * @param Request                $request
     * @param TwilioHelper           $twilioHelper
     * @param EntityManagerInterface $em
     * @param CustomerRepository     $customerRepo
     * @param UserRepository         $userRepo
     *
     * @return Response
     */
    public function send (
        Request                $request, 
        TwilioHelper           $twilioHelper, 
        EntityManagerInterface $em,
        CustomerRepository     $customerRepo,
        UserRepository         $userRepo
    ) {
        $userID     = $request->get('user_id');
        $customerID = $request->get('customer_id');
        $message    = $request->get('message');

        //check if parameters are valid
        if (!$customerID || !$message) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }
        //check if user exists
        $user     = $userRepo->findBy(["id" => $userID]);
        if(!$user){
            return $this->handleView($this->view('User Does Not Exist', Response::HTTP_BAD_REQUEST));
        }
        //check if cusomter exists
        $customer = $customerRepo->findBy(["id" => $customerID]);
        if(!$customer){
            return $this->handleView($this->view('Customer Does Not Exist', Response::HTTP_BAD_REQUEST));
        }
        //save message
        $smsService = new SMSService();
        $smsService->setUser($user)
                   ->setCustomer($customer)
                   ->setPhone($customer->getPhone())
                   ->setMessage($message)
                   ->setIncoming(false);

        $em->persist($smsService);
        $em->flush();

        //send message to a customer
        $twilioHelper->sendSms($customer->getPhone(), $message);

        return $this->handleView($this->view([
            'message' => 'Message Was Sent'
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
        if (!$mailerHelper->sendMail("Reset Password Link", $email, $resetPasswordURL)) {
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
     * @return Response
     */
    public function resetPassword (Request $request, SecurityHelper $securityHelper, UserRepository $userRepo) {
        $token    = $request->get('token');
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
            'message' => 'Password Has Been Reset'
        ], Response::HTTP_OK));
    }
}
