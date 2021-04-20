<?php

namespace App\Controller;


use App\Entity\RepairOrder;
use App\Entity\RepairOrderInteraction;
use App\Entity\RepairOrderMPI;
use App\Entity\RepairOrderMPIInteraction;
use App\Helper\FalsyTrait;
use App\Helper\iServiceLoggerTrait;
use App\Repository\RepairOrderMPIRepository;
use Exception;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Knp\Component\Pager\PaginatorInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
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

    private const PAGE_LIMIT = 50;

    private $repairOrderMPIRepo;

    public function __construct(RepairOrderMPIRepository $repairOrderMPIRepo)
    {
        $this->repairOrderMPIRepo = $repairOrderMPIRepo;
    }
    /**
     * @Rest\Get("/{id}", name="getRepairOrderInteractions")
     *
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(ref=@Model(type=RepairOrderMPI::class, groups=RepairOrderMPI::GROUPS))
     * )
     * @SWG\Response(response="404", description="RO does not exist")
     */
    public function getOne(RepairOrder $repairOrder): Response
    {

        if ($repairOrder->getDeleted()) {
            throw new NotFoundHttpException();
        }

        //$repairOrderMPI->findBy(['repair_order_id' => $repairOrder->getId()]);
        $view = $this->view($this->repairOrderMPIRepo->findBy(['id' => 1]));
        $view->getContext()->setGroups(RepairOrderMPI::GROUPS);

        return $this->handleView($view);
    }
}
