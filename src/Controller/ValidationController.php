<?php

namespace App\Controller;

use App\Service\PhoneValidator;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidationController extends AbstractFOSRestController
{
    /**
     * @Rest\Post("/api/validation/mobile")
     *
     * @SWG\Tag(name="Validation")
     * @SWG\Post(description="Check if mobile number is validate")
     *
     * @SWG\Parameter(name="mobileNumber", type="string", in="query")
     *
     * @SWG\Response(
     *      response="200",
     *      description="Validation success",
     *      @SWG\Schema(
     *          type="object",
     *          @SWG\Property(property="isMobile", type="boolean", description="Status of mobile validation check")
     *      )
     * )
     *
     * @SWG\Response(response="400", description="Input mobile number")
     */
    public function isMobile(Request $request, PhoneValidator $phoneValidator): Response
    {
        $mobileNumber = $request->query->get('mobileNumber');

        if (!$mobileNumber) {
            return $this->handleView($this->view('Input mobile number', Response::HTTP_BAD_REQUEST));
        }

        $mobileNumber = $phoneValidator->clean($mobileNumber);
        $isValid = $phoneValidator->isMobile($mobileNumber);

        return $this->json(['isMobile' => $isValid], Response::HTTP_OK);
    }
}
