<?php

namespace App\Controller;

use App\Entity\User;
use App\Helper\iServiceLoggerTrait;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Swagger\Annotations as SWG;
use App\Service\UserHelper;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Knp\Component\Pager\PaginatorInterface;
use App\Response\ValidationResponse;
use App\Service\Pagination;

/**
 * Class UserController
 *
 * @package App\Controller
 */
class UserController extends AbstractFOSRestController {
    use iServiceLoggerTrait;

    /**
     * @Rest\Get("/api/users")
     *
     * @SWG\Tag(name="Users")
     * @SWG\Get(description="Get all users")
     * @SWG\Parameter(
     *     name="role",
     *     in="query",
     *     required=true,
     *     type="string",
     *     description="permission role for users you are trying to get",
     *     enum={"ROLE_ADMIN", "ROLE_SERVICE_MANAGER", "ROLE_SERVICE_ADVISOR", "ROLE_TECHNICIAN", "ROLE_PARTS_ADVISOR", "ROLE_SALES_MANAGER", "ROLE_SALES_AGENT"}
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
     *  @SWG\Parameter(
     *     name="sortDirection",
     *     type="string",
     *     description="The direction of sort",
     *     in="query",
     *     enum={"ASC", "DESC"}
     * )
     *  @SWG\Parameter(
     *     name="searchField",
     *     type="string",
     *     description="The name of search field",
     *     in="query"
     * )
     * @SWG\Parameter(
     *     name="searchTerm",
     *     type="string",
     *     description="The value of search",
     *     in="query"
     * )
     * 
     * @SWG\Response(
     *     response=200,
     *     description="Return users",
     *     @SWG\Items(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=User::class, groups={"user_list"})),
     *         @SWG\Property(property="totalResults", type="integer", description="Total # of results found"),
     *         @SWG\Property(property="totalPages", type="integer", description="Total # of pages of results"),
     *         @SWG\Property(property="previous", type="string", description="URL for previous page"),
     *         @SWG\Property(property="currentPage", type="integer", description="Current page #"),
     *         @SWG\Property(property="next", type="string", description="URL for next page"),
     *         description="firstName, lastName, email, phone, roles, active, lastLogin, processRefund, shareRepairOrders"
     *     )
     * )
     * @SWG\Response(response="404", description="Invalid page parameter")
     * @SWG\Response(response="406", ref="#/responses/ValidationResponse")
     *
     * @param Request        $request
     * @param UserRepository $userRepo
     * @param UserHelper     $userHelper
     *
     * @return Response
     */
    public function getUsers (Request $request, UserRepository $userRepo, UserHelper $userHelper) {
        $page            = $request->query->getInt('page', 1);
        $startDate       = $request->query->get('startDate');
        $endDate         = $request->query->get('endDate');
        $urlParameters   = [];
        $queryParameters = [];
        $errors          = [];
        $sortField       = "";
        $sortDirection   = "";
        $searchField     = "";
        $searchTerm      = "";
        
        if ($page < 1) {
            throw new NotFoundHttpException();
        }

        $role    = $request->query->get('role');

        // role is invalid
        if (!$role || !$userHelper->isValidRole($role)) {
            return $this->handleView($this->view('Invalid Role Parameter', Response::HTTP_BAD_REQUEST));
        }
        $columns = $em->getClassMetadata('App\Entity\RepairOrder')->getFieldNames();

        if($request->query->has('sortField') && $request->query->has('sortDirection'))
        {
            $sortField                        = $request->query->get('sortField');
            
            //check if the sortfield exist
            if(!in_array($sortField, $columns))
                $errors['sortField']          = 'Invalid sort field name';
            
            $sortDirection                    = $request->query->get('sortDirection');
            $urlParameters['sortField']       = $sortField;
            $urlParameters['sortDirection']   = $sortDirection;
        }

        if($request->query->has('searchField') && $request->query->has('searchTerm'))
        {
            $searchField                      = $request->query->get('searchField');
           
            //check if the searchfield exist
            if(!in_array($searchField, $columns))
                $errors['searchField']        = 'Invalid search field name';

            $searchTerm  = $request->query->get('searchTerm');
            $urlParameters['searchField']     = $searchField;
            $urlParameters['searchTerm']      = $searchTerm;
        }

        if (!empty($errors)) {
            return new ValidationResponse($errors);
        }

        $users = $userRepo->getUserByRole($role, $sortField, $sortDirection, $searchField, $searchTerm);

        $pageLimit      = $request->query->getInt('pageLimit', self::PAGE_LIMIT);

        if($searchTerm){
            $urlParameters['searchTerm'] = $searchTerm;
        }
        $pager          = $paginator->paginate($users, $page, $pageLimit);
        $pagination     = new Pagination($pager, $pageLimit, $urlGenerator);

        $view = $this->view([
            'users' => $pager->getItems(),
            'totalResults' => $pagination->totalResults,
            'totalPages'   => $pagination->totalPages,
            'previous'     => $pagination->getPreviousPageURL('getUsers', $urlParameters),
            'currentPage'  => $pagination->currentPage,
            'next'         => $pagination->getNextPageURL('getUsers', $urlParameters)
        ]);
        $view->getContext()->setGroups(User::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Post("/api/users")
     *
     * @SWG\Tag(name="Users")
     * @SWG\Post(description="Create a new user")
     *
     * @SWG\Parameter(
     *     name="role",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="permission role for users you are trying to get",
     *     enum={"ROLE_ADMIN", "ROLE_SERVICE_MANAGER", "ROLE_SERVICE_ADVISOR", "ROLE_TECHNICIAN", "ROLE_PARTS_ADVISOR", "ROLE_SALES_MANAGER", "ROLE_SALES_AGENT"}
     * )
     * @SWG\Parameter(
     *     name="firstName",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The First Name of User",
     * )
     * @SWG\Parameter(
     *     name="lastName",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Last Name of User",
     * )
     * @SWG\Parameter(
     *     name="email",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Email of User",
     * )
     * @SWG\Parameter(
     *     name="phone",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Phone of User",
     * )
     * @SWG\Parameter(
     *     name="password",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Password of User",
     * )
     * @SWG\Parameter(
     *     name="pin",
     *     in="formData",
     *     required=false,
     *     type="string",
     *     description="The Pin of User",
     * )
     * @SWG\Parameter(
     *     name="certification",
     *     in="formData",
     *     required=false,
     *     type="string",
     *     description="The certification of Technician",
     * )
     * @SWG\Parameter(
     *     name="experience",
     *     in="formData",
     *     required=false,
     *     type="string",
     *     description="The experience of Technician",
     * )
     * @SWG\Parameter(
     *     name="processRefund",
     *     in="formData",
     *     required=false,
     *     type="boolean",
     *     description="The process of refund",
     * )
     * @SWG\Parameter(
     *     name="shareRepairOrders",
     *     in="formData",
     *     required=false,
     *     type="boolean",
     *     description="If the Repair Orders are shared",
     * )
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return users",
     *     @SWG\Items(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=User::class, groups={"user_list"})),
     *         description="firstName, lastName, email, phone, roles, active, lastLogin, processRefund, shareRepairOrders"
     *     )
     * )
     *
     * @param Request                $request
     * @param EntityManagerInterface $em
     * @param UserHelper             $userHelper
     *
     * @return Response
     */
    public function new (Request $request, EntityManagerInterface $em, UserHelper $userHelper) {
        $role              = $request->get('role');
        $firstName         = $request->get('firstName');
        $lastName          = $request->get('lastName');
        $email             = $request->get('email');
        $phone             = $request->get('phone');
        $password          = $request->get('password');
        $pin               = $request->get('pin');
        $certification     = $request->get('certification');
        $experience        = $request->get('experience');
        $processRefund     = $request->get('processRefund');
        $shareRepairOrders = $request->get('shareRepairOrders');

        //role is invalid
        if (!$role || !$userHelper->isValidRole($role)) {
            return $this->handleView($this->view('Invalid Role Parameter', Response::HTTP_BAD_REQUEST));
        }

        //check if parameters are valid
        if (!$firstName || !$lastName || !$email || !$phone || !$password) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }
        if ($role == 'ROLE_TECHNICIAN' && (!$certification || !$experience)) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }
        if ($role == 'ROLE_SERVICE_ADVISOR' && (!isset($processRefund) || !isset($shareRepairOrders))) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        $user = new User();
        $user->setFirstName($firstName)
             ->setLastName($lastName)
             ->setEmail($email)
             ->setPhone($phone)
             ->setPin($pin)
             ->setPassword($userHelper->passwordEncoder($user, $password))
             ->setRole($role);

        if ($role == 'ROLE_TECHNICIAN') {
            $user->setCertification($certification)
                 ->setExperience($experience);
        }
        if ($role == 'ROLE_SERVICE_ADVISOR') {
            $user->setProcessRefund(filter_var($processRefund, FILTER_VALIDATE_BOOLEAN))
                 ->setShareRepairOrders(filter_var($shareRepairOrders, FILTER_VALIDATE_BOOLEAN));
        }

        $em->persist($user);
        $em->flush();

        $this->logInfo('New User "' . $user->getFirstName() . '" Created');

        return $this->userView($user);
    }

    /**
     * @Rest\Put("/api/users/{id}")
     *
     * @SWG\Tag(name="Users")
     * @SWG\Put(description="Update a User")
     *
     * @SWG\Parameter(
     *     name="role",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="permission role for users you are trying to get",
     *     enum={"ROLE_ADMIN", "ROLE_SERVICE_MANAGER", "ROLE_SERVICE_ADVISOR", "ROLE_TECHNICIAN", "ROLE_PARTS_ADVISOR", "ROLE_SALES_MANAGER", "ROLE_SALES_AGENT"}
     * )
     * @SWG\Parameter(
     *     name="firstName",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The First Name of User",
     * )
     * @SWG\Parameter(
     *     name="lastName",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Last Name of User",
     * )
     * @SWG\Parameter(
     *     name="email",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Email of User",
     * )
     * @SWG\Parameter(
     *     name="phone",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Phone of User",
     * )
     * @SWG\Parameter(
     *     name="password",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Password of User",
     * )
     * @SWG\Parameter(
     *     name="pin",
     *     in="formData",
     *     required=false,
     *     type="string",
     *     description="The Pin of User",
     * )
     * @SWG\Parameter(
     *     name="certification",
     *     in="formData",
     *     required=false,
     *     type="string",
     *     description="The certification of Technician",
     * )
     * @SWG\Parameter(
     *     name="experience",
     *     in="formData",
     *     required=false,
     *     type="string",
     *     description="The experience of Technician",
     * )
     * @SWG\Parameter(
     *     name="processRefund",
     *     in="formData",
     *     required=false,
     *     type="boolean",
     *     description="The process of refund",
     * )
     * @SWG\Parameter(
     *     name="shareRepairOrders",
     *     in="formData",
     *     required=false,
     *     type="boolean",
     *     description="If the Repair Orders are shared",
     * )
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return users",
     *     @SWG\Items(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=User::class, groups={"user_list"})),
     *         description="firstName, lastName, email, phone, roles, active, lastLogin, processRefund, shareRepairOrders"
     *     )
     * )
     *
     * @param User                   $user
     * @param Request                $request
     * @param EntityManagerInterface $em
     * @param UserHelper             $userHelper
     *
     * @return Response
     */
    public function edit (User $user, Request $request, EntityManagerInterface $em, UserHelper $userHelper) {
        $role              = $request->get('role') ?? $user->getRoles()[0];
        $firstName         = $request->get('firstName') ?? $user->getFirstName();
        $lastName          = $request->get('lastName') ?? $user->getLastName();
        $email             = $request->get('email') ?? $user->getEmail();
        $phone             = $request->get('phone') ?? $user->getPhone();
        $password          = $request->get('password') ?? $user->getPassword();
        $pin               = $request->get('pin') ?? $user->getPin();
        $certification     = $request->get('certification') ?? $user->getCertification();
        $experience        = $request->get('experience') ?? $user->getExperience();
        $processRefund     = $request->get('processRefund') ?? $user->getProcessRefund();
        $shareRepairOrders = $request->get('shareRepairOrders') ?? $user->getShareRepairOrders();

        //role is invalid
        if ($role && !$userHelper->isValidRole($role)) {
            return $this->handleView($this->view('Invalid Role Parameter', Response::HTTP_BAD_REQUEST));
        }

        //check if parameters are valid
        if ($role != 'ROLE_TECHNICIAN' && ($certification || $experience)) {
            return $this->handleView($this->view('Certification and Experience is Only for Technicians', Response::HTTP_BAD_REQUEST));
        }
        if ($role == 'ROLE_SERVICE_ADVISOR' && (!isset($processRefund) || !isset($shareRepairOrders))) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        // update user
        $user->setFirstName($firstName)
             ->setLastName($lastName)
             ->setEmail($email)
             ->setPhone($phone)
             ->setPassword($userHelper->passwordEncoder($user, $password))
             ->setPin($pin)
             ->setRole($role);

        if ($role == 'ROLE_TECHNICIAN') {
            $user->setCertification($certification)
                 ->setExperience($experience);
        }
        if ($role == 'ROLE_SERVICE_ADVISOR') {
            $user->setProcessRefund(filter_var($processRefund, FILTER_VALIDATE_BOOLEAN))
                 ->setShareRepairOrders(filter_var($shareRepairOrders, FILTER_VALIDATE_BOOLEAN));
        }

        $em->persist($user);
        $em->flush();

        $this->logInfo('User "' . $user->getFirstName() . '" Has Been Updated');

        return $this->userView($user);
    }

    /**
     * @Rest\Delete("/api/users/{id}")
     *
     * @SWG\Tag(name="Users")
     * @SWG\Delete(description="Delete a user")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "Successfully deleted" }),
     *         )
     * )
     *
     * @param User                   $user
     * @param EntityManagerInterface $em
     *
     * @return object|void
     */
    public function delete (User $user, EntityManagerInterface $em) {
        $user->setActive(false);

        $em->persist($user);
        $em->flush();

        return $this->handleView($this->view([
            'message' => 'User Deleted'
        ], Response::HTTP_OK));
    }

    /**
     * @param mixed $data
     *
     * @return Response
     */
    private function userView ($data): Response {
        $view = $this->view($data);
        $view->getContext()->setGroups(['user_list']);

        return $this->handleView($view);
    }
}
