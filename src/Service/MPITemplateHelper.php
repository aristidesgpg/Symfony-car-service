<?php

namespace App\Service;

use App\Entity\MpiItem;
use App\Entity\MpiGroup;
use App\Repository\MpiItemRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class MpiTemplateHelper
 *
 * @package App\Service
 */
class MpiTemplateHelper {

    /**
     * @var MpiItemRepository
     */
    private $mpiItemRepository;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * MpiTemplateHelper constructor.
     *
     * @param MpiItemRepository      $mpiItemRepository
     * @param EntityManagerInterface $em
     */
    public function __construct (MpiItemRepository $mpiItemRepository, EntityManagerInterface $em) {
        $this->mpiItemRepository  = $mpiItemRepository;
        $this->em                 = $em;
    }

    /**
     * @param String   $type
     * @param Array    $names
     * @param Object   $axle
     * @param MpiGroup $mpiGroup
     *
     * @return boolean
     */
    public function createMPIItems (String $type, Array $names, $axle, MpiGroup $mpiGroup) {
        if($type == "brake"){
            $rangeMax  = isset($axle->brakesRangeMaximum) ? $axle->brakesRangeMaximum : 0;
            $rangeUnit = isset($axle->brakesRangeUnit) ? $axle->brakesRangeUnit : "";
        }
        else if($type == "tire"){
            $rangeMax  = isset($axle->tireRangeMaximum) ? $axle->tireRangeMaximum : 0;
            $rangeUnit = isset($axle->tireRangeUnit) ? $axle->tireRangeUnit : "";
        }

        foreach($names as $name){
            $mpiItem = new MpiItem();
            $mpiItem->setName($name)
                    ->setMpiGroup($mpiGroup)
                    ->setHasRange(true)
                    ->setRangeMaximum($rangeMax)
                    ->setRangeUnit($rangeUnit);
            $this->em->persist($mpiItem);
        }
        $this->em->flush();
    }
}
