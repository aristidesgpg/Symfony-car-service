<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Entity\RepairOrderMPI;
use App\Entity\RepairOrderMPIInteraction;
use App\Helper\iServiceLoggerTrait;
use App\Repository\RepairOrderMPIRepository;
use App\Repository\RepairOrderRepository;
use App\Service\RepairOrderMPIHelper;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RepairOrderMPIController extends AbstractFOSRestController
{
    use iServiceLoggerTrait;

    private const PAGE_LIMIT = 100;

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
     *     description="{""name"":""Toyota MPI"",""results"":[{""group"":""Brakes"",""items"":[{""name"":""Driver Front"",""value"":10,""special"":true,""status"":""green""},{""name"":""Passenger Front"",""value"":10,""special"":true,""status"":""green""},{""name"":""Driver Rear"",""value"":10,""special"":true,""status"":""green""},{""name"":""Passenger Rear"",""value"":10,""special"":true,""status"":""green""}]},{""group"":""Tires"",""items"":[{""name"":""Driver Front"",""value"":7,""special"":true,""status"":""yellow""},{""name"":""Passenger Front"",""value"":7,""special"":true,""status"":""yellow""},{""name"":""Driver Rear"",""value"":7,""special"":true,""status"":""yellow""},{""name"":""Passenger Rear"",""value"":7,""special"":true,""status"":""yellow""}]},{""group"":""Exterior"",""items"":[{""name"":""Horn operation"",""status"":""green"",""special"":false},{""name"":""Head lights \/ tail lights \/ turn signals \/ brake lights \/ hazard warning lights \/ exterior lamps"",""status"":""green"",""special"":false},{""name"":""Windshield wiper and washer operation"",""status"":""green"",""special"":false},{""name"":""Windshield glass"",""status"":""green"",""special"":false},{""name"":""Fuel tank cap gasket"",""status"":""green"",""special"":false}]},{""group"":""Interior"",""items"":[{""name"":""Dome light \/ amp light \/ dimmer combination meter"",""status"":""green"",""special"":false},{""name"":""Cabin air filter"",""status"":""green"",""special"":false},{""name"":""Parking brake operation"",""status"":""green"",""special"":false},{""name"":""Check installation of driver s floor mat"",""status"":""green"",""special"":false}]},{""group"":""Under Hood"",""items"":[{""name"":""Air filter"",""status"":""green"",""special"":false},{""name"":""Battery condition (cables \/ clamps \/ corrosion)"",""status"":""green"",""special"":false},{""name"":""Battery state of health"",""status"":""green"",""special"":false},{""name"":""Cooling System (leaks)"",""status"":""green"",""special"":false},{""name"":""Hoses (cracks \/ damage \/ leaks)"",""status"":""green"",""special"":false},{""name"":""Drive belts (cracks \/ damage \/ wear)"",""status"":""green"",""special"":false},{""name"":""Radiator core \/ air condition condenser"",""status"":""green"",""special"":false}]},{""group"":""Fluids"",""items"":[{""name"":""Windshield washer"",""status"":""green"",""special"":false},{""name"":""Coolant"",""status"":""green"",""special"":false},{""name"":""Power steering"",""status"":""grey"",""special"":false},{""name"":""Brake reservoir"",""status"":""green"",""special"":false},{""name"":""Clutch reservoir"",""status"":""grey"",""special"":false},{""name"":""Transmission \/ transaxle"",""status"":""green"",""special"":false},{""name"":""Differential"",""status"":""grey"",""special"":false},{""name"":""Transfer case (4WD models)"",""status"":""grey"",""special"":false}]},{""group"":""Under Vehicle"",""items"":[{""name"":""Propeller \/ driveshaft (damage \/ leaks \/ U-joints)"",""status"":""grey"",""special"":false},{""name"":""Drive \/ CV shaft (damage \/ leaks \/boots)"",""status"":""grey"",""special"":false},{""name"":""Axle hub & bearing (damage \/ leaks \/ boots)"",""status"":""green"",""special"":false},{""name"":""Steering linkage (damage \/ leaks \/ noise)"",""status"":""green"",""special"":false},{""name"":""Suspension (damage \/ leaks \/ worn components)"",""status"":""green"",""special"":false},{""name"":""Fluid leaks (engine \/ transmission \/ differential)"",""status"":""green"",""special"":false},{""name"":""Exhaust system (damage \/ leaks \/ corrosion)"",""status"":""green"",""special"":false},{""name"":""Fuel lines & connections \/ fuel tank bands \/ fuel tank vapor vent system hoses (damage \/ leaks \/ corrosion)"",""status"":""green"",""special"":false}]}]}",
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
     * @return Response
     */
    public function createRepairOrderMPI(
        Request $request,
        RepairOrderRepository $repairOrderRepository,
        RepairOrderMPIRepository $repairOrderMPIRepository,
        EntityManagerInterface $em,
        RepairOrderMPIHelper $repairOrderMPIHelper
    ) {
        $repairOrderID = $request->get('repairOrderID');
        $results = $request->get('results');

        //check if params are valid
        if (!$repairOrderID) {
            throw new BadRequestHttpException('Missing Required Parameter repairOrderID');
        }

        if (!$results) {
            throw new BadRequestHttpException('Missing Required Parameter results');
        }

        //Check if Repair Order exists
        $repairOrder = $repairOrderRepository->find($repairOrderID);
        if (!$repairOrder) {
            throw new NotFoundHttpException('Repair Order Not Found');
        }

        // check if repair Order is duplicated
        $isDuplicated = $repairOrderMPIRepository->findOneBy(['repairOrder' => $repairOrderID]);
        if ($isDuplicated) {
            throw new BadRequestHttpException('MPI Results already exists for this repair order');
        }

        // Throws appropriate http error if there was a validation error
        $mpiResultsJSON = $repairOrderMPIHelper->validateMPIResultsJSON($results);

        // Store repairOrderMPI
        $repairOrderMPI = new RepairOrderMPI();
        $repairOrderMPI->setRepairOrder($repairOrder)
                       ->setStatus('Complete')
                       ->setResults($mpiResultsJSON);

        $em->persist($repairOrderMPI);
        $em->flush();

        // Create RepairOrderMPIInteraction
        $repairOrderMPIInteraction = new RepairOrderMPIInteraction();
        $repairOrderMPIInteraction->setRepairOrderMPI($repairOrderMPI)
                                  ->setUser($this->getUser())
                                  ->setType('Complete');
        $repairOrderMPI->addRepairOrderMPIInteraction($repairOrderMPIInteraction);
        $em->persist($repairOrderMPI);
        $em->flush();

        // Check to see if we need to assign the technician
        if (is_null($repairOrder->getPrimaryTechnician()) && $this->isGranted('ROLE_TECHNICIAN')) {
            $repairOrder->setPrimaryTechnician($this->getUser());
            $em->persist($repairOrder);
            $em->flush();
        }

        // Send MPI
        $repairOrderMPIHelper->sendMPI($repairOrderMPI);

        $view = $this->view($repairOrderMPI);
        $view->getContext()->setGroups(['rom_list', 'romi_list', 'user_list', 'customer_list']);

        return $this->handleView($view);
    }

    /**
     * @Rest\Post("/api/repair-order-mpi/view")
     *
     * @SWG\Tag(name="Repair Order MPI")
     * @SWG\Post(description="Set RepairOrderMPI status as Viewed")
     *
     * @SWG\Parameter(
     *     name="repairOrderMPIID",
     *     type="integer",
     *     in="formData",
     *     description="ID for the Repair Order MPI",
     *     required=true
     * )
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "RepairOrderMPI Status Updated" }),
     *         )
     * )
     *
     * @return Response
     */
    public function customerViewed(
        EntityManagerInterface $em,
        Request $request,
        RepairOrderMPIRepository $repairOrderMPIRepository
    ) {
        $repairOrderMPIID = $request->get('repairOrderMPIID');
        if (!$repairOrderMPIID) {
            throw new BadRequestHttpException('Missing Required Parameter repairOrderMPMIID');
        }

        $repairOrderMPI = $repairOrderMPIRepository->find($repairOrderMPIID);
        if (!$repairOrderMPI) {
            throw new NotFoundHttpException('Repair Order MPI Not Found');
        }

        $repairOrder = $repairOrderMPI->getRepairOrder();

        // Check if customer role and not customer's RO
        if ($this->isGranted('ROLE_CUSTOMER')) {
            if ($repairOrder->getPrimaryCustomer()->getId() != $this->getUser()->getId()) {
                return $this->handleView($this->view('Not Authorized', Response::HTTP_UNAUTHORIZED));
            }
        }

        //Create RepairOrderMPIInteraction
        $repairOrderMPIInteraction = new RepairOrderMPIInteraction();
        $repairOrderMPIInteraction->setRepairOrderMPI($repairOrderMPI)
                                  ->setUser($repairOrder->getPrimaryTechnician())
                                  ->setCustomer($repairOrder->getPrimaryCustomer())
                                  ->setType('Viewed');

        $repairOrderMPI->addRepairOrderMPIInteraction($repairOrderMPIInteraction)
                       ->setDateViewed(new DateTime());
        $em->persist($repairOrderMPI);
        $em->flush();

        $view = $this->view($repairOrderMPI);
        $view->getContext()->setGroups(['rom_list', 'romi_list', 'user_list', 'customer_list']);

        return $this->handleView($view);
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
     * @return Response
     */
    public function deleteRepairOrderMPI(
        RepairOrderMPI $repairOrderMPI,
        EntityManagerInterface $em
    ) {
        $repairOrder = $repairOrderMPI->getRepairOrder();
        $repairOrder->setMpiStatus('Not Started');

        $em->persist($repairOrder);
        $em->remove($repairOrderMPI);

        $em->flush();

        return $this->handleView(
            $this->view(
                [
                    'message' => 'Repair Order MPI Deleted',
                ],
                Response::HTTP_OK
            )
        );
    }
}
