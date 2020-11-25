<?php

namespace App\Service;

use App\Entity\User;
use App\Entity\RepairOrderMPI;
use App\Entity\RepairOrderMPIInteraction;
use App\Repository\RepairOrderMPIInteractionRepository;
use Symfony\Component\Security\Core\Security;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class MPIInteractionHelper
 *
 * @package App\Service
 */
class MPIInteractionHelper {

    /**
     * @var User
     */
    private $user;

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
     * @param RepairOrderMPIInteractionRepository $repairOrderMPIInteractionRepo
     * @param EntityManagerInterface              $em
     * @param Security                            $security
     */
    public function __construct (RepairOrderMPIInteractionRepository $repairOrderMPIInteractionRepo, EntityManagerInterface $em, Security $security) {
        $this->repairOrderMPIInteractionRepo = $repairOrderMPIInteractionRepo;
        $this->em                            = $em;
        $this->user                          = $security->getUser();
    }

    /**
     * @param RepairOrderMPI $repairOrderMpi
     * @param String         $type
     *
     * @return void
     */
    public function log (RepairOrderMPI $repairOrderMPI, String $type) {

        $repairOrder = $repairOrderMPI->getRepairOrder();
        $customer    = $repairOrder->getPrimaryCustomer();
        //store repairOrderMPI
        $repairOrderMPIInteraction = new RepairOrderMPIInteraction();
        $repairOrderMPIInteraction->setRepairOrderMPI($repairOrderMPI)
                                    ->setUser($this->user)
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
