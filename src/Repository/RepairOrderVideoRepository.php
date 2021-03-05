<?php

namespace App\Repository;

use App\Entity\RepairOrderVideo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

class RepairOrderVideoRepository extends ServiceEntityRepository
{
    /** @var EntityManagerInterface */
    private $em;

    public function __construct(ManagerRegistry $registry, EntityManagerInterface $em)
    {
        parent::__construct($registry, RepairOrderVideo::class);
        $this->em = $em;
    }
}
