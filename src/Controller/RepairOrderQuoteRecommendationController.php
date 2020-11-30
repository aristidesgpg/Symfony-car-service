<?php

namespace App\Controller;

use App\Entity\RepairOrderQuote;
use App\Entity\OperationCode;
use App\Entity\RepairOrderQuoteRecommendation;
use App\Repository\RepairOrderQuoteRepository;
use App\Repository\OperationCodeRepository;
use App\Repository\RepairOrderQuoteRecommendationRepository;
use App\Helper\iServiceLoggerTrait;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Swagger\Annotations as SWG;

/**
 * Class RepairOrderQuoteRecommendationController
 *
 * @package App\Controller
 */
class RepairOrderQuoteRecommendationController extends AbstractFOSRestController {
    use iServiceLoggerTrait;

    /**
     * @Rest\Get("/api/repair-order-quote-service")
     *
     * @SWG\Tag(name="Repair Order Quote Recommendation")
     * @SWG\Get(description="Get All Repair Order Quote Recommendations")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return Repair Order Quote Recommendations",
     *     @SWG\Items(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=RepairOrderQuoteRecommendation::class, groups=RepairOrderQuoteRecommendation::GROUPS)),
     *         description="id, repair_order_quote_id, operation_code_id, description, pre_approved, approved, parts_price, supplies_price, labor_price, notes"
     *     )
     * )
     *
     * @param RepairOrderQuoteRecommendationRepository $repairOrderQuoteRecommendationRepository
     *
     * @return Response
     */
    public function getRepairOrderQuoteRecommendations (RepairOrderQuoteRecommendationRepository $repairOrderQuoteRecommendationRepository) {
        //get Repair Order MPIs
        $repairOrderQuoteRecommendations = $repairOrderQuoteRecommendationRepository->findBy(["deleted" => 0]);
        $view                     = $this->view($repairOrderQuoteRecommendations);
        $view->getContext()->setGroups(['roqs_list']);

        return $this->handleView($view);
    }

    /**
     * @Rest\Post("/api/repair-order-quote-service")
     *
     * @SWG\Tag(name="Repair Order Quote Recommendation")
     * @SWG\Post(description="Create a new Repair Order Quote Recommendation")
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
        if(!$repairOrderQuoteID || !$operationCodeID || !$preApproved || !$approved || !$partsPrice || !$suppliesPrice || !$laborPrice){
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
        //store RepairOrderQuoteRecommendation
        $repairOrderQuoteRecommendation = new RepairOrderQuoteRecommendation();
        $repairOrderQuoteRecommendation->setRepairOrderQuote($repairOrderQuote)
                                 ->setOperationCode($operationCode)
                                 ->setDescription($description)
                                 ->setPreApproved($preApproved)
                                 ->setApproved($approved)
                                 ->setPartsPrice($partsPrice)
                                 ->setSuppliesPrice($suppliesPrice)
                                 ->setLaborPrice($laborPrice)
                                 ->setNotes($notes);

        $em->persist($repairOrderQuoteRecommendation);
        $em->flush();

        return $this->handleView($this->view([
            'message' => 'RepairOrderQuoteRecommendation Created'
        ], Response::HTTP_OK));
    }

     /**
     * @Rest\Put("/api/repair-order-quote-service/{id}")
     *
     * @SWG\Tag(name="Repair Order Quote Recommendation")
     * @SWG\Put(description="Update a Repair Order Quote Recommendation")
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
     *                                              "Successfully Updated" }),
     *         )
     * )
     *
     * @param RepairOrderQuoteRecommendation    $repairOrderQuoteRecommendation
     * @param Request                    $request
     * @param RepairOrderQuoteRepository $repairOrderQuoteRepository
     * @param OperationCodeRepository    $operationCodeRepository
     * @param EntityManagerInterface     $em
     *
     * @return Response
     */
    public function updateRepairOrderQuote (
        RepairOrderQuoteRecommendation    $repairOrderQuoteRecommendation, 
        Request                    $request, 
        RepairOrderQuoteRepository $repairOrderQuoteRepository, 
        OperationCodeRepository    $operationCodeRepository, 
        EntityManagerInterface     $em
    ) {
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
        if(!$repairOrderQuoteID || !$operationCodeID || !$preApproved || !$approved || !$partsPrice || !$suppliesPrice || !$laborPrice){
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
        //update RepairOrderQuoteRecommendation
        $repairOrderQuoteRecommendation->setRepairOrderQuote($repairOrderQuote)
                                 ->setOperationCode($operationCode)
                                 ->setDescription($description)
                                 ->setPreApproved($preApproved)
                                 ->setApproved($approved)
                                 ->setPartsPrice($partsPrice)
                                 ->setSuppliesPrice($suppliesPrice)
                                 ->setLaborPrice($laborPrice)
                                 ->setNotes($notes);

        $em->persist($repairOrderQuoteRecommendation);
        $em->flush();

        return $this->handleView($this->view([
            'message' => 'RepairOrderQuoteRecommendation Updated'
        ], Response::HTTP_OK));
    }

    /**
     * @Rest\Delete("/api/repair-order-quote-service/{id}")
     *
     * @SWG\Tag(name="Repair Order Quote Recommendation")
     * @SWG\Delete(description="Delete a Repair Order Quote Recommendation")
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
     * @param RepairOrderQuoteRecommendation $repairOrderQuoteRecommendation
     * @param EntityManagerInterface  $em
     *
     * @return Response
     */
    public function deleteRepairOrderQuoteRecommendation (RepairOrderQuoteRecommendation $repairOrderQuoteRecommendation, EntityManagerInterface $em) {
        //delete RepairOrderQuoteRecommendation
        $repairOrderQuoteRecommendation->setDeleted(true);

        $em->persist($repairOrderQuoteRecommendation);
        $em->flush();

        return $this->handleView($this->view([
            'message' => 'RepairOrderQuoteRecommendation Deleted'
        ], Response::HTTP_OK));
    }
}
