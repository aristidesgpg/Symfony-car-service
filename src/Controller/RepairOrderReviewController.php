<?php

namespace App\Controller;

use App\Entity\RepairOrderReview;
use App\Repository\RepairOrderReviewRepository;
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
 * Class RepairOrderReviewController
 *
 * @package App\Controller
 *
 */
class RepairOrderReviewController extends AbstractFOSRestController {
   
    /**
     * @Rest\Put("/api/repair-order-view/{id}/view")
     *
     * @SWG\Tag(name="Repair Order View")
     * @SWG\Put(description="Update a repairOrderView status with Viewed")
     *
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(type="object", ref=@Model(type=RepairOrderReview::class, groups=RepairOrderReview::GROUPS))
     * )
     * @SWG\Response(response="400", description="ROR is already completed")
     * @SWG\Response(response="404", description="ROR does not exist")
     *
     * @param RepairOrderReview      $repairOrderReview
     * @param EntityManagerInterface $em
     *
     * @return Response
     */

    public function viewed (RepairOrderReview $repairOrderReview, EntityManagerInterface $em) {
        if($repairOrderReview->getStatus() ==='Completed') {
            return $this->handleView($this->view([
                'message' => 'ROR is already completed',
            ], Response::HTTP_BAD_REQUEST));
        }
        
        $repairOrderReview->setStatus('Viewd');
        $repairOrderReview->setDateViewed(new \DateTime());

        $em->persist($repairOrderReview);
        $em->flush();

        $view = $this->view($repairOrderReview);
        $view->getContext()->setGroups(RepairOrderReview::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Put("/api/repair-order-view/{id}/outcome")
     *
     * @SWG\Tag(name="Repair Order View")
     * @SWG\Put(description="Update a repairOrderView rating and platform")
     *
     * @SWG\Parameter(name="rating", required=true, type="string", in="formData", enum={"poor", "average", "great"})
     * @SWG\Parameter(name="platform", required=true, type="string", in="formData", enum={"facebook", "google"})
     * 
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(type="object", ref=@Model(type=RepairOrderReview::class, groups=RepairOrderReview::GROUPS))
     * )
     * @SWG\Response(response="404", description="ROR does not exist")
     *
     * @param RepairOrderReview      $repairOrderReview
     * @param Request                $request
     * @param EntityManagerInterface $em
     *
     * @return Response
     */

    public function outcome (RepairOrderReview $repairOrderReview, Request $request, EntityManagerInterface $em) {
       
        $rating   = $request->get('rating');
        $platform = $request->get('platform');

        $repairOrderReview->setStatus('Completed');
        $repairOrderReview->setDateCompleted(new \DateTime());
        $repairOrderReview->setRating($rating);
        $repairOrderReview->setPlatform($platform);

        $em->persist($repairOrderReview);
        $em->flush();

        $view = $this->view($repairOrderReview);
        $view->getContext()->setGroups(RepairOrderReview::GROUPS);

        return $this->handleView($view);
    }

}
