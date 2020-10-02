<?php

namespace App\Service;

use App\Entity\Coupon;
use App\Repository\CouponRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class CouponsHelper
 *
 * @package App\Service
 */
class CouponsHelper {
    /**
     * @var CouponRepository
     */
    private $couponRepository;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * CouponsHelper constructor.
     *
     * @param CouponRepository      $couponRepository
     * @param EntityManagerInterface $em
     */
    public function __construct (CouponRepository $couponRepository, EntityManagerInterface $em) {
        $this->couponRepository = $couponRepository;
        $this->em                = $em;
    }

    /**
     * @param CouponRepository $couponRepository
     *
     * @return Coupon[]
     */
    public function getAllCoupons (CouponRepository $couponRepository) {
        return $this->couponRepository->findAll();
    }

    /**
     * Will retrieve the coupon if one is found, if not maybe create one
     *
     * @param array $couponArray
     *
     * @return Coupon|boolean
     */
    public function getCouponById (array $couponArray) {

        if (!array_key_exists("id",$couponArray)){ // if id doesn't exist in the couponArray, create a new coupon
            $coupon = new Coupon();
            $coupon->setTitle(' ');
            $this->em->persist($coupon);
            $this->em->flush();

            return $coupon;
        }

        $foundCoupon = $this->couponRepository->findOneById($couponArray['id']);

        if(!$foundCoupon){ // if coupon not found
            return false;
        }

        return $foundCoupon;
    }

    /**
     * @param array $couponArray
     *
     * @return Coupon
     */
    public function findAndUpdate (array $couponArray) {

        $coupon = $this->getCouponById($couponArray);

        if (array_key_exists("title",$couponArray)){ //Update title
            $coupon->setTitle($couponArray['title']);
        }

        if (array_key_exists("image",$couponArray)){ //Update image
            $coupon->setImage($couponArray['image']);
        }

        if (array_key_exists("deleted",$couponArray)){ //Update deleted
            $coupon->setDeleted($couponArray['deleted']);
        }

        $this->em->persist($coupon);
        $this->em->flush();

        return $coupon;
    }

    /**
     * @param array $couponArray
     *
     * @return boolean
     */
    public function createOrUpdateCoupon (array $couponArray) {
        // First validate without updating
        foreach ($couponArray as $couponKey => $couponName) {
            if (!is_string($couponKey) || empty($couponKey)) {
                return false;
            }
        }

        // Update if valid
        $this->findAndUpdate($couponArray);
 
        return true;
    }

}
