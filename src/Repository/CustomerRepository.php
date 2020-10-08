<?php

namespace App\Repository;

use App\Entity\Customer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Customer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Customer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Customer[]    findAll()
 * @method Customer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CustomerRepository extends ServiceEntityRepository {
    public function __construct (ManagerRegistry $registry) {
        parent::__construct($registry, Customer::class);
    }

    /**
     * @return Customer[]
     */
    public function findAllActive (): array {
        return $this->createQueryBuilder('c')
                    ->andWhere('c.deleted = 0')
                    ->getQuery()
                    ->getResult();
    }

    /**
     * @param int $id
     *
     * @return Customer|null
     */
    public function findActive (int $id): ?Customer {
        $customer = $this->find($id);
        if ($customer === null || $customer->isDeleted()) {
            return null;
        }

        return $customer;
    }

    // /**
    //  * @return Customer[] Returns an array of Customer objects
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
    public function findOneBySomeField($value): ?Customer
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
