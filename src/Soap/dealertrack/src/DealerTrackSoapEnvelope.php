<?php


namespace App\Soap\dealertrack\src;


class DealerTrackSoapEnvelope
{
    /**
     * @var \App\Soap\dealertrack\src\DealerTrackSoapEnvelopeHeader $header
     */
    private $header = null;


    /**
     * @var \App\Soap\dealertrack\src\DealerTrackSoapEnvelopeBody $body
     */
    private $body = null;

    /**
     * @return DealerTrackSoapEnvelopeHeader
     */
    public function getHeader(): ?DealerTrackSoapEnvelopeHeader
    {
        return $this->header;
    }

    /**
     * @param DealerTrackSoapEnvelopeHeader|null $header
     */
    public function setHeader(?DealerTrackSoapEnvelopeHeader $header): void
    {
        $this->header = $header;
    }

    /**
     * @return DealerTrackSoapEnvelopeBody
     */
    public function getBody(): ?DealerTrackSoapEnvelopeBody
    {
        return $this->body;
    }

    /**
     * @param DealerTrackSoapEnvelopeBody|null $body
     */
    public function setBody(?DealerTrackSoapEnvelopeBody $body): void
    {
        $this->body = $body;
    }





}