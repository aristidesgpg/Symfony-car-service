<?php

namespace App\Controller;


use App\Entity\RepairOrder;
use App\Entity\RepairOrderInteraction;
use App\Entity\RepairOrderMPI;
use App\Entity\RepairOrderMPIInteraction;
use App\Entity\RepairOrderPayment;
use App\Entity\RepairOrderPaymentInteraction;
use App\Entity\RepairOrderQuoteInteraction;
use App\Entity\RepairOrderReviewInteractions;
use App\Entity\RepairOrderVideo;
use App\Entity\RepairOrderVideoInteraction;
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
    public function getOne(RepairOrder $repairOrder): Response
    {
        if ($repairOrder->getDeleted()) {
            throw new NotFoundHttpException();
        }

        // Set defaults in case there aren't any
        $repairOrderMpiInteractions = [];
        $repairOrderQuoteInteractions = [];
        $repairOrderVideoInteractions = [];
        $repairOrderPaymentInteractions = [];
        $repairOrderReviewInteractions = [];

        // Get MPI interactions
        if ($repairOrder->getRepairOrderMPI()) {
            $repairOrderMpiInteractions = $repairOrder->getRepairOrderMPI()->getRepairOrderMPIInteractions();
        }

        // Get quote interactions
        if ($repairOrder->getRepairOrderQuote()){
            $repairOrderQuoteInteractions = $repairOrder->getRepairOrderQuote()->getRepairOrderQuoteInteractions();
        }

        // Get review interactions
        if ($repairOrder->getRepairOrderReview()){
            $repairOrderReviewInteractions = $repairOrder->getRepairOrderReview()->getRepairOrderReviewInteractions();
        }

        // Get videos (and relationally their interactions)
        /** @var RepairOrderVideo $video */
        foreach ($repairOrder->getVideos() as $video){
            // Don't add if video was deleted
            if ($video->isDeleted()){
                continue;
            }
            $repairOrderVideoInteractions[] = $video;
        }

        // Get payments (and relationally their interactions)
        foreach ($repairOrder->getPayments() as $payment){
            // Don't add if payment was deleted
            if ($payment->isDeleted()){
                continue;
            }
            $repairOrderPaymentInteractions[] = $payment;
        }

        // Build the response object
        $returnObject = [
            'repairOrderInteractions' => $repairOrder->getRepairOrderInteractions(),
            'repairOrderMpiInteractions' => $repairOrderMpiInteractions,
            'repairOrderQuoteInteractions' => $repairOrderQuoteInteractions,
            'repairOrderVideoInteractions' => $repairOrderVideoInteractions,
            'repairOrderPaymentInteractions' => $repairOrderPaymentInteractions,
            'repairOrderReviewInteractions' => $repairOrderReviewInteractions
        ];

        $returnView = $this->view($returnObject);

        // Merge all the various serializer groups we want to get what we need
        $returnGroups = array_merge(
            RepairOrderInteraction::GROUPS,
            RepairOrderMPIInteraction::GROUPS,
            RepairOrderQuoteInteraction::GROUPS,
            RepairOrderVideo::GROUPS, // Add video serializer or else we won't get the videos
            RepairOrderVideoInteraction::GROUPS,
            RepairOrderPayment::GROUPS, // Add payment serializer or else we won't get the payments
            RepairOrderPaymentInteraction::GROUPS,
            RepairOrderReviewInteractions::GROUPS
        );

        // Only want unique ones
        $returnGroups = array_unique($returnGroups);
        $returnView->getContext()->setGroups($returnGroups);

        return $this->handleView($returnView);
    }
}
