<?php

namespace App\Controller;

use App\Entity\PriceMatrix;
use App\Repository\PriceMatrixRepository;
use App\Service\Pagination;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Knp\Component\Pager\PaginatorInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Class PriceMatrixController
 *
 * @package App\Controller
 *
 */
class PriceMatrixController extends AbstractFOSRestController
{
    private const PAGE_LIMIT = 100;

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
     *
     * @param Request               $request
     * @param PriceMatrixRepository $priceMatrixRepository
     * @param PaginatorInterface    $paginator
     * @param UrlGeneratorInterface $urlGenerator
     *
     * @return Response
     */
    public function list(
        Request $request,
        PriceMatrixRepository $priceMatrixRepository,
        PaginatorInterface $paginator,
        UrlGeneratorInterface $urlGenerator
    ): Response {
        $page          = $request->query->getInt('page', 1);
        $urlParameters = [];

        // Invalid page
        if ($page < 1) {
            throw new NotFoundHttpException();
        }

        $priceMatrixQuery = $priceMatrixRepository->getAllItems();
        $pageLimit        = $request->query->getInt('pageLimit', self::PAGE_LIMIT);
        $pager            = $paginator->paginate($priceMatrixQuery, $page, $pageLimit);
        $pagination       = new Pagination($pager, $pageLimit, $urlGenerator);

        $json = [
            'priceMatrixs' => $pager->getItems(),
            'totalResults' => $pagination->totalResults,
            'totalPages'   => $pagination->totalPages,
            'previous'     => $pagination->getPreviousPageURL('app_pricematrix_list', $urlParameters),
            'currentPage'  => $pagination->currentPage,
            'next'         => $pagination->getNextPageURL('app_pricematrix_list', $urlParameters)
        ];

        $view = $this->view($json);

        return $this->handleView($view);
    }

    /**
     * @Rest\Post("/api/price-matrix")
     *
     * @SWG\Tag(name="Price Matrix")
     * @SWG\Post(description="Create Price Matrix")
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
     *     response="404",
     *     description="Invalid repairOrderId"
     * )
     * @SWG\Response(
     *     response="400",
     *     description="Missing field"
     * )
     * @SWG\Response(
     *     response="406",
     *     description="Invalid value"
     * )
     *
     *
     * @param Request                $request
     * @param PriceMatrixRepository  $respository
     * @param EntityManagerInterface $em
     *
     * @return Response
     */

    public function new(Request $request, PriceMatrixRepository $respository, EntityManagerInterface $em)
    {
        $payload       = $request->get('payload');
        $obj           = (array)json_decode($payload);

        if (is_null($obj) || !is_array($obj) || count($obj) === 0) {
            return $this->handleView($this->view('Payload data is invalid', Response::HTTP_BAD_REQUEST));
        }

        //check parameter validation
        foreach ($obj as $item) {
            if (!is_object($item))
                return $this->handleView($this->view('Payload data is invalid', Response::HTTP_BAD_REQUEST));
            $arr = get_object_vars($item);
            $keys = array_keys($arr);
            $requiredFields = ['hours', 'price'];

            foreach ($requiredFields as $key) {
                if (!in_array($key, $keys))
                    return $this->handleView($this->view("Missing $key parameter", Response::HTTP_BAD_REQUEST));

                if (!is_numeric($arr[$key]))
                    return $this->handleView($this->view("Invalid $key value", Response::HTTP_NOT_ACCEPTABLE));
            }
        }

        $allItems      = $respository->getAllItems();

        foreach ($allItems as $item) {
            $em->remove($item);
            $em->flush();
        }

        foreach ($obj as $item) {
            $priceMatrix = new PriceMatrix();
            $priceMatrix->setHours($item->hours)
                ->setPrice($item->price);

            $em->persist($priceMatrix);
            $em->flush();
        }

        return $this->handleView($this->view([
            'message' => 'Successfully created'
        ], Response::HTTP_OK));
    }
}
