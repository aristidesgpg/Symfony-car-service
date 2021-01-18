<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Entity\User;
use App\Repository\CustomerRepository;
use App\Response\ValidationResponse;
use App\Service\CustomerHelper;
use App\Service\Pagination;
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
     * 
     * @SWG\Parameter(
     *     name="page",
     *     type="integer",
     *     description="Page of results",
     *     in="query"
     * )
     * 
     * @SWG\Parameter(
     *     name="pageLimit",
     *     type="integer",
     *     description="Page Limit",
     *     in="query"
     * )
     * 
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(
     *         type="object",
     *         @SWG\Property(
     *             property="customers",
     *             type="array",
     *             @SWG\Items(ref=@Model(type=Customer::class, groups=Customer::GROUPS))
     *         ),
     *         @SWG\Property(property="totalResults", type="integer", description="Total # of results found"),
     *         @SWG\Property(property="totalPages", type="integer", description="Total # of pages of results"),
     *         @SWG\Property(property="previous", type="string", description="URL for previous page"),
     *         @SWG\Property(property="currentPage", type="integer", description="Current page #"),
     *         @SWG\Property(property="next", type="string", description="URL for next page")
     *     )
     * )
     * 
     * @SWG\Response(
     *     response="404",
     *     description="Invalid page parameter"
     * )
     * 
     * @SWG\Response(
     *     response="406",
     *     description="Page limit must be a positive non-zero integer"
     * )
     *
     * @param Request               $request
     * @param CustomerRepository    $customerRepository
     * @param PaginatorInterface    $paginator
     * @param UrlGeneratorInterface $urlGenerator
     *
     * @return Response
     */
    public function getAll (Request $request, CustomerRepository $customerRepository,
                            PaginatorInterface $paginator, UrlGeneratorInterface $urlGenerator): Response {
        $page          = $request->query->getInt('page', 1);
        $pageLimit     = $request->query->getInt('pageLimit', self::PAGE_LIMIT);
        $urlParameters = [];

        // Invalid page
        if ($page < 1) {
            throw new NotFoundHttpException();
        }

        if ($pageLimit < 1) {
            return $this->handleView($this->view("Page limit must be a positive non-zero integer", Response::HTTP_NOT_ACCEPTABLE));
        }

        // Build query
        if ($request->query->has('search')) {
            $customersQuery          = $customerRepository->search($request->query->get('search'));
            $urlParameters['search'] = $request->query->get('search');
        } else {
            $customersQuery = $customerRepository->findAllActive();
        }

        $pager      = $paginator->paginate($customersQuery, $page, $pageLimit);
        $pagination = new Pagination($pager, $pageLimit, $urlGenerator);

        $json = [
            'customers'    => $pager->getItems(),
            'totalResults' => $pagination->totalResults,
            'totalPages'   => $pagination->totalPages,
            'previous'     => $pagination->getPreviousPageURL('getCustomers', $urlParameters),
            'currentPage'  => $pagination->currentPage,
            'next'         => $pagination->getNextPageURL('getCustomers', $urlParameters)
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
     *     description="Return updated customer",
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
     * @SWG\Response(response="200", description="Return deleted customer")
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

        $view = $this->view($customer, Response::HTTP_OK);
        $view->getContext()->setGroups(Customer::GROUPS);

        return $this->handleView($view);
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

        $view = $this->view($customer, Response::HTTP_OK);
        $view->getContext()->setGroups(Customer::GROUPS);

        return $this->handleView($view);
    }
}
