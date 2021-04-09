<?php

namespace App\Controller;

use App\Entity\RepairOrder;
use App\Entity\User;
use App\Repository\MPITemplateRepository;
use App\Repository\RepairOrderMPIRepository;
use App\Repository\RepairOrderQuoteRepository;
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
     * @SWG\Response(
     *     response="200",
     *     description="Returns the list of Service Advisors and what they have done in the passed date range based upon repair orders that were closed",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(
     *              type="object",
     *              @SWG\Property(
     *                  property="serviceAdvisor",
     *                  ref=@Model(type=User::class, groups={"user_list"}),
     *                  description="The service advisor"
     *              ),
     *              @SWG\Property(property="totalUnreadMessages", type="integer", description="The current # of unread sms messages from customers where they are the primaryAdvisor"),
     *              @SWG\Property(property="totalClosedRepairOrders", type="integer", description="A # of repair orders that were closed in the given date range"),
     *              @SWG\Property(property="totalClosedVideos", type="integer", description="A # of videos for repair orders that have closed in the given date range"),
     *              @SWG\Property(property="totalClosedVideoViews", type="integer", description="A # of video views for repair orders that have closed in the given date range"),
     *              @SWG\Property(property="totalSentQuotes", type="integer", description="A # of quotes sent for repair orders that have closed in the given date range"),
     *              @SWG\Property(property="totalViewedQuotes", type="integer", description="A # of quotes that were viewed for repair orders that have closed in the given date range"),
     *              @SWG\Property(property="totalCompletedQuotes", type="integer", description="A # of quotes that were completed by the customer for repair orers that have closed in the given date range"),
     *              @SWG\Property(property="totalInboundTxtMsgs", type="integer", description="A # of total inbound text messages for repair orders that were closed in the given date range"),
     *              @SWG\Property(property="totalOutboundTxtMsgs", type="integer", description="A # of total outbound text messages for repair orders that were closed in the given date range")
     *         )
     *     )
     * )
     */
    public function advisorUsage(
        Request $request,
        RepairOrderRepository $roRepo,
        UserRepository $userRepo,
        ServiceSMSHelper $smsHelper,
        RepairOrderQuoteRepository $quoteRepo
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
                        if ($video->getDateViewed()) {
                            ++$totalClosedVideoViews;
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
                }
            }

            $unread = 0;
            $threads = $smsHelper->getThreadsByAdvisor($sa->getId());
            $view = $this->view($threads);
            $view->getContext()->setGroups(['user_list']);

            return $this->handleView($view);
            foreach ($threads as $thread) {
                $unread += $thread['unread'];
            }

            $result[] = [
                'serviceAdvisor' => $sa,
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
     * @SWG\Response(
     *     response="200",
     *     description="Returns the list of Service Advisors and data relating to repair orders assigned to them that are closed",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(
     *              type="object",
     *              @SWG\Property(
     *                  property="serviceAdvisor",
     *                  ref=@Model(type=User::class, groups={"user_list"}),
     *                  description="The service advisor"
     *              ),
     *              @SWG\Property(property="totalClosedRepairOrders", type="integer", description="The # of repair orders closed in the given date range"),
     *              @SWG\Property(property="totalAppraise", type="integer", description="The # of appraise my car clicks (make 0 for now)"),
     *              @SWG\Property(property="totalStartValues", type="integer", description="$ SUM of all the start values for repair orders closed in the given date range"),
     *              @SWG\Property(property="totalFinalValues", type="integer", description="$ SUM of all the final values for repair orders closed in the given date range"),
     *              @SWG\Property(property="totalUpsellAmount", type="integer", description="$ upsell amounts (sum of final values - sum of start values) for repair orders closed in the given date range"),
     *              @SWG\Property(property="totalUpsellPercentage", type="integer", description="% upsell percentage (sum final values / sum start values) < as a percentage"),
     *              @SWG\Property(property="totalVideos", type="integer", description="The # of total videos created for repair orders closed in the given date range"),
     *              @SWG\Property(property="sumFinalValues", type="integer", description="$ (sum of final values for repair orders with at least one video / # of repair orders with at least one video) for repair orders closed in the given date range"),
     *              @SWG\Property(property="sumFinalValuesWithoutVideo", type="integer", description="$ (sum of final values for repair orders WITHOUT a video / # of repair orders WITHOUT at least one video) for repair orders closed in the given date range")
     *         )
     *     )
     * )
     */
    public function advisor(
        Request $request,
        RepairOrderRepository $roRepo,
        UserRepository $userRepo,
        RepairOrderQuoteRepository $quoteRepo
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
            $totalAppraise = 0;
            $totalStartValues = 0;
            $totalFinalValues = 0;
            $totalUpsellPercentage = 0;

            $sumFinalValues = 0;
            $roCountWithVideo = 0;

            $sumFinalValuesWithoutVideo = 0;
            $roCountWithoutVideo = 0;

            foreach ($closedRepairOrders as $ro) {
                if ($sa->getId() === $ro->getPrimaryAdvisor()->getId()) {
                    ++$totalClosedRepairOrders;
                    $totalStartValues += $ro->getStartValue();
                    $totalFinalValues += $ro->getFinalValue();

                    $videos = $ro->getVideos();
                    $totalVideos = count($videos);

                    if ($totalVideos) {
                        $sumFinalValues += $ro->getFinalValue();
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
                $sumFinalValues = round($sumFinalValues / $roCountWithVideo, 2);
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
                'sumFinalValues' => $sumFinalValues,
                'sumFinalValuesWithoutVideo' => $sumFinalValuesWithoutVideo,
            ];
        }

        $view = $this->view($result);
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
     * @SWG\Response(
     *     response="200",
     *     description="Returns the list of technicians with metrics relating to how they have performed",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(
     *              type="object",
     *              @SWG\Property(
     *                  property="technician",
     *                  ref=@Model(type=User::class, groups={"user_list"}),
     *                  description="The technician"
     *              ),
     *              @SWG\Property(property="totalClosedRepairOrders", type="integer", description="The # of repair orders where they are the primary technciain on repair orders that have been closed in the given date range"),
     *              @SWG\Property(property="totalStartValues", type="integer", description="$ SUM of all start values for repair orders closed in a given date range"),
     *              @SWG\Property(property="totalFinalValues", type="integer", description="$ SUM of all final values for repair orders closed in a given date range"),
     *              @SWG\Property(property="totalUpsellAmount", type="integer", description="$ upsell amounts (SUM final values - SUM start values) for repair orders closed in the given date range"),
     *              @SWG\Property(property="totalUpsellPercentage", type="integer", description="% Upsell Percentage (sum final values / sum start values) < as a percentage"),
     *              @SWG\Property(property="totalVideos", type="integer", description="The # total videos performed by this technician on repair orders that have closed in the given date range"),
     *              @SWG\Property(property="sumFinalValues", type="integer", description="$ (sum of final values for repair orders with at least one video / # of repair orders with at least one video) for repair orders closed in the given date range"),
     *              @SWG\Property(property="sumFinalValuesWithoutVideo", type="integer", description="$ (sum of final values for repair orders WITHOUT a video / # of repair orders WITHOUT at least one video) for repair orders closed in the given date range"),
     *              @SWG\Property(property="totalNoVideosRecorded", type="integer", description="The # of repair orders where no videos were recorded for repair orders that were closed in the given date range")
     *         )
     *     )
     * )
     */
    public function technicians(
        Request $request,
        RepairOrderRepository $roRepo,
        UserRepository $userRepo,
        RepairOrderQuoteRepository $quoteRepo
    ): Response {
        $startDate = $request->query->get('startDate');
        $endDate = $request->query->get('endDate');

        $technicians = $userRepo->findBy(['role' => 'ROLE_TECHNICIAN', 'active' => 1]);

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

            $sumFinalValues = 0;
            $roCountWithVideo = 0;

            $sumFinalValuesWithoutVideo = 0;
            $roCountWithoutVideo = 0;

            foreach ($closedRepairOrders as $ro) {
                if ($technician->getId() === $ro->getPrimaryTechnician()->getId()) {
                    ++$totalClosedRepairOrders;
                    $totalStartValues += $ro->getStartValue();
                    $totalFinalValues += $ro->getFinalValue();

                    $videos = $ro->getVideos();
                    $totalVideos = count($videos);

                    if ($totalVideos) {
                        $sumFinalValues += $ro->getFinalValue();
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
                $sumFinalValues = round($sumFinalValues / $roCountWithVideo, 2);
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
                'sumFinalValues' => $sumFinalValues,
                'sumFinalValuesWithoutVideo' => $sumFinalValuesWithoutVideo,
                'totalNoVideosRecorded' => $roCountWithoutVideo,
            ];
        }

        $view = $this->view($result);
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
     * @SWG\Response(
     *     response="200",
     *     description="Returns a list of advisors with what customers have done on repair orders where they were the primary advisor",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(
     *              type="object",
     *              @SWG\Property(
     *                  property="serviceAdvisor",
     *                  ref=@Model(type=User::class, groups={"user_list"}),
     *                  description="The service advisor"
     *              ),
     *              @SWG\Property(property="totalAppraiseClicks", type="integer", description="The # of appraise my car clicks (make 0 for now)"),
     *              @SWG\Property(property="totalFinanceClicks", type="integer", description="The # of finance my repair clicks (make 0 for now)"),
     *              @SWG\Property(property="totalUnlockCouponClicks", type="integer", description="The # of unlock coupon clicks (make 0 for now)"),
     *              @SWG\Property(property="totalVideos", type="integer", description="The # of video plays for repair orders that have closed in the given date range (RepairOrderVidoeInteractions)"),
     *              @SWG\Property(property="totalInboundMessages", type="integer", description="The # of inbound messages from customers for repair orders that have closed in a given date range. "),
     *              @SWG\Property(property="totalOutboundMessages", type="integer", description="The # of outbound messages from the advisor for repair orders that have closed in a given date range"),
     *              @SWG\Property(property="totalMessages", type="integer", description="The # of total messages (# of inbound + # of outbound)")
     *         )
     *     )
     * )
     */
    public function customerEngagements(
        Request $request,
        RepairOrderRepository $roRepo,
        UserRepository $userRepo
    ): Response {
        $startDate = $request->query->get('startDate');
        $endDate = $request->query->get('endDate');

        $serviceAdvisors = $userRepo->findBy(['role' => 'ROLE_SERVICE_ADVISOR', 'active' => 1]);

        $closedRepairOrders = $roRepo->getAllArchives(
            $startDate,
            $endDate
        );

        $result = [];
        foreach ($serviceAdvisors as $serviceAdvisor) {
            $totalAppraiseClicks = 0;
            $totalFinanceClicks = 0;
            $totalUnlockCouponClicks = 0;
            $totalVideos = 0;
            $totalInboundMessages = 0;
            $totalOutboundMessages = 0;

            foreach ($closedRepairOrders as $ro) {
                if ($serviceAdvisor->getId() === $ro->getPrimaryAdvisor()->getId()) {
                    $videos = $ro->getVideos();
                    foreach ($videos as $video) {
                        if ($video->getDateViewed()) {
                            ++$totalVideos;
                        }
                    }
                }
            }

            $result[] = [
                'serviceAdvisor' => $serviceAdvisor,
                'totalAppraiseClicks' => $totalAppraiseClicks,
                'totalFinanceClicks' => $totalFinanceClicks,
                'totalUnlockCouponClicks' => $totalUnlockCouponClicks,
                'totalVideos' => $totalVideos,
                'totalInboundMessages' => $totalInboundMessages,
                'totalOutboundMessages' => $totalOutboundMessages,
                'totalMessages' => $totalInboundMessages + $totalOutboundMessages,
            ];
        }

        $view = $this->view($result);
        $view->getContext()->setGroups(['user_list']);

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
     *         type="array",
     *         @SWG\Items(
     *              type="object",
     *              @SWG\Property(property="roNumber", type="integer", description="Repair Order Number"),
     *              @SWG\Property(property="customerName", type="string", description="customer name"),
     *              @SWG\Property(property="customerPhone", type="string", description="customer phone"),
     *              @SWG\Property(property="advisorName", type="string", description="advisor name"),
     *              @SWG\Property(property="technicianName", type="string", description="technician name"),
     *              @SWG\Property(property="templateName", type="string", description="template name"),
     *              @SWG\Property(property="roMPI", type="string", description="Repair Order MPI results")
     *         )
     *     )
     * )
     */
    public function mpi(
        Request $request,
        RepairOrderRepository $roRepo,
        UserRepository $userRepo,
        RepairOrderQuoteRepository $quoteRepo,
        MPITemplateRepository $mpiTemplateRepo,
        RepairOrderMPIRepository $roMpiRepo
    ): Response {
        $startDate = $request->query->get('startDate');
        $endDate = $request->query->get('endDate');
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

        $view = $this->view($result);

        return $this->handleView($view);
    }
}
