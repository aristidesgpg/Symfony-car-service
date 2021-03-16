<?php

namespace App\Controller;

use App\Entity\RepairOrderQuote;
use App\Helper\iServiceLoggerTrait;
use App\Repository\RepairOrderQuoteRepository;
use App\Repository\RepairOrderRepository;
use App\Service\RepairOrderQuoteHelper;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
     *     description="[{""operationCode"":14, ""description"":""Neque maxime ex dolorem ut."",""preApproved"":true,""approved"":true,""partsPrice"":1.0,""suppliesPrice"":14.02,""laborPrice"":5.3,""notes"":""Cumque tempora ut nobis."", ""parts"":[{""number"":""34843434"", ""description"":""This is a test description"", ""price"":23.3, ""quantity"":23}, {""number"":""12254345"", ""description"":""This is a test description1"", ""price"":13.3, ""quantity"":13}]},{""operationCode"":11, ""description"":""Quidem earum sapiente at dolores quia natus."",""preApproved"":false,""approved"":true,""partsPrice"":2.6,""suppliesPrice"":509.02,""laborPrice"":36.9,""notes"":""Et accusantium rerum.""},{""operationCode"":4, ""description"":""Mollitia unde nobis doloribus sed."",""preApproved"":true,""approved"":false,""partsPrice"":1.1,""suppliesPrice"":71.7,""laborPrice"":55.1,""notes"":""Voluptates et aut debitis.""}]",
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
     */
    public function createRepairOrderQuote(
        Request $request,
        RepairOrderRepository $repairOrderRepository,
        RepairOrderQuoteRepository $repairOrderQuoteRepository,
        EntityManagerInterface $em,
        RepairOrderQuoteHelper $helper
    ) {
        $repairOrderID = $request->get('repairOrderID');
        $recommendations = $request->get('recommendations');

        // check if params are valid
        if (!$repairOrderID) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        // Check if Repair Order exists
        $repairOrder = $repairOrderRepository->findByUID($repairOrderID);
        if (!$repairOrder) {
            throw new NotFoundHttpException('Repair Order not found');
        }

        // Check if there is a quote already
        $exists = $repairOrderQuoteRepository->findOneBy(['repairOrder' => $repairOrder]);
        if ($exists) {
            throw new BadRequestHttpException('A quote already exists for this Repair Order');
        }

        // store repairOrderQuote
        $repairOrderQuote = new RepairOrderQuote();
        $repairOrderQuote->setRepairOrder($repairOrder);

        $em->persist($repairOrderQuote);
        
        $repairOrder->setRepairOrderQuote($repairOrderQuote);
        $em->persist($repairOrder);

        $em->flush();

        // Validate recommendation json
        $recommendations = json_decode($recommendations);
        if (is_null($recommendations) || !is_array($recommendations) || count($recommendations) === 0) {
            throw new BadRequestHttpException('Recommendations data is invalid');
        }

        try {
            $helper->validateRecommendationsJson($recommendations);
            $helper->buildRecommendations($repairOrderQuote, $recommendations);
        } catch (Exception $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        $view = $this->view($repairOrderQuote);
        $view->getContext()->setGroups(['roq_list', 'roqs_list', 'roqp_list']);

        return $this->handleView($view);
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
     *     description="[{""operationCode"":14, ""description"":""Neque maxime ex dolorem ut."",""preApproved"":true,""approved"":true,""partsPrice"":1.0,""suppliesPrice"":14.02,""laborPrice"":5.3,""notes"":""Cumque tempora ut nobis."", ""parts"":[{""number"":""34843434"", ""description"":""This is a test description"", ""price"":23.3, ""quantity"":23}, {""number"":""12254345"", ""description"":""This is a test description1"", ""price"":13.3, ""quantity"":13}]},{""operationCode"":11, ""description"":""Quidem earum sapiente at dolores quia natus."",""preApproved"":false,""approved"":true,""partsPrice"":2.6,""suppliesPrice"":509.02,""laborPrice"":36.9,""notes"":""Et accusantium rerum.""},{""operationCode"":4, ""description"":""Mollitia unde nobis doloribus sed."",""preApproved"":true,""approved"":false,""partsPrice"":1.1,""suppliesPrice"":71.7,""laborPrice"":55.1,""notes"":""Voluptates et aut debitis.""}]",
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
     * @throws Exception
     */
    public function updateRepairOrderQuote(
        RepairOrderQuote $repairOrderQuote,
        Request $request,
        RepairOrderQuoteHelper $repairOrderQuoteHelper
    ): Response {
        $recommendations = $request->get('recommendations');

        if (!$recommendations) {
            throw new BadRequestHttpException('Missing Required Parameter: recommendations');
        }

        // Validate recommendation json
        $recommendations = json_decode($recommendations);
        if (is_null($recommendations) || !is_array($recommendations) || count($recommendations) === 0) {
            throw new BadRequestHttpException('Recommendations data is invalid');
        }

        try {
            $repairOrderQuoteHelper->validateRecommendationsJson($recommendations);
            $repairOrderQuoteHelper->buildRecommendations($repairOrderQuote, $recommendations);
        } catch (Exception $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        $view = $this->view($repairOrderQuote);
        $view->getContext()->setGroups(['roq_list', 'roqs_list', 'roqp_list']);

        return $this->handleView($view);
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
