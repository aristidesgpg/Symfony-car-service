<?php

namespace App\Command;

use App\Service\SettingsHelper;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Class SyncSettingsCommand.
 */
class SyncSettingsCommand extends Command
{
    protected static $defaultName = 'app:sync-settings';

    private $settingsHelper;

    /**
     * SyncSettingsCommand constructor.
     */
    public function __construct(SettingsHelper $settingsHelper)
    {
        parent::__construct();
        $this->settingsHelper = $settingsHelper;
    }

    protected function configure()
    {
        $this->setDescription('Syncs default settings with the database.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $io->text('Beginning sync.');
        $result = $this->settingsHelper->syncSettings();
        $io->text('Synced: '.$result.' records.');

        return 0;
    }
}
