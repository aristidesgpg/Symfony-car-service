<?php

namespace App\Controller;

use App\Entity\RepairOrderQuote;
use App\Entity\OperationCode;
use App\Entity\RepairOrderQuoteService;
use App\Repository\RepairOrderQuoteRepository;
use App\Repository\OperationCodeRepository;
use App\Repository\RepairOrderQuoteServiceRepository;
use App\Helper\iServiceLoggerTrait;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Swagger\Annotations as SWG;

/**
 * Class RepairOrderQuoteServiceController
 *
 * @package App\Controller
 */
class RepairOrderQuoteServiceController extends AbstractFOSRestController {
    use iServiceLoggerTrait;

    /**
     * @Rest\Get("/api/repair-order-quote-service")
     *
     * @SWG\Tag(name="Repair Order Quote Service")
     * @SWG\Get(description="Get All Repair Order Quote Services")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return Repair Order Quote Services",
     *     @SWG\Items(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=RepairOrderQuoteService::class, groups={"roqs_list"})),
     *         description="id, repair_order_quote_id, operation_code_id, description, pre_approved, approved, parts_price, supplies_price, labor_price, notes"
     *     )
     * )
     *
     * @param RepairOrderQuoteServiceRepository $repairOrderQuoteServiceRepository
     *
     * @return Response
     */
    public function getRepairOrderQuoteServices (RepairOrderQuoteServiceRepository $repairOrderQuoteServiceRepository) {
        //get Repair Order MPIs
        $repairOrderQuoteServices = $repairOrderQuoteServiceRepository->findAll();
        $view                     = $this->view($repairOrderQuoteServices);
        $view->getContext()->setGroups(['roqs_list']);

        return $this->handleView($view);
    }

    /**
     * @Rest\Post("/api/repair-order-quote-service")
     *
     * @SWG\Tag(name="Repair Order Quote Service")
     * @SWG\Post(description="Create a new Repair Order Quote Service")
     *
     * @SWG\Parameter(
     *     name="repair_order_quote",
     *     in="formData",
     *     required=true,
     *     type="integer",
     *     description="The Repair Order Quote ID",
     * )
     * @SWG\Parameter(
     *     name="operation_code",
     *     in="formData",
     *     required=true,
     *     type="integer",
     *     description="The Operation Code ID",
     * )
     * @SWG\Parameter(
     *     name="description",
     *     in="formData",
     *     required=false,
     *     type="string",
     *     description="The Description",
     * )
     * @SWG\Parameter(
     *     name="pre_approved",
     *     in="formData",
     *     required=true,
     *     type="boolean",
     *     description="PreApproved",
     * )
     * @SWG\Parameter(
     *     name="approved",
     *     in="formData",
     *     required=true,
     *     type="boolean",
     *     description="Approved",
     * )
     * @SWG\Parameter(
     *     name="parts_price",
     *     in="formData",
     *     required=true,
     *     type="number",
     *     description="The Parts Price",
     * )
     * @SWG\Parameter(
     *     name="supplies_price",
     *     in="formData",
     *     required=true,
     *     type="number",
     *     description="The Supplies Price",
     * )
     * @SWG\Parameter(
     *     name="labor_price",
     *     in="formData",
     *     required=true,
     *     type="number",
     *     description="The Labor Price",
     * )
     * @SWG\Parameter(
     *     name="notes",
     *     in="formData",
     *     required=false,
     *     type="string",
     *     description="The Notes",
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
     *
     * @param Request                    $request
     * @param RepairOrderQuoteRepository $repairOrderQuoteRepository
     * @param OperationCodeRepository    $operationCodeRepository
     * @param EntityManagerInterface     $em
     *
     * @return Response
     */
    public function createRepairOrderQuote (Request $request, RepairOrderQuoteRepository $repairOrderQuoteRepository, OperationCodeRepository $operationCodeRepository, EntityManagerInterface $em) {
        $repairOrderQuoteID = $request->get('repair_order_quote');
        $operationCodeID    = $request->get('operation_code');
        $description        = $request->get('description');
        $preApproved        = $request->get('pre_approved');
        $approved           = $request->get('approved');
        $partsPrice         = $request->get('parts_price');
        $suppliesPrice      = $request->get('supplies_price');
        $laborPrice         = $request->get('labor_price');
        $notes              = $request->get('notes');
        //check if params are valid
        if(!$repairOrderID || !$operationCodeID || !$preApproved || !$approved || !$partsPrice || !$suppliesPrice || !$laborPrice){
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }
        //Check if Repair Order Quote exists
        $repairOrderQuote  = $repairOrderQuoteRepository->find($repairOrderQuoteID);
        if (!$repairOrderQuote) {
            return $this->handleView($this->view('Invalid repair_order_quote Parameter', Response::HTTP_BAD_REQUEST));
        }
        //Check if Operation Code exists
        $operationCode  = $operationCodeRepository->find($operationCodeID);
        if (!$operationCode) {
            return $this->handleView($this->view('Invalid operation_code Parameter', Response::HTTP_BAD_REQUEST));
        }
        //store repairOrderQuoteService
        $repairOrderQuoteService = new RepairOrderQuoteService();
        $repairOrderQuoteService->setRepairOrderQuote($repairOrderQuote)
                                 ->setOperationCode($operationCode)
                                 ->setDescription($description)
                                 ->setPreApproved($preApproved)
                                 ->setApproved($approved)
                                 ->setPartsPrice($partsPrice)
                                 ->setSuppliesPrice($suppliesPrice)
                                 ->setLaborPrice($laborPrice)
                                 ->setNotes($notes);

        $em->persist($repairOrderQuoteService);
        $em->flush();

        return $this->handleView($this->view([
            'message' => 'RepairOrderQuoteService Created'
        ], Response::HTTP_OK));
    }

    /**
     * @Rest\Put("/api/repair-order-quote/{id}")
     *
     * @SWG\Tag(name="Repair Order Quote Service")
     * @SWG\Put(description="Update a Repair Order Quote")
     *
     * @SWG\Parameter(
     *     name="repair_order",
     *     in="formData",
     *     required=true,
     *     type="integer",
     *     description="The Repair Order ID",
     * )
     * @SWG\Parameter(
     *     name="date_sent",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Sent Date",
     * )
     * @SWG\Parameter(
     *     name="date_customer_viewed",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Customer Viewed Date",
     * )
     * @SWG\Parameter(
     *     name="date_customer_completed",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Customer Completed Date",
     * )
     * @SWG\Parameter(
     *     name="date_completed_viewed",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Completed Viewed Date",
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
     * @param RepairOrderQuoteService $repairOrderQuoteService
     * @param Request                 $request
     * @param RepairOrderRepository   $repairOrderRepository
     * @param EntityManagerInterface  $em
     *
     * @return Response
     */
    public function updateRepairOrderQuote (RepairOrderQuoteService $repairOrderQuoteService, Request $request, RepairOrderRepository $repairOrderRepository, EntityManagerInterface $em) {
        $repairOrderID         = $request->get('repair_order');
        $dateSent              = $request->get('date_sent');
        $dateCustomerViewed    = $request->get('date_customer_viewed');
        $dateCustomerCompleted = $request->get('date_customer_completed');
        $dateCompletedViewed   = $request->get('date_completed_viewed');
        //check if params are valid
        if(!$repairOrderID || !$dateSent || !$dateCustomerViewed || !$dateCustomerCompleted || !$dateCompletedViewed){
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }
        //Check if Repair Order exists
        $repairOrder  = $repairOrderRepository->find($repairOrderID);
        if (!$repairOrder) {
            return $this->handleView($this->view('Invalid repair_order Parameter', Response::HTTP_BAD_REQUEST));
        }
        //update repairOrderQuote
        $repairOrderQuote->setRepairOrder($repairOrder)
                         ->setDateSent($dateSent)
                         ->setDateCustomerViewed($dateCustomerViewed)
                         ->setDateCustomerCompleted($dateCustomerCompleted)
                         ->setDateCompletedViewed($dateCompletedViewed);

        $em->persist($repairOrderQuote);
        $em->flush();

        return $this->handleView($this->view([
            'message' => 'RepairOrderQuote Updated'
        ], Response::HTTP_OK));
    }

    /**
     * @Rest\Put("/api/repair-order-quote-service/{id}")
     *
     * @SWG\Tag(name="Repair Order Quote Service")
     * @SWG\Put(description="Delete a Repair Order Quote Service")
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
     * @param RepairOrderQuoteService $repairOrderQuoteService
     * @param EntityManagerInterface  $em
     *
     * @return Response
     */
    public function deleteRepairOrderQuoteService (RepairOrderQuoteService $repairOrderQuoteService, EntityManagerInterface $em) {
        //delete repairOrderQuote
        $repairOrderQuote->setDeleted(true);

        $em->persist($repairOrderQuote);
        $em->flush();

        return $this->handleView($this->view([
            'message' => 'RepairOrderQuoteService Deleted'
        ], Response::HTTP_OK));
    }
}
