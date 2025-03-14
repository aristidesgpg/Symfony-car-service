<?php

namespace App\Controller;

use App\Entity\MPIGroup;
use App\Entity\MPIItem;
use App\Entity\MPITemplate;
use App\Helper\iServiceLoggerTrait;
use App\Repository\MPIGroupRepository;
use App\Repository\MPIItemRepository;
use App\Repository\MPITemplateRepository;
use App\Response\ValidationResponse;
use App\Service\MPITemplateHelper;
use App\Service\Pagination;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Knp\Component\Pager\PaginatorInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class MPIController extends AbstractFOSRestController
{
    use iServiceLoggerTrait;

    private const PAGE_LIMIT = 100;

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
     * @SWG\Parameter(name="page", type="integer", in="query")
     * @SWG\Parameter(
     *     name="pageLimit",
     *     type="integer",
     *     description="Page Limit",
     *     in="query"
     * )
     * @SWG\Parameter(
     *     name="sortField",
     *     type="string",
     *     description="The name of sort field",
     *     in="query"
     * )
     * @SWG\Parameter(
     *     name="sortDirection",
     *     type="string",
     *     description="The direction of sort",
     *     in="query",
     *     enum={"ASC", "DESC"}
     * )
     * @SWG\Parameter(
     *     name="searchTerm",
     *     type="string",
     *     description="The value of search. The available field is name",
     *     in="query"
     * )
     * @SWG\Response(
     *     response=200,
     *     description="Return MPI Templates",
     *     @SWG\Items(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=MPITemplate::class, groups={"mpi_template_list"})),
     *         @SWG\Property(property="totalResults", type="integer", description="Total # of results found"),
     *         @SWG\Property(property="totalPages", type="integer", description="Total # of pages of results"),
     *         @SWG\Property(property="previous", type="string", description="URL for previous page"),
     *         @SWG\Property(property="currentPage", type="integer", description="Current page #"),
     *         @SWG\Property(property="next", type="string", description="URL for next page"),
     *         description="id, name, active"
     *     )
     * )
     *
     * @SWG\Response(response="404", description="Invalid page parameter")
     * @SWG\Response(response="406", ref="#/responses/ValidationResponse")
     *
     * @return Response
     */
    public function getTemplates(
        Request $request,
        MPITemplateRepository $mpiTemplateRepository,
        PaginatorInterface $paginator,
        UrlGeneratorInterface $urlGenerator,
        EntityManagerInterface $em
    ) {
        $page = $request->query->getInt('page', 1);
        $active = $request->query->get('active', null);
        $urlParameters = [];
        $queryParameters = [];
        $errors = [];

        $columns = $em->getClassMetadata('App\Entity\MPITemplate')->getFieldNames();
        // $groupColumns = $em->getClassMetadata('App\Entity\MPIGroup')->getFieldNames();
        // $itemColumns = $em->getClassMetadata('App\Entity\MPIItem')->getFieldNames();

        if ($page < 1) {
            throw new NotFoundHttpException();
        }

        $qb = $mpiTemplateRepository->createQueryBuilder('mp');
        $qb->andWhere('mp.deleted = 0');

        if (!is_null($active)) {
            if ($active) {
                $qb->andWhere('mp.active = 1');
            } else {
                $qb->andWhere('mp.active = 0');
            }
        }

        if ($request->query->has('searchTerm')) {
            $searchTerm = $request->query->get('searchTerm');
            $qb->andWhere("mp.name like :searchTerm");
            $queryParameters['searchTerm'] = '%'.$searchTerm.'%';

            $urlParameters['searchTerm'] = $searchTerm;
        }

        if ($request->query->has('sortField') && $request->query->has('sortDirection')) {
            $sortField = $request->query->get('sortField');

            //check if the sortField exist
            if (!in_array($sortField, $columns)) {
                $errors['sortField'] = 'Invalid sort field name';
            } else {
                $sortDirection = $request->query->get('sortDirection');
                $qb->orderBy('mp.'.$sortField, $sortDirection);

                $urlParameters['sortField'] = $sortField;
                $urlParameters['sortDirection'] = $sortDirection;
            }
        }

        if (!empty($errors)) {
            return new ValidationResponse($errors);
        }

        $q = $qb->getQuery();
        $q->setParameters($queryParameters);
        $pageLimit = $request->query->getInt('pageLimit', self::PAGE_LIMIT);
        if ($pageLimit < 1) {
            return $this->handleView(
                $this->view('Page limit must be a positive non-zero integer', Response::HTTP_NOT_ACCEPTABLE)
            );
        }
        $pager = $paginator->paginate($q, $page, $pageLimit);
        $pagination = new Pagination($pager, $pageLimit, $urlGenerator);

        $view = $this->view(
            [
                'results' => $pager->getItems(),
                'totalResults' => $pagination->totalResults,
                'totalPages' => $pagination->totalPages,
                'previous' => $pagination->getPreviousPageURL('app_mpi_gettemplates', $urlParameters),
                'currentPage' => $pagination->currentPage,
                'next' => $pagination->getNextPageURL('app_mpi_gettemplates', $urlParameters),
            ]
        );

        $view->getContext()->setGroups(MPITemplate::GROUPS);

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
     * @param MPITemplate       $mpiTemplate
     * @param Request           $request
     * @param MPITemplateHelper $mpiTemplateHelper
     *
     * @return Response
     */
    public function getTemplate(MPITemplate $mpiTemplate, Request $request, MPITemplateHelper $mpiTemplateHelper)
    {
        $active = $request->query->get('active');

        if ($active == "true") {
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
     *     description="Axle Information - [{""wheels"":2,""brakesRangeMaximum"":10,""tireRangeMaximum"":6},{""wheels"":4,""brakesRangeMaximum"":12,""tireRangeMaximum"":12},{""wheels"":2,""brakesRangeMaximum"":10,""tireRangeMaximum"":6}]",
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
     * @SWG\Response(
     *     response="404",
     *     description="Invalid repairOrderId"
     * )
     * @SWG\Response(
     *     response="400",
     *     description="Missing field"
     * )
     * @SWG\Response(
     *     response="406",
     *     description="Invalid value"
     * )
     *
     *
     * @param Request                $request
     * @param EntityManagerInterface $em
     * @param MPITemplateHelper      $mpiTemplateHelper
     *
     * @return Response
     */
    public function createTemplate(
        Request $request,
        EntityManagerInterface $em,
        MPITemplateHelper $mpiTemplateHelper
    ) {
        $name = $request->get('name');
        $axleInfo = $request->get('axleInfo');

        //check if params are valid
        if (!$name || !$axleInfo) {
            throw new BadRequestHttpException('Missing Required Parameter');
        }

        //convert string to object
        $obj = (array)json_decode($axleInfo);
        if (is_null($obj) || !is_array($obj) || count($obj) === 0) {
            throw new BadRequestHttpException('Axle Information JSON is invalid');
        }

        foreach ($obj as $item) {
            if (!is_object($item))
                throw new BadRequestHttpException('Axle Information JSON is invalid');
            $arr = get_object_vars($item);
            $keys = array_keys($arr);
            $requiredFields = ['wheels', 'brakesRangeMaximum', 'tireRangeMaximum'];

            foreach ($requiredFields as $key) {
                if (!in_array($key, $keys))
                    throw new BadRequestHttpException('Missing $key Parameter in Axle JSON');

                if (!is_numeric($arr[$key]))
                    throw new NotAcceptableHttpException('Invalid $key Parameter in Axle JSON');
            }
        }
        
        $numberOfAxles = count($obj);
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
            if ($numberOfAxles == 2) {
                $itemPassenger = $index == 0 ? 'Front Passenger' : 'Rear Passenger';
                $itemDriver = $index == 0 ? 'Front Driver' : 'Rear Driver';
                $itemNames = [$itemPassenger, $itemDriver];
                //create brake items
                $mpiTemplateHelper->createMPIItems('brake', $itemNames, $axle, $brakeConfiguration);
                //craete tire items
                if ($axle->wheels == 2) {
                    $mpiTemplateHelper->createMPIItems('tire', $itemNames, $axle, $tireConfiguration);
                }
            } else {
                if ($numberOfAxles > 2) {
                    $itemPassenger = 'Axle'.($index + 1).' - Passenger';
                    $itemDriver = 'Axle'.($index + 1).' - Driver';
                    $itemNames = [$itemPassenger, $itemDriver];

                    //create brake items
                    $mpiTemplateHelper->createMPIItems('brake', $itemNames, $axle, $brakeConfiguration);

                    //create tire items
                    if ($axle->wheels == 2) {
                        $mpiTemplateHelper->createMPIItems('tire', $itemNames, $axle, $tireConfiguration);
                    } else {
                        if ($axle->wheels == 4) {
                            $itemPassengerInner = 'Axle'.($index + 1).' - Passenger Inner';
                            $itemPassengerOuter = 'Axle'.($index + 1).' - Passenger Outer';
                            $itemDriverInner = 'Axle'.($index + 1).' - Driver Inner';
                            $itemDriverOuter = 'Axle'.($index + 1).' - Driver Outer';
                            $itemNames = [$itemPassengerInner, $itemPassengerOuter, $itemDriverInner, $itemDriverOuter];

                            $mpiTemplateHelper->createMPIItems('tire', $itemNames, $axle, $tireConfiguration);
                        }
                    }
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
     * @param MPITemplate            $mpiTemplate
     * @param Request                $request
     * @param EntityManagerInterface $em
     * @param MPITemplateHelper      $mpiTemplateHelper
     *
     * @return Response
     */
    public function editTemplate(
        MPITemplate $mpiTemplate,
        Request $request,
        EntityManagerInterface $em,
        MPITemplateHelper $mpiTemplateHelper
    ) {
        $name = $request->get('name');

        //param is invalid
        if (!$name) {
            throw new BadRequestHttpException('Missing Required Parameter');
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
     * @param MPITemplate            $mpiTemplate
     * @param EntityManagerInterface $em
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

        return $this->handleView(
            $this->view(
                [
                    'message' => ' MPI Template Deactivated',
                ],
                Response::HTTP_OK
            )
        );
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
     * @param MPITemplate            $mpiTemplate
     * @param EntityManagerInterface $em
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

        return $this->handleView(
            $this->view(
                [
                    'message' => ' MPI Template Reactivated',
                ],
                Response::HTTP_OK
            )
        );
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
    public function deleteTemplate(MPITemplate $mpiTemplate, EntityManagerInterface $em)
    {

        // delete template
        $mpiTemplate->setDeleted(true);

        $em->persist($mpiTemplate);
        $em->flush();

        $this->logInfo('MPI Template "'.$mpiTemplate->getName().'" Has Been Deleted');

        return $this->handleView(
            $this->view(
                [
                    'message' => ' MPI Template Deleted',
                ],
                Response::HTTP_OK
            )
        );
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
     * @param Request                $request
     * @param MPITemplateRepository  $mpiTemplateRepo
     * @param EntityManagerInterface $em
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
            throw new BadRequestHttpException('Missing Required Parameter');
        }

        $mpiTemplate = $mpiTemplateRepo->find($templateID);
        //Check if MPI Template exists
        if (!$mpiTemplate) {
            throw new NotAcceptableHttpException('Invalid Template Parameter');
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
     * @param MPIGroup               $mpiGroup
     * @param Request                $request
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function editGroup(MPIGroup $mpiGroup, Request $request, EntityManagerInterface $em)
    {
        $name = $request->get('name');

        //param is invalid
        if (!$name) {
            throw new BadRequestHttpException('Missing Required Parameter');
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
     * @param MPIGroup               $mpiGroup
     * @param EntityManagerInterface $em
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

        return $this->handleView(
            $this->view(
                [
                    'message' => ' MPI Group Deactivated',
                ],
                Response::HTTP_OK
            )
        );
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
     * @param MPIGroup               $mpiGroup
     * @param EntityManagerInterface $em
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

        return $this->handleView(
            $this->view(
                [
                    'message' => ' MPI Group Reactivated',
                ],
                Response::HTTP_OK
            )
        );
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
     * @param MPIGroup               $mpiGroup
     * @param EntityManagerInterface $em
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

        return $this->handleView(
            $this->view(
                [
                    'message' => ' MPI Group Deleted',
                ],
                Response::HTTP_OK
            )
        );
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
     * @param Request                $request
     * @param MPIGroupRepository     $mpiGroupRepo
     * @param MPIItemRepository      $mpiItemRepo
     * @param EntityManagerInterface $em
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
            throw new BadRequestHttpException('Missing Required Parameter');
        }

        $mpiGroup = $mpiGroupRepo->find($groupID);
        //check if MPI Group exists
        if (!$mpiGroup) {
            throw new NotAcceptableHttpException('Invalid Group Parameter');
        }
        //check if name is duplicated
        $duplicatedItems = $mpiItemRepo->findDuplication($name, $mpiGroup->getId());
        if ($duplicatedItems) {
            throw new NotAcceptableHttpException('MPI Item is Duplicated');
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
     * @param MPIItem                $mpiItem
     * @param Request                $request
     * @param MPIItemRepository      $mpiItemRepo
     * @param EntityManagerInterface $em
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
            throw new BadRequestHttpException('Missing Required Parameter');
        }
        //check if name is duplicated
        $duplicatedItems = $mpiItemRepo->findDuplication($name, $mpiItem->getMPIGroup()->getId());
        if ($duplicatedItems) {
            throw new NotAcceptableHttpException('MPI Item is Duplicated');
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
     * @param MPIItem                $mpiItem
     * @param EntityManagerInterface $em
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

        return $this->handleView(
            $this->view(
                [
                    'message' => ' MPI Item Deleted',
                ],
                Response::HTTP_OK
            )
        );
    }
}
