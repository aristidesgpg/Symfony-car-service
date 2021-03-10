<?php

namespace App\Command;

use Doctrine\ORM\EntityManager;
use App\Entity\User;
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
    /**
     * constructor.
     */
    public function __construct(ManagerRegistry $ri, EntityManagerInterface $em, UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->connection = $ri->getConnection("iservice2");
        $this->em = $em;
        $this->oldAdvisorIds = array();
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
        $this->advisor();
        
        $output->writeln(json_encode($this->oldAdminIds));
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
                     ->setPreviewDeviceTokens( $row['preview_tokens'] )
                     ->setRole( 'ROLE_SERVICE_ADVISOR' );
                
                $this->em->persist( $user );
                $this->em->flush();
                
                $this->oldAdvisorIds[ $row['id'] ] = $user->getId();
            }
        }
    }
    private function CAQLog(){
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
                     ->setPreviewDeviceTokens( $row['preview_tokens'] )
                     ->setRole( 'ROLE_SERVICE_ADVISOR' );
                
                $this->em->persist( $user );
                $this->em->flush();
                
                $this->oldAdvisorIds[ $row['id'] ] = $user->getId();
            }
        }
    }
}
