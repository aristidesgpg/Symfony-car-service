<?php

namespace App\Service;

use App\Entity\RepairOrderQuote;
use App\Entity\RepairOrderQuoteLog;
use App\Entity\Customer;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use InvalidArgumentException;
use phpDocumentor\Reflection\Types\Null_;
use RuntimeException;

/**
 * Class RepairOrderQuoteLogHelper.
 */
class RepairOrderQuoteLogHelper
{
    /** @var EntityManagerInterface */
    private $em;

    /**
     * RepairOrderQuoteLogHelper constructor.
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function createRepairOrderQuoteLog(RepairOrderQuote $repairOrderQuote, string $data, User $user = NULL, Customer $customer = NULL): void
    { 
        $repairOrderQuoteLog = new RepairOrderQuoteLog();
        $repairOrderQuoteLog->setRepairOrderQuote($repairOrderQuote)
                            ->setData($data)
                            ->setDate(new \DateTime());
        if ($user) {
            $repairOrderQuoteLog->setUser($user);
        } 

        if ($customer) {
            $repairOrderQuoteLog->setCustomer($customer);
        }
         
        $this->em->persist($repairOrderQuoteLog);

        $this->em->beginTransaction();
        try {
            $this->em->flush();
            $this->em->commit();
        } catch (Exception $e) {
            $this->em->rollback();
            throw new RuntimeException('Caught exception during flush', 0, $e);
        }
    }
}
