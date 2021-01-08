<?php

namespace App\Service;

use App\Entity\RepairOrderReview;
use App\Repository\RepairOrderReviewRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class MyReviewHelper
 *
 * @package App\Service
 */
class MyReviewHelper {

    /** @var EntityManagerInterface */
    private $em;

    /** @var RepairOrderReviewRepository */
    private $review;


    /**
     * MyReviewHelper constructor.
     *
     * @param EntityManagerInterface $em
     * @param RepairOrderReviewRepository $review
     */
    public function __construct (EntityManagerInterface $em, RepairOrderReviewRepository $review) {
        $this->em             = $em;
        $this->review         = $review;
    }

    /**
     * @param RepairOrder $repairOrder
     */
    public function new(RepairOrder $repairOrder){
        $review->new($repairOrder, $this->$em);
    }
}
