<?php

namespace App\Controller;

use App\Entity\RepairOrder;
use App\Entity\RepairOrderMPI;
use App\Repository\RepairOrderRepository;
use App\Repository\RepairOrderMPIRepository;
use App\Helper\iServiceLoggerTrait;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Swagger\Annotations as SWG;
use App\Service\MPITemplateHelper;


/**
 * Class RepairOrderMPIController
 *
 * @package App\Controller
 */
class RepairOrderMPIController extends AbstractFOSRestController {
    use iServiceLoggerTrait;

    /**
     * @Rest\Get("/api/repair-order-mpi")
     *
     * @SWG\Tag(name="Repair Order MPI")
     * @SWG\Get(description="Get All Repair Order MPIs")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return Repair Order MPIs"
     * )
     *
     * @param RepairOrderMPIRepository $RepairOrderMPIRepository
     *
     * @return Response
     */
    public function getRepairOrderMPIs (RepairOrderMPIRepository $RepairOrderMPIRepository) {
        //get Repair Order MPIs
        return $this->handleView($this->view($RepairOrderMPIRepository->findAll(), Response::HTTP_OK));
    }
}
