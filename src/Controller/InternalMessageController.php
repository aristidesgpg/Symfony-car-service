<?php

namespace App\Controller;

use App\Helper\iServiceLoggerTrait;
use App\Repository\InternalMessageRepository;
use App\Service\InternalMessageHelper;
use App\Service\Pagination;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Knp\Component\Pager\PaginatorInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Class InternalMessageController
 *
 * @package App\Controller
 */
class InternalMessageController extends AbstractFOSRestController {
    use iServiceLoggerTrait;

    private const PAGE_LIMIT = 25;

    /**
     * @Rest\Get("/api/internal-messaging/threads")
     * @Rest\Get(name="getInternalThreads")
     *
     * @SWG\Tag(name="Internal Message")
     * @SWG\Get(description="Get the list of threads between multiple customers")
     * @SWG\Parameter(
     *     name="page",
     *     required=false,
     *     type="integer",
     *     in="query"
     * )
     * @SWG\Response(
     *      response=200,
     *      description="Return the list of threads",
     *      @SWG\Schema(
     *          type="object",
     *          @SWG\Property(
     *              property="threads",
     *              type="array",
     *              @SWG\Items(
     *                  @SWG\Property(
     *                      property="otherUser",
     *                      type="object",
     *                      @SWG\Schema(type="object", ref=@Model(type=User::class, groups={"user_list"}))
     *                  ),
     *                  @SWG\Property(
     *                      property="lastMessage",
     *                      type="object",
     *                      @SWG\Schema(type="object", ref=@Model(type=InternalMessage::class, groups={"internal_message"}))
     *                  ),
     *                  @SWG\Property(property="unread", type="integer", description="Total number of unread internal messages")
     *              )
     *          ),
     *          @SWG\Property(property="totalResults", type="integer", description="Total number of internal messages"),
     *          @SWG\Property(property="totalPages", type="integer", description="Total number of pages"),
     *          @SWG\Property(property="previous", type="string", description="URL of previous page of results or null"),
     *          @SWG\Property(property="currentPage", type="integer", description="Current page number"),
     *          @SWG\Property(property="next", type="string", description="URL of next page of results or null")
     *      )
     * )
     *
     * @param Request                $request
     * @param PaginatorInterface     $paginator
     * @param UrlGeneratorInterface  $urlGenerator
     * @param InternalMessageHelper  $internalMessageHelper
     *
     * @return View|Response
     */
    public function getThreads (Request $request, PaginatorInterface $paginator, UrlGeneratorInterface $urlGenerator,
                                InternalMessageHelper $internalMessageHelper) {
        $userId = $this->getUser()->getId();
        $page   = $request->query->getInt('page', 1);

        if ($page < 1) {
            throw new NotFoundHttpException();
        }

        $threads = $internalMessageHelper->getThreads($userId);

        if ($threads === false) {
            return $this->view('Error trying to execute MySQL query', Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        $urlParams  = ['page' => $page];
        $pager      = $paginator->paginate($threads, $page, self::PAGE_LIMIT);
        $pagination = new Pagination($pager, self::PAGE_LIMIT, $urlGenerator);

        $view = $this->view([
            'threads'      => $pager->getItems(),
            'totalResults' => $pagination->totalResults,
            'totalPages'   => $pagination->totalPages,
            'previous'     => $pagination->getPreviousPageURL('getInternalThreads', $urlParams),
            'currentPage'  => $pagination->currentPage,
            'next'         => $pagination->getNextPageURL('getInternalThreads', $urlParams)
        ]);
        $view->getContext()->setGroups(['internal_message', 'user_list']);

        return $this->handleView($view);
    }

    /**
     * @Rest\Get("/api/internal-messaging/messages")
     * @Rest\Get(name="getInternalMessages")
     *
     * @SWG\Tag(name="Internal Message")
     * @SWG\Get(description="Get the list of messages in a conversation")
     * @SWG\Parameter(
     *     name="page",
     *     required=false,
     *     type="integer",
     *     in="query"
     * )
     * @SWG\Parameter(
     *     name="otherUserId",
     *     required=true,
     *     type="integer",
     *     in="query",
     *     description="Use id 5 for test"
     * )
     * @SWG\Response(
     *      response=200,
     *      description="Return the list of messages newest",
     *      @SWG\Schema(
     *          type="object",
     *          @SWG\Property(
     *              property="internalMessages",
     *              type="array",
     *              @SWG\Items(ref=@Model(type=InternalMessage::class, groups={"internal_message"}))
     *          ),
     *          @SWG\Property(property="totalResults", type="integer", description="Total number of internal messages"),
     *          @SWG\Property(property="totalPages", type="integer", description="Total number of pages"),
     *          @SWG\Property(property="previous", type="string", description="URL of previous page of results or null"),
     *          @SWG\Property(property="currentPage", type="integer", description="Current page number"),
     *          @SWG\Property(property="next", type="string", description="URL of next page of results or null")
     *      )
     * )
     *
     * @param Request                   $request
     * @param InternalMessageRepository $internalMessageRepository
     * @param PaginatorInterface        $paginator
     * @param UrlGeneratorInterface     $urlGenerator
     *
     * @return Response
     */
    public function getMessagesNewest (Request $request, InternalMessageRepository $internalMessageRepository, PaginatorInterface $paginator, UrlGeneratorInterface $urlGenerator) {
        $user        = $this->getUser();
        $page        = $request->query->getInt('page', 1);
        $otherUserId = $request->query->get('otherUserId');

        if ($page < 1) {
            throw new NotFoundHttpException();
        }

        $queryParams = ['userId' => $user->getId(), 'otherUserId' => $otherUserId];
        $query       = $internalMessageRepository->createQueryBuilder('im')
                                                 ->where('im.to = :userId and im.from = :otherUserId OR im.to = :otherUserId and im.from = :userId')
                                                 ->setParameters($queryParams)
                                                 ->orderBy('im.date', 'DESC')
                                                 ->getQuery();

        $urlParams  = ['otherUserId' => $otherUserId];
        $pager      = $paginator->paginate($query, $page, self::PAGE_LIMIT);
        $pagination = new Pagination($pager, self::PAGE_LIMIT, $urlGenerator);

        $view = $this->view([
            'internalMessages' => $pager->getItems(),
            'totalResults'     => $pagination->totalResults,
            'totalPages'       => $pagination->totalPages,
            'previous'         => $pagination->getPreviousPageURL('getInternalMessages', $urlParams),
            'currentPage'      => $pagination->currentPage,
            'next'             => $pagination->getNextPageURL('getInternalMessages', $urlParams)
        ]);
        $view->getContext()->setGroups(['internal_message']);

        return $this->handleView($view);
    }
}
