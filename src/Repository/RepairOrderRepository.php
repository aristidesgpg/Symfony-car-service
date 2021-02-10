<?php

namespace App\Repository;

use App\Entity\RepairOrder;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RepairOrder|null find($id, $lockMode = null, $lockVersion = null)
 * @method RepairOrder|null findOneBy(array $criteria, array $orderBy = null)
 * @method RepairOrder[]    findAll()
 * @method RepairOrder[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RepairOrderRepository extends ServiceEntityRepository
{
    /**
     * RepairOrderRepository constructor.
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RepairOrder::class);
    }

    /**
     * @return array
     */
    public function getOpenRepairOrders(): array
    {
        //Set the number as the key to make it faster for finding.
        $results = $this->findBy(['dateClosed' => null, 'deleted' => 0]);
        $result = [];
        foreach ($results as $r) {
            $result[$r->getNumber()] = $r;
        }

        return $result;
    }

    public function findByUID(string $uid): ?RepairOrder
    {
        try {
            // If they pass an integer, they're trying to find an ID
            if (is_int($uid)) {
                return $this->find($uid);
            }

            return $this->createQueryBuilder('r')
                        ->orWhere('r.number= :uid')
                        ->orWhere('r.linkHash = :uid')
                        ->setParameter('uid', $uid)
                        ->orderBy('r.id', 'DESC')
                        ->setMaxResults(1)
                        ->getQuery()
                        ->getOneOrNullResult();
        } catch (NonUniqueResultException $e) {
            // shouldn't happen
            return null;
        }
    }

    public function findByNumber(string $number): ?RepairOrder
    {
        try {
            return $this->createQueryBuilder('ro')
                        ->andWhere('ro.number = :number')
                        ->setParameter('number', $number)
                        ->getQuery()
                        ->getOneOrNullResult();
        } catch (NonUniqueResultException $e) {
            return null;
        }
    }

    public function findByHash(string $linkHash): ?RepairOrder
    {
        try {
            return $this->createQueryBuilder('ro')
                        ->andWhere('ro.linkHash = :hash')
                        ->setParameter('hash', $linkHash)
                        ->getQuery()
                        ->getOneOrNullResult();
        } catch (NonUniqueResultException $e) {
            return null;
        }
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
