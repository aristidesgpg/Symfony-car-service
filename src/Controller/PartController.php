<?php

namespace App\Controller;

use App\Entity\Part;
use App\Repository\PartRepository;
use App\Service\Pagination;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Knp\Component\Pager\PaginatorInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class PartController extends AbstractFOSRestController
{
    private const PAGE_LIMIT = 100;

    /**
     * @Rest\Get("/api/parts")
     *
     * @SWG\Tag(name="Parts")
     * @SWG\Get(description="Get All Parts")
     *
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
     *     description="The value of search.  The available fields are number, name and bin",
     *     in="query"
     * 
     * )
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return Parts",
     *     @SWG\Items(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Part::class, groups={"part_list"})),
     *         @SWG\Property(property="totalResults", type="integer", description="Total # of results found"),
     *         @SWG\Property(property="totalPages", type="integer", description="Total # of pages of results"),
     *         @SWG\Property(property="previous", type="string", description="URL for previous page"),
     *         @SWG\Property(property="currentPage", type="integer", description="Current page #"),
     *         @SWG\Property(property="next", type="string", description="URL for next page"),
     *     )
     * )
     *
     * @SWG\Response(response="404", description="Invalid page parameter")
     * @SWG\Response(response="400", description="Invalid sort field")
     *
     * @return Response
     */
    public function getParts(
        Request $request,
        PartRepository $partRepo,
        PaginatorInterface $paginator,
        UrlGeneratorInterface $urlGenerator,
        EntityManagerInterface $em
    ) {
        $page = $request->query->getInt('page', 1);
        $urlParameters = [];
        $errors = [];
        $sortField = '';
        $sortDirection = '';
        $searchTerm = '';
        $columns = $em->getClassMetadata('App\Entity\Part')->getFieldNames();

        if ($page < 1) {
            throw new NotFoundHttpException();
        }

        if ($request->query->has('sortField') && $request->query->has('sortDirection')) {
            $sortField = $request->query->get('sortField');

            //check if the sortField exist
            if (!in_array($sortField, $columns)) {
                $errors['sortField'] = 'Invalid sort field name';
            }

            $sortDirection = $request->query->get('sortDirection');
            $urlParameters['sortField'] = $sortField;
            $urlParameters['sortDirection'] = $sortDirection;
        }

        if ($request->query->has('searchTerm')) {
            $searchTerm = $request->query->get('searchTerm');

            $urlParameters['searchTerm'] = $searchTerm;
        }

        if (!empty($errors)) {
            throw new BadRequestHttpException('Invalid sort field name');
        }

        $parts = $partRepo->getParts(
            $sortField,
            $sortDirection,
            $searchTerm
        );

        $pageLimit = $request->query->getInt('pageLimit', self::PAGE_LIMIT);

        $pager = $paginator->paginate($parts, $page, $pageLimit);
        $pagination = new Pagination($pager, $pageLimit, $urlGenerator);

        $view = $this->view(
            [
                'results' => $pager->getItems(),
                'totalResults' => $pagination->totalResults,
                'totalPages' => $pagination->totalPages,
                'previous' => $pagination->getPreviousPageURL('app_part_getparts', $urlParameters),
                'currentPage' => $pagination->currentPage,
                'next' => $pagination->getNextPageURL('app_part_getparts', $urlParameters),
            ]
        );
        $view->getContext()->setGroups(['part_list']);

        return $this->handleView($view);
    }

    /**
     * @Rest\Post("/api/parts")
     *
     * @SWG\Tag(name="Parts")
     * @SWG\Post(description="Create a Part")
     *
     * @SWG\Parameter(
     *     name="number",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Number for Part",
     * )
     * @SWG\Parameter(
     *     name="name",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Name for Part",
     * )
     * @SWG\Parameter(
     *     name="bin",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The bin for Part",
     * )
     * @SWG\Parameter(
     *     name="available",
     *     in="formData",
     *     required=true,
     *     type="number",
     *     description="The available for  Part",
     * )
     * @SWG\Parameter(
     *     name="price",
     *     in="formData",
     *     required=true,
     *     type="number",
     *     description="The price for  Part",
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
     * @return Response
     */
    public function create(Request $request, EntityManagerInterface $em)
    {
        $number = $request->get('number');
        $name = $request->get('name');
        $bin = $request->get('bin');
        $available = $request->get('available');
        $price = $request->get('price');

        if (!$name || !$number || !$bin || !$available || !$price) {
            throw new BadRequestHttpException('Missing Required Parameter');
        }

        $part = new Part();
        $part->setName($name)
             ->setNumber($number)
             ->setBin($bin)
             ->setPrice($price)
             ->setAvailable($available);

        $em->persist($part);
        $em->flush();

        return $this->handleView(
            $this->view(
                [
                    'message' => 'Successfully created',
                ],
                Response::HTTP_OK
            )
        );
    }

    /**
     * @Rest\Put("/api/part/{id}")
     *
     * @SWG\Tag(name="Parts")
     * @SWG\Put(description="Update a Part")
     *
     * @SWG\Parameter(
     *     name="number",
     *     in="formData",
     *     type="string",
     *     description="The Number for Part",
     * )
     * @SWG\Parameter(
     *     name="name",
     *     in="formData",
     *     type="string",
     *     description="The Name for Part",
     * )
     * @SWG\Parameter(
     *     name="bin",
     *     in="formData",
     *     type="string",
     *     description="The bin for Part",
     * )
     * @SWG\Parameter(
     *     name="available",
     *     in="formData",
     *     type="number",
     *     description="The available for  Part",
     * )
     *
     * @SWG\Parameter(
     *     name="price",
     *     in="formData",
     *     type="number",
     *     description="The available for  Part",
     * )
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return updated Part",
     *     @SWG\Schema(ref=@Model(type=Part::class, groups={"part_list"})))
     * )
     *
     * @return Response
     */
    public function edit(Part $part, Request $request, EntityManagerInterface $em)
    {
        $number = $request->get('number');
        $name = $request->get('name');
        $bin = $request->get('bin');
        $available = $request->get('available');
        $price = $request->get('price');

        if ($number) {
            $part->setNumber($number);
        }
        if ($name) {
            $part->setName($name);
        }
        if ($bin) {
            $part->setBin($bin);
        }
        if ($available) {
            $part->setAvailable($available);
        }
        if ($price) {
            $part->setPrice($price);
        }

        $em->persist($part);
        $em->flush();

        return $this->handleView(
            $this->view(
                $part,
                Response::HTTP_OK
            )
        );
    }

    /**
     * @Rest\Delete("/api/parts/{id}")
     *
     * @SWG\Tag(name="Parts")
     * @SWG\Delete(description="Delete a Part")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "Successfully Deleted" }),
     *         )
     * )
     *
     * @param Part $part
     *
     * @return Response
     */
    public function delete(Part $part, EntityManagerInterface $em)
    {
        $em->remove($part);
        $em->flush();

        return $this->handleView(
            $this->view(
                [
                    'message' => 'Successfully Deleted',
                ],
                Response::HTTP_OK
            )
        );
    }
}
