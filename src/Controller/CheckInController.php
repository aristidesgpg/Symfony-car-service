<?php

namespace App\Controller;

use App\Entity\CheckIn;
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
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ORM\EntityManagerInterface;

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
     * @Rest\Get(name="getCheckIns")
     * 
     * @SWG\Tag(name="CHECKin")
     * @SWG\Get(description="Get checkins")
     * 
     * @SWG\Parameter(
     *     name="startDate",
     *     type="string",
     *     format="date-time",
     *     description="Get ROs created after supplied date-time",
     *     in="query"
     * )
     * 
     * @SWG\Parameter(
     *     name="endDate",
     *     type="string",
     *     format="date-time",
     *     description="Get ROs created before supplied date-time",
     *     in="query"
     * )
     * 
     * @SWG\Parameter(
     *     name="page",
     *     type="integer",
     *     description="Page number",
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
     * 
     * @SWG\Response(
     *     response="404",
     *     description="Invalid page parameter"
     * )
     * 
     * @SWG\Response(
     *     response="406",
     *     description="Page limit must be a positive non-zero integer"
     * )
     *
     * @param Request               $request
     * @param CheckInRepository     $checkInRepository
     * @param PaginatorInterface    $paginator
     * @param UrlGeneratorInterface $urlGenerator
     *
     * @return Response
     */
    public function list (Request $request, CheckInRepository $checkInRepository,
                          PaginatorInterface $paginator, UrlGeneratorInterface $urlGenerator): Response {
        $page          = $request->query->getInt('page', 1);
        $startDate     = $request->query->get('startDate');
        $endDate       = $request->query->get('endDate');
        $pageLimit     = $request->query->getInt('pageLimit', self::PAGE_LIMIT);
        $urlParameters = [];

        // Invalid page
        if ($page < 1) {
            throw new NotFoundHttpException();
        }

        if ($pageLimit < 1) {
            return $this->handleView($this->view("Page limit must be a positive non-zero integer", Response::HTTP_NOT_ACCEPTABLE));
        }

        $checkInQuery = $checkInRepository->getAllItems($startDate, $endDate);
        $pager        = $paginator->paginate($checkInQuery, $page, $pageLimit);
        $pagination   = new Pagination($pager, $pageLimit, $urlGenerator);

        $json = [
            'checkIns'     => $pager->getItems(),
            'totalResults' => $pagination->totalResults,
            'totalPages'   => $pagination->totalPages,
            'previous'     => $pagination->getPreviousPageURL('getCheckIns', $urlParameters),
            'currentPage'  => $pagination->currentPage,
            'next'         => $pagination->getNextPageURL('getCheckIns', $urlParameters)
        ];

        $view = $this->view($json);

        $view->getContext()->setGroups(CheckIn::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Post("/api/check-in")
     *
     * @SWG\Tag(name="CHECKin")
     * @SWG\Post(description="Create a chekin")
     *
     * @SWG\Parameter(
     *     name="identification",
     *     type="string",
     *     description="Identification of the vehicle",
     *     in="formData",
     *     required=true
     * )
     * @SWG\Parameter(
     *     name="video",
     *     type="file",
     *     in="formData",
     *     required=true
     * )
     *
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(type="object", ref=@Model(type=CheckIn::class, groups=CheckIn::GROUPS))
     * )
     *
     * @SWG\Response(
     *     response="404",
     *     description="Invalid page parameter"
     * )
     *
     * @param Request                $request
     * @param CheckInHelper          $helper
     * @param EntityManagerInterface $em
     *
     * @return Response
     */

    public function new (Request $request, CheckInHelper $helper, EntityManagerInterface $em) {
        $file           = $request->files->get('video');
        $identification = $request->get('identification');

        if (!$file instanceof UploadedFile) {
            return new ValidationResponse(['video' => 'File upload failed']);
        } else if ($file->getError() !== UPLOAD_ERR_OK) {
            return new ValidationResponse(['video' => $file->getErrorMessage()]);
        }

        $user    = $this->getUser();
        $video   = $helper->createVideo($file);
        $checkin = new CheckIn();

        $checkin->setIdentification($identification);
        $checkin->setVideo($video);
        $checkin->setDate(new \DateTime());
        $checkin->setUser($user);
        
        $em->persist($checkin);
        $em->flush();

        $view = $this->view($checkin);
        $view->getContext()->setGroups(CheckIn::GROUPS);

        return $this->handleView($view);
    }

}
