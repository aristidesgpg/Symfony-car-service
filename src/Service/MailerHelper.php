<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

/**
 * Class MailerHelper
 *
 * @package App\Service
 */
class MailerHelper {

    /**
     * @var Container
     */
    private $container;

    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    /**
     * @var String
     */
    private $sender;

    public function __construct (Container $container, \Swift_Mailer $mailer) {
        $this->container = $container;
        $this->sender    = $this->container->getParameter('sender');
        $this->mailer    = $mailer;
    }

    /**
     * @param  String $title
     * @param  String $email
     * @param  String $body
     * 
     * @return Boolean
     */
    public function sendMail($title, $email, $body)
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
