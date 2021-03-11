<?php

namespace App\Command;

use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
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
    
    private $settingsHelper;
    private $followRepository;
    private $followUpHelper;

    public function __construct(SettingsHelper $settingsHelper, FollowUpHelper $followUpHelper, FollowUpRepository $followRepository) {
        $this->settingsHelper = $settingsHelper;
        $this->followUpHelper = $followUpHelper;
        $this->followRepository = $followRepository;
        parent::__construct();
    }

    protected function configure () {
        $this->setDescription('Follow up command');
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
        $followUpDelay    = $this->settingsHelper->getSetting('followUpDelay');
        
        $delayedFollowUps = $this->followRepository->getAllDelayedItems($followUpDelay);

        foreach($delayedFollowUps as $delayedFollowUp){
            $this->followUpHelper->sendMessage($delayedFollowUp);
        }
        return 0;
    }
}
