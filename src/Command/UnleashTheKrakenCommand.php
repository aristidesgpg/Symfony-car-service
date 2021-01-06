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
 * Class UnleashTheKrakenCommand.
 *
 * @package App\Command
 *
 */
class UnleashTheKrakenCommand extends Command
{
    /**
     * @var string
     */
    protected static $defaultName = 'app:unleash-the-kraken';

    protected function configure()
    {
        $this
            ->setDescription('AHHHHHAHHHHHHHHHHHHHHHHGGHHHHHHHHHHAAAAAAAAAAAAAAAAAAAAA')
            ->addArgument('slug', InputArgument::OPTIONAL, 'Gooey')
            ->addOption('format', null, InputOption::VALUE_REQUIRED, 'Format 123 abc', 'text');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     * @throws Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $slug = $input->getArgument('slug');
        $data = [
            'slug' => $slug,
            'hearts' => rand(10, 100),
        ];

        $format = $input->getOption('format');
        switch ($format) {
            case 'text':
                $rows = [];
                foreach ($data as $key => $val) {
                    $rows[] = [$key, $val];
                }
                $io->table(['Key', 'Value'], $rows);
                break;
            case 'json':
                $io->write(json_encode($data));
                break;
            default:
                throw new Exception('NOT AN ACCEPTABLE FORMAT');
        }

        return 0;
    }
}
