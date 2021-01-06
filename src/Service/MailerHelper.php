<?php

namespace App\Service;

use Symfony\Component\DependencyInjection\ContainerInterface as Container;

/**
 * Class MailerHelper.
 *
 * @package App\Service
 */
class MailerHelper
{
    /**
     * @var Container
     */
    private $container;

    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    /**
     * @var string
     */
    private $sender;

    public function __construct(Container $container, \Swift_Mailer $mailer)
    {
        $this->container = $container;
        $this->sender = $this->container->getParameter('sender');
        $this->mailer = $mailer;
    }

    /**
     * @param string $title
     * @param string $email
     * @param string $body
     *
     * @return bool
     */
    public function sendMail(string $title, string $email, string $body): bool
    {
        $message = (new \Swift_Message($title))
            ->setFrom($this->sender)
            ->setTo($email)
            ->setBody(
                $body,
                'text/plain'
            );

        if (!$this->mailer->send($message)) {
            return false;
        }

        return true;
    }
}
