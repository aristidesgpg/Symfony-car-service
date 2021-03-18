<?php

namespace App\Controller;

use App\Entity\RepairOrderQuote;
use App\Entity\RepairOrderQuoteInteraction;
use App\Helper\iServiceLoggerTrait;
use App\Repository\RepairOrderQuoteRepository;
use App\Repository\RepairOrderRepository;
use App\Service\RepairOrderQuoteHelper;
use App\Service\SettingsHelper;
use App\Service\TwilioHelper;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
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
        $repairOrderQuote = $helper->calculateLaborAndTax($repairOrderQuote);
        $view = $this->view($repairOrderQuote);
        $view->getContext()->setGroups(RepairOrderQuote::GROUPS);

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
     *     description="[{""operationCode"":14, ""description"":""Neque maxime ex dolorem ut."",""preApproved"":true,""approved"":true,""partsPrice"":1.0,""suppliesPrice"":14.02,""laborPrice"":5.3,""notes"":""Cumque tempora ut nobis.""},{""operationCode"":11, ""description"":""Quidem earum sapiente at dolores quia natus."",""preApproved"":false,""approved"":true,""partsPrice"":2.6,""suppliesPrice"":509.02,""laborPrice"":36.9,""notes"":""Et accusantium rerum.""},{""operationCode"":4, ""description"":""Mollitia unde nobis doloribus sed."",""preApproved"":true,""approved"":false,""partsPrice"":1.1,""suppliesPrice"":71.7,""laborPrice"":55.1,""notes"":""Voluptates et aut debitis.""}]",
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
        RepairOrderQuoteHelper $helper
    ) {
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
        // Get quote status according to the type of user
        $status = $helper->getProgressStatus($this->getUser());
        // store repairOrderQuote
        $repairOrderQuote = new RepairOrderQuote();
        $repairOrderQuote->setRepairOrder($repairOrder);

        $em->persist($repairOrderQuote);
        $em->flush();

        // Validate recommendation json
        $recommendations = json_decode($recommendations);
        if (is_null($recommendations) || !is_array($recommendations) || 0 === count($recommendations)) {
            $em->remove($repairOrderQuote);
            $em->flush();

            throw new BadRequestHttpException('Recommendations data is invalid');
        }

        try {
            $helper->validateRecommendationsJson($recommendations);
            $helper->buildRecommendations($repairOrderQuote, $recommendations);
        } catch (Exception $e) {
            $em->remove($repairOrderQuote);
            $em->flush();

            throw new BadRequestHttpException($e->getMessage());
        }

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

        $em->persist($repairOrder);
        $em->persist($repairOrderQuote);
        $em->flush();

        $view = $this->view($repairOrderQuote);
        $view->getContext()->setGroups(['roq_list', 'roqs_list']);

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
     *     description="[{""operationCode"":14, ""description"":""Neque maxime ex dolorem ut."",""preApproved"":true,""approved"":true,""partsPrice"":1.0,""suppliesPrice"":14.02,""laborPrice"":5.3,""notes"":""Cumque tempora ut nobis.""},{""operationCode"":11, ""description"":""Quidem earum sapiente at dolores quia natus."",""preApproved"":false,""approved"":true,""partsPrice"":2.6,""suppliesPrice"":509.02,""laborPrice"":36.9,""notes"":""Et accusantium rerum.""},{""operationCode"":4, ""description"":""Mollitia unde nobis doloribus sed."",""preApproved"":true,""approved"":false,""partsPrice"":1.1,""suppliesPrice"":71.7,""laborPrice"":55.1,""notes"":""Voluptates et aut debitis.""}]",
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
        EntityManagerInterface $em,
        Security $security
    ): Response {
        $recommendations = $request->get('recommendations');

        if (!$recommendations) {
            throw new BadRequestHttpException('Missing Required Parameter: recommendations');
        }

        // Check permission if quote status is Sent, Completed or Confirmed
        $quoteStatus = $repairOrderQuote->getStatus();
        if (('Sent' == $quoteStatus || 'Completed' == $quoteStatus || 'Confirmed' == $quoteStatus) && !$security->isGranted('ROLE_CUSTOMER')) {
            return $this->handleView($this->view("You cannot edit a quote that's been sent to the customer", Response::HTTP_FORBIDDEN));
        }
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
        // Check User
        if ($security->isGranted('ROLE_CUSTOMER')) {
            // Update status as Completed
            $status = 'Completed';
        } else {
            $status = $helper->getProgressStatus($this->getUser());
        }
        //Create RepairOrderQuoteInteraction
        $repairOrderQuoteInteraction = new RepairOrderQuoteInteraction();
        $repairOrderQuoteInteraction->setRepairOrderQuote($repairOrderQuote)
                                    ->setUser($repairOrder->getPrimaryTechnician())
                                    ->setCustomer($repairOrder->getPrimaryCustomer())
                                    ->setType($status);
        // Update repairOrderQuote Status
        $repairOrderQuote->addRepairOrderQuoteInteraction($repairOrderQuoteInteraction)
                         ->setStatus($status)
                         ->setDateCustomerCompleted(new DateTime());
        // Update repairOrder quote_status
        $repairOrder->setQuoteStatus($status);

        $em->persist($repairOrder);
        $em->persist($repairOrderQuote);
        $em->flush();

        $view = $this->view($repairOrderQuote);
        $view->getContext()->setGroups(['roq_list', 'roqs_list']);

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
        ParameterBagInterface $parameterBag,
        RepairOrderQuoteHelper $helper
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
        // send repair order link to the customer
        $serviceTextQuote = $settingsHelper->getSetting('serviceTextQuote');
        $customerURL = $parameterBag->get('customer_url');
        $repairOrderURL = $serviceTextQuote.$customerURL.$repairOrder->getLinkHash();
        $twilioHelper->sendSms($repairOrder->getPrimaryCustomer(), $repairOrderURL);

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
                         ->setDateCustomerConfirmed(new DateTime());
        // Update repairOrder quote_status
        $repairOrder->setQuoteStatus($status);

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
}
