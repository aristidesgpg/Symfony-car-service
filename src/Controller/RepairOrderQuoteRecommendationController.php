<?php

namespace App\Controller;

use App\Entity\RepairOrderQuote;
use App\Entity\OperationCode;
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

/**
 * Class RepairOrderQuoteRecommendationController
 *
 * @package App\Controller
 */
class RepairOrderQuoteRecommendationController extends AbstractFOSRestController {
    use iServiceLoggerTrait;

    /**
     * @Rest\Post("/api/repair-order-quote-recommendation")
     *
     * @SWG\Tag(name="Repair Order Quote Recommendation")
     * @SWG\Post(description="Create a new Repair Order Quote Recommendation")
     *
     * @SWG\Parameter(
     *     name="repair_order_quote",
     *     in="formData",
     *     required=true,
     *     type="integer",
     *     description="The Repair Order Quote ID",
     * )
     * @SWG\Parameter(
     *     name="recommendations",
     *     in="formData",
     *     required=false,
     *     type="string",
     *     description="[{'operationCode':14, 'description':'Neque maxime ex dolorem ut.','preApproved':true,'approved':true,'partsPrice':1.0,'suppliesPrice':14.02,'laborPrice':5.3,'notes':'Cumque tempora ut nobis.'},{'operationCode':11, 'description':'Quidem earum sapiente at dolores quia natus.','preApproved':false,'approved':true,'partsPrice':2.6,'suppliesPrice':509.02,'laborPrice':36.9,'notes':'Et accusantium rerum.'},{'id':26, 'operationCode':4, 'description':'Mollitia unde nobis doloribus sed.','preApproved':true,'approved':false,'partsPrice':1.1,'suppliesPrice':71.7,'laborPrice':55.1,'notes':'Voluptates et aut debitis.'}]",
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
     * @param Request                                  $request
     * @param RepairOrderQuoteRepository               $repairOrderQuoteRepository
     * @param RepairOrderQuoteRecommendationRepository $repairOrderQuoteRecommendationRepo
     * @param OperationCodeRepository                  $operationCodeRepository
     * @param EntityManagerInterface                   $em
     *
     * @return Response
     */
    public function createRepairOrderQuoteRecommendations (
        Request                                  $request, 
        RepairOrderQuoteRepository               $repairOrderQuoteRepository, 
        RepairOrderQuoteRecommendationRepository $repairOrderQuoteRecommendationRepo,
        OperationCodeRepository                  $operationCodeRepository, 
        EntityManagerInterface                   $em
    ) {
        $repairOrderQuoteID    = $request->get('repair_order_quote');
        $recommendations       = str_replace("'",'"', $request->get('recommendations'));
        $obj                   = (array)json_decode($recommendations);

        //check if params are valid
        if(!$repairOrderQuoteID){
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }
        //Check if Repair Order Quote exists
        $repairOrderQuote  = $repairOrderQuoteRepository->findOneBy(["id" => $repairOrderQuoteID]);
        if (!$repairOrderQuote) {
            return $this->handleView($this->view('Invalid repair_order_quote Parameter', Response::HTTP_BAD_REQUEST));
        }
        
        foreach ($obj as $index => $recommendation){
            if(property_exists($recommendation, "id")){
                $rOQRecom = $repairOrderQuoteRecommendationRepo->findOneBy(["id" => $recommendation->id]);
                if (!$rOQRecom) {
                    return $this->handleView($this->view('Invalid repair_order_quote_recommendation id Parameter', Response::HTTP_BAD_REQUEST));
                }
            }
            else{
                $rOQRecom = new RepairOrderQuoteRecommendation();
            }
            
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
            'message' => 'RepairOrderQuoteRecommendation Created'
        ], Response::HTTP_OK));
    }

     /**
     * @Rest\Put("/api/repair-order-quote-recommendation")
     *
     * @SWG\Tag(name="Repair Order Quote Recommendation")
     * @SWG\Put(description="Update a Repair Order Quote Recommendation")
     *
     * @SWG\Parameter(
     *     name="repair_order_quote",
     *     in="formData",
     *     required=true,
     *     type="integer",
     *     description="The Repair Order Quote ID",
     * )
     * @SWG\Parameter(
     *     name="recommendations",
     *     in="formData",
     *     required=false,
     *     type="string",
     *     description="[{'operationCode':14, 'description':'Neque maxime ex dolorem ut.','preApproved':true,'approved':true,'partsPrice':1.0,'suppliesPrice':14.02,'laborPrice':5.3,'notes':'Cumque tempora ut nobis.'},{'operationCode':11, 'description':'Quidem earum sapiente at dolores quia natus.','preApproved':false,'approved':true,'partsPrice':2.6,'suppliesPrice':509.02,'laborPrice':36.9,'notes':'Et accusantium rerum.'},{'id':26, 'operationCode':4, 'description':'Mollitia unde nobis doloribus sed.','preApproved':true,'approved':false,'partsPrice':1.1,'suppliesPrice':71.7,'laborPrice':55.1,'notes':'Voluptates et aut debitis.'}]",
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
     * @param Request                                  $request
     * @param RepairOrderQuoteRepository               $repairOrderQuoteRepository
     * @param RepairOrderQuoteRecommendationRepository $repairOrderQuoteRecommendationRepo
     * @param OperationCodeRepository                  $operationCodeRepository
     * @param EntityManagerInterface                   $em
     *
     * @return Response
     */
    public function updateRepairOrderQuoteRecommendations (
        Request                                  $request, 
        RepairOrderQuoteRepository               $repairOrderQuoteRepository, 
        RepairOrderQuoteRecommendationRepository $repairOrderQuoteRecommendationRepo,
        OperationCodeRepository                  $operationCodeRepository, 
        EntityManagerInterface                   $em
    ) {
        $repairOrderQuoteID    = $request->get('repair_order_quote');
        $recommendations       = str_replace("'",'"', $request->get('recommendations'));
        $obj                   = (array)json_decode($recommendations);
        //check if params are valid
        if(!$repairOrderQuoteID){
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }
        //Check if Repair Order Quote exists
        $repairOrderQuote  = $repairOrderQuoteRepository->find($repairOrderQuoteID);
        if (!$repairOrderQuote) {
            return $this->handleView($this->view('Invalid repair_order_quote Parameter', Response::HTTP_BAD_REQUEST));
        }
        //remove existing recommendations
        $allRecommendations = $repairOrderQuote->getRepairOrderQuoteRecommendations();
        foreach($allRecommendations as $index => $recommendation){
            $recommendation->setDeleted(true);

            $em->persist($recommendation);
            $em->flush();
        }
        //update RepairOrderQuoteRecommendation
        foreach ($obj as $index => $recommendation){
            if(property_exists($recommendation, "id")){
                $rOQRecom = $repairOrderQuoteRecommendationRepo->findOneBy(["id" => $recommendation->id]);
                if (!$rOQRecom) {
                    return $this->handleView($this->view('Invalid repair_order_quote_recommendation id Parameter', Response::HTTP_BAD_REQUEST));
                }
            }
            else{
                $rOQRecom = new RepairOrderQuoteRecommendation();
            }
            
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
                     ->setNotes($recommendation->notes)
                     ->setDeleted(false);

            $em->persist($rOQRecom);
            $em->flush();
        }

        return $this->handleView($this->view([
            'message' => 'RepairOrderQuoteRecommendation Updated'
        ], Response::HTTP_OK));
    }
}
