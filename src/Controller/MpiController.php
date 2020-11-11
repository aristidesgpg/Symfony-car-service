<?php

namespace App\Controller;

use App\Entity\MpiTemplate;
use App\Entity\MpiGroup;
use App\Entity\MpiItem;
use App\Repository\MpiTemplateRepository;
use App\Repository\MpiGroupRepository;
use App\Repository\MpiItemRepository;
use App\Helper\iServiceLoggerTrait;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use App\Service\MpiTemplateHelper;


/**
 * Class MpiController
 *
 * @package App\Controller
 */
class MpiController extends AbstractFOSRestController {
    use iServiceLoggerTrait;
    
    /**
     * @Rest\Get("/api/mpi-template")
     *
     * @SWG\Tag(name="MPI Template")
     * @SWG\Get(description="Get All Templates")
     *
     * @SWG\Parameter(
     *     name="active",
     *     in="query",
     *     required=false,
     *     type="boolean",
     *     description="Get Active Templates",
     *     enum={true}
     * )
     * 
     * @SWG\Response(
     *     response=200,
     *     description="Return MPI Templates"
     * )
     * 
     * @param Request               $request
     * @param MpiTemplateRepository $mpiTemplateRepository
     * @param MpiTemplateHelper     $mpiTemplateHelper
     *
     * @return Response
     */
    public function getTemplates (Request $request, MpiTemplateRepository $mpiTemplateRepository, MpiTemplateHelper $mpiTemplateHelper) {
        $active = $request->query->get('active') ?? false;
        //get MPI Template
        if(!$active){
            $mpiTemplates = $mpiTemplateRepository->findBy(['deleted' => 0]);
            $result       = $mpiTemplateHelper->getActiveTemplates($mpiTemplates, false);
        }
        else{
            $mpiTemplates = $mpiTemplateRepository->findBy(['active'=> 1, 'deleted' => 0]);
            $result       = $mpiTemplateHelper->getActiveTemplates($mpiTemplates, true);
        }

        return $this->handleView($this->view($result, Response::HTTP_OK));
    }

    /**
     * @Rest\Get("/api/mpi-template/{id}")
     *
     * @SWG\Tag(name="MPI Template")
     * @SWG\Get(description="Get a Template")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return MPI Templates"
     * )
     * 
     * @param MpiTemplate           $mpiTemplate
     * 
     * @return Response
     */
    public function getTemplate (MpiTemplate $mpiTemplate) {
        return $this->handleView($this->view($mpiTemplate, Response::HTTP_OK));
    }

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
     *     name="axleInfo",
     *     in="formData",
     *     required=true,
     *     type="string",
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
     * @param MpiTemplateHelper      $mpiTemplateHelper
     *
     * @return Response
     */
    public function createTemplate (Request $request, EntityManagerInterface $em, MpiTemplateHelper $mpiTemplateHelper) {
        $name          = $request->get('name');
        $axleInfo      = $request->get('axleInfo');
        //convert string to object
        $obj           = json_decode($axleInfo);
        $numberOfAxles = count((array)$obj);
        //check if params are valid
        if(!$name || !$axleInfo){
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }
        //create a new template
        $mpiTemplate = new MpiTemplate();
        $mpiTemplate->setName($name);
        $em->persist($mpiTemplate);

        // create new Brakes configuration group and MPI items
        $brakeConfiguration = new MpiGroup();
        $brakeConfiguration->setName("Brakes Configuration")
                           ->setMpiTemplate($mpiTemplate);
        $em->persist($brakeConfiguration);

        $tireConfiguration  = new MpiGroup();
        $tireConfiguration->setName("Tire Configuration")
                          ->setMpiTemplate($mpiTemplate);
        $em->persist($tireConfiguration);
        $em->flush();

        //create MPI Items
        foreach($obj as $index=>$axle){
            if($numberOfAxles == 2){
                $itemPassenger = $index == "axle1" ? "Front Passenger" : "Rear Passenger";
                $itemDriver    = $index == "axle1" ? "Front Driver" : "Rear Driver";
                $itemNames = [$itemPassenger, $itemDriver];
                //create brake items
                $mpiTemplateHelper->createMPIItems('brake', $itemNames, $axle, $brakeConfiguration);
                //craete tire items
                if($axle->wheeles == 2){
                    $mpiTemplateHelper->createMPIItems('tire', $itemNames, $axle, $tireConfiguration);
                }
            }
            else if($numberOfAxles > 2){
                $itemPassenger = $index." - Passenger";
                $itemDriver    = $index." - Driver";
                $itemNames = [$itemPassenger, $itemDriver];
                //create brake items
                $mpiTemplateHelper->createMPIItems('brake', $itemNames, $axle, $brakeConfiguration);
                //create tire items
                if($axle->wheeles == 2){
                    $mpiTemplateHelper->createMPIItems('tire', $itemNames, $axle, $tireConfiguration);
                }
                else if($axle->wheeles == 4){
                    $itemPassengerInner = $index." - Passenger Inner";
                    $itemPassengerOuter = $index." - Passenger Outer";
                    $itemDriverInner    = $index." - Driver Inner";
                    $itemDriverOuter    = $index." - Driver Outer";
                    $itemNames = [$itemPassengerInner, $itemPassengerOuter, $itemDriverInner, $itemDriverOuter];

                    $mpiTemplateHelper->createMPIItems('tire', $itemNames, $axle, $tireConfiguration);
                }
            }
        }
        
        return $this->handleView($this->view([
            'message' => "MPI Template Created"
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
     * @param MpiTemplate            $mpiTemplate
     * @param Request                $request
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function editTemplate (MpiTemplate $mpiTemplate, Request $request, EntityManagerInterface $em) {
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
     * @param MpiTemplate            $mpiTemplate
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function deactivateTemplate (MpiTemplate $mpiTemplate, EntityManagerInterface $em) {

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
     * @param MpiTemplate            $mpiTemplate
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function deleteTemplate (MpiTemplate $mpiTemplate, EntityManagerInterface $em) {

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
     * @param MpiTemplateRepository  $mpiTemplateRepo
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function createGroup (Request $request, MpiTemplateRepository  $mpiTemplateRepo, EntityManagerInterface $em) {
        $template = $request->get('template');
        $name     = $request->get('name');

        //param is invalid
        if (!$template || !$name) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        $mpiTemplate = $mpiTemplateRepo->findOneBy($template);
        //Check if MPI Template exists
        if(!$mpiTemplate){
            return $this->handleView($this->view('Invalid Template Parameter', Response::HTTP_BAD_REQUEST));
        }
        // create group
        $mpiGroup = new MpiGroup();
        $mpiGroup->setName($name)
                        ->setMpiTemplate($mpiTemplate);

        $em->persist($mpiGroup);
        $em->flush();

        $this->logInfo('MPI Group "' . $mpiGroup->getName() . '" Has Been Created');

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
     * @param MpiGroup        $mpiGroup
     * @param Request                $request
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function editGroup (MpiGroup $mpiGroup, Request $request, EntityManagerInterface $em) {
        $name = $request->get('name');

        //param is invalid
        if (!$name) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        // update group
        $mpiGroup->setName($name);

        $em->persist($mpiGroup);
        $em->flush();

        $this->logInfo('MPI Group "' . $mpiGroup->getName() . '" Has Been Updated');

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
     * @param MpiGroup        $mpiGroup
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function deactivateGroup (MpiGroup $mpiGroup, EntityManagerInterface $em) {

        // deactivate group
        $mpiGroup->setActive(false);

        $em->persist($mpiGroup);
        $em->flush();

        $this->logInfo('MPI Group "' . $mpiGroup->getName() . '" Has Been Deactivated');

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
     * @param MpiGroup        $mpiGroup
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function deleteGroup (MpiGroup $mpiGroup, EntityManagerInterface $em) {

        // delete group
        $mpiGroup->setDeleted(true);

        $em->persist($mpiGroup);
        $em->flush();

        $this->logInfo('MPI Group "' . $mpiGroup->getName() . '" Has Been Deleted');

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
     * @param MpiGroupRepository  $mpiGroupRepository
     * @param EntityManagerInterface     $em
     *
     * @return Response
     */
    public function createItem (Request $request, MpiGroupRepository  $mpiGroupRepo, EntityManagerInterface $em) {
        $group = $request->get('group');
        $name  = $request->get('name');

        //param is invalid
        if (!$group || !$name) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        $mpiGroup = $mpiGroupRepo->findOneBy($group);
        //check if MPI Group exists
        if(!$mpiGroup){
            return $this->handleView($this->view('Invalid Group Parameter', Response::HTTP_BAD_REQUEST));
        }
        // create item
        $mpiItem = new MpiItem();
        $mpiItem->setName($name)
                        ->setMpiMPIGroup($mpiGroup);

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
     * @param MpiItem                $mpiItem
     * @param Request                $request
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function editItem (MpiItem $mpiItem, Request $request, EntityManagerInterface $em) {
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
     * @param MpiItem                $mpiItem
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function deleteItem (MpiItem $mpiItem, EntityManagerInterface $em) {

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
