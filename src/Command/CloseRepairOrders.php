<?php

namespace App\Command;

use App\Service\CDK;
use App\Service\DMS\DMS;
use App\Service\SettingsHelper;
use App\Service\SettingsHelper as Settings;
use DateTime;
use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class CloseRepairOrders.
 */
class CloseRepairOrders extends Command
{
    /**
     * @var string
     */
    protected static $defaultName = 'dms:closeRepairOrders';

    /**
     * @var Settings
     */
    private $settingsHelper;
    /**
     * @var DMS
     */
    private $dms;

    public function __construct(SettingsHelper $settingsHelper, DMS $dms)
    {
        $this->settingsHelper = $settingsHelper;
        $this->dms = $dms;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            // the name of the command (the part after "bin/console")
            ->setName('dms:closeRepairOrders')
            // the short description shown while running "php bin/console list"
            ->setDescription("Closes repair orders from dealer's DMS into iService")
            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp("
                This command is used to close opened repair orders in the dealer's DMS. Usage is straight forward, no additional parameters required. The service built checks the 
                parameters for which DMS (if any) the dealership is using, and determines which one to use 
                automatically.
            ");
    }

    /**
     * @return void
     *
     * @throws Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $openLate = $this->getSettingsHelper()->getSetting('openLate') ? true : false;
        // If using cdk and the dealer's service department isn't 24/7
        if ('usingCdk' == $this->getDms()->getActiveDMS() && !$openLate) {
            $now = new DateTime();
            $startTime = new DateTime($now->format('Y-m-d 03:00:00'));
            $endTime = new DateTime($now->format('Y-m-d 22:00:00'));
            if ($now < $startTime || $now > $endTime) {
                $output->writeln('The CDKClient servers are busy between 10pm and 3am doing nothing so they can\'t handle our requests');

                return;
            }
        }
        // Gets and adds parts
        $this->getDms()->closeOpenRepairOrders();
        $output->writeln('Complete!');
    }

    public static function getDefaultName(): string
    {
        return self::$defaultName;
    }

    public static function setDefaultName(string $defaultName): void
    {
        self::$defaultName = $defaultName;
    }

    public function getSettingsHelper(): Settings
    {
        return $this->settingsHelper;
    }

    public function setSettingsHelper(Settings $settingsHelper): void
    {
        $this->settingsHelper = $settingsHelper;
    }

    public function getDms(): DMS
    {
        return $this->dms;
    }

    public function setDms(DMS $dms): void
    {
        $this->dms = $dms;
    }
}
