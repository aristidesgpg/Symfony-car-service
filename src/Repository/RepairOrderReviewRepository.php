<?php

namespace App\Repository;

use App\Entity\RepairOrder;
use App\Entity\RepairOrderReview;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method RepairOrderReview|null find($id, $lockMode = null, $lockVersion = null)
 * @method RepairOrderReview|null findOneBy(array $criteria, array $orderBy = null)
 * @method RepairOrderReview[]    findAll()
 * @method RepairOrderReview[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RepairOrderReviewRepository extends ServiceEntityRepository
{

    /** @var EntityManagerInterface */
    private $em;

    public function __construct(ManagerRegistry $registry, EntityManagerInterface $em)
    {
        parent::__construct($registry, RepairOrderReview::class);
        $this->em = $em;
    }

    // /**
    //  * @return RepairOrderReview[] Returns an array of RepairOrderReview objects
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
    public function findOneBySomeField($value): ?RepairOrderReview
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
     * @param RepairOrder $repairOrder
     * 
     * @return RepairOrderReview
    */
    public function new(RepairOrder $repairOrder){
        $repairOrderReview = new RepairOrderReview();
        
        $repairOrderReview->setStatus('Sent')
                          ->setDateSent(new \DateTime())
                          ->setRepairOrder($repairOrder);

        $this->em->persist($repairOrderReview);
        $this->em->flush();

        return $repairOrderReview;
    }
}
