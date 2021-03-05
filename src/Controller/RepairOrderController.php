<?php

namespace App\Controller;

use App\Entity\RepairOrder;
use App\Entity\RepairOrderInteraction;
use App\Helper\FalsyTrait;
use App\Repository\RepairOrderRepository;
use App\Repository\UserRepository;
use App\Response\ValidationResponse;
use App\Service\MyReviewHelper;
use App\Service\Pagination;
use App\Service\RepairOrderHelper;
use App\Service\SettingsHelper;
use App\Service\ShortUrlHelper;
use App\Service\TwilioHelper;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Knp\Component\Pager\PaginatorInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\CssSelector\Exception\InternalErrorException;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * @Rest\Route("/api/repair-order")
 * @SWG\Tag(name="Repair Order")
 */
class RepairOrderController extends AbstractFOSRestController
{
    private const PAGE_LIMIT = 50;

    use FalsyTrait;

    /**
     * @Rest\Get(name="getRepairOrders")
     *
     * @SWG\Parameter(name="page", type="integer", in="query")
     * @SWG\Parameter(
     *     name="pageLimit",
     *     type="integer",
     *     description="Page Limit",
     *     in="query"
     * )
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
     *     name="needsVideo",
     *     type="boolean",
     *     description="Only return ROs that do not have a video. NOTE: Will ignore all other filters",
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
     *     description="The available fields are [number, year, make, model, miles, vin] of RepairOrder, [name, phone, email] of primaryCustomer, [name, email, phone] of primaryAdvisor and primaryTechnician",
     *     in="query"
     * )
     *
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(
     *         type="object",
     *         @SWG\Property(
     *             property="items",
     *             type="array",
     *             @SWG\Items(ref=@Model(type=RepairOrder::class, groups=RepairOrder::GROUPS))
     *         ),
     *         @SWG\Property(property="next", type="string", description="URL of next page of results or null"),
     *         @SWG\Property(property="prev", type="string", description="URL of previous page of results or null"),
     *         @SWG\Property(property="total", type="integer", description="Total number of items for query")
     *     )
     * )
     * @SWG\Response(response="404", description="Invalid page parameter")
     * @SWG\Response(response="406", ref="#/responses/ValidationResponse")
     */
    public function getAll(
        Request $request,
        RepairOrderRepository $repairOrderRepo,
        PaginatorInterface $paginator,
        UrlGeneratorInterface $urlGenerator,
        UserRepository $userRepo,
        EntityManagerInterface $em
    ): Response {
        $page = $request->query->getInt('page', 1);
        $startDate = $request->query->get('startDate');
        $endDate = $request->query->get('endDate');
        $pageLimit = $request->query->getInt('pageLimit', self::PAGE_LIMIT);
        $urlParameters = [];
        $errors = [];
        $sortField = $sortDirection = $searchTerm = null;
        $inputFields = ['open', 'waiter', 'internal', 'needsVideo'];
        $fields = [];

        foreach ($inputFields as $field) {
            if ($request->query->has($field)) {
                $fields[$field] = $this->paramToBool($request->query->get($field));
                $urlParameters[$field] = $fields[$field];
            } else {
                $fields[$field] = null;
            }
        }

        if ($page < 1) {
            throw new NotFoundHttpException();
        }

        $columns = $em->getClassMetadata('App\Entity\RepairOrder')->getFieldNames();

        if ($request->query->has('sortField') && $request->query->has('sortDirection')) {
            $sortField = $request->query->get('sortField');

            //check if the sortField exist
            if (!in_array($sortField, $columns)) {
                $errors['sortField'] = 'Invalid sort field name';
            }

            $sortDirection = $request->query->get('sortDirection');
            $urlParameters['sortDirection'] = $sortDirection;
            $urlParameters['sortField'] = $sortField;
        }

        if (!empty($errors)) {
            return new ValidationResponse($errors);
        }

        if ($request->query->has('searchTerm')) {
            $searchTerm = $request->query->get('searchTerm');
        }

        $user = $this->getUser();

        if ($request->get('needsVideo')) {
            $items = $repairOrderRepo->findByNeedsVideo($user, $sortField, $sortDirection, $searchTerm);
        } else {
            $items = $repairOrderRepo->getAllItems(
                $user,
                $userRepo,
                $startDate,
                $endDate,
                $sortField,
                $sortDirection,
                $searchTerm,
                $fields
            );
        }

        $pageLimit = $request->query->getInt('pageLimit', self::PAGE_LIMIT);

        if ($searchTerm) {
            $urlParameters['searchTerm'] = $searchTerm;
        }
        $pager = $paginator->paginate($items, $page, $pageLimit);
        $pagination = new Pagination($pager, $pageLimit, $urlGenerator);

        $view = $this->view(
            [
                'results' => $pager->getItems(),
                'totalResults' => $pagination->totalResults,
                'totalPages' => $pagination->totalPages,
                'previous' => $pagination->getPreviousPageURL('getRepairOrders', $urlParameters),
                'currentPage' => $pagination->currentPage,
                'next' => $pagination->getNextPageURL('getRepairOrders', $urlParameters),
            ]
        );

        $view->getContext()->setGroups(RepairOrder::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Get("/{id}", name="getRepairOrder")
     *
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(ref=@Model(type=RepairOrder::class, groups=RepairOrder::GROUPS))
     * )
     * @SWG\Response(response="404", description="RO does not exist")
     */
    public function getOne(RepairOrder $repairOrder): Response
    {
        if ($repairOrder->getDeleted()) {
            throw new NotFoundHttpException();
        }

        $view = $this->view($repairOrder);
        $view->getContext()->setGroups(RepairOrder::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Get("/link-hash/{linkHash}", name="getRepairOrderByLinkHash")
     *
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(ref=@Model(type=RepairOrder::class, groups=RepairOrder::GROUPS))
     * )
     * @SWG\Response(response="404", description="RO does not exist")
     */
    public function getByLinkHash(string $linkHash, RepairOrderRepository $repairOrderRepo): Response
    {
        if (!$linkHash) {
            throw new NotFoundHttpException();
        }

        $repairOrder = $repairOrderRepo->findByUID($linkHash);
        if (!$repairOrder) {
            throw new NotFoundHttpException();
        }

        if ($repairOrder->getDeleted()) {
            throw new NotFoundHttpException();
        }

        $view = $this->view($repairOrder);
        $view->getContext()->setGroups(RepairOrder::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Post
     *
     * @SWG\Parameter(name="customerName", type="string", in="formData", required=true)
     * @SWG\Parameter(name="customerPhone", type="string", in="formData", required=true)
     * @SWG\Parameter(name="skipMobileVerification", type="boolean", in="formData")
     * @SWG\Parameter(name="advisor", type="integer", in="formData")
     * @SWG\Parameter(name="technician", type="integer", in="formData")
     * @SWG\Parameter(name="number", type="string", in="formData", required=true)
     * @SWG\Parameter(name="startValue", type="number", in="formData")
     * @SWG\Parameter(name="waiter", type="boolean", in="formData")
     * @SWG\Parameter(name="internal", type="boolean", in="formData")
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
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(type="object", ref=@Model(type=RepairOrder::class, groups=RepairOrder::GROUPS))
     * )
     * @SWG\Response(response="406", ref="#/responses/ValidationResponse")
     *
     * @throws Exception
     */
    public function add(
        Request $req,
        RepairOrderHelper $helper,
        EntityManagerInterface $em,
        TwilioHelper $twilioHelper,
        ShortUrlHelper $shortUrlHelper,
        SettingsHelper $settingsHelper,
        ParameterBagInterface $parameterBag
    ): Response {
        $ro = $helper->addRepairOrder($req->request->all());
        $waiverActivateAuthMessage = $settingsHelper->getSetting('waiverActivateAuthMessage');
        $waiverIntroText = $settingsHelper->getSetting('waiverIntroText');
        $welcomeMessage = $settingsHelper->getSetting('serviceTextIntro');
        $customerURL = $parameterBag->get('customer_url');

        if (is_array($ro)) {
            return new ValidationResponse($ro);
        }

        // Send waiver or intro message
        try {
            // waiver disabled so send regular text
            if (!$waiverActivateAuthMessage) {
                $twilioHelper->sendSms($ro->getPrimaryCustomer(), $welcomeMessage);
            } else {
                // waiver enabled
                $url = $customerURL.$ro->getLinkHash();
                $shortUrl = $shortUrlHelper->generateShortUrl($url);
                $waiverMessage = $waiverIntroText .' '.$shortUrl;

                $twilioHelper->sendSms($ro->getPrimaryCustomer(), $waiverMessage);

                $roInteraction = new RepairOrderInteraction();
                $roInteraction->setRepairOrder($ro)
                              ->setUser($this->getUser())
                              ->setType('Waiver Sent');
                $em->persist($roInteraction);
                $em->flush();
            }
        } catch (Exception $e) {
            throw new InternalErrorException($e);
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
     * @SWG\Response(response="406", ref="#/responses/ValidationResponse")
     * @SWG\Parameter(name="advisor", type="integer", in="formData")
     * @SWG\Parameter(name="technician", type="integer", in="formData")
     * @SWG\Parameter(name="startValue", type="number", in="formData")
     * @SWG\Parameter(name="waiter", type="boolean", in="formData")
     * @SWG\Parameter(name="internal", type="boolean", in="formData")
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
     * @return Response
     */
    public function update(RepairOrder $ro, Request $req, RepairOrderHelper $helper): Response
    {
        if ($ro->getDeleted()) {
            throw new NotFoundHttpException();
        }
        $errors = $helper->updateRepairOrder($req->request->all(), $ro);
        if (!empty($errors)) {
            return new ValidationResponse($errors);
        }

        $view = $this->view($ro);
        $view->getContext()->setGroups(RepairOrder::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Delete("/{id}")
     *
     * @SWG\Response(response="200", description="Success!")
     * @SWG\Response(response="404", description="RO does not exist")
     */
    public function delete(RepairOrder $ro, RepairOrderHelper $helper): Response
    {
        if ($ro->getDeleted()) {
            throw new NotFoundHttpException();
        }
        $helper->deleteRepairOrder($ro);

        return $this->handleView(
            $this->view(
                [
                    'message' => 'RO Deleted',
                ]
            )
        );
    }

    /**
     * @Rest\Put("/{id}/archive")
     * @SWG\Response(response="200", description="Success!")
     * @SWG\Response(response="400", description="RO is already archived")
     * @SWG\Response(response="404", description="RO does not exist")
     */
    public function archive(RepairOrder $ro, RepairOrderHelper $helper): Response
    {
        if ($ro->getDeleted()) {
            throw new NotFoundHttpException();
        }
        if ($ro->isArchived() === true) {
            return $this->handleView(
                $this->view(
                    [
                        'message' => 'RO already archived',
                    ],
                    Response::HTTP_BAD_REQUEST
                )
            );
        }
        $helper->archiveRepairOrder($ro);

        return $this->handleView(
            $this->view(
                [
                    'message' => 'RO Archived',
                ]
            )
        );
    }

    /**
     * @Rest\Put("/{id}/close")
     * @SWG\Response(response="200", description="Success!")
     * @SWG\Response(response="400", description="RO is already closed")
     * @SWG\Response(response="404", description="RO does not exist")
     */
    public function close(
        RepairOrder $ro,
        RepairOrderHelper $helper,
        MyReviewHelper $myReviewHelper,
        SettingsHelper $settingsHelper
    ): Response {
        if ($ro->getDeleted()) {
            throw new NotFoundHttpException();
        }

        if ($ro->isClosed() === true) {
            return $this->handleView(
                $this->view(
                    [
                        'message' => 'RO already closed',
                    ],
                    Response::HTTP_BAD_REQUEST
                )
            );
        }
        $helper->closeRepairOrder($ro);

        //if myReviewActivated is true, proceed with review action
        $isMyReviewActivated = $settingsHelper->getSetting('myReviewActivated');
        if ($isMyReviewActivated) {
            $user = $this->getUser();
            $myReviewHelper->new($ro, $user);
        }

        return $this->handleView(
            $this->view(
                [
                    'message' => 'RO Closed',
                ]
            )
        );
    }

    /**
     * @Rest\Get("/repair-order-numbers/suggested")
     *
     * @SWG\Tag(name="Repair Order")
     * @SWG\Get(description="Get suggested RepairOrder numbers based on the current naming convention")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return suggested numbers",
     *     @SWG\Items(
     *         type="array",
     *         @SWG\Items(type="integer", description="suggested"),
     *
     *     )
     * )
     */
    public function suggestedRepairOrderNumbers(RepairOrderHelper $repairOrderHelper): Response
    {
        $result = $repairOrderHelper->getSuggestedRoNumbers();

        $view = $this->view($result);

        return $this->handleView($view);
    }
}
