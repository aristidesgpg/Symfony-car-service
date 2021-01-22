<?php

namespace App\Controller;

use App\Entity\RepairOrderTeam;
use App\Repository\RepairOrderRepository;
use App\Repository\RepairOrderTeamRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RepairOrderTeamController extends AbstractFOSRestController
{

    /**
     * @Rest\Post("/api/repair-order-team")
     *
     * @SWG\Tag(name="Repair Order Team")
     * @SWG\Post(description="Create a repairOrderTeam")
     *
     * @SWG\Parameter(
     *     name="repairOrderID",
     *     type="integer",
     *     in="formData",
     *     description="Repair Order ID",
     *     required=true
     * )
     * @SWG\Parameter(
     *     name="userID",
     *     type="integer",
     *     in="formData",
     *     description="User ID",
     *     required=true
     * )
     *
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(type="object", ref=@Model(type=RepairOrderTeam::class, groups=RepairOrderTeam::GROUPS))
     * )
     * @SWG\Response(
     *     response="404",
     *     description="Invalid repairOrderId"
     * )
     *
     * @return Response
     */

    public function new(
        Request $request,
        RepairOrderRepository $repairOrderRepository,
        UserRepository $userRepository,
        RepairOrderTeamRepository $repairOrderTeamRepository,
        EntityManagerInterface $em
    ) {
        $repairOrderID = $request->get('repairOrderID');
        $userID = $request->get('userID');
        $allowedRoles = ['ROLE_SERVICE_ADVISOR', 'ROLE_TECHNICIAN', 'ROLE_PARTS_ADVISOR'];

        if (!$repairOrderID) {
            return $this->handleView(
                $this->view('Missing Required Parameter: repairOrderID', Response::HTTP_BAD_REQUEST)
            );
        }

        if (!$userID) {
            return $this->handleView($this->view('Missing Required Parameter: userID', Response::HTTP_BAD_REQUEST));
        }

        $repairOrder = $repairOrderRepository->find($repairOrderID);
        if (!$repairOrder) {
            return $this->handleView($this->view('Repair Order Not Found', Response::HTTP_NOT_ACCEPTABLE));
        }

        $user = $userRepository->find($userID);
        if (!$user) {
            return $this->handleView($this->view('User Not Found', Response::HTTP_NOT_ACCEPTABLE));
        }

        if (!array_intersect($user->getRoles(), $allowedRoles)) {
            return $this->handleView(
                $this->view(
                    'User must be a service advisor, technician, or parts advisor',
                    Response::HTTP_NOT_ACCEPTABLE
                )
            );
        }

        // Check if they're already on the team
        $exists = $repairOrderTeamRepository->findOneBy(['repairOrder' => $repairOrder, 'user' => $user]);
        if ($exists) {
            return $this->handleView(
                $this->view(
                    'User is already on the team',
                    Response::HTTP_NOT_ACCEPTABLE
                )
            );
        }

        $repairOrderTeam = new RepairOrderTeam();
        $repairOrderTeam->setUser($user)
                        ->setRepairOrder($repairOrder);

        $em->persist($repairOrderTeam);
        $em->flush();

        $view = $this->view($repairOrderTeam);
        $view->getContext()->setGroups(RepairOrderTeam::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Delete("/api/repair-order-team/{id}")
     * @SWG\Tag(name="Repair Order Team")
     *
     * @SWG\Delete(description="Delete a repairOrderTeam")
     *
     * @SWG\Response(response="200", description="Success!")
     * @SWG\Response(
     *     response="404",
     *     description="Invalid repairOrderId"
     * )
     *
     * @param RepairOrderTeam        $repairOrderTeam
     * @param EntityManagerInterface $em
     *
     * @return Response
     */

    public function delete(RepairOrderTeam $repairOrderTeam, EntityManagerInterface $em)
    {
        $em->remove($repairOrderTeam);
        $em->flush();

        return $this->handleView(
            $this->view(
                [
                    'message' => 'Successfully removed',
                ]
            )
        );
    }

}
