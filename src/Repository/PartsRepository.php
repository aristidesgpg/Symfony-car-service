<?php

namespace App\Repository;

use App\Entity\Parts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Parts|null find($id, $lockMode = null, $lockVersion = null)
 * @method Parts|null findOneBy(array $criteria, array $orderBy = null)
 * @method Parts[]    findAll()
 * @method Parts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PartsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Parts::class);
    }

     /**
     *
     * @return QueryBuilder
     */
    public function getParts($sortField = null, $sortDirection = null, $searchTerm = null)
    {
        $qb = $this->createQueryBuilder('p');
        $columns = ['number', 'name', 'bin'];

        if ($searchTerm) {
            $query          = "";
            foreach ($columns as $column) {
                if ($query)
                    $query .= " OR ";

                $query     .= "p.$column LIKE :searchTerm ";
            }

            $qb->andWhere($query)
                ->setParameter('searchTerm', '%' . $searchTerm . '%');
        }

        if ($sortDirection)
            $qb->orderBy('p.' . $sortField, $sortDirection);

        return $qb->getQuery();
    }


    // /**
    //  * @return Parts[] Returns an array of Parts objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Parts
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
