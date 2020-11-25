<?php

namespace App\Service;

use App\Entity\User;
use App\Entity\RepairOrderMPI;
use App\Entity\RepairOrderMPIInteraction;
use App\Repository\RepairOrderMPIInteractionRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class MPIInteractionHelper
 *
 * @package App\Service
 */
class MPIInteractionHelper {

    /**
     * @var RepairOrderMPIInteractionRepository
     */
    private $repairOrderMPIInteractionRepo;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * MPIInteractionHelper constructor.
     *
     * @param RepairOrderMPIInteractionRepository      $repairOrderMPIInteractionRepo
     * @param EntityManagerInterface $em
     */
    public function __construct (RepairOrderMPIInteractionRepository $repairOrderMPIInteractionRepo, EntityManagerInterface $em) {
        $this->repairOrderMPIInteractionRepo = $repairOrderMPIInteractionRepo;
        $this->em                                  = $em;
    }

    /**
     * @param RepairOrderMPI $repairOrderMpi
     * @param User           $user
     * @param String         $type
     *
     * @return void
     */
    public function log (RepairOrderMPI $repairOrderMPI, User $user, String $type) {

        $repairOrder = $repairOrderMPI->getRepairOrder();
        $customer    = $repairOrder->getPrimaryCustomer();
        //store repairOrderMPI
        $repairOrderMPIInteraction = new RepairOrderMPIInteraction();
        $repairOrderMPIInteraction->setRepairOrderMPI($repairOrderMPI)
                                    ->setUser($user)
                                    ->setCustomer($customer)
                                    ->setType($type);
                                
        $this->em->persist($repairOrderMPIInteraction);
        $this->em->flush();

        return true;
    }

    /**
     *
     * @return array
     */
    public function getMPIInteractions () {
        $repairOrderMPIInteractions = $this->repairOrderMPIInteractionRepo->findAll();

        return $repairOrderMPIInteractions;
    }
}
