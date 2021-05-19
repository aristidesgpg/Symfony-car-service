<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Entity\RepairOrder;
use App\Entity\RepairOrderQuote;
use App\Entity\RepairOrderQuoteInteraction;
use App\Helper\iServiceLoggerTrait;
use App\Repository\RepairOrderQuoteRecommendationRepository;
use App\Repository\RepairOrderQuoteRepository;
use App\Repository\RepairOrderRepository;
use App\Service\RepairOrderHelper;
use App\Service\RepairOrderQuoteHelper;
use App\Service\RepairOrderQuoteLogHelper;
use App\Service\SettingsHelper;
use App\Service\ShortUrlHelper;
use App\Service\TwilioHelper;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Security;

class RepairOrderQuoteController extends AbstractFOSRestController
{
    use iServiceLoggerTrait;

    private const PAGE_LIMIT = 100;

    /**
     * @Rest\Get("/api/repair-order-quote/{id}")
     *
     * @SWG\Tag(name="Repair Order Quote")
     * @SWG\Get(description="Get Repair Order Quote")
     *
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(ref=@Model(type=RepairOrderQuote::class, groups=RepairOrderQuote::GROUPS))
     * )
     *
     * @SWG\Response(response="404", description="ROQ does not exist")
     *
     * @return Response
     */
    public function getRepairOrderQuote(RepairOrderQuote $repairOrderQuote, RepairOrderQuoteHelper $helper)
    {
//        // Check if customer role and not customer's RO
//        if ($this->isGranted('ROLE_CUSTOMER')) {
//            if ($repairOrderQuote->getRepairOrder()->getPrimaryCustomer()->getId() != $this->getUser()->getId()) {
//                return $this->handleView($this->view('Not Authorized', Response::HTTP_UNAUTHORIZED));
//            }
//        }

        $groups = array_merge(RepairOrderQuote::GROUPS, ['roq_log', 'user_list', 'customer_list']);
        $view = $this->view($repairOrderQuote);
        $view->getContext()->setGroups($groups);

        return $this->handleView($view);
    }

    /**
     * @Rest\Post("/api/repair-order-quote")
     *
     * @SWG\Tag(name="Repair Order Quote")
     * @SWG\Post(description="Create a new Repair Order Quote")
     *
     * @SWG\Parameter(
     *     name="repairOrderID",
     *     in="formData",
     *     required=true,
     *     type="integer",
     *     description="The Repair Order ID",
     * )
     * @SWG\Parameter(
     *     name="recommendations",
     *     in="formData",
     *     required=false,
     *     type="string",
     *     description="[{""operationCode"":""CCAF"", ""description"":""Neque maxime ex dolorem ut."",""preApproved"":true,""approved"":true,""laborHours"":5,""partsPrice"":1.0,""suppliesPrice"":14.02,""laborPrice"":5.3,""laborTax"":5.3,""partsTax"":2.1,""suppliesTax"":4.3, ""laborTaxable"":true, ""partsTaxable"":true,""suppliesTaxable"":true ,""notes"":""Cumque tempora ut nobis."", ""parts"":[{""number"":""34843434"", ""name"":""name1"", ""price"":23.3, ""quantity"":23,""bin"":""eifkdo838f833kd9""}, {""number"":""12254345"", ""name"":""name2"", ""price"":13.3, ""quantity"":13,""bin"":""dkf939f8d8f8dd""}]},{""operationCode"":""ACRS"", ""description"":""Quidem earum sapiente at dolores quia natus."",""preApproved"":false,""approved"":true,""laborHours"":7,""partsPrice"":2.6,""suppliesPrice"":509.02,""laborPrice"":36.9,""laborTax"":4.3,""partsTax"":2.4,""suppliesTax"":4.1,""laborTaxable"":true, ""partsTaxable"":true,""suppliesTaxable"":true ,""notes"":""Et accusantium rerum.""},{""operationCode"":""ALIGNMENT"", ""description"":""Mollitia unde nobis doloribus sed."",""preApproved"":true,""approved"":false,""laborHours"":15,""partsPrice"":1.1,""suppliesPrice"":71.7,""laborPrice"":55.1,""laborTax"":5.1,""partsTax"":2.6,""suppliesTax"":3.3,""laborTaxable"":true, ""partsTaxable"":true,""suppliesTaxable"":true ,""notes"":""Voluptates et aut debitis.""}]",
     * )
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "Successfully Created" }),
     *         )
     * )
     */
    public function createRepairOrderQuote(
        Request $request,
        RepairOrderRepository $repairOrderRepository,
        RepairOrderQuoteRepository $repairOrderQuoteRepository,
        EntityManagerInterface $em,
        RepairOrderQuoteHelper $helper,
        RepairOrderQuoteLogHelper $repairOrderQuoteLoghelper,
        Security $security
    ) {
        if ($security->isGranted('ROLE_CUSTOMER')) {
            throw new BadRequestHttpException('The user should be service user');
        }

        $repairOrderID = $request->get('repairOrderID');
        $recommendations = $request->get('recommendations');

        // check if params are valid
        if (!$repairOrderID) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        // Check if Repair Order exists
        $repairOrder = $repairOrderRepository->findByUID($repairOrderID);
        if (!$repairOrder) {
            throw new NotFoundHttpException('Repair Order not found');
        }

        // Check if there is a quote already
        $exists = $repairOrderQuoteRepository->findOneBy(['repairOrder' => $repairOrder]);
        if ($exists) {
            throw new BadRequestHttpException('A quote already exists for this Repair Order');
        }

        // Validate recommendation json
        $recommendations = json_decode($recommendations);
        if (is_null($recommendations) || !is_array($recommendations) || 0 === count($recommendations)) {
            throw new BadRequestHttpException('Recommendations data is invalid');
        }

        // store repairOrderQuote
        $repairOrderQuote = new RepairOrderQuote();

        $repairOrder->setRepairOrderQuote($repairOrderQuote);

        try {
            $helper->validateRecommendationsJson($recommendations);

            $helper->buildRecommendations($repairOrderQuote, $recommendations);
        } catch (Exception $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        $status = $helper->getProgressStatus();

        // Create RepairOrderQuoteInteraction
        $repairOrderQuoteInteraction = new RepairOrderQuoteInteraction();
        $repairOrderQuoteInteraction->setUser($repairOrder->getPrimaryTechnician())
            ->setCustomer($repairOrder->getPrimaryCustomer())
            ->setType($status);

        // Update repairOrderQuote Status
        $repairOrderQuote->addRepairOrderQuoteInteraction($repairOrderQuoteInteraction)
            ->setStatus($status);

        // Update repairOrder quote_status
        $repairOrder->setQuoteStatus($status);
        if ('Completed' != $status) {
            $repairOrder->setDateClosed(null);
        }

        $em->persist($repairOrderQuote);

        $em->persist($repairOrder);

        $em->flush();

        $view = $this->view($repairOrderQuote);
        $view->getContext()->setGroups(RepairOrderQuote::GROUPS);

        $data = $this->handleView($view)->getContent();
        $repairOrderQuoteLoghelper->createRepairOrderQuoteLog($repairOrderQuote, $data, $this->getUser());

        return $this->handleView($view);
    }

    /**
     * @Rest\Put("/api/repair-order-quote/{id}")
     *
     * @SWG\Tag(name="Repair Order Quote")
     * @SWG\Put(description="Update a Repair Order Quote")
     * @SWG\Parameter(
     *     name="recommendations",
     *     in="formData",
     *     required=false,
     *     type="string",
     *     description="[{""operationCode"":""CCAF"", ""description"":""Neque maxime ex dolorem ut."",""preApproved"":true,""approved"":true,""laborHours"":5,""partsPrice"":1.0,""suppliesPrice"":14.02,""laborPrice"":5.3,""laborTax"":5.3,""partsTax"":2.1,""suppliesTax"":4.3,""laborTaxable"":true, ""partsTaxable"":true,""suppliesTaxable"":true ,""notes"":""Cumque tempora ut nobis."", ""parts"":[{""number"":""34843434"", ""name"":""name1"", ""price"":23.3, ""quantity"":23,""bin"":""eifkdo838f833kd9""}, {""number"":""12254345"", ""name"":""name2"", ""price"":13.3, ""quantity"":13,""bin"":""dkf939f8d8f8dd""}]},{""operationCode"":""ACRS"", ""description"":""Quidem earum sapiente at dolores quia natus."",""preApproved"":false,""approved"":true,""laborHours"":7,""partsPrice"":2.6,""suppliesPrice"":509.02,""laborPrice"":36.9,""laborTax"":4.3,""partsTax"":2.4,""suppliesTax"":4.1,""laborTaxable"":true, ""partsTaxable"":true,""suppliesTaxable"":true ,""notes"":""Et accusantium rerum.""},{""operationCode"":""ALIGNMENT"", ""description"":""Mollitia unde nobis doloribus sed."",""preApproved"":true,""approved"":false,""laborHours"":15,""partsPrice"":1.1,""suppliesPrice"":71.7,""laborPrice"":55.1,""laborTax"":5.1,""partsTax"":2.6,""suppliesTax"":3.3,""laborTaxable"":true, ""partsTaxable"":true,""suppliesTaxable"":true ,""notes"":""Voluptates et aut debitis.""}]",
     * )
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "Successfully Updated" }),
     *         )
     * )
     *
     * @throws Exception
     */
    public function updateRepairOrderQuote(
        RepairOrderQuote $repairOrderQuote,
        Request $request,
        RepairOrderQuoteHelper $repairOrderQuoteHelper,
        RepairOrderQuoteLogHelper $repairOrderQuoteLoghelper,
        EntityManagerInterface $em,
        Security $security
    ): Response {
        if ($security->isGranted('ROLE_CUSTOMER')) {
            throw new BadRequestHttpException('The user should be service user');
        }
        $recommendations = $request->get('recommendations');

        if (!$recommendations) {
            throw new BadRequestHttpException('Missing Required Parameter: recommendations');
        }

//        // Check permission if quote status is Sent, Completed or Confirmed
//        $quoteStatus = $repairOrderQuote->getStatus();
//        if ('Completed' == $quoteStatus || 'Confirmed' == $quoteStatus) {
//            return $this->handleView($this->view('You cannot edit a completed quote', Response::HTTP_FORBIDDEN));
//        }

        // Validate recommendation json
        $recommendations = json_decode($recommendations);
        if (is_null($recommendations) || !is_array($recommendations) || 0 === count($recommendations)) {
            throw new BadRequestHttpException('Recommendations data is invalid');
        }

        try {
            $repairOrderQuoteHelper->validateRecommendationsJson($recommendations);

            $repairOrderQuoteHelper->buildRecommendations($repairOrderQuote, $recommendations);
        } catch (Exception $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        //Get RepairOrder
        $repairOrder = $repairOrderQuote->getRepairOrder();
        $status = $repairOrderQuoteHelper->getProgressStatus();

        //Create RepairOrderQuoteInteraction
        $repairOrderQuoteInteraction = new RepairOrderQuoteInteraction();
        $repairOrderQuoteInteraction->setUser($repairOrder->getPrimaryTechnician())
            ->setCustomer($repairOrder->getPrimaryCustomer())
            ->setType($status);

        // Update repairOrderQuote Status
        $repairOrderQuote->addRepairOrderQuoteInteraction($repairOrderQuoteInteraction)
            ->setStatus($status);
        // if($status === 'Completed')
        //     $repairOrderQuote->setDateCustomerCompleted(new DateTime());


        // Update repairOrder quote_status
        $repairOrder->setQuoteStatus($status);
        if ('Completed' != $status) {
            $repairOrder->setDateClosed(null);
        }
        $em->persist($repairOrder);
        $em->persist($repairOrderQuote);
        $em->flush();

        $view = $this->view($repairOrderQuote);
        $view->getContext()->setGroups(RepairOrderQuote::GROUPS);

        $repairOrderQuoteLoghelper->createRepairOrderQuoteLog($repairOrderQuote, $this->handleView($view)->getContent(), $this->getUser());

        return $this->handleView($view);
    }

    /**
     * @Rest\Post("/api/repair-order-quote/in-progress")
     *
     * @SWG\Tag(name="Repair Order Quote")
     * @SWG\Post(description="Set the RepairOrderQuote status as In Progress")
     * @SWG\Parameter(
     *     name="repairOrderQuoteID",
     *     type="integer",
     *     in="formData",
     *     description="ID for the RepairOrderQuote",
     *     required=true
     * )
     * @SWG\Parameter(
     *     name="status",
     *     type="string",
     *     in="formData",
     *     description="Status for Progress",
     *     required=true,
     *     enum={"Technician In Progress", "Advisor In Progress", "Parts In Progress"}
     * )
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "RepairOrderQuote Status Updated" }),
     *         )
     * )
     */
    public function inProgress(
        Request $request,
        RepairOrderQuoteRepository $repairOrderQuoteRepository,
        EntityManagerInterface $em,
        RepairOrderQuoteHelper $helper
    ): Response {
        $repairOrderQuoteID = $request->get('repairOrderQuoteID');
        $status = $request->get('status');
        $statusArray = ['Technician In Progress', 'Advisor In Progress', 'Parts In Progress'];
        // Check if param is valid
        if (!$repairOrderQuoteID || !$status) {
            throw new BadRequestHttpException('Missing Required Parameter RepairOrderQuoteID');
        }
        $repairOrderQuote = $repairOrderQuoteRepository->find($repairOrderQuoteID);
        if (!$repairOrderQuote) {
            throw new NotFoundHttpException('Repair Order Quote Not Found');
        }
        // Check if status update is allowed
        if (!$helper->checkStatusUpdate($repairOrderQuote->getStatus(), 'In Progress')) {
            return $this->handleView($this->view('Cannot update status', Response::HTTP_FORBIDDEN));
        }
        // Check if Status is available
        if (!in_array($status, $statusArray)) {
            throw new BadRequestHttpException('Status is invalid');
        }
        // Get RepairOrder
        $repairOrder = $repairOrderQuote->getRepairOrder();
        // Create RepairOrderQuoteInteraction
        $repairOrderQuoteInteraction = new RepairOrderQuoteInteraction();
        $repairOrderQuoteInteraction->setRepairOrderQuote($repairOrderQuote)
            ->setUser($repairOrder->getPrimaryTechnician())
            ->setCustomer($repairOrder->getPrimaryCustomer())
            ->setType($status);
        // Update repairOrderQuote Status
        $repairOrderQuote->addRepairOrderQuoteInteraction($repairOrderQuoteInteraction)
            ->setStatus($status);
        // Update repairOrder quote_status
        $repairOrder->setQuoteStatus($status);
        if ('Completed' != $status) {
            $repairOrder->setDateClosed(null);
        }
        $em->persist($repairOrder);
        $em->persist($repairOrderQuote);
        $em->flush();

        return $this->handleView($this->view(['message' => 'RepairOrderQuote Status Updated'], Response::HTTP_OK));
    }

    /**
     * @Rest\Post("/api/repair-order-quote/send")
     *
     * @SWG\Tag(name="Repair Order Quote")
     * @SWG\Post(description="Set the RepairOrderQuote status as Viewed")
     * @SWG\Parameter(
     *     name="repairOrderQuoteID",
     *     type="integer",
     *     in="formData",
     *     description="ID for the RepairOrderQuote",
     *     required=true
     * )
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "RepairOrderQuote Status Updated" }),
     *         )
     * )
     */
    public function customerSend(
        Request $request,
        RepairOrderQuoteRepository $repairOrderQuoteRepository,
        EntityManagerInterface $em,
        TwilioHelper $twilioHelper,
        SettingsHelper $settingsHelper,
        RepairOrderQuoteHelper $helper,
        ShortUrlHelper $shortUrlHelper
    ): Response {
        $repairOrderQuoteID = $request->get('repairOrderQuoteID');
        $status = 'Sent';
        //check if param is valid
        if (!$repairOrderQuoteID) {
            throw new BadRequestHttpException('Missing Required Parameter RepairOrderQuoteID');
        }
        $repairOrderQuote = $repairOrderQuoteRepository->find($repairOrderQuoteID);
        if (!$repairOrderQuote) {
            throw new NotFoundHttpException('Repair Order Quote Not Found');
        }
        // Check if status update is allowed
        if (!$helper->checkStatusUpdate($repairOrderQuote->getStatus(), $status)) {
            return $this->handleView($this->view('Cannot update status', Response::HTTP_FORBIDDEN));
        }
        //Get RepairOrder
        $repairOrder = $repairOrderQuote->getRepairOrder();
        //Create RepairOrderQuoteInteraction
        $repairOrderQuoteInteraction = new RepairOrderQuoteInteraction();
        $repairOrderQuoteInteraction->setRepairOrderQuote($repairOrderQuote)
            ->setUser($repairOrder->getPrimaryTechnician())
            ->setCustomer($repairOrder->getPrimaryCustomer())
            ->setType($status);
        // Update repairOrderQuote Status
        $repairOrderQuote->addRepairOrderQuoteInteraction($repairOrderQuoteInteraction)
            ->setStatus($status)
            ->setDateSent(new DateTime());
        // Update repairOrder quote_status
        $repairOrder->setQuoteStatus($status);
        if ('Completed' != $status) {
            $repairOrder->setDateClosed(null);
        }
        // send repair order link to the customer
        $serviceTextQuote = $settingsHelper->getSetting('serviceTextQuote');
        $customerURL = $settingsHelper->getSetting('customerURL');
        $repairOrderURL = $customerURL.$repairOrder->getLinkHash();
        $shortUrl = $shortUrlHelper->generateShortUrl($repairOrderURL);
        $message = $serviceTextQuote.':'.$shortUrl;
        $customer = $repairOrder->getPrimaryCustomer();

        if (!$customer->getPhone()) {
            return $this->handleView($this->view('Customer Phone Number is empty', Response::HTTP_BAD_REQUEST));
        }

        try {
            $twilioHelper->sendSms($repairOrder->getPrimaryCustomer(), $message);
        } catch (Exception $e) {
            return $this->handleView($this->view(
                'Failed to send quote to customer: '.$e->getMessage(),
                Response::HTTP_BAD_GATEWAY
            ));
        }

        $em->persist($repairOrder);
        $em->persist($repairOrderQuote);
        $em->flush();

        return $this->handleView($this->view(['message' => 'RepairOrderQuote Status Updated'], Response::HTTP_OK));
    }

    /**
     * @Rest\Post("/api/repair-order-quote/view")
     *
     * @SWG\Tag(name="Repair Order Quote")
     * @SWG\Post(description="Set the RepairOrderQuote status as Viewed")
     * @SWG\Parameter(
     *     name="repairOrderQuoteID",
     *     type="integer",
     *     in="formData",
     *     description="ID for the RepairOrderQuote",
     *     required=true
     * )
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "RepairOrderQuote Status Updated" }),
     *         )
     * )
     */
    public function customerViewed(
        Request $request,
        RepairOrderQuoteRepository $repairOrderQuoteRepository,
        EntityManagerInterface $em,
        RepairOrderQuoteHelper $helper
    ): Response {
        $repairOrderQuoteID = $request->get('repairOrderQuoteID');
        $status = 'Viewed';
        //check if param is valid
        if (!$repairOrderQuoteID) {
            throw new BadRequestHttpException('Missing Required Parameter RepairOrderQuoteID');
        }
        $repairOrderQuote = $repairOrderQuoteRepository->find($repairOrderQuoteID);
        if (!$repairOrderQuote) {
            throw new NotFoundHttpException('Repair Order Quote Not Found');
        }
        // Check if status update is allowed
        if (!$helper->checkStatusUpdate($repairOrderQuote->getStatus(), $status)) {
            return $this->handleView($this->view('Cannot update status', Response::HTTP_FORBIDDEN));
        }
        //Get RepairOrder
        $repairOrder = $repairOrderQuote->getRepairOrder();

//        // Check if customer role and not customer's RO
//        if ($this->isGranted('ROLE_CUSTOMER')) {
//            if ($repairOrder->getPrimaryCustomer()->getId() != $this->getUser()->getId()) {
//                return $this->handleView($this->view('Not Authorized', Response::HTTP_UNAUTHORIZED));
//            }
//        }

        //Create RepairOrderQuoteInteraction
        $repairOrderQuoteInteraction = new RepairOrderQuoteInteraction();
        $repairOrderQuoteInteraction->setRepairOrderQuote($repairOrderQuote)
            ->setUser($repairOrder->getPrimaryTechnician())
            ->setCustomer($repairOrder->getPrimaryCustomer())
            ->setType($status);
        // Update repairOrderQuote Status
        $repairOrderQuote->addRepairOrderQuoteInteraction($repairOrderQuoteInteraction)
            ->setStatus($status)
            ->setDateCustomerViewed(new DateTime());
        // Update repairOrder quote_status
        $repairOrder->setQuoteStatus($status);
        if ('Completed' != $status) {
            $repairOrder->setDateClosed(null);
        }
        $em->persist($repairOrder);
        $em->persist($repairOrderQuote);
        $em->flush();

        return $this->handleView($this->view(['message' => 'RepairOrderQuote Status Updated'], Response::HTTP_OK));
    }

    /**
     * @Rest\Post("/api/repair-order-quote/confirm")
     *
     * @SWG\Tag(name="Repair Order Quote")
     * @SWG\Post(description="Set the RepairOrderQuote status as Confirmed")
     * @SWG\Parameter(
     *     name="repairOrderQuoteID",
     *     type="integer",
     *     in="formData",
     *     description="ID for the RepairOrderQuote",
     *     required=true
     * )
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "RepairOrderQuote Status Updated" }),
     *         )
     * )
     */
    public function customerConfirmed(
        Request $request,
        RepairOrderQuoteRepository $repairOrderQuoteRepository,
        EntityManagerInterface $em,
        RepairOrderQuoteHelper $helper
    ): Response {
        $repairOrderQuoteID = $request->get('repairOrderQuoteID');
        $status = 'Confirmed';
        //check if param is valid
        if (!$repairOrderQuoteID) {
            throw new BadRequestHttpException('Missing Required Parameter RepairOrderQuoteID');
        }
        $repairOrderQuote = $repairOrderQuoteRepository->find($repairOrderQuoteID);
        if (!$repairOrderQuote) {
            throw new NotFoundHttpException('Repair Order Quote Not Found');
        }
        // Check if status update is allowed
        if (!$helper->checkStatusUpdate($repairOrderQuote->getStatus(), $status)) {
            return $this->handleView($this->view('Cannot update status', Response::HTTP_FORBIDDEN));
        }
        //Get RepairOrder
        $repairOrder = $repairOrderQuote->getRepairOrder();
        //Create RepairOrderQuoteInteraction
        $repairOrderQuoteInteraction = new RepairOrderQuoteInteraction();
        $repairOrderQuoteInteraction->setRepairOrderQuote($repairOrderQuote)
            ->setUser($repairOrder->getPrimaryTechnician())
            ->setCustomer($repairOrder->getPrimaryCustomer())
            ->setType($status);
        // Update repairOrderQuote Status
        $repairOrderQuote->addRepairOrderQuoteInteraction($repairOrderQuoteInteraction)
            ->setStatus($status)
            ->setDateConfirmed(new DateTime());

        // Update repairOrder quote_status
        $repairOrder->setQuoteStatus($status);
        if ('Completed' != $status) {
            $repairOrder->setDateClosed(null);
        }
        $em->persist($repairOrder);
        $em->persist($repairOrderQuote);
        $em->flush();

        return $this->handleView($this->view(['message' => 'RepairOrderQuote Status Updated'], Response::HTTP_OK));
    }

    /**
     * @Rest\Post("/api/repair-order-quote/complete")
     *
     * @SWG\Tag(name="Repair Order Quote")
     * @SWG\Post(description="Set the RepairOrderQuote status as Completed")
     * @SWG\Parameter(
     *     name="repairOrderQuoteID",
     *     type="integer",
     *     in="formData",
     *     description="ID for the RepairOrderQuote",
     *     required=true
     * )
     *
     * @SWG\Parameter(
     *     name="recommendations",
     *     in="formData",
     *     required=false,
     *     type="string",
     *     description="[{""repairOrderQuoteRecommendationId"": 1,""approved"": true}, {""repairOrderQuoteRecommendationId"": 2,""approved"": true}, {""repairOrderQuoteRecommendationId"": 3,""approved"": true}]",
     * )
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "RepairOrderQuote Status Updated" }),
     *         )
     * )
     */
    public function completed(
        Request $request,
        RepairOrderQuoteRepository $repairOrderQuoteRepository,
        RepairOrderQuoteRecommendationRepository $recommendationRepository,
        EntityManagerInterface $em,
        RepairOrderQuoteHelper $repairOrderQuoteHelper,
        RepairOrderQuoteLogHelper $repairOrderQuoteLoghelper,
        Security $security
    ): Response {
        $repairOrderQuoteID = $request->get('repairOrderQuoteID');
        $recommendations = $request->get('recommendations');

        if (!$repairOrderQuoteID) {
            throw new BadRequestHttpException('Missing Required Parameter RepairOrderQuoteID');
        }
        $repairOrderQuote = $repairOrderQuoteRepository->find($repairOrderQuoteID);
        if (!$repairOrderQuote) {
            throw new NotFoundHttpException('Repair Order Quote Not Found');
        }

//        if (!$this->isGranted('ROLE_SERVICE_MANAGER')) {
//            if (in_array($repairOrderQuote->getStatus(), ['Completed', 'Confirmed'])) {
//                throw new BadRequestHttpException('You can not complete an already already finished quote');
//            }
//        }

        $repairOrder = $repairOrderQuote->getRepairOrder();
        if ($security->isGranted('ROLE_CUSTOMER')) {
            if ($repairOrder->getPrimaryCustomer() !== $this->getUser()) {
                throw new BadRequestHttpException('This customer is not the owner of the repairOrder');
            }
        }

        // Validate recommendation json but allow empty if there are only pre-approved
        $recommendations = json_decode($recommendations);
        if (is_null($recommendations) || !is_array($recommendations) || 0 === count($recommendations)) {
            // Only throw exception if there are non-pre-approved
            $hasNonPreApproved = $recommendationRepository->findOneBy(['repairOrderQuote' => $repairOrderQuote, 'preApproved' => 0]);

            if ($hasNonPreApproved) {
                return $this->handleView($this->view('Recommendation data is invalid', Response::HTTP_BAD_REQUEST));
            }
        }

        try {
            $repairOrderQuoteHelper->validateCompletedJson($recommendations);

            $repairOrderQuoteHelper->completeRepairOrderQuote($repairOrderQuote, $recommendations);
        } catch (Exception $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        $status = 'Completed';

        $repairOrderQuoteInteraction = new RepairOrderQuoteInteraction();
        $repairOrderQuoteInteraction->setRepairOrderQuote($repairOrderQuote)
            ->setUser($repairOrder->getPrimaryTechnician())
            ->setCustomer($repairOrder->getPrimaryCustomer())
            ->setType($status);

        $repairOrderQuote->addRepairOrderQuoteInteraction($repairOrderQuoteInteraction)
            ->setStatus($status)
            ->setDateCompleted(new DateTime());

        if (!$security->isGranted('ROLE_CUSTOMER')) {
            $repairOrderQuote->setCompletedUser($this->getUser());
        }

        $repairOrder->setQuoteStatus($status);

        $view = $this->view($repairOrderQuote);
        $view->getContext()->setGroups(RepairOrderQuote::GROUPS);
        if ($security->isGranted('ROLE_CUSTOMER')) {
            $repairOrderQuoteLoghelper->createRepairOrderQuoteLog($repairOrderQuote, $this->handleView($view)->getContent(), null, $this->getUser());
        } else {
            $repairOrderQuoteLoghelper->createRepairOrderQuoteLog($repairOrderQuote, $this->handleView($view)->getContent(), $this->getUser());
        }

        $em->persist($repairOrder);
        $em->persist($repairOrderQuote);
        $em->flush();

        return $this->handleView($this->view(['message' => 'RepairOrderQuote Status Updated'], Response::HTTP_OK));
    }

    /**
     * @Rest\Delete("/api/repair-order-quote/{id}")
     *
     * @SWG\Tag(name="Repair Order Quote")
     * @SWG\Delete(description="Delete a Repair Order Quote")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "Successfully Deleted" }),
     *         )
     * )
     *
     * @return Response
     */
    public function deleteRepairOrderQuote(RepairOrderQuote $repairOrderQuote, EntityManagerInterface $em)
    {
        // Update RepairOrder status
        $status = 'Not Started';
        $repairOrder = $repairOrderQuote->getRepairOrder();
        $repairOrder->setQuoteStatus($status);
        if ('Completed' != $status) {
            $repairOrder->setDateClosed(null);
        }
        //delete repairOrderQuote
        $em->remove($repairOrderQuote);
        $em->flush();

        return $this->handleView(
            $this->view(
                [
                    'message' => 'RepairOrderQuote Deleted',
                ],
                Response::HTTP_OK
            )
        );
    }

    /**
     * @Rest\Post("/api/repair-order-recommendations-sync")
     *
     * @SWG\Tag(name="Repair Order Quote")
     * @SWG\Post(description="Sync Repair Order Recommendations from DMS")
     *
     * @SWG\Parameter(
     *     name="id",
     *     in="formData",
     *     required=true,
     *     type="integer",
     *     description="The Repair Order",
     * )
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "Successfully Synced" }),
     *         )
     * )
     *
     * @return Response
     */
    public function syncRepairOrderQuoteRecommendationsFromDMS(
        Request $request,
        RepairOrderHelper $repairOrderHelper,
        EntityManagerInterface $em,
        Security $security,
        RepairOrderQuoteLogHelper $repairOrderQuoteLoghelper
    ) {
        $id = $request->get('id');

        $repairOrder = $em->getRepository(RepairOrder::class)->find($id);

        //check if params are valid
        if (!$repairOrder) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }
        //Check if Repair Order Quote exists
        //        $repairOrderQuote = $repairOrderQuoteRepository->findOneBy(['id' => $repairOrderQuoteID]);
        //        if (!$repairOrderQuote) {
        //            return $this->handleView($this->view('Invalid repair_order_quote Parameter', Response::HTTP_BAD_REQUEST));
        //        }
        try {
            $repairOrder = $repairOrderHelper->syncRepairOrderRecommendationsFromDMS($repairOrder);
        } catch (\Exception $e) {
            return $this->handleView($this->view($e->getMessage(), Response::HTTP_BAD_REQUEST));
        }

        $view = $this->view($repairOrder->getRepairOrderQuote());
        $view->getContext()->setGroups(RepairOrderQuote::GROUPS);
        if ($security->isGranted('ROLE_CUSTOMER')) {
            $repairOrderQuoteLoghelper->createRepairOrderQuoteLog($repairOrder->getRepairOrderQuote(), $this->handleView($view)->getContent(), null, $this->getUser());
        } else {
            $repairOrderQuoteLoghelper->createRepairOrderQuoteLog($repairOrder->getRepairOrderQuote(), $this->handleView($view)->getContent(), $this->getUser());
        }

        return $this->handleView($view);
    }
}
