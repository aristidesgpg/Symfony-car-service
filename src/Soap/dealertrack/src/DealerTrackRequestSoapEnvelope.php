<?php


namespace App\Soap\dealertrack\src;


class DealerTrackRequestSoapEnvelope
{
    /**
     * @var \App\Soap\dealertrack\src\DealerTrackRequestSoapEnvelopeHeader $header
     */
    private $header = null;


    /**
     * @var \App\Soap\dealertrack\src\DealerTrackRequestSoapEnvelopeBody $body
     */
    private $body = null;

    /**
     * @return DealerTrackRequestSoapEnvelopeHeader
     */
    public function getHeader(): ?DealerTrackRequestSoapEnvelopeHeader
    {
        return $this->header;
    }

    /**
     * @param DealerTrackRequestSoapEnvelopeHeader|null $header
     */
    public function setHeader(?DealerTrackRequestSoapEnvelopeHeader $header): void
    {
        $this->header = $header;
    }

    /**
     * @return DealerTrackRequestSoapEnvelopeBody
     */
    public function getBody(): ?DealerTrackRequestSoapEnvelopeBody
    {
        return $this->body;
    }

    /**
     * @param DealerTrackRequestSoapEnvelopeBody|null $body
     */
    public function setBody(?DealerTrackRequestSoapEnvelopeBody $body): void
    {
        $this->body = $body;
    }





}