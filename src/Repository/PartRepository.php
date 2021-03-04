<?php

namespace App\Repository;

use App\Entity\Part;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class PartRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Part::class);
    }

    public function getParts($sortField = null, $sortDirection = null, $searchTerm = null)
    {
        $qb = $this->createQueryBuilder('p');
        $columns = ['number', 'name', 'bin'];

        if ($searchTerm) {
            $query = '';
            foreach ($columns as $column) {
                if ($query) {
                    $query .= ' OR ';
                }

                $query .= "p.$column LIKE :searchTerm ";
            }

            $qb->andWhere($query)
               ->setParameter('searchTerm', '%'.$searchTerm.'%');
        }

        if ($sortDirection) {
            $qb->orderBy('p.'.$sortField, $sortDirection);
        }

        return $qb->getQuery();
    }

}
