<?php

namespace App\Repository;

use App\Entity\Customer;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Customer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Customer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Customer[]    findAll()
 * @method Customer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CustomerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Customer::class);
    }

    /**
     * @param User|null $user
     *
     * @return Query
     */
    public function findAllActive(
        ?User $user = null,
        $sortField = null,
        $sortDirection = null,
        $searchTerm = null
    ): Query {
        $qb = $this->getBaseQueryBuilder($user);

        $columns = ["name", "phone", "email"];

        if ($searchTerm) {
            $query          = "";
            foreach ($columns as $column) {
                if ($query)
                    $query .= " OR ";

                $query     .= "c.$column LIKE :searchTerm ";
            }

            $qb->andWhere($query)
                ->setParameter('searchTerm', '%' . $searchTerm . '%');
        }

        if ($sortDirection) {
            $qb->orderBy('c.' . $sortField, $sortDirection);
        }

        return $qb->getQuery();
    }

    /**
     * @param int $id
     *
     * @return Customer|null
     */
    public function findActive(int $id): ?Customer
    {
        $customer = $this->find($id);
        if ($customer === null || $customer->isDeleted()) {
            return null;
        }

        return $customer;
    }

    /**
     * @param string    $query - Name, Phone Number, or Email
     * @param User|null $user
     *
     * @return Query
     */
    public function search(string $query, ?User $user = null): Query
    {
        $qb = $this->getBaseQueryBuilder($user);
        $or = $qb->expr()->orX();
        $or->add('c.name LIKE :fname')
            ->add('c.name LIKE :lname')
            ->add('c.phone = :query')
            ->add('c.email = :query');
        $qb->andWhere($or)
            ->setParameter('query', $query)
            ->setParameter('fname', $query . '%')
            ->setParameter('lname', '%' . $query);

        return $qb->getQuery();
    }

    /**
     * @param string $phone
     *
     * @return Customer|null
     */
    public function findByPhone(string $phone): ?Customer
    {
        try {
            return $this->getBaseQueryBuilder()
                ->andWhere('c.phone = :phone')
                ->setParameter('phone', $phone)
                ->getQuery()
                ->setMaxResults(1)
                ->getOneOrNullResult();
        } catch (NonUniqueResultException $e) {
            return null;
        }
    }

    /**
     * @param User|null $user
     *
     * @return QueryBuilder
     */
    private function getBaseQueryBuilder(?User $user = null): QueryBuilder
    {
        $qb = $this->createQueryBuilder('c')
            ->andWhere('c.deleted = 0');
        if ($user !== null) {
            $qb->andWhere('c.addedBy = :user');
            $qb->setParameter('user', $user);
        }

        return $qb;
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
