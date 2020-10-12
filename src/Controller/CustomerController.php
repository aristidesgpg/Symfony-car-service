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
 * @package App\Controller
 * @Rest\Route("/api/customer")
 * @SWG\Tag(name="Customer")
 */
class CustomerController extends AbstractFOSRestController {
    /** @var CustomerRepository */
    private $repo;

    /**
     * CustomerController constructor.
     * @param CustomerRepository $repo
     */
    public function __construct (CustomerRepository $repo) {
        $this->repo = $repo;
    }

    /**
     * @Rest\Get
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Customer::class, groups={"customer_list"}))
     *     )
     * )
     *
     * @return Response
     */
    public function getAll (): Response {
        return $this->customerView($this->repo->findAllActive());
    }

    /**
     * @Rest\Get("/{id}", name="getCustomer")
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(type="object", ref=@Model(type=Customer::class, groups={"customer_list"}))
     * )
     * @SWG\Response(response="404", description="Customer does not exist")
     *
     * @param int $id
     *
     * @return Response
     */
    public function getCustomer (int $id): Response {
        return $this->customerView($this->findCustomer($id));
    }

    /**
     * @Rest\Post
     * @SWG\Response(
     *     response="201",
     *     description="Success!",
     *     headers={@SWG\Header(header="Location", type="string", description="URL of new customer")}
     * )
     * @SWG\Response(response="406", ref="#/responses/ValidationResponse")
     *
     * @SWG\Parameter(name="firstName", type="string", in="formData", required=True)
     * @SWG\Parameter(name="lastName", type="string", in="formData", required=True)
     * @SWG\Parameter(name="phone", type="string", in="formData", required=True, minLength=10, maxLength=10)
     * @SWG\Parameter(name="email", type="string", in="formData")
     * @SWG\Parameter(name="doNotContact", type="boolean", in="formData")
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
        $customer->setAddedBy($this->getCurrentUser());
        $helper->commitCustomer($customer, $req->request->all());
        $url = $this->generateUrl('getCustomer', ['id' => $customer->getId()]);

        return new Response(null, 201, ['Location' => $url]);
    }

    /**
     * @Rest\Put("/{id}")
     * @SWG\Response(response="200", description="Success!")
     * @SWG\Response(response="404", description="Customer does not exist")
     * @SWG\Response(response="406", ref="#/responses/ValidationResponse")
     *
     * @SWG\Parameter(name="firstName", type="string", in="formData")
     * @SWG\Parameter(name="lastName", type="string", in="formData")
     * @SWG\Parameter(name="phone", type="string", in="formData")
     * @SWG\Parameter(name="email", type="string", in="formData")
     * @SWG\Parameter(name="doNotContact", type="boolean", in="formData")
     *
     * @param int            $id
     * @param Request        $req
     * @param CustomerHelper $helper
     *
     * @return Response
     */
    public function updateCustomer (int $id, Request $req, CustomerHelper $helper): Response {
        $customer = $this->findCustomer($id);
        $validation = $helper->validateParams($req->request->all());
        if (!empty($validation)) {
            return new ValidationResponse($validation);
        }
        $helper->commitCustomer($customer, $req->request->all());

        return new Response();
    }

    /**
     * @Rest\Delete("/{id}")
     * @SWG\Response(response="200", description="Success!")
     * @SWG\Response(response="404", description="Customer does not exist")
     *
     * @param int            $id
     * @param CustomerHelper $helper
     *
     * @return Response
     */
    public function deleteCustomer (int $id, CustomerHelper $helper): Response {
        $customer = $this->findCustomer($id);
        $customer->setDeleted(true);
        $helper->commitCustomer($customer);

        return new Response();
    }

    /**
     * @param mixed $data
     *
     * @return Response
     */
    private function customerView ($data): Response {
        $view = $this->view($data);
        $view->getContext()->setGroups(['customer_list']);

        return $this->handleView($view);
    }

    /**
     * @param int $id
     *
     * @return Customer
     * @throws NotFoundHttpException
     */
    private function findCustomer (int $id): Customer {
        $customer = $this->repo->findActive($id);
        if ($customer === null) {
            throw new NotFoundHttpException(sprintf('Customer ID %d not found', $id));
        }

        return $customer;
    }

    /**
     * @return User
     */
    private function getCurrentUser (): User {
        return $this->container->get('security.token_storage')->getToken()->getUser();
    }
}