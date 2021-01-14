<?php

namespace App\Controller;

use App\Entity\RepairOrder;
use App\Entity\RepairOrderMPI;
use App\Entity\RepairOrderMPIInteraction;
use App\Entity\RepairOrderQuote;
use App\Entity\RepairOrderQuoteRecommendation;
use App\Repository\RepairOrderRepository;
use App\Repository\RepairOrderMPIRepository;
use App\Repository\OperationCodeRepository;
use App\Service\MPIInteractionHelper;
use App\Helper\iServiceLoggerTrait;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Swagger\Annotations as SWG;

/**
 * Class RepairOrderMPIController
 *
 * @package App\Controller
 */
class RepairOrderMPIController extends AbstractFOSRestController {
    use iServiceLoggerTrait;

    /**
     * @Rest\Post("/api/repair-order-mpi")
     *
     * @SWG\Tag(name="Repair Order MPI")
     * @SWG\Post(description="Create a new Repair Order MPIs")
     *
     * @SWG\Parameter(
     *     name="repairOrderID",
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
     *     description="{'name':'Toyota MPI','results':[{'group':'Brakes','items':[{'name':'Driver Front','value':10,'special':true,'status':'green'},{'name':'Passenger Front','value':10,'special':true,'status':'green'},{'name':'Driver Rear','value':10,'special':true,'status':'green'},{'name':'Passenger Rear','value':10,'special':true,'status':'green'}]},{'group':'Tires','items':[{'name':'Driver Front','value':7,'special':true,'status':'yellow'},{'name':'Passenger Front','value':7,'special':true,'status':'yellow'},{'name':'Driver Rear','value':7,'special':true,'status':'yellow'},{'name':'Passenger Rear','value':7,'special':true,'status':'yellow'}]},{'group':'Exterior','items':[{'name':'Horn operation','status':'green','special':false},{'name':'Head lights \/ tail lights \/ turn signals \/ brake lights \/ hazard warning lights \/ exterior lamps','status':'green','special':false},{'name':'Windshield wiper and washer operation','status':'green','special':false},{'name':'Windshield glass','status':'green','special':false},{'name':'Fuel tank cap gasket','status':'green','special':false}]},{'group':'Interior','items':[{'name':'Dome light \/ amp light \/ dimmer combination meter','status':'green','special':false},{'name':'Cabin air filter','status':'green','special':false},{'name':'Parking brake operation','status':'green','special':false},{'name':'Check installation of driver s floor mat','status':'green','special':false}]},{'group':'Under Hood','items':[{'name':'Air filter','status':'green','special':false},{'name':'Battery condition (cables \/ clamps \/ corrosion)','status':'green','special':false},{'name':'Battery state of health','status':'green','special':false},{'name':'Cooling System (leaks)','status':'green','special':false},{'name':'Hoses (cracks \/ damage \/ leaks)','status':'green','special':false},{'name':'Drive belts (cracks \/ damage \/ wear)','status':'green','special':false},{'name':'Radiator core \/ air condition condenser','status':'green','special':false}]},{'group':'Fluids','items':[{'name':'Windshield washer','status':'green','special':false},{'name':'Coolant','status':'green','special':false},{'name':'Power steering','status':'grey','special':false},{'name':'Brake reservoir','status':'green','special':false},{'name':'Clutch reservoir','status':'grey','special':false},{'name':'Transmission \/ transaxle','status':'green','special':false},{'name':'Differential','status':'grey','special':false},{'name':'Transfer case (4WD models)','status':'grey','special':false}]},{'group':'Under Vehicle','items':[{'name':'Propeller \/ driveshaft (damage \/ leaks \/ U-joints)','status':'grey','special':false},{'name':'Drive \/ CV shaft (damage \/ leaks \/boots)','status':'grey','special':false},{'name':'Axle hub & bearing (damage \/ leaks \/ boots)','status':'green','special':false},{'name':'Steering linkage (damage \/ leaks \/ noise)','status':'green','special':false},{'name':'Suspension (damage \/ leaks \/ worn components)','status':'green','special':false},{'name':'Fluid leaks (engine \/ transmission \/ differential)','status':'green','special':false},{'name':'Exhaust system (damage \/ leaks \/ corrosion)','status':'green','special':false},{'name':'Fuel lines & connections \/ fuel tank bands \/ fuel tank vapor vent system hoses (damage \/ leaks \/ corrosion)','status':'green','special':false}]}]}",
     * )
     * @SWG\Parameter(
     *     name="recommendations",
     *     in="formData",
     *     required=false,
     *     type="string",
     *     description="[{'operationCode':14, 'description':'Neque maxime ex dolorem ut.','preApproved':true,'approved':true,'partsPrice':1.0,'suppliesPrice':14.02,'laborPrice':5.3,'notes':'Cumque tempora ut nobis.'},{'operationCode':11, 'description':'Quidem earum sapiente at dolores quia natus.','preApproved':false,'approved':true,'partsPrice':2.6,'suppliesPrice':509.02,'laborPrice':36.9,'notes':'Et accusantium rerum.'},{'operationCode':4, 'description':'Mollitia unde nobis doloribus sed.','preApproved':true,'approved':false,'partsPrice':1.1,'suppliesPrice':71.7,'laborPrice':55.1,'notes':'Voluptates et aut debitis.'}]",
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
     * @param RepairOrderRepository    $repairOrderRepository
     * @param OperationCodeRepository  $operationCodeRepository
     * @param RepairOrderMPIRepository $repairOrderMPIRepos
     * @param EntityManagerInterface   $em
     *
     * @return Response
     */
    public function createRepairOrderMPI (
        Request                  $request, 
        RepairOrderRepository    $repairOrderRepository,
        OperationCodeRepository  $operationCodeRepository, 
        RepairOrderMPIRepository $repairOrderMPIRepos,
        EntityManagerInterface   $em
    ) {
        $repairOrderID   = $request->get('repairOrderID');
        $results         = str_replace("'",'"', $request->get('results'));
        $recommendations = str_replace("'",'"', $request->get('recommendations'));
        //check if params are valid
        if(!$repairOrderID || !$results){
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }
        //Check if Repair Order exists
        $repairOrder  = $repairOrderRepository->find($repairOrderID);
        if (!$repairOrder) {
            return $this->handleView($this->view('Invalid repair_order Parameter', Response::HTTP_BAD_REQUEST));
        }
        //update RepairOrder MPI Status
        $repairOrder->setMpiStatus("Completed");
        //check if repair Order is duplicated
        $isDuplicated = $repairOrderMPIRepos->findBy(['repairOrder' => $repairOrderID]);
        if($isDuplicated){
            return $this->handleView($this->view('MPI results already exist on this Repair Order.', Response::HTTP_BAD_REQUEST));
        }

        $obj    = json_decode($results);
        $result = $obj->results;

        foreach ($result as $index => $group) {
            $items = $group->items;
            foreach($items as $key => $item){
                if($group->group == "Brakes")
                    $item->text = $item->value." / 10 - ".$item->name;
                else if($group->group == "Tires")
                    $item->text = $item->value." / 32 - ".$item->name;
                else
                    $item->text = $item->name;
            }
        }
        $res = json_encode($obj);

        //store repairOrderMPI
        $repairOrderMPI = new RepairOrderMPI();
        $repairOrderMPI->setRepairOrder($repairOrder)
                       ->setResults($res);

        $em->persist($repairOrderMPI);
        $em->flush();

        //create repairOrderQuote
        $repairOrderQuote = new RepairOrderQuote();
        $repairOrderQuote->setRepairOrder($repairOrder);

        $em->persist($repairOrderQuote);
        $em->flush();

        //create repairOrderQuoteRecommendations
        $recommendationsObj = (array)json_decode($recommendations);
        foreach ($recommendationsObj as $index => $recommendation){
            $rOQRecom = new RepairOrderQuoteRecommendation();
            //Check if Operation Code exists
            $operationCode = $operationCodeRepository->findOneBy(["id" => $recommendation->operationCode]);
            if (!$operationCode) {
                return $this->handleView($this->view('Invalid operation_code Parameter', Response::HTTP_BAD_REQUEST));
            }
            $rOQRecom->setRepairOrderQuote($repairOrderQuote)
                     ->setOperationCode($operationCode)
                     ->setDescription($recommendation->description)
                     ->setPreApproved(filter_var($recommendation->preApproved, FILTER_VALIDATE_BOOLEAN))
                     ->setApproved(filter_var($recommendation->approved, FILTER_VALIDATE_BOOLEAN))
                     ->setPartsPrice($recommendation->partsPrice)
                     ->setSuppliesPrice($recommendation->suppliesPrice)
                     ->setNotes($recommendation->notes);

            $em->persist($rOQRecom);
            $em->flush();
        }

        //Create RepairOrderMPIInteraction
        $repairOrderMPIInteraction = new RepairOrderMPIInteraction();
        $repairOrderMPIInteraction->setRepairOrderMPI($repairOrderMPI)
                                  ->setUser($repairOrder->getPrimaryTechnician())
                                  ->setCustomer($repairOrder->getPrimaryCustomer())
                                  ->setType("Completed");

        return $this->handleView($this->view([
            'message' => 'RepairOrderMPI Created'
        ], Response::HTTP_OK));
    }

    /**
     * @Rest\Post("/api/repair-order-mpi/{id}/view")
     *
     * @SWG\Tag(name="Repair Order MPI")
     * @SWG\Post(description="Create a new Repair Order MPIs")
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
     * @param RepairOrderMPI           $repairOrderMPI
     * @param RepairOrderRepository    $repairOrderRepository
     * @param OperationCodeRepository  $operationCodeRepository
     * @param RepairOrderMPIRepository $repairOrderMPIRepos
     * @param EntityManagerInterface   $em
     *
     * @return Response
     */
    public function customerViewed (
        RepairOrderMPI           $repairOrderMPI, 
        RepairOrderRepository    $repairOrderRepository,
        OperationCodeRepository  $operationCodeRepository, 
        RepairOrderMPIRepository $repairOrderMPIRepos,
        EntityManagerInterface   $em
    ) {
        $repairOrder = $repairOrderMPI->getRepairOrder();
        //Create RepairOrderMPIInteraction
        $repairOrderMPIInteraction = new RepairOrderMPIInteraction();
        $repairOrderMPIInteraction->setRepairOrderMPI($repairOrderMPI)
                                    ->setUser($repairOrder->getPrimaryTechnician())
                                    ->setCustomer($repairOrder->getPrimaryCustomer())
                                    ->setType("Viewed");
        //update RepairOrder MPI Status
        $repairOrder->setMpiStatus("Viewed");

        return $this->handleView($this->view([
            'message' => 'RepairOrderMPI Status Updated'
        ], Response::HTTP_OK));
    }

    /**
     * @Rest\Delete("/api/repair-order-mpi/{id}")
     *
     * @SWG\Tag(name="Repair Order MPI")
     * @SWG\Delete(description="Delete a Repair Order MPI")
     * 
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "Successfully Deleted" }),
     *         )
     * )
     *
     * @param RepairOrderMPI           $repairOrderMPI
     * @param EntityManagerInterface   $em
     *
     * @return Response
     */
    public function deleteRepairOrderMPI (
        RepairOrderMPI           $repairOrderMPI,
        EntityManagerInterface   $em
    ) {
        $repairOrder = $repairOrderMPI->getRepairOrder();
        $repairOrder->setMpiStatus('Not Started');

        $em->persist($repairOrder);
        $em->remove($repairOrderMPI);

        $em->flush();

        return $this->handleView($this->view([
            'message' => 'RepairOrderMPI Deleted'
        ], Response::HTTP_OK));
    }
}
