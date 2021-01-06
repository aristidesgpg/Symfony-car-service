<?php

namespace App\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use FOS\RestBundle\Controller\Annotations as Rest;

use App\Entity\OperationCode;
use App\Repository\OperationCodeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use App\Service\Pagination;
use App\Response\ValidationResponse;
use Knp\Component\Pager\PaginatorInterface;

class OperationCodeController extends AbstractFOSRestController {
    /**
     * @Rest\Get("/api/operation-code")
     *
     * @SWG\Tag(name="OperationCode")
     * @SWG\Get(description="Get All Operation Codes")
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
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return Operation Codes",
     *     @SWG\Items(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=MPITemplate::class, groups={"operation_code_list"})),
     *         @SWG\Property(property="next", type="string", description="URL of next page of results or null"),
     *         @SWG\Property(property="prev", type="string", description="URL of previous page of results or null"),
     *         @SWG\Property(property="total", type="integer", description="Total number of items for query"),
     *         description="code, description, labor_hours, labor_taxable, parts_price, parts_taxable, supplies_price, supplies_taxable, deleted"
     *     )
     * )
     *
     * @param OperationCodeRepository $operationCodeRepo
     * @param PaginatorInterface    $paginator
     *
     * @param UrlGeneratorInterface $urlGenerator
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function getOperationCodes (OperationCodeRepository $operationCodeRepo, PaginatorInterface $paginator,
    UrlGeneratorInterface $urlGenerator, EntityManagerInterface $em) {
        $page            = $request->query->getInt('page', 1);
        $startDate       = $request->query->get('startDate');
        $endDate         = $request->query->get('endDate');
        $urlParameters   = [];
        $errors          = [];
        $sortField       = "";
        $sortDirection   = "";
        $searchField     = "";
        $searchTerm      = "";
        
        if ($page < 1) {
            throw new NotFoundHttpException();
        }

        //get all field names of RepairOrder Entity
        $columns = $em->getClassMetadata('App\Entity\RepairOrder')->getFieldNames();

        if($request->query->has('sortField') && $request->query->has('sortDirection'))
        {
            $sortField                        = $request->query->get('sortField');
            
            //check if the sortfield exist
            if(!in_array($sortField, $columns))
                $errors['sortField']          = 'Invalid sort field name';
            
            $sortDirection = $request->query->get('sortDirection');
            $urlParameters['sortField']       = $sortField;
            $urlParameters['sortDirection']   = $sortDirection;
        }

        if($request->query->has('searchField') && $request->query->has('searchTerm'))
        {
            $searchField                      = $request->query->get('searchField');
           
            //check if the searchfield exist
            if(!in_array($searchField, $columns))
                $errors['searchField']        = 'Invalid search field name';

            $searchTerm  = $request->query->get('searchTerm');
            $urlParameters['searchField']     = $searchField;
            $urlParameters['searchTerm']      = $searchTerm;
        }

        if (!empty($errors)) {
            return new ValidationResponse($errors);
        }

        //get all active operation codes
        $operationCodes = $operationCodeRepo->getActiveOperationCodes($sortField, $sortDirection, $searchField, $searchTerm);
       
        $pageLimit      = $request->query->getInt('pageLimit', self::PAGE_LIMIT);

        $pager          = $paginator->paginate($q, $page, $pageLimit);
        $pagination     = new Pagination($pager, $pageLimit, $urlGenerator);

        $view = $this->view([
            'operationCodes' => $pager->getItems(),
            'totalResults' => $pagination->totalResults,
            'totalPages'   => $pagination->totalPages,
            'previous'     => $pagination->getPreviousPageURL('getOperationCodes', $urlParameters),
            'currentPage'  => $pagination->currentPage,
            'next'         => $pagination->getNextPageURL('getOperationCodes', $urlParameters)
        ]);
        $view->getContext()->setGroups(OperationCode::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Post("/api/operation-code")
     *
     * @SWG\Tag(name="OperationCode")
     * @SWG\Post(description="Create a New Operation Code")
     *
     * @SWG\Parameter(
     *     name="code",
     *     in="query",
     *     required=true,
     *     type="string",
     *     description="Operation Code"
     * )
     * @SWG\Parameter(
     *     name="description",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Description for Operation Code",
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
    public function create (Request $request, EntityManagerInterface $em) {
        $code            = $request->get('code');
        $description     = $request->get('description');
        $laborHours      = $request->get('laborHours');
        $laborTaxable    = $request->get('laborTaxable');
        $partsPrice      = $request->get('partsPrice');
        $partsTaxable    = $request->get('partsTaxable');
        $suppliesPrice   = $request->get('suppliesPrice');
        $suppliesTaxable = $request->get('suppliesTaxable');

        //params are invalid
        if (!$code || !$description || !$laborHours || !$laborTaxable || !$partsPrice || !$partsTaxable || !$suppliesPrice || !$suppliesTaxable) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        //create a new operation code
        $operationCode = new OperationCode();
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

        return $this->handleView($this->view([
            'message' => 'Operation Code Created'
        ], Response::HTTP_OK));
    }

    /**
     * @Rest\Put("/api/operation-code/{id}")
     *
     * @SWG\Tag(name="OperationCode")
     * @SWG\Put(description="Update a Operation Code")
     *
     * @SWG\Parameter(
     *     name="code",
     *     in="query",
     *     required=true,
     *     type="string",
     *     description="Operation Code"
     * )
     * @SWG\Parameter(
     *     name="description",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Description for Operation Code",
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
     * @param OperationCode          $operationCode
     * @param Request                $request
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function edit (OperationCode $operationCode, Request $request, EntityManagerInterface $em) {
        $code            = $request->get('code');
        $description     = $request->get('description');
        $laborHours      = $request->get('laborHours');
        $laborTaxable    = $request->get('laborTaxable');
        $partsPrice      = $request->get('partsPrice');
        $partsTaxable    = $request->get('partsTaxable');
        $suppliesPrice   = $request->get('suppliesPrice');
        $suppliesTaxable = $request->get('suppliesTaxable');

        //params are invalid
        if (!$code || !$description || !$laborHours || !$laborTaxable || !$partsPrice || !$partsTaxable || !$suppliesPrice || !$suppliesTaxable) {
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

        return $this->handleView($this->view([
            'message' => 'Operation Code Updated'
        ], Response::HTTP_OK));
    }

    /**
     * @Rest\Delete("/api/operation-code/{id}")
     *
     * @SWG\Tag(name="OperationCode")
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
     * @param OperationCode          $operationCode
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function delete (OperationCode $operationCode, EntityManagerInterface $em) {
        //Delete a operation code
        $operationCode->setDeleted(true);

        $em->persist($operationCode);
        $em->flush();

        return $this->handleView($this->view([
            'message' => 'Operation Code Deleted'
        ], Response::HTTP_OK));
    }
}
