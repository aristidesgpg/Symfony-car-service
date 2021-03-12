<?php

namespace App\Command;

use Doctrine\ORM\EntityManager;
use App\Entity\User;
use App\Entity\RepairOrder;
use App\Entity\Customer;
use App\Entity\RepairOrderVideo;
use App\Entity\RepairOrderVideoInteraction;
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
    /**
     * constructor.
     */
    public function __construct(ManagerRegistry $ri, EntityManagerInterface $em, UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->connection = $ri->getConnection("iservice2");
        $this->em = $em;
        $this->oldAdminIds = array();
        $this->oldAdvisorIds = array();
        $this->oldTechnicanIds = array();
        $this->oldRepairOrderIds = array();
        $this->oldCustomerIds = array();
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
        $this->admin();
        $output->writeln("Admin done");
        $this->advisor();
        $output->writeln("Advisor done");
        $this->customer();
        $output->writeln("Customer done");
        $this->technican();
        $output->writeln("Technican done");
        
        $output->writeln(json_encode($this->oldCustomerIds));
        return "success";
    }

    private function admin(){
        $statement = $this->connection->prepare(
            'SELECT * FROM admin'
        );
        
        $statement->execute();
        $rows = $statement->fetchAll();

        $repo = $this->em->getRepository(User::class);
        
        foreach($rows as $row){
            $oldUser = $repo->findOneBy(['email' => $row['email']]);
            array_push($this->oldAdminIds, $row['id']);

            if($oldUser){
                $this->oldAdminIds[ $row['id'] ] = $oldUser->getId();
            } else {
                $user = new User();
                $name = $row['name'];
                $spacePosition = strpos($name, " ");
                if($row['app_password']){
                    $password = $row['app_password'];
                } else {
                    $password = $this->passwordEncoder->encodePassword($user, 'test');
                }

                $user->setFirstName( substr($name, 0, $spacePosition) )
                     ->setLastName( substr($name, $spacePosition) )
                     ->setEmail( $row['email'] )
                     ->setPhone( $row['phone'] )
                     ->setPassword( $password )
                     ->setPreviewDeviceTokens( $row['preview_tokens'] )
                     ->setRole( 'ROLE_ADMIN' );
                
                $this->em->persist( $user );
                $this->em->flush();
                
                $this->oldAdminIds[ $row['id'] ] = $user->getId();
            }
        }
    }
    private function technican(){
        $statement = $this->connection->prepare(
            'SELECT * FROM technican'
        );
        
        $statement->execute();
        $rows = $statement->fetchAll();

        $userRepo = $this->em->getRepository(User::class);
        
        foreach($rows as $row){
            $oldUser = $userRepo->findOneBy(['first_name' => $row['first_name', 'last_name' => $row['last_name' ] ] );
            array_push($this->oldTechnicanIds, $row['id']);
            $user = new User();
            if($oldUser){
                $this->oldTechnicanIds[ $row['id'] ] = $oldUser->getId();
            } else {
                if($row['password']){
                    $password = $row['password'];
                } else {
                    $password = $this->passwordEncoder->encodePassword($user, 'test');
                }
               
                $user->setFirstName( $row['first_name'] )
                     ->setLastName( $row['last_name'] )
                     ->setEmail( $row['email'] )
                     ->setCertification( $row['certification'] )
                     ->setExperience( $row['experience'] )
                     ->setActive( $row['active'] )
                     ->setPassword( $password )
                     ->setSecurityAnswer( $row['security_answer'] )
                     ->setSecurityQuestion( 'security_question' )
                     ->setRole( 'ROLE_TECHNICIAN' );
                
                $this->em->persist( $user );
                $this->em->flush();
                
                $this->oldTechnicanIds[ $row['id'] ] = $user->getId();
            }
        }
    }
    private function advisor(){
        $statement = $this->connection->prepare(
            'SELECT * FROM advisor'
        );
        
        $statement->execute();
        $rows = $statement->fetchAll();

        $repo = $this->em->getRepository(User::class);
        
        foreach($rows as $row){
            $oldUser = $repo->findOneBy(['email' => $row['email']]);
            array_push($this->oldAdvisorIds, $row['id']);

            if($oldUser){
                $this->oldAdvisorIds[ $row['id'] ] = $oldUser->getId();
            } else {
                $user = new User();
                $user->setFirstName( $row['first_name'] )
                     ->setLastName( $row['last_name'] )
                     ->setEmail( $row['email'] )
                     ->setPhone( $row['phone'] )
                     ->setPassword( $row['password'] )
                     ->setExtension( $row['extension'] )
                     ->setActive( $row['active'] )
                     ->setSecurityQuestion( $row['security_question'] )
                     ->setSecurityAnswer( $row['security_answer'] )
                     ->setProcessRefund( $row['can_give_refund'])
                     ->setShareRepairOrders( $row['express_advisor'])
                     ->setRole( 'ROLE_SERVICE_ADVISOR' );
                
                $this->em->persist( $user );
                $this->em->flush();
                
                $this->oldAdvisorIds[ $row['id'] ] = $user->getId();
            }
        }
    }
    private function CAQLog(){
        $statement = $this->connection->prepare(
            'SELECT * FROM c_a_q_log'
        );
        
        $statement->execute();
        $rows = $statement->fetchAllAssociative();

        $userRepo = $this->em->getRepository(User::class);
        
        foreach($rows as $row){
            $oldUser = $userRepo->findOneBy(['email' => $row['email']]);
            array_push($this->oldAdvisorIds, $row['id']);

            if($oldUser){
                $this->oldAdvisorIds[ $row['id'] ] = $oldUser->getId();
            } else {
                $user = new User();
                $user->setFirstName( $row['first_name'] )
                     ->setLastName( $row['last_name'] )
                     ->setEmail( $row['email'] )
                     ->setPhone( $row['phone'] )
                     ->setPassword( $row['password'] )
                     ->setExtension( $row['extension'] )
                     ->setActive( $row['active'] )
                     ->setSecurityQuestion( $row['security_question'] )
                     ->setSecurityAnswer( $row['security_answer'] )
                     ->setProcessRefund( $row['can_give_refund'])
                     ->setShareRepairOrders( $row['express_advisor'])
                     ->setPreviewDeviceTokens( $row['preview_tokens'] )
                     ->setRole( 'ROLE_SERVICE_ADVISOR' );
                
                $this->em->persist( $user );
                $this->em->flush();
                
                $this->oldAdvisorIds[ $row['id'] ] = $user->getId();
            }
        }
    }

    private function repairOrder(){
        $statement = $this->connection->prepare(
            'SELECT * FROM repair_order'
        );
        
        $statement->execute();
        $rows = $statement->fetchAllAssociative();
        $userRepo = $this->em->getRepository(User::class);
        $customerRepo = $this->em->getRepository(Customer::class);
        $repairOrderRepo = $this->em->getRepository(RepairOrder::class);

        foreach($rows as $row){
            array_push($this->oldRepairOrderIds, $row['id']);

            $oldRepairOrder = $repairOrderRepo->findOneBy(['number' => $row['number']]);
            if($oldRepairOrder) {
                $this->oldAdvisorIds[ $row['id'] ] = $oldRepairOrder->getId();
            } else {
                $customerId = $this->oldCustomerIds[ $row['primary_customer_id'] ];
                $customer = $customerRepo->findOneBy(['id' => $customerId]);
    
                $technicanId = $this->oldTechnicanIds[ $row['technican_id' ] ];
                $technican = $userRepo->findOneBy(['id' => $technicanId] );
                
                $advisorId = $this->oldAdvisorIds[ $row['advisor_id' ] ];
                $advisor = $userRepo->findOneBy(['id' => $advisorId] );
    
                $repairOrder = new RepairOrder();
                $repairOrder->setPrimaryCustomer( $customer )
                            ->setPrimaryTechnician($technican)
                            ->setPrimaryAdvisor($advisor)
                            ->setNumber($row['number'])
                            ->setStartValue($row['value'])
                            ->setFinalValue($row['finalValue'])
                            ->setApprovedValue($row['approvedValue'])
                            ->setDateClosed($row['closed_date'])
                            ->setDateCreated($row['date'])
                            ->setWaiter($row['waiter'])
                            ->setPickupDate($row['pickup_date')
                            ->setLinkHash($row['link_hash'])
                            ->setYear($row['year'])
                            ->setMake($row['make'])
                            ->setModel($row['model'])
                            ->setVin($row['vin'])
                            ->setDeleted($row['inactive'])
                            ->setMiles($row['miles'])
                            ->setWaiverSignature($row['waiver'])
                            ->setWaiverVerbiage($row['waiverVerbiage'])
                            ->setUpgradeQue($row['upgradeQueue']);
                
                $this->em->persist( $repairOrder );
                $this->em->flush();
                
                if($row['video']) {
                    $repairOrderVideo  = new RepairOrderVideo();
                    $repairOrderVideoInteraction  = new RepairOrderVideoInteraction();
                    $repairOrderVideo->setRepairOrder($repairOrder)
                                     ->setTechnician($technican)
                                     ->setPath($row['video'])
                                     ->setStatus("Uploaded")
                                     ->setDateUploaded($row['date']);
                    
                    $this->em->persist( $repairOrder );
                    $this->em->flush();
    
                    $repairOrderVideoInteraction->setRepairOrderVideo($repairOrderVideo)
                                                ->setUser($technican)
                                                ->setCustomer($customer)
                                                ->setType("Uploaded")
                                                ->setDate($row['date']);
                    $this->em->persist( $repairOrder );
                    $this->em->flush();
                }
                $this->oldAdvisorIds[ $row['id'] ] = $repairOrder->getId();
            }
        }
    }
    private function customer(){
        $statement = $this->connection->prepare(
            'SELECT * FROM customer'
        );
        $userRepo = $this->em->getRepository(User::class);
        $customerRepo = $this->em->getRepository(Customer::class);
        $statement->execute();
        $rows = $statement->fetchAll();

        foreach($rows as $row){
            $phone = $row['phone'];
            $cleanPhone = preg_replace('/[^0-9]/', '', $phone);
            if(strlen($cleanPhone) > 10){
                $cleanPhone = substr($cleanPhone, 1, 10);
            }

            $oldCustomer = $customerRepo->findOneBy(['phone' => $cleanPhone]);
            array_push($this->oldCustomerIds, $row['id']);
            
            if($oldCustomer){
                $this->oldCustomerIds[ $row['id'] ] = $oldCustomer->getId();
            } else {
                $customer = new Customer();
                
                $customer->setMobileConfirmed($row['phone_validated'])
                         ->setName($row['name'] ? $row['name'] : "No Name")
                         ->setEmail($row['email'])
                         ->setPhone($cleanPhone);

                if( $row['added_by_id'] ) {
                    $user = $userRepo->findOneBy(['id' => $this->oldAdvisorIds[ $row['added_by_id'] ] ]);
                    $customer->setAddedBy( $user );
                }
                
                $this->em->persist( $customer );
                $this->em->flush();
                
                $this->oldCustomerIds[ $row['id'] ] = $customer->getId();
            }
        }
    }
}
