<?php

namespace App\Controller;

use App\Entity\MPITemplate;
use App\Entity\InspectionGroup;
use App\Entity\MPIItem;
use App\Repository\MPITemplateRepository;
use App\Repository\InspectionGroupRepository;
use App\Repository\MPIItemRepository;
use App\Helper\iServiceLoggerTrait;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;

/**
 * Class MPITemplateController
 *
 * @package App\Controller
 */
class MPITemplateController extends AbstractFOSRestController {
    use iServiceLoggerTrait;
    
    /**
     * @Rest\Post("/api/mpi-template")
     *
     * @SWG\Tag(name="MPI Template")
     * @SWG\Post(description="Create a MPI Template")
     *
     * @SWG\Parameter(
     *     name="name",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Name of MPI Template",
     * )
     * @SWG\Parameter(
     *     name="axles",
     *     in="formData",
     *     required=true,
     *     type="integer",
     *     description="The Number of Axles",
     * )
     * @SWG\Parameter(
     *     name="axleInfo",
     *     in="formData",
     *     required=true,
     *     type="object",
     *     description="The Number of Axles",
     * )
     * 
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "Successfully Updated" }),
     *         )
     * )
     *
     * @param Request                $request
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function createTemplate (Request $request, EntityManagerInterface $em) {
        $name     = $request->get('name');
        $axles    = $request->get('axles');
        $axleInfo = $request->get('axleInfo');

        //param is invalid
        if (!$name || !$axles || !$axleInfo) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        // update template
        $mpiTemplate->setName($name);

        $em->persist($mpiTemplate);
        $em->flush();

        $this->logInfo('MPI Template "' . $mpiTemplate->getName() . '" Has Been Updated');

        return $this->handleView($this->view([
            'message' => ' MPI Template Updated'
        ], Response::HTTP_OK));
    }

    /**
     * @Rest\Put("/api/mpi-template/{id}")
     *
     * @SWG\Tag(name="MPI Template")
     * @SWG\Put(description="Update a MPI Template")
     *
     * @SWG\Parameter(
     *     name="name",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Name of MPI Template",
     * )
     * 
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "Successfully Updated" }),
     *         )
     * )
     *
     * @param MPITemplate            $mpiTemplate
     * @param Request                $request
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function editTemplate (MPITemplate $mpiTemplate, Request $request, EntityManagerInterface $em) {
        $name = $request->get('name');

        //param is invalid
        if (!$name) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        // update template
        $mpiTemplate->setName($name);

        $em->persist($mpiTemplate);
        $em->flush();

        $this->logInfo('MPI Template "' . $mpiTemplate->getName() . '" Has Been Updated');

        return $this->handleView($this->view([
            'message' => ' MPI Template Updated'
        ], Response::HTTP_OK));
    }

    /**
     * @Rest\Post("/api/mpi-template/de-activate/{id}")
     *
     * @SWG\Tag(name="MPI Template")
     * @SWG\Post(description="Deactivate a MPI Template")
     * 
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "Successfully Deactivated" }),
     *         )
     * )
     *
     * @param MPITemplate            $mpiTemplate
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function deactivateTemplate (MPITemplate $mpiTemplate, EntityManagerInterface $em) {

        // deactivate template
        $mpiTemplate->setActive(false);

        $em->persist($mpiTemplate);
        $em->flush();

        $this->logInfo('MPI Template "' . $mpiTemplate->getName() . '" Has Been Deactivated');

        return $this->handleView($this->view([
            'message' => ' MPI Template Deactivated'
        ], Response::HTTP_OK));
    }

    /**
     * @Rest\Delete("/api/mpi-template/{id}")
     *
     * @SWG\Tag(name="MPI Template")
     * @SWG\Delete(description="Delete a MPI Template")
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
     * @param MPITemplate            $mpiTemplate
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function deleteTemplate (MPITemplate $mpiTemplate, EntityManagerInterface $em) {

        // delete template
        $mpiTemplate->setDeleted(true);

        $em->persist($mpiTemplate);
        $em->flush();

        $this->logInfo('MPI Template "' . $mpiTemplate->getName() . '" Has Been Deleted');

        return $this->handleView($this->view([
            'message' => ' MPI Template Deleted'
        ], Response::HTTP_OK));
    }

    /**
     * @Rest\Post("/api/mpi-group")
     *
     * @SWG\Tag(name="MPI Group")
     * @SWG\Post(description="Create a new MPI Group")
     * 
     * @SWG\Parameter(
     *     name="template",
     *     in="formData",
     *     required=true,
     *     type="integer",
     *     description="The ID of MPI Template",
     * )
     * @SWG\Parameter(
     *     name="name",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Name of MPI Group",
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
     * @param MPITemplateRepository  $mpiTemplateRepo
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function createGroup (Request $request, MPITemplateRepository  $mpiTemplateRepo, EntityManagerInterface $em) {
        $template = $request->get('template');
        $name     = $request->get('name');

        //param is invalid
        if (!$template || !$name) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        $mpiTemplate = $mpiTemplateRepo->findOneById($template);
        //Check if MPI Template exists
        if(!$mpiTemplate){
            return $this->handleView($this->view('Invalid Template Parameter', Response::HTTP_BAD_REQUEST));
        }
        // create group
        $inspectionGroup = new InspectionGroup();
        $inspectionGroup->setName($name)
                        ->setMpiTemplateId($mpiTemplate);

        $em->persist($inspectionGroup);
        $em->flush();

        $this->logInfo('MPI Group "' . $inspectionGroup->getName() . '" Has Been Created');

        return $this->handleView($this->view([
            'message' => ' MPI Group Created'
        ], Response::HTTP_OK));
    }

    /**
     * @Rest\Put("/api/mpi-group/{id}")
     *
     * @SWG\Tag(name="MPI Group")
     * @SWG\Put(description="Update a MPI Group")
     *
     * @SWG\Parameter(
     *     name="name",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Name of MPI Group",
     * )
     * 
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "Successfully Updated" }),
     *         )
     * )
     *
     * @param InspectionGroup        $inspectionGroup
     * @param Request                $request
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function editGroup (InspectionGroup $inspectionGroup, Request $request, EntityManagerInterface $em) {
        $name = $request->get('name');

        //param is invalid
        if (!$name) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        // update group
        $inspectionGroup->setName($name);

        $em->persist($inspectionGroup);
        $em->flush();

        $this->logInfo('MPI Group "' . $inspectionGroup->getName() . '" Has Been Updated');

        return $this->handleView($this->view([
            'message' => ' MPI Group Updated'
        ], Response::HTTP_OK));
    }

    /**
     * @Rest\Post("/api/mpi-group/de-activate/{id}")
     *
     * @SWG\Tag(name="MPI Group")
     * @SWG\Post(description="Deactivate a MPI Group")
     * 
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "Successfully Deactivated" }),
     *         )
     * )
     *
     * @param InspectionGroup        $inspectionGroup
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function deactivateGroup (InspectionGroup $inspectionGroup, EntityManagerInterface $em) {

        // deactivate group
        $inspectionGroup->setActive(false);

        $em->persist($inspectionGroup);
        $em->flush();

        $this->logInfo('MPI Group "' . $inspectionGroup->getName() . '" Has Been Deactivated');

        return $this->handleView($this->view([
            'message' => ' MPI Group Deactivated'
        ], Response::HTTP_OK));
    }

    /**
     * @Rest\Delete("/api/mpi-group/{id}")
     *
     * @SWG\Tag(name="MPI Group")
     * @SWG\Delete(description="Delete a MPI Group")
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
     * @param InspectionGroup        $inspectionGroup
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function deleteGroup (InspectionGroup $inspectionGroup, EntityManagerInterface $em) {

        // delete group
        $inspectionGroup->setDeleted(true);

        $em->persist($inspectionGroup);
        $em->flush();

        $this->logInfo('MPI Group "' . $inspectionGroup->getName() . '" Has Been Deleted');

        return $this->handleView($this->view([
            'message' => ' MPI Group Deleted'
        ], Response::HTTP_OK));
    }

    /**
     * @Rest\Post("/api/mpi-item")
     *
     * @SWG\Tag(name="MPI Item")
     * @SWG\Post(description="Create a new MPI Item")
     * 
     * @SWG\Parameter(
     *     name="group",
     *     in="formData",
     *     required=true,
     *     type="integer",
     *     description="The ID of MPI Group",
     * )
     * @SWG\Parameter(
     *     name="name",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Name of MPI Item",
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
     * @param Request                    $request
     * @param InspectionGroupRepository  $inspectionGroupRepository
     * @param EntityManagerInterface     $em
     *
     * @return Response
     */
    public function createItem (Request $request, InspectionGroupRepository  $inspectionGroupRepo, EntityManagerInterface $em) {
        $group = $request->get('group');
        $name  = $request->get('name');

        //param is invalid
        if (!$group || !$name) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        $mpiGroup = $inspectionGroupRepo->findOneById($group);
        //check if MPI Group exists
        if(!$mpiGroup){
            return $this->handleView($this->view('Invalid Group Parameter', Response::HTTP_BAD_REQUEST));
        }
        // create item
        $mpiItem = new MPIItem();
        $mpiItem->setName($name)
                        ->setMpiInspectionGroupId($mpiGroup);

        $em->persist($mpiItem);
        $em->flush();

        $this->logInfo('MPI Item "' . $mpiItem->getName() . '" Has Been Created');

        return $this->handleView($this->view([
            'message' => ' MPI Item Created'
        ], Response::HTTP_OK));
    }

    /**
     * @Rest\Put("/api/mpi-item/{id}")
     *
     * @SWG\Tag(name="MPI Item")
     * @SWG\Put(description="Update a MPI Item")
     *
     * @SWG\Parameter(
     *     name="name",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Name of MPI Item",
     * )
     * 
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "Successfully Updated" }),
     *         )
     * )
     *
     * @param MPIItem                $mpiItem
     * @param Request                $request
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function editItem (MPIItem $mpiItem, Request $request, EntityManagerInterface $em) {
        $name = $request->get('name');

        //param is invalid
        if (!$name) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        // update Item
        $mpiItem->setName($name);

        $em->persist($mpiItem);
        $em->flush();

        $this->logInfo('MPI Item "' . $mpiItem->getName() . '" Has Been Updated');

        return $this->handleView($this->view([
            'message' => ' MPI Item Updated'
        ], Response::HTTP_OK));
    }

    /**
     * @Rest\Delete("/api/mpi-item/{id}")
     *
     * @SWG\Tag(name="MPI Item")
     * @SWG\Delete(description="Delete a MPI Item")
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
     * @param MPIItem                $mpiItem
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function deleteItem (MPIItem $mpiItem, EntityManagerInterface $em) {

        // delete Item
        $mpiItem->setDeleted(true);

        $em->persist($mpiItem);
        $em->flush();

        $this->logInfo('MPI Item "' . $mpiItem->getName() . '" Has Been Deleted');

        return $this->handleView($this->view([
            'message' => ' MPI Item Deleted'
        ], Response::HTTP_OK));
    }
}
