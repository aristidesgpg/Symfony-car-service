<?php

namespace App\Service;

use App\Entity\MPIItem;
use App\Entity\InspectionGroup;
use App\Repository\MPIItemRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class MPITemplateHelper
 *
 * @package App\Service
 */
class MPITemplateHelper {

    /**
     * @var MPIItemRepository
     */
    private $mpiItemRepository;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * MPITemplateHelper constructor.
     *
     * @param MPIItemRepository      $mpiItemRepository
     * @param EntityManagerInterface $em
     */
    public function __construct (MPIItemRepository $mpiItemRepository, EntityManagerInterface $em) {
        $this->mpiItemRepository  = $mpiItemRepository;
        $this->em                 = $em;
    }

    /**
     * @param String          $type
     * @param Array           $names
     * @param Object          $axle
     * @param InspectionGroup $inspectionGroup
     *
     * @return boolean
     */
    public function createMPIItems (String $type, Array $names, $axle, InspectionGroup $inspectionGroup) {
        if($type == "brake"){
            $rangeMax  = isset($axle->brakesRangeMaximum) ? $axle->brakesRangeMaximum : 0;
            $rangeUnit = isset($axle->brakesRangeUnit) ? $axle->brakesRangeUnit : "";
        }
        else if($type == "tire"){
            $rangeMax  = isset($axle->tireRangeMaximum) ? $axle->tireRangeMaximum : 0;
            $rangeUnit = isset($axle->tireRangeUnit) ? $axle->tireRangeUnit : "";
        }

        foreach($names as $name){
            $mpiItem = new MPIItem();
            $mpiItem->setName($name)
                                ->setMpiInspectionGroupId($inspectionGroup)
                                ->setHasRange(true)
                                ->setRangeMaximum($rangeMax)
                                ->setRangeUnit($rangeUnit);
            $this->em->persist($mpiItem);
        }
        $this->em->flush();
    }
}
