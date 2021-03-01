<?php

namespace App\Helper;

use Psr\Log\LoggerInterface;

/**
 * Trait LoggerTrait.
 */
trait iServiceLoggerTrait
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @required
     */
    public function setLogger(LoggerInterface $iserviceLogger)
    {
        $this->logger = $iserviceLogger;
    }

    private function logInfo(string $message, array $context = [])
    {
        $this->logger->info($message, $context);
    }
}
