<?php

namespace App\Controller;

use App\Entity\Parts;
use App\Repository\PartsRepository;
use App\Response\ValidationResponse;
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

class PartsController extends AbstractFOSRestController
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
     *     description="The value of search.  The available fields are code and description",
     *     in="query"
     * )
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return Parts",
     *     @SWG\Items(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=MPITemplate::class, groups={"operation_code_list"})),
     *         @SWG\Property(property="totalResults", type="integer", description="Total # of results found"),
     *         @SWG\Property(property="totalPages", type="integer", description="Total # of pages of results"),
     *         @SWG\Property(property="previous", type="string", description="URL for previous page"),
     *         @SWG\Property(property="currentPage", type="integer", description="Current page #"),
     *         @SWG\Property(property="next", type="string", description="URL for next page"),
     *     )
     * )
     *
     * @SWG\Response(response="400", ref="#/responses/ValidationResponse")
     *
     * @return Response
     */
    public function getParts(
        Request $request,
        PartsRepository $operationCodeRepo,
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
        $columns = $em->getClassMetadata('App\Entity\Parts')->getFieldNames();

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
            return new BadRequestHttpException();
        }

        // //get all active operation codes
        // $operationCodes = $operationCodeRepo->getActivePartss(
        //     $sortField,
        //     $sortDirection,
        //     $searchTerm,
        // );

        $pageLimit = $request->query->getInt('pageLimit', self::PAGE_LIMIT);

        $pager = $paginator->paginate([], $page, $pageLimit);
        $pagination = new Pagination($pager, $pageLimit, $urlGenerator);

        $view = $this->view(
            [
                'results' => $pager->getItems(),
                'totalResults' => $pagination->totalResults,
                'totalPages' => $pagination->totalPages,
                'previous' => $pagination->getPreviousPageURL('app_operationcode_getoperationcodes', $urlParameters),
                'currentPage' => $pagination->currentPage,
                'next' => $pagination->getNextPageURL('app_operationcode_getoperationcodes', $urlParameters),
            ]
        );
        $view->getContext()->setGroups(['operation_code_list']);

        return $this->handleView($view);
    }

    /**
     * @Rest\Post("/api/parts")
     *
     * @SWG\Tag(name="Parts")
     * @SWG\Post(description="Create a Part")
     *
     * @SWG\Parameter(
     *     name="code",
     *     in="query",
     *     required=true,
     *     type="string",
     *     description="Part"
     * )
     * @SWG\Parameter(
     *     name="description",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Description for Part",
     * )
     * @SWG\Parameter(
     *     name="laborHours",
     *     in="formData",
     *     required=true,
     *     type="number",
     *     description="The Labor Hours",
     * )
     * @SWG\Parameter(
     *     name="laborTaxable",
     *     in="formData",
     *     required=true,
     *     type="boolean",
     *     description="The Labor Taxable",
     * )
     * @SWG\Parameter(
     *     name="partsPrice",
     *     in="formData",
     *     required=true,
     *     type="number",
     *     description="The Parts Price",
     * )
     * @SWG\Parameter(
     *     name="partsTaxable",
     *     in="formData",
     *     required=true,
     *     type="boolean",
     *     description="The Parts Taxable",
     * )
     * @SWG\Parameter(
     *     name="suppliesPrice",
     *     in="formData",
     *     required=true,
     *     type="number",
     *     description="The Supplies Price",
     * )
     * @SWG\Parameter(
     *     name="suppliesTaxable",
     *     in="formData",
     *     required=true,
     *     type="boolean",
     *     description="The Supplies Taxable",
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
     * @param Request                $request
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function create(Request $request, EntityManagerInterface $em)
    {
        $code = $request->get('code');
        $description = $request->get('description');
        $laborHours = $request->get('laborHours');
        $laborTaxable = $request->get('laborTaxable');
        $partsPrice = $request->get('partsPrice');
        $partsTaxable = $request->get('partsTaxable');
        $suppliesPrice = $request->get('suppliesPrice');
        $suppliesTaxable = $request->get('suppliesTaxable');

        //params are invalid
        if (!$code || !$description || !$laborHours || !$laborTaxable || !$partsPrice || !$partsTaxable || !$suppliesPrice || !$suppliesTaxable) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        //create a new operation code
        $operationCode = new Parts();
        $operationCode->setCode($code)
            ->setDescription($description)
            ->setLaborHours($laborHours)
            ->setLaborTaxable($laborTaxable)
            ->setPartsPrice($partsPrice)
            ->setPartsTaxable($partsTaxable)
            ->setSuppliesPrice($suppliesPrice)
            ->setSuppliesTaxable($suppliesTaxable);

        $em->persist($operationCode);
        $em->flush();

        return $this->handleView(
            $this->view(
                [
                    'message' => 'Part Created',
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
     *     name="code",
     *     in="query",
     *     required=true,
     *     type="string",
     *     description="Part"
     * )
     * @SWG\Parameter(
     *     name="description",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Description for Part",
     * )
     * @SWG\Parameter(
     *     name="laborHours",
     *     in="formData",
     *     required=true,
     *     type="number",
     *     description="The Labor Hours",
     * )
     * @SWG\Parameter(
     *     name="laborTaxable",
     *     in="formData",
     *     required=true,
     *     type="boolean",
     *     description="The Labor Taxable",
     * )
     * @SWG\Parameter(
     *     name="partsPrice",
     *     in="formData",
     *     required=true,
     *     type="number",
     *     description="The Parts Price",
     * )
     * @SWG\Parameter(
     *     name="partsTaxable",
     *     in="formData",
     *     required=true,
     *     type="boolean",
     *     description="The Parts Taxable",
     * )
     * @SWG\Parameter(
     *     name="suppliesPrice",
     *     in="formData",
     *     required=true,
     *     type="number",
     *     description="The Supplies Price",
     * )
     * @SWG\Parameter(
     *     name="suppliesTaxable",
     *     in="formData",
     *     required=true,
     *     type="boolean",
     *     description="The Supplies Taxable",
     * )
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "Successfully Updated" }),
     *         )
     * )
     *
     * @param Parts          $operationCode
     * @param Request                $request
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function edit(Parts $operationCode, Request $request, EntityManagerInterface $em)
    {
        $code = $request->get('code');
        $description = $request->get('description');
        $laborHours = $request->get('laborHours');
        $laborTaxable = $request->get('laborTaxable');
        $partsPrice = $request->get('partsPrice');
        $partsTaxable = $request->get('partsTaxable');
        $suppliesPrice = $request->get('suppliesPrice');
        $suppliesTaxable = $request->get('suppliesTaxable');

        //params are invalid
        if (!$code || !$description || $laborHours === null || !$laborTaxable || $partsPrice === null || !$partsTaxable || $suppliesPrice === null || !$suppliesTaxable) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        //update a operation code
        $operationCode->setCode($code)
            ->setDescription($description)
            ->setLaborHours($laborHours)
            ->setLaborTaxable(filter_var($laborTaxable, FILTER_VALIDATE_BOOLEAN))
            ->setPartsPrice($partsPrice)
            ->setPartsTaxable(filter_var($partsTaxable, FILTER_VALIDATE_BOOLEAN))
            ->setSuppliesPrice($suppliesPrice)
            ->setSuppliesTaxable(filter_var($suppliesTaxable, FILTER_VALIDATE_BOOLEAN));

        $em->persist($operationCode);
        $em->flush();

        return $this->handleView(
            $this->view(
                [
                    'message' => 'Operation Code Updated',
                ],
                Response::HTTP_OK
            )
        );
    }

    /**
     * @Rest\Delete("/api/part/{id}")
     *
     * @SWG\Tag(name="Parts")
     * @SWG\Delete(description="Delete a Operation Code")
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
     * @param Parts          $operationCode
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function delete(Parts $operationCode, EntityManagerInterface $em)
    {
        //Delete a operation code
        $operationCode->setDeleted(true);

        $em->persist($operationCode);
        $em->flush();

        return $this->handleView(
            $this->view(
                [
                    'message' => 'Operation Code Deleted',
                ],
                Response::HTTP_OK
            )
        );
    }
}
