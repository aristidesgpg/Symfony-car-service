<?php

namespace App\Command;


use App\Service\DMS\DMS;
use App\Service\SettingsHelper;
use App\Service\SettingsHelper as Settings;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class AddRepairOrders.
 */
class AddRepairOrders extends Command
{
    /**
     * @var string
     */
    protected static $defaultName = 'dms:addRepairOrders';

    /**
     * @var DMS
     */
    private $dms;
    /**
     * @var Settings
     */
    private $settingsHelper;

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
     * @return void
     *
     * @throws Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $offHoursIntegration = 'true' === $this->getSettingsHelper()->getSetting('offHoursIntegration') ? true : false;
        // If using cdk and the dealer's service department isn't 24/7
        if ('usingCdk' == $this->getDms()->getActiveDMS() && !$offHoursIntegration) {
            $now = new DateTime();
            $startTime = new DateTime($now->format('Y-m-d 03:00:00'));
            $endTime = new DateTime($now->format('Y-m-d 22:00:00'));
            if ($now < $startTime || $now > $endTime) {
                $output->writeln('The CDKClient servers are busy between 10pm and 3am doing nothing so they can\'t handle our requests');

                return;
            }
        }
        // Gets and adds parts
        $this->getDms()->addOpenRepairOrders();
        $output->writeln('Complete!');
    }

    /**
     * @return string
     */
    public static function getDefaultName(): string
    {
        return self::$defaultName;
    }

    /**
     * @param string $defaultName
     */
    public static function setDefaultName(string $defaultName): void
    {
        self::$defaultName = $defaultName;
    }

    /**
     * @return DMS
     */
    public function getDms(): DMS
    {
        return $this->dms;
    }

    /**
     * @param DMS $dms
     */
    public function setDms(DMS $dms): void
    {
        $this->dms = $dms;
    }

    /**
     * @return SettingsHelper
     */
    public function getSettingsHelper(): Settings
    {
        return $this->settingsHelper;
    }

    /**
     * @param SettingsHelper $settingsHelper
     */
    public function setSettingsHelper(Settings $settingsHelper): void
    {
        $this->settingsHelper = $settingsHelper;
    }



}
