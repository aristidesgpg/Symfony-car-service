<?php

namespace App\Controller;

use App\Repository\CustomerRepository;
use App\Service\PhoneValidator;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PhoneLookupController extends AbstractFOSRestController
{
    /**
     * @Rest\Post("/api/phone-lookup")
     *
     * @SWG\Tag(name="Phone Lookup")
     * @SWG\Post(description="Check if mobile number is validate")
     *
     * @SWG\Parameter(name="phone", type="string", in="formData")
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
        $mobileNumber = $request->get('mobileNumber');

        if (!$mobileNumber) {
            return $this->handleView($this->view('Input mobile number', Response::HTTP_BAD_REQUEST));
        }

        $mobileNumber = $phoneValidator->clean($mobileNumber);
        $isValid = $phoneValidator->isMobile($mobileNumber);

        return $this->json(['isMobile' => $isValid], Response::HTTP_OK);
    }
}
