<?php

namespace App\Controller;

use App\Helper\iServiceLoggerTrait;
use App\Repository\InternalMessageRepository;
use App\Service\InternalMessageHelper;
use Doctrine\DBAL\Driver\Exception as DoctrineException;
use Exception;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
     * @param Request                $request
     * @param EntityManagerInterface $em
     * @param InternalMessageHelper  $internalMessageHelper
     *
     * @return View|Response
     */
    public function getThreads (Request $request, EntityManagerInterface $em, InternalMessageHelper $internalMessageHelper) {
        $userId = $this->getUser()->getId();
        $page   = $request->query->getInt('page', 1);

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

        try {
            $query = $em->getConnection()->prepare($sql);
        } catch (Exception $e) {
            return $this->view('Error trying to prepare MySQL query', Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        try {
            $query->execute();
            $result = $query->fetchAllAssociative();
        } catch (DoctrineException $e) {
            return $this->view('Error trying to execute MySQL query', Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        $urlParams      = ['page' => $page];
        $pageUrlText    = 'getInternalThreads';
        $pageData       = $internalMessageHelper->getThreadsFromArray($result);

        $view = $this->view($internalMessageHelper->getPaginationView($pageData, $page, $urlParams, self::PAGE_LIMIT, $pageUrlText));
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
     * @param InternalMessageHelper     $internalMessageHelper
     *
     * @return Response
     */
    public function getMessagesNewest (Request $request, InternalMessageRepository $internalMessageRepository, InternalMessageHelper $internalMessageHelper) {
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

        $urlParams      = ['otherUserId' => $otherUserId];
        $pageUrlText    = 'getInternalMessages';

        $view = $this->view($internalMessageHelper->getPaginationView($query, $page, $urlParams, self::PAGE_LIMIT, $pageUrlText));
        $view->getContext()->setGroups(['internal_message']);

        return $this->handleView($view);
    }
}
