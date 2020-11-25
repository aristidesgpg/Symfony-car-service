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
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Swagger\Annotations as SWG;
use App\Service\MPIInteractionHelper;

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
     *     description="Return Repair Order MPIs",
     *     @SWG\Items(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=RepairOrderMPI::class, groups=RepairOrderMPI::GROUPS)),
     *         description="id, repair_order_id, date_completed, date_sent, results"
     *     )
     * )
     *
     * @param RepairOrderMPIRepository $repairOrderMPIRepository
     *
     * @return Response
     */
    public function getRepairOrderMPIs (RepairOrderMPIRepository $repairOrderMPIRepository) {
        //get Repair Order MPIs
        $repairOrderMPIs = $repairOrderMPIRepository->findAll();
        $view            = $this->view($repairOrderMPIs);
        $view->getContext()->setGroups(['rom_list']);

        return $this->handleView($view);
    }

    /**
     * @Rest\Post("/api/repair-order-mpi")
     *
     * @SWG\Tag(name="Repair Order MPI")
     * @SWG\Post(description="Create a new Repair Order MPIs")
     *
     * @SWG\Parameter(
     *     name="repair_order",
     *     in="formData",
     *     required=true,
     *     type="integer",
     *     description="The Repair Order ID",
     * )
     * @SWG\Parameter(
     *     name="results",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The json string for results",
     * )
     * 
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "Successfully Created" }),
     *         )
     * )
     *
     * @param Request                $request
     * @param RepairOrderRepository  $repairOrderRepository
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function createRepairOrderMPI (Request $request, RepairOrderRepository $repairOrderRepository, EntityManagerInterface $em) {
        $repairOrderID = $request->get('repair_order');
        $results       = $request->get('results');
        //check if params are valid
        if(!$repairOrderID || !$results){
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }
        //Check if Repair Order exists
        $repairOrder  = $repairOrderRepository->find($repairOrderID);
        if (!$repairOrder) {
            return $this->handleView($this->view('Invalid repair_order Parameter', Response::HTTP_BAD_REQUEST));
        }
        //store repairOrderMPI
        $repairOrderMPI = new RepairOrderMPI();
        $repairOrderMPI->setRepairOrder($repairOrder)
                       ->setResults($results);

        $em->persist($repairOrderMPI);
        $em->flush();

        return $this->handleView($this->view([
            'message' => 'RepairOrderMPI Created'
        ], Response::HTTP_OK));
    }
}
