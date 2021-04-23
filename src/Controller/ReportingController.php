<?php

namespace App\Controller;

use App\Entity\RepairOrder;
use App\Entity\RepairOrderVideo;
use App\Entity\RepairOrderVideoInteraction;
use App\Entity\User;
use App\Repository\MPITemplateRepository;
use App\Repository\RepairOrderMPIRepository;
use App\Repository\RepairOrderQuoteRepository;
use App\Repository\RepairOrderRepository;
use App\Repository\ServiceSMSRepository;
use App\Repository\UserRepository;
use App\Service\Pagination;
use App\Service\ServiceSMSHelper;
use DateInterval;
use DatePeriod;
use DateTime;
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

class ReportingController extends AbstractFOSRestController
{
    private const PAGE_LIMIT = 100;

    /**
     * @Rest\Get("/api/reporting/archive")
     * @SWG\Tag(name="Reporting")
     *
     * @SWG\Parameter(
     *      name="startDate",
     *      type="string",
     *      format="date-time",
     *      in="query"
     * )
     *
     * @SWG\Parameter(
     *      name="endDate",
     *      type="string",
     *      format="date-time",
     *      in="query"
     * )
     *
     * @SWG\Parameter(name="page", type="integer", in="query")
     *
     * @SWG\Parameter(
     *     name="pageLimit",
     *     type="integer",
     *     in="query"
     * )
     *
     * @SWG\Parameter(
     *     name="sortField",
     *     type="string",
     *     description="The name of sort field (Repair Order columns)",
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
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(
     *         type="object",
     *         @SWG\Property(
     *             property="results",
     *             type="array",
     *             @SWG\Items(ref=@Model(type=RepairOrder::class, groups=RepairOrder::GROUPS))
     *         ),
     *         @SWG\Property(property="sumOfStartValues", type="integer", description="Sum # of start values"),
     *         @SWG\Property(property="sumOfFinalValues", type="integer", description="Sum # of final values"),
     *         @SWG\Property(property="totalUpsell", type="integer", description="Total # of upsell"),
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
     */
    public function archive(
        Request $request,
        RepairOrderRepository $roRepo,
        PaginatorInterface $paginator,
        UrlGeneratorInterface $urlGenerator,
        EntityManagerInterface $em
    ): Response {
        $page = $request->query->getInt('page', 1);
        $startDate = $request->query->get('startDate');
        $endDate = $request->query->get('endDate');
        $pageLimit = $request->query->getInt('pageLimit', self::PAGE_LIMIT);
        $urlParameters = [];
        $sortField = '';
        $sortDirection = '';
        $errors = [];

        $columns = $em->getClassMetadata('App\Entity\RepairOrder')->getFieldNames();

        // Invalid page
        if ($page < 1) {
            throw new NotFoundHttpException();
        }

        // Invalid page limit
        if ($pageLimit < 1) {
            return $this->handleView($this->view('Invalid Page Limit', Response::HTTP_BAD_REQUEST));
        }

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

        $result = $roRepo->getAllArchives(
            $startDate,
            $endDate,
            $sortField,
            $sortDirection
        );

        $sumOfStartValues = 0;
        $sumOfFinalValues = 0;
        foreach ($result as $ro) {
            $sumOfStartValues += $ro->getStartValue();
            $sumOfFinalValues += $ro->getFinalValue();
        }

        $totalUpsell = round($sumOfFinalValues - $sumOfStartValues, 2);

        $pager = $paginator->paginate($result, $page, $pageLimit);
        $pagination = new Pagination($pager, $pageLimit, $urlGenerator);

        $json = [
            'results' => $pager->getItems(),
            'sumOfStartValues' => round($sumOfStartValues, 2),
            'sumOfFinalValues' => round($sumOfFinalValues, 2),
            'totalUpsell' => $totalUpsell,
            'totalResults' => $pagination->totalResults,
            'totalPages' => $pagination->totalPages,
            'previous' => $pagination->getPreviousPageURL('app_reporting_archive', $urlParameters),
            'currentPage' => $pagination->currentPage,
            'next' => $pagination->getNextPageURL('app_reporting_archive', $urlParameters),
        ];

        $view = $this->view($json);

        $view->getContext()->setGroups(RepairOrder::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Get("/api/reporting/advisors-usage")
     * @SWG\Tag(name="Reporting")
     *
     * @SWG\Parameter(
     *      name="startDate",
     *      type="string",
     *      format="date-time",
     *      in="query"
     * )
     *
     * @SWG\Parameter(
     *      name="endDate",
     *      type="string",
     *      format="date-time",
     *      in="query"
     * )
     *
     * @SWG\Parameter(name="page", type="integer", in="query")
     *
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
     *     in="query",
     *     enum={"serviceAdvisorName", "totalUnreadMessages", "totalClosedRepairOrders", "totalVideos", "totalVideoViews", "totalSentQuotes", "totalViewedQuotes", "totalCompletedQuotes", "totalInboundTxtMsgs", "totalOutboundTxtMsgs"}
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
     * @SWG\Response(
     *     response="200",
     *     description="Returns the list of Service Advisors and what they have done in the passed date range based upon repair orders that were closed",
     *     @SWG\Schema(
     *          type="object",
     *          @SWG\Property(
     *              property="results",
     *              type="array",
     *              @SWG\Items(
     *                  type="object",
     *                  @SWG\Property(
     *                      property="serviceAdvisor",
     *                      ref=@Model(type=User::class, groups={"user_list"}),
     *                      description="The service advisor"
     *                  ),
     *                  @SWG\Property(property="totalUnreadMessages", type="integer", description="The current # of unread sms messages from customers where they are the primaryAdvisor"),
     *                  @SWG\Property(property="totalClosedRepairOrders", type="integer", description="A # of repair orders that were closed in the given date range"),
     *                  @SWG\Property(property="totalVideos", type="integer", description="A # of videos for repair orders that have closed in the given date range"),
     *                  @SWG\Property(property="totalVideoViews", type="integer", description="A # of video views for repair orders that have closed in the given date range"),
     *                  @SWG\Property(property="totalSentQuotes", type="integer", description="A # of quotes sent for repair orders that have closed in the given date range"),
     *                  @SWG\Property(property="totalViewedQuotes", type="integer", description="A # of quotes that were viewed for repair orders that have closed in the given date range"),
     *                  @SWG\Property(property="totalCompletedQuotes", type="integer", description="A # of quotes that were completed by the customer for repair orers that have closed in the given date range"),
     *                  @SWG\Property(property="totalInboundTxtMsgs", type="integer", description="A # of total inbound text messages for repair orders that were closed in the given date range"),
     *                  @SWG\Property(property="totalOutboundTxtMsgs", type="integer", description="A # of total outbound text messages for repair orders that were closed in the given date range")
     *              )
     *          ),
     *          @SWG\Property(property="totalResults", type="integer", description="Total # of results found"),
     *          @SWG\Property(property="totalPages", type="integer", description="Total # of pages of results"),
     *          @SWG\Property(property="previous", type="string", description="URL for previous page"),
     *          @SWG\Property(property="currentPage", type="integer", description="Current page #"),
     *          @SWG\Property(property="next", type="string", description="URL for next page")
     *     )
     * )
     */
    public function advisorUsage(
        Request $request,
        RepairOrderRepository $roRepo,
        UserRepository $userRepo,
        ServiceSMSHelper $smsHelper,
        RepairOrderQuoteRepository $quoteRepo,
        PaginatorInterface $paginator,
        UrlGeneratorInterface $urlGenerator,
        EntityManagerInterface $em,
        ServiceSMSRepository $smsRepo
    ): Response {
        $page = $request->query->getInt('page', 1);
        $startDate = $request->query->get('startDate');
        $endDate = $request->query->get('endDate');
        $pageLimit = $request->query->getInt('pageLimit', self::PAGE_LIMIT);
        $urlParameters = [];
        $sortField = '';
        $sortDirection = '';
        $errors = [];

        $columns = ['serviceAdvisorName', 'totalUnreadMessages', 'totalClosedRepairOrders', 'totalVideos', 'totalVideoViews', 'totalSentQuotes', 'totalViewedQuotes', 'totalCompletedQuotes', 'totalInboundTxtMsgs', 'totalOutboundTxtMsgs'];

        // Invalid page
        if ($page < 1) {
            throw new NotFoundHttpException();
        }

        // Invalid page limit
        if ($pageLimit < 1) {
            return $this->handleView($this->view('Invalid Page Limit', Response::HTTP_BAD_REQUEST));
        }

        if ($request->query->has('sortField') && $request->query->has('sortDirection')) {
            $sortField = $request->query->get('sortField');

            //check if the sortField exist
            if (!in_array($sortField, $columns)) {
                $errors['sortField'] = 'Invalid sort field name';

                return new ValidationResponse($errors);
            }

            $sortDirection = $request->query->get('sortDirection');

            if ('serviceAdvisorName' === $sortField) {
                $serviceAdvisors = $userRepo->getUserByRole('ROLE_SERVICE_ADVISOR', 'firstName', $sortDirection);
            } else {
                $serviceAdvisors = $userRepo->findBy(['role' => 'ROLE_SERVICE_ADVISOR', 'active' => 1]);
            }

            $urlParameters['sortDirection'] = $sortDirection;
            $urlParameters['sortField'] = $sortField;
        } else {
            $serviceAdvisors = $userRepo->findBy(['role' => 'ROLE_SERVICE_ADVISOR', 'active' => 1]);
        }

        $closedRepairOrders = $roRepo->getAllArchives(
            $startDate,
            $endDate
        );

        $result = [];
        foreach ($serviceAdvisors as $sa) {
            $totalClosedRepairOrders = 0;
            $totalVideos = 0;
            $totalVideoViews = 0;
            $totalSentQuotes = 0;
            $totalViewedQuotes = 0;
            $totalCompletedQuotes = 0;
            $totalInboundTxtMsgs = 0;

            $advisorId = $sa->getId();
            $unread = $smsHelper->getUnReadMessagesByAdvisor($advisorId);
            $totalOutboundTxtMsgs = $smsHelper->getOutBoundMessagesByAdvisor($advisorId);

            foreach ($closedRepairOrders as $ro) {
                if ($advisorId != $ro->getPrimaryAdvisor()->getId()) {
                    continue;
                }

                ++$totalClosedRepairOrders;

                $videos = $ro->getVideos();
                $totalVideos += count($videos);

                /** @var RepairOrderVideo $video */
                foreach ($videos as $video) {
                    /** @var RepairOrderVideoInteraction $interaction */
                    foreach ($video->getInteractions() as $interaction) {
                        if ('Viewed' == $interaction->getType()) {
                            ++$totalVideoViews;
                        }
                    }
                }

                $quotes = $quoteRepo->findBy(['repairOrder' => $ro->getId()]);
                foreach ($quotes as $quote) {
                    if ($quote->getDateSent()) {
                        ++$totalSentQuotes;
                    }
                    if ($quote->getDateCustomerViewed()) {
                        ++$totalViewedQuotes;
                    }
                    if ($quote->getDateCompleted()) {
                        ++$totalCompletedQuotes;
                    }
                }

                $totalInboundTxtMsgs += $smsHelper->getInBoundMessagesByAdvisor($advisorId, $ro->getPrimaryCustomer()->getId(), $ro->getDateCreated(), $ro->getDateClosed());
            }

            $result[] = [
                'serviceAdvisor' => $sa,
                'totalUnreadMessages' => $unread,
                'totalClosedRepairOrders' => $totalClosedRepairOrders,
                'totalVideos' => $totalVideos,
                'totalVideoViews' => $totalVideoViews,
                'totalSentQuotes' => $totalSentQuotes,
                'totalViewedQuotes' => $totalViewedQuotes,
                'totalCompletedQuotes' => $totalCompletedQuotes,
                'totalInboundTxtMsgs' => $totalInboundTxtMsgs,
                'totalOutboundTxtMsgs' => $totalOutboundTxtMsgs,
            ];
        }
        if ($request->query->has('sortField') && $request->query->has('sortDirection') && 'serviceAdvisorName' !== $sortField) {
            $result = $this->sortByField($result, $sortField, $sortDirection);
        }

        $pager = $paginator->paginate($result, $page, $pageLimit);
        $pagination = new Pagination($pager, $pageLimit, $urlGenerator);

        $json = [
            'results' => $pager->getItems(),
            'totalResults' => $pagination->totalResults,
            'totalPages' => $pagination->totalPages,
            'previous' => $pagination->getPreviousPageURL('app_reporting_advisor_usage', $urlParameters),
            'currentPage' => $pagination->currentPage,
            'next' => $pagination->getNextPageURL('app_reporting_advisor_usage', $urlParameters),
        ];

        $view = $this->view($json);
        $view->getContext()->setGroups(['user_list']);

        return $this->handleView($view);
    }

    /**
     * @Rest\Get("/api/reporting/advisors")
     * @SWG\Tag(name="Reporting")
     *
     * @SWG\Parameter(
     *      name="startDate",
     *      type="string",
     *      format="date-time",
     *      in="query"
     * )
     *
     * @SWG\Parameter(
     *      name="endDate",
     *      type="string",
     *      format="date-time",
     *      in="query"
     * )
     *
     * @SWG\Parameter(name="page", type="integer", in="query")
     *
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
     *     in="query",
     *     enum={"serviceAdvisorName", "totalClosedRepairOrders", "totalAppraise", "totalStartValues", "totalFinalValues", "totalUpsellAmount", "totalUpsellPercentage", "totalVideos", "sumFinalValuesWithVideo", "sumFinalValuesWithoutVideo"}
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
     * @SWG\Response(
     *     response="200",
     *     description="Returns the list of Service Advisors and data relating to repair orders assigned to them that are closed",
     *     @SWG\Schema(
     *          type="object",
     *          @SWG\Property(
     *              property="results",
     *              type="array",
     *              @SWG\Items(
     *                   type="object",
     *                   @SWG\Property(
     *                       property="serviceAdvisor",
     *                       ref=@Model(type=User::class, groups={"user_list"}),
     *                       description="The service advisor"
     *                   ),
     *                   @SWG\Property(property="totalClosedRepairOrders", type="integer", description="The # of repair orders closed in the given date range"),
     *                   @SWG\Property(property="totalAppraise", type="integer", description="The # of appraise my car clicks (make 0 for now)"),
     *                   @SWG\Property(property="totalStartValues", type="integer", description="$ SUM of all the start values for repair orders closed in the given date range"),
     *                   @SWG\Property(property="totalFinalValues", type="integer", description="$ SUM of all the final values for repair orders closed in the given date range"),
     *                   @SWG\Property(property="totalUpsellAmount", type="integer", description="$ upsell amounts (sum of final values - sum of start values) for repair orders closed in the given date range"),
     *                   @SWG\Property(property="totalUpsellPercentage", type="integer", description="% upsell percentage (sum final values / sum start values) < as a percentage"),
     *                   @SWG\Property(property="totalVideos", type="integer", description="The # of total videos created for repair orders closed in the given date range"),
     *                   @SWG\Property(property="sumFinalValuesWithVideo", type="integer", description="$ (sum of final values for repair orders with at least one video / # of repair orders with at least one video) for repair orders closed in the given date range"),
     *                   @SWG\Property(property="sumFinalValuesWithoutVideo", type="integer", description="$ (sum of final values for repair orders WITHOUT a video / # of repair orders WITHOUT at least one video) for repair orders closed in the given date range")
     *              )
     *          ),
     *          @SWG\Property(property="totalResults", type="integer", description="Total # of results found"),
     *          @SWG\Property(property="totalPages", type="integer", description="Total # of pages of results"),
     *          @SWG\Property(property="previous", type="string", description="URL for previous page"),
     *          @SWG\Property(property="currentPage", type="integer", description="Current page #"),
     *          @SWG\Property(property="next", type="string", description="URL for next page")
     *     )
     * )
     */
    public function advisor(
        Request $request,
        RepairOrderRepository $roRepo,
        UserRepository $userRepo,
        RepairOrderQuoteRepository $quoteRepo,
        PaginatorInterface $paginator,
        UrlGeneratorInterface $urlGenerator,
        EntityManagerInterface $em
    ): Response {
        $page = $request->query->getInt('page', 1);
        $startDate = $request->query->get('startDate');
        $endDate = $request->query->get('endDate');
        $pageLimit = $request->query->getInt('pageLimit', self::PAGE_LIMIT);
        $urlParameters = [];
        $sortField = '';
        $sortDirection = '';
        $errors = [];

        $columns = ['serviceAdvisorName', 'totalClosedRepairOrders', 'totalAppraise', 'totalStartValues', 'totalFinalValues', 'totalUpsellAmount', 'totalUpsellPercentage', 'totalVideos', 'sumFinalValuesWithVideo', 'sumFinalValuesWithoutVideo'];

        // Invalid page
        if ($page < 1) {
            throw new NotFoundHttpException();
        }

        // Invalid page limit
        if ($pageLimit < 1) {
            return $this->handleView($this->view('Invalid Page Limit', Response::HTTP_BAD_REQUEST));
        }

        if ($request->query->has('sortField') && $request->query->has('sortDirection')) {
            $sortField = $request->query->get('sortField');

            //check if the sortField exist
            if (!in_array($sortField, $columns)) {
                $errors['sortField'] = 'Invalid sort field name';

                return new ValidationResponse($errors);
            }

            $sortDirection = $request->query->get('sortDirection');

            if ('serviceAdvisorName' === $sortField) {
                $serviceAdvisors = $userRepo->getUserByRole('ROLE_SERVICE_ADVISOR', 'firstName', $sortDirection);
            } else {
                $serviceAdvisors = $userRepo->findBy(['role' => 'ROLE_SERVICE_ADVISOR', 'active' => 1]);
            }

            $urlParameters['sortDirection'] = $sortDirection;
            $urlParameters['sortField'] = $sortField;
        } else {
            $serviceAdvisors = $userRepo->findBy(['role' => 'ROLE_SERVICE_ADVISOR', 'active' => 1]);
        }

        $closedRepairOrders = $roRepo->getAllArchives(
            $startDate,
            $endDate
        );

        $result = [];
        foreach ($serviceAdvisors as $sa) {
            $totalClosedRepairOrders = 0;
            $totalAppraise = 0;
            $totalStartValues = 0;
            $totalFinalValues = 0;
            $totalUpsellPercentage = 0;

            $sumFinalValuesWithVideo = 0;
            $roCountWithVideo = 0;

            $sumFinalValuesWithoutVideo = 0;
            $roCountWithoutVideo = 0;

            $totalVideos = 0;

            foreach ($closedRepairOrders as $ro) {
                if ($sa->getId() === $ro->getPrimaryAdvisor()->getId()) {
                    ++$totalClosedRepairOrders;
                    $totalStartValues += $ro->getStartValue();
                    $totalFinalValues += $ro->getFinalValue();

                    $videosCount = count($ro->getVideos());
                    $totalVideos += $videosCount;

                    if ($videosCount) {
                        $sumFinalValuesWithVideo += $ro->getFinalValue();
                        ++$roCountWithVideo;
                    } else {
                        $sumFinalValuesWithoutVideo += $ro->getFinalValue();
                        ++$roCountWithoutVideo;
                    }
                }
            }

            $totalUpsellAmount = round($totalFinalValues - $totalStartValues, 2);

            if ($totalStartValues) {
                $totalUpsellPercentage = round(($totalFinalValues / $totalStartValues) * 100);
            }

            if ($roCountWithVideo) {
                $sumFinalValuesWithVideo = round($sumFinalValuesWithVideo / $roCountWithVideo, 2);
            }

            if ($roCountWithoutVideo) {
                $sumFinalValuesWithoutVideo = round($sumFinalValuesWithoutVideo / $roCountWithoutVideo, 2);
            }

            $result[] = [
                'serviceAdvisor' => $sa,
                'totalClosedRepairOrders' => $totalClosedRepairOrders,
                'totalAppraise' => $totalAppraise,
                'totalStartValues' => round($totalStartValues, 2),
                'totalFinalValues' => round($totalFinalValues, 2),
                'totalUpsellAmount' => $totalUpsellAmount,
                'totalUpsellPercentage' => $totalUpsellPercentage,
                'totalVideos' => $totalVideos,
                'sumFinalValuesWithVideo' => $sumFinalValuesWithVideo,
                'sumFinalValuesWithoutVideo' => $sumFinalValuesWithoutVideo,
            ];
        }
        if ($request->query->has('sortField') && $request->query->has('sortDirection') && 'serviceAdvisorName' !== $sortField) {
            $result = $this->sortByField($result, $sortField, $sortDirection);
        }

        $pager = $paginator->paginate($result, $page, $pageLimit);
        $pagination = new Pagination($pager, $pageLimit, $urlGenerator);

        $json = [
            'results' => $pager->getItems(),
            'totalResults' => $pagination->totalResults,
            'totalPages' => $pagination->totalPages,
            'previous' => $pagination->getPreviousPageURL('app_reporting_advisor', $urlParameters),
            'currentPage' => $pagination->currentPage,
            'next' => $pagination->getNextPageURL('app_reporting_advisor', $urlParameters),
        ];

        $view = $this->view($json);
        $view->getContext()->setGroups(['user_list']);

        return $this->handleView($view);
    }

    /**
     * @Rest\Get("/api/reporting/technicians")
     * @SWG\Tag(name="Reporting")
     *
     * @SWG\Parameter(
     *      name="startDate",
     *      type="string",
     *      format="date-time",
     *      in="query"
     * )
     *
     * @SWG\Parameter(
     *      name="endDate",
     *      type="string",
     *      format="date-time",
     *      in="query"
     * )
     *
     * @SWG\Parameter(name="page", type="integer", in="query")
     *
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
     *     in="query",
     *     enum={"technicianName", "totalClosedRepairOrders", "totalStartValues", "totalFinalValues", "totalUpsellAmount", "totalUpsellPercentage", "totalVideos", "sumFinalValuesWithVideo", "sumFinalValuesWithoutVideo", "totalNoVideosRecorded"}
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
     * @SWG\Response(
     *     response="200",
     *     description="Returns the list of technicians with metrics relating to how they have performed",
     *     @SWG\Schema(
     *          type="object",
     *          @SWG\Property(
     *              property="results",
     *              type="array",
     *              @SWG\Items(
     *                   type="object",
     *                   @SWG\Property(
     *                       property="technician",
     *                       ref=@Model(type=User::class, groups={"user_list"}),
     *                       description="The technician"
     *                   ),
     *                   @SWG\Property(property="totalClosedRepairOrders", type="integer", description="The # of repair orders where they are the primary technciain on repair orders that have been closed in the given date range"),
     *                   @SWG\Property(property="totalStartValues", type="integer", description="$ SUM of all start values for repair orders closed in a given date range"),
     *                   @SWG\Property(property="totalFinalValues", type="integer", description="$ SUM of all final values for repair orders closed in a given date range"),
     *                   @SWG\Property(property="totalUpsellAmount", type="integer", description="$ upsell amounts (SUM final values - SUM start values) for repair orders closed in the given date range"),
     *                   @SWG\Property(property="totalUpsellPercentage", type="integer", description="% Upsell Percentage (sum final values / sum start values) < as a percentage"),
     *                   @SWG\Property(property="totalVideos", type="integer", description="The # total videos performed by this technician on repair orders that have closed in the given date range"),
     *                   @SWG\Property(property="sumFinalValuesWithVideo", type="integer", description="$ (sum of final values for repair orders with at least one video / # of repair orders with at least one video) for repair orders closed in the given date range"),
     *                   @SWG\Property(property="sumFinalValuesWithoutVideo", type="integer", description="$ (sum of final values for repair orders WITHOUT a video / # of repair orders WITHOUT at least one video) for repair orders closed in the given date range"),
     *                   @SWG\Property(property="totalNoVideosRecorded", type="integer", description="The # of repair orders where no videos were recorded for repair orders that were closed in the given date range")
     *              )
     *          ),
     *          @SWG\Property(property="totalResults", type="integer", description="Total # of results found"),
     *          @SWG\Property(property="totalPages", type="integer", description="Total # of pages of results"),
     *          @SWG\Property(property="previous", type="string", description="URL for previous page"),
     *          @SWG\Property(property="currentPage", type="integer", description="Current page #"),
     *          @SWG\Property(property="next", type="string", description="URL for next page")
     *     )
     * )
     */
    public function technicians(
        Request $request,
        RepairOrderRepository $roRepo,
        UserRepository $userRepo,
        RepairOrderQuoteRepository $quoteRepo,
        PaginatorInterface $paginator,
        UrlGeneratorInterface $urlGenerator,
        EntityManagerInterface $em
    ): Response {
        $page = $request->query->getInt('page', 1);
        $startDate = $request->query->get('startDate');
        $endDate = $request->query->get('endDate');
        $pageLimit = $request->query->getInt('pageLimit', self::PAGE_LIMIT);
        $urlParameters = [];
        $sortField = '';
        $sortDirection = '';
        $errors = [];

        $columns = ['technicianName', 'totalClosedRepairOrders', 'totalStartValues', 'totalFinalValues', 'totalUpsellAmount', 'totalUpsellPercentage', 'totalVideos', 'sumFinalValuesWithVideo', 'sumFinalValuesWithoutVideo', 'totalNoVideosRecorded'];

        // Invalid page
        if ($page < 1) {
            throw new NotFoundHttpException();
        }

        // Invalid page limit
        if ($pageLimit < 1) {
            return $this->handleView($this->view('Invalid Page Limit', Response::HTTP_BAD_REQUEST));
        }

        if ($request->query->has('sortField') && $request->query->has('sortDirection')) {
            $sortField = $request->query->get('sortField');

            //check if the sortField exist
            if (!in_array($sortField, $columns)) {
                $errors['sortField'] = 'Invalid sort field name';

                return new ValidationResponse($errors);
            }

            $sortDirection = $request->query->get('sortDirection');

            if ('technicianName' === $sortField) {
                $technicians = $userRepo->getUserByRole('ROLE_TECHNICIAN', 'firstName', $sortDirection);
            } else {
                $technicians = $userRepo->findBy(['role' => 'ROLE_TECHNICIAN', 'active' => 1]);
            }

            $urlParameters['sortDirection'] = $sortDirection;
            $urlParameters['sortField'] = $sortField;
        } else {
            $technicians = $userRepo->findBy(['role' => 'ROLE_TECHNICIAN', 'active' => 1]);
        }

        $closedRepairOrders = $roRepo->getAllArchives(
            $startDate,
            $endDate
        );

        $result = [];
        foreach ($technicians as $technician) {
            $totalClosedRepairOrders = 0;
            $totalStartValues = 0;
            $totalFinalValues = 0;
            $totalUpsellPercentage = 0;

            $sumFinalValuesWithVideo = 0;
            $roCountWithVideo = 0;

            $sumFinalValuesWithoutVideo = 0;
            $roCountWithoutVideo = 0;

            $totalVideos = 0;

            foreach ($closedRepairOrders as $ro) {
                if ($technician->getId() === $ro->getPrimaryTechnician()->getId()) {
                    ++$totalClosedRepairOrders;
                    $totalStartValues += $ro->getStartValue();
                    $totalFinalValues += $ro->getFinalValue();

                    $videosCount = count($ro->getVideos());
                    $totalVideos += $videosCount;

                    if ($videosCount) {
                        $sumFinalValuesWithVideo += $ro->getFinalValue();
                        ++$roCountWithVideo;
                    } else {
                        $sumFinalValuesWithoutVideo += $ro->getFinalValue();
                        ++$roCountWithoutVideo;
                    }
                }
            }

            $totalUpsellAmount = round($totalFinalValues - $totalStartValues, 2);

            if ($totalStartValues) {
                $totalUpsellPercentage = round(($totalFinalValues / $totalStartValues) * 100);
            }

            if ($roCountWithVideo) {
                $sumFinalValuesWithVideo = round($sumFinalValuesWithVideo / $roCountWithVideo, 2);
            }

            if ($roCountWithoutVideo) {
                $sumFinalValuesWithoutVideo = round($sumFinalValuesWithoutVideo / $roCountWithoutVideo, 2);
            }

            $result[] = [
                'technician' => $technician,
                'totalClosedRepairOrders' => $totalClosedRepairOrders,
                'totalStartValues' => round($totalStartValues, 2),
                'totalFinalValues' => round($totalFinalValues, 2),
                'totalUpsellAmount' => $totalUpsellAmount,
                'totalUpsellPercentage' => $totalUpsellPercentage,
                'totalVideos' => $totalVideos,
                'sumFinalValuesWithVideo' => $sumFinalValuesWithVideo,
                'sumFinalValuesWithoutVideo' => $sumFinalValuesWithoutVideo,
                'totalNoVideosRecorded' => $roCountWithoutVideo,
            ];
        }
        if ($request->query->has('sortField') && $request->query->has('sortDirection') && 'technicianName' !== $sortField) {
            $result = $this->sortByField($result, $sortField, $sortDirection);
        }

        $pager = $paginator->paginate($result, $page, $pageLimit);
        $pagination = new Pagination($pager, $pageLimit, $urlGenerator);

        $json = [
            'results' => $pager->getItems(),
            'totalResults' => $pagination->totalResults,
            'totalPages' => $pagination->totalPages,
            'previous' => $pagination->getPreviousPageURL('app_reporting_technician', $urlParameters),
            'currentPage' => $pagination->currentPage,
            'next' => $pagination->getNextPageURL('app_reporting_technician', $urlParameters),
        ];

        $view = $this->view($json);
        $view->getContext()->setGroups(['user_list']);

        return $this->handleView($view);
    }

    /**
     * @Rest\Get("/api/reporting/customer-engagements")
     * @SWG\Tag(name="Reporting")
     *
     * @SWG\Parameter(
     *      name="startDate",
     *      type="string",
     *      format="date-time",
     *      in="query"
     * )
     *
     * @SWG\Parameter(
     *      name="endDate",
     *      type="string",
     *      format="date-time",
     *      in="query"
     * )
     *
     * @SWG\Parameter(name="page", type="integer", in="query")
     *
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
     *     in="query",
     *     enum={"serviceAdvisorName", "totalAppraiseClicks", "totalFinanceClicks", "totalUnlockCouponClicks", "totalVideoViews", "totalInboundMessages", "totalOutboundMessages", "totalMessages"}
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
     * @SWG\Response(
     *     response="200",
     *     description="Returns a list of advisors with what customers have done on repair orders where they were the primary advisor",
     *     @SWG\Schema(
     *          type="object",
     *          @SWG\Property(
     *              property="results",
     *              type="array",
     *              @SWG\Items(
     *                   type="object",
     *                   @SWG\Property(
     *                       property="serviceAdvisor",
     *                       ref=@Model(type=User::class, groups={"user_list"}),
     *                       description="The service advisor"
     *                   ),
     *                   @SWG\Property(property="totalAppraiseClicks", type="integer", description="The # of appraise my car clicks (make 0 for now)"),
     *                   @SWG\Property(property="totalFinanceClicks", type="integer", description="The # of finance my repair clicks (make 0 for now)"),
     *                   @SWG\Property(property="totalUnlockCouponClicks", type="integer", description="The # of unlock coupon clicks (make 0 for now)"),
     *                   @SWG\Property(property="totalVideoViews", type="integer", description="The # of video plays for repair orders that have closed in the given date range (RepairOrderVidoeInteractions)"),
     *                   @SWG\Property(property="totalInboundMessages", type="integer", description="The # of inbound messages from customers for repair orders that have closed in a given date range. "),
     *                   @SWG\Property(property="totalOutboundMessages", type="integer", description="The # of outbound messages from the advisor for repair orders that have closed in a given date range"),
     *                   @SWG\Property(property="totalMessages", type="integer", description="The # of total messages (# of inbound + # of outbound)")
     *              )
     *          ),
     *          @SWG\Property(property="totalResults", type="integer", description="Total # of results found"),
     *          @SWG\Property(property="totalPages", type="integer", description="Total # of pages of results"),
     *          @SWG\Property(property="previous", type="string", description="URL for previous page"),
     *          @SWG\Property(property="currentPage", type="integer", description="Current page #"),
     *          @SWG\Property(property="next", type="string", description="URL for next page")
     *     )
     * )
     */
    public function customerEngagements(
        Request $request,
        RepairOrderRepository $roRepo,
        UserRepository $userRepo,
        ServiceSMSHelper $smsHelper,
        PaginatorInterface $paginator,
        UrlGeneratorInterface $urlGenerator,
        EntityManagerInterface $em,
        ServiceSMSRepository $smsRepo
    ): Response {
        $page = $request->query->getInt('page', 1);
        $startDate = $request->query->get('startDate');
        $endDate = $request->query->get('endDate');
        $pageLimit = $request->query->getInt('pageLimit', self::PAGE_LIMIT);
        $urlParameters = [];
        $sortField = '';
        $sortDirection = '';
        $errors = [];

        $columns = ['serviceAdvisorName', 'totalAppraiseClicks', 'totalFinanceClicks', 'totalUnlockCouponClicks', 'totalVideoViews', 'totalInboundMessages', 'totalOutboundMessages', 'totalMessages'];

        // Invalid page
        if ($page < 1) {
            throw new NotFoundHttpException();
        }

        // Invalid page limit
        if ($pageLimit < 1) {
            return $this->handleView($this->view('Invalid Page Limit', Response::HTTP_BAD_REQUEST));
        }

        if ($request->query->has('sortField') && $request->query->has('sortDirection')) {
            $sortField = $request->query->get('sortField');

            //check if the sortField exist
            if (!in_array($sortField, $columns)) {
                $errors['sortField'] = 'Invalid sort field name';

                return new ValidationResponse($errors);
            }

            $sortDirection = $request->query->get('sortDirection');

            if ('serviceAdvisorName' === $sortField) {
                $serviceAdvisors = $userRepo->getUserByRole('ROLE_SERVICE_ADVISOR', 'firstName', $sortDirection);
            } else {
                $serviceAdvisors = $userRepo->findBy(['role' => 'ROLE_SERVICE_ADVISOR', 'active' => 1]);
            }

            $urlParameters['sortDirection'] = $sortDirection;
            $urlParameters['sortField'] = $sortField;
        } else {
            $serviceAdvisors = $userRepo->findBy(['role' => 'ROLE_SERVICE_ADVISOR', 'active' => 1]);
        }

        $closedRepairOrders = $roRepo->getAllArchives(
            $startDate,
            $endDate
        );

        $result = [];
        foreach ($serviceAdvisors as $serviceAdvisor) {
            $totalAppraiseClicks = 0;
            $totalFinanceClicks = 0;
            $totalUnlockCouponClicks = 0;
            $totalVideoViews = 0;
            $totalInboundMessages = 0;

            $advisorId = $serviceAdvisor->getId();
            $totalOutboundMessages = $smsHelper->getOutBoundMessagesByAdvisor($advisorId);

            foreach ($closedRepairOrders as $ro) {
                if ($advisorId === $ro->getPrimaryAdvisor()->getId()) {
                    $videos = $ro->getVideos();

                    /** @var RepairOrderVideo $video */
                    foreach ($videos as $video) {
                        /** @var RepairOrderVideoInteraction $interaction */
                        foreach ($video->getInteractions() as $interaction) {
                            if ('Viewed' == $interaction->getType()) {
                                ++$totalVideoViews;
                            }
                        }
                    }

                    $totalInboundMessages += $smsHelper->getInBoundMessagesByAdvisor($advisorId, $ro->getPrimaryCustomer()->getId(), $ro->getDateCreated(), $ro->getDateClosed());
                }
            }

            $result[] = [
                'serviceAdvisor' => $serviceAdvisor,
                'totalAppraiseClicks' => $totalAppraiseClicks,
                'totalFinanceClicks' => $totalFinanceClicks,
                'totalUnlockCouponClicks' => $totalUnlockCouponClicks,
                'totalVideoViews' => $totalVideoViews,
                'totalInboundMessages' => $totalInboundMessages,
                'totalOutboundMessages' => $totalOutboundMessages,
                'totalMessages' => $totalInboundMessages + $totalOutboundMessages,
            ];
        }
        if ($request->query->has('sortField') && $request->query->has('sortDirection') && 'serviceAdvisorName' !== $sortField) {
            $result = $this->sortByField($result, $sortField, $sortDirection);
        }

        $pager = $paginator->paginate($result, $page, $pageLimit);
        $pagination = new Pagination($pager, $pageLimit, $urlGenerator);

        $json = [
            'results' => $pager->getItems(),
            'totalResults' => $pagination->totalResults,
            'totalPages' => $pagination->totalPages,
            'previous' => $pagination->getPreviousPageURL('app_reporting_customer_engagements', $urlParameters),
            'currentPage' => $pagination->currentPage,
            'next' => $pagination->getNextPageURL('app_reporting_customer_engagements', $urlParameters),
        ];

        $view = $this->view($json);
        $view->getContext()->setGroups(['user_list']);

        return $this->handleView($view);
    }

    /**
     * @Rest\Get("/api/reporting/trend")
     * @SWG\Tag(name="Reporting")
     *
     * @SWG\Parameter(
     *      name="startDate",
     *      type="string",
     *      format="date-time",
     *      in="query"
     * )
     *
     * @SWG\Parameter(
     *      name="endDate",
     *      type="string",
     *      format="date-time",
     *      in="query"
     * )
     *
     * @SWG\Response(
     *     response="200",
     *     description="This will report how they are using the system over time.",
     *     @SWG\Schema(
     *          type="object",
     *          @SWG\Property(
     *              property="byMonth",
     *              type="object",
     *              @SWG\Property(
     *                  property="Mon",
     *                  type="object",
     *                  @SWG\Property(property="totalRepairOrders", type="integer", description="Total # of repair orders"),
     *                  @SWG\Property(property="totalRepairOrdersWithVideo", type="integer", description="Total # of repair orders that had at least one video"),
     *                  @SWG\Property(property="totalRepairOrdersWithPayment", type="integer", description="Total # of repair orders that had at least one payment"),
     *                  @SWG\Property(property="totalRepairOrdersWithQuote", type="integer", description="Total # of repair orders that had quotes created"),
     *                  @SWG\Property(property="totalRepairOrdersWithMpi", type="integer", description="Total # of repair orders that had MPIs created")
     *              )
     *          ),
     *          @SWG\Property(property="totalRepairOrders", type="integer", description="Total # of repair orders"),
     *          @SWG\Property(property="totalRepairOrdersWithVideo", type="integer", description="Total # of repair orders that had at least one video"),
     *          @SWG\Property(property="totalRepairOrdersWithPayment", type="integer", description="Total # of repair orders that had at least one payment"),
     *          @SWG\Property(property="totalRepairOrdersWithQuote", type="integer", description="Total # of repair orders that had quotes created"),
     *          @SWG\Property(property="totalRepairOrdersWithMpi", type="integer", description="Total # of repair orders that had MPIs created")
     *     )
     * )
     */
    public function trend(
        Request $request,
        RepairOrderRepository $roRepo
    ): Response {
        $startDate = $request->query->get('startDate');
        $endDate = $request->query->get('endDate');

        $closedRepairOrders = $roRepo->getAllArchives(
            $startDate,
            $endDate
        );

        $result = [];
        $months = $this->getMonths($startDate, $endDate);
        foreach ($months as $m) {
            $result[$m] = [
                'totalRepairOrders' => 0,
                'totalRepairOrdersWithVideo' => 0,
                'totalRepairOrdersWithPayment' => 0,
                'totalRepairOrdersWithQuote' => 0,
                'totalRepairOrdersWithMpi' => 0,
            ];
        }

        $totalRepairOrders = count($closedRepairOrders);
        $totalRepairOrdersWithVideo = 0;
        $totalRepairOrdersWithPayment = 0;
        $totalRepairOrdersWithQuote = 0;
        $totalRepairOrdersWithMpi = 0;

        foreach ($closedRepairOrders as $ro) {
            $currentMonth = $ro->getDateClosed();
            $currentMonth = $currentMonth->format('M');

            ++$result[$currentMonth]['totalRepairOrders'];
            if (count($ro->getVideos())) {
                ++$result[$currentMonth]['totalRepairOrdersWithVideo'];
                ++$totalRepairOrdersWithVideo;
            }

            if (count($ro->getPayments())) {
                ++$result[$currentMonth]['totalRepairOrdersWithPayment'];
                ++$totalRepairOrdersWithPayment;
            }

            if ($ro->getRepairOrderQuote()) {
                ++$result[$currentMonth]['totalRepairOrdersWithQuote'];
                ++$totalRepairOrdersWithQuote;
            }

            if ($ro->getRepairOrderMpi()) {
                ++$result[$currentMonth]['totalRepairOrdersWithMpi'];
                ++$totalRepairOrdersWithMpi;
            }
        }
        $totalResult = [
            'results' => $result,
            'totalRepairOrders' => $totalRepairOrders,
            'totalRepairOrdersWithVideo' => $totalRepairOrdersWithVideo,
            'totalRepairOrdersWithPayment' => $totalRepairOrdersWithPayment,
            'totalRepairOrdersWithQuote' => $totalRepairOrdersWithQuote,
            'totalRepairOrdersWithMpi' => $totalRepairOrdersWithMpi,
        ];

        $view = $this->view($totalResult);

        return $this->handleView($view);
    }

    /**
     * @Rest\Get("/api/reporting/mpi")
     * @SWG\Tag(name="Reporting")
     *
     * @SWG\Parameter(
     *      name="startDate",
     *      type="string",
     *      format="date-time",
     *      in="query"
     * )
     *
     * @SWG\Parameter(
     *      name="endDate",
     *      type="string",
     *      format="date-time",
     *      in="query"
     * )
     *
     * @SWG\Parameter(name="page", type="integer", in="query")
     *
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
     *     description="The name of sort field (Repair Order columns)",
     *     in="query",
     *     enum={"roNumber", "customerName", "customerPhone", "advisorName", "technicianName", "templateName"}
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
     *      name="advisorId",
     *      type="integer",
     *      in="query"
     * )
     *
     * @SWG\Parameter(
     *      name="technicianId",
     *      type="integer",
     *      in="query"
     * )
     *
     * @SWG\Parameter(
     *      name="mpiTemplateId",
     *      type="integer",
     *      in="query"
     * )
     *
     * @SWG\Parameter(
     *      name="mpiItemId",
     *      type="integer",
     *      in="query"
     * )
     *
     * @SWG\Parameter(
     *      name="mpiItemStatus",
     *      type="string",
     *      in="query",
     *      enum={"green", "yellow", "red", "grey"}
     * )
     *
     * @SWG\Response(
     *     response="200",
     *     description="Returns the list of repair orders and data related to the MPI",
     *     @SWG\Schema(
     *          type="object",
     *          @SWG\Property(
     *              property="results",
     *              type="array",
     *              @SWG\Items(
     *                   type="object",
     *                   @SWG\Property(property="roNumber", type="integer", description="Repair Order Number"),
     *                   @SWG\Property(property="customerName", type="string", description="customer name"),
     *                   @SWG\Property(property="customerPhone", type="string", description="customer phone"),
     *                   @SWG\Property(property="advisorName", type="string", description="advisor name"),
     *                   @SWG\Property(property="technicianName", type="string", description="technician name"),
     *                   @SWG\Property(property="templateName", type="string", description="template name"),
     *                   @SWG\Property(property="roMPI", type="string", description="Repair Order MPI results")
     *              )
     *          ),
     *          @SWG\Property(property="totalResults", type="integer", description="Total # of results found"),
     *          @SWG\Property(property="totalPages", type="integer", description="Total # of pages of results"),
     *          @SWG\Property(property="previous", type="string", description="URL for previous page"),
     *          @SWG\Property(property="currentPage", type="integer", description="Current page #"),
     *          @SWG\Property(property="next", type="string", description="URL for next page")
     *     )
     * )
     */
    public function mpi(
        Request $request,
        RepairOrderRepository $roRepo,
        UserRepository $userRepo,
        RepairOrderQuoteRepository $quoteRepo,
        MPITemplateRepository $mpiTemplateRepo,
        RepairOrderMPIRepository $roMpiRepo,
        PaginatorInterface $paginator,
        UrlGeneratorInterface $urlGenerator,
        EntityManagerInterface $em
    ): Response {
        $page = $request->query->getInt('page', 1);
        $startDate = $request->query->get('startDate');
        $endDate = $request->query->get('endDate');
        $pageLimit = $request->query->getInt('pageLimit', self::PAGE_LIMIT);
        $urlParameters = [];
        $sortField = '';
        $sortDirection = '';
        $errors = [];

        $columns = ['roNumber', 'customerName', 'customerPhone', 'advisorName', 'technicianName', 'templateName'];

        // Invalid page
        if ($page < 1) {
            throw new NotFoundHttpException();
        }

        // Invalid page limit
        if ($pageLimit < 1) {
            return $this->handleView($this->view('Invalid Page Limit', Response::HTTP_BAD_REQUEST));
        }

        if ($request->query->has('sortField') && $request->query->has('sortDirection')) {
            $sortField = $request->query->get('sortField');

            //check if the sortField exist
            if (!in_array($sortField, $columns)) {
                $errors['sortField'] = 'Invalid sort field name';

                return new ValidationResponse($errors);
            }

            $sortDirection = $request->query->get('sortDirection');

            $urlParameters['sortDirection'] = $sortDirection;
            $urlParameters['sortField'] = $sortField;
        }

        $advisorId = $request->query->get('advisorId');
        $technicianId = $request->query->get('technicianId');
        $mpiTemplateId = $request->query->get('mpiTemplateId');
        $mpiItemId = $request->query->get('mpiItemId');
        $mpiItemStatus = $request->query->get('mpiItemStatus');

        $mpiTemplate = '';
        if ($mpiTemplateId) {
            $mpiTemplate = $mpiTemplateRepo->find($mpiTemplateId);
        }

        $closedRepairOrders = $roRepo->getMpiReporting(
            $startDate,
            $endDate,
            null,
            null,
            $advisorId,
            $technicianId
        );

        $result = [];
        foreach ($closedRepairOrders as $ro) {
            $customer = $ro->getPrimaryCustomer();
            $advisor = $ro->getPrimaryAdvisor();
            $technician = $ro->getPrimaryTechnician();
            $roMpi = $roMpiRepo->findOneBy(['repairOrder' => $ro->getId()]);
            $mpiResults = '';
            if ($roMpi) {
                $mpiResults = $roMpi->getResults();
                $mpiResults = json_decode($mpiResults, true);

                if ($mpiItemStatus) {
                    $newResultsArr = [];
                    $arrRes = $mpiResults['results'];
                    if ($arrRes) {
                        foreach ($arrRes as $res) {
                            $newResultObj = ['group' => $res['group'], 'items' => []];

                            $items = array_filter($res['items'], function ($a) use ($mpiItemStatus) {
                                return $a['status'] === $mpiItemStatus;
                            });

                            $newResultObj['items'] = $items;
                            $newResultsArr[] = $newResultObj;
                        }
                        $mpiResults = ['name' => $mpiResults['name'], 'results' => $newResultsArr];
                    }
                }
            }

            $result[] = [
                'roNumber' => $ro->getNumber(),
                'customerName' => $customer->getName(),
                'customerPhone' => $customer->getPhone(),
                'advisorName' => $advisor->getFirstName().$advisor->getLastName(),
                'technicianName' => $technician->getFirstName().$technician->getLastName(),
                'templateName' => $mpiTemplate ? $mpiTemplate->getName() : null,
                'roMPI' => $mpiResults,
            ];
        }
        if ($request->query->has('sortField') && $request->query->has('sortDirection')) {
            $result = $this->sortByField($result, $sortField, $sortDirection);
        }

        $pager = $paginator->paginate($result, $page, $pageLimit);
        $pagination = new Pagination($pager, $pageLimit, $urlGenerator);

        $json = [
            'results' => $pager->getItems(),
            'totalResults' => $pagination->totalResults,
            'totalPages' => $pagination->totalPages,
            'previous' => $pagination->getPreviousPageURL('app_reporting_mpi', $urlParameters),
            'currentPage' => $pagination->currentPage,
            'next' => $pagination->getNextPageURL('app_reporting_mpi', $urlParameters),
        ];

        $view = $this->view($json);

        return $this->handleView($view);
    }

    private function sortByField($list, $field, $direction)
    {
        usort($list, function ($a, $b) use ($field, $direction) {
            if ('ASC' === $direction) {
                return strcmp($a[$field], $b[$field]);
            } elseif ('DESC' === $direction) {
                return strcmp($b[$field], $a[$field]);
            }
        });

        return $list;
    }

    private function getMonths($startDate = null, $endDate = null)
    {
        if (!$startDate || !$endDate) {
            return ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        }
        $start = (new DateTime($startDate))->modify('first day of this month');
        $end = (new DateTime($endDate))->modify('first day of next month');
        $interval = DateInterval::createFromDateString('1 month');
        $period = new DatePeriod($start, $interval, $end);

        $months = [];
        foreach ($period as $dt) {
            $months[] = $dt->format('M');
        }

        return $months;
    }
}
