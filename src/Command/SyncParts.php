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
 * Class SyncParts
 *
 * @package App\Command
 */
class SyncParts extends Command {
    /**
     * @var string
     */
    protected static $defaultName = 'dms:syncParts';

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var DMS
     */
    private $dms;

    public function __construct (EntityManagerInterface $em, DMS $dms, CDK $cdk, Settings $settings) {
        $this->em       = $em;
        $this->dms      = $dms;

        parent::__construct();
    }

    protected function configure () {
        $this
            // the name of the command (the part after "bin/console")
            ->setName('dms:syncParts')
            // the short description shown while running "php bin/console list"
            ->setDescription("Gets parts information from DMS");
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

        // Gets and adds repair orders
        $dms->syncParts();
        $output->writeln('Complete!');
    }
}
