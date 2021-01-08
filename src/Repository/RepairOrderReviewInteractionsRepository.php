<?php

namespace App\Repository;

use App\Entity\RepairOrderReviewInteractions;
use App\Entity\RepairOrderReview;
use App\Entity\User;
use App\Entity\Customer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RepairOrderReviewInteractions|null find($id, $lockMode = null, $lockVersion = null)
 * @method RepairOrderReviewInteractions|null findOneBy(array $criteria, array $orderBy = null)
 * @method RepairOrderReviewInteractions[]    findAll()
 * @method RepairOrderReviewInteractions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RepairOrderReviewInteractionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RepairOrderReviewInteractions::class);
    }

    // /**
    //  * @return RepairOrderReviewInteractions[] Returns an array of RepairOrderReviewInteractions objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RepairOrderReviewInteractions
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    /** 
     * @param RepairOrderReview $repairOrder
     * @param String $status
     * @param EntityManagerInterface $em
     * 
     * @return null
    */
    public function new(RepairOrderReview $review, $status, EntityManagerInterface $em){
        $reviewInteraction = new RepairOrderReviewInteractions();
        $user    = $this->getUser();
       
        if ( ($status === 'Sent' ) && (!$user instanceof User) ){
            throw new \InvalidArgumentException('This is not instance of User');
        }
        else if ( ($status !== 'Sent' ) && (!$user instanceof Customer) ){
            throw new \InvalidArgumentException('This is not instance of Customer');
        }
        
        $reviewInteraction->setType($status);
        $reviewInteraction->setUser($user);
        $reviewInteraction->setRepairOrderReview($review);

        $em->persist($reviewInteraction);
        $em->flush();
    }
}
