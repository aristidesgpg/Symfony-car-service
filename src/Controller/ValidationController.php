<?php

namespace App\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
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
     *      @SWG\Property(property="isMobile", type="boolean", description="Status of mobile validation check")
     * )
     *
     * @SWG\Response(response="400", description="Input mobile number")
     */
    public function isMobile(Request $request): Response
    {
        $mobileNumber = $request->query->get('mobileNumber');

        if (!$mobileNumber) {
            return $this->handleView($this->view('Input mobile number', Response::HTTP_BAD_REQUEST));
        }
    }
}
