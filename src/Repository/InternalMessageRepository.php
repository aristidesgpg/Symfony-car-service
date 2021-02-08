<?php

namespace App\Repository;

use App\Entity\InternalMessage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InternalMessage|null find($id, $lockMode = null, $lockVersion = null)
 * @method InternalMessage|null findOneBy(array $criteria, array $orderBy = null)
 * @method InternalMessage[]    findAll()
 * @method InternalMessage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InternalMessageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InternalMessage::class);
    }

    // /**
    //  * @return InternalMessage[] Returns an array of InternalMessage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InternalMessage
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function getThreads($userId){
        return "
            SELECT  u.*, i.id AS im_id, i.from_id, i.to_id, i.message, i.date, i.is_read, im.unreads
            FROM internal_message i
            INNER JOIN 
            (
                SELECT MAX(date) MaxDate,  COUNT(CASE WHEN is_read = 0 THEN 1 END) AS unreads
                FROM 
                (
                    SELECT date, to_id, from_id, is_read
                    FROM  
                    internal_message
                    WHERE from_id = {$userId} OR to_id = {$userId}
                ) jj
                GROUP BY case when jj.to_id = {$userId} then jj.from_id when jj.from_id = {$userId} then jj.to_id END
            ) im
            ON i.date = im.MaxDate
            Left JOIN user u
            ON u.id = case when i.to_id = {$userId} then i.from_id when i.from_id = {$userId} then i.to_id END
            ORDER BY i.is_read ASC, i.date DESC
        ";
    }
}
