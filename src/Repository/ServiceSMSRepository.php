<?php

namespace App\Repository;

use App\Entity\Customer;
use App\Entity\ServiceSMS;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method ServiceSMS|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServiceSMS|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServiceSMS[]    findAll()
 * @method ServiceSMS[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServiceSMSRepository extends ServiceEntityRepository
{
    /** @var EntityManagerInterface */
    private $em;

    public function __construct(ManagerRegistry $registry, EntityManagerInterface $em)
    {
        parent::__construct($registry, ServiceSMS::class);
        $this->em = $em;
    }

    // /**
    //  * @return ServiceSMS[] Returns an array of ServiceSMS objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

   
    // public function getMessages(Customer $customer, string $searchTerm)
    // {
    //     $query = $this->createQueryBuilder('s')
    //                   ->andWhere('s.customer = :customer')
    //                   ->setParameter('customer', $customer->getId());
        
    //     if($searchTerm){
    //         $query->leftJoin('ro.primaryCustomer', 'ro_customer')
    //         ->andWhere("s.user.phone LIKE :searchTerm ")
    //                        ->setParameter('searchTerm', "%$searchTerm%");
    //     }

    //     return $query->getQuery();
    // }
   
}
