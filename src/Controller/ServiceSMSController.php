<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Customer;
use App\Entity\ServiceSMS;
use App\Repository\UserRepository;
use App\Repository\CustomerRepository;
use App\Repository\ServiceSMSRepository;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Swagger\Annotations as SWG;
use App\Helper\iServiceLoggerTrait;
use App\Service\TwilioHelper;

/**
 * Class ServiceSMSController
 *
 * @package App\Controller
 */
class ServiceSMSController extends AbstractFOSRestController {
    use iServiceLoggerTrait;

    /**
     * @Rest\Post("/api/service-sms/send")
     *
     * @SWG\Tag(name="Service SMS")
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
     * @Rest\Get("/api/customer/{id}/services-messages")
     *
     * @SWG\Tag(name="Service SMS")
     * @SWG\Get(description="Get messages by customer")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=ServiceSMS::class, groups=ServiceSMS::GROUPS)),
     *         description="id, user, customer, phone, message, incoming, is_read, date"
     *     )
     * )
     *
     * @param Customer             $customer
     * @param ServiceSMSRepository $serviceSMSRepo
     *
     * @return Response
     */
    public function serviceMessages (
        Customer             $customer,
        ServiceSMSRepository $serviceSMSRepo
    ) {
        //get service messages
        $messages = $serviceSMSRepo->findBy(["customer_id" => $customer->getId()]);

        $view = $this->view($messages);
        $view->getContext()->setGroups(ServiceSMS::GROUPS);

        return $this->handleView($view);
    }

   /**
     * @Rest\Get("/api/service-sms/threads")
     *
     * @SWG\Tag(name="Service SMS")
     * @SWG\Get(description="Get messages by customer")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return Threads",
     *     @SWG\Items(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=ServiceSMS::class, groups=ServiceSMS::GROUPS)),
     *         description="id, user, customer, phone, message, incoming, is_read, date"
     *     )
     * )
     *
     * @param ServiceSMSRepository $serviceSMSRepos
     *
     * @return Response
     */
    public function getThreads (ServiceSMSRepository $serviceSMSRepos) {
        $user              = $this->getUser();
        $role              = $user->getRoles();
        $shareRepairOrders = $user->getShareRepairOrders();
        //check user role
        if($role[0] == "ROLE_ADMIN" || $role[0] == "ROLE_SERVICE_MANAGER"){

        }
        else if($role[0] == "ROLE_SERVICE_ADVISOR"){
            if($shareRepairOrders){

            }
            else{

            }
        }

        //get service messages
        $messages = $serviceSMSRepos->findBy(["customer_id" => $customer->getId()]);

        $view = $this->view($messages);
        $view->getContext()->setGroups(ServiceSMS::GROUPS);

        return $this->handleView($view);
    }
}
