<?php

namespace App\Command;

use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Repository\FollowUpRepository;
use App\Service\FollowUpHelper;
use App\Service\SettingsHelper;


/**
 * Class FollowUpCommand
 *
 * @package App\Command
 */
class FollowUpCommand extends Command {
    /**
     * @var string
     */
    protected static $defaultName = 'app:follow-up';
    
    /**
     * @var SettingsHelper
     */
    private $followUpDelay;
    
    /**
     * @var FollowUpHelper
     */
    private $followUpHelper;


    protected function configure () {
        $this->setDescription('Follow up command');
        $settingsHelper       = new SettingsHelper();
        $this->followUpDelay  = $settingsHelper->getSetting('followUpDelay');
        $this->followUpHelper = new FollowUpHelper();
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int
     * @throws Exception
     */
    protected function execute (InputInterface $input, OutputInterface $output): int {
        $io               = new SymfonyStyle($input, $output);
        
        $followRepository = new FollowUpRepository();
        $delayedFollowUps = $followRepository->getAllDelayedItems($this->followUpDelay);

        foreach($delayedFollowUps as $delayedFollowUp){
            $this->followUpHelper->sendMessage($delayedFollowUp);
        }
        return 0;
    }
}
