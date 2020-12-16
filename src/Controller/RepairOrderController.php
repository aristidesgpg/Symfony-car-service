<?php

namespace App\Controller;

use App\Entity\RepairOrder;
use App\Entity\User;
use App\Helper\FalsyTrait;
use App\Repository\RepairOrderRepository;
use App\Repository\UserRepository;
use App\Response\ValidationResponse;
use App\Service\Pagination;
use App\Service\RepairOrderHelper;
use DateTime;
use Exception;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Knp\Component\Pager\PaginatorInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Class RepairOrderController
 *
 * @package App\Controller
 *
 * @Rest\Route("/api/repair-order")
 * @SWG\Tag(name="Repair Order")
 */
class RepairOrderController extends AbstractFOSRestController {
    private const PAGE_LIMIT = 50;

    use FalsyTrait;

    /**
     * @Rest\Get(name="getRepairOrders")
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(
     *         type="object",
     *         @SWG\Property(
     *             property="items",
     *             type="array",
     *             @SWG\Items(ref=@Model(type=RepairOrder::class, groups=RepairOrder::GROUPS))
     *         ),
     *         @SWG\Property(property="next", type="string", description="URL of next page of results or null"),
     *         @SWG\Property(property="prev", type="string", description="URL of previous page of results or null"),
     *         @SWG\Property(property="total", type="integer", description="Total number of items for query")
     *     )
     * )
     * @SWG\Response(response="404", description="Invalid page parameter")
     * @SWG\Response(response="406", ref="#/responses/ValidationResponse")
     *
     * @SWG\Parameter(name="page", type="integer", in="query")
     * @SWG\Parameter(
     *     name="open",
     *     type="boolean",
     *     description="0=Closed, 1=Open, Omit for all",
     *     in="query"
     * )
     * @SWG\Parameter(
     *     name="waiter",
     *     type="boolean",
     *     description="0=Non-Waiters, 1=Waiters, Omit for all",
     *     in="query"
     * )
     * @SWG\Parameter(
     *     name="internal",
     *     type="boolean",
     *     description="0=Non-Internal, 1=Internal, Omit for all",
     *     in="query"
     * )
     * @SWG\Parameter(
     *     name="archived",
     *     type="boolean",
     *     description="1=Archived, Omit for non-archived",
     *     in="query"
     * )
     * @SWG\Parameter(
     *     name="startDate",
     *     type="string",
     *     format="date-time",
     *     description="Get ROs created after supplied date-time",
     *     in="query"
     * )
     * @SWG\Parameter(
     *     name="endDate",
     *     type="string",
     *     format="date-time",
     *     description="Get ROs created before supplied date-time",
     *     in="query"
     * )
     *
     * @param Request               $request
     * @param RepairOrderRepository $repairOrderRepo
     * @param PaginatorInterface    $paginator
     *
     * @param UrlGeneratorInterface $urlGenerator
     * @param UserRepository        $userRepo
     *
     * @return Response
     */
    public function getAll (Request $request, RepairOrderRepository $repairOrderRepo, PaginatorInterface $paginator,
                            UrlGeneratorInterface $urlGenerator, UserRepository $userRepo): Response {
        $page            = $request->query->getInt('page', 1);
        $startDate       = $request->query->get('startDate');
        $endDate         = $request->query->get('endDate');
        $urlParameters   = [];
        $queryParameters = [];
        $errors          = [];

        if ($page < 1) {
            throw new NotFoundHttpException();
        }

        $qb = $repairOrderRepo->createQueryBuilder('ro');
        $qb->andWhere('ro.deleted = 0');

        if ($request->query->has('archived') && $this->paramToBool($request->query->get('archived'))) {
            $qb->andWhere('ro.archived = 1');
            $urlParameters['archived'] = 1;
        } else {
            $qb->andWhere('ro.archived = 0');
        }

        if ($request->query->has('open')) {
            if ($this->paramToBool($request->query->get('open'))) {
                $urlParameters['open'] = 1;
                $qb->andWhere('ro.dateClosed IS NULL');
            } else {
                $urlParameters['open'] = 0;
                $qb->andWhere('ro.dateClosed IS NOT NULL');
            }
        }

        if ($request->query->has('waiter')) {
            $qb->andWhere("ro.waiter = :waiter");
            $queryParameters['waiter'] = $this->paramToBool($request->query->get('waiter'));
        }

        if ($request->query->has('internal')) {
            $qb->andWhere("ro.internal = :internal");
            $queryParameters['internal'] = $this->paramToBool($request->query->get('internal'));
        }

        if ($startDate && $endDate) {
            try {
                $startDate = new DateTime($startDate);
                $endDate   = new DateTime($endDate);

                $qb->andWhere("ro.dateCreated BETWEEN :startDate AND :endDate");
                $queryParameters['startDate'] = $startDate;
                $queryParameters['endDate']   = $endDate;
            } catch (Exception $e) {
                $errors['date'] = 'Invalid date format';
            }
        }

        if (!empty($errors)) {
            return new ValidationResponse($errors);
        }

        $user = $this->getUser();
        if ($user instanceof User) {
            if (in_array('ROLE_SERVICE_ADVISOR', $user->getRoles())) {
                if ($user->getShareRepairOrders() === true) {
                    $qb->andWhere('ro.primaryAdvisor IN (:users)');
                    $queryParameters['users'] = $userRepo->getSharedUsers();
                } else {
                    $qb->andWhere('ro.primaryAdvisor = :user');
                    $queryParameters['user'] = $user;
                }
            } elseif (in_array('ROLE_TECHNICIAN', $user->getRoles())) {
                $qb->andWhere('ro.primaryTechnician = :user');
                $queryParameters['user'] = $user;
            }
        }

        $q = $qb->getQuery();
        $q->setParameters($queryParameters);

        $urlParameters += $queryParameters;
        $pager         = $paginator->paginate($q, $page, self::PAGE_LIMIT);
        $pagination    = new Pagination($pager, self::PAGE_LIMIT, $urlGenerator);

        $view = $this->view([
            'repairOrders' => $pager->getItems(),
            'totalResults' => $pagination->totalResults,
            'totalPages'   => $pagination->totalPages,
            'previous'     => $pagination->getPreviousPageURL('getRepairOrders', $urlParameters),
            'currentPage'  => $pagination->currentPage,
            'next'         => $pagination->getNextPageURL('getRepairOrders', $urlParameters)
        ]);
        $view->getContext()->setGroups(RepairOrder::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Get("/{id}", name="getRepairOrder")
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(ref=@Model(type=RepairOrder::class, groups=RepairOrder::GROUPS))
     * )
     * @SWG\Response(response="404", description="RO does not exist")
     *
     * @param RepairOrder $ro
     *
     * @return Response
     */
    public function getOne (RepairOrder $ro): Response {
        if ($ro->getDeleted()) {
            throw new NotFoundHttpException();
        }
        $view = $this->view($ro);
        $view->getContext()->setGroups(RepairOrder::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Get("/link-hash/{linkHash}", name="getRepairOrderByLinkHash")
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(ref=@Model(type=RepairOrder::class, groups=RepairOrder::GROUPS))
     * )
     * @SWG\Response(response="404", description="RO does not exist")
     *
     * @param string                $linkHash
     * @param RepairOrderRepository $repairOrderRepo
     *
     * @return Response
     */
    public function getByLinkHash (string $linkHash, RepairOrderRepository $repairOrderRepo): Response {
        if (!$linkHash){
            throw new NotFoundHttpException();
        }

        $repairOrder = $repairOrderRepo->findByUID($linkHash);
        if (!$repairOrder){
            throw new NotFoundHttpException();
        }

        if ($repairOrder->getDeleted()) {
            throw new NotFoundHttpException();
        }

        $view = $this->view($repairOrder);
        $view->getContext()->setGroups(RepairOrder::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Post
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(type="object", ref=@Model(type=RepairOrder::class, groups=RepairOrder::GROUPS))
     * )
     * @SWG\Response(response="406", ref="#/responses/ValidationResponse")
     *
     * @SWG\Parameter(name="customerName", type="string", in="formData", required=true)
     * @SWG\Parameter(name="customerPhone", type="string", in="formData", required=true)
     * @SWG\Parameter(name="skipMobileVerification", type="boolean", in="formData")
     *
     * @SWG\Parameter(name="advisor", type="integer", in="formData")
     * @SWG\Parameter(name="technician", type="integer", in="formData")
     *
     * @SWG\Parameter(name="number", type="string", in="formData", required=true)
     * @SWG\Parameter(name="startValue", type="number", in="formData")
     * @SWG\Parameter(name="waiter", type="boolean", in="formData")
     * @SWG\Parameter(name="internal", type="boolean", in="formData")
     * @SWG\Parameter(name="note", type="string", in="formData")
     * @SWG\Parameter(name="finalValue", type="number", in="formData")
     * @SWG\Parameter(name="approvedValue", type="number", in="formData")
     * @SWG\Parameter(name="pickupDate", type="string", format="date-time", in="formData")
     * @SWG\Parameter(name="year", type="string", in="formData")
     * @SWG\Parameter(name="make", type="string", in="formData")
     * @SWG\Parameter(name="model", type="string", in="formData")
     * @SWG\Parameter(name="miles", type="integer", in="formData")
     * @SWG\Parameter(name="vin", type="string", in="formData")
     * @SWG\Parameter(name="dmsKey", type="string", in="formData")
     * @SWG\Parameter(name="upgradeQue", type="boolean", in="formData")
     *
     * @param Request           $req
     * @param RepairOrderHelper $helper
     *
     * @return Response
     */
    public function add (Request $req, RepairOrderHelper $helper): Response {
        $ro = $helper->addRepairOrder($req->request->all());
        if (is_array($ro)) {
            return new ValidationResponse($ro);
        }

        $view = $this->view($ro);
        $view->getContext()->setGroups(RepairOrder::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Put("/{id}")
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(type="object", ref=@Model(type=RepairOrder::class, groups=RepairOrder::GROUPS))
     * )
     * @SWG\Response(response="404", description="RO does not exist")
     * @SWG\Response(response="406", ref="#/responses/ValidationResponse")
     *
     * @SWG\Parameter(name="advisor", type="integer", in="formData")
     * @SWG\Parameter(name="technician", type="integer", in="formData")
     *
     * @SWG\Parameter(name="startValue", type="number", in="formData")
     * @SWG\Parameter(name="waiter", type="boolean", in="formData")
     * @SWG\Parameter(name="internal", type="boolean", in="formData")
     * @SWG\Parameter(name="note", type="string", in="formData")
     * @SWG\Parameter(name="finalValue", type="number", in="formData")
     * @SWG\Parameter(name="approvedValue", type="number", in="formData")
     * @SWG\Parameter(name="pickupDate", type="string", format="date-time", in="formData")
     * @SWG\Parameter(name="year", type="string", in="formData")
     * @SWG\Parameter(name="make", type="string", in="formData")
     * @SWG\Parameter(name="model", type="string", in="formData")
     * @SWG\Parameter(name="miles", type="integer", in="formData")
     * @SWG\Parameter(name="vin", type="string", in="formData")
     * @SWG\Parameter(name="dmsKey", type="string", in="formData")
     * @SWG\Parameter(name="upgradeQue", type="boolean", in="formData")
     *
     * @param RepairOrder       $ro
     * @param Request           $req
     * @param RepairOrderHelper $helper
     *
     * @return Response
     */
    public function update (RepairOrder $ro, Request $req, RepairOrderHelper $helper): Response {
        if ($ro->getDeleted()) {
            throw new NotFoundHttpException();
        }
        $errors = $helper->updateRepairOrder($req->request->all(), $ro);
        if (!empty($errors)) {
            return new ValidationResponse($errors);
        }

        $view = $this->view($ro);
        $view->getContext()->setGroups(RepairOrder::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Delete("/{id}")
     * @SWG\Response(response="200", description="Success!")
     * @SWG\Response(response="404", description="RO does not exist")
     *
     * @param RepairOrder       $ro
     * @param RepairOrderHelper $helper
     *
     * @return Response
     */
    public function delete (RepairOrder $ro, RepairOrderHelper $helper): Response {
        if ($ro->getDeleted()) {
            throw new NotFoundHttpException();
        }
        $helper->deleteRepairOrder($ro);

        return $this->handleView($this->view([
            'message' => 'RO Deleted',
        ]));
    }

    /**
     * @Rest\Put("/{id}/archive")
     * @SWG\Response(response="200", description="Success!")
     * @SWG\Response(response="400", description="RO is already archived")
     * @SWG\Response(response="404", description="RO does not exist")
     *
     * @param RepairOrder       $ro
     * @param RepairOrderHelper $helper
     *
     * @return Response
     */
    public function archive (RepairOrder $ro, RepairOrderHelper $helper): Response {
        if ($ro->getDeleted()) {
            throw new NotFoundHttpException();
        }
        if ($ro->isArchived() === true) {
            return $this->handleView($this->view([
                'message' => 'RO already archived',
            ], Response::HTTP_BAD_REQUEST));
        }
        $helper->archiveRepairOrder($ro);

        return $this->handleView($this->view([
            'message' => 'RO Archived',
        ]));
    }

    /**
     * @Rest\Put("/{id}/close")
     * @SWG\Response(response="200", description="Success!")
     * @SWG\Response(response="400", description="RO is already closed")
     * @SWG\Response(response="404", description="RO does not exist")
     *
     * @param RepairOrder       $ro
     * @param RepairOrderHelper $helper
     *
     * @return Response
     */
    public function close (RepairOrder $ro, RepairOrderHelper $helper): Response {
        if ($ro->getDeleted()) {
            throw new NotFoundHttpException();
        }
        if ($ro->isClosed() === true) {
            return $this->handleView($this->view([
                'message' => 'RO already closed',
            ], Response::HTTP_BAD_REQUEST));
        }
        $helper->closeRepairOrder($ro);

        return $this->handleView($this->view([
            'message' => 'RO Closed',
        ]));
    }
}
