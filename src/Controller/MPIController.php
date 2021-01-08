<?php

namespace App\Controller;

use App\Entity\MPIGroup;
use App\Entity\MPIItem;
use App\Entity\MPITemplate;
use App\Helper\iServiceLoggerTrait;
use App\Repository\MPIGroupRepository;
use App\Repository\MPIItemRepository;
use App\Repository\MPITemplateRepository;
use App\Service\MPITemplateHelper;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class MPIController.
 */
class MPIController extends AbstractFOSRestController
{
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
     *     enum={true, false}
     * )
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return MPI Templates",
     *     @SWG\Items(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=MPITemplate::class, groups={"mpi_template_list"})),
     *         description="id, name, active"
     *     )
     * )
     *
     * @return Response
     */
    public function getTemplates(Request $request, MPITemplateRepository $mpiTemplateRepository)
    {
        $active = $request->query->get('active');

        //get MPI Template
        if ('true' == $active) {
            $mpiTemplates = $mpiTemplateRepository->findBy(['active' => 1, 'deleted' => 0]);
        } elseif ('false' == $active) {
            $mpiTemplates = $mpiTemplateRepository->findBy(['active' => 0, 'deleted' => 0]);
        } else {
            $mpiTemplates = $mpiTemplateRepository->findBy(['deleted' => 0]);
        }
        $view = $this->view($mpiTemplates);
        $view->getContext()->setGroups(['mpi_template_list']);

        return $this->handleView($view);
    }

    /**
     * @Rest\Get("/api/mpi-template/{id}")
     *
     * @SWG\Tag(name="MPI Template")
     * @SWG\Get(description="Get a Template")
     *
     * @SWG\Parameter(
     *     name="active",
     *     in="query",
     *     required=false,
     *     type="boolean",
     *     description="Get Active Groups",
     *     enum={true, false}
     * )
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return MPI Template",
     *     @SWG\Items(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=MPITemplate::class, groups=MPITemplate::GROUPS)),
     *         description="id, name, active, groups"
     *     )
     * )
     *
     * @return Response
     */
    public function getTemplate(MPITemplate $mpiTemplate, Request $request, MPITemplateHelper $mpiTemplateHelper)
    {
        $active = $request->query->get('active');

        if ('true' == $active) {
            $result = $mpiTemplateHelper->getActiveTemplate($mpiTemplate, true);
        } else {
            $result = $mpiTemplateHelper->getActiveTemplate($mpiTemplate, false);
        }

        $view = $this->view($result);
        $view->getContext()->setGroups(MPITemplate::GROUPS);

        return $this->handleView($view);
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
     *     description="Axle Information - [{'wheels':2,'brakesRangeMaximum':10,'tireRangeMaximum':6},{'wheels':4,'brakesRangeMaximum':12,'tireRangeMaximum':12},{'wheels':2,'brakesRangeMaximum':10,'tireRangeMaximum':6}]",
     * )
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return MPITemplate",
     *     @SWG\Items(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=MPITemplate::class, groups=MPITemplate::GROUPS)),
     *         description="id, name, active"
     *     )
     * )
     *
     * @return Response
     */
    public function createTemplate(
        Request $request,
        EntityManagerInterface $em,
        MPITemplateHelper $mpiTemplateHelper,
        MPITemplateRepository $mpiTemplateRepository
    ) {
        $name = $request->get('name');
        $axleInfo = str_replace("'", '"', $request->get('axleInfo'));

        //convert string to object
        $obj = (array) json_decode($axleInfo);
        $numberOfAxles = count($obj);

        //check if params are valid
        if (!$name || !$axleInfo) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        //create a new template
        $mpiTemplate = new MPITemplate();
        $mpiTemplate->setName($name);
        $em->persist($mpiTemplate);
        $em->flush();

        // create new Brakes configuration group and MPI items
        $brakeConfiguration = new MPIGroup();
        $brakeConfiguration->setName('Brakes Configuration')
                           ->setMPITemplate($mpiTemplate);
        $mpiTemplate->addMPIGroup($brakeConfiguration);
        $em->persist($brakeConfiguration);

        $tireConfiguration = new MPIGroup();
        $tireConfiguration->setName('Tire Configuration')
                          ->setMPITemplate($mpiTemplate);
        $mpiTemplate->addMPIGroup($tireConfiguration);
        $em->persist($tireConfiguration);
        $em->flush();

        //create MPI Items
        foreach ($obj as $index => $axle) {
            if (2 == $numberOfAxles) {
                $itemPassenger = 0 == $index ? 'Front Passenger' : 'Rear Passenger';
                $itemDriver = 0 == $index ? 'Front Driver' : 'Rear Driver';
                $itemNames = [$itemPassenger, $itemDriver];
                //create brake items
                $mpiTemplateHelper->createMPIItems('brake', $itemNames, $axle, $brakeConfiguration);
                //craete tire items
                if (2 == $axle->wheels) {
                    $mpiTemplateHelper->createMPIItems('tire', $itemNames, $axle, $tireConfiguration);
                }
            } elseif ($numberOfAxles > 2) {
                $itemPassenger = 'Axle'.($index + 1).' - Passenger';
                $itemDriver = 'Axle'.($index + 1).' - Driver';
                $itemNames = [$itemPassenger, $itemDriver];
                //create brake items
                $mpiTemplateHelper->createMPIItems('brake', $itemNames, $axle, $brakeConfiguration);
                //create tire items
                if (2 == $axle->wheels) {
                    $mpiTemplateHelper->createMPIItems('tire', $itemNames, $axle, $tireConfiguration);
                } elseif (4 == $axle->wheels) {
                    $itemPassengerInner = 'Axle'.($index + 1).' - Passenger Inner';
                    $itemPassengerOuter = 'Axle'.($index + 1).' - Passenger Outer';
                    $itemDriverInner = 'Axle'.($index + 1).' - Driver Inner';
                    $itemDriverOuter = 'Axle'.($index + 1).' - Driver Outer';
                    $itemNames = [$itemPassengerInner, $itemPassengerOuter, $itemDriverInner, $itemDriverOuter];

                    $mpiTemplateHelper->createMPIItems('tire', $itemNames, $axle, $tireConfiguration);
                }
            }
        }

        $view = $this->view($mpiTemplate);
        $view->getContext()->setGroups(MPITemplate::GROUPS);

        return $this->handleView($view);
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
     *     description="Return MPITemplate",
     *     @SWG\Items(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=MPITemplate::class, groups=MPITemplate::GROUPS)),
     *         description="id, name, groups, active"
     *     )
     * )
     *
     * @return Response
     */
    public function editTemplate(MPITemplate $mpiTemplate, Request $request, EntityManagerInterface $em, MPITemplateHelper $mpiTemplateHelper)
    {
        $name = $request->get('name');

        //param is invalid
        if (!$name) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        // update template
        $mpiTemplate->setName($name);

        $em->persist($mpiTemplate);
        $em->flush();

        $this->logInfo('MPI Template "'.$mpiTemplate->getName().'" Has Been Updated');

        $result = $mpiTemplateHelper->getActiveTemplate($mpiTemplate, false);

        $view = $this->view($result);
        $view->getContext()->setGroups(MPITemplate::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Put("/api/mpi-template/de-activate/{id}")
     *
     * @SWG\Tag(name="MPI Template")
     * @SWG\Put(description="Deactivate a MPI Template")
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
     * @return Response
     */
    public function deactivateTemplate(MPITemplate $mpiTemplate, EntityManagerInterface $em)
    {
        // deactivate template
        $mpiTemplate->setActive(false);

        $em->persist($mpiTemplate);
        $em->flush();

        $this->logInfo('MPI Template "'.$mpiTemplate->getName().'" Has Been Deactivated');

        return $this->handleView($this->view([
            'message' => ' MPI Template Deactivated',
        ], Response::HTTP_OK));
    }

    /**
     * @Rest\Put("/api/mpi-template/re-activate/{id}")
     *
     * @SWG\Tag(name="MPI Template")
     * @SWG\Put(description="Reactivate a MPI Template")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "Successfully Reactivated" }),
     *         )
     * )
     *
     * @return Response
     */
    public function reactivateTemplate(MPITemplate $mpiTemplate, EntityManagerInterface $em)
    {
        // reactivate template
        $mpiTemplate->setActive(true);

        $em->persist($mpiTemplate);
        $em->flush();

        $this->logInfo('MPI Template "'.$mpiTemplate->getName().'" Has Been Deactivated');

        return $this->handleView($this->view([
            'message' => ' MPI Template Reactivated',
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
     * @return Response
     */
    public function deleteTemplate(MPITemplate $mpiTemplate, EntityManagerInterface $em)
    {
        // delete template
        $mpiTemplate->setDeleted(true);

        $em->persist($mpiTemplate);
        $em->flush();

        $this->logInfo('MPI Template "'.$mpiTemplate->getName().'" Has Been Deleted');

        return $this->handleView($this->view([
            'message' => ' MPI Template Deleted',
        ], Response::HTTP_OK));
    }

    /**
     * @Rest\Post("/api/mpi-group")
     *
     * @SWG\Tag(name="MPI Group")
     * @SWG\Post(description="Create a new MPI Group")
     *
     * @SWG\Parameter(
     *     name="id",
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
     *     description="Return MPIGroup",
     *     @SWG\Items(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=MPIGroup::class, groups={"mpi_group_list"})),
     *         description="id, name, active"
     *     )
     * )
     *
     * @return Response
     */
    public function createGroup(
        Request $request,
        MPITemplateRepository $mpiTemplateRepo,
        EntityManagerInterface $em
    ) {
        $templateID = $request->get('id');
        $name = $request->get('name');

        //param is invalid
        if (!$templateID || !$name) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        $mpiTemplate = $mpiTemplateRepo->find($templateID);
        //Check if MPI Template exists
        if (!$mpiTemplate) {
            return $this->handleView($this->view('Invalid Template Parameter', Response::HTTP_BAD_REQUEST));
        }
        // create group
        $mpiGroup = new MPIGroup();
        $mpiGroup->setName($name)
                 ->setMPITemplate($mpiTemplate);

        $em->persist($mpiGroup);
        $em->flush();

        $this->logInfo('MPI Group "'.$mpiGroup->getName().'" Has Been Created');

        $view = $this->view($mpiGroup);
        $view->getContext()->setGroups(['mpi_group_list']);

        return $this->handleView($view);
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
     *     description="Return MPIGroup",
     *     @SWG\Items(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=MPIGroup::class, groups={"mpi_group_list"})),
     *         description="id, name, active"
     *     )
     * )
     *
     * @return Response
     */
    public function editGroup(MPIGroup $mpiGroup, Request $request, EntityManagerInterface $em)
    {
        $name = $request->get('name');

        //param is invalid
        if (!$name) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        // update group
        $mpiGroup->setName($name);

        $em->persist($mpiGroup);
        $em->flush();

        $this->logInfo('MPI Group "'.$mpiGroup->getName().'" Has Been Updated');

        $view = $this->view($mpiGroup);
        $view->getContext()->setGroups(['mpi_group_list']);

        return $this->handleView($view);
    }

    /**
     * @Rest\Put("/api/mpi-group/de-activate/{id}")
     *
     * @SWG\Tag(name="MPI Group")
     * @SWG\Put(description="Deactivate a MPI Group")
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
     * @return Response
     */
    public function deactivateGroup(MPIGroup $mpiGroup, EntityManagerInterface $em)
    {
        // deactivate group
        $mpiGroup->setActive(false);

        $em->persist($mpiGroup);
        $em->flush();

        $this->logInfo('MPI Group "'.$mpiGroup->getName().'" Has Been Deactivated');

        return $this->handleView($this->view([
            'message' => ' MPI Group Deactivated',
        ], Response::HTTP_OK));
    }

    /**
     * @Rest\Put("/api/mpi-group/re-activate/{id}")
     *
     * @SWG\Tag(name="MPI Group")
     * @SWG\Put(description="Reactivate a MPI Group")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "Successfully Reactivated" }),
     *         )
     * )
     *
     * @return Response
     */
    public function reactivateGroup(MPIGroup $mpiGroup, EntityManagerInterface $em)
    {
        // deactivate group
        $mpiGroup->setActive(true);

        $em->persist($mpiGroup);
        $em->flush();

        $this->logInfo('MPI Group "'.$mpiGroup->getName().'" Has Been Deactivated');

        return $this->handleView($this->view([
            'message' => ' MPI Group Reactivated',
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
     * @return Response
     */
    public function deleteGroup(MPIGroup $mpiGroup, EntityManagerInterface $em)
    {
        // delete group
        $mpiGroup->setDeleted(true);

        $em->persist($mpiGroup);
        $em->flush();

        $this->logInfo('MPI Group "'.$mpiGroup->getName().'" Has Been Deleted');

        return $this->handleView($this->view([
            'message' => ' MPI Group Deleted',
        ], Response::HTTP_OK));
    }

    /**
     * @Rest\Post("/api/mpi-item")
     *
     * @SWG\Tag(name="MPI Item")
     * @SWG\Post(description="Create a new MPI Item")
     *
     * @SWG\Parameter(
     *     name="id",
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
     *    description="Return MPIItem",
     *     @SWG\Items(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=MPIItem::class, groups={"mpi_item_list"})),
     *         description="id, name, active"
     *     )
     * )
     *
     * @return Response
     */
    public function createItem(
        Request $request,
        MPIGroupRepository $mpiGroupRepo,
        MPIItemRepository $mpiItemRepo,
        EntityManagerInterface $em
    ) {
        $groupID = $request->get('id');
        $name = $request->get('name');

        //param is invalid
        if (!$groupID || !$name) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        $mpiGroup = $mpiGroupRepo->find($groupID);
        //check if MPI Group exists
        if (!$mpiGroup) {
            return $this->handleView($this->view('Invalid Group Parameter', Response::HTTP_BAD_REQUEST));
        }
        //check if name is duplicated
        $duplicatedItems = $mpiItemRepo->findDuplication($name, $mpiGroup->getId());
        if ($duplicatedItems) {
            return $this->handleView($this->view('MPI Item is Duplicated', Response::HTTP_BAD_REQUEST));
        }

        // create item
        $mpiItem = new MPIItem();
        $mpiItem->setName($name)
                ->setMPIGroup($mpiGroup);

        $em->persist($mpiItem);
        $em->flush();

        $this->logInfo('MPI Item "'.$mpiItem->getName().'" Has Been Created');

        $view = $this->view($mpiItem);
        $view->getContext()->setGroups(['mpi_item_list']);

        return $this->handleView($view);
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
     *     description="Return MPIItem",
     *     @SWG\Items(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=MPIItem::class, groups={"mpi_item_list"})),
     *         description="id, name, active"
     *     )
     * )
     *
     * @return Response
     */
    public function editItem(
        MPIItem $mpiItem,
        Request $request,
        MPIItemRepository $mpiItemRepo,
        EntityManagerInterface $em
    ) {
        $name = $request->get('name');

        //param is invalid
        if (!$name) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }
        //check if name is duplicated
        $duplicatedItems = $mpiItemRepo->findDuplication($name, $mpiItem->getMPIGroup()->getId());
        if ($duplicatedItems) {
            return $this->handleView($this->view('MPI Item is Duplicated', Response::HTTP_BAD_REQUEST));
        }

        // update Item
        $mpiItem->setName($name);

        $em->persist($mpiItem);
        $em->flush();

        $this->logInfo('MPI Item "'.$mpiItem->getName().'" Has Been Updated');

        $view = $this->view($mpiItem);
        $view->getContext()->setGroups(['mpi_item_list']);

        return $this->handleView($view);
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
     * @return Response
     */
    public function deleteItem(MPIItem $mpiItem, EntityManagerInterface $em)
    {
        // delete Item
        $mpiItem->setDeleted(true);

        $em->persist($mpiItem);
        $em->flush();

        $this->logInfo('MPI Item "'.$mpiItem->getName().'" Has Been Deleted');

        return $this->handleView($this->view([
            'message' => ' MPI Item Deleted',
        ], Response::HTTP_OK));
    }
}
