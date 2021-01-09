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
    public function setLogger(LoggerInterface $iserviceLogger): void
    {
        $this->logger = $iserviceLogger;
    }

    private function logInfo(string $message, array $context = []): void
    {
        $this->logger->info($message, $context);
    }
}
