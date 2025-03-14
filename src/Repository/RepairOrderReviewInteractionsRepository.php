<?php

namespace App\Repository;

use App\Entity\RepairOrderReviewInteractions;
use App\Entity\RepairOrderReview;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use DateTime;

/**
 * @method RepairOrderReviewInteractions|null find($id, $lockMode = null, $lockVersion = null)
 * @method RepairOrderReviewInteractions|null findOneBy(array $criteria, array $orderBy = null)
 * @method RepairOrderReviewInteractions[]    findAll()
 * @method RepairOrderReviewInteractions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RepairOrderReviewInteractionsRepository extends ServiceEntityRepository
{
    /** @var EntityManagerInterface */
    private $em;

    public function __construct(ManagerRegistry $registry, EntityManagerInterface $em)
    {
        parent::__construct($registry, RepairOrderReviewInteractions::class);
        $this->em = $em;
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
     * @param Object $user
     * 
     * @return null
    */
    public function new(RepairOrderReview $review, string $status, $user){
        $reviewInteraction = new RepairOrderReviewInteractions();
       
        if ($status === 'Sent' ){
                $reviewInteraction->setUser($user);
        }
        else if ($status !== 'Sent' ){
                $reviewInteraction->setCustomer($user);
        } 

        $reviewInteraction->setType($status);
        $reviewInteraction->setRepairOrderReview($review);

        $this->em->persist($reviewInteraction);
        $this->em->flush();
    }
}
