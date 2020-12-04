<?php

namespace App\Service;

use App\Entity\MPITemplate;
use App\Entity\MPIItem;
use App\Entity\MPIGroup;
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
        $this->mpiItemRepository = $mpiItemRepository;
        $this->em                = $em;
    }

    /**
     * @param string   $type
     * @param array    $names
     * @param Object   $axle
     * @param MPIGroup $mpiGroup
     *
     * @return void
     */
    public function createMPIItems (string $type, array $names, $axle, MPIGroup $mpiGroup) {
        $rangeMax  = null;
        $rangeUnit = null;

        if ($type == "brake") {
            $rangeMax  = isset($axle->brakesRangeMaximum) ? $axle->brakesRangeMaximum : 0;
            $rangeUnit = isset($axle->brakesRangeUnit) ? $axle->brakesRangeUnit : "";
        } else if ($type == "tire") {
            $rangeMax  = isset($axle->tireRangeMaximum) ? $axle->tireRangeMaximum : 0;
            $rangeUnit = isset($axle->tireRangeUnit) ? $axle->tireRangeUnit : "";
        }

        foreach ($names as $name) {
            $mpiItem = new MPIItem();
            $mpiItem->setName($name)
                    ->setMPIGroup($mpiGroup)
                    ->setHasRange(true)
                    ->setRangeMaximum($rangeMax)
                    ->setRangeUnit($rangeUnit);
            $mpiGroup->addMPIItem($mpiItem);
            $this->em->persist($mpiItem);
        }
        $this->em->flush();
    }

    /**
     * @param MPITemplate $mpiTemplate
     * @param bool        $active
     *
     * @return MPITemplate
     */
    public function getActiveTemplate (MPITemplate $mpiTemplate, bool $active) {
        //get active templates
        $mpiGroups = $mpiTemplate->getMPIGroups();
        foreach ($mpiGroups as $mpiGroup) {
            if ($mpiGroup->getDeleted() || ($active && !$mpiGroup->getActive())) {
                $mpiTemplate->removeMPIGroup($mpiGroup);
            } else {
                $mpiItems = $mpiGroup->getMPIItems();
                foreach ($mpiItems as $mpiItem) {
                    if ($mpiItem->getDeleted()) {
                        $mpiGroup->removeMPIItem($mpiItem);
                    }
                }
            }
        }

        return $mpiTemplate;
    }
}
