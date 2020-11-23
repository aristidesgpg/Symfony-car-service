<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Customer;
use App\Entity\RepairOrderMPI;
use App\Entity\RepairOrderMPIInteraction;
use App\Repository\UserRepository;
use App\Repository\CustomerRepository;
use App\Repository\RepairOrderMPIRepository;
use App\Repository\RepairOrderMPIInteractionRepository;
use App\Helper\iServiceLoggerTrait;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Swagger\Annotations as SWG;
use App\Service\MPITemplateHelper;


/**
 * Class RepairOrderMPIInteractionController
 *
 * @package App\Controller
 */
class RepairOrderMPIInteractionController extends AbstractFOSRestController {
    use iServiceLoggerTrait;

    /**
     * @Rest\Get("/api/repair-order-mpi-interaction")
     *
     * @SWG\Tag(name="Repair Order MPI Interaction")
     * @SWG\Get(description="Get All Repair Order MPI Interactions")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return Repair Order MPI Interactions",
     *     @SWG\Schema(type="object", ref=@Model(type=RepairOrderMPIInteraction::class, groups=RepairOrderMPIInteraction::GROUPS))
     * )
     *
     * @param RepairOrderMPIInteractionRepository $repairOrderMPIInteractionRepository
     *
     * @return Response
     */
    public function getRepairOrderMPIInteractions (RepairOrderMPIInteractionRepository $repairOrderMPIInteractionRepo) {
        //get Repair Order MPI Interactions
        $repairOrderMPIInteractions = $repairOrderMPIInteractionRepo->findAll();
        $view                       = $this->view($repairOrderMPIInteractions);
        $view->getContext()->setGroups(RepairOrderMPIInteraction::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Post("/api/repair-order-mpi-interaction")
     *
     * @SWG\Tag(name="Repair Order MPI Interaction")
     * @SWG\Post(description="Create a new Repair Order MPI Interaction")
     *
     * @SWG\Parameter(
     *     name="repair_order_mpi",
     *     in="formData",
     *     required=true,
     *     type="integer",
     *     description="The Repair Order MPI ID",
     * )
     * @SWG\Parameter(
     *     name="user",
     *     in="formData",
     *     required=true,
     *     type="integer",
     *     description="The User ID",
     * )
     * @SWG\Parameter(
     *     name="customer",
     *     in="formData",
     *     required=true,
     *     type="integer",
     *     description="The Customer ID",
     * )
     * @SWG\Parameter(
     *     name="type",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Type of interaction",
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
     * @param Request                  $request
     * @param RepairOrderMPIRepository $repairOrderMPIRepository
     * @param UserRepository           $userRepository
     * @param CustomerRepository       $customerRepository
     * @param EntityManagerInterface   $em
     *
     * @return Response
     */
    public function createRepairOrderMPIInteraction (
                        Request $request, 
                        RepairOrderMPIRepository $repairOrderMPIRepository, 
                        UserRepository           $userRepository,
                        CustomerRepository       $customerRepository,
                        EntityManagerInterface   $em) {

        $repairOrderMPIID = $request->get('repair_order_mpi');
        $userID           = $request->get('user');
        $customerID       = $request->get('customer');
        $type             = $request->get('type');

        //check if params are valid
        if(!$repairOrderMPIID || !$userID || !$customerID || !$type){
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }
        //Check if Repair Order MPI exists
        $repairOrderMPI  = $repairOrderMPIRepository->find($repairOrderMPIID);
        if (!$repairOrderMPI) {
            return $this->handleView($this->view('Invalid repair_order_mpi Parameter', Response::HTTP_BAD_REQUEST));
        }
        //Check if User exists
        $user           = $userRepository->find($userID);
        if (!$user) {
            return $this->handleView($this->view('Invalid user Parameter', Response::HTTP_BAD_REQUEST));
        }
         //Check if Customer exists
        $customer       = $customerRepository->find($customerID);
        if (!$customer) {
            return $this->handleView($this->view('Invalid customer Parameter', Response::HTTP_BAD_REQUEST));
        }
        //store repairOrderMPI
        $repairOrderMPIInteraction = new RepairOrderMPIInteraction();
        $repairOrderMPIInteraction->setRepairOrderMPI($repairOrderMPI)
                                  ->setUser($user)
                                  ->setCustomer($customer)
                                  ->setType($type);

        $em->persist($repairOrderMPIInteraction);
        $em->flush();

        return $this->handleView($this->view([
            'message' => 'Repair Order MPI Interaction Was Created'
        ], Response::HTTP_OK));
    }
}
