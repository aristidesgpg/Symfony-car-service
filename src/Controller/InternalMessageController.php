<?php

namespace App\Controller;

use App\Repository\InternalMessageRepository;
use App\Service\Pagination;
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
     * @Rest\Get("/api/internal-messaging")
     * 
     * @SWG\Tag(name="Internal Message")
     * @SWG\Get(description="Get the list of conversations of the logged in user")
     * @SWG\Response(
     *      response=200,
     *      description="Return the list of conversations",
     *      @SWG\Items(
     *          type="object",
     *          @SWG\Property(property="internal", type="integer", description="Total # of unread internal messages"),
     *          @SWG\Property(property="service", type="integer", description="Total # of unread service messages"),
     *          @SWG\Property(property="sales", type="integer", description="Total # of unread sales messages")
     *      )
     * )
     * 
     * 
     * @return Response
     */
    public function getConversations()
    {
        $user = $this->getUser();

    }

    /**
     * @Rest\Get("/api/internal-messaging/newest")
     * @Rest\Get(name="getInternalMessages")
     * 
     * @SWG\Tag(name="Internal Message")
     * @SWG\Get(description="Get the list of newest conversations")
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
     *      description="Return the list of conversations",
     *      @SWG\Items(
     *          type="object",
     *          @SWG\Property(
     *              property="items",
     *              type="array",
     *              @SWG\Items(ref=@Model(InternalMessage::class, groups=['internal_message']))
     *          )
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
    public function getConversationsNewest(Request $request, InternalMessageRepository $internalMessageRepository, PaginatorInterface $paginator, UrlGeneratorInterface $urlGenerator)
    {
        $user           = $this->getUser();
        $page           = $request->query->getInt('page', 1);
        $opponentUserId = $request->query->get('opponentUserId');

        if ($page < 1) {
            throw new NotFoundHttpException();
        }

        $urlParams = $queryParams    = ['userId' => $user->getId(), 'opponentUserId' => $opponentUserId];
        $query = $internalMessageRepository->createQueryBuilder('im')
                                           ->where('im.to = :userId')
                                           ->andWhere('im.from = :opponentUserId')
                                           ->setParameters($queryParams)
                                           ->orderBy('im.date', 'DESC')
                                           ->getQuery();

        $pager = $paginator->paginate($query, $page, self::PAGE_LIMIT);
        $pagination = new Pagination($pager, self::PAGE_LIMIT, $urlGenerator);

        $view = $this->view([
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
