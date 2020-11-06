<?php

namespace App\Controller;

use App\Entity\RepairOrder;
use App\Helper\FalsyTrait;
use App\Repository\RepairOrderRepository;
use App\Service\RepairOrderHelper;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class RepairOrderController
 * @package App\Controller
 *
 * @Rest\Route("/api/repair-order")
 * @SWG\Tag(name="Repair Order")
 */
class RepairOrderController extends AbstractFOSRestController {
    use FalsyTrait;

    /**
     * @Rest\Get
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=RepairOrder::class, groups=RepairOrder::GROUPS))
     *     )
     * )
     * SWG\Response(response="406", ref="#/responses/ValidationResponse") TODO
     *
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
     * @param Request               $req
     * @param RepairOrderRepository $orders
     *
     * @return Response
     */
    public function getAll (Request $req, RepairOrderRepository $orders): Response {
        $qb = $orders->createQueryBuilder('ro');
        $qb->andWhere('ro.deleted = 0');
        if ($req->query->has('archived') && $this->paramToBool($req->query->get('archived'))) {
            $qb->andWhere('ro.archived = 1');
        } else {
            $qb->andWhere('ro.archived = 0');
        }
        $params = $errors = [];
        if ($req->query->has('open')) {
            if ($this->paramToBool($req->query->get('open'))) {
                $qb->andWhere('ro.dateClosed IS NULL');
            } else {
                $qb->andWhere('ro.dateClosed IS NOT NULL');
            }
        }
        if ($req->query->has('waiter')) {
            $qb->andWhere("ro.waiter = :waiter");
            $params['waiter'] = $this->paramToBool($req->query->get('waiter'));
        }
        if ($req->query->has('internal')) {
            $qb->andWhere("ro.internal = :internal");
            $params['internal'] = $this->paramToBool($req->query->get('internal'));
        }
        foreach (['startDate', 'endDate'] as $key) {
            if (!$req->query->has($key)) {
                continue;
            }
            try {
                $date = (new \DateTime($req->query->get($key)))->format('Y-m-d\TH:i:s');
            } catch (\Exception $e) {
                $errors[$key] = 'Invalid date format';
                continue;
            }
            $op = ($key === 'startDate') ? '>=' : '<=';
            $qb->andWhere("ro.dateCreated {$op} :{$key}");
            $params[$key] = $date;
        }
        if (!empty($errors)) {
            return new JsonResponse($errors, 406); // TODO
//            return new ValidationResponse($errors);
        }
        $q = $qb->getQuery();
        $q->setParameters($params);

        $view = $this->view($q->getResult());
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
     * @Rest\Post
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(type="object", ref=@Model(type=RepairOrder::class, groups=RepairOrder::GROUPS))
     * )
     * SWG\Response(response="406", ref="#/responses/ValidationResponse") TODO
     *
     * @SWG\Parameter(name="customer", type="integer", in="formData", required=true) TODO
     * @SWG\Parameter(name="advisor", type="integer", in="formData")
     * @SWG\Parameter(name="technician", type="integer", in="formData")
     *
     * @SWG\Parameter(name="number", type="string", in="formData", required=true)
     * @SWG\Parameter(name="startValue", type="number", in="formData")
     * @SWG\Parameter(name="waiter", type="boolean", in="formData")
     * @SWG\Parameter(name="internal", type="boolean", in="formData")
     * @SWG\Parameter(name="note", type="string", in="formData")
     *
     * @param Request           $req
     * @param RepairOrderHelper $helper
     *
     * @return Response
     */
    // TODO: Replace customer param with customerPhone & customerName, lookup/create customer
    public function add (Request $req, RepairOrderHelper $helper): Response {
        $ro = $helper->addRepairOrder($req->request->all());
        if (is_array($ro)) {
            return new JsonResponse($ro, 406); // TODO
//            return new ValidationResponse($ro);
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
     * SWG\Response(response="406", ref="#/responses/ValidationResponse") TODO
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
            return new JsonResponse($errors, 406); // TODO
//            return new ValidationResponse($errors);
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
            return new Response(null, 400);
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
            return new Response(null, 400);
        }
        $helper->closeRepairOrder($ro);

        return $this->handleView($this->view([
            'message' => 'RO Closed',
        ]));
    }
}