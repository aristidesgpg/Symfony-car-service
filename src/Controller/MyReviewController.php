<?php

namespace App\Controller;

use App\Entity\RepairOrderReview;
use App\Entity\RepairOrder;
use App\Entity\RepairOrderReviewInteractions;
use App\Entity\User;
use App\Entity\Customer;
use App\Repository\RepairOrderReviewInteractionsRepository;
use App\Service\MyReviewHelper;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
     * @SWG\Put(description="Id of RepairOrder.  Update a repairOrderView and Create a new reviewInteraction")
     *
     * @SWG\Response(response="200", description="Success!")
     *
     * @param RepairOrder                             $repairOrder
     * @param EntityManagerInterface                  $em
     * @param RepairOrderReviewInteractionsRepository $reviewInteractions
     *
     * @return Response
     */

    public function viewed (RepairOrder $repairOrder, EntityManagerInterface $em, RepairOrderReviewInteractionsRepository $reviewInteractions) {
        $user = $this->getUser();

        if(!$user instanceof Customer){
            return $this->handleView($this->view('The type of user should be Customer', Response::HTTP_BAD_REQUEST));
        }

        $repairOrderReview = $repairOrder->getRepairOrderReview();

        if(!$repairOrderReview){
            return $this->handleView($this->view('The review of this repairOrder was not created yet.', Response::HTTP_BAD_REQUEST));
        }


        if($repairOrderReview->getStatus() !=='Completed') {
            $repairOrderReview->setStatus('Viewd');
            $repairOrderReview->setDateViewed(new \DateTime());
    
            $em->persist($repairOrderReview);
            $em->flush();
        }
        
        $reviewInteractions->new($repairOrderReview, 'Viewed', $user);

        return $this->handleView($this->view(['message' => 'Success'], Response::HTTP_OK));
    }

    /**
     * @Rest\Put("/api/myreview/{id}/outcome")
     *
     * @SWG\Tag(name="MyReview")
     * @SWG\Put(description="Id of RepairOrder. Update a repairOrderView rating and platform and Create a new reviewInteraction")
     *
     * @SWG\Parameter(name="rating", required=true, type="string", in="formData", enum={"poor", "average", "great"})
     * @SWG\Parameter(name="platform", required=true, type="string", in="formData", enum={"facebook", "google"})
     * 
     * @SWG\Response(response="200", description="Success!")
     *
     * @param RepairOrder                             $repairOrder
     * @param Request                                 $request
     * @param EntityManagerInterface                  $em
     * @param RepairOrderReviewInteractionsRepository $reviewInteractions
     *
     * @return Response
     */

    public function outcome (RepairOrder $repairOrder, Request $request, EntityManagerInterface $em, RepairOrderReviewInteractionsRepository $reviewInteractions) {
        $user     = $this->getUser();

        if(!$user instanceof Customer){
            return $this->handleView($this->view('The type of user should be Customer', Response::HTTP_BAD_REQUEST));
        }

        $repairOrderReview = $repairOrder->getRepairOrderReview();

        if(!$repairOrderReview){
            return $this->handleView($this->view('The review of this repairOrder was not created yet.', Response::HTTP_BAD_REQUEST));
        }

        $rating            = $request->get('rating');
        $platform          = $request->get('platform');

        $repairOrderReview->setStatus('Completed');
        $repairOrderReview->setDateCompleted(new \DateTime());
        $repairOrderReview->setRating($rating);
        $repairOrderReview->setPlatform($platform);

        $em->persist($repairOrderReview);
        $em->flush();

        $reviewInteractions->new($repairOrderReview, 'Completed', $user);

        return $this->handleView($this->view(['message' => 'Success'], Response::HTTP_OK));
    }

    /**
     * @Rest\Put("/api/myreview/{id}/resendMessage")
     *
     * @SWG\Tag(name="MyReview")
     * @SWG\Put(description="Resend a message to the customer and create a new interaction")
     *
     * @SWG\Response(response="200", description="Success!")
     *
     * @param RepairOrder                             $repairOrder
     * @param EntityManagerInterface                  $em
     * @param RepairOrderReviewInteractionsRepository $reviewInteractions
     * @param MyReviewHelper                          $myReviewHelper
     *
     * @return Response
     */

    public function resendMessage (RepairOrder $repairOrder, EntityManagerInterface $em, 
                                   RepairOrderReviewInteractionsRepository $reviewInteractions, MyReviewHelper $myReviewHelper) {
        $user = $this->getUser();

        if(!$user instanceof User){
            return $this->handleView($this->view('The type of user should be User', Response::HTTP_BAD_REQUEST));
        }

        $repairOrderReview = $repairOrder->getRepairOrderReview();

        if(!$repairOrderReview){
            return $this->handleView($this->view('The review of this repairOrder was not created yet.', Response::HTTP_BAD_REQUEST));
        }

        $reviewInteractions->new($repairOrderReview, 'Sent', $user);
        
        $repairOrder = $repairOrderReview->getRepairOrder();
        $myReviewHelper->sendMessage( $repairOrder );

        return $this->handleView($this->view(['message' => 'Success'], Response::HTTP_OK));
    }

}
