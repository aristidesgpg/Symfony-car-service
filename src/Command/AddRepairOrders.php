<?php

namespace App\Command;

use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Service\CDK;
use App\Service\DMS;
use App\Service\SettingsHelper as Settings;
use Doctrine\ORM\EntityManagerInterface;
use DateTime;

/**
 * Class AddRepairOrders
 *
 * @package App\Command
 */
class AddRepairOrders extends Command {
    /**
     * @var string
     */
    protected static $defaultName = 'dms:addRepairOrders';

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var DMS
     */
    private $dms;

    /**
     * @var Settings
     */
    private $settings;

    public function __construct (EntityManagerInterface $em, DMS $dms, CDK $cdk, Settings $settings) {
        $this->em       = $em;
        $this->dms      = $dms;
        $this->settings = $settings;

        parent::__construct();
    }

    protected function configure () {
        $this
            // the name of the command (the part after "bin/console")
            ->setName('dms:addRepairOrders')
            // the short description shown while running "php bin/console list"
            ->setDescription("Adds repair orders from dealer's DMS into iService")
            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp("
                This command is used to grab open repair orders in the dealer's DMS and add them into the iService 
                platform. Usage is straight forward, no additional parameters required. The service built checks the 
                parameters for which DMS (if any) the dealership is using, and determines which one to use 
                automatically.
            ");
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return void
     * @throws Exception
     */
    protected function execute (InputInterface $input, OutputInterface $output) {
        $dms = $this->dms;

        $offHoursIntegration = $this->settings->getSetting('offHoursIntegration') === 'true' ? true : false;
        // If using cdk and the dealer's service department isn't 24/7
        if ($dms->usingCdk && !$offHoursIntegration) {
            $now       = new DateTime();
            $startTime = new DateTime($now->format('Y-m-d 03:00:00'));
            $endTime   = new DateTime($now->format('Y-m-d 22:00:00'));
            if ($now < $startTime || $now > $endTime) {
                $output->writeln('The CDK servers are busy between 10pm and 3am doing nothing so they can\'t handle our requests');
                return;
            }
        }
        // Gets and adds repair orders
        $dms->addOpenRepairOrders();
        // if ($cdk) {
        //     // Delete old cdk logs
        //     $twoDaysAgo  = (new DateTime())->modify('-2 days');
        //     $deleteQuery = $this->em->createQueryBuilder()
        //                       ->delete('AppBundle:SoapErrorLog', 's')
        //                       ->where('s.date < :twoDaysAgo')
        //                       ->andWhere('s.request LIKE :cdkUrl')
        //                       ->setParameter('twoDaysAgo', $twoDaysAgo->format('Y-m-d'))
        //                       ->setParameter(':cdkUrl', '%dmotorworks.com%')
        //                       ->getQuery();
        //     $deleteQuery->execute();
        // }
        // $output->writeln('Complete!');
    }
}
