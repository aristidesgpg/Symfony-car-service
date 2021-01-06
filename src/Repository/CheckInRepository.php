<?php

namespace App\Repository;

use App\Entity\CheckIn;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CheckIn|null find($id, $lockMode = null, $lockVersion = null)
 * @method CheckIn|null findOneBy(array $criteria, array $orderBy = null)
 * @method CheckIn[]    findAll()
 * @method CheckIn[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CheckInRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CheckIn::class);
    }

    // /**
    //  * @return CheckIn[] Returns an array of CheckIn objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CheckIn
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    /**
     * @param 
     * 
     * @return CheckIn[] REturns array of CheckIn ojbects
     */
    public function getAllItems($start=null, $end=null, $sortField='date', $sortDirection='DESC',$searchField=null, $searchTerm=null ){
        if($end === null) {
            $end = new \DateTime();
        } else{
            $end = new \DateTime($end);
        }

        if($start)
            $start = new \DateTime($start);

        try {
            $qb = $this->createQueryBuilder('ch');
            
            if($start && $end){
                $qb->andWhere('ch.date BETWEEN :start AND :end')
                   ->setParameter('start', $start->format('Y-m-d H:i'))
                   ->setParameter('end', $end->format('Y-m-d H:i'));
            } else{
                $qb->andWhere('ch.date < :end')
                   ->setParameter('end', $end->format('Y-m-d H:i'));
            }
            if($searchTerm)
            {
                $qb->andWhere('ch.'.$searchField.' LIKE :searchTerm')
                   ->setParameter('searchTerm', '%'.$searchTerm.'%');
            }

            $qb->orderBy('ch.'.$sortField, $sortDirection);

            return $qb->getQuery()
                      ->getResult();

        } catch (NonUniqueResultException $e) {
            return null;
        }
    }
}
