<?php

namespace App\Controller;

use App\Helper\iServiceLoggerTrait;
use App\Service\SettingsHelper;
use App\Service\CouponsHelper;


use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\Setting;
use App\Entity\Coupon;

/**
 * Class SettingsController
 *
 * @package App\Controller
 */
class SettingsController extends AbstractFOSRestController {
    use iServiceLoggerTrait;

    /**
     * @Rest\Get("/api/settings")
     *
     * @SWG\Tag(name="Settings")
     * @SWG\Get(description="Get all settings")
     * @SWG\Parameter(
     *     name="Authorization",
     *     type="string",
     *     in="header",
     *     description="JWT Auth token",
     *     @SWG\Schema(
     *          type="object",
     *          @SWG\Property(property="Authorization", type="string", example={"Authorization": "Bearer <token
     *                                                  string>"})
     *
     *     )
     * )
     * @SWG\Response(
     *     response=200,
     *     description="Return settings",
     *     @SWG\Items(
     *         type="object",
     *             description="key/pair values of all available settings. Will expand over time."
     *         )
     * )
     *
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function getSettings (EntityManagerInterface $em) {
        $setting = $em->getRepository(Setting::class)->findAll();

        return $this->handleView($this->view($setting, 200));
    }

    /**
     * @Rest\Post("/api/settings/upgrade/edit")
     *
     * @SWG\Tag(name="Settings")
     * @SWG\Post(description="Update upgrade settings")
     *
     * @SWG\Parameter(
     *     name="Authorization",
     *     type="string",
     *     in="header",
     *     description="JWT Auth token",
     *     @SWG\Schema(
     *          type="object",
     *          @SWG\Property(property="Authorization", type="string", example={"Authorization": "Bearer <token
     *                                                  string>"})
     *     )
     * )
     * @SWG\Parameter(
     *     name="percentageOfTax",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The percentage of tax to be paid on a trade in vehicle",
     * )
     * @SWG\Parameter(
     *     name="limitOnTax",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The limit on applicable tax to be paid on a trade in vehicle",
     * )
     * @SWG\Parameter(
     *     name="totalDays",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="Total days until this offer expires",
     * )
     *
     * @SWG\Parameter(
     *     name="websiteUrl",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The website url to direct a user to obtain their instant cash offer",
     * )
     *
     * @SWG\Parameter(
     *     name="upgradeInitialText",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="Upgrade Initial Text (Message that gets sent to a customer about their vehicle value. Limit 109
     *     characters)",
     * )
     *
     * @SWG\Parameter(
     *     name="upgradeOfferText",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="Upgrade Offer Text (Message that gets sent when a manager sends a cash offer to the customer.
     *     Limit 109 characters)",
     * )
     *
     * @SWG\Parameter(
     *     name="upgradeCashOffer",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="Upgrade cash offer copy",
     * )
     *
     * @SWG\Parameter(
     *     name="upgradeDisclaimer",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="Upgrade disclaimer",
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
     * @param Request        $request
     * @param SettingsHelper $settingsHelper
     *
     * @return Response
     */
    public function upgradeEdit (Request $request, SettingsHelper $settingsHelper) {
        $percentageOfTax    = $request->get('percentageOfTax');
        $limitOnTax         = $request->get('limitOnTax');
        $totalDays          = $request->get('totalDays');
        $websiteUrl         = $request->get('websiteUrl');
        $upgradeInitialText = $request->get('upgradeInitialText');
        $upgradeOfferText   = $request->get('upgradeOfferText');
        $upgradeCashOffer   = $request->get('upgradeCashOffer');
        $upgradeDisclaimer  = $request->get('upgradeDisclaimer');

        // Validation
        if (!$percentageOfTax || !$limitOnTax || !$totalDays || !$websiteUrl || !$upgradeInitialText ||
            !$upgradeOfferText || !$upgradeCashOffer || !$upgradeDisclaimer) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        $settingsArray = [
            'percentageOfTax'    => $percentageOfTax,
            'limitOnTax'         => $limitOnTax,
            'totalDays'          => $totalDays,
            'websiteUrl'         => $websiteUrl,
            'upgradeInitialText' => $upgradeInitialText,
            'upgradeOfferText'   => $upgradeOfferText,
            'upgradeCashOffer'   => $upgradeCashOffer,
            'upgradeDisclaimer'  => $upgradeDisclaimer,
        ];

        $bulkUpdateResult = $settingsHelper->bulkUpdate($settingsArray);
        if (!$bulkUpdateResult) {
            return $this->handleView(
                $this->view('Something Went Wrong Trying to Update the Settings', Response::HTTP_INTERNAL_SERVER_ERROR)
            );
        }

        return $this->handleView($this->view('Settings Updated', Response::HTTP_OK));
    }

    /**
     * @Rest\Get("/api/settings/coupons")
     *
     * @SWG\Tag(name="Settings Coupons")
     * @SWG\Get(description="Get all coupons")
     * @SWG\Parameter(
     *     name="Authorization",
     *     type="string",
     *     in="header",
     *     description="JWT Auth token",
     *     @SWG\Schema(
     *          type="object",
     *          @SWG\Property(property="Authorization", type="string", example={"Authorization": "Bearer <token
     *                                                  string>"})
     *
     *     )
     * )
     * @SWG\Response(
     *     response=200,
     *     description="Return coupons",
     *     @SWG\Items(
     *         type="object",
     *             description="id, title, image, deleted value for coupons"
     *         )
     * )
     *
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function getCoupons (EntityManagerInterface $em) {
        $coupon = $em->getRepository(Coupon::class)->findAll();

        return $this->handleView($this->view($coupon, 200));
    }

    /**
     * @Rest\Get("/api/settings/coupons/show/{id}")
     *
     * @SWG\Tag(name="Settings Coupons")
     * @SWG\Get(description="Show a coupon")
     * @SWG\Parameter(
     *     name="Authorization",
     *     type="string",
     *     in="header",
     *     description="JWT Auth token",
     *     @SWG\Schema(
     *          type="object",
     *          @SWG\Property(property="Authorization", type="string", example={"Authorization": "Bearer <token
     *                                                  string>"})
     *
     *     )
     * )
     * @SWG\Response(
     *     response=200,
     *     description="Return coupons",
     *     @SWG\Items(
     *         type="object",
     *             description="id, title, image, deleted value for coupons"
     *         )
     * )
     *
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function couponShow ($id, EntityManagerInterface $em) {
        $coupon = $em->getRepository(Coupon::class)->findById($id);

        return $this->handleView($this->view($coupon, 200));
    }

    /**
     * @Rest\Post("/api/settings/coupons/create")
     *
     * @SWG\Tag(name="Settings Coupons")
     * @SWG\Post(description="Create a coupon")
     *
     * @SWG\Parameter(
     *     name="Authorization",
     *     type="string",
     *     in="header",
     *     description="JWT Auth token",
     *     @SWG\Schema(
     *          type="object",
     *          @SWG\Property(property="Authorization", type="string", example={"Authorization": "Bearer <token
     *                                                  string>"})
     *     )
     * )
     * 
     * @SWG\Parameter(
     *     name="title",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The title of coupon",
     * )
     * 
     * @SWG\Parameter(
     *     name="image",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The image of coupon",
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
     * @param Request        $request
     * @param CouponsHelper $couponsHelper
     *
     * @return Response
     */
    public function couponCreate (Request $request, CouponsHelper $couponsHelper) {
        $title = $request->get('title');
        $image = $request->get('image');

        // Validation
        if (!$title || !$image) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        $couponArray = [
            'title' => $title,
            'image' => $image
        ];

        $createOrUpdateCoupon = $couponsHelper->createOrUpdateCoupon($couponArray);
        
        if (!$createOrUpdateCoupon) {
            return $this->handleView(
                $this->view('Something Went Wrong Trying to Create the Coupon', Response::HTTP_INTERNAL_SERVER_ERROR)
            );
        }

        return $this->handleView($this->view('Coupon Created', Response::HTTP_OK));
    }

    /**
     * @Rest\Post("/api/settings/coupons/update/{id}")
     *
     * @SWG\Tag(name="Settings Coupons")
     * @SWG\Post(description="Update a coupon")
     *
     * @SWG\Parameter(
     *     name="Authorization",
     *     type="string",
     *     in="header",
     *     description="JWT Auth token",
     *     @SWG\Schema(
     *          type="object",
     *          @SWG\Property(property="Authorization", type="string", example={"Authorization": "Bearer <token
     *                                                  string>"})
     *     )
     * )
     * 
     * @SWG\Parameter(
     *     name="title",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The title of coupon",
     * )
     * 
     * @SWG\Parameter(
     *     name="image",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The image of coupon",
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
     * @param Request        $request
     * @param CouponsHelper $couponsHelper
     *
     * @return Response
     */
    public function couponUpdate ($id,Request $request, CouponsHelper $couponsHelper) {
        $title = $request->get('title');
        $image = $request->get('image');

        // Validation
        if (!$title || !$image) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        $couponArray = [
            'id'    => $id, 
            'title' => $title,
            'image' => $image
        ];

        $createOrUpdateCoupon = $couponsHelper->createOrUpdateCoupon($couponArray);
        
        if (!$createOrUpdateCoupon) {
            return $this->handleView(
                $this->view('Something Went Wrong Trying to Update the Coupon', Response::HTTP_INTERNAL_SERVER_ERROR)
            );
        }

        return $this->handleView($this->view('Coupon Updated', Response::HTTP_OK));   
    }

    /**
     * @Rest\Post("/api/settings/coupons/delete/{id}")
     *
     * @SWG\Tag(name="Settings Coupons")
     * @SWG\Post(description="Delete a coupon")
     *
     * @SWG\Parameter(
     *     name="Authorization",
     *     type="string",
     *     in="header",
     *     description="JWT Auth token",
     *     @SWG\Schema(
     *          type="object",
     *          @SWG\Property(property="Authorization", type="string", example={"Authorization": "Bearer <token
     *                                                  string>"})
     *     )
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
     * @param CouponsHelper $couponsHelper
     *
     * @return Response
     */
    public function couponDelete ($id, CouponsHelper $couponsHelper) {

        $couponArray = [
            'id'      => $id, 
            'deleted' => true
        ];

        $createOrUpdateCoupon = $couponsHelper->createOrUpdateCoupon($couponArray);
        
        if (!$createOrUpdateCoupon) {
            return $this->handleView(
                $this->view('Something Went Wrong Trying to Delete the Coupon', Response::HTTP_INTERNAL_SERVER_ERROR)
            );
        }

        return $this->handleView($this->view('Coupon Deleted', Response::HTTP_OK));   
    }
}
