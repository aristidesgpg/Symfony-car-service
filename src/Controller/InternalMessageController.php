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
     * @param InternalMessageRepository $internalMessageRepository
     * @param PaginatorInterface        $paginator
     * @param UrlGeneratorInterface     $urlGenerator
     * 
     * @return Response
     */
    public function getConversations(Request $request, InternalMessageRepository $internalMessageRepository, PaginatorInterface $paginator, UrlGeneratorInterface $urlGenerator, EntityManagerInterface $em)
    {
        $userId       = $this->getUser()->getId();
        $page       = $request->query->getInt('page', 1);

        if ($page < 1) {
            throw new NotFoundHttpException();
        }
        
        $sql = "
            SELECT p1.* 
            FROM internal_message p1
            Inner JOIN
            (
                select reference_id, max(date) MaxDate, id, date, is_read
                from
                (
                    select from_id as reference_id, id, date, is_read
                    from internal_message
                    WHERE to_id={$userId}
                    union all
                    select to_id as reference_id, id, date, is_read
                    from internal_message
                    WHERE from_id={$userId}
                ) t
                group by reference_id
            ) p2
            ON p1.date = p2.MaxDate
            order BY p1.is_read DESC, p1.date DESC
        ";

        $query = $em->getConnection()->prepare($sql);
        $query->execute();
        $result = $query->fetchAllAssociative();
        
        $view       = $this->view($result);
        $view->getContext()->setGroups(['internal_message']);

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
     *     in="query"
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

        $urlParams      = $queryParams  = ['userId' => $user->getId(), 'opponentUserId' => $opponentUserId];
        $query          = $internalMessageRepository->createQueryBuilder('im')
                                           ->where('im.to = :userId')
                                           ->andWhere('im.from = :opponentUserId')
                                           ->setParameters($queryParams)
                                           ->orderBy('im.date', 'DESC')
                                           ->getQuery();

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
}
