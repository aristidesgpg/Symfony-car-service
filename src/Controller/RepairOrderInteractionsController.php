<?php

namespace App\Controller;


use App\Entity\RepairOrder;
use App\Entity\RepairOrderInteraction;
use App\Entity\RepairOrderMPI;
use App\Entity\RepairOrderMPIInteraction;
use App\Entity\RepairOrderPaymentInteraction;
use App\Entity\RepairOrderQuoteInteraction;
use App\Entity\RepairOrderReviewInteractions;
use App\Helper\FalsyTrait;
use App\Helper\iServiceLoggerTrait;
use App\Repository\RepairOrderMPIRepository;
use App\Repository\RepairOrderPaymentRepository;
use Exception;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use JMS\Serializer\SerializerBuilder;
use Knp\Component\Pager\PaginatorInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use phpDocumentor\Reflection\Types\Collection;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * @Rest\Route("/api/repair-order-interactions")
 * @SWG\Tag(name="Repair Order Interactions")
 */
class RepairOrderInteractionsController extends AbstractFOSRestController
{
    use FalsyTrait;

    use iServiceLoggerTrait;

    /**
     * @Rest\Get("/{id}", name="getRepairOrderInteractions")
     *
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *
     * )
     * @SWG\Response(response="404", description="RO does not exist")
     */
    public function getOne(RepairOrder $repairOrder
        ): Response
    {

        if ($repairOrder->getDeleted()) {
            throw new NotFoundHttpException();
        }

        //Repair Order Interactions
        if($repairOrder) {
            $repairOrderInteractions = $repairOrder->getRepairOrderInteractions();
        } //RepairOrderInteraction::GROUPS

        //Repair Order MPI Interactions
        $repairOrderMPI = $repairOrder->getRepairOrderMPI();
        if($repairOrderMPI) {
            $repairOrderMPIInteractions = $repairOrderMPI->getRepairOrderMPIInteractions();
        }//RepairOrderMPIInteraction::GROUPS

        //Repair Order Payment Interactions
        //Arrays *******
        /*
        $repairOrderPayment = $repairOrder->getPayments();
        if($repairOrderPayment){
            $repairOrderPaymentInteractions = $repairOrderPayment->getInteractions();
        }
        */

        //Repair Order Quote Interactions
        $repairOrderQuote = $repairOrder->getRepairOrderQuote();
        if($repairOrderQuote){
            $repairOrderQuoteInteractions = $repairOrderQuote->getRepairOrderQuoteInteractions();
        }//RepairOrderQuoteInteraction::GROUPS

        //Repair Order Review Interactions
        $repairOrderReview = $repairOrder->getRepairOrderReview();
        if($repairOrderReview) {
            $repairOrderReviewInteractions = $repairOrderReview->getRepairOrderReviewInteractions();
        } //RepairOrderReviewInteractions::GROUPS - good

        /*Repair Order Video Interactions
        $repairOrderVideo = $repairOrder->getVideos();
        if($repairOrderVideo) {
            $repairOrderVideoInteractions = $repairOrderVideo-
        }
        */


        $view = $this->view($repairOrderQuoteInteractions);
        $view->getContext()->setGroups(RepairOrderQuoteInteraction::GROUPS);

        return $this->handleView($view);
    }
}
