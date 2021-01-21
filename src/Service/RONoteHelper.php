<?php

namespace App\Service;

use App\Entity\RepairOrder;
use App\Entity\RepairOrderNote;
use App\Helper\FalsyTrait;
use App\Helper\iServiceLoggerTrait;
use App\Repository\RepairOrderNoteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use RuntimeException;

class RONoteHelper
{
    use iServiceLoggerTrait;
    use FalsyTrait;

    private $em;
    private $repo;

    public function __construct(
        EntityManagerInterface $em,
        RepairOrderNoteRepository $repo
    ) {
        $this->em = $em;
        $this->repo = $repo;
    }

    /**
     * @return RepairOrderNote|array Array on validation failure
     */
    public function addRepairOrderNote(RepairOrder $repairOrder, array $params)
    {
        $errors = [];
        $required = ['note'];
        foreach ($required as $k) {
            if (!isset($params[$k]) || strlen($params[$k]) === 0) {
                $errors[$k] = 'Required field missing';
            }
        }

        if (!empty($errors)) {
            return $errors;
        }

        $roNote = new RepairOrderNote();
        $roNote->setRepairOrder($repairOrder);
        if (isset($params['note'])) {
            $roNote->setNote($params['note']);
        }

        $this->em->persist($roNote);
        $this->commitRepairOrderNote();

        return $roNote;
    }

    private function commitRepairOrderNote(): void
    {
        $this->em->beginTransaction();
        try {
            $this->em->flush();
            $this->em->commit();
        } catch (Exception $e) {
            $this->em->rollback();
            throw new RuntimeException('Caught exception during flush', 0, $e);
        }
    }

    public function deleteRepairOrderNote(RepairOrderNote $roNote): void
    {
        $this->em->remove($roNote);
        $this->em->flush();
    }
}
