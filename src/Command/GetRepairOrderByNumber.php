<?php

namespace App\Command;

use App\Service\DMS\DMS;
use App\Service\SettingsHelper;
use App\Service\SettingsHelper as Settings;
use DateTime;
use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class AddRepairOrders.
 */
class GetRepairOrderByNumber extends Command
{
    /**
     * @var string
     */
    protected static $defaultName = 'dms:getRepairOrderByNumber';

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
            ->setName('dms:getRepairOrderByNumber')
            // the short description shown while running "php bin/console list"
            ->setDescription("Get's a specific Repair order by number")
            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp("
                This command is used to help debug why RO's are not importing.
            ")
            ->addArgument('ro', InputArgument::REQUIRED, 'Enter an RO Number');
    }

    /**
     * @return int
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

                return 0;
            }
        }

        $ro = $input->getArgument('ro');
        // Gets and adds parts
        $result = $this->getDms()->getRepairOrderByNumber($ro);
        dump($result);
        $output->writeln('Complete!');

        return 1;
    }

    public static function getDefaultName(): string
    {
        return self::$defaultName;
    }

    public static function setDefaultName(string $defaultName): void
    {
        self::$defaultName = $defaultName;
    }

    public function getDms(): DMS
    {
        return $this->dms;
    }

    public function setDms(DMS $dms): void
    {
        $this->dms = $dms;
    }

    public function getSettingsHelper(): Settings
    {
        return $this->settingsHelper;
    }

    public function setSettingsHelper(Settings $settingsHelper): void
    {
        $this->settingsHelper = $settingsHelper;
    }
}
