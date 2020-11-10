<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Entity\User;
use App\Repository\CustomerRepository;
use App\Response\ValidationResponse;
use App\Service\CustomerHelper;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class CustomerController
 *
 * @package App\Controller
 * @Rest\Route("/api/customer")
 * @SWG\Tag(name="Customer")
 */
class CustomerController extends AbstractFOSRestController {
    private const PAGE_LIMIT = 100;

    /**
     * @Rest\Get(name="getCustomers")
     * @SWG\Parameter(
     *     name="search",
     *     type="string",
     *     description="Name, Phone Number, or Email",
     *     in="query"
     * )
     * @SWG\Parameter(
     *     name="page",
     *     type="integer",
     *     description="Page of results",
     *     in="query"
     * )
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(
     *         type="object",
     *         @SWG\Property(
     *             property="items",
     *             type="array",
     *             @SWG\Items(ref=@Model(type=Customer::class, groups=Customer::GROUPS))
     *         ),
     *         @SWG\Property(property="next", type="string", description="URL of next page of results or null"),
     *         @SWG\Property(property="prev", type="string", description="URL of previous page of results or null")
     *     )
     * )
     * @SWG\Response(
     *     response="404",
     *     description="Invalid page parameter"
     * )
     *
     * @param Request            $request
     * @param CustomerRepository $customerRepository
     *
     * @return Response
     */
    public function getAll (Request $request, CustomerRepository $customerRepository): Response {
        $page          = $request->query->has('page') ? (int)$request->query->get('page') : 1;
        $offset        = self::PAGE_LIMIT * ($page - 1);
        $urlParameters = [];
        $next          = null;
        $previous      = null;

        // Invalid page
        if ($page < 1) {
            throw new NotFoundHttpException();
        }

        // Build query
        if ($request->query->has('search')) {
            $customers               = $customerRepository->search($request->query->get('search'), null, self::PAGE_LIMIT, $offset);
            $urlParameters['search'] = $request->query->get('search');
        } else {
            $customers = $customerRepository->findAllActive(null, self::PAGE_LIMIT, $offset);
        }

        // Pages went too far
        $count = count($customers);
        if ($page !== 1 && $count === 0) {
            throw new NotFoundHttpException();
        }

        if ($count === self::PAGE_LIMIT) {
            $next = $this->generateUrl('getCustomers', $urlParameters + ['page' => $page + 1]);
        }

        if ($page !== 1) {
            $previous = $this->generateUrl('getCustomers', $urlParameters + ['page' => $page - 1]);
        }

        $json = [
            'items'    => $customers,
            'next'     => $next,
            'previous' => $previous,
        ];

        $view = $this->view($json);
        $view->getContext()->setGroups(Customer::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Get("/{id}", name="getCustomer")
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(type="object", ref=@Model(type=Customer::class, groups=Customer::GROUPS))
     * )
     * @SWG\Response(response="404", description="Customer does not exist")
     *
     * @param Customer $customer
     *
     * @return Response
     */
    public function getCustomer (Customer $customer): Response {
        if ($customer->isDeleted()) {
            throw new NotFoundHttpException();
        }
        $view = $this->view($customer);
        $view->getContext()->setGroups(Customer::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Post
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(type="object", ref=@Model(type=Customer::class, groups=Customer::GROUPS))
     * )
     * @SWG\Response(response="406", ref="#/responses/ValidationResponse")
     *
     * @SWG\Parameter(name="name", type="string", in="formData", required=True)
     * @SWG\Parameter(name="phone", type="string", in="formData", required=True, minLength=10, maxLength=10)
     * @SWG\Parameter(name="email", type="string", in="formData")
     * @SWG\Parameter(name="doNotContact", type="boolean", in="formData")
     * @SWG\Parameter(name="skipMobileVerification", type="boolean", in="formData")
     *
     * @param Request        $req
     * @param CustomerHelper $helper
     *
     * @return Response
     */
    public function addCustomer (Request $req, CustomerHelper $helper): Response {
        $validation = $helper->validateParams($req->request->all(), true);
        if (!empty($validation)) {
            return new ValidationResponse($validation);
        }

        $customer = new Customer();
        $user     = $this->getUser();
        if ($user instanceof User && $user->getId() !== null) {
            $customer->setAddedBy($user);
        }
        $helper->commitCustomer($customer, $req->request->all());

        $view = $this->view($customer);
        $view->getContext()->setGroups(Customer::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Put("/{id}")
     *
     * @SWG\Response(response="200", description="Success!")
     * @SWG\Response(response="404", description="Customer does not exist")
     * @SWG\Response(response="406", ref="#/responses/ValidationResponse")
     *
     * @SWG\Parameter(name="name", type="string", in="formData")
     * @SWG\Parameter(name="phone", type="string", in="formData")
     * @SWG\Parameter(name="email", type="string", in="formData")
     * @SWG\Parameter(name="doNotContact", type="boolean", in="formData")
     * @SWG\Parameter(name="skipMobileVerification", type="boolean", in="formData")
     *
     * @param Customer       $customer
     * @param Request        $req
     * @param CustomerHelper $helper
     *
     * @return Response
     */
    public function updateCustomer (Customer $customer, Request $req, CustomerHelper $helper): Response {
        if ($customer->isDeleted()) {
            throw new NotFoundHttpException();
        }
        $validation = $helper->validateParams($req->request->all());
        if (!empty($validation)) {
            return new ValidationResponse($validation);
        }

        $helper->commitCustomer($customer, $req->request->all());

        return $this->handleView($this->view([
            'message' => 'User Updated'
        ], Response::HTTP_OK));
    }

    /**
     * @Rest\Delete("/{id}")
     * @SWG\Response(response="200", description="Success!")
     * @SWG\Response(response="404", description="Customer does not exist")
     *
     * @param Customer       $customer
     * @param CustomerHelper $helper
     *
     * @return Response
     */
    public function deleteCustomer (Customer $customer, CustomerHelper $helper): Response {
        if ($customer->isDeleted()) {
            throw new NotFoundHttpException();
        }
        $customer->setDeleted(true);

        $helper->commitCustomer($customer);

        return $this->handleView($this->view([
            'message' => 'Customer Deleted'
        ], Response::HTTP_OK));
    }
}
