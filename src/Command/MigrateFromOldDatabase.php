<?php

namespace App\Command;

use App\Entity\CheckIn;
use Doctrine\ORM\EntityManager;
use App\Entity\Customer;
use App\Entity\FollowUp;
use App\Entity\FollowUpInteraction;
use App\Entity\MPIGroup;
use App\Entity\MPIItem;
use App\Entity\MPITemplate;
use App\Entity\OperationCode;
use App\Entity\PaymentResponse;
use App\Entity\RepairOrder;
use App\Entity\RepairOrderInteraction;
use App\Entity\RepairOrderMPI;
use App\Entity\RepairOrderMPIInteraction;
use App\Entity\RepairOrderNote;
use App\Entity\RepairOrderPayment;
use App\Entity\RepairOrderPaymentInteraction;
use App\Entity\RepairOrderQuote;
use App\Entity\RepairOrderQuoteInteraction;
use App\Entity\RepairOrderQuoteRecommendation;
use App\Entity\RepairOrderVideo;
use App\Entity\RepairOrderVideoInteraction;
use App\Entity\ServiceSMS;
use App\Entity\User;
use Aws\Api\Operation;
use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\DBAL\Driver\Connection;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Twig\Node\WithNode;

/**
 * 
 * Class MigrateFromOldDatabase.
 */
class MigrateFromOldDatabase extends Command
{
    /**
     * @var string
     */
    protected static $defaultName = 'migrate:iservice2';

    /**
     * @var EntityManagerInterface
     */
    protected $em;

    /**
     * @var Connection
     */
    protected $connection;

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    protected $oldAdminIds;
    protected $oldAdvisorIds;
    protected $oldTechnicanIds;
    protected $oldRepairOrderIds;
    protected $oldCustomerIds;
    protected $oldOperationCodeIds;
    protected $oldManagerIds;
    protected $oldSalesManagerIds;
    protected $oldMpiIds;
    protected $oldMpiGroupIds;
    /**
     * constructor.
     */
    public function __construct(ManagerRegistry $ri, EntityManagerInterface $em, UserPasswordEncoderInterface $passwordEncoder)
    {
        ini_set('memory_limit', '6G');
        $this->passwordEncoder = $passwordEncoder;
        $this->connection = $ri->getConnection("iservice2");
        $this->em = $em;
        $this->oldAdminIds = array();
        $this->oldAdvisorIds = array();
        $this->oldTechnicanIds = array();
        $this->oldRepairOrderIds = array();
        $this->oldCustomerIds = array();
        $this->oldOperationCodeIds = array();
        $this->oldManagerIds = array();
        $this->oldSalesManagerIds = array();
        $this->oldMpiIds = array();
        $this->oldMpiGroupIds = array();
        parent::__construct();
    }

    /**
     * @return void
     */
    protected function configure()
    {
        $this
            ->setDescription('Migrate iservice2 database with iservice3');
    }

    /**
     * @throws Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        // $statement->bindValue('emp', );

        $this->mpi();
        $output->writeln("MPI done");

        $this->mpiGroup();
        $output->writeln("MPI Group done");

        $this->mpiItems();
        $output->writeln("MPI Group done");

        $this->admin();
        $output->writeln("Admin done");

        $this->advisor();
        $output->writeln("Advisor done");

        $this->technician();
        $output->writeln("Technican done");

        $this->manager();
        $output->writeln("Manager done");

        $this->salesManager();
        $output->writeln("SalesManager done");

        $this->customer();
        $output->writeln("Customer done");

        $this->repairOrder();
        $output->writeln("RepairOrder done");

        $this->note();
        $output->writeln("Note done");

        $this->operationCode();
        $output->writeln("OperactionCode done");

        $this->checkIn();
        $output->writeln("CheckIn done");

        $this->repairOrderQuoteRecommendation();
        $output->writeln("QuoteRecommendation done");

        // $this->followUp();
        $this->customerRepairOrder();
        $output->writeln("customerRepairOrder done");

        $this->payment();
        $output->writeln("Payment done");

        $this->repairOrderMpi();
        $output->writeln("repairOrderMPI done");

        $this->repairOrderPayment();
        $output->writeln("repairOrderPayment done");

        $this->sms();
        $output->writeln("SMS done");

        return "success";
    }
    private function sms()
    {
        $statement = $this->connection->prepare(
            'SELEC * from sms'
        );

        $statement->execute();
        $rows = $statement->fetchAllAssociative();

        $smsRepo = $this->em->getRepository(ServiceSMS::class);
        $userRepo = $this->em->getRepository(User::class);
        $customerRepo = $this->em->getRepository(Customer::class);

        foreach ($rows as $index => $row) {
            $sms = $smsRepo->findOneBy([
                'phone' => $row['number'],
                'date' => new \DateTime($row['date'])
            ]);
            if (!$sms) {
                $sms = new ServiceSMS();

                $user = $userRepo->findOneBy(['id' => $this->oldAdvisorIds[$row['user_id']]]);
                $customer = $customerRepo->findOneBy(['phone' => $row['number']]);
                $date = new \DateTime($row['date']);

                $sms->setUser($user)
                    ->setCustomer($customer)
                    ->setDate($date)
                    ->setMessage($row['message'])
                    ->setIsRead($row['is_read'])
                    ->setIncoming($row['type'] === 'incoming' ? 1 : 0);

                $this->em->persist($sms);
            }
        }

        $this->em->flush();
    }
    private function createRepairOrderPaymentInteraction(
        RepairOrderPayment $repairOrderPayment,
        string $type,
        \DateTime $date
    ) {
        $repairOrderPaymentInteraction = new RepairOrderPaymentInteraction;
        $repairOrderPaymentInteraction->setPayment($repairOrderPayment)
            ->setType($type)
            ->setDate($date);

        $repairOrderPayment->addInteraction($repairOrderPaymentInteraction);
    }
    private function repairOrderPayment()
    {
        $statement = $this->connection->prepare(
            'SELEC * from repair_order_payments'
        );

        $statement->execute();
        $rows = $statement->fetchAllAssociative();

        $repairOrderPaymentRepo = $this->em->getRepository(RepairOrderPayment::class);
        $repairOrderRepo = $this->em->getRepository(RepairOrder::class);

        foreach ($rows as $index => $row) {
            if ($row['deleted']) {
                $repairOrderPayment = $repairOrderPaymentRepo->findOneBy([
                    'id' => $this->oldRepairOrderIds[$row['repair_order_id']],
                ]);

                if (!$repairOrderPayment) {
                    $repairOrder = $repairOrderRepo->findOneBy(['id' => $this->oldRepairOrderIds[$row['repair_order_id']]]);
                    $repairOrderPayment = new RepairOrderPayment();

                    $createdDate = new \DateTime($row['created_at']);
                    $status = 'Created';
                    $repairOrderPayment->setRepairOrder($repairOrder)
                        ->setAmount($row['amount'])
                        ->setTransactionId($row['transaction_id'])
                        ->setRefundedAmount($row['refunced_amount'])
                        ->setDateCreated($createdDate)
                        ->setCardType($row['card_type'])
                        ->setCardNumber($row['card_number']);

                    if ($row['sent_at']) {
                        $status = 'Created';
                        $date = new \DateTime($row['sent_at']);
                        $repairOrderPayment->setDateSent($date);
                        $this->createRepairOrderPaymentInteraction($repairOrderPayment, "Sent", $date);
                    }
                    if ($row['viewed_at']) {
                        $status = 'Viewed';
                        $date = new \DateTime($row['viewed_at']);
                        $repairOrderPayment->setDateViewed($date);
                        $this->createRepairOrderPaymentInteraction($repairOrderPayment, $status, $date);
                    }
                    if ($row['paid_at']) {
                        $status = 'Paid';
                        $date = new \DateTime($row['paid_at']);
                        $repairOrderPayment->setDatePaid($date);
                        $this->createRepairOrderPaymentInteraction($repairOrderPayment, $status, $date);
                    }
                    if ($row['updated_at']) {
                        $status = 'Paid Viewed';
                        $date = new \DateTime($row['updated_at']);
                        $repairOrderPayment->setDateConfirmed($date);
                        $this->createRepairOrderPaymentInteraction($repairOrderPayment, $status, $date);
                    }
                    if ($row['refunded_at']) {
                        $status = 'Refunded';
                        $date = new \DateTime($row['refunded_at']);
                        $repairOrderPayment->setDateRefunded($date);
                        $this->createRepairOrderPaymentInteraction($repairOrderPayment, $status, $date);
                    }
                    if ($row['paid_viewed_by_advisor_at']) {
                        $status = 'Receipt Sent';
                        $date = new \DateTime($row['paid_viewed_by_advisor_at']);
                        $this->createRepairOrderPaymentInteraction($repairOrderPayment, $status, $date);
                    }

                    $repairOrderPayment->setStatus($status);
                    $repairOrder->setPaymentStatus($status);
                    $this->em->persist($repairOrderPayment);
                    $this->em->persist($repairOrder);
                }
            }
        }

        $this->em->flush();
    }
    private function createRepairOrderMpiInteraction(
        RepairOrderMPI $repairOrderMpi,
        RepairOrder $repairOrder,
        string $type,
        \DateTime $date
    ) {
        $repairOrderMpiInteraction = new RepairOrderMPIInteraction();
        $repairOrderMpiInteraction->setRepairOrderMPI($repairOrderMpi)
            ->setCustomer($repairOrder->getPrimaryCustomer())
            ->setUser($repairOrder->getPrimaryTechnician())
            ->setType($type)
            ->setDate($date);
        $this->em->persist($repairOrderMpiInteraction);
    }
    private function repairOrderMpi()
    {
        $statement = $this->connection->prepare(
            'SELEC * from repair_order_mpi'
        );

        $statement->execute();
        $rows = $statement->fetchAllAssociative();

        $repairOrderMpiRepo = $this->em->getRepository(RepairOrderMPI::class);
        $repairOrderRepo = $this->em->getRepository(RepairOrder::class);

        foreach ($rows as $index => $row) {
            $repairOrderMpi = $repairOrderMpiRepo->findOneBy([
                'id' => $this->oldRepairOrderIds[$row['repair_order_id']],
            ]);

            if (!$repairOrderMpi) {
                $repairOrder = $repairOrderRepo->findOneBy(['id' => $this->oldRepairOrderIds[$row['repair_order_id']]]);
                $repairOrderMpi = new RepairOrderMPI();

                $date = new \DateTime($row['date']);

                $repairOrderMpi->setRepairOrder($repairOrder)
                    ->setResults($row['results'])
                    ->setStatus('Complete')
                    ->setDateViewed($date)
                    ->setDateSent($date)
                    ->setDateCompleted($date);
                $this->em->persist($repairOrderMpi);

                $this->createRepairOrderMpiInteraction($repairOrderMpi, $repairOrder, "Sent", $date);

                $this->createRepairOrderMpiInteraction($repairOrderMpi, $repairOrder, "Viewed", $date);

                $this->createRepairOrderMpiInteraction($repairOrderMpi, $repairOrder, "Complete", $date);
            }
        }

        $this->em->flush();
    }
    private function payment()
    {
        $statement = $this->connection->prepare(
            'SELECT payment_log.action, payment_log.amount, payment_log.`datetime` , payment_response_codes.code , payment_response_codes .response
             FROM payment_log inner join payment_response_codes on payment_response_codes.id = payment_log.payment_id'
        );

        $statement->execute();
        $rows = $statement->fetchAllAssociative();

        $paymentResponseRepo = $this->em->getRepository(PaymentResponse::class);

        foreach ($rows as $index => $row) {
            $paymentResponse = $paymentResponseRepo->findOneBy([
                'type' => $row['action'],
                'created' => new \DateTime($row['datetime']),
            ]);

            if (!$paymentResponse) {
                $rawResponse = 'response_code=' . $row['code'] . '&responsetext=' . $row['response'];
                $paymentResponse = new PaymentResponse($row['action'], $rawResponse, new \DateTime($row['datetime']));

                $this->em->persist($paymentResponse);
            }
        }

        $this->em->flush();
    }
    private function note()
    {
        $statement = $this->connection->prepare(
            'SELECT * FROM note'
        );

        $statement->execute();
        $rows = $statement->fetchAllAssociative();

        $repairOrderNoteRepo = $this->em->getRepository(RepairOrderNote::class);
        $repairOrderRepo = $this->em->getRepository(RepairOrder::class);

        foreach ($rows as $row) {
            $repairOrderNote = $repairOrderNoteRepo->findOneBy([
                'id' => $this->oldRepairOrderIds[$row['repair_order_id']],
                'dateCreated' => new \DateTime($row['date']),
                'note' => $row['note']
            ]);

            if (!$repairOrderNote) {
                $repairOrderNote = new RepairOrderNote();

                $repairOrder = $repairOrderRepo->findOneBy(['id' => $this->oldRepairOrderIds[$row['repair_order_id']]]);

                if ($repairOrder) {
                    $repairOrderNote->setRepairOrder($repairOrder)
                        ->setNote($row['note'])
                        ->setDateCreated(new \DateTime($row['date']));

                    $this->em->persist($repairOrderNote);
                }
            }
        }

        $this->em->flush();
    }
    private function mpiItems()
    {
        $statement = $this->connection->prepare(
            'SELECT * FROM mpi_items'
        );

        $statement->execute();
        $rows = $statement->fetchAllAssociative();

        $mpiGroupRepo = $this->em->getRepository(MPIGroup::class);

        foreach ($rows as $row) {
            if ($row['active'] && $this->oldMpiGroupIds[$row['mpi_group_id']]) {
                $mpiGroup = $mpiGroupRepo->findOneBy(['id' => $this->oldMpiGroupIds[$row['mpi_group_id']]]);

                if ($mpiGroup) {
                    $mpiItem = new MPIItem();

                    $mpiItem->setName($row['name'])
                        ->setMPIGroup($mpiGroup);

                    $this->em->persist($mpiItem);
                    $this->em->flush();
                }
            }
        }
    }
    private function mpiGroup()
    {
        $statement = $this->connection->prepare(
            'SELECT * FROM mpi_group'
        );

        $statement->execute();
        $rows = $statement->fetchAllAssociative();

        $mpiTemplateRepo = $this->em->getRepository(MPITemplate::class);

        foreach ($rows as $row) {
            if ($row['active'] && $this->oldMpiIds[$row['mpi_id']]) {
                $mpiTempate = $mpiTemplateRepo->findOneBy(['id' => $this->oldMpiIds[$row['mpi_id']]]);
                if ($mpiTempate) {
                    $mpiGroup = new MPIGroup();

                    $mpiGroup->setName($row['name'])
                        ->setMPITemplate($mpiTempate);

                    $this->em->persist($mpiGroup);
                    $this->em->flush();

                    $this->oldMpiGroupIds[$row['id']] = $mpiGroup->getId();
                }
            } else {
                $this->oldMpiGroupIds[$row['id']] = "";
            }
        }
    }
    private function mpi()
    {
        $statement = $this->connection->prepare(
            'SELECT * FROM mpi'
        );

        $statement->execute();
        $rows = $statement->fetchAllAssociative();

        $mpiTemplateRepo = $this->em->getRepository(MPITemplate::class);

        foreach ($rows as $row) {
            if ($row['active']) {
                $oldMpiTemplate = $mpiTemplateRepo->findOneBy(['name' => $row['name']]);

                // array_push($this->oldMpiIds, $row['id']);

                if ($oldMpiTemplate) {
                    $this->oldMpiIds[$row['id']] = $oldMpiTemplate->getId();
                } else {
                    $mpiTemplate = new MPITemplate();

                    $mpiTemplate->setName($row['name']);

                    $this->em->persist($mpiTemplate);
                    $this->em->flush();

                    $this->oldMpiIds[$row['id']] = $mpiTemplate->getId();
                }
            } else {
                $this->oldMpiIds[$row['id']] = "";
            }
        }
    }

    private function customerRepairOrder()
    {
        $statement = $this->connection->prepare(
            'SELECT * FROM customer_repair_order'
        );

        $statement->execute();
        $rows = $statement->fetchAllAssociative();

        $repairOrderRepo = $this->em->getRepository(RepairOrder::class);
        $customerRepo = $this->em->getRepository(Customer::class);

        foreach ($rows as $row) {
            $repairOrder = $repairOrderRepo->findOneBy([
                'id' => $this->oldRepairOrderIds[$row['repair_order_id']],
                'primaryCustomer' => $this->oldCustomerIds[$row['customer_id']]
            ]);

            if (!$repairOrder) {
                $oldRepairOrder = $repairOrderRepo->findOneBy([
                    'id' => $this->oldRepairOrderIds[$row['repair_order_id']]
                ]);
                $customer = $customerRepo->findOneBy([
                    'id' => $this->oldCustomerIds[$row['customer_id']]
                ]);
                if ($oldRepairOrder) {
                    $repairOrder = clone $oldRepairOrder;
                    $repairOrder->setCustomer($customer);
                    $this->em->persist($repairOrder);
                }
            }
        }
        $this->em->flush();
    }
    private function repairOrderQuoteRecommendation()
    {
        // With client_interaction table

        $statement = $this->connection->prepare(
            'SELECT * FROM repair_order_quote'
        );

        $statement->execute();
        $rows = $statement->fetchAllAssociative();

        // $repairOrderQuoteRepo = $this->em->getRepository(RepairOrderQuote::class);
        $repairOrderRepo = $this->em->getRepository(RepairOrder::class);
        $operationCodeRepo = $this->em->getRepository(OperationCode::class);

        $prev_repairOrderId = -1;
        $repairOrderQuote = null;

        foreach ($rows as $row) {
            // $oldRepairOrderQuote = $repairOrderQuoteRepo->findOneBy(['email' => $row['email']]);
            if ($prev_repairOrderId !== $row['repair_order_id']) {
                $repairOrder = $repairOrderRepo->findOneBy(['id' => $this->oldRepairOrderIds[$row['repair_order_id']]]);
                if ($repairOrderQuote) {
                    $this->em->persist($repairOrderQuote);
                }
                $repairOrderQuote = new RepairOrderQuote();
                if ($repairOrder) {
                    $status = 'Not Started';
                    if ($row['date_sent']) {
                        $status = 'Sent';
                    }
                    $repairOrderQuote->setRepairOrder($repairOrder)
                        ->setDateCreated(new \DateTime($row['date_sent']))
                        ->setDateSent(new \DateTime($row['date_sent']));

                    $repairOrderQuoteInteraction = new RepairOrderQuoteInteraction();
                    $repairOrderQuoteInteraction->setUser($repairOrder->getPrimaryTechnician())
                        ->setCustomer($repairOrder->getPrimaryCustomer())
                        ->setDate(new \DateTime($row['date_sent']))
                        ->setType($status);
                    $repairOrderQuote->addRepairOrderQuoteInteraction($repairOrderQuoteInteraction);
                    $this->em->persist($repairOrderQuoteInteraction);

                    $statement = $this->connection->prepare(
                        "SELECT min(date) as date FROM client_interaction where type='quote_view' and repair_order_id = '" . $row['repair_order_id'] . "' group by repair_order_id"
                    );

                    $statement->execute();
                    $clientInteraction = $statement->fetchAssociative();
                    $clientInteractionDate = new \DateTime($clientInteraction['date']);
                    if ($clientInteraction) {
                        $repairOrderQuote->setDateCustomerViewed($clientInteractionDate);
                        $status = 'Viewed';
                        $repairOrderQuoteInteraction = new RepairOrderQuoteInteraction();
                        $repairOrderQuoteInteraction->setUser($repairOrder->getPrimaryTechnician())
                            ->setCustomer($repairOrder->getPrimaryCustomer())
                            ->setDate($clientInteractionDate)
                            ->setType($status);
                        $repairOrderQuote->addRepairOrderQuoteInteraction($repairOrderQuoteInteraction);
                        $this->em->persist($repairOrderQuoteInteraction);
                    }

                    $statement = $this->connection->prepare(
                        "SELECT max(date) as date FROM client_interaction where type='update_quote' and repair_order_id = '" . $row['repair_order_id'] . "' group by repair_order_id"
                    );

                    $statement->execute();
                    $clientInteraction = $statement->fetchAssociative();

                    if ($clientInteraction) {
                        $repairOrderQuote->setDateCompleted($clientInteractionDate)
                            ->setDateCustomerViewed($clientInteractionDate);
                        $status = 'Completed';
                        $repairOrderQuoteInteraction = new RepairOrderQuoteInteraction();
                        $repairOrderQuoteInteraction->setUser($repairOrder->getPrimaryTechnician())
                            ->setCustomer($repairOrder->getPrimaryCustomer())
                            ->setDate($clientInteractionDate)
                            ->setType($status);
                        $repairOrderQuote->addRepairOrderQuoteInteraction($repairOrderQuoteInteraction);
                        $this->em->persist($repairOrderQuoteInteraction);
                    }
                    $repairOrderQuote->setStatus($status);
                }
            }
            if ($repairOrderQuote) {
                $repairOrderQuoteRecommendation = new RepairOrderQuoteRecommendation();
                $repairOrderQuote->addRepairOrderQuoteRecommendation($repairOrderQuoteRecommendation);
                $operactionCode = $operationCodeRepo->findOneBy(['id' => $this->oldOperationCodeIds[$row['operation_code_id']]]);
                $repairOrderQuoteRecommendation->setRepairOrderQuote($repairOrderQuote)
                    ->setOperationCode($operactionCode->getCode())
                    ->setPreApproved($row['default_value'])
                    ->setApproved($row['approved'])
                    ->setPartsPrice($row['parts'])
                    ->setSuppliesPrice($row['shop_supplies'])
                    ->setDescription($operactionCode->getDescription())
                    ->setLaborPrice($row['labor']);

                // $this->em->persist($repairOrderQuoteRecommendation);
            }
        }
        $this->em->flush();
    }

    private function createFollowUpInteraction(RepairOrder $repairOrder, FollowUp $followUp, string $type, $date)
    {
        $followUpInteraction = new FollowUpInteraction();
        $followUpInteraction->setFollowUp($followUp)
            ->setCustomer($repairOrder->getPrimaryCustomer())
            ->setUser($repairOrder->getPrimaryTechnician())
            ->setType($type)
            ->setDate(new \DateTime($date));
        $this->em->persist($followUp);
        $this->em->flush();
    }

    private function followUp()
    {
        $statement = $this->connection->prepare(
            'SELECT * FROM follow_up_targets'
        );

        $statement->execute();
        $rows = $statement->fetchAllAssociative();

        $statement = $this->connection->prepare(
            'SELECT * FROM follow_up_targets_phases'
        );

        $statement->execute();
        $followupPhases = $statement->fetchAllAssociative();

        $followUpRepo = $this->em->getRepository(FollowUp::class);
        $repairOrderRepo = $this->em->getRepository(RepairOrder::class);

        foreach ($rows as $row) {
            $oldFollowUp = $followUpRepo->findOneBy(['date_created' => new \DateTime($row['date_created'])]);

            if (!$oldFollowUp) {
                $followUp = new FollowUp();
                $repairOrder =  $repairOrderRepo->findOneBy(['id' => $this->oldRepairOrderIds['repair_order_id']]);
                $status = "Created";
                $followUp->setRepairOrder($repairOrder)
                    ->setDateCreated(new \DateTime($row['date_created']))
                    ->setDateSent(new \DateTime($row['date_requested']));

                if ($row['date_created']) {
                    $this->createFollowUpInteraction($repairOrder, $followUp, "Created", $row['date_created']);
                }

                if ($row['date_requested']) {
                    $this->createFollowUpInteraction($repairOrder, $followUp, "Sent", $row['date_requested']);
                    $status = "Sent";
                }

                $phase1 = $this->getItem($followupPhases, ['followup_target_id', 'phase'], [$row['id'], 2]);
                if ($phase1) {
                    $followUp->setDateViewed(new \DateTime($phase1['date']));
                    $this->createFollowUpInteraction($repairOrder, $followUp, "Viewed", $phase1['date']);
                    $status = "Viewed";
                }

                $phase2 = $this->getItem($followupPhases, ['followup_target_id', 'phase'], [$row['id'], 3]);
                if (!$phase2) {
                    $phase2 = $this->getItem($followupPhases, ['followup_target_id', 'phase'], [$row['id'], 100]);
                }
                if ($phase2) {
                    $followUp->setDateConverted(new \DateTime($phase1['date']));
                    $this->createFollowUpInteraction($repairOrder, $followUp, "Converted", $phase2['date']);
                    $status = "Converted";
                }
                $followUp->setStatus($status);
                $this->em->persist($followUp);
            }
        }
        $this->em->flush();
    }

    private function checkIn()
    {
        $statement = $this->connection->prepare(
            'SELECT * FROM check_in'
        );

        $statement->execute();
        $rows = $statement->fetchAllAssociative();

        $checkInRepo = $this->em->getRepository(CheckIn::class);

        foreach ($rows as $row) {
            $oldCheckin = $checkInRepo->findOneBy(['identification' => $row['Identifier']]);

            if (!$oldCheckin && $row['Status']) {
                $checkIn = new CheckIn();

                if ($row['Video']) {
                    $video = $row['Video'];
                } else {
                    $video = "undefined";
                }

                $checkIn->setIdentification($row['Identifier'])
                    ->setVideo($video)
                    ->setDate(new \DateTime($row['Date']));

                $this->em->persist($checkIn);
            }
        }
        $this->em->flush();
    }

    private function admin()
    {
        $statement = $this->connection->prepare(
            'SELECT * FROM admin'
        );

        $statement->execute();
        $rows = $statement->fetchAllAssociative();

        $userRepo = $this->em->getRepository(User::class);

        foreach ($rows as $row) {
            if ($row['name']) {
                $oldUser = $userRepo->findOneBy(['email' => $row['email']]);

                if ($oldUser) {
                    $this->oldAdminIds[$row['id']] = $oldUser->getId();
                } else {
                    $user = new User();
                    $name = $row['name'];
                    $spacePosition = strpos($name, " ");
                    if ($row['app_password']) {
                        $password = $row['app_password'];
                    } else {
                        $password = $this->passwordEncoder->encodePassword($user, 'test');
                    }
                    if ($spacePosition === false) {
                        $firstName = '';
                    } else {
                        $firstName = substr($name, 0, $spacePosition);
                    }

                    if ($spacePosition === false) {
                        $lastName = substr($name, $spacePosition);
                    } else {
                        $lastName = substr($name, $spacePosition + 1);
                    }

                    $firstName = $firstName ? $firstName : $lastName;
                    $lastName = $lastName ? $lastName : $firstName;

                    $user->setFirstName($firstName)
                        ->setLastName($lastName)
                        ->setEmail($row['email'])
                        ->setPhone($row['phone'])
                        ->setPassword($password)
                        ->setPreviewDeviceTokens($row['preview_tokens'])
                        ->setRole('ROLE_ADMIN');

                    $this->em->persist($user);
                    $this->em->flush();

                    $this->oldAdminIds[$row['id']] = $user->getId();
                }
            } else {
                $this->oldAdminIds[$row['id']] = '';
            }
        }
    }
    private function salesManager()
    {
        $statement = $this->connection->prepare(
            'SELECT * FROM sales_manager'
        );

        $statement->execute();
        $rows = $statement->fetchAllAssociative();

        $userRepo = $this->em->getRepository(User::class);

        foreach ($rows as $row) {
            if ($row['active']) {
                $oldUser = $userRepo->findOneBy(['email' => $row['email'], 'role' => 'ROLE_SALES_MANAGER']);

                if ($oldUser) {
                    $this->oldSalesManagerIds[$row['id']] = $oldUser->getId();
                }
                $user = new User();

                $user->setFirstName($row['first_name'])
                    ->setLastName($row['last_name'])
                    ->setEmail($row['email'])
                    ->setPhone($row['phone'])
                    ->setPassword($row['password'])
                    ->setSecurityQuestion($row['security_question'])
                    ->setSecurityAnswer($row['security_answer'])
                    ->setRole('ROLE_SALES_MANAGER');

                $this->em->persist($user);
                $this->em->flush();

                $this->oldSalesManagerIds[$row['id']] = $user->getId();
            }
        }
    }
    private function manager()
    {
        $statement = $this->connection->prepare(
            'SELECT * FROM manager'
        );

        $statement->execute();
        $rows = $statement->fetchAllAssociative();

        $userRepo = $this->em->getRepository(User::class);

        foreach ($rows as $row) {
            if ($row['active']) {
                $oldUser = $userRepo->findOneBy(['email' => $row['email'], 'role' => 'ROLE_SERVICE_MANAGER']);

                if ($oldUser) {
                    $this->oldManagerIds[$row['id']] = $oldUser->getId();
                } else {
                    $statement = $this->connection->prepare(
                        "SELECT MAX(date) as date FROM login_log where user_type = 'manager' and user_id = '" . $row['id'] . "'"
                    );

                    $statement->execute();
                    $latestLog = $statement->fetchAssociative();
                    if ($latestLog)
                        $date = new \DateTime($latestLog['date']);

                    $user = new User();

                    $user->setFirstName($row['first_name'])
                        ->setLastName($row['last_name'])
                        ->setEmail($row['email'])
                        ->setPhone($row['phone'])
                        ->setPassword($row['password'])
                        ->setSecurityQuestion($row['security_question'])
                        ->setSecurityAnswer($row['security_answer'])
                        ->setRole('ROLE_SERVICE_MANAGER');

                    if ($date) {
                        $user->setLastLogin($date);
                    }

                    $this->em->persist($user);
                    $this->em->flush();

                    $this->oldManagerIds[$row['id']] = $user->getId();
                }
            }
        }
    }
    private function technician()
    {
        $statement = $this->connection->prepare(
            'SELECT * FROM technician'
        );

        $statement->execute();
        $rows = $statement->fetchAllAssociative();

        $userRepo = $this->em->getRepository(User::class);

        foreach ($rows as $row) {
            $oldUser = $userRepo->findOneBy(['firstName' => $row['first_name'], 'lastName' => $row['last_name']]);

            $user = new User();
            if ($oldUser) {
                $this->oldTechnicanIds[$row['id']] = $oldUser->getId();
            } else {
                if ($row['password']) {
                    $password = $row['password'];
                } else {
                    $password = $this->passwordEncoder->encodePassword($user, 'test');
                }

                $user->setFirstName($row['first_name'])
                    ->setLastName($row['last_name'])
                    ->setEmail($row['email'])
                    ->setCertification($row['certification'])
                    ->setExperience($row['experience'])
                    ->setActive($row['active'])
                    ->setPassword($password)
                    ->setSecurityAnswer($row['security_answer'])
                    ->setSecurityQuestion('security_question')
                    ->setPhone("1234567890")
                    ->setRole('ROLE_TECHNICIAN');

                $this->em->persist($user);
                $this->em->flush();

                $this->oldTechnicanIds[$row['id']] = $user->getId();
            }
        }
    }
    private function advisor()
    {
        $statement = $this->connection->prepare(
            'SELECT * FROM advisor'
        );

        $statement->execute();
        $rows = $statement->fetchAllAssociative();

        $userRepo = $this->em->getRepository(User::class);

        foreach ($rows as $row) {
            $oldUser = $userRepo->findOneBy(['email' => $row['email']]);

            if ($oldUser) {
                $this->oldAdvisorIds[$row['id']] = $oldUser->getId();
            } else {
                $statement = $this->connection->prepare(
                    "SELECT MAX(date) as date FROM login_log where user_type = 'advisor' and user_id = " . $row['id']
                );

                $statement->execute();
                $latestLog = $statement->fetchAssociative();
                if ($latestLog)
                    $date = new \DateTime($latestLog['date']);

                $user = new User();
                $user->setFirstName($row['first_name'])
                    ->setLastName($row['last_name'])
                    ->setEmail($row['email'])
                    ->setPhone($row['phone'])
                    ->setPassword($row['password'])
                    ->setExtension($row['extension'])
                    ->setActive($row['active'])
                    ->setSecurityQuestion($row['security_question'])
                    ->setSecurityAnswer($row['security_answer'])
                    ->setProcessRefund($row['can_give_refund'])
                    ->setShareRepairOrders($row['express_advisor'])
                    ->setRole('ROLE_SERVICE_ADVISOR');

                if ($date) {
                    $user->setLastLogin($date);
                }

                $this->em->persist($user);
                $this->em->flush();

                $this->oldAdvisorIds[$row['id']] = $user->getId();
            }
        }
    }

    private function operationCode()
    {
        $statement = $this->connection->prepare(
            'SELECT * FROM operation_code'
        );

        $statement->execute();
        $rows = $statement->fetchAllAssociative();

        $operationRepo = $this->em->getRepository(OperationCode::class);

        foreach ($rows as $row) {
            $oldOperationCode = $operationRepo->findOneBy(['code' => $row['code']]);

            if ($oldOperationCode) {
                $this->oldOperationCodeIds[$row['id']] = $oldOperationCode->getId();
            } else {
                $operactionCode = new OperationCode();
                $operactionCode->setCode($row['code'])
                    ->setDescription($row['description'])
                    ->setLaborHours($row['labor_hours'])
                    ->setLaborTaxable($row['taxable_labor'])
                    ->setPartsPrice($row['parts'])
                    ->setPartsTaxable($row['taxable_parts'])
                    ->setSuppliesPrice($row['shop_supplies'])
                    ->setSuppliesTaxable($row['taxable_shop_supplies'])
                    ->setSuppliesTaxable($row['taxable_shop_supplies']);

                $this->em->persist($operactionCode);
                $this->em->flush();

                $this->oldOperationCodeIds[$row['id']] = $operactionCode->getId();
            }
        }
    }

    private function CAQLog()
    {
        // $statement = $this->connection->prepare(
        //     'SELECT * FROM c_a_q_log'
        // );

        // $statement->execute();
        // $rows = $statement->fetchAllAssociative();

        // $userRepo = $this->em->getRepository(User::class);

        // foreach($rows as $row){
        //     $oldUser = $userRepo->findOneBy(['email' => $row['email']]);
        //     array_push($this->oldAdvisorIds, $row['id']);

        //     if($oldUser){
        //         $this->oldAdvisorIds[ $row['id'] ] = $oldUser->getId();
        //     } else {
        //         $user = new User();
        //         $user->setFirstName( $row['first_name'] )
        //              ->setLastName( $row['last_name'] )
        //              ->setEmail( $row['email'] )
        //              ->setPhone( $row['phone'] )
        //              ->setPassword( $row['password'] )
        //              ->setExtension( $row['extension'] )
        //              ->setActive( $row['active'] )
        //              ->setSecurityQuestion( $row['security_question'] )
        //              ->setSecurityAnswer( $row['security_answer'] )
        //              ->setProcessRefund( $row['can_give_refund'])
        //              ->setShareRepairOrders( $row['express_advisor'])
        //              ->setPreviewDeviceTokens( $row['preview_tokens'] )
        //              ->setRole( 'ROLE_SERVICE_ADVISOR' );

        //         $this->em->persist( $user );
        //         $this->em->flush();

        //         $this->oldAdvisorIds[ $row['id'] ] = $user->getId();
        //     }
        // }
    }

    private function getItem($rows, $fields, $values)
    {
        foreach ($rows as $row) {
            $flag = true;
            foreach ($fields as $index => $field) {
                if ($row[$field] !== $values[$index])
                    $flag = false;
            }
            if ($flag) {
                return $row;
            }
        }
        return null;
    }

    private function repairOrder()
    {
        $statement = $this->connection->prepare(
            'SELECT * FROM repair_order'
        );

        $statement->execute();
        $rows = $statement->fetchAllAssociative();

        $statement = $this->connection->prepare(
            "SELECT repair_order_id, max(date) as latest_date FROM client_interaction
             where repair_order_id is Not Null and type ='video_view' Group by repair_order_id"
        );

        $statement->execute();
        $clientInteractions = $statement->fetchAllAssociative();

        $userRepo = $this->em->getRepository(User::class);
        $customerRepo = $this->em->getRepository(Customer::class);
        $repairOrderRepo = $this->em->getRepository(RepairOrder::class);

        foreach ($rows as $row) {
            if (!$row['inactive']) {
                $oldRepairOrder = $repairOrderRepo->findOneBy(['number' => $row['number']]);

                if ($oldRepairOrder) {
                    $this->oldRepairOrderIds[$row['id']] = $oldRepairOrder->getId();
                } else {
                    $customerId = $this->oldCustomerIds[$row['primary_customer_id']];
                    $customer = $customerRepo->findOneBy(['id' => $customerId]);

                    $technicanId = $this->oldTechnicanIds[$row['technician_id']];
                    $technican = $userRepo->findOneBy(['id' => $technicanId]);

                    $advisorId = $this->oldAdvisorIds[$row['advisor_id']];
                    $advisor = $userRepo->findOneBy(['id' => $advisorId]);

                    $repairOrder = new RepairOrder();
                    $repairOrder->setPrimaryCustomer($customer)
                        ->setPrimaryTechnician($technican)
                        ->setPrimaryAdvisor($advisor)
                        ->setNumber($row['number'])
                        ->setStartValue($row['value'])
                        ->setFinalValue($row['finalValue'])
                        ->setApprovedValue($row['approvedValue'])
                        ->setDateClosed(new \DateTime($row['closed_date']))
                        ->setDateCreated(new \DateTime($row['date']))
                        ->setWaiter($row['waiter'])
                        ->setPickupDate(new \DateTime($row['pickup_date']))
                        ->setLinkHash($row['link_hash'])
                        ->setYear($row['year'])
                        ->setMake($row['make'])
                        ->setModel($row['model'])
                        ->setVin($row['vin'])
                        ->setDeleted($row['inactive'])
                        ->setMiles(intval($row['miles']))
                        ->setWaiverSignature($row['waiver'])
                        ->setWaiverVerbiage($row['waiverVerbiage'])
                        ->setDmsKey($row['ro_key'])
                        ->setUpgradeQue($row['upgradeQueue']);

                    $this->em->persist($repairOrder);

                    if ($row['video']) {
                        // make full path for the video
                        $videoPath = $row['video'];
                        $http = substr($videoPath, 0, 4);
                        $https = substr($videoPath, 0, 5);

                        if ($http !== 'http' && $https !== 'https') {
                            //need to change the domain in the future
                            $videoPath = $_ENV['CUSTOMER_URL'] . "/videos/" . $videoPath;
                        }

                        $repairOrderVideo  = new RepairOrderVideo();
                        $repairOrderVideoInteraction  = new RepairOrderVideoInteraction();

                        $clientInteraction = $this->getItem($clientInteractions, ['repair_order_id'], [$row['id']]);

                        $repairOrderVideo->setRepairOrder($repairOrder)
                            ->setTechnician($technican)
                            ->setPath($videoPath)
                            ->setStatus("Uploaded")
                            ->setDateUploaded(new \Datetime($row['date']));
                        if ($clientInteraction) {
                            $repairOrderVideo->setDateViewed(new \DateTime($clientInteraction['latest_date']))
                                ->setStatus("Viewed");
                        }
                        $this->em->persist($repairOrderVideo);

                        $repairOrderVideoInteraction->setRepairOrderVideo($repairOrderVideo)
                            ->setUser($technican)
                            ->setCustomer($customer)
                            ->setType("Uploaded")
                            ->setDate(new \DateTime($row['date']));
                        $this->em->persist($repairOrderVideoInteraction);

                        if ($clientInteraction) {
                            $repairOrderVideoInteractionViewed = new RepairOrderVideoInteraction();
                            $repairOrderVideoInteractionViewed->setRepairOrderVideo($repairOrderVideo)
                                ->setUser($technican)
                                ->setCustomer($customer)
                                ->setType("Viewed")
                                ->setDate(new \DateTime($clientInteraction['latest_date']));

                            $this->em->persist($repairOrderVideoInteractionViewed);
                        }
                    }

                    $this->em->flush();
                    $this->oldRepairOrderIds[$row['id']] = $repairOrder->getId();
                }
            } else {
                $this->oldRepairOrderIds[$row['id']] = '';
            }
        }
    }
    private function customer()
    {
        $statement = $this->connection->prepare(
            'SELECT * FROM customer'
        );
        $userRepo = $this->em->getRepository(User::class);
        $customerRepo = $this->em->getRepository(Customer::class);
        $statement->execute();
        $rows = $statement->fetchAllAssociative();

        foreach ($rows as $row) {
            $phone = $row['phone'];
            $cleanPhone = preg_replace('/[^0-9]/', '', $phone);
            if (strlen($cleanPhone) > 10) {
                $cleanPhone = substr($cleanPhone, 1, 10);
            }

            $oldCustomer = $customerRepo->findOneBy(['phone' => $cleanPhone]);

            if ($oldCustomer) {
                $this->oldCustomerIds[$row['id']] = $oldCustomer->getId();
            } else {
                $customer = new Customer();

                $customer->setMobileConfirmed($row['phone_validated'])
                    ->setName($row['name'] ? $row['name'] : "No Name")
                    ->setEmail($row['email'])
                    ->setPhone($cleanPhone);

                if ($row['added_by_id']) {
                    $user = $userRepo->findOneBy(['id' => $this->oldAdvisorIds[$row['added_by_id']]]);
                    $customer->setAddedBy($user);
                }

                $this->em->persist($customer);
                $this->em->flush();

                $this->oldCustomerIds[$row['id']] = $customer->getId();
            }
        }
    }
}
