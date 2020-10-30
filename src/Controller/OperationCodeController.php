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

    /**
     * @Rest\Post("/api/operaction-code")
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
     * @param Request                 $request
     * @param OperationCodeRepository $operationCodeRepo
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
        if(!$code || !$description || !$laborHours || !$laborTaxable || !$partsPrice || !$partsTaxable || !$suppliesPrice || !$suppliesTaxable){
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
     * @Rest\Put("/api/operaction-code/{id}")
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
     * @param Request                 $request
     * @param OperationCode           $operationCode
     * @param EntityManagerInterface  $em
     * 
     * @return Response
     */
    public function edit (Request $request, OperationCode $operationCode, EntityManagerInterface $em) {
        $code            = $request->get('code'); 
        $description     = $request->get('description');
        $laborHours      = $request->get('laborHours');
        $laborTaxable    = $request->get('laborTaxable');
        $partsPrice      = $request->get('partsPrice');
        $partsTaxable    = $request->get('partsTaxable');
        $suppliesPrice   = $request->get('suppliesPrice');
        $suppliesTaxable = $request->get('suppliesTaxable');

        //params are invalid
        if(!$code || !$description || !$laborHours || !$laborTaxable || !$partsPrice || !$partsTaxable || !$suppliesPrice || !$suppliesTaxable){
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        //update a operation code
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
            'message' => 'Operation Code Updated'
        ], Response::HTTP_OK));
    }

    /**
     * @Rest\Delete("/api/operaction-code/{id}")
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
     * @param OperationCode           $operationCode
     * @param EntityManagerInterface  $em
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
