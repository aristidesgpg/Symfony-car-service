<?php

namespace App\Controller;

use App\Entity\User;
use App\Helper\iServiceLoggerTrait;
use App\Repository\UserRepository;
use App\Response\ValidationResponse;
use App\Service\Pagination;
use App\Service\SecurityHelper;
use App\Service\UserHelper;
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

class UserController extends AbstractFOSRestController
{
    use iServiceLoggerTrait;

    private const PAGE_LIMIT = 100;

    /**
     * @Rest\Get("/api/users")
     *
     * @SWG\Tag(name="Users")
     * @SWG\Get(description="Get all users")
     * @SWG\Parameter(
     *     name="role",
     *     in="query",
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
     * @SWG\Parameter(
     *     name="sortDirection",
     *     type="string",
     *     description="The direction of sort",
     *     in="query",
     *     enum={"ASC", "DESC"}
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
     *
     * @SWG\Response(
     *     response="400",
     *     description="Invalid Role Parameter"
     * )
     *
     * @SWG\Response(response="404", description="Invalid page parameter")
     * @SWG\Response(response="406", ref="#/responses/ValidationResponse")
     *
     * @return Response
     */
    public function getUsers(
        Request $request,
        UserRepository $userRepo,
        UserHelper $userHelper,
        PaginatorInterface $paginator,
        UrlGeneratorInterface $urlGenerator,
        EntityManagerInterface $em
    ) {
        $page = $request->query->getInt('page', 1);
        $role = $request->query->get('role');
        $urlParameters = [];
        $errors = [];
        $sortField = '';
        $sortDirection = '';
        $searchField = '';
        $searchTerm = '';
        $columns = $em->getClassMetadata('App\Entity\User')->getFieldNames();

        if ($page < 1) {
            throw new NotFoundHttpException();
        }

        if (!$role) {
            $users = $userRepo->getActiveUsers();
        } elseif (!$userHelper->isValidRole($role)) {
            return $this->handleView($this->view('Invalid Role Parameter', Response::HTTP_NOT_ACCEPTABLE));
        } else {
            $users = $userRepo->getUserByRole($role);
        }

        if ($request->query->has('sortField') && $request->query->has('sortDirection')) {
            $sortField = $request->query->get('sortField');

            if (!in_array($sortField, $columns)) {
                $errors['sortField'] = 'Invalid sort field name';
            }

            $sortDirection = $request->query->get('sortDirection');
            $urlParameters['sortField'] = $sortField;
            $urlParameters['sortDirection'] = $sortDirection;
        }

        if ($request->query->has('searchTerm')) {
            $searchTerm = $request->query->get('searchTerm');
            $urlParameters['searchTerm'] = $searchTerm;
        }

        if (!empty($errors)) {
            return new ValidationResponse($errors);
        }

        $users = $userRepo->getUserByRole($role, $sortField, $sortDirection, $searchTerm);
        $pageLimit = $request->query->getInt('pageLimit', self::PAGE_LIMIT);
        if ($pageLimit < 1) {
            return $this->handleView(
                $this->view('Page limit must be a positive non-zero integer', Response::HTTP_NOT_ACCEPTABLE)
            );
        }

        $pager = $paginator->paginate($users, $page, $pageLimit);
        $pagination = new Pagination($pager, $pageLimit, $urlGenerator);

        $view = $this->view(
            [
                'results' => $pager->getItems(),
                'totalResults' => $pagination->totalResults,
                'totalPages' => $pagination->totalPages,
                'previous' => $pagination->getPreviousPageURL('app_user_getusers', $urlParameters),
                'currentPage' => $pagination->currentPage,
                'next' => $pagination->getNextPageURL('app_user_getusers', $urlParameters),
            ]
        );

        $view->getContext()->setGroups(['user_list']);

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
     *     name="dmsId",
     *     in="formData",
     *     required=false,
     *     type="string",
     *     description="The DMS ID of User",
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
     *     description="Return created user",
     *     @SWG\Items(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=User::class, groups={"user_list"})),
     *         description="firstName, lastName, email, phone, roles, active, lastLogin, processRefund, shareRepairOrders"
     *     )
     * )
     * @SWG\Response(
     *     response="400",
     *     description="Missing Required Parameter"
     * )
     *
     * @return Response
     */
    public function new(
        Request $request,
        EntityManagerInterface $em,
        UserHelper $userHelper,
        UserRepository $userRepo
    ) {
        $role = $request->get('role');
        $firstName = $request->get('firstName');
        $lastName = $request->get('lastName');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $password = $request->get('password');
        $pin = $request->get('pin');
        $certification = $request->get('certification');
        $experience = $request->get('experience');
        $processRefund = $request->get('processRefund');
        $shareRepairOrders = $request->get('shareRepairOrders');
        $dmsId = $request->get('dmsId');

        //role is invalid
        if (!$role || !$userHelper->isValidRole($role)) {
            return $this->handleView($this->view('Invalid Role Parameter', Response::HTTP_BAD_REQUEST));
        }

        //check if parameters are valid
        if (!$firstName || !$lastName || !$email || !$phone || !$password) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }
        if ('ROLE_TECHNICIAN' == $role && (!$certification || !$experience)) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }
        if ('ROLE_SERVICE_ADVISOR' == $role && (!isset($processRefund) || !isset($shareRepairOrders))) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        // Make sure it wasn't a duplicate
        $user = $userRepo->findOneBy(['email' => $email]);
        if ($user) {
            if ($user->getActive()) {
                return $this->handleView(
                    $this->view('Email already registered. Try another email!', Response::HTTP_NOT_ACCEPTABLE)
                );
            } else {
                $user->setActive(true);
            }
        } else {
            $user = new User();
        }

        $user->setFirstName($firstName)
             ->setLastName($lastName)
             ->setEmail($email)
             ->setPhone($phone)
             ->setPin($pin)
             ->setDmsId($dmsId)
             ->setPassword($userHelper->passwordEncoder($user, $password))
             ->setRole($role);

        if ('ROLE_TECHNICIAN' == $role) {
            $user->setCertification($certification)
                 ->setExperience($experience);
        }
        if ('ROLE_SERVICE_ADVISOR' == $role) {
            $user->setProcessRefund(filter_var($processRefund, FILTER_VALIDATE_BOOLEAN))
                 ->setShareRepairOrders(filter_var($shareRepairOrders, FILTER_VALIDATE_BOOLEAN));
        }

        $em->persist($user);
        $em->flush();

        $this->logInfo('New User "'.$user->getFirstName().'" Created');

        return $this->userView($user);
    }

    /**
     * @param $data
     */
    private function userView($data): Response
    {
        $view = $this->view($data);
        $view->getContext()->setGroups(['user_list']);

        return $this->handleView($view);
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
     *     required=false,
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
     *     name="dmsId",
     *     in="formData",
     *     required=false,
     *     type="string",
     *     description="The DMS ID of User",
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
     *     description="Return updated user",
     *     @SWG\Items(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=User::class, groups={"user_list"})),
     *         description="firstName, lastName, email, phone, roles, active, lastLogin, processRefund, shareRepairOrders"
     *     )
     * )
     *
     * @return Response
     */
    public function edit(
        User $user,
        Request $request,
        EntityManagerInterface $em,
        UserHelper $userHelper,
        UserRepository $userRepo
    ) {
        $role = $request->get('role') ?? $user->getRoles()[0];
        $firstName = $request->get('firstName') ?? $user->getFirstName();
        $lastName = $request->get('lastName') ?? $user->getLastName();
        $email = $request->get('email') ?? $user->getEmail();
        $phone = $request->get('phone') ?? $user->getPhone();
        $password = $request->get('password');
        $pin = $request->get('pin') ?? $user->getPin();
        $certification = $request->get('certification') ?? $user->getCertification();
        $experience = $request->get('experience') ?? $user->getExperience();
        $processRefund = $request->get('processRefund') ?? $user->getProcessRefund();
        $shareRepairOrders = $request->get('shareRepairOrders') ?? $user->getShareRepairOrders();
        $dmsId = $request->get('dmsId') ?? $user->getDmsId();

        //role is invalid
        if ($role && !$userHelper->isValidRole($role)) {
            return $this->handleView($this->view('Invalid Role Parameter', Response::HTTP_BAD_REQUEST));
        }

        //check if parameters are valid
        if ('ROLE_TECHNICIAN' != $role && ($certification || $experience)) {
            return $this->handleView(
                $this->view('Certification and Experience is Only for Technicians', Response::HTTP_BAD_REQUEST)
            );
        }
        if ('ROLE_SERVICE_ADVISOR' == $role && (!isset($processRefund) || !isset($shareRepairOrders))) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        // They tried to change the email
        if ($email !== $user->getEmail()) {
            $existingUser = $userRepo->findOneBy(['email' => $email]);

            // Email was already used by someone else in the system
            if ($existingUser) {
                return $this->handleView(
                    $this->view(
                        'This email has already been used by someone else. Try another email!',
                        Response::HTTP_NOT_ACCEPTABLE
                    )
                );
            }
        }

        // They tried to update an externalAuthentication user
        if($user->getExternalAuthentication()){
            return $this->handleView($this->view('Can not update this user', Response::HTTP_BAD_REQUEST));
        }

        // update user
        $user->setFirstName($firstName)
             ->setLastName($lastName)
             ->setEmail($email)
             ->setPhone($phone)
             ->setPin($pin)
             ->setDmsId($dmsId)
             ->setRole($role);
        if ($password) {
            $user->setPassword($userHelper->passwordEncoder($user, $password));
        }

        if ('ROLE_TECHNICIAN' == $role) {
            $user->setCertification($certification)
                 ->setExperience($experience);
        }
        if ('ROLE_SERVICE_ADVISOR' == $role) {
            $user->setProcessRefund(filter_var($processRefund, FILTER_VALIDATE_BOOLEAN))
                 ->setShareRepairOrders(filter_var($shareRepairOrders, FILTER_VALIDATE_BOOLEAN));
        }

        $em->persist($user);
        $em->flush();

        $this->logInfo('User "'.$user->getFirstName().'" Has Been Updated');

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
     * @return object|void
     */
    public function delete(User $user, EntityManagerInterface $em)
    {
        $user->setActive(false);

        // They tried to delete an externalAuthentication user
        if($user->getExternalAuthentication()){
            return $this->handleView($this->view('Can not delete this user', Response::HTTP_BAD_REQUEST));
        }

        $em->persist($user);
        $em->flush();

        return $this->handleView(
            $this->view(
                [
                    'message' => 'User Deleted',
                ],
                Response::HTTP_OK
            )
        );
    }

    // Security

    /**
     * @Rest\Patch("/api/security/{id}/set")
     *
     * @SWG\Tag(name="Security")
     * @SWG\Patch(description="Set Security question and answer for a User")
     *
     * @SWG\Parameter(
     *     name="question",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Security Question of a User",
     * )
     * @SWG\Parameter(
     *     name="answer",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Security Answer of a User",
     * )
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "Security Question Has Been Updated" }),
     *         )
     * )
     *
     * @return Response
     */
    public function security(User $user, Request $request, UserHelper $userHelper, EntityManagerInterface $em)
    {
        $question = $request->get('question');
        $answer = $request->get('answer');
        $auth = $this->getUser();

        //check if parameters are valid
        if (!$question || !$answer) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }
        $userRole = $user->getRoles();
        $authRole = $auth->getRoles();
        $serviceManagerRoles = [
            'ROLE_SERVICE_MANAGER',
            'ROLE_SERVICE_ADVISOR',
            'ROLE_TECHNICIAN',
            'ROLE_PARTS_ADVISOR',
        ];
        $salesManagerRoles = ['ROLE_SALES_MANAGER', 'ROLE_SALES_AGENT'];
        //check if user has permission
        if (!($user->getId() == $auth->getId(
                )) && !('ROLE_ADMIN' == $authRole[0]) && !('ROLE_SERVICE_MANAGER' == $authRole[0] && in_array(
                    $userRole[0],
                    $serviceManagerRoles
                )) && !('ROLE_SALES_MANAGER' == $authRole[0] && in_array($userRole[0], $salesManagerRoles))) {
            return $this->handleView(
                $this->view('Authenticated User Has No Permission to Perform This Action', Response::HTTP_FORBIDDEN)
            );
        }

        //set security question and answer
        $user->setSecurityQuestion($question)
             ->setSecurityAnswer($userHelper->passwordEncoder($user, strtolower($answer)));

        $em->persist($user);
        $em->flush();

        return $this->handleView(
            $this->view(
                [
                    'message' => 'Security Question Has Been Updated',
                ],
                Response::HTTP_OK
            )
        );
    }

    /**
     * @Rest\Post("/api/security/get-security-question")
     *
     * @SWG\Tag(name="Security")
     * @SWG\Post(description="Return Security Question")
     *
     * @SWG\Parameter(
     *     name="email",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Email of the User",
     * )
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return Security Question",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="security question", example={"status":
     *                                              "What is your name?" }),
     *         )
     * )
     *
     * @SWG\Response(
     *     response="400",
     *     description="Missing Required Parameter"
     * )
     * @SWG\Response(
     *     response="406",
     *     description="Invalid Email Parameter"
     * )
     *
     * @return Response
     */
    public function getSecurityQuestion(Request $request, UserRepository $userRepo)
    {
        $email = $request->get('email');

        // check if parameter is valid
        if (!$email) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        // email is invalid
        $user = $userRepo->findOneBy(['email' => $email, 'active' => true]);
        if (!$user) {
            return $this->handleView($this->view('Invalid Email Parameter', Response::HTTP_NOT_ACCEPTABLE));
        }

        return $this->handleView(
            $this->view(
                [
                    'securityQuestion' => $user->getSecurityQuestion(),
                ],
                Response::HTTP_OK
            )
        );
    }

    /**
     * @Rest\Patch("/api/security/reset-password")
     *
     * @SWG\Tag(name="Security")
     * @SWG\Patch(description="Reset User Password")
     *
     * @SWG\Parameter(
     *     name="token",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Reset Password Token of the User",
     * )
     * @SWG\Parameter(
     *     name="password",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The New Password of the User",
     * )
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "Password Has Been Reset" }),
     *         )
     * )
     *
     * @SWG\Response(
     *     response="400",
     *     description="Missing Required Parameter"
     * )
     *
     * @SWG\Response(
     *     response="401",
     *     description="Invalid Token"
     * )
     *
     * @SWG\Response(
     *     response="500",
     *     description="Something Went Wrong Trying to Reset the Password"
     * )
     *
     * @return Response
     */
    public function resetPassword(Request $request, SecurityHelper $securityHelper, UserRepository $userRepo)
    {
        $token = $request->get('token');
        $password = $request->get('password');

        // check if parameter is valid
        if (!$password || !$token) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        // token is invalid
        if (!$securityHelper->validateToken($token)) {
            return $this->handleView($this->view('Invalid Token', Response::HTTP_UNAUTHORIZED));
        }

        if (!$securityHelper->resetPassword($token, $password)) {
            return $this->handleView(
                $this->view(
                    'Something Went Wrong Trying to Reset the Password',
                    Response::HTTP_INTERNAL_SERVER_ERROR
                )
            );
        }

        return $this->handleView(
            $this->view(
                [
                    'message' => 'Password Has Been Reset',
                ],
                Response::HTTP_OK
            )
        );
    }
}
