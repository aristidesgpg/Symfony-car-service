<?php

namespace App\Command;

use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Entity\Settings;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class SettingsCommand
 *
 * @package App\Command
 */
class SettingsCommand extends Command {
    /**
     * @var string
     */
    protected static $defaultName = 'app:settings';

    private $em;

    public function __construct(EntityManagerInterface $em) {
        parent::__construct();
        $this->em = $em;
    }

    protected function configure () {
        $this
            // the name of the command (the part after "bin/console")
            ->setName('app:settings_test')
            // the short description shown while running "php bin/console list"
            ->setDescription("Settings entity test")
            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp("
                This command is used to test Settings entity.");
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return void
     * @throws Exception
     */
    protected function execute (InputInterface $input, OutputInterface $output) {

        $repo = $this->em->getRepository("App:Settings");

        $res = $repo->findOneBy(['key' => 'phase1']);
        
        $output->writeln($res->getValue());
    }
}
