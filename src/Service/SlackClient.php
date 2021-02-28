<?php

namespace App\Service;

use App\Helper\iServiceLoggerTrait;
use Http\Client\Exception;
use Nexy\Slack\Client;

/**
 * Class SlackClient.
 */
class SlackClient
{
    use iServiceLoggerTrait;

    /**
     * @var Client
     */
    private $slack;

    /**
     * SlackClient constructor.
     */
    public function __construct(Client $slack)
    {
        $this->slack = $slack;
    }

    /**
     * @return bool
     */
    public function sendMessage(string $from, string $message)
    {
        $slackMessage = $this->slack->createMessage()
                                    ->from($from)
                                    ->withIcon(':ghost:')
                                    ->setText($message);

        try {
            $this->slack->sendMessage($slackMessage);
        } catch (Exception $e) {
            return false;
        }

        $this->logger->info('New Message From '.$from);

        return true;
    }
}
