<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Repository\RepairOrderReviewInteractionsRepository;
use App\Repository\RepairOrderReviewRepository;
use App\Service\MyReviewHelper;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;

class MyReviewController extends AbstractFOSRestController
{
    /**
     * @Rest\Post("/api/my-review/view")
     *
     * @SWG\Tag(name="My Review")
     * @SWG\Post(description="Marks that the customer has viewed the review")
     *
     * @SWG\Parameter(
     *     name="repairOrderReviewID",
     *     type="integer",
     *    description="Repair Order Review ID",
     *     in="formData",
     *     required=true
     * )
     *
     * @SWG\Response(response="200", description="Success!")
     * @SWG\Response(response="406", description="Invalid parameter")
     *
     * @return Response
     */
    public function viewed(
        EntityManagerInterface $em,
        RepairOrderReviewRepository $repairOrderReviewRepository,
        RepairOrderReviewInteractionsRepository $reviewInteractions,
        Request $request
    ) {
        $repairOrderReviewID = $request->get('repairOrderReviewID');
        $user = $this->getUser();

        if (!$repairOrderReviewID) {
            throw new BadRequestHttpException('Missing Required parameter repairOrderReviewID');
        }

        if (!$user instanceof Customer) {
            throw new NotAcceptableHttpException('The type of user should be Customer.');
        }

        $repairOrderReview = $repairOrderReviewRepository->find($repairOrderReviewID);
        if (!$repairOrderReview) {
            throw new NotAcceptableHttpException('The review of this repairOrder was not created yet.');
        }

        // Check if customer role and not customer's RO
        if ($this->isGranted('ROLE_CUSTOMER')) {
            if ($repairOrderReview->getRepairOrder()->getPrimaryCustomer()->getId() != $this->getUser()->getId()) {
                return $this->handleView($this->view('Not Authorized', Response::HTTP_UNAUTHORIZED));
            }
        }

        if ('Complete' !== $repairOrderReview->getStatus()) {
            $repairOrderReview->setStatus('Viewed');
            $repairOrderReview->setDateViewed(new DateTime());

            $em->persist($repairOrderReview);
            $em->flush();
        }

        $reviewInteractions->new($repairOrderReview, 'Viewed', $user);

        return $this->handleView($this->view(['message' => 'Success'], Response::HTTP_OK));
    }

    /**
     * @Rest\Post("/api/my-review/outcome")
     *
     * @SWG\Tag(name="My Review")
     * @SWG\Post(description="Id of RepairOrderReview. Update a repairOrderView rating and platform and Create a new reviewInteraction")
     *
     * @SWG\Parameter(
     *     name="repairOrderReviewID",
     *     type="integer",
     *    description="Repair Order Review ID",
     *     in="formData",
     *     required=true
     * )
     * @SWG\Parameter(name="rating", required=true, type="string", in="formData", enum={"poor", "average", "great"})
     * @SWG\Parameter(name="platform", required=true, type="string", in="formData", enum={"facebook", "google"})
     *
     * @SWG\Response(response="200", description="Success!")
     * @SWG\Response(response="406", description="Invalid parameter")
     *
     * @return Response
     */
    public function outcome(
        RepairOrderReviewRepository $repairOrderReviewRepository,
        Request $request,
        EntityManagerInterface $em,
        RepairOrderReviewInteractionsRepository $reviewInteractions
    ) {
        $repairOrderReviewID = $request->get('repairOrderReviewID');
        $rating = $request->get('rating');
        $platform = $request->get('platform');
        $user = $this->getUser();

        if (!$repairOrderReviewID) {
            throw new BadRequestHttpException('Missing Required parameter: repairOrderReviewID');
        }

        if (!$rating) {
            throw new BadRequestHttpException('Missing Required Parameter: rating');
        }

        if (!$platform) {
            throw new BadRequestHttpException('Missing Required Parameter: platform');
        }

        if (!$user instanceof Customer) {
            throw new NotAcceptableHttpException('The type of user should be Customer.');
        }

        $repairOrderReview = $repairOrderReviewRepository->find($repairOrderReviewID);
        if (!$repairOrderReview) {
            throw new NotAcceptableHttpException('The review of this repairOrder was not created yet.');
        }

        // Check if customer role and not customer's RO
        if ($this->isGranted('ROLE_CUSTOMER')) {
            if ($repairOrderReview->getRepairOrder()->getPrimaryCustomer()->getId() != $this->getUser()->getId()) {
                return $this->handleView($this->view('Not Authorized', Response::HTTP_UNAUTHORIZED));
            }
        }

        if ('Complete' === $repairOrderReview->getStatus()) {
            throw new NotAcceptableHttpException('This review was already completed.');
        }

        $repairOrderReview->setStatus('Complete')
                          ->setDateCompleted(new DateTime())
                          ->setRating($rating)
                          ->setPlatform($platform);

        $em->persist($repairOrderReview);
        $em->flush();

        $reviewInteractions->new($repairOrderReview, 'Complete', $user);

        return $this->handleView($this->view(['message' => 'Success'], Response::HTTP_OK));
    }

    /**
     * @Rest\Post("/api/my-review/resend")
     *
     * @SWG\Tag(name="My Review")
     * @SWG\Post(description="Resend a message to the customer and create a new interaction")
     *
     * @SWG\Parameter(
     *     name="repairOrderReviewID",
     *     type="integer",
     *    description="Repair Order Review ID",
     *     in="formData",
     *     required=true
     * )
     *
     * @SWG\Response(response="200", description="Success!")
     * @SWG\Response(response="406", description="Invalid parameter")
     *
     * @return Response
     */
    public function resendMessage(
        RepairOrderReviewRepository $repairOrderReviewRepository,
        Request $request,
        RepairOrderReviewInteractionsRepository $reviewInteractions,
        MyReviewHelper $myReviewHelper
    ) {
        $repairOrderReviewID = $request->get('repairOrderReviewID');
        $user = $this->getUser();

        if (!$repairOrderReviewID) {
            throw new BadRequestHttpException('Missing Required parameter: repairOrderReviewID');
        }

        $repairOrderReview = $repairOrderReviewRepository->find($repairOrderReviewID);
        if (!$repairOrderReview) {
            throw new NotAcceptableHttpException('The review of this repairOrder was not created yet.');
        }

        $reviewInteractions->new($repairOrderReview, 'Sent', $user);

        $repairOrder = $repairOrderReview->getRepairOrder();
        $myReviewHelper->sendMessage($repairOrder);

        return $this->handleView($this->view(['message' => 'Success'], Response::HTTP_OK));
    }
}
