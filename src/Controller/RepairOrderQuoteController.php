<?php

namespace App\Controller;

use App\Entity\RepairOrder;
use App\Entity\RepairOrderQuote;
use App\Repository\RepairOrderRepository;
use App\Repository\RepairOrderQuoteRepository;
use App\Helper\iServiceLoggerTrait;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Swagger\Annotations as SWG;
use App\Service\MPITemplateHelper;

/**
 * Class RepairOrderQuoteController
 *
 * @package App\Controller
 */
class RepairOrderQuoteController extends AbstractFOSRestController {
    use iServiceLoggerTrait;

    /**
     * @Rest\Get("/api/repair-order-quote")
     *
     * @SWG\Tag(name="Repair Order Quote")
     * @SWG\Get(description="Get All Repair Order Quotes")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return Repair Order Quotes",
     *     @SWG\Items(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=RepairOrderQuote::class, groups={"roq_list"})),
     *         description="id, repair_order_id, date_created, date_sent, date_customer_viewed, date_customer_completed, date_completed_viewed, deleted"
     *     )
     * )
     *
     * @param RepairOrderQuoteRepository $repairOrderQuoteRepository
     *
     * @return Response
     */
    public function getRepairOrderQuotes (RepairOrderQuoteRepository $repairOrderQuoteRepository) {
        //get Repair Order MPIs
        $repairOrderQuotes = $repairOrderQuoteRepository->findAll(['deleted' => 0]);
        $view              = $this->view($repairOrderQuotes);
        $view->getContext()->setGroups(['roq_list']);

        return $this->handleView($view);
    }

    /**
     * @Rest\Post("/api/repair-order-quote")
     *
     * @SWG\Tag(name="Repair Order Quote")
     * @SWG\Post(description="Create a new Repair Order Quote")
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
     *                                              "Successfully Created" }),
     *         )
     * )
     *
     * @param Request                $request
     * @param RepairOrderRepository  $repairOrderRepository
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function createRepairOrderQuote (Request $request, RepairOrderRepository $repairOrderRepository, EntityManagerInterface $em) {
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
        //store repairOrderQuote
        $repairOrderQuote = new RepairOrderQuote();
        $repairOrderQuote->setRepairOrder($repairOrder)
                         ->setDateSent($dateSent)
                         ->setDateCustomerViewed($dateCustomerViewed)
                         ->setDateCustomerCompleted($dateCustomerCompleted)
                         ->setDateCompletedViewed($dateCompletedViewed);

        $em->persist($repairOrderQuote);
        $em->flush();

        return $this->handleView($this->view([
            'message' => 'RepairOrderQuote Created'
        ], Response::HTTP_OK));
    }
}
