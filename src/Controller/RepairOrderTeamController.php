<?php

namespace App\Controller;
use App\Entity\RepairOrderTeam;
use App\Entity\User;
use App\Entity\RepairOrder;
use App\Repository\RepairOrderTeamRepository;
use App\Repository\RepairOrderRepository;
use App\Response\ValidationResponse;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class RepairOrderTeamController
 *
 * @package App\Controller
 *
 */
class RepairOrderTeamController extends AbstractFOSRestController {

    /**
     * @Rest\Post("/api/repair-order/{id}/team")
     *
     * @SWG\Tag(name="RepairOrderTeam")
     * @SWG\Post(description="Create a repairOrderTeam")
     *
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(type="object", ref=@Model(type=RepairOrderTeam::class, groups=RepairOrderTeam::GROUPS))
     * )
     *
     * @SWG\Response(
     *     response="404",
     *     description="Invalid repairOrderId"
     * )
     *
     * @param RepairOrder                $repairOrder
     * @param RepairOrderTeam        $repairOrderTeam
     * @param RepairOrderRepository  $repairOrderRepository
     * @param EntityManagerInterface $em
     *
     * @return Response
     */

    public function new (RepairOrder $repairOrder, RepairOrderRepository $repairOrderRepository, EntityManagerInterface $em) {
        if(!$repairOrder)
            throw new NotFoundHttpException();
        $user        = $this->getUser();

        $repairOrderTeam = new RepairOrderTeam();
        
        $repairOrderTeam->setUser($user);
        $repairOrderTeam->setRepairOrder($repairOrder);
        
        $em->persist($repairOrderTeam);
        $em->flush();

        $view        = $this->view($repairOrderTeam);
        $view->getContext()->setGroups(RepairOrderTeam::GROUPS);

        return $this->handleView($view);
    }

}
