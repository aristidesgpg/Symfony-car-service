<?php

namespace App\Controller;

use App\Entity\RepairOrder;
use App\Repository\CustomerRepository;
use App\Repository\RepairOrderRepository;
use App\Repository\UserRepository;
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
    private $helper;
    private $orders;
    private $customers;
    private $users;

    /**
     * RepairOrderController constructor.
     * @param RepairOrderHelper     $helper
     * @param RepairOrderRepository $orders
     * @param CustomerRepository    $customers
     * @param UserRepository        $users
     */
    public function __construct (
        RepairOrderHelper $helper,
        RepairOrderRepository $orders,
        CustomerRepository $customers,
        UserRepository $users
    ) {
        $this->helper = $helper;
        $this->orders = $orders;
        $this->customers = $customers;
        $this->users = $users;
    }

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
     * @param Request $req
     *
     * @return Response
     */
    public function getAll (Request $req): Response {
        $qb = $this->orders->createQueryBuilder('ro');
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
            $date = $this->formatDate($req->query->get($key));
            if ($date !== null) {
                $op = ($key === 'startDate') ? '>=' : '<=';
                $qb->andWhere("ro.dateCreated {$op} :{$key}");
                $params[$key] = $date;
            } else {
                $errors[$key] = 'Invalid date format';
            }
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
     * @SWG\Parameter(name="customer", type="integer", in="formData", required=true)
     * @SWG\Parameter(name="advisor", type="integer", in="formData", required=true)
     * @SWG\Parameter(name="technician", type="integer", in="formData", required=true)
     *
     * @SWG\Parameter(name="number", type="string", in="formData", required=true)
     * @SWG\Parameter(name="startValue", type="number", in="formData", required=true)
     * @SWG\Parameter(name="waiter", type="boolean", in="formData")
     * @SWG\Parameter(name="internal", type="boolean", in="formData")
     * @SWG\Parameter(name="note", type="string", in="formData")
     *
     * @param Request $req
     *
     * @return Response
     */
    public function add (Request $req): Response {
        $ro = $this->buildRO($req->request->all());
        if (is_array($ro)) {
            return new JsonResponse($ro, 406); // TODO
//            return new ValidationResponse($ro);
        }
        $this->helper->addRepairOrder($ro);

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
     * @SWG\Parameter(name="customer", type="integer", in="formData")
     * @SWG\Parameter(name="advisor", type="integer", in="formData")
     * @SWG\Parameter(name="technician", type="integer", in="formData")
     *
     * @SWG\Parameter(name="number", type="string", in="formData")
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
     * @SWG\Parameter(name="waiver", type="string", in="formData")
     * @SWG\Parameter(name="waiverVerbiage", type="string", in="formData")
     * @SWG\Parameter(name="upgradeQue", type="boolean", in="formData")
     *
     * @param RepairOrder $ro
     * @param Request     $req
     *
     * @return Response
     */
    public function update (RepairOrder $ro, Request $req): Response {
        if ($ro->getDeleted()) {
            throw new NotFoundHttpException();
        }
        $errors = $this->buildRO($req->request->all(), $ro);
        if (is_array($errors)) {
            return new JsonResponse($errors, 406); // TODO
//            return new ValidationResponse($errors);
        }
        $this->helper->updateRepairOrder($ro);

        $view = $this->view($ro);
        $view->getContext()->setGroups(RepairOrder::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Delete("/{id}")
     * @SWG\Response(response="200", description="Success!")
     * @SWG\Response(response="404", description="RO does not exist")
     *
     * @param RepairOrder $ro
     *
     * @return Response
     */
    public function delete (RepairOrder $ro): Response {
        if ($ro->getDeleted()) {
            throw new NotFoundHttpException();
        }
        $this->helper->deleteRepairOrder($ro);

        return new Response();
    }

    /**
     * @Rest\Put("/{id}/archive")
     * @SWG\Response(response="200", description="Success!")
     * @SWG\Response(response="400", description="RO is already archived")
     * @SWG\Response(response="404", description="RO does not exist")
     *
     * @param RepairOrder $ro
     *
     * @return Response
     */
    public function archive (RepairOrder $ro): Response {
        if ($ro->getDeleted()) {
            throw new NotFoundHttpException();
        }
        if ($ro->isArchived() === true) {
            return new Response(null, 400);
        }
        $this->helper->archiveRepairOrder($ro);

        return new Response();
    }

    /**
     * @Rest\Put("/{id}/close")
     * @SWG\Response(response="200", description="Success!")
     * @SWG\Response(response="400", description="RO is already closed")
     * @SWG\Response(response="404", description="RO does not exist")
     *
     * @param RepairOrder $ro
     *
     * @return Response
     */
    public function close (RepairOrder $ro): Response {
        if ($ro->getDeleted()) {
            throw new NotFoundHttpException();
        }
        if ($ro->isClosed() === true) {
            return new Response(null, 400);
        }
        $this->helper->closeRepairOrder($ro);

        return new Response();
    }

    /**
     * @param array            $params
     * @param RepairOrder|null $ro
     *
     * @return RepairOrder|array Array on validation failure
     */
    private function buildRO (array $params, ?RepairOrder $ro = null) {
        $errors = [];
        if ($ro === null) {
            $ro = new RepairOrder();
            $required = ['customer', 'advisor', 'technician', 'number', 'startValue'];
            foreach ($required as $k) {
                if (!isset($params[$k]) || strlen($params[$k]) === 0) {
                    $errors[$k] = 'Required field missing';
                }
            }
        }
        if (isset($params['customer'])) {
            $customer = $this->customers->find($params['customer']);
            if ($customer === null) {
                $errors['customer'] = 'Customer not found';
            } else {
                $ro->setPrimaryCustomer($customer);
            }
        }
        foreach (['advisor', 'technician'] as $k) {
            if (!isset($params[$k]) || empty($params[$k])) {
                continue;
            }
            $user = $this->users->find($params[$k]);
            if ($user === null) {
                $errors[$k] = ucfirst($k) . ' not found';
                continue;
            }
            if ($k === 'advisor') {
                $ro->setPrimaryAdvisor($user);
            } else {
                $ro->setPrimaryTechnician($user);
            }
        }
        if (isset($params['number'])) {
            if ($this->helper->isNumberUnique($params['number'])) {
                $ro->setNumber($params['number']);
            } else {
                $errors['number'] = 'RO# already exists';
            }
        }
        if (isset($params['startValue'])) {
            $ro->setStartValue($params['startValue']);
        }
        if (isset($params['finalValue'])) {
            $ro->setFinalValue($params['finalValue']);
        }
        if (isset($params['approvedValue'])) {
            $ro->setApprovedValue($params['approvedValue']);
        }
        if (isset($params['waiter'])) {
            $ro->setWaiter($this->paramToBool($params['waiter']));
        }
        if (isset($params['pickupDate'])) {
            try {
                $dt = new \DateTime($params['pickupDate']);
                $ro->setPickupDate($dt);
            } catch (\Exception $e) {
                $errors['pickupDate'] = 'Invalid date format';
            }
        }
        if (isset($params['year'])) {
            $ro->setYear($params['year']);
        }
        if (isset($params['make'])) {
            $ro->setMake($params['make']);
        }
        if (isset($params['model'])) {
            $ro->setModel($params['model']);
        }
        if (isset($params['miles'])) {
            $ro->setMiles($params['miles']);
        }
        if (isset($params['vin'])) {
            $ro->setVin($params['vin']);
        }
        if (isset($params['internal'])) {
            $ro->setInternal($this->paramToBool($params['internal']));
        }
        if (isset($params['dmsKey'])) {
            $ro->setDmsKey($params['dmsKey']);
        }
        if (isset($params['waiver'])) {
            $ro->setWaiver($params['waiver']);
        }
        if (isset($params['waiverVerbiage'])) {
            $ro->setWaiverVerbiage($params['waiverVerbiage']);
        }
        if (isset($params['upgradeQue'])) {
            $ro->setUpgradeQue($this->paramToBool($params['upgradeQue']));
        }
        if (isset($params['note'])) {
            $ro->setNote($params['note']);
        }
        if (!empty($errors)) {
            return $errors;
        }

        return $ro;
    }

    /**
     * @param $param
     *
     * @return bool
     */
    private function paramToBool ($param): bool {      // TODO
        return ($param !== 'false' && $param == true); // TODO
    }                                                  // TODO

    /**
     * @param string $date
     *
     * @return string|null
     */
    private function formatDate (string $date): ?string {
        try {
            return (new \DateTime($date))->format('Y-m-d\TH:i:s');
        } catch (\Exception $e) {
            return null;
        }
    }
}