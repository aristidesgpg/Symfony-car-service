<?php

namespace App\Repository;

use App\Entity\PriceMatrix;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PriceMatrix|null find($id, $lockMode = null, $lockVersion = null)
 * @method PriceMatrix|null findOneBy(array $criteria, array $orderBy = null)
 * @method PriceMatrix[]    findAll()
 * @method PriceMatrix[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PriceMatrixRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PriceMatrix::class);
    }

    // /**
    //  * @return PriceMatrix[] Returns an array of PriceMatrix objects
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

    public function getAllItems()
    {
        return $this->createQueryBuilder('p')
            ->orderBy("p.hours", "ASC")
            ->getQuery()
            ->getResult()
        ;
    }
    
    public function getPrice($hours)
    {
        $item =  $this->createQueryBuilder('p')
            ->select("p.price")
            ->where("p.hours = :hours")
            ->setParameter("hours", $hours)
            ->getQuery()
            ->getOneOrNullResult();
        
        if($item)
            return $item['price'];
        else
            return null;
    }

}
