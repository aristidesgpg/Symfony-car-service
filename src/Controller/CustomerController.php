<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Entity\User;
use App\Repository\CustomerRepository;
use App\Response\ValidationResponse;
use App\Service\CustomerHelper;
use App\Service\Pagination;
use Doctrine\ORM\EntityManagerInterface;
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
 * @Rest\Route("/api/customer")
 * @SWG\Tag(name="Customer")
 */
class CustomerController extends AbstractFOSRestController
{
    private const PAGE_LIMIT = 100;

    /**
     * @Rest\Get(name="getCustomers")
     *
     * @SWG\Parameter(
     *     name="page",
     *     type="integer",
     *     description="Page of results",
     *     in="query"
     * )
     * @SWG\Parameter(
     *     name="pageLimit",
     *     type="integer",
     *     description="Page Limit",
     *     in="query"
     * )
     *
     * @SWG\Parameter(
     *     name="sortField",
     *     type="string",
     *     description="The name of sort field",
     *     in="query"
     * )
     *
     * @SWG\Parameter(
     *     name="sortDirection",
     *     type="string",
     *     description="The direction of sort",
     *     in="query",
     *     enum={"ASC", "DESC"}
     * )
     *
     * @SWG\Parameter(
     *     name="searchTerm",
     *     type="string",
     *     description="The value of search. The available fields are name, phone, and email",
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
     * @SWG\Response(
     *     response="404",
     *     description="Invalid page parameter"
     * )
     * @SWG\Response(
     *     response="406",
     *     description="Page limit must be a positive non-zero integer"
     * )
     */
    public function getAll(
        Request $request,
        CustomerRepository $customerRepository,
        PaginatorInterface $paginator,
        UrlGeneratorInterface $urlGenerator,
        EntityManagerInterface $em
    ): Response {
        $page = $request->query->getInt('page', 1);
        $urlParameters = [];
        $errors = [];
        $sortField = '';
        $sortDirection = '';
        $searchTerm = '';

        // Invalid page
        if ($page < 1) {
            throw new NotFoundHttpException();
        }

        //get all field names of RepairOrder Entity
        $columns = $em->getClassMetadata('App\Entity\Customer')->getFieldNames();

        if ($request->query->has('sortField') && $request->query->has('sortDirection')) {
            $sortField = $request->query->get('sortField');

            //check if the sortfield exist
            if (!in_array($sortField, $columns)) {
                $errors['sortField'] = 'Invalid sort field name';
            }

            $sortDirection = $request->query->get('sortDirection');

            $urlParameters['sortDirection'] = $sortDirection;
            $urlParameters['sortField'] = $sortField;
        }

        if ($request->query->has('searchTerm')) {
            $searchTerm = $request->query->get('searchTerm');

            $urlParameters['searchTerm'] = $searchTerm;
        }

        if (!empty($errors)) {
            return new ValidationResponse($errors);
        }

        // Build query
        $customersQuery = $customerRepository->findAllActive(
            null,
            $sortField,
            $sortDirection,
            $searchTerm
        );

        $pageLimit = $request->query->getInt('pageLimit', self::PAGE_LIMIT);

        if ($pageLimit < 1) {
            return $this->handleView(
                $this->view('Page limit must be a positive non-zero integer', Response::HTTP_NOT_ACCEPTABLE)
            );
        }

        $pager = $paginator->paginate($customersQuery, $page, $pageLimit);
        $pagination = new Pagination($pager, $pageLimit, $urlGenerator);

        $json = [
            'results' => $pager->getItems(),
            'totalResults' => $pagination->totalResults,
            'totalPages' => $pagination->totalPages,
            'previous' => $pagination->getPreviousPageURL('getCustomers', $urlParameters),
            'currentPage' => $pagination->currentPage,
            'next' => $pagination->getNextPageURL('getCustomers', $urlParameters),
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
     */
    public function getCustomer(Customer $customer): Response
    {
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
     */
    public function addCustomer(Request $req, CustomerHelper $helper, CustomerRepository $customerRepository): Response
    {
        $validation = $helper->validateParams($req->request->all(), true);
        if (!empty($validation)) {
            return new ValidationResponse($validation);
        }

        $customer = $customerRepository->findByPhone($req->get('phone'));
        if ($customer) {
            return new ValidationResponse(['phone' => 'Phone number already exist']);
        }

        $customer = new Customer();
        $user = $this->getUser();
        if ($user instanceof User && !is_null($user->getId())) {
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
     * @SWG\Response(
     *      response="200",
     *      description="Return updated customer",
     *      @SWG\Schema(type="object", ref=@Model(type=Customer::class, groups=Customer::GROUPS))
     * )
     * @SWG\Response(response="404", description="Customer does not exist")
     * @SWG\Response(response="406", ref="#/responses/ValidationResponse")
     *
     * @SWG\Parameter(name="name", type="string", in="formData")
     * @SWG\Parameter(name="phone", type="string", in="formData")
     * @SWG\Parameter(name="email", type="string", in="formData")
     * @SWG\Parameter(name="doNotContact", type="boolean", in="formData")
     */
    public function updateCustomer(
        Customer $customer,
        Request $req,
        CustomerHelper $helper,
        CustomerRepository $customerRepository
    ): Response {
        if ($customer->isDeleted()) {
            throw new NotFoundHttpException();
        }
        $validation = $helper->validateParams($req->request->all());
        if (!empty($validation)) {
            return new ValidationResponse($validation);
        }

        if ($req->get('phone')) {
            $ct = $customerRepository->findByPhone($req->get('phone'));
            if ($ct && ($ct->getId() !== $customer->getId())) {
                return new ValidationResponse(['phone' => 'Phone number already exist']);
            }
        }

        $helper->commitCustomer($customer, $req->request->all());

        $view = $this->view($customer, Response::HTTP_OK);
        $view->getContext()->setGroups(Customer::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Delete("/{id}")
     *
     * @SWG\Response(
     *      response="200",
     *      description="Return deleted customer",
     *      @SWG\Schema(type="object", ref=@Model(type=Customer::class, groups=Customer::GROUPS))
     * )
     *
     * @SWG\Response(response="404", description="Customer does not exist")
     */
    public function deleteCustomer(Customer $customer, CustomerHelper $helper): Response
    {
        if ($customer->isDeleted()) {
            throw new NotFoundHttpException();
        }
        $customer->setDeleted(true);

        $helper->commitCustomer($customer);

        $view = $this->view($customer, Response::HTTP_OK);
        $view->getContext()->setGroups(Customer::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Post("/mobileConfirmed")
     *
     * @SWG\Post(description="Set mobileConfirmed true for a customer")
     *
     * @SWG\Parameter(name="customerId", type="string", in="formData")
     *
     * @SWG\Response(
     *      response="200",
     *      description="Success",
     *      @SWG\Schema(
     *          type="object",
     *          @SWG\Property(property="mobileConfirmed", type="boolean", description="Customer mobileConfirmed")
     *      )
     * )
     *
     * @SWG\Response(response="400", description="Input customerId")
     */
    public function mobileConfirmed(Request $request, CustomerRepository $customerRepo, EntityManagerInterface $em): Response
    {
        $customerId = $request->get('customerId');

        if (!$customerId) {
            return $this->handleView($this->view('Input customerId', Response::HTTP_BAD_REQUEST));
        }

        $customer = $customerRepo->find($customerId);
        $customer->setMobileConfirmed(true);

        $em->persist($customer);
        $em->flush();

        return $this->json(['mobileConfirmed' => true], Response::HTTP_OK);
    }
}
