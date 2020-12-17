<?php

namespace App\Helper;

use Psr\Log\LoggerInterface;

/**
 * Trait LoggerTrait
 *
 * @package App\Helper
 */
trait iServiceLoggerTrait {

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @required
     *
     * @param LoggerInterface $iserviceLogger
     */
    public function setLogger (LoggerInterface $iserviceLogger) {
        $this->logger = $iserviceLogger;
    }

    /**
     * @param string $message
     * @param array  $context
     */
    private function logInfo (string $message, array $context = []) {
        $this->logger->info($message, $context);
    }
}
