<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Entity\ServiceSMS;
use App\Entity\ServiceSMSLog;
use App\Helper\iServiceLoggerTrait;
use App\Repository\CustomerRepository;
use App\Repository\ServiceSMSRepository;
use App\Service\Pagination;
use App\Service\PhoneValidator;
use App\Service\ServiceSMSHelper;
use App\Service\TwilioHelper;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Knp\Component\Pager\PaginatorInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\CssSelector\Exception\InternalErrorException;
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
        CustomerRepository $customerRepo
    ) {
        $customerID = $request->get('customerID');
        $message = $request->get('message');

        if (!$customerID || !$message) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        $customer = $customerRepo->find($customerID);
        if (!$customer) {
            return $this->handleView($this->view('Customer Does Not Exist', Response::HTTP_BAD_REQUEST));
        }

        // send message to a customer
        try {
            $twilioHelper->sendSms($customer, $message);
        } catch (Exception $e) {
            throw new InternalErrorException($e);
        }

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

        if ($incoming) {
            return $this->handleView($this->view('Can not Resend Inbound Message', Response::HTTP_BAD_REQUEST));
        }

        $customer = $customerRepo->find($customerID);
        if (!$customer) {
            return $this->handleView($this->view('Customer Does Not Exist', Response::HTTP_BAD_REQUEST));
        }
        //send message to a customer
        $sid = $twilioHelper->sendSms($customer, $twilioHelper->Decode($message));

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
     * * @SWG\Parameter(
     *     name="searchTerm",
     *     type="string",
     *     description="Search Value",
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
        ServiceSMSHelper $helper
    ): Response {
        $page = $request->query->getInt('page', 1);
        $searchTerm = $request->query->get('searchTerm', '');
        $pageLimit = $request->query->getInt('pageLimit', self::PAGE_LIMIT);
        $result = $helper->getThreads($searchTerm);
        $pager = $paginator->paginate($result, $page, $pageLimit);
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
