<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Entity\ServiceSMS;
use App\Entity\ServiceSMSLog;
use App\Helper\iServiceLoggerTrait;
use App\Repository\CustomerRepository;
use App\Repository\ServiceSMSRepository;
use App\Repository\UserRepository;
use App\Service\Pagination;
use App\Service\PhoneValidator;
use App\Service\TwilioHelper;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Knp\Component\Pager\PaginatorInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class ServiceSMSController extends AbstractFOSRestController
{
    use iServiceLoggerTrait;

    private const PAGE_LIMIT = 100;

    /**
     * @Rest\Post("/api/service-sms/send")
     *
     * @SWG\Tag(name="Service SMS")
     * @SWG\Post(description="Send a message to a customer")
     *
     * @SWG\Parameter(
     *     name="userID",
     *     in="formData",
     *     required=true,
     *     type="integer",
     *     description="The User ID",
     * )
     * @SWG\Parameter(
     *     name="customerID",
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
     * @return Response
     * @throws Exception
     */
    public function send(
        Request $request,
        TwilioHelper $twilioHelper,
        EntityManagerInterface $em,
        CustomerRepository $customerRepo,
        UserRepository $userRepo
    ) {
        $userID = $request->get('userID');
        $customerID = $request->get('customerID');
        $message = $request->get('message');

        // check if parameters are valid
        if (!$customerID || !$message) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        // check if user exists
        $user = $userRepo->find($userID);
        if (!$user) {
            return $this->handleView($this->view('User Does Not Exist', Response::HTTP_BAD_REQUEST));
        }

        // check if customer exists
        $customer = $customerRepo->find($customerID);
        if (!$customer) {
            return $this->handleView($this->view('Customer Does Not Exist', Response::HTTP_BAD_REQUEST));
        }

        // send message to a customer
        $sid = $twilioHelper->sendSms($customer->getPhone(), $message);

        // save message
        $serviceSMS = new ServiceSMS();
        $serviceSMS->setUser($user)
                   ->setCustomer($customerID)
                   ->setPhone($customer->getPhone())
                   ->setMessage($twilioHelper->Encode($message))
                   ->setIncoming(false)
                   ->setIsRead(true)
                   ->setSid($sid);

        $em->persist($serviceSMS);
        $em->flush();

        return $this->handleView(
            $this->view(
                [
                    'message' => 'Message Was Sent',
                ],
                Response::HTTP_OK
            )
        );
    }

    /**
     * @Rest\Post("/api/service-sms/{id}/resend")
     *
     * @SWG\Tag(name="Service SMS")
     * @SWG\Post(description="Resend a message to a customer")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "Message Was Resent" }),
     *         )
     * )
     *
     * @return Response
     * @throws Exception
     */
    public function resend(
        ServiceSMS $serviceSMS,
        TwilioHelper $twilioHelper,
        CustomerRepository $customerRepo,
        EntityManagerInterface $em
    ) {
        $customerID = $serviceSMS->getCustomer();
        $message = $serviceSMS->getMessage();
        $incoming = $serviceSMS->getIncoming();

        //check if message is inbound
        if ($incoming) {
            return $this->handleView($this->view('Can not Resend Inbound Message', Response::HTTP_BAD_REQUEST));
        }

        //check if customer exists
        $customer = $customerRepo->find($customerID);
        if (!$customer) {
            return $this->handleView($this->view('Customer Does Not Exist', Response::HTTP_BAD_REQUEST));
        }
        //send message to a customer
        $sid = $twilioHelper->sendSms($customer->getPhone(), $twilioHelper->Decode($message));

        //update serviceSMS
        $serviceSMS->setIncoming(false)
                   ->setSid($sid)
                   ->setIsRead(true);

        $em->persist($serviceSMS);
        $em->flush();

        return $this->handleView(
            $this->view(
                [
                    'message' => 'Message Was Resent',
                ],
                Response::HTTP_OK
            )
        );
    }

    /**
     * @Rest\Post("/api/service-sms/twilio-incoming")
     *
     * @SWG\Tag(name="Service SMS")
     * @SWG\Post(description="Receive a message from a customer")
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
     * @throws Exception
     */
    public function incomingAction(
        Request $request,
        EntityManagerInterface $em,
        CustomerRepository $customerRepo,
        PhoneValidator $phoneValidator,
        TwilioHelper $twilioHelper
    ): Response {
        $message = $request->get('Body');
        $from = $request->get('From');
        $to = $request->get('To');
        $sid = $request->get('MessageSid');
        $phone = $phoneValidator->clean($from);
        $customer = $customerRepo->findOneBy(['phone' => $phone]);

        if ($customer) {
            $serviceSMS = new ServiceSMS();
            $serviceSMS->setCustomer($customer)
                       ->setPhone($phone)
                       ->setMessage($twilioHelper->Encode($message))
                       ->setSid($sid)
                       ->setIncoming(true);
            $em->persist($serviceSMS);
            $em->flush();

            $response = new Response('<Response><Response />', Response::HTTP_OK);
        } else {
            $errorLog = 'Incoming message from '.$from.' to '.$to.'. No customer has this phone number.';

            $serviceSMSLog = new ServiceSMSLog();
            $serviceSMSLog->setError($errorLog);
            $em->persist($serviceSMSLog);
            $em->flush();

            $response = new Response("<Response>{$errorLog}</Response>", Response::HTTP_NOT_ACCEPTABLE);
        }

        $response->headers->set('Content-Type', 'text/xml');

        return $response;
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
     */
    public function serviceMessages(
        Customer $customer,
        ServiceSMSRepository $serviceSMSRepo
    ): Response {
        //get service messages
        $messages = $serviceSMSRepo->findBy(['customer' => $customer->getId()]);

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
     * @SWG\Parameter(
     *     name="page",
     *     type="integer",
     *     description="Page of results",
     *     in="query"
     * )
     * @SWG\Parameter(
     *     name="pageLimit",
     *     type="integer",
     *     description="Page Limit",
     *     in="query"
     * )
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
     * * @SWG\Response(
     *     response=403,
     *     description="Permision Denied",
     * )
     */
    public function getThreads(
        Request $request,
        PaginatorInterface $paginator,
        UrlGeneratorInterface $urlGenerator,
        EntityManagerInterface $em
    ): Response {
        $page = $request->query->getInt('page', 1);
        $user = $this->getUser();
        $role = $user->getRoles();
        $shareRepairOrders = $user->getShareRepairOrders();

        $pageLimit = $request->query->getInt('pageLimit', self::PAGE_LIMIT);

        if ($role[0] == 'ROLE_ADMIN' || $role[0] == 'ROLE_SERVICE_MANAGER') {
            $threadQuery = "SELECT c.id, c.name,ss.date, ss.message, ss2.unread
                            FROM (select * from service_sms where date In (select max(date) from service_sms group by user_id ,customer_id)) ss
                            LEFT JOIN customer c ON c.id = ss.customer_id
                            LEFT JOIN (select user_id, customer_id, SUM(CASE WHEN is_read = 0 THEN 1 ELSE 0 END) AS unread from service_sms group by user_id, customer_id) ss2 on (ss2.user_id = ss.user_id and ss2.customer_id=ss.customer_id)
                            group by ss.user_id, ss.customer_id
                            order by ss2.unread DESC, ss.date DESC";

        } else {
            if ($role[0] == 'ROLE_SERVICE_ADVISOR') {
                if ($shareRepairOrders) {
                    $threadQuery = "SELECT c.id, c.name,ss.date, ss.message, ss2.unread
                            FROM (select * from service_sms where date In (select max(date) from service_sms group by user_id ,customer_id)) ss
                            LEFT JOIN customer c ON c.id = ss.customer_id
                            LEFT JOIN (select user_id, customer_id, SUM(CASE WHEN is_read = 0 THEN 1 ELSE 0 END) AS unread from service_sms group by user_id, customer_id) ss2 on (ss2.user_id = ss.user_id and ss2.customer_id=ss.customer_id)
                            Where ss.user_id In (select id from user where share_repair_orders=1)
                            group by ss.user_id, ss.customer_id
                            order by ss2.unread DESC, ss.date DESC";
                } else {
                    $threadQuery = "SELECT c.id, c.name,ss.date, ss.message, ss2.unread
                            FROM (select * from service_sms where date In (select max(date) from service_sms group by user_id ,customer_id)) ss
                            LEFT JOIN customer c ON c.id = ss.customer_id
                            LEFT JOIN (select user_id, customer_id, SUM(CASE WHEN is_read = 0 THEN 1 ELSE 0 END) AS unread from service_sms group by user_id, customer_id) ss2 on (ss2.user_id = ss.user_id and ss2.customer_id=ss.customer_id)
                            Where ss.user_id = '".$user->getId()."'
                            group by ss.user_id, ss.customer_id
                            order by ss2.unread DESC, ss.date DESC";
                }
            } else {
                return $this->handleView($this->view('Permission Denied', Response::HTTP_FORBIDDEN));
            }
        }

        $em = $this->getDoctrine()->getManager();
        $statement = $em->getConnection()->prepare($threadQuery);
        $statement->execute();

        $pager = $paginator->paginate($statement->fetchAll(), $page, $pageLimit);
        $pagination = new Pagination($pager, $pageLimit, $urlGenerator);

        $view = $this->view(
            [
                'results' => $pager->getItems(),
                'totalResults' => $pagination->totalResults,
                'totalPages' => $pagination->totalPages,
                'previous' => $pagination->getPreviousPageURL('app_servicesms_getthreads'),
                'currentPage' => $pagination->currentPage,
                'next' => $pagination->getNextPageURL('app_servicesms_getthreads'),
            ]
        );

        return $this->handleView($view);
    }

    /**
     * @Rest\Post("/api/service-sms/status-callback")
     *
     * @SWG\Tag(name="Service SMS")
     * @SWG\Post(description="Get SMS Status Update from Twilio")
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
     * @return Response
     */
    public function statusCallback(
        Request $request,
        EntityManagerInterface $em,
        ServiceSMSRepository $serviceSMSRepo
    ): Response {
        $smsStatus = $request->get('SmsStatus');
        $sid = $request->get('MessageSid');

        //find ServiceSMS by sid and update status
        $serviceSMS = $serviceSMSRepo->findOneBy(['sid' => $sid]);

        if (!$serviceSMS) {
            $response = new Response(
                '<Response>Error finding the associated service SMS</Response>',
                Response::HTTP_NOT_ACCEPTABLE
            );
            $response->headers->set('Content-Type', 'text/xml');

            return $response;
        }

        $serviceSMS->setStatus($smsStatus);

        $em->persist($serviceSMS);
        $em->flush();

        $response = new Response('<Response></Response>', Response::HTTP_OK);
        $response->headers->set('Content-Type', 'text/xml');

        return $response;
    }
}
