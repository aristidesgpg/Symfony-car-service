<?php

namespace App\Controller;

use App\Entity\FollowUp;
use App\Entity\User;
use App\Entity\Customer;
use App\Repository\FollowUpRepository;
use App\Response\ValidationResponse;
use App\Service\Pagination;
use App\Service\FollowUpHelper;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Knp\Component\Pager\PaginatorInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class FollowUpController
 *
 * @package App\Controller
 *
 */
class FollowUpController extends AbstractFOSRestController
{
    private const PAGE_LIMIT = 100;

    /**
     * @Rest\Get("/api/follow-up")
     *
     * @SWG\Tag(name="FollowUp")
     * @SWG\Get(description="Get followups")
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
     * @SWG\Parameter(
     *     name="status",
     *     type="string",
     *     description="Get ROs created before supplied date-time",
     *     in="query",
     *     enum={"Created", "Sent", "Viewed", "Converted"}
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
     *  @SWG\Parameter(
     *     name="sortDirection",
     *     type="string",
     *     description="The direction of sort",
     *     in="query",
     *     enum={"ASC", "DESC"}
     * )
     * @SWG\Parameter(
     *     name="searchTerm",
     *     type="string",
     *     description="The available fields are [number, year, make, model, miles, vin] of RepairOrder, [name, phone, email] of primaryCustomer, [name, email, phone] of primaryAdvisor and primaryTechnician",
     *     in="query"
     * )
     * 
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(
     *         type="object",
     *         @SWG\Property(
     *             property="followUps",
     *             type="array",
     *             @SWG\Items(ref=@Model(type=FollowUp::class, groups=FollowUp::GROUPS))
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
     * @param FollowUpRepository     $followUpRepository
     * @param PaginatorInterface    $paginator
     * @param UrlGeneratorInterface $urlGenerator
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function list(
        Request $request,
        FollowUpRepository $followUpRepository,
        PaginatorInterface $paginator,
        UrlGeneratorInterface $urlGenerator,
        EntityManagerInterface $em
    ): Response {
        $page          = $request->query->getInt('page', 1);
        $status        = $request->query->getInt('status');
        $startDate     = $request->query->get('startDate');
        $endDate       = $request->query->get('endDate');
        $urlParameters = [];
        $sortField     = "";
        $sortDirection = "";
        $searchTerm    = "";
        $errors        = [];

        // Invalid page
        if ($page < 1) {
            throw new NotFoundHttpException();
        }

        $columns = $em->getClassMetadata('App\Entity\FollowUp')->getFieldNames();

        if ($request->query->has('sortField') && $request->query->has('sortDirection')) {
            $sortField                      = $request->query->get('sortField');

            //check if the sortfield exist
            if (!in_array($sortField, $columns))
                $errors['sortField'] = 'Invalid sort field name';

            $sortDirection                  = $request->query->get('sortDirection');

            $urlParameters['sortDirection'] = $sortDirection;
            $urlParameters['sortField']     = $sortField;
        }

        if ($request->query->has('searchTerm')) {
            $searchTerm                     = $request->query->get('searchTerm');

            $urlParameters['searchTerm']    = $searchTerm;
        }

        if (!empty($errors)) {
            return new ValidationResponse($errors);
        }

        $followUpQuery = $followUpRepository->getAllItems($startDate, $endDate, $status,  $sortField, $sortDirection, $searchTerm);
        $pageLimit    = $request->query->getInt('pageLimit', self::PAGE_LIMIT);
        $pager        = $paginator->paginate($followUpQuery, $page, $pageLimit);
        $pagination   = new Pagination($pager, $pageLimit, $urlGenerator);

        $json = [
            'followUps'    => $pager->getItems(),
            'totalResults' => $pagination->totalResults,
            'totalPages'   => $pagination->totalPages,
            'previous'     => $pagination->getPreviousPageURL('app_followup_list', $urlParameters),
            'currentPage'  => $pagination->currentPage,
            'next'         => $pagination->getNextPageURL('app_followup_list', $urlParameters)
        ];

        $view = $this->view($json);

        $view->getContext()->setGroups(FollowUp::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Post("/api/follow-up/view")
     *
     * @SWG\Tag(name="FollowUp")
     * @SWG\Patch(description="Update a Followup and create a new FollowupInteraction")
     *
     * @SWG\Response(response="200", description="Success!")
     *
     *
     * @param FollowUp                $followup
     * @param FollowUpHelper          $helper
     * @param EntityManagerInterface  $em
     *
     * @return Response
     */

    public function viewed(Followup $followup, FollowUpHelper $helper)
    {
        $user    = $this->getUser();

        if (!$user instanceof Customer) {
            return $this->handleView($this->view('The type of user should be Customer.', Response::HTTP_BAD_REQUEST));
        }

        $helper->updateFollowUp($followup, $user, 'Viewed');

        return $this->handleView($this->view([
            'message' => 'Success'
        ], Response::HTTP_OK));
    }

    /**
     * @Rest\Patch("/api/follow-up/{id}/converted")
     *
     * @SWG\Tag(name="FollowUp")
     * @SWG\Patch(description="Update a Followup and create a new FollowupInteraction")
     *
     * @SWG\Response(response="200", description="Success!")
     *
     *
     * @param FollowUp                $followup
     * @param FollowUpHelper          $helper
     * @param EntityManagerInterface  $em
     *
     * @return Response
     */

    public function converted(Followup $followup, FollowUpHelper $helper)
    {
        $user    = $this->getUser();

        if (!$user instanceof Customer) {
            throw new NotAcceptableHttpException('The type of user should be Customer.');
        }

        $helper->updateFollowUp($followup, $user, 'Converted');

        return $this->handleView($this->view([
            'message' => 'Success'
        ], Response::HTTP_OK));
    }
}
