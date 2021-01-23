<?php

namespace App\Controller;

use App\Entity\CheckIn;
use App\Repository\CheckInRepository;
use App\Response\ValidationResponse;
use App\Service\CheckInHelper;
use App\Service\Pagination;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Knp\Component\Pager\PaginatorInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class CheckInController extends AbstractFOSRestController
{
    private const PAGE_LIMIT = 100;

    /**
     * @Rest\Get("/api/check-in")
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
     * @SWG\Parameter(
     *     name="endDate",
     *     type="string",
     *     format="date-time",
     *     description="Get ROs created before supplied date-time",
     *     in="query"
     * )
     * @SWG\Parameter(name="page", type="integer", in="query")
     * @SWG\Parameter(
     *     name="pageLimit",
     *     type="integer",
     *     description="Page Limit",
     *     in="query"
     * )
     * @SWG\Parameter(
     *     name="sortField",
     *     type="string",
     *     description="The name of sort field",
     *     in="query"
     * )
     * @SWG\Parameter(
     *     name="sortDirection",
     *     type="string",
     *     description="The direction of sort",
     *     in="query",
     *     enum={"ASC", "DESC"}
     * )
     * @SWG\Parameter(
     *     name="searchTerm",
     *     type="string",
     *     description="The value of search",
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
     */
    public function list(
        Request $request,
        CheckInRepository $checkInRepository,
        PaginatorInterface $paginator,
        UrlGeneratorInterface $urlGenerator,
        EntityManagerInterface $em
    ): Response {
        $page = $request->query->getInt('page', 1);
        $startDate = $request->query->get('startDate');
        $endDate = $request->query->get('endDate');
        $pageLimit = $request->query->getInt('pageLimit', self::PAGE_LIMIT);
        $urlParameters = [];
        $sortField = '';
        $sortDirection = '';
        $searchTerm = '';
        $errors = [];
        
        $columns = $em->getClassMetadata('App\Entity\CheckIn')->getFieldNames();
        $userColumns = $em->getClassMetadata('App\Entity\User')->getFieldNames();

        // Invalid page
        if ($page < 1) {
            throw new NotFoundHttpException();
        }

        // Invalid page limit
        if ($pageLimit < 1) {
            return $this->handleView($this->view('Invalid Page Limit', Response::HTTP_BAD_REQUEST));
        }

        if ($request->query->has('sortField') && $request->query->has('sortDirection')) {
            $sortField = $request->query->get('sortField');

            //check if the sortField exist
            if (!in_array($sortField, $columns)) {
                $errors['sortField'] = 'Invalid sort field name';
            }

            $sortDirection = $request->query->get('sortDirection');

            $urlParameters['sortDirection'] = $sortDirection;
            $urlParameters['sortField'] = $sortField;
        }

        if ($request->query->has('searchTerm')) {

            $searchTerm = $request->query->get('searchTerm');

            $urlParameters['searchTerm'] = $searchTerm;
        }

        if (!empty($errors)) {
            return new ValidationResponse($errors);
        }

        $checkInQuery = $checkInRepository->getAllItems(
            $startDate,
            $endDate,
            $sortField,
            $sortDirection,
            $searchTerm,
            $columns,
            $userColumns
        );
        $pager = $paginator->paginate($checkInQuery, $page, $pageLimit);
        $pagination = new Pagination($pager, $pageLimit, $urlGenerator);

        $json = [
            'results' => $pager->getItems(),
            'totalResults' => $pagination->totalResults,
            'totalPages' => $pagination->totalPages,
            'previous' => $pagination->getPreviousPageURL('app_checkin_list', $urlParameters),
            'currentPage' => $pagination->currentPage,
            'next' => $pagination->getNextPageURL('app_checkin_list', $urlParameters),
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

    public function new(Request $request, CheckInHelper $helper, EntityManagerInterface $em)
    {
        $file = $request->files->get('video');
        $identification = $request->get('identification');

        if (!$file instanceof UploadedFile) {
            return new ValidationResponse(['video' => 'File upload failed']);
        } else {
            if ($file->getError() !== UPLOAD_ERR_OK) {
                return new ValidationResponse(['video' => $file->getErrorMessage()]);
            }
        }

        $user = $this->getUser();
        $video = $helper->createVideo($file);
        $checkin = new CheckIn();

        $checkin->setIdentification($identification);
        $checkin->setVideo($video);
        $checkin->setDate(new DateTime());
        $checkin->setUser($user);

        $em->persist($checkin);
        $em->flush();

        $view = $this->view($checkin);
        $view->getContext()->setGroups(CheckIn::GROUPS);

        return $this->handleView($view);
    }

}
