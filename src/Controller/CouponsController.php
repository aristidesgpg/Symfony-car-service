<?php

namespace App\Controller;

use App\Helper\iServiceLoggerTrait;
use App\Service\CouponsHelper;
use App\Service\ImageUploader;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Coupon;

/**
 * Class CouponsController
 *
 * @package App\Controller
 */
class CouponsController extends AbstractFOSRestController {

    /**
     * @Rest\Get("/api/coupons")
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
     * @Rest\Get("/api/coupons/show/{id}")
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
     * @Rest\Post("/api/coupons/create")
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
     *     type="file",
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
     * @param ImageUploader $imageUploader
     *
     * @return Response
     */
    public function couponCreate (Request $request, CouponsHelper $couponsHelper,ImageUploader $imageUploader) {
        $title = $request->get('title');
        // $image = $request->get('image');
        $image = $request->files->get('image');

        // Validation
        if (!$title || !$image || !$image instanceof UploadedFile) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        $path = $imageUploader->uploadImage($image);

        $couponArray = [
            'title' => $title,
            'image' => $path
        ];

        $createOrUpdateCoupon = $couponsHelper->createOrUpdateCoupon($couponArray);
        
        if (!$createOrUpdateCoupon) {
            return $this->handleView(
                $this->view('Something Went Wrong Trying to Create the Coupon', Response::HTTP_INTERNAL_SERVER_ERROR)
            );
        }

        return $this->handleView($this->view('Create Coupon Successfully', Response::HTTP_OK));  
    }

    /**
     * @Rest\Post("/api/coupons/update/{id}")
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
     *     type="file",
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
     * @param ImageUploader $imageUploader
     *
     * @return Response
     */
    public function couponUpdate ($id,Request $request, CouponsHelper $couponsHelper,ImageUploader $imageUploader) {
        $title = $request->get('title');
        // $image = $request->get('image');
        $image = $request->files->get('image');
        

        // Validation
        if (!$title || !$image || !$image instanceof UploadedFile) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        $path = $imageUploader->uploadImage($image);

        $couponArray = [
            'id'    => $id, 
            'title' => $title,
            'image' => $path
        ];

        $createOrUpdateCoupon = $couponsHelper->createOrUpdateCoupon($couponArray);
        
        if (!$createOrUpdateCoupon) {
            return $this->handleView(
                $this->view('Something Went Wrong Trying to Update the Coupon', Response::HTTP_INTERNAL_SERVER_ERROR)
            );
        }

        return $this->handleView($this->view('Update Coupon Successfully', Response::HTTP_OK));  
    }

    /**
     * @Rest\Post("/api/coupons/delete/{id}")
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

        return $this->handleView($this->view('Delete Coupon Successfully', Response::HTTP_OK));  
    }


    /**
     * 
     * @param array $couponArray
     * @param string $type
     * @param CouponsHelper $couponsHelper
     *
     * @return Response
     */
    public function createOrUpdateCoupon(array $couponArray, string $type, CouponsHelper $couponsHelper){
        $createOrUpdateCoupon = $couponsHelper->createOrUpdateCoupon($couponArray);
        
        if (!$createOrUpdateCoupon) {
            return $this->handleView(
                $this->view('Something Went Wrong Trying to the Coupon', Response::HTTP_INTERNAL_SERVER_ERROR)
            );
        }

        return $this->handleView($this->view(' Coupon Successfully', Response::HTTP_OK));  
    }
}