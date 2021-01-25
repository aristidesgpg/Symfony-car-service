<?php

namespace App\Repository;

use App\Entity\Settings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Settings|null find($id, $lockMode = null, $lockVersion = null)
 * @method Settings|null findOneBy(array $criteria, array $orderBy = null)
 * @method Settings[]    findAll()
 * @method Settings[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SettingsRepository extends ServiceEntityRepository
{
    /**
     * SettingsRepository constructor.
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Settings::class);
    }

    /**
     * Finds the current active DMS.
     * @return int|mixed|string
     */
    public function findActiveDms()
    {
        return $this->createQueryBuilder('q')
            ->select('q.key')
            ->andwhere("q.value='true'")
            ->andWhere("q.key like 'using%'")
            ->getQuery()
            ->setMaxResults(1)
            ->getSingleScalarResult();
    }
}
