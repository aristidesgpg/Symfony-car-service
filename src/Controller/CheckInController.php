<?php

namespace App\Controller;

use App\Entity\CheckIn;
use App\Entity\User;
use App\Repository\CheckInRepository;
use App\Response\ValidationResponse;
use App\Service\Pagination;
use App\Service\CheckInHelper;
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
 * Class CheckInController
 *
 * @package App\Controller
 * 
 */
class CheckInController extends AbstractFOSRestController {
    private const PAGE_LIMIT = 100;

    /**
     * @Rest\Get("/api/check-in")
     *
     * @SWG\Tag(name="CheckIns")
     * @SWG\Get(description="Get checkins")
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
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(
     *         type="object",
     *         @SWG\Property(
     *             property="checkIns",
     *             type="array",
     *             @SWG\Items(ref=@Model(type=CheckIn::class, groups=CheckIn::GROUPS))
     *         ),
     *         @SWG\Property(property="totalResults", type="integer", description="Total # of results found"),
     *         @SWG\Property(property="totalPages", type="integer", description="Total # of pages of results"),
     *         @SWG\Property(property="previous", type="string", description="URL for previous page"),
     *         @SWG\Property(property="currentPage", type="integer", description="Current page #"),
     *         @SWG\Property(property="next", type="string", description="URL for next page")
     *     )
     * )
     * @SWG\Response(
     *     response="404",
     *     description="Invalid page parameter"
     * )
     *
     * @param Request               $request
     * @param CheckInRepository     $checkInRepository
     * @param PaginatorInterface    $paginator
     * @param UrlGeneratorInterface $urlGenerator
     *
     * @return Response
     */
    public function getAll (Request $request, CheckInRepository $checkInRepository,
                            PaginatorInterface $paginator, UrlGeneratorInterface $urlGenerator): Response {
        $page          = $request->query->getInt('page', 1);
        $urlParameters = [];
        $startDate     = $request->query->get('startDate');
        $endDate       = $request->query->get('endDate');

        // Invalid page
        if ($page < 1) {
            throw new NotFoundHttpException();
        }

        $checkInQuery  = $checkInRepository->getAllItems(startDate, endDate);

        $pageLimit     = $request->query->getInt('pageLimit', self::PAGE_LIMIT);

        $pager         = $paginator->paginate($checkInQuery, $page, $pageLimit);
        $pagination    = new Pagination($pager, $pageLimit, $urlGenerator);

        $json = [
            'checkIns'     => $pager->getItems(),
            'totalResults' => $pagination->totalResults,
            'totalPages'   => $pagination->totalPages,
            'previous'     => $pagination->getPreviousPageURL('getCheckIns', $urlParameters),
            'currentPage'  => $pagination->currentPage,
            'next'         => $pagination->getNextPageURL('getCheckIns', $urlParameters)
        ];

        $view         = $this->view($json);
        $view->getContext()->setGroups(CheckIn::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Post("/api/check-in")
     *
     * @SWG\Tag(name="CheckIn")
     * @SWG\Post(description="Create a chekin")
     * 
     * @SWG\Parameter(
     *     name="identification",
     *     type="string",
     *     description="Identification of customer",
     *     in="formData",
     *     required=true
     * )
     * 
     * @SWG\Parameter(
     *     name="video", 
     *     type="file", 
     *     in="formData", 
     *     required=true
     * )
     * 
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "Successfully created" }),
     *         )
     * )
     * 
     * @SWG\Response(
     *     response="404",
     *     description="Invalid page parameter"
     * )
     * 
     * @param Request               $request
     * @param CheckInRepository     $checkInRepository
     * @param PaginatorInterface    $paginator
     * @param UrlGeneratorInterface $urlGenerator
     *
     * @return Response
     */

    public function createCheckIn (Request $request, CheckInHelper $helper) {
        $file           = $request->files->get('video');
        $identification = $request->get('identification');
        if (!$file instanceof UploadedFile) {
            return new ValidationResponse(['video' => 'File upload failed']);
        } elseif ($file->getError() !== UPLOAD_ERR_OK) {
            return new ValidationResponse(['video' => $file->getErrorMessage()]);
        }
        $user  = $this->getUser();
        
        $video = $helper->createVideo($file);

        $ch    = $helper->createCheckIn(['identification' => $identification, 'video' => $video, 'user_id' => $user->getId() ]);
        
        // $view = $this->view($ch);
        // $view->getContext()->setGroups(CheckIn::GROUPS);

        return $this->handleView($this->view('Checkin Created', Response::HTTP_OK));
    }

}
