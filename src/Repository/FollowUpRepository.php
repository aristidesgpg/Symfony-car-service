<?php

namespace App\Repository;

use App\Entity\FollowUp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FollowUp|null find($id, $lockMode = null, $lockVersion = null)
 * @method FollowUp|null findOneBy(array $criteria, array $orderBy = null)
 * @method FollowUp[]    findAll()
 * @method FollowUp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FollowUpRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FollowUp::class);
    }

    // /**
    //  * @return FollowUp[] Returns an array of FollowUp objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FollowUp
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    /**
     * @param 
     * 
     * @return FollowUp[] Returns array of FolloUp ojbects
     */
    public function getAllItems($start = null, $end = null, $status = null, $sortField = 'date_crated', $sortDirection = 'DESC', $searchTerm = null, $columns = [] ){
        if(is_null($end)) {
            $end   = new \DateTime();
        } else{
            $end   = new \DateTime($end);
        }

        if($start)
            $start = new \DateTime($start);

        try {
            $qb    = $this->createQueryBuilder('fu');
            
            if($start && $end){
                $qb->andWhere('fu.dateCreated BETWEEN :start AND :end OR fu.dateSent BETWEEN :start AND :end OR 
                               fu.dateViewed BETWEEN :start AND :end OR fu.dateConverted BETWEEN :start AND :end ')
                   ->setParameter('start', $start->format('Y-m-d H:i'))
                   ->setParameter('end', $end->format('Y-m-d H:i'));
            } else{
                $qb->andWhere('fu.dateCreated < :end OR fu.dateSent < :end OR fu.dateViewed < :end OR fu.dateConverted < :end')
                   ->setParameter('end', $end->format('Y-m-d H:i'));
            }
            if($searchTerm)
            {
                $query = "";

                foreach($columns as $column){
                    if($query){
                        $query .= " OR ";
                    }
                    $query .='fu.'.$column.' LIKE :searchTerm';
                }
                $qb->andWhere($query)
                   ->setParameter('searchTerm', '%'.$searchTerm.'%');
            }

            if($sortDirection){
                $qb->orderBy('fu.'.$sortField, $sortDirection);
            }
            else{
                $qb->orderBy('fu.dateCreated', 'DESC');
            }

            if($status){
                $qb->andWhere('fu.status < :status')
                   ->setParameter('status', $status);
            }
 
            return $qb->getQuery();
 
        } catch (NonUniqueResultException $e) {
            return null;
        }
    }

    /**
     * @param $delay
     * 
     * @return FollowUp[] Returns array of FolloUp ojbects
     */
    public function getAllDelayedItems($delay){
        try {
            $qb = $this->createQueryBuilder("fu");
            
            $qb->andWhere(":now >= DATE_ADD(fu.dateCreated, :delay , 'day')")
               ->andWhere("fu.dateSent is NULL")
               ->setParameter("now", new \DateTime())
               ->setParameter("delay", $delay);

            return $qb->getQuery()->getResult();
 
        } catch (NonUniqueResultException $e) {
            return null;
        }
    }
}
