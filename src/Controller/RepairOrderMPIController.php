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
     *     description="{'name':'Toyota MPI','results':[{'group':'Brakes','items':[{'name':'Driver Front','value':10,'special':true},{'name':'Passenger Front','value':10,'special':true},{'name':'Driver Rear','value':10,'special':true},{'name':'Passenger Rear','value':10,'special':true}]},{'group':'Tires','items':[{'name':'Driver Front','value':7,'special':true},{'name':'Passenger Front','value':7,'special':true},{'name':'Driver Rear','value':7,'special':true},{'name':'Passenger Rear','value':7,'special':true}]},{'group':'Exterior','items':[{'name':'Horn operation','value':'green','special':false},{'name':'Head lights \/ tail lights \/ turn signals \/ brake lights \/ hazard warning lights \/ exterior lamps','value':'green','special':false},{'name':'Windshield wiper and washer operation','value':'green','special':false},{'name':'Windshield glass','value':'green','special':false},{'name':'Fuel tank cap gasket','value':'green','special':false}]},{'group':'Interior','items':[{'name':'Dome light \/ amp light \/ dimmer combination meter','value':'green','special':false},{'name':'Cabin air filter','value':'green','special':false},{'name':'Parking brake operation','value':'green','special':false},{'name':'Check installation of driver's floor mat','value':'green','special':false}]},{'group':'Under Hood','items':[{'name':'Air filter','value':'green','special':false},{'name':'Battery condition (cables \/ clamps \/ corrosion)','value':'green','special':false},{'name':'Battery state of health','value':'green','special':false},{'name':'Cooling System (leaks)','value':'green','special':false},{'name':'Hoses (cracks \/ damage \/ leaks)','value':'green','special':false},{'name':'Drive belts (cracks \/ damage \/ wear)','value':'green','special':false},{'name':'Radiator core \/ air condition condenser','value':'green','special':false}]},{'group':'Fluids','items':[{'name':'Windshield washer','value':'green','special':false},{'name':'Coolant','value':'green','special':false},{'name':'Power steering','value':'grey','special':false},{'name':'Brake reservoir','value':'green','special':false},{'name':'Clutch reservoir','value':'grey','special':false},{'name':'Transmission \/ transaxle','value':'green','special':false},{'name':'Differential','value':'grey','special':false},{'name':'Transfer case (4WD models)','value':'grey','special':false}]},{'group':'Under Vehicle','items':[{'name':'Propeller \/ driveshaft (damage \/ leaks \/ U-joints)','value':'grey','special':false},{'name':'Drive \/ CV shaft (damage \/ leaks \/boots)','value':'grey','special':false},{'name':'Axle hub & bearing (damage \/ leaks \/ boots)','value':'green','special':false},{'name':'Steering linkage (damage \/ leaks \/ noise)','value':'green','special':false},{'name':'Suspension (damage \/ leaks \/ worn components)','value':'green','special':false},{'name':'Fluid leaks (engine \/ transmission \/ differential)','value':'green','special':false},{'name':'Exhaust system (damage \/ leaks \/ corrosion)','value':'green','special':false},{'name':'Fuel lines & connections \/ fuel tank bands \/ fuel tank vapor vent system hoses (damage \/ leaks \/ corrosion)','value':'green','special':false}]}]}",
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
        $results       = str_replace("'",'"', $request->get('results'));
        //check if params are valid
        if(!$repairOrderID || !$results){
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }
        //Check if Repair Order exists
        $repairOrder  = $repairOrderRepository->find($repairOrderID);
        if (!$repairOrder) {
            return $this->handleView($this->view('Invalid repair_order Parameter', Response::HTTP_BAD_REQUEST));
        }
        $obj = (array)json_decode($axleInfo);
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
