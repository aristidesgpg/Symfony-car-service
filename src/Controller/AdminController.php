<?php

namespace App\Controller;

use App\Response\ValidationResponse;
use App\Service\SettingsHelper;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Security\Core\Security;

class AdminController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/api/get-settings")
     *
     * @SWG\Tag(name="Admin")
     * @SWG\Get(description="Get settings")
     *
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(
     *         type="object",
     *         @SWG\Property(property="hasPayments", type="boolean"),
     *         @SWG\Property(property="paymentToken", type="string"),
     *         @SWG\Property(property="myReviewActivated", type="boolean"),
     *         @SWG\Property(property="usingAutomate", type="boolean"),
     *         @SWG\Property(property="usingCdk", type="boolean"),
     *         @SWG\Property(property="usingDealerBuilt", type="boolean"),
     *         @SWG\Property(property="usingDealerTrack", type="boolean"),
     *     )
     * )
     * 
     * @SWG\Response(
     *     response="403",
     *     description="Invalid permission"
     * )
     *
     */
    public function getSettings( SettingsHelper $settingsHelper, Security $security ) {
        if (!$security->isGranted('ROLE_ADMIN') ||  !$this->getUser()->getExternalAuthentication()) {
            throw new BadRequestHttpException('The user should be admin and the external_authenticaion feature should be available');
        }

        $json = [
            'hasPayments' => $settingsHelper->getSetting("hasPayments"),
            'paymentToken' => $settingsHelper->getSetting("paymentToken"),
            'myReviewActivated' => $settingsHelper->getSetting("myReviewActivated"),
            'usingAutomate' =>$settingsHelper->getSetting("usingAutomate"),
            'usingCdk' => $settingsHelper->getSetting("usingCdk"),
            'usingDealerBuilt' => $settingsHelper->getSetting("usingDealerBuilt"),
            'usingDealerTrack' => $settingsHelper->getSetting("usingDealerTrack"),
         ];

        $view = $this->view($json);
        return $this->handleView($view);
    }

    /**
     * @Rest\Post("/api/admin/set-settings")
     *
     * @SWG\Tag(name="Admin")
     * @SWG\Post(description="Create settings")
     *
     * @SWG\Parameter(
     *     name="hasPayments",
     *     type="boolean",
     *     description="Set the hasPayments setting",
     *     in="formData",
     * )
     * 
     * @SWG\Parameter(
     *     name="paymentToken",
     *     type="string",
     *     description="Set the paymentToken setting",
     *     in="formData",
     * )
     * 
     * @SWG\Parameter(
     *     name="nmiUsername",
     *     type="string",
     *     description="Update the NMI_USERNAME in env.local",
     *     in="formData",
     * )
     * 
     * @SWG\Parameter(
     *     name="nmiPassword",
     *     type="string",
     *     description="Update the NMI_PASSWORD in env.local",
     *     in="formData",
     * )
     * 
     * @SWG\Parameter(
     *     name="myReviewActivated",
     *     type="boolean",
     *     description="Set the myReviewActivated setting",
     *     in="formData",
     * )
     * 
     * @SWG\Parameter(
     *     name="usingAutomate",
     *     type="boolean",
     *     description="Set the usingAutomate setting",
     *     in="formData",
     * )
     * 
     * @SWG\Parameter(
     *     name="automateEndpointId",
     *     type="string",
     *     description="Update the AUTOMATE_ENDPOINT_ID in .env.local",
     *     in="formData",
     * )
     * 
     * @SWG\Parameter(
     *     name="usingCdk",
     *     type="boolean",
     *     description="Set the usingCdk setting",
     *     in="formData",
     * )
     * 
     * @SWG\Parameter(
     *     name="cdkDealerId",
     *     type="string",
     *     description="Update the CDK_DEALER_ID in .env.local",
     *     in="formData",
     * )
     * 
     * @SWG\Parameter(
     *     name="usingDealerBuilt",
     *     type="boolean",
     *     description="Set the usingDealerBuilt setting",
     *     in="formData",
     * )
     * 
     * @SWG\Parameter(
     *     name="dealerbuiltLocationId",
     *     type="string",
     *     description="Update the DEALERBUILT_LOCATION_ID in .env.local",
     *     in="formData",
     * )
     * 
     * @SWG\Parameter(
     *     name="usingDealerTrack",
     *     type="boolean",
     *     description="Set the usingDealerTrack setting",
     *     in="formData",
     * )
     * 
     * @SWG\Parameter(
     *     name="dealertrackEnterprise",
     *     type="string",
     *     description="Update the DEALERTRACK_ENTERPRISE in .env.local",
     *     in="formData",
     * )
     * 
     * @SWG\Parameter(
     *     name="dealertrackLocationId",
     *     type="string",
     *     description="Update the DEALERTRACK_LOCATION_ID in .env.local",
     *     in="formData",
     * )
     * 
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     * )
     *
     * @SWG\Response(
     *     response="403",
     *     description="Invalid permission"
     * )
     *
     * @return Response
     */
    public function new(Request $request, SettingsHelper $settingsHelper, Security $security)
    {
        if (!$security->isGranted('ROLE_ADMIN') || !$this->getUser()->getExternalAuthentication()) {
            throw new BadRequestHttpException('The user should be admin and the external_authenticaion feature should be available');
        }
        
        if (count($request->request->all()) !== 0) {
            $settingsHelper->adminCommitSettings($request->request->all());
        }

        $view = $this->view("Successfully saved", Response::HTTP_OK);

        return $this->handleView($view);
    }
}
