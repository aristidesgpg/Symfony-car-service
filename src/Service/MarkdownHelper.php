<?php

namespace App\Service;

use Psr\Log\LoggerInterface;
use Symfony\Component\Cache\Adapter\AdapterInterface;

/**
 * Class MarkdownHelper.
 */
class MarkdownHelper
{
    /**
     * @var AdapterInterface
     */
    private $cache;

    /**
     * @var LoggerInterface
     */
    private $iserviceLogger;

    /**
     * MarkdownHelper constructor.
     */
    public function __construct(AdapterInterface $cache, LoggerInterface $iserviceLogger)
    {
        $this->cache = $cache;
        $this->iserviceLogger = $iserviceLogger;
    }

    public function parse(string $source): string
    {
        $this->iserviceLogger->info('bacon');

        return $source;
    }
}
