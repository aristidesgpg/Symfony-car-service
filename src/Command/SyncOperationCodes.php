<?php


namespace App\Command;

use App\Service\DMS\DMS;
use App\Service\SettingsHelper;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class SyncOperationCodes
 * @package App\Command
 */
class SyncOperationCodes extends Command
{
    /**
     * @var string
     */
    protected static $defaultName = 'dms:syncOperationCodes';

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var DMS
     */
    private $dms;

    /**
     * @var SettingsHelper
     */
    private $settingsHelper;

    public function __construct(EntityManagerInterface $em, DMS $dms, SettingsHelper $settingsHelper)
    {
        $this->em = $em;
        $this->dms = $dms;
        $this->settingsHelper = $settingsHelper;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            // the name of the command (the part after "bin/console")
            ->setName('dms:syncOperationCodes')
            // the short description shown while running "php bin/console list"
            ->setDescription('Gets operation code information from DMS');
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
        $this->getDms()->getOperationCodes();
        $output->writeln('Complete!');
    }

    public function getEm(): EntityManagerInterface
    {
        return $this->em;
    }

    public function setEm(EntityManagerInterface $em): void
    {
        $this->em = $em;
    }

    public function getDms(): DMS
    {
        return $this->dms;
    }

    public function setDms(DMS $dms): void
    {
        $this->dms = $dms;
    }

    public function getSettingsHelper(): SettingsHelper
    {
        return $this->settingsHelper;
    }

    public function setSettingsHelper(SettingsHelper $settingsHelper): void
    {
        $this->settingsHelper = $settingsHelper;
    }
}
