<?php

namespace App\Controller;

use App\Entity\RepairOrderReview;
use App\Repository\RepairOrderReviewRepository;
use App\Entity\RepairOrderReviewInteractions;
use App\Repository\RepairOrderReviewInteractionsRepository;
use App\Service\MyReviewHelper;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Doctrine\ORM\EntityManagerInterface;
use DateTime;

/**
 * Class MyReviewController
 *
 * @package App\Controller
 *
 */
class MyReviewController extends AbstractFOSRestController {
   
    /**
     * @Rest\Put("/api/myreview/{id}/view")
     *
     * @SWG\Tag(name="MyReview")
     * @SWG\Put(description="Update a repairOrderView and Create a new reviewInteraction")
     *
     * @SWG\Response(response="200", description="Success!")
     *
     * @param RepairOrderReview      $repairOrderReview
     * @param EntityManagerInterface $em
     * @param RepairOrderReviewInteractionsRepository $reviewInteractions
     *
     * @return Response
     */

    public function viewed (RepairOrderReview $repairOrderReview, EntityManagerInterface $em, RepairOrderReviewInteractionsRepository $reviewInteractions) {
        if($repairOrderReview->getStatus() ==='Completed') {
            $repairOrderReview->setStatus('Viewd');
            $repairOrderReview->setDateViewed(new \DateTime());
    
            $em->persist($repairOrderReview);
            $em->flush();
        }
        
        $reviewInteractions->new($repairOrderReview, 'Viewed');

        return $this->handleView($this->view([
            'message' => 'Success'
        ], Response::HTTP_OK));
    }

    /**
     * @Rest\Put("/api/myreview/{id}/outcome")
     *
     * @SWG\Tag(name="MyReview")
     * @SWG\Put(description="Update a repairOrderView rating and platform and Create a new reviewInteraction")
     *
     * @SWG\Parameter(name="rating", required=true, type="string", in="formData", enum={"poor", "average", "great"})
     * @SWG\Parameter(name="platform", required=true, type="string", in="formData", enum={"facebook", "google"})
     * 
     * @SWG\Response(response="200", description="Success!")
     * @SWG\Response(response="404", description="ROR does not exist")
     *
     * @param RepairOrderReview      $repairOrderReview
     * @param Request                $request
     * @param EntityManagerInterface $em
     * @param RepairOrderReviewInteractionsRepository $reviewInteractions
     *
     * @return Response
     */

    public function outcome (RepairOrderReview $repairOrderReview, Request $request, EntityManagerInterface $em, RepairOrderReviewInteractionsRepository $reviewInteractions) {
       
        $rating   = $request->get('rating');
        $platform = $request->get('platform');

        $repairOrderReview->setStatus('Completed');
        $repairOrderReview->setDateCompleted(new \DateTime());
        $repairOrderReview->setRating($rating);
        $repairOrderReview->setPlatform($platform);

        $em->persist($repairOrderReview);
        $em->flush();

        $reviewInteractions->new($repairOrderReview, 'Completed');

        return $this->handleView($this->view([
            'message' => 'Success'
        ], Response::HTTP_OK));
    }

    /**
     * @Rest\Put("/api/myreview/resendMessage")
     *
     * @SWG\Tag(name="MyReview")
     * @SWG\Put(description="Resend a message to the customer and create a new interaction")
     *
     * @SWG\Response(response="200", description="Success!")
     * @SWG\Response(response="404", description="ROR does not exist")
     *
     * @param RepairOrderReview      $repairOrderReview
     * @param EntityManagerInterface $em
     * @param RepairOrderReviewInteractionsRepository $reviewInteractions
     * @param MyReviewHelper $myReviewHelper
     *
     * @return Response
     */

    public function resendMessage (RepairOrderReview $repairOrderReview, EntityManagerInterface $em, 
                                   RepairOrderReviewInteractionsRepository $reviewInteractions, MyReviewHelper $myReviewHelper) {
        $reviewInteractions->new($repairOrderReview, 'Sent');
        
        $repairOrder = $repairOrderReview->getRepairOrder();
        $myReviewHelper->sendMessage($repairOrder->getPrimaryCustomer()->number);
        return $this->handleView($this->view([
            'message' => 'Success'
        ], Response::HTTP_OK));
    }

}
