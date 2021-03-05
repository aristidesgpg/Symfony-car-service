<?php

namespace App\Controller;

use App\Entity\RepairOrder;
use App\Entity\RepairOrderCustomer;
use App\Repository\CustomerRepository;
use App\Repository\RepairOrderRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Doctrine\ORM\EntityManagerInterface;

class RepairOrderCustomerController extends AbstractFOSRestController
{

    /**
     * @Rest\Post("/api/repair-order-customer")
     *
     * @SWG\Tag(name="Repair Order Customer")
     * @SWG\Post(description="Add a Customer to RepairOrder")
     *
     * @SWG\Parameter(
     *     name="repairOrderId",
     *     type="integer",
     *     description="Id of a repair order",
     *     in="formData",
     *     required=true
     * )
     * @SWG\Parameter(
     *     name="customerId",
     *     type="integer",
     *     description="Id of Customer",
     *     in="formData",
     *     required=true
     * )
     *
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(type="object", ref=@Model(type=RepairOrderCustomer::class, groups=RepairOrderCustomer::GROUPS))
     * )
     * @SWG\Response(
     *     response="404",
     *     description="Invalid Customer ID"
     * )
     *
     * @return Response
     */
    public function new(
        Request $request,
        CustomerRepository $customerRepository,
        RepairOrderRepository $repairOrderRepository,
        EntityManagerInterface $em
    ) {
        $customerId = $request->get('customerId');
        $repairOrderId = $request->get('repairOrderId');

        if (!$customerId) {
            throw new BadRequestHttpException('Missing Required Parameter: customerId');
        }

        if (!$repairOrderId) {
            throw new BadRequestHttpException('Missing Required Parameter: repairOrderId');
        }

        $customer = $customerRepository->findActive($customerId);
        if (!$customer) {
            throw new NotFoundHttpException('Customer Not Found');
        }

        $repairOrder = $repairOrderRepository->findByUID($repairOrderId);
        if (!$repairOrder) {
            throw new NotFoundHttpException('Repair Order Not Found');
        }

        $repairOrderCustomer = new RepairOrderCustomer();

        $repairOrderCustomer->setRepairOrder($repairOrder)
                            ->setCustomer($customer);

        $em->persist($repairOrderCustomer);
        $em->flush();

        $view = $this->view($repairOrderCustomer);
        $view->getContext()->setGroups($repairOrderCustomer::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Delete("/api/repair-order-customer/{id}")
     *
     * @SWG\Tag(name="Repair Order Customer")
     * @SWG\Delete(description="Delete a secondary customer from a repair order")
     * @SWG\Response(
     *     response=200,
     *     description="success",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "Successfully deleted" }),
     *         )
     * )
     *
     * @return Response
     */
    public function delete(RepairOrderCustomer $repairOrderCustomer, EntityManagerInterface $em)
    {

        $em->remove($repairOrderCustomer);
        $em->flush();

        return $this->handleView($this->view('Customer Removed from Repair Order', Response::HTTP_OK));
    }

}
