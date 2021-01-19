<?php


namespace App\Service\Mailer;


use Psr\Log\LoggerInterface;
use Symfony\Component\Mailer\Envelope;
use Symfony\Component\Mailer\Exception\HttpTransportException;
use Symfony\Component\Mailer\SentMessage;
use Symfony\Component\Mailer\Transport\AbstractApiTransport;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * Used sendgrid-mailer as template
 *
 * Class ISREApiTransport
 * @package App\Mailer
 */
class ISREApiTransport extends AbstractApiTransport
{
    private const HOST = 'isre.us';

    private $key;

    public function __construct(string $key, HttpClientInterface $client = null, EventDispatcherInterface $dispatcher = null, LoggerInterface $logger = null)
    {
        $this->key = $key;
        parent::__construct($client, $dispatcher, $logger);
    }

    public function __toString(): string
    {
        return sprintf('isre://%s', $this->getEndpoint());
    }

    protected function doSendApi(SentMessage $sentMessage, Email $email, Envelope $envelope): ResponseInterface
    {

        $response = $this->client->request('POST', 'https://'.$this->getEndpoint().'/api/add-to-email-que', [
            'json' => $this->getPayload($email, $envelope)
        ]);

        if (200 !== $response->getStatusCode()) {
            $errors = ['errors' => ['message', $response->getContent()]];

            throw new HttpTransportException('Unable to send an email: '.implode('; ', array_column($errors['errors'],'message')).sprintf(' (code %d).', $response->getStatusCode()), $response);
        }

        return $response;
    }

    private function getPayload(Email $email, Envelope $envelope): array
    {
        $addressStringifier = function (Address $address) {
            return $address->getAddress();
        };


        $postFields = [
            'access_token' => $this->key,
            'to_email'     => array_map($addressStringifier, $this->getRecipients($email, $envelope))[0],//ISRE only supports a single address
            'from_email'   => $addressStringifier($envelope->getSender()),
            'subject'      => $email->getSubject(),
            'body'         => $this->getContent($email)//ISRE only supports a string
        ];

        if ($emails = array_map($addressStringifier, $email->getCc())) {
            //ISRE only supports a single address
            $postFields['cc_emails'] = $emails[0];
        }

        return $postFields;
    }


    private function getContent(Email $email): string
    {
        $content = [];
        if (null !== $text = $email->getTextBody()) {
            $content[] = ['type' => 'text/plain', 'value' => $text];
        }
        if (null !== $html = $email->getHtmlBody()) {
            $content[] = ['type' => 'text/html', 'value' => $html];
        }

        if(array_key_exists(1, $content)){
            return $content[1]['value'];
        }

        return $content[0]['value'];
    }

    private function getAttachments(Email $email): array
    {
        $attachments = [];
        foreach ($email->getAttachments() as $attachment) {
            $headers = $attachment->getPreparedHeaders();
            $filename = $headers->getHeaderParameter('Content-Disposition', 'filename');
            $disposition = $headers->getHeaderBody('Content-Disposition');

            $att = [
                'content' => str_replace("\r\n", '', $attachment->bodyToString()),
                'type' => $headers->get('Content-Type')->getBody(),
                'filename' => $filename,
                'disposition' => $disposition,
            ];

            if ('inline' === $disposition) {
                $att['content_id'] = $filename;
            }

            $attachments[] = $att;
        }

        return $attachments;
    }

    private function getEndpoint(): ?string
    {
        return ($this->host ?: self::HOST).($this->port ? ':'.$this->port : '');
    }
}
