<?php

namespace App\Controller;

use App\Entity\RepairOrder;
use App\Entity\RepairOrderCustomer;
use App\Repository\RepairOrderCustomerRepository;
use App\Repository\CustomerRepository;
use App\Response\ValidationResponse;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class RepairOrderCustomerController
 *
 * @package App\Controller
 *
 */
class RepairOrderCustomerController extends AbstractFOSRestController {

    /**
     * @Rest\Post("/api/repair-order-customer/{id}")
     *
     * @SWG\Tag(name="RepairOrderCustomer")
     * @SWG\Post(description="Add a Customer to RepairOrder")
     *
     * @SWG\Parameter(
     *     name="customer",
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
     *
     * @SWG\Response(
     *     response="404",
     *     description="Invalid Customer ID"
     * )
     *
     * @param RepairOrder                $repairOrder
     * @param Request                    $request
     * @param CustomerRepository         $customerRepository
     * @param EntityManagerInterface     $em
     *
     * @return Response
     */

    public function new (RepairOrder $repairOrder, Request $request, CustomerRepository $customerRepository, 
                        EntityManagerInterface $em) {
        $id                  = $request->get('customer');

        $customer            = $customerRepository->findActive($id);
        if(!$customer){
            throw new NotFoundHttpException();
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
     * @SWG\Tag(name="RepairOrderCustomer")
     * @SWG\Delete(description="Delete a customer")
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
     * @param RepairOrderCustomer                 $repairOrderCustomer
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function delete (RepairOrderCustomer $repairOrderCustomer, EntityManagerInterface $em) {
 
        $em->remove($repairOrderCustomer);
        $em->flush();

        return $this->handleView($this->view('RepairOrderCustomer Deleted', Response::HTTP_OK));
    }

}
