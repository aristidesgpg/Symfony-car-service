<?php

namespace App\Controller;

use App\Entity\InternalMessage;
use App\Entity\User;
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
     * @Rest\Get("/api/internal-message/threads")
     * @Rest\Get(name="getInternalThreads")
     *
     * @SWG\Tag(name="Internal Message")
     * @SWG\Get(description="Get the list of threads")
     * 
     * @SWG\Parameter(
     *     name="page",
     *     required=false,
     *     type="integer",
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
     *                      ref=@Model(type=User::class, groups={"user_list"})
     *                  ),
     *                  @SWG\Property(
     *                      property="lastMessage",
     *                      type="object",
     *                      @SWG\Property(property="id", type="integer"),
     *                      @SWG\Property(property="fromId", type="integer"),
     *                      @SWG\Property(property="toId", type="integer"),
     *                      @SWG\Property(property="message", type="string"),
     *                      @SWG\Property(property="date", type="string"),
     *                      @SWG\Property(property="isRead", type="boolean")
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
     * @SWG\Response(response="404", description="Page does not exist")
     * 
     * @SWG\Response(
     *     response="406",
     *     description="Page limit must be a positive non-zero integer"
     * )
     * 
     * @SWG\Response(
     *     response=500, 
     *     description="Internal Server Error"
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
        $userId    = $this->getUser()->getId();
        $page      = $request->query->getInt('page', 1);
        $pageLimit = $request->query->getInt('pageLimit', self::PAGE_LIMIT);

        if ($page < 1) {
            throw new NotFoundHttpException();
        }

        if ($pageLimit < 1) {
            return $this->handleView($this->view("Page limit must be a positive non-zero integer", Response::HTTP_NOT_ACCEPTABLE));
        }

        $threads = $internalMessageHelper->getThreads($userId);

        if ($threads === false) {
            return $this->handleView($this->view('Error trying to execute MySQL query', Response::HTTP_INTERNAL_SERVER_ERROR));
        }

        $urlParams  = ['page' => $page];
        $pager      = $paginator->paginate($threads, $page, $pageLimit);
        $pagination = new Pagination($pager, $pageLimit, $urlGenerator);

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
     * @Rest\Get("/api/internal-message/messages")
     * @Rest\Get(name="getInternalMessages")
     *
     * @SWG\Tag(name="Internal Message")
     * @SWG\Get(description="Get the list of messages in a conversation")
     * 
     * @SWG\Parameter(
     *     name="page",
     *     required=false,
     *     type="integer",
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
     * @SWG\Parameter(
     *     name="otherUserId",
     *     required=true,
     *     type="integer",
     *     in="query",
     *     description="Use id 5 for test"
     * )
     * 
     * @SWG\Response(
     *      response=200,
     *      description="Return the list of messages newest",
     *      @SWG\Schema(
     *          type="object",
     *          @SWG\Property(
     *              property="internalMessages",
     *              type="array",
     *              @SWG\Items(ref=@Model(type=InternalMessage::class, groups={"internal_message", "user_list"}))
     *          ),
     *          @SWG\Property(property="totalResults", type="integer", description="Total number of internal messages"),
     *          @SWG\Property(property="totalPages", type="integer", description="Total number of pages"),
     *          @SWG\Property(property="previous", type="string", description="URL of previous page of results or null"),
     *          @SWG\Property(property="currentPage", type="integer", description="Current page number"),
     *          @SWG\Property(property="next", type="string", description="URL of next page of results or null")
     *      )
     * )
     * 
     * @SWG\Response(
     *     response=400, 
     *     description="Missing Required Parameter(s)"
     * )
     * 
     * @SWG\Response(response="404", description="Not Found")
     * 
     * @SWG\Response(
     *     response="406",
     *     description="Page limit must be a positive non-zero integer"
     * )
     *
     * @param Request                   $request
     * @param InternalMessageRepository $internalMessageRepository
     * @param PaginatorInterface        $paginator
     * @param UrlGeneratorInterface     $urlGenerator
     *
     * @return Response
     */
    public function getMessagesNewest (Request $request, InternalMessageRepository $internalMessageRepository, 
                                       PaginatorInterface $paginator, UrlGeneratorInterface $urlGenerator) {
        $user        = $this->getUser();
        $page        = $request->query->getInt('page', 1);
        $pageLimit   = $request->query->getInt('pageLimit', self::PAGE_LIMIT);
        $otherUserId = $request->query->get('otherUserId');

        if ($page < 1) {
            throw new NotFoundHttpException();
        }

        if ($pageLimit < 1) {
            return $this->handleView($this->view("Page limit must be a positive non-zero integer", Response::HTTP_NOT_ACCEPTABLE));
        }

        if (!$otherUserId) {
            return $this->handleView($this->view('Missing Required Parameter(s)', Response::HTTP_BAD_REQUEST));
        }

        $otherUser = $this->getDoctrine()->getRepository(User::class)->find($otherUserId);
        if (!$otherUser || !$otherUser->getActive()) {
            return $this->handleView($this->view('User doesn\'t exist', Response::HTTP_NOT_FOUND));
        }

        $queryParams = ['userId' => $user->getId(), 'otherUserId' => $otherUserId];
        $query       = $internalMessageRepository->createQueryBuilder('im')
                                                 ->where('im.to = :userId and im.from = :otherUserId OR im.to = :otherUserId and im.from = :userId')
                                                 ->setParameters($queryParams)
                                                 ->orderBy('im.date', 'DESC')
                                                 ->getQuery();

        $urlParams  = ['otherUserId' => $otherUserId];
        $pager      = $paginator->paginate($query, $page, $pageLimit);
        $pagination = new Pagination($pager, $pageLimit, $urlGenerator);

        $view = $this->view([
            'internalMessages' => $pager->getItems(),
            'totalResults'     => $pagination->totalResults,
            'totalPages'       => $pagination->totalPages,
            'previous'         => $pagination->getPreviousPageURL('getInternalMessages', $urlParams),
            'currentPage'      => $pagination->currentPage,
            'next'             => $pagination->getNextPageURL('getInternalMessages', $urlParams)
        ]);
        $view->getContext()->setGroups(['internal_message', 'user_list']);

        return $this->handleView($view);
    }

    /**
     * @Rest\Post("/api/internal-message")
     *
     * @SWG\Tag(name="Internal Message")
     * @SWG\Post(description="Send a message to a user")
     * 
     * @SWG\Parameter(
     *     name="toId",
     *     required=true,
     *     type="integer",
     *     in="formData"
     * )
     * 
     * @SWG\Parameter(
     *     name="message",
     *     required=true,
     *     type="string",
     *     in="formData",
     * )
     * 
     * @SWG\Response(
     *      response=200,
     *      description="Message sent. Return InternalMessage object.",
     *      @SWG\Schema(ref=@Model(type=InternalMessage::class, groups={"internal_message", "user_list"}))
     * )
     * 
     * @SWG\Response(
     *     response=400, 
     *     description="Missing Required Parameter(s)"
     * )
     * 
     * @SWG\Response(
     *     response="404",
     *     description="User does not exist"
     * )
     * 
     * @SWG\Response(
     *     response="406",
     *     description="You are sending a message to you!"
     * )
     *
     * @param Request                $request
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function sendMessage (Request $request, EntityManagerInterface $em) {
        $user    = $this->getUser();
        $toId    = $request->get('toId');
        $message = $request->get('message');
        
        if (!$toId || !$message) {
            return $this->handleView($this->view('Missing Required Parameter(s)', Response::HTTP_BAD_REQUEST));
        }

        if ($toId == $user->getId()) {
            return $this->handleView($this->view('You are sending a message to you!', Response::HTTP_NOT_ACCEPTABLE));
        }

        $internalMessage = new InternalMessage();
        $toUser          = $this->getDoctrine()->getRepository(User::class)->find($toId);

        if (!$toUser || !$toUser->getActive()) {
            return $this->handleView($this->view('User doesn\'t exist', Response::HTTP_NOT_FOUND));
        }

        $internalMessage->setFrom($user)
                        ->setTo($toUser)
                        ->setMessage($message)
                        ->setIsRead(false)
                        ->setDate();

        $em->persist($internalMessage);
        $em->flush();

        $view = $this->view($internalMessage);
        $view->getContext()->setGroups(['internal_message', 'user_list']);

        return $this->handleView($view);
    }
}
