<?php

namespace App\Service;

use App\Entity\RepairOrder;
use App\Helper\iServiceLoggerTrait;
use App\Repository\RepairOrderRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class RepairOrderHelper
 * @package App\Service
 */
class RepairOrderHelper {
    use iServiceLoggerTrait;

    private $em;
    private $repo;

    /**
     * RepairOrderHelper constructor.
     * @param EntityManagerInterface $em
     * @param RepairOrderRepository  $repo
     */
    public function __construct (EntityManagerInterface $em, RepairOrderRepository $repo) {
        $this->em = $em;
        $this->repo = $repo;
    }

    /**
     * @param string $roNumber
     *
     * @return bool
     */
    public function isNumberUnique (string $roNumber): bool {
        $ro = $this->repo->findByUID($roNumber);

        return ($ro === null);
    }

    /**
     * @param RepairOrder $ro
     */
    public function addRepairOrder (RepairOrder $ro): void {
        if ($ro->getId() !== null) {
            throw new \InvalidArgumentException('RO already has ID');
        }
        $this->em->persist($ro);
        if ($ro->getLinkHash() === null) {
            $ro->setLinkHash($this->generateLinkHash($ro->getDateCreated()->format('c')));
        }
        $this->commitRepairOrder();
    }

    /**
     * @param RepairOrder $ro
     */
    public function updateRepairOrder (RepairOrder $ro): void {
        if ($ro->getId() === null) {
            throw new \InvalidArgumentException('RO is missing ID');
        }
        $this->commitRepairOrder();
    }

    /**
     * @param RepairOrder $ro
     */
    public function closeRepairOrder (RepairOrder $ro): void {
        if ($ro->getDateClosed() !== null) {
            throw new \InvalidArgumentException('RO is already closed');
        }
        $ro->setDateClosed(new \DateTime());
        $this->updateRepairOrder($ro);
    }

    /**
     * @param RepairOrder $ro
     */
    public function archiveRepairOrder (RepairOrder $ro): void {
        if ($ro->isArchived() === true) {
            throw new \InvalidArgumentException('RO is already archived');
        }
        $ro->setArchived(true);
        $this->updateRepairOrder($ro);
    }

    /**
     * @param RepairOrder $ro
     */
    public function deleteRepairOrder (RepairOrder $ro): void {
        if ($ro->getDeleted() === true) {
            throw new \InvalidArgumentException('RO is already deleted');
        }
        $ro->setDeleted(true);
        $this->updateRepairOrder($ro);
    }

    private function commitRepairOrder (): void {
        $this->em->beginTransaction();
        try {
            $this->em->flush();
            $this->em->commit();
        } catch (\Exception $e) {
            $this->em->rollback();
            throw new \RuntimeException('Caught exception during flush', 0, $e);
        }
    }

    /**
     * @param string $dateCreated
     *
     * @return string
     */
    private function generateLinkHash (string $dateCreated): string {
        try {
            $hash = sha1($dateCreated . random_bytes(32));
        } catch (\Exception $e) { // Shouldn't ever happen
            throw new \RuntimeException('Could not generate random bytes. The server is broken.', 0, $e);
        }
        $ro = $this->repo->findByHash($hash);
        if ($ro !== null) { // Very unlikely
            $this->logger->warning('link hash collision');
            return $this->generateLinkHash($dateCreated);
        }

        return $hash;
    }
}