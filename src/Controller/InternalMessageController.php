<?php

namespace App\Controller;

use App\Repository\InternalMessageRepository;
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
 * Class InternalMessageController
 *
 * @package App\Controller
 */
class InternalMessageController extends AbstractFOSRestController
{
    private const PAGE_LIMIT = 25;

    /**
     * @Rest\Get("/api/internal-messaging/conversations")
     * @Rest\Get(name="getInternalConversations")
     * 
     * @SWG\Tag(name="Internal Message")
     * @SWG\Get(description="Get the list of conversations between multiple customers")
     * @SWG\Parameter(
     *     name="page",
     *     required=false,
     *     type="integer",
     *     in="query"
     * )
     * @SWG\Response(
     *      response=200,
     *      description="Return the list of conversations",
     *      @SWG\Schema(
     *          type="object",
     *          @SWG\Property(
     *              property="conversations",
     *              type="array",
     *              @SWG\Items(
     *                  @SWG\Property(
     *                      property="opponnetUser",
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
     * @param Request                   $request
     * @param PaginatorInterface        $paginator
     * @param UrlGeneratorInterface     $urlGenerator
     * 
     * @return Response
     */
    public function getConversations(Request $request, PaginatorInterface $paginator, UrlGeneratorInterface $urlGenerator, EntityManagerInterface $em)
    {
        $userId     = $this->getUser()->getId();
        $page       = $request->query->getInt('page', 1);

        if ($page < 1) {
            throw new NotFoundHttpException();
        }
        
        $sql = "
            SELECT u.*, i.*, COUNT(case i.is_read when 0 then 1 ELSE 0 END) AS unreads FROM internal_message i 
            LEFT JOIN user u
            ON u.id = case when i.to_id = {$userId} then i.from_id when i.from_id = {$userId} then i.to_id END
            WHERE i.from_id = {$userId} OR i.to_id = {$userId} 
            GROUP BY case when i.to_id = {$userId} then i.from_id when i.from_id = {$userId} then i.to_id END
            ORDER BY i.is_read ASC, i.date DESC;
        ";

        $query = $em->getConnection()->prepare($sql);
        
        $query->execute();
        
        $result = $query->fetchAllAssociative();
        
        $urlParams  = ['page' => $page];
        $pager      = $paginator->paginate($this->getThreads($result), $page, self::PAGE_LIMIT);
        $pagination = new Pagination($pager, self::PAGE_LIMIT, $urlGenerator);

        $view       = $this->view([
            'conversations'     => $pager->getItems(),
            'totalResults'      => $pagination->totalResults,
            'totalPages'        => $pagination->totalPages,
            'previous'          => $pagination->getPreviousPageURL('getInternalConversations', $urlParams),
            'currentPage'       => $pagination->currentPage,
            'next'              => $pagination->getNextPageURL('getInternalConversations', $urlParams)
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
     *     name="opponentUserId",
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
    public function getMessagesNewest(Request $request, InternalMessageRepository $internalMessageRepository, PaginatorInterface $paginator, UrlGeneratorInterface $urlGenerator)
    {
        $user           = $this->getUser();
        $page           = $request->query->getInt('page', 1);
        $opponentUserId = $request->query->get('opponentUserId');

        if ($page < 1) {
            throw new NotFoundHttpException();
        }

        $queryParams    = ['userId' => $user->getId(), 'opponentUserId' => $opponentUserId];
        $query          = $internalMessageRepository->createQueryBuilder('im')
                                           ->where('im.to = :userId')
                                           ->andWhere('im.from = :opponentUserId')
                                           ->setParameters($queryParams)
                                           ->orderBy('im.date', 'DESC')
                                           ->getQuery();
                                           dd($query);

        $urlParams  = ['opponentUserId' => $opponentUserId];
        $pager      = $paginator->paginate($query, $page, self::PAGE_LIMIT);
        $pagination = new Pagination($pager, self::PAGE_LIMIT, $urlGenerator);

        $view       = $this->view([
            'internalMessages'  => $pager->getItems(),
            'totalResults'      => $pagination->totalResults,
            'totalPages'        => $pagination->totalPages,
            'previous'          => $pagination->getPreviousPageURL('getInternalMessages', $urlParams),
            'currentPage'       => $pagination->currentPage,
            'next'              => $pagination->getNextPageURL('getInternalMessages', $urlParams)
        ]);
        $view->getContext()->setGroups(['internal_message']);

        return $this->handleView($view);
    }

    /**
     * @param array
     * 
     * @return array
     */
    public function getThreads($threads)
    {
        $return = [];
        foreach ($threads as &$thread) {
            $return[] = [
                "user" => [
                    "id" => $thread["id"],
                    "first_name" => $thread["first_name"],
                    "last_name" => $thread["last_name"],
                    "email" => $thread["email"],
                    "phone" => $thread["phone"],
                    "role" => $thread["role"],
                    "certification" => $thread["certification"],
                    "experience" => $thread["experience"],
                    "last_login" => $thread["last_login"],
                    "active" => $thread["active"],
                    "pin" => $thread["pin"]
                ],
                "message" => [
                    "from_id" => $thread["from_id"],
                    "to_id" => $thread["to_id"],
                    "message" => $thread["message"],
                    "date" => $thread["date"],
                    "is_read" => $thread["is_read"]
                ],
                "unreads" => $thread["unreads"]
            ];
        }

        return $return;
    }
}
