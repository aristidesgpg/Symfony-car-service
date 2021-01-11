<?php

namespace App\Service;

use App\Entity\RepairOrderMPI;
use App\Entity\RepairOrderMPIInteraction;
use App\Entity\User;
use App\Repository\RepairOrderMPIInteractionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Security;

/**
 * Class MPIInteractionHelper.
 */
class MPIInteractionHelper
{
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
     */
    public function __construct(RepairOrderMPIInteractionRepository $repairOrderMPIInteractionRepo, EntityManagerInterface $em, Security $security)
    {
        $this->repairOrderMPIInteractionRepo = $repairOrderMPIInteractionRepo;
        $this->em = $em;
        $this->user = $security->getUser();
    }

    public function log(RepairOrderMPI $repairOrderMPI, string $type): bool
    {
        $repairOrder = $repairOrderMPI->getRepairOrder();
        $customer = $repairOrder->getPrimaryCustomer();
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

    public function getMPIInteractions(): array
    {
        $repairOrderMPIInteractions = $this->repairOrderMPIInteractionRepo->findAll();

        return $repairOrderMPIInteractions;
    }
}
