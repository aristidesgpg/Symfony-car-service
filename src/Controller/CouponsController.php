<?php

namespace App\Controller;

use App\Repository\CouponRepository;
use App\Service\ImageUploader;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Swagger\Annotations as SWG;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Entity\Coupon;
use App\Service\Pagination;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use App\Response\ValidationResponse;

/**
 * Class CouponsController
 *
 * @package App\Controller
 */
class CouponsController extends AbstractFOSRestController {
    private const PAGE_LIMIT = 100;
    /**
     * @Rest\Get("/api/coupons")
     *
     * @SWG\Tag(name="Coupons")
     * @SWG\Get(description="Get all coupons")
     * 
     * @SWG\Parameter(name="page", type="integer", in="query")
     * 
     * @SWG\Parameter(
     *     name="pageLimit",
     *     type="integer",
     *     description="Page Limit",
     *     in="query"
     * )
     *  @SWG\Parameter(
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
     *  @SWG\Parameter(
     *     name="searchField",
     *     type="string",
     *     description="The name of search field",
     *     in="query"
     * )
     * @SWG\Parameter(
     *     name="searchTerm",
     *     type="string",
     *     description="The value of search",
     *     in="query"
     * )
     * @SWG\Response(
     *     response=200,
     *     description="Return coupons",
     *     @SWG\Items(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Coupon::class, groups={"coupon_list"})),
     *         @SWG\Property(property="totalResults", type="integer", description="Total # of results found"),
     *         @SWG\Property(property="totalPages", type="integer", description="Total # of pages of results"),
     *         @SWG\Property(property="previous", type="string", description="URL for previous page"),
     *         @SWG\Property(property="currentPage", type="integer", description="Current page #"),
     *         @SWG\Property(property="next", type="string", description="URL for next page"),
     *         description="id, title, image"
     *     )
     * )
     *
     * @SWG\Response(response="404", description="Invalid page parameter")
     * @SWG\Response(response="406", ref="#/responses/ValidationResponse")
     * 
     * @param Request                $request
     * @param EntityManagerInterface $em
     * @param CouponRepository       $couponRepository
     *
     * @param PaginatorInterface    $paginator
     * @param UrlGeneratorInterface $urlGenerator
     * @return Response
     */
    public function list (Request $request,EntityManagerInterface $em, CouponRepository $couponRepository,PaginatorInterface $paginator,
    UrlGeneratorInterface $urlGenerator) {
        $page            = $request->query->getInt('page', 1);
        $urlParameters   = [];
        $queryParameters = [];
        $errors          = [];
        $sortField       = "";
        $sortDirection   = "";
        $searchField     = "";
        $searchTerm      = "";

        if ($page < 1) {
            throw new NotFoundHttpException();
        }

        $columns                        = $em->getClassMetadata('App\Entity\Coupon')->getFieldNames();

        if($request->query->has('sortField') && $request->query->has('sortDirection'))
        {
            $sortField                  = $request->query->get('sortField');
            
            //check if the sortfield exist
            if(!in_array($sortField, $columns))
                $errors['sortField']   = 'Invalid sort field name';
            
            $sortDirection             = $request->query->get('sortDirection');
        }

        if($request->query->has('searchField') && $request->query->has('searchTerm'))
        {
            $searchField               = $request->query->get('searchField');
           
            //check if the searchfield exist
            if(!in_array($searchField, $columns))
                $errors['searchField'] = 'Invalid search field name';

            $searchTerm  = $request->query->get('searchTerm');
        }

        if (!empty($errors)) {
            return new ValidationResponse($errors);
        }

        $qb = $couponRepository->createQueryBuilder('co');
        $qb->andWhere('co.deleted = 0');

        if($searchTerm)
        {
            $qb->andWhere('co.'.$searchField.' LIKE :searchTerm');
            $queryParameters['searchTerm']  = '%'.$searchTerm.'%';
            
            $urlParameters['searchField']   = $searchField;
            $urlParameters['searchTerm']    = $searchTerm;
        }
       
        if($sortDirection)
        {
            $qb->orderBy('co.'.$sortField, $sortDirection);

            $urlParameters['sortField']     = $sortField;
            $urlParameters['sortDirection'] = $sortDirection;
        }

        $q = $qb->getQuery();
        $q->setParameters($queryParameters);

        $pageLimit      = $request->query->getInt('pageLimit', self::PAGE_LIMIT);

        $pager          = $paginator->paginate($q, $page, $pageLimit);
        $pagination     = new Pagination($pager, $pageLimit, $urlGenerator);

        $view = $this->view([
            'coupons'      => $pager->getItems(),
            'totalResults' => $pagination->totalResults,
            'totalPages'   => $pagination->totalPages,
            'previous'     => $pagination->getPreviousPageURL('app_coupons_list', $urlParameters),
            'currentPage'  => $pagination->currentPage,
            'next'         => $pagination->getNextPageURL('app_coupons_list', $urlParameters)
        ]);
        
        $view->getContext()->setGroups(['coupon_list']);

        return $this->handleView($view);
    }

    /**
     * @Rest\Post("/api/coupons")
     *
     * @SWG\Tag(name="Coupons")
     * @SWG\Post(description="Create a coupon")
     * @SWG\Parameter(
     *     name="title",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The title of coupon",
     * )
     *
     * @SWG\Parameter(
     *     name="image",
     *     in="formData",
     *     required=true,
     *     type="file",
     *     description="The image of coupon",
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
     * @param EntityManagerInterface $em
     * @param Request                $request
     * @param ImageUploader          $imageUploader
     *
     * @return Response
     */
    public function new (EntityManagerInterface $em, Request $request, ImageUploader $imageUploader) {
        $title = $request->get('title');
        $image = $request->files->get('image');

        // Validation
        if (!$title || !$image || !$image instanceof UploadedFile) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        $path = $imageUploader->uploadImage($image, 'coupons');
        if (!$path) {
            return $this->handleView($this->view('Something Went Wrong Trying to Upload the Image', Response::HTTP_INTERNAL_SERVER_ERROR));
        }

        $coupon = new Coupon();
        $coupon->setTitle($title)->setImage($path);
        $em->persist($coupon);
        $em->flush();

        return $this->handleView($this->view('Coupon Created', Response::HTTP_OK));
    }

    /**
     * @Rest\Put("/api/coupons/{id}")
     *
     * @SWG\Tag(name="Coupons")
     * @SWG\Put(description="Update a coupon")
     * @SWG\Parameter(
     *     name="title",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The title of coupon",
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
     * @param Coupon                 $coupon
     * @param Request                $request
     * @param EntityManagerInterface $em
     * @param ImageUploader          $imageUploader
     *
     * @return Response
     */
    public function edit (Coupon $coupon, Request $request, EntityManagerInterface $em,
                          ImageUploader $imageUploader) {
        $title = $request->get('title');

        // Validation
        if (!$title) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        $coupon->setTitle($title);
        
        $em->persist($coupon);
        $em->flush();

        return $this->handleView($this->view('Coupon Updated', Response::HTTP_OK));
    }

    /**
     * @Rest\Delete("/api/coupons/{id}")
     *
     * @SWG\Tag(name="Coupons")
     * @SWG\Delete(description="Delete a coupon")
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "Successfully deleted" }),
     *         )
     * )
     *
     * @param Coupon                 $coupon
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function delete (Coupon $coupon, EntityManagerInterface $em) {
        $coupon->setDeleted(true);

        $em->persist($coupon);
        $em->flush();

        return $this->handleView($this->view('Coupon Deleted', Response::HTTP_OK));
    }

}
