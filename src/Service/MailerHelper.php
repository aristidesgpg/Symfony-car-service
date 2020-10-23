<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;
use \Swift_Mailer as Mailer;
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
     * @var Mailer
     */
    private $mailer;

    /**
     * @var String
     */
    private $sender;

    public function __construct (Container $container, Mailer $mailer) {
        $this->container = $container;
        $this->sender    = $this->container->getParameter('sender');
        $this->mailer    = $mailer;
    }

    /**
     * @param  String        $title
     * @param  String        $email
     * 
     * @return Boolean
     */
    public function sendMail($title, $email)
    {
        $message = (new \Swift_Message($title))
            ->setFrom($this->sender)
            ->setTo($email);
    
        if (!$this->mailer->send($message, $failures)) {
            return false;
        } 
        
        return true;
    }
}
