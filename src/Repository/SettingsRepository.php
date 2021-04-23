<?php

namespace App\Repository;

use App\Entity\Settings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
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
     * @return array|int|string
     */
    public function findKeys()
    {
        $result = $this->createQueryBuilder('s')
            ->select('s.key')
            ->getQuery()
            ->getArrayResult();

        return array_map(function ($v) {return $v['key']; }, $result);
    }

    /**
     * Finds the current active DMS.
     * @return int|mixed|string
     */
    public function findActiveDms()
    {
        try {
            return $this->createQueryBuilder('q')
                ->select('q.key')
                ->andwhere("q.value='1'")
                ->andWhere("q.key like 'using%'")
                ->getQuery()
                ->setMaxResults(1)
                ->getSingleScalarResult();
        } catch (NoResultException | NonUniqueResultException $e) {
        }

        return null;
    }

}
