<?php

namespace App\Command;

use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Class MigrateFromOldDatabase.
 */
class MigrateFromOldDatabase extends Command
{
    /**
     * @var string
     */
    protected static $defaultName = 'migrate:iservice2';
    
    /**
     * @var string
     */
    protected $connection;

    /**
     * CheckInHelper constructor.
     */
    public function __construct()
    {

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
         
    }
}
