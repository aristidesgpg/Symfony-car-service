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
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;
use Doctrine\ORM\EntityManagerInterface;
use DateTime;

/**
 * Class MyReviewController
 *
 * @package App\Controller
 *
 */
class MyReviewController extends AbstractFOSRestController
{

    /**
     * @Rest\Post("/api/my-review/{id}/view")
     *
     * @SWG\Tag(name="MyReview")
     * @SWG\Post(description="Id of RepairOrderReview.  Update a repairOrderView and Create a new reviewInteraction")
     *
     * @SWG\Response(response="200", description="Success!")
     * @SWG\Response(response="406", description="Invalid parameter")
     * @param RepairOrderReview                       $repairOrderReview
     * @param EntityManagerInterface                  $em
     * @param RepairOrderReviewInteractionsRepository $reviewInteractions
     *
     * @return Response
     */
    public function viewed(RepairOrderReview $repairOrderReview, EntityManagerInterface $em, RepairOrderReviewInteractionsRepository $reviewInteractions)
    {
        $user = $this->getUser();

        if (!$user instanceof Customer) {
            throw new NotAcceptableHttpException('The type of user should be Customer.');
        }

        if (!$repairOrderReview) {
            throw new NotAcceptableHttpException('The review of this repairOrder was not created yet.');
        }

        if ($repairOrderReview->getStatus() !== 'Completed') {
            $repairOrderReview->setStatus('Viewd');
            $repairOrderReview->setDateViewed(new \DateTime());

            $em->persist($repairOrderReview);
            $em->flush();
        }

        $reviewInteractions->new($repairOrderReview, 'Viewed', $user);

        return $this->handleView($this->view(['message' => 'Success'], Response::HTTP_OK));
    }

    /**
     * @Rest\Post("/api/my-review/{id}/outcome")
     *
     * @SWG\Tag(name="MyReview")
     * @SWG\Post(description="Id of RepairOrderReview. Update a repairOrderView rating and platform and Create a new reviewInteraction")
     *
     * @SWG\Parameter(name="rating", required=true, type="string", in="formData", enum={"poor", "average", "great"})
     * @SWG\Parameter(name="platform", required=true, type="string", in="formData", enum={"facebook", "google"})
     * 
     * @SWG\Response(response="200", description="Success!")
     * @SWG\Response(response="406", description="Invalid parameter")
     *
     * @param RepairOrderReview                       $repairOrderReview
     * @param Request                                 $request
     * @param EntityManagerInterface                  $em
     * @param RepairOrderReviewInteractionsRepository $reviewInteractions
     *
     * @return Response
     */
    public function outcome(RepairOrderReview $repairOrderReview, Request $request, EntityManagerInterface $em, RepairOrderReviewInteractionsRepository $reviewInteractions)
    {
        $user     = $this->getUser();

        if (!$user instanceof Customer) {
            throw new NotAcceptableHttpException('The type of user should be Customer.');
        }

        if (!$repairOrderReview) {
            throw new NotAcceptableHttpException('The review of this repairOrder was not created yet.');
        }

        if ($repairOrderReview->getStatus() === 'Completed') {
            throw new NotAcceptableHttpException('This review was already completed.');
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
     * @Rest\Post("/api/my-review/{id}/resendMessage")
     *
     * @SWG\Tag(name="MyReview")
     * @SWG\Post(description="Resend a message to the customer and create a new interaction")
     *
     * @SWG\Response(response="200", description="Success!")
     * @SWG\Response(response="406", description="Invalid parameter")
     *
     * @param RepairOrderReview                       $repairOrderReview
     * @param RepairOrderReviewInteractionsRepository $reviewInteractions
     * @param MyReviewHelper                          $myReviewHelper
     *
     * @return Response
     */
    public function resendMessage(
        RepairOrderReview $repairOrderReview,
        RepairOrderReviewInteractionsRepository $reviewInteractions,
        MyReviewHelper $myReviewHelper
    ) {
        $user = $this->getUser();

        if (!$user instanceof Customer) {
            throw new NotAcceptableHttpException('The type of user should be Customer.');
        }

        if (!$repairOrderReview) {
            throw new NotAcceptableHttpException('The review of this repairOrder was not created yet.');
        }

        $reviewInteractions->new($repairOrderReview, 'Sent', $user);

        $repairOrder = $repairOrderReview->getRepairOrder();
        $myReviewHelper->sendMessage($repairOrder);

        return $this->handleView($this->view(['message' => 'Success'], Response::HTTP_OK));
    }
}
