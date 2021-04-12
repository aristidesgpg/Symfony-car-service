<?php

namespace App\Controller;

use App\Entity\PriceMatrix;
use App\Repository\PriceMatrixRepository;
use App\Service\PriceMatrixHelper;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class PriceMatrixController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/api/price-matrix")
     *
     * @SWG\Tag(name="Price Matrix")
     * @SWG\Get(description="Get Price Matrix")
     *
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(
     *         type="object",
     *         @SWG\Property(
     *             property="priceMatrixs",
     *             type="array",
     *             @SWG\Items(ref=@Model(type=PriceMatrix::class))
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
    public function list(PriceMatrixRepository $priceMatrixRepository): Response
    {
        $priceMatrixes = $priceMatrixRepository->getAllItems();

        return $this->handleView($this->view($priceMatrixes, Response::HTTP_OK));
    }

    /**
     * @Rest\Post("/api/price-matrix")
     *
     * @SWG\Tag(name="Price Matrix")
     * @SWG\Post(description="Create Price Matrix. Will delete all current data and replace it with the new matrix.")
     *
     * @SWG\Parameter(
     *     name="payload",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="[{""hours"":0,""price"":0},{""hours"":0.1,""price"":0.5},{""hours"":0.2,""price"":1},{""hours"":0.3,""price"":1.5},{""hours"":0.4,""price"":2},{""hours"":0.5,""price"":2.5},{""hours"":0.6,""price"":3},{""hours"":0.7,""price"":3.5},{""hours"":0.8,""price"":4},{""hours"":0.9,""price"":4.5},{""hours"":1,""price"":5},{""hours"":1.1,""price"":5.5},{""hours"":1.2,""price"":6},{""hours"":1.3,""price"":6.5},{""hours"":1.4,""price"":7},{""hours"":1.5,""price"":7.5},{""hours"":1.6,""price"":8},{""hours"":1.7,""price"":8.5},{""hours"":1.8,""price"":9},{""hours"":1.9,""price"":9.5}]"
     * )
     *
     * @SWG\Response(response="200", description="Success!")
     * @SWG\Response(
     *     response="400",
     *     description="Missing field"
     * )
     * @SWG\Response(
     *     response="406",
     *     description="Invalid value"
     * )
     *
     * @return Response
     */
    public function new(Request $request, PriceMatrixHelper $priceMatrixHelper)
    {
        $payload = $request->get('payload');

        try {
            $priceMatrixHelper->createPriceMatrix($payload);

            return $this->handleView(
                $this->view(
                    [
                        'message' => 'Successfully created',
                    ],
                    Response::HTTP_OK
                )
            );
        } catch (BadRequestHttpException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
    }
}
