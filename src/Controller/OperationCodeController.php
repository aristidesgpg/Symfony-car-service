<?php

namespace App\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use FOS\RestBundle\Controller\Annotations as Rest;

use App\Entity\OperationCode;
use App\Repository\OperationCodeRepository;
use Doctrine\ORM\EntityManagerInterface;


class OperationCodeController extends AbstractFOSRestController
{
     /**
     * @Rest\Get("/api/operaction-code")
     *
     * @SWG\Tag(name="OperationCode")
     * @SWG\Get(description="Get All Operation Codes")
     *     
     * @SWG\Response(
     *     response=200,
     *     description="Return Operation Codes",
     *     @SWG\Items(
     *         type="object",
     *         description="code, description, labor_hours, labor_taxable, parts_price, parts_taxable, supplies_price, supplies_taxable, deleted"
     *     )
     * )
     *
     * @param OperationCodeRepository operationCodeRepo
     *
     * @return Response
     */
    public function getOperationCodes (OperationCodeRepository $operationCodeRepo) {
        //get all active operation codes
        $operationCodes = $operationCodeRepo->getActiveOperationCodes();

        return $this->handleView($this->view($operationCodes, Response::HTTP_OK));
    }
}
