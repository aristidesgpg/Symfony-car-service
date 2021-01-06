<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * @return int|mixed|string
     */
    public function getActiveUsers()
    {
        return $this->queryBuilder()
                    ->andWhere('u.active = 1')
                    ->orderBy('u.id', 'ASC')
                    ->getQuery()
                    ->getResult();
    }

    /**
     * @param QueryBuilder|null $qb
     * @return QueryBuilder
     */
    private function queryBuilder(QueryBuilder $qb = null): QueryBuilder
    {
        return $qb ? $qb : $this->createQueryBuilder('u');
    }

    /**
     * @param string $role
     * @return User[]
     */
    public function getUserByRole(string $role)
    {
        return $this->createQueryBuilder('u')
                    ->where('u.role = :role')
                    ->andWhere('u.active = 1')
                    ->setParameter('role', $role)
                    ->getQuery()
                    ->getResult();
    }

    /**
     * @return User[]
     */
    public function getSharedUsers(): array
    {
        return $this->createQueryBuilder('u')
                    ->where('u.shareRepairOrders = 1')
                    ->getQuery()
                    ->getResult();
    }

    // /**
    //  * @return User[] Returns an array of User objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
