<?php

namespace App\Controller;

use App\Repository\CouponRepository;
use App\Service\ImageUploader;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;
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
     * @SWG\Tag(name="Coupons")
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
     * @param CouponRepository $couponRepository
     * @return Response
     */
    public function list (EntityManagerInterface $em, CouponRepository $couponRepository) {
        return $this->handleView($this->view($couponRepository->findBy(['deleted' => 0]), Response::HTTP_OK));
    }

    /**
     * @Rest\Post("/api/coupons/new")
     *
     * @SWG\Tag(name="Coupons")
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
     * @param EntityManagerInterface $em
     * @param Request $request
     * @param ImageUploader $imageUploader
     *
     * @return Response
     */
    public function new (EntityManagerInterface $em, Request $request, ImageUploader $imageUploader) {
        $title = $request->get('title');
        $image = $request->files->get('image');

        // Validation
        if (!$title || !$image || !$image instanceof UploadedFile) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        //check image extension is valid
        if(!$imageUploader->isValidImage($image)){ 
            return $this->handleView($this->view('Invalid Image Type', Response::HTTP_BAD_REQUEST));
        }

        $path   = $imageUploader->uploadImage($image, 'coupons');
        if(!$path){
            $this->view('Something Went Wrong Trying to Upload the Image', Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        $coupon = new Coupon();
        $coupon->setTitle($title)->setImage($path);
        $em->persist($coupon);
        $em->flush();

        return $this->handleView($this->view('Coupon Created', Response::HTTP_OK));
    }

    /**
     * @Rest\Post("/api/coupons/{id}/edit")
     *
     * @SWG\Tag(name="Coupons")
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
     * @param Request       $request
     * @param ImageUploader $imageUploader
     *
     * @return Response
     */
    public function edit (Coupon $coupon, Request $request, EntityManagerInterface $em,
                          ImageUploader $imageUploader) {
        $title = $request->get('title');
        $image = $request->files->get('image');

        // Validation
        if (!$title) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        // Only if image is passed do we update it
        if ($image && !$image instanceof UploadedFile) {
            return $this->handleView($this->view('Invalid Image Passed', Response::HTTP_BAD_REQUEST));
        }

        //check image extension is valid
        if(!$imageUploader->isValidImage($image)){ 
            return $this->handleView($this->view('Invalid Image Type', Response::HTTP_BAD_REQUEST));
        }

        $coupon->setTitle($title);

        if ($image) {
            $path = $imageUploader->uploadImage($image, 'coupons');
            if(!$path){
                $this->view('Something Went Wrong Trying to Upload the Image', Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            $coupon->setImage($path);
        }

        $em->persist($coupon);
        $em->flush();

        return $this->handleView($this->view('Coupon Updated', Response::HTTP_OK));
    }

    /**
     * @Rest\Post("/api/coupons/{id}/delete")
     *
     * @SWG\Tag(name="Coupons")
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
     * @param Coupon                 $coupon
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function delete (Coupon $coupon, EntityManagerInterface $em) {
        $coupon->setDeleted(true);

        $em->persist($coupon);
        $em->flush();

        return $this->handleView($this->view('Coupon Deleted', Response::HTTP_OK));
    }

}
