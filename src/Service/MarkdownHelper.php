<?php

namespace App\Service;

use Psr\Log\LoggerInterface;
use Symfony\Component\Cache\Adapter\AdapterInterface;

/**
 * Class MarkdownHelper
 *
 * @package App\Service
 */
class MarkdownHelper {

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
     *
     * @param AdapterInterface $cache
     * @param LoggerInterface  $iserviceLogger
     */
    public function __construct (AdapterInterface $cache, LoggerInterface $iserviceLogger) {
        $this->cache          = $cache;
        $this->iserviceLogger = $iserviceLogger;
    }

    /**
     * @param string $source
     *
     * @return string
     */
    public function parse (string $source): string {
        $this->iserviceLogger->info('bacon');

        return $source;
    }
}
