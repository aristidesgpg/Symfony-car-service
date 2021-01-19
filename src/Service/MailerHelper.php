<?php

namespace App\Service;

use App\Helper\iServiceLoggerTrait;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

/**
 * Class MailerHelper.
 */
class MailerHelper
{
    use iServiceLoggerTrait;

    /**
     * @var ParameterBagInterface
     */
    private $parameterBag;

    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    /**
     * @var string
     */
    private $sender;

    public function __construct(ParameterBagInterface $parameterBag, MailerInterface $mailer)
    {
        $this->parameterBag = $parameterBag;
        $this->sender = $this->parameterBag->get('sender');
        $this->mailer = $mailer;
    }

    public function sendMail(string $title, string $email, string $body): bool
    {
//        $message = (new \Swift_Message($title))
//            ->setFrom($this->sender)
//            ->setTo($email)
//            ->setBody(
//                $body,
//                'text/plain'
//            );
//
//        if (!$this->mailer->send($message)) {
//            return false;
//        }

        $email = (new Email())
            ->from($this->sender)
            ->to($email)
            ->subject($title)
            ->text($body);


        return $this->send($email);
    }


    public function sendMailFromTemplate(string $title, string $email, string $templatePath, array $templateContext = []): bool
    {

        $email = (new TemplatedEmail())
            ->from($this->sender)
            ->to($email)
            ->subject($title)
            ->htmlTemplate($templatePath)
            ->context($templateContext)
        ;
        return $this->send($email);

    }



    /**
     * @param Email $email
     * @return bool
     */
    private function send(Email $email): bool
    {
        try {
            $this->mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            $this->logger->critical('Email unsuccessfully sent.'.$e->getMessage());
            dd($e->getMessage() );

            return false;
        }

        return true;
    }
}
