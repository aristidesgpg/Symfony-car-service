<?php

namespace App\Service;

use App\Entity\MPIGroup;
use App\Entity\MPIItem;
use App\Entity\MPITemplate;
use App\Repository\MPIItemRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class MPITemplateHelper.
 */
class MPITemplateHelper
{
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
     */
    public function __construct(MPIItemRepository $mpiItemRepository, EntityManagerInterface $em)
    {
        $this->mpiItemRepository = $mpiItemRepository;
        $this->em = $em;
    }

    /**
     * @param object $axle
     *
     * @return void
     */
    public function createMPIItems(string $type, array $names, $axle, MPIGroup $mpiGroup)
    {
        $rangeMax = null;
        $rangeUnit = null;

        if ('brake' == $type) {
            $rangeMax = isset($axle->brakesRangeMaximum) ? $axle->brakesRangeMaximum : 0;
            $rangeUnit = 'mm';
        } elseif ('tire' == $type) {
            $rangeMax = isset($axle->tireRangeMaximum) ? $axle->tireRangeMaximum : 0;
            $rangeUnit = 's';
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

    public function getActiveTemplate(MPITemplate $mpiTemplate, bool $active): MPITemplate
    {
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
