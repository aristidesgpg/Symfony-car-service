<?php

namespace App\Controller;

use App\Entity\RepairOrder;
use App\Repository\RepairOrderRepository;
use App\Repository\UserRepository;
use App\Service\Pagination;
use App\Service\ServiceSMSHelper;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Knp\Component\Pager\PaginatorInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
        // Invalid page
        if ($page < 1) {
            throw new NotFoundHttpException();
        }

        // Invalid page limit
        if ($pageLimit < 1) {
            return $this->handleView($this->view('Invalid Page Limit', Response::HTTP_BAD_REQUEST));
        }

        $result = $roRepo->getAllArchives(
            $startDate,
            $endDate
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
     * @Rest\Get("/api/reporting/advisor-usage")
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
     *     description="Success!",
     *     @SWG\Schema(
     *         type="object",
     *         @SWG\Property(
     *             property="results",
     *             type="array",
     *             @SWG\Items(ref=@Model(type=RepairOrder::class, groups=RepairOrder::GROUPS))
     *         ),
     *         @SWG\Property(property="advisor", type="integer", description="The advisor"),
     *         @SWG\Property(property="totalUnreadMessages", type="integer", description="The current # of unread sms messages from customers where they are the primaryAdvisor"),
     *         @SWG\Property(property="totalClosedRepairOrders", type="integer", description="# of repair orders that were closed in the given date range"),
     *         @SWG\Property(property="totalClosedVideos", type="integer", description="# of videos for repair orders that have closed in the given date range"),
     *         @SWG\Property(property="totalClosedVideoViews", type="integer", description="# of video views for repair orders that have closed in the given date range"),
     *         @SWG\Property(property="totalSentQuotes", type="integer", description="# of quotes sent for repair orders that have closed in the given date range"),
     *         @SWG\Property(property="totalViewedQuotes", type="integer", description="# of quotes that were viewed for repair orders that have closed in the given date range"),
     *         @SWG\Property(property="totalCompletedQuotes", type="integer", description="# of quotes that were completed by the customer for repair orers that have closed in the given date range"),
     *         @SWG\Property(property="totalInboundTxtMsgs", type="integer", description="# of total inbound text messages for repair orders that were closed in the given date range"),
     *         @SWG\Property(property="totalOutboundTxtMsgs", type="integer", description="# of total outbound text messages for repair orders that were closed in the given date range"),
     *     )
     * )
     */
    public function advisorUsage(
        Request $request,
        RepairOrderRepository $roRepo,
        PaginatorInterface $paginator,
        UrlGeneratorInterface $urlGenerator,
        EntityManagerInterface $em,
        UserRepository $userRepo,
        ServiceSMSHelper $smsHelper
    ): Response {
        $startDate = $request->query->get('startDate');
        $endDate = $request->query->get('endDate');

        $serviceAdvisors = $userRepo->findBy(['role' => 'ROLE_SERVICE_ADVISOR', 'active' => 1]);

        $closedRepairOrders = $roRepo->getAllArchives(
            $startDate,
            $endDate
        );

        $result = [];
        foreach ($serviceAdvisors as $sa) {
            $totalClosedRepairOrders = 0;
            $totalClosedVideos = 0;
            $totalClosedVideoViews = 0;
            $totalSentQuotes = 0;
            $totalViewedQuotes = 0;
            $totalCompletedQuotes = 0;
            $totalInboundTxtMsgs = 0;
            $totalOutboundTxtMsgs = 0;

            foreach ($closedRepairOrders as $ro) {
                if ($sa->getId() === $ro->getPrimaryAdvisor()->getId()) {
                    ++$totalClosedRepairOrders;

                    $videos = $ro->getVideos();
                    $totalClosedVideos = count($videos);

                    foreach ($videos as $video) {
                        if ($videos->getDateViewed()) {
                            ++$totalClosedVideoViews;
                        }
                    }

                    $quotes = $ro->getRepairOrderQuote();
                    foreach ($quotes as $quote) {
                        if ($quote->getDateSent()) {
                            ++$totalSentQuotes;
                        }
                        if ($quote->getDateViewed()) {
                            ++$totalViewedQuotes;
                        }
                        if ($quote->getDateCompleted()) {
                            ++$totalCompletedQuotes;
                        }
                    }
                }
            }

            $unread = 0;
            $threads = $smsHelper->getThreadsByAdvisor($sa->getId());
            foreach ($threads as $thread) {
                $unread += $thread['unread'];
            }

            $result[] = [
                'advisorId' => $sa->getId(),
                'totalUnreadMessages' => $unread,
                'totalClosedRepairOrders' => $totalClosedRepairOrders,
                'totalClosedVideos' => $totalClosedVideos,
                'totalClosedVideoViews' => $totalClosedVideoViews,
                'totalSentQuotes' => $totalSentQuotes,
                'totalViewedQuotes' => $totalViewedQuotes,
                'totalCompletedQuotes' => $totalCompletedQuotes,
                'totalInboundTxtMsgs' => $totalInboundTxtMsgs,
                'totalOutboundTxtMsgs' => $totalOutboundTxtMsgs,
            ];
        }

        $view = $this->view($result);

        return $this->handleView($view);
    }

    /**
     * @Rest\Get("/api/reporting/advisor")
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
     *     description="Success!",
     *     @SWG\Schema(
     *         type="object",
     *         @SWG\Property(
     *             property="results",
     *             type="array",
     *             @SWG\Items(ref=@Model(type=RepairOrder::class, groups=RepairOrder::GROUPS))
     *         ),
     *         @SWG\Property(property="totalClosedRepairOrders", type="integer", description="# of repair orders closed in the given date range"),
     *         @SWG\Property(property="totalAppraise", type="integer", description="# of appraise my car clicks (make 0 for now)"),
     *         @SWG\Property(property="totalStartValues", type="integer", description="$ SUM of all the start values for repair orders closed in the given date range"),
     *         @SWG\Property(property="totalFinalValues", type="integer", description="$ SUM of all the final values for repair orders closed in the given date range"),
     *         @SWG\Property(property="totalUpsellAmounts", type="integer", description="$ upsell amounts (sum of final values - sum of start values) for repair orders closed in the given date range"),
     *         @SWG\Property(property="totalUpsellPercentage", type="string", description="% upsell percentage (sum final values / sum start values) < as a percentage"),
     *         @SWG\Property(property="totalVideos", type="integer", description="# of total videos created for repair orders closed in the given date range"),
     *         @SWG\Property(property="sumFinalValues", type="string", description="$ (sum of final values for repair orders with at least one video / # of repair orders with at least one video) for repair orders closed in the given date range"),
     *         @SWG\Property(property="sumFinalValuesWithoutVideo", type="string", description="$ (sum of final values for repair orders WITHOUT a video / # of repair orders WITHOUT at least one video) for repair orders closed in the given date range")
     *     )
     * )
     *
     * @SWG\Response(
     *     response="404",
     *     description="Invalid page parameter"
     * )
     */
    public function advisor(
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
        // Invalid page
        if ($page < 1) {
            throw new NotFoundHttpException();
        }

        // Invalid page limit
        if ($pageLimit < 1) {
            return $this->handleView($this->view('Invalid Page Limit', Response::HTTP_BAD_REQUEST));
        }

        $roArchiveQuery = $roRepo->getAllArchives(
            $startDate,
            $endDate
        );

        $result = $roArchiveQuery->getResult();

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
}
