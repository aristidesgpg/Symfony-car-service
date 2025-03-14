<?php

namespace App\Controller;

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
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Security;

class ServiceSMSController extends AbstractFOSRestController
{
    use iServiceLoggerTrait;

    private const PAGE_LIMIT = 100;

    /**
     * @Rest\Post("/api/service-sms")
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
     *
     * @throws Exception
     */
    public function send(
        Request $request,
        TwilioHelper $twilioHelper,
        CustomerRepository $customerRepo
    )
    {
        $customerID = $request->get('customerID');
        $message = $request->get('message');

        if (!$customerID || !$message) {
            throw new BadRequestHttpException('Missing Required Parameter');
        }

        $customer = $customerRepo->find($customerID);
        if (!$customer) {
            throw new NotFoundHttpException('Customer Does Not Exist');
        }

        // send message to a customer
        try {
            $twilioHelper->sendSms($customer, $message);
        } catch (Exception $e) {
            throw new BadRequestHttpException($e->getMessage());
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
    ): Response
    {
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

            // We got a message, mark it confirmed mobile
            if (!$customer->getMobileConfirmed()) {
                $customer->setMobileConfirmed(true);
                $em->persist($customer);
            }

            $em->beginTransaction();
            $em->persist($serviceSMS);
            try {
                $em->flush();
                $em->commit();
            } catch (Exception $e) {
                $em->rollback();

                $response = new Response('<Response>' . $e->getMessage() . '</Response>', Response::HTTP_OK);
                $response->headers->set('Content-Type', 'text/xml');
                return $response;
            }

            $response = new Response('<Response></Response>', Response::HTTP_OK);
        } else {
            $errorLog = 'Incoming message from ' . $from . ' to ' . $to . '. No customer has this phone number.';

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
     * @Rest\Get("/api/service-sms/messages")
     *
     * @SWG\Tag(name="Service SMS")
     * @SWG\Get(description="Get messages by customer")
     *
     * @SWG\Parameter(
     *     name="customer",
     *     type="integer",
     *     description="Customer ID",
     *     in="query"
     * )
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
     *     description="Return status code",
     *     @SWG\Items(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=ServiceSMS::class, groups=ServiceSMS::GROUPS)),
     *         description="id, user, customer, phone, message, incoming, is_read, date"
     *     )
     * )
     */
    public function serviceMessages(
        Request $request,
        ServiceSMSRepository $serviceSMSRepo,
        CustomerRepository $customerRepo,
        PaginatorInterface $paginator,
        UrlGeneratorInterface $urlGenerator,
        EntityManagerInterface $em
    ): Response
    {
        $page = $request->query->getInt('page', 1);
        $pageLimit = $request->query->getInt('pageLimit', self::PAGE_LIMIT);

        if ($page < 1) {
            throw new BadRequestHttpException('Page number should be more than 1');
        }

        $customerID = $request->query->getInt('customer', null);
        if (!$customerID) {
            throw new BadRequestHttpException('Customer ID is required');
        }
        $customer = $customerRepo->findOneBy(['id' => $customerID]);

        if (!$customer) {
            throw new NotFoundHttpException('Customer ID is invalid');
        }

        $messages = $serviceSMSRepo->findBy(['customer' => $customer->getId()], ['date' => 'DESC']);

        //if authenticated user is ROLE_SERVICE_ADVISOR, then update message statuses
        $user = $this->getUser();
        if (in_array('ROLE_SERVICE_ADVISOR', $user->getRoles())) {
            foreach ($messages as $message) {
                $message->setIsRead(true);
                $em->persist($message);
            }

            $em->beginTransaction();
            try {
                $em->flush();
                $em->commit();
            } catch (Exception $e) {
                // nothing, need to return results
                $this->logInfo('Failed to mark thread as read. user:' . $user->getId() . '|customer:' . $customer->getId());
            }
        }

        $pager = $paginator->paginate($messages, $page, $pageLimit);
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
     * @SWG\Parameter(
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
     * @SWG\Response(
     *     response=403,
     *     description="Permision Denied",
     * )
     */
    public function getThreads(
        Request $request,
        PaginatorInterface $paginator,
        UrlGeneratorInterface $urlGenerator,
        ServiceSMSHelper $helper
    ): Response
    {
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
     * @Rest\Post("/api/service-sms/mark-read")
     *
     * @SWG\Tag(name="Service SMS")
     * @SWG\Post(description="Mark thread as read")
     *
     * @SWG\Parameter(
     *     name="customerID",
     *     in="formData",
     *     required=true,
     *     type="integer",
     *     description="The Customer ID",
     * )
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return Thread",
     *     @SWG\Items(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=ServiceSMS::class, groups=ServiceSMS::GROUPS)),
     *         description="id, user, customer, phone, message, incoming, is_read, date"
     *     )
     * )
     * @SWG\Response(
     *     response=403,
     *     description="Permision Denied",
     * )
     */
    public function markRead(
        Request $request,
        ServiceSMSHelper $helper,
        Security $security,
        ServiceSMSRepository $serviceSMSRepo,
        EntityManagerInterface $em
    ): Response
    {
        $customerID = $request->get('customerID');
        // Check param is valid
        if (!$customerID) {
            throw new BadRequestHttpException('Missing Required Parameter');
        }
        // Check if user has permission
        if (!$security->isGranted('ROLE_ADMIN') && !$security->isGranted('ROLE_SERVICE_MANAGER')) {
            throw new BadRequestHttpException('The user should be admin or service manager');
        }
        // Mark all incoming messages as read from the customer
        $messages = $serviceSMSRepo->findBy(['customer' => $customerID, 'incoming' => 1, 'isRead' => 0]);
        foreach ($messages as $message) {
            $message->setIsRead(true);
            $em->persist($message);
        }
        $em->flush();

        $view = $this->view($messages);
        $view->getContext()->setGroups(ServiceSMS::GROUPS);

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
     */
    public function statusCallback(
        Request $request,
        EntityManagerInterface $em,
        ServiceSMSRepository $serviceSMSRepo
    ): Response
    {
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
