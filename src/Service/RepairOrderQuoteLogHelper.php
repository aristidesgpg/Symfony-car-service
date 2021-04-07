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
use Symfony\Component\DependencyInjection\ContainerInterface as Container;
use JMS\Serializer\SerializerBuilder;

/**
 * Class RepairOrderQuoteLogHelper.
 */
class RepairOrderQuoteLogHelper
{
    /** @var EntityManagerInterface */
    private $em;

    /**
     * @var Container
     */
    private $container;

    /**
     * RepairOrderQuoteLogHelper constructor.
     */
    public function __construct(EntityManagerInterface $em, Container $container)
    {
        $this->em = $em;
        $this->container = $container;
    }

    public function createRepairOrderQuoteLog(RepairOrderQuote $repairOrderQuote, User $user = NULL, Customer $customer = NULL): void
    {
        // // $serializer = $this->container->get('jms_serializer');
        // // $serializer->serialize($repairOrderQuote, "json");
        $serializerBuilder = SerializerBuilder::create();
        $serializer = $serializerBuilder->build();
        $data = $serializer->serialize($repairOrderQuote, "json");

  
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
