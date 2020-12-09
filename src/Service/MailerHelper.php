<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;
use TijsVerkoyen\CssToInlineStyles\CssToInlineStyles;
use Twig\Environment;

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

    /**
     * @var Environment
     */
    private $twig;

    public function __construct (Container $container, \Swift_Mailer $mailer, Environment $twig) {
        $this->container = $container;
        $this->sender    = $this->container->getParameter('sender');
        $this->mailer    = $mailer;
        $this->twig = $twig;
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

    /**
     * @param string       $subject
     * @param string       $address
     * @param string|array $body
     *
     * @return bool
     */
    public function sendHtmlMail(string $subject, string $address, $body): bool {
        if (is_string($body)) {
            $body = ['html' => $body];
        } elseif (is_array($body)) {
            if (!isset($body['html']) || empty($body['html'])) {
                throw new \InvalidArgumentException('$body missing html');
            }
        } else {
            throw new \InvalidArgumentException('$body must be array or string');
        }
        $message = (new \Swift_Message($subject))
            ->setFrom($this->sender)
            ->setTo($address)
            ->setBody($body['html'], 'text/html');
        if (isset($body['text']) && $body['text'] !== null) {
            $message->addPart($body['text'], 'text/plain');
        }

        return ($this->mailer->send($message) !== 0);
    }

    /**
     * @param string $template
     * @param array  $params
     *
     * @return array
     * @throws \Throwable
     */
    public function renderEmail(string $template, array $params = []): array {
        $return = [
            'html' => null,
            'text' => null,
        ];
        $template = $this->twig->resolveTemplate($template);
        if ($template->hasBlock('text')) {
            $return['text'] = $this->htmlToPlaintext($template->renderBlock('text', $params));
        }
        $html = $template->render($params);
        $css = file_get_contents(__DIR__ . '/../../assets/foundation-emails.css');
        $return['html'] = (new CssToInlineStyles())->convert($html, $css);

        return $return;
    }

    /**
     * @param string $html
     *
     * @return string
     */
    private function htmlToPlaintext(string $html): string {
        $html = strip_tags($html);
        $parts = explode("\n", $html);
        foreach ($parts as &$p) {
            $p = trim($p);
        }

        return implode("\n", $parts);
    }
}
