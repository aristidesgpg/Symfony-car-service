<?php

namespace App\Controller;

use App\Entity\RepairOrderQuote;
use App\Entity\RepairOrderQuoteInteraction;
use App\Entity\RepairOrderQuoteRecommendation;
use App\Helper\iServiceLoggerTrait;
use App\Repository\OperationCodeRepository;
use App\Repository\RepairOrderQuoteRepository;
use App\Repository\RepairOrderRepository;
use App\Service\RepairOrderQuoteHelper;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\ORMException;
use Exception;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\CssSelector\Exception\InternalErrorException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use DateTime;

class RepairOrderQuoteController extends AbstractFOSRestController
{
    use iServiceLoggerTrait;

    private const PAGE_LIMIT = 100;

    /**
     * @Rest\Get("/api/repair-order-quote/{id}")
     *
     * @SWG\Tag(name="Repair Order Quote")
     * @SWG\Get(description="Get Repair Order Quote")
     *
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(ref=@Model(type=RepairOrderQuote::class, groups=RepairOrderQuote::GROUPS))
     * )
     *
     * @SWG\Response(response="404", description="ROQ does not exist")
     *
     * @return Response
     */
    public function getRepairOrderQuote(RepairOrderQuote $repairOrderQuote)
    {
        // if ($repairOrderQuote->getDeleted()) {
        //     throw new NotFoundHttpException();
        // }

        $view = $this->view($repairOrderQuote);
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
     *     description="[{""operationCode"":14, ""description"":""Neque maxime ex dolorem ut."",""preApproved"":true,""approved"":true,""partsPrice"":1.0,""suppliesPrice"":14.02,""laborPrice"":5.3,""notes"":""Cumque tempora ut nobis.""},{""operationCode"":11, ""description"":""Quidem earum sapiente at dolores quia natus."",""preApproved"":false,""approved"":true,""partsPrice"":2.6,""suppliesPrice"":509.02,""laborPrice"":36.9,""notes"":""Et accusantium rerum.""},{""operationCode"":4, ""description"":""Mollitia unde nobis doloribus sed."",""preApproved"":true,""approved"":false,""partsPrice"":1.1,""suppliesPrice"":71.7,""laborPrice"":55.1,""notes"":""Voluptates et aut debitis.""}]",
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
     * @throws InternalErrorException
     */
    public function createRepairOrderQuote(
        Request $request,
        RepairOrderRepository $repairOrderRepository,
        OperationCodeRepository $operationCodeRepository,
        RepairOrderQuoteRepository $repairOrderQuoteRepository,
        EntityManagerInterface $em,
        RepairOrderQuoteHelper $helper
    ) {
        $repairOrderID = $request->get('repairOrderID');
        $recommendations = $request->get('recommendations');

        // Validate recommendation json
        if ($recommendations) {
            $obj = json_decode($recommendations);
            if (is_null($obj) || !is_array($obj) || count($obj) === 0) {
                throw new BadRequestHttpException('Recommendations data is invalid');
            }

            try {
                $helper->validateRecommendationsJSON($obj);
            } catch (Exception $e) {
                throw new BadRequestHttpException($e->getMessage());
            }
        }

        // check if params are valid
        if (!$repairOrderID) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        // Check if Repair Order exists
        $repairOrder = $repairOrderRepository->find($repairOrderID);
        if (!$repairOrder) {
            return $this->handleView($this->view('Invalid repair_order Parameter', Response::HTTP_BAD_REQUEST));
        }

        // Check if there is a quote already
        $exists = $repairOrderQuoteRepository->findOneBy(['repairOrder' => $repairOrder]);
        if ($exists) {
            return $this->handleView(
                $this->view('A quote already exists for this Repair Order', Response::HTTP_NOT_ACCEPTABLE)
            );
        }

        // store repairOrderQuote
        $repairOrderQuote = new RepairOrderQuote();
        $repairOrderQuote->setRepairOrder($repairOrder);

        $em->persist($repairOrderQuote);
        $em->flush();

        if ($recommendations) {
            // add recommendations
            foreach ($obj as $index => $recommendation) {
                $repairOrderQuoteRecommendation = new RepairOrderQuoteRecommendation();

                //Check if Operation Code exists
                $operationCode = $operationCodeRepository->findOneBy(['id' => $recommendation->operationCode]);
                if (!$operationCode) {
                    // Remove the quote that was created
                    $em->remove($repairOrderQuote);
                    $em->flush();

                    throw new BadRequestHttpException('Invalid operationCode Parameter in recommendations JSON');
                }

                try {
                    $repairOrderQuoteRecommendation->setRepairOrderQuote($repairOrderQuote)
                                                   ->setOperationCode($operationCode)
                                                   ->setDescription($recommendation->description)
                                                   ->setPreApproved(
                                                       filter_var($recommendation->preApproved, FILTER_VALIDATE_BOOLEAN)
                                                   )
                                                   ->setApproved(
                                                       filter_var($recommendation->approved, FILTER_VALIDATE_BOOLEAN)
                                                   )
                                                   ->setPartsPrice($recommendation->partsPrice)
                                                   ->setSuppliesPrice($recommendation->suppliesPrice)
                                                   ->setNotes($recommendation->notes);
                } catch (Exception $e) {
                    // Remove the quote that was created
                    $em->remove($repairOrderQuote);
                    $em->flush();

                    $message = 'Missing required recommendation parameter: description, preApproved, approved, partsPrice, suppliesPrice, notes';
                    throw new BadRequestHttpException($message);
                }

                try {
                    $em->persist($repairOrderQuoteRecommendation);
                    $em->flush();
                } catch (ORMException $e) {
                    // Remove the quote that was created
                    $em->remove($repairOrderQuote);
                    $em->flush();

                    throw new InternalErrorException($e->getMessage());
                }
            }
        }


        return $this->handleView(
            $this->view(
                [
                    'message' => 'RepairOrderQuote Created',
                ],
                Response::HTTP_OK
            )
        );
    }

    /**
     * @Rest\Put("/api/repair-order-quote/{id}")
     *
     * @SWG\Tag(name="Repair Order Quote")
     * @SWG\Put(description="Update a Repair Order Quote")
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
     */
    public function updateRepairOrderQuote(
        RepairOrderQuote $repairOrderQuote,
        Request $request,
        RepairOrderRepository $repairOrderRepository,
        OperationCodeRepository $operationCodeRepository,
        EntityManagerInterface $em
    ): Response {
        $recommendations = str_replace("'", '"', $request->get('recommendations'));
        $obj = (array) json_decode($recommendations);

        // remove existing recommendations
        $allRecommendations = $repairOrderQuote->getRepairOrderQuoteRecommendations();
        foreach ($allRecommendations as $index => $recommendation) {
            $em->remove($recommendation);
            $em->flush();
        }

        // add recommendations
        foreach ($obj as $index => $recommendation) {
            $repairOrderRecommendation = new RepairOrderQuoteRecommendation();

            //Check if Operation Code exists
            $operationCode = $operationCodeRepository->findOneBy(['id' => $recommendation->operationCode]);
            if (!$operationCode) {
                return $this->handleView($this->view('Invalid operation_code Parameter', Response::HTTP_BAD_REQUEST));
            }
            $repairOrderRecommendation->setRepairOrderQuote($repairOrderQuote)
                                      ->setOperationCode($operationCode)
                                      ->setDescription($recommendation->description)
                                      ->setPreApproved(
                                          filter_var($recommendation->preApproved, FILTER_VALIDATE_BOOLEAN)
                                      )
                                      ->setApproved(filter_var($recommendation->approved, FILTER_VALIDATE_BOOLEAN))
                                      ->setPartsPrice($recommendation->partsPrice)
                                      ->setSuppliesPrice($recommendation->suppliesPrice)
                                      ->setNotes($recommendation->notes);

            $em->persist($repairOrderRecommendation);
            $em->flush();
        }

        return $this->handleView(
            $this->view(
                [
                    'message' => 'RepairOrderQuote Updated',
                ],
                Response::HTTP_OK
            )
        );
    }

    /**
     * @Rest\Post("/api/repair-order-quote/view")
     *
     * @SWG\Tag(name="Repair Order Quote")
     * @SWG\Put(description="Set the RepairOrderQuote status as Viewed")
     * @SWG\Parameter(
     *     name="repairOrderQuoteID",
     *     type="integer",
     *     in="formData",
     *     description="ID for the RepairOrderQuote",
     *     required=true
     * )
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "RepairOrderQuote Status Updated" }),
     *         )
     * )
     */
    public function customerViewed(
        Request                    $request,
        RepairOrderQuoteRepository $repairOrderQuoteRepository,
        EntityManagerInterface     $em
    ): Response {
        $repairOrderQuoteID = $request->get('repairOrderQuoteID');
        $status             = "Viewed";
        //check if param is valid
        if(!$repairOrderQuoteID){
            throw new BadRequestHttpException('Missing Required Parameter RepairOrderQuoteID');
        }
        $repairOrderQuote   = $repairOrderQuoteRepository->find($repairOrderQuoteID);
        if (!$repairOrderQuote) {
            throw new NotFoundHttpException('Repair Order Quote Not Found');
        }
        //Get RepairOrder
        $repairOrder = $repairOrderQuote->getRepairOrder();
        //Create RepairOrderQuoteInteraction
        $repairOrderQuoteInteraction = new RepairOrderQuoteInteraction();
        $repairOrderQuoteInteraction->setRepairOrderQuote($repairOrderQuote)
                                    ->setUser($repairOrder->getPrimaryTechnician())
                                    ->setCustomer($repairOrder->getPrimaryCustomer())
                                    ->setType($status);
        // Update repairOrderQuote Status
        $repairOrderQuote->addRepairOrderQuoteInteraction($repairOrderQuoteInteraction)
                         ->setStatus($status)
                         ->setDateCustomerViewed(new DateTime());
        // Update repairOrder quote_status
        $repairOrder->setQuoteStatus($status);

        $em->persist($repairOrder);
        $em->persist($repairOrderQuote);
        $em->flush();

        return $this->handleView($this->view(['message' => 'RepairOrderQuote Status Updated'], Response::HTTP_OK));
    }

    /**
     * @Rest\Post("/api/repair-order-quote/complete")
     *
     * @SWG\Tag(name="Repair Order Quote")
     * @SWG\Put(description="Set the RepairOrderQuote status as Completed")
     * @SWG\Parameter(
     *     name="repairOrderQuoteID",
     *     type="integer",
     *     in="formData",
     *     description="ID for the RepairOrderQuote",
     *     required=true
     * )
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "RepairOrderQuote Status Updated" }),
     *         )
     * )
     */
    public function customerCompleted(
        Request                    $request,
        RepairOrderQuoteRepository $repairOrderQuoteRepository,
        EntityManagerInterface     $em
    ): Response {
        $repairOrderQuoteID = $request->get('repairOrderQuoteID');
        $status             = "Completed";
        //check if param is valid
        if(!$repairOrderQuoteID){
            throw new BadRequestHttpException('Missing Required Parameter RepairOrderQuoteID');
        }
        $repairOrderQuote   = $repairOrderQuoteRepository->find($repairOrderQuoteID);
        if (!$repairOrderQuote) {
            throw new NotFoundHttpException('Repair Order Quote Not Found');
        }
        //Get RepairOrder
        $repairOrder = $repairOrderQuote->getRepairOrder();
        //Create RepairOrderQuoteInteraction
        $repairOrderQuoteInteraction = new RepairOrderQuoteInteraction();
        $repairOrderQuoteInteraction->setRepairOrderQuote($repairOrderQuote)
                                    ->setUser($repairOrder->getPrimaryTechnician())
                                    ->setCustomer($repairOrder->getPrimaryCustomer())
                                    ->setType($status);
        // Update repairOrderQuote Status
        $repairOrderQuote->addRepairOrderQuoteInteraction($repairOrderQuoteInteraction)
                         ->setStatus($status)
                         ->setDateCustomerCompleted(new DateTime());
        // Update repairOrder quote_status
        $repairOrder->setQuoteStatus($status);

        $em->persist($repairOrder);
        $em->persist($repairOrderQuote);
        $em->flush();

        return $this->handleView($this->view(['message' => 'RepairOrderQuote Status Updated'], Response::HTTP_OK));
    }

    /**
     * @Rest\Post("/api/repair-order-quote/complete")
     *
     * @SWG\Tag(name="Repair Order Quote")
     * @SWG\Put(description="Set the RepairOrderQuote status as Confirmed")
     * @SWG\Parameter(
     *     name="repairOrderQuoteID",
     *     type="integer",
     *     in="formData",
     *     description="ID for the RepairOrderQuote",
     *     required=true
     * )
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "RepairOrderQuote Status Updated" }),
     *         )
     * )
     */
    public function customerConfirmed(
        Request                    $request,
        RepairOrderQuoteRepository $repairOrderQuoteRepository,
        EntityManagerInterface     $em
    ): Response {
        $repairOrderQuoteID = $request->get('repairOrderQuoteID');
        $status             = "Confirmed";
        //check if param is valid
        if(!$repairOrderQuoteID){
            throw new BadRequestHttpException('Missing Required Parameter RepairOrderQuoteID');
        }
        $repairOrderQuote   = $repairOrderQuoteRepository->find($repairOrderQuoteID);
        if (!$repairOrderQuote) {
            throw new NotFoundHttpException('Repair Order Quote Not Found');
        }
        //Get RepairOrder
        $repairOrder = $repairOrderQuote->getRepairOrder();
        //Create RepairOrderQuoteInteraction
        $repairOrderQuoteInteraction = new RepairOrderQuoteInteraction();
        $repairOrderQuoteInteraction->setRepairOrderQuote($repairOrderQuote)
                                    ->setUser($repairOrder->getPrimaryTechnician())
                                    ->setCustomer($repairOrder->getPrimaryCustomer())
                                    ->setType($status);
        // Update repairOrderQuote Status
        $repairOrderQuote->addRepairOrderQuoteInteraction($repairOrderQuoteInteraction)
                         ->setStatus($status)
                         ->setDateCustomerConfirmed(new DateTime());
        // Update repairOrder quote_status
        $repairOrder->setQuoteStatus($status);

        $em->persist($repairOrder);
        $em->persist($repairOrderQuote);
        $em->flush();

        return $this->handleView($this->view(['message' => 'RepairOrderQuote Status Updated'], Response::HTTP_OK));
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
    public function deleteRepairOrderQuote(RepairOrderQuote $repairOrderQuote, EntityManagerInterface $em)
    {
        //delete repairOrderQuote
        $em->remove($repairOrderQuote);
        $em->flush();

        return $this->handleView(
            $this->view(
                [
                    'message' => 'RepairOrderQuote Deleted',
                ],
                Response::HTTP_OK
            )
        );
    }
}
