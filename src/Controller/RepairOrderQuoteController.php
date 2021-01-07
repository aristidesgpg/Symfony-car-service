<?php

namespace App\Controller;

use App\Entity\RepairOrder;
use App\Entity\OperationCode;
use App\Entity\RepairOrderQuote;
use App\Repository\RepairOrderRepository;
use App\Entity\RepairOrderQuoteRecommendation;
use App\Repository\RepairOrderQuoteRepository;
use App\Repository\OperationCodeRepository;
use App\Repository\RepairOrderQuoteRecommendationRepository;
use App\Helper\iServiceLoggerTrait;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Swagger\Annotations as SWG;
use DateTime;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Knp\Component\Pager\PaginatorInterface;
use App\Service\Pagination;
use App\Response\ValidationResponse;

/**
 * Class RepairOrderQuoteController
 *
 * @package App\Controller
 */
class RepairOrderQuoteController extends AbstractFOSRestController {
    use iServiceLoggerTrait;
    private const PAGE_LIMIT = 100;

    /**
     * @Rest\Get("/api/repair-order-quote")
     *
     * @SWG\Tag(name="Repair Order Quote")
     * @SWG\Get(description="Get All Repair Order Quotes")
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
     * @SWG\Response(
     *     response=200,
     *     description="Return Repair Order Quotes",
     *     @SWG\Items(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=RepairOrderQuote::class, groups=RepairOrderQuote::GROUPS)),
     *         @SWG\Property(property="totalResults", type="integer", description="Total # of results found"),
     *         @SWG\Property(property="totalPages", type="integer", description="Total # of pages of results"),
     *         @SWG\Property(property="previous", type="string", description="URL for previous page"),
     *         @SWG\Property(property="currentPage", type="integer", description="Current page #"),
     *         @SWG\Property(property="next", type="string", description="URL for next page"),
     *         description="id, repair_order_id, date_created, date_sent, date_customer_viewed, date_customer_completed, date_completed_viewed, deleted"
     *     )
     * )
     * @SWG\Response(response="404", description="Invalid page parameter")
     * @SWG\Response(response="406", ref="#/responses/ValidationResponse")
     * 
     * @param Request               $request
     * @param RepairOrderQuoteRepository $repairOrderQuoteRepository
     * @param PaginatorInterface    $paginator
     *
     * @param UrlGeneratorInterface $urlGenerator
     * @param EntityManagerInterface $em
     * 
     * @return Response
     */
    public function getRepairOrderQuotes (Request $request, RepairOrderQuoteRepository $repairOrderQuoteRepository, PaginatorInterface $paginator,
    UrlGeneratorInterface $urlGenerator,  EntityManagerInterface $em) {
       
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

        $qb                            = $repairOrderQuoteRepository->createQueryBuilder('rq');
        $qb->andWhere('rq.deleted = 0');

        //get all field names of RepairOrderQuote Entity
        $columns                                = $em->getClassMetadata('App\Entity\RepairOrderQuote')->getFieldNames();

        if($request->query->has('searchField') && $request->query->has('searchTerm'))
        {
            $searchField                        = $request->query->get('searchField');
           
            //check if the searchfield exist
            if(!in_array($searchField, $columns))
                $errors['searchField']          = 'Invalid search field name';
            else{
                $searchTerm  = $request->query->get('searchTerm');

                $qb->andWhere('rq.'.$searchField.' LIKE :searchTerm');
                $queryParameters['searchTerm']  = '%'.$searchTerm.'%';
            
                $urlParameters['searchField']   = $searchField;
            }
            
        }

        if($request->query->has('sortField') && $request->query->has('sortDirection'))
        {
            $sortField                          = $request->query->get('sortField');
            
            //check if the sortfield exist
            if(!in_array($sortField, $columns))
                $errors['sortField'] = 'Invalid sort field name';
            else{
                $sortDirection = $request->query->get('sortDirection');
                $qb->orderBy('rq.'.$sortField, $sortDirection);

                $urlParameters['sortField']     = $sortField;
                $urlParameters['sortDirection'] = $sortDirection;
            }
           
        }
  
        if (!empty($errors)) {
            return new ValidationResponse($errors);
        }

        $q = $qb->getQuery();
        $q->setParameters($queryParameters);
        $pageLimit      = $request->query->getInt('pageLimit', self::PAGE_LIMIT);

        $urlParameters += $queryParameters;

        if($searchTerm){
            $urlParameters['searchTerm'] = $searchTerm;
        }

        $pager          = $paginator->paginate($q, $page, $pageLimit);
        $pagination     = new Pagination($pager, $pageLimit, $urlGenerator);

        $view = $this->view([
            'repairOrderQuotes' => $pager->getItems(),
            'totalResults'      => $pagination->totalResults,
            'totalPages'        => $pagination->totalPages,
            'previous'          => $pagination->getPreviousPageURL('app_repairorderquote_getrepairorderquotes', $urlParameters),
            'currentPage'       => $pagination->currentPage,
            'next'              => $pagination->getNextPageURL('app_repairorderquote_getrepairorderquotes', $urlParameters)
        ]);
        
        $view->getContext()->setGroups(RepairOrderQuote::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Post("/api/repair-order-quote")
     *
     * @SWG\Tag(name="Repair Order Quote")
     * @SWG\Post(description="Create a new Repair Order Quote")
     *
     * @SWG\Parameter(
     *     name="repairOrderID",
     *     in="formData",
     *     required=true,
     *     type="integer",
     *     description="The Repair Order ID",
     * )
     * @SWG\Parameter(
     *     name="recommendations",
     *     in="formData",
     *     required=false,
     *     type="string",
     *     description="[{'operationCode':14, 'description':'Neque maxime ex dolorem ut.','preApproved':true,'approved':true,'partsPrice':1.0,'suppliesPrice':14.02,'laborPrice':5.3,'notes':'Cumque tempora ut nobis.'},{'operationCode':11, 'description':'Quidem earum sapiente at dolores quia natus.','preApproved':false,'approved':true,'partsPrice':2.6,'suppliesPrice':509.02,'laborPrice':36.9,'notes':'Et accusantium rerum.'},{'operationCode':4, 'description':'Mollitia unde nobis doloribus sed.','preApproved':true,'approved':false,'partsPrice':1.1,'suppliesPrice':71.7,'laborPrice':55.1,'notes':'Voluptates et aut debitis.'}]",
     * )
     * 
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "Successfully Created" }),
     *         )
     * )
     *
     * @param Request                 $request
     * @param RepairOrderRepository   $repairOrderRepository
     * @param OperationCodeRepository $operationCodeRepository
     * @param EntityManagerInterface  $em
     *
     * @return Response
     */
    public function createRepairOrderQuote (
        Request                 $request, 
        RepairOrderRepository   $repairOrderRepository,
        OperationCodeRepository $operationCodeRepository,
        EntityManagerInterface  $em
    ) {
        $repairOrderID         = $request->get('repairOrderID');
        $recommendations       = str_replace("'",'"', $request->get('recommendations'));
        $obj                   = (array)json_decode($recommendations);
        //check if params are valid
        if(!$repairOrderID){
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }
        //Check if Repair Order exists
        $repairOrder  = $repairOrderRepository->find($repairOrderID);
        if (!$repairOrder) {
            return $this->handleView($this->view('Invalid repair_order Parameter', Response::HTTP_BAD_REQUEST));
        }
        //store repairOrderQuote
        $repairOrderQuote = new RepairOrderQuote();
        $repairOrderQuote->setRepairOrder($repairOrder);
        $em->persist($repairOrderQuote);
        $em->flush();
        //add recommendations
        foreach ($obj as $index => $recommendation){
            $rOQRecom = new RepairOrderQuoteRecommendation();
            //Check if Operation Code exists
            $operationCode = $operationCodeRepository->findOneBy(["id" => $recommendation->operationCode]);
            if (!$operationCode) {
                return $this->handleView($this->view('Invalid operation_code Parameter', Response::HTTP_BAD_REQUEST));
            }
            $rOQRecom->setRepairOrderQuote($repairOrderQuote)
                     ->setOperationCode($operationCode)
                     ->setDescription($recommendation->description)
                     ->setPreApproved(filter_var($recommendation->preApproved, FILTER_VALIDATE_BOOLEAN))
                     ->setApproved(filter_var($recommendation->approved, FILTER_VALIDATE_BOOLEAN))
                     ->setPartsPrice($recommendation->partsPrice)
                     ->setSuppliesPrice($recommendation->suppliesPrice)
                     ->setNotes($recommendation->notes);

            $em->persist($rOQRecom);
            $em->flush();
        }

        return $this->handleView($this->view([
            'message' => 'RepairOrderQuote Created'
        ], Response::HTTP_OK));
    }

    /**
     * @Rest\Put("/api/repair-order-quote/{id}")
     *
     * @SWG\Tag(name="Repair Order Quote")
     * @SWG\Put(description="Update a Repair Order Quote")
     *
     * @SWG\Parameter(
     *     name="repairOrderID",
     *     in="formData",
     *     required=true,
     *     type="integer",
     *     description="The Repair Order ID",
     * )
     * @SWG\Parameter(
     *     name="recommendations",
     *     in="formData",
     *     required=false,
     *     type="string",
     *     description="[{'operationCode':14, 'description':'Neque maxime ex dolorem ut.','preApproved':true,'approved':true,'partsPrice':1.0,'suppliesPrice':14.02,'laborPrice':5.3,'notes':'Cumque tempora ut nobis.'},{'operationCode':11, 'description':'Quidem earum sapiente at dolores quia natus.','preApproved':false,'approved':true,'partsPrice':2.6,'suppliesPrice':509.02,'laborPrice':36.9,'notes':'Et accusantium rerum.'},{'operationCode':4, 'description':'Mollitia unde nobis doloribus sed.','preApproved':true,'approved':false,'partsPrice':1.1,'suppliesPrice':71.7,'laborPrice':55.1,'notes':'Voluptates et aut debitis.'}]",
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
     * @param RepairOrderQuote        $repairOrderQuote
     * @param Request                 $request
     * @param RepairOrderRepository   $repairOrderRepository
     * @param OperationCodeRepository $operationCodeRepository
     * @param EntityManagerInterface  $em
     *
     * @return Response
     */
    public function updateRepairOrderQuote (
            RepairOrderQuote        $repairOrderQuote, 
            Request                 $request, 
            RepairOrderRepository   $repairOrderRepository, 
            OperationCodeRepository $operationCodeRepository,
            EntityManagerInterface  $em
        ) {
        $repairOrderID         = $request->get('repairOrderID');
        $recommendations       = str_replace("'",'"', $request->get('recommendations'));
        $obj                   = (array)json_decode($recommendations);
        //check if params are valid
        if(!$repairOrderID){
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }
        //Check if Repair Order exists
        $repairOrder  = $repairOrderRepository->find($repairOrderID);
        if (!$repairOrder) {
            return $this->handleView($this->view('Invalid repair_order Parameter', Response::HTTP_BAD_REQUEST));
        }
        //update repairOrderQuote
        $repairOrderQuote->setRepairOrder($repairOrder);
        $em->persist($repairOrderQuote);
        $em->flush();
        //remove existing recommendations
        $allRecommendations = $repairOrderQuote->getRepairOrderQuoteRecommendations();
        foreach($allRecommendations as $index => $recommendation){
            $em->remove($recommendation);
            $em->flush();
        }
        //add recommendations
        foreach ($obj as $index => $recommendation){
            $rOQRecom = new RepairOrderQuoteRecommendation();
            //Check if Operation Code exists
            $operationCode = $operationCodeRepository->findOneBy(["id" => $recommendation->operationCode]);
            if (!$operationCode) {
                return $this->handleView($this->view('Invalid operation_code Parameter', Response::HTTP_BAD_REQUEST));
            }
            $rOQRecom->setRepairOrderQuote($repairOrderQuote)
                     ->setOperationCode($operationCode)
                     ->setDescription($recommendation->description)
                     ->setPreApproved(filter_var($recommendation->preApproved, FILTER_VALIDATE_BOOLEAN))
                     ->setApproved(filter_var($recommendation->approved, FILTER_VALIDATE_BOOLEAN))
                     ->setPartsPrice($recommendation->partsPrice)
                     ->setSuppliesPrice($recommendation->suppliesPrice)
                     ->setNotes($recommendation->notes);

            $em->persist($rOQRecom);
            $em->flush();
        }

        return $this->handleView($this->view([
            'message' => 'RepairOrderQuote Updated'
        ], Response::HTTP_OK));
    }

    /**
     * @Rest\Delete("/api/repair-order-quote/{id}")
     *
     * @SWG\Tag(name="Repair Order Quote")
     * @SWG\Delete(description="Delete a Repair Order Quote")
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
     * @param RepairOrderQuote       $repairOrderQuote
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function deleteRepairOrderQuote (RepairOrderQuote $repairOrderQuote, EntityManagerInterface $em) {
        //delete repairOrderQuote
        $repairOrderQuote->setDeleted(true);

        $em->persist($repairOrderQuote);
        $em->flush();

        return $this->handleView($this->view([
            'message' => 'RepairOrderQuote Deleted'
        ], Response::HTTP_OK));
    }
}
