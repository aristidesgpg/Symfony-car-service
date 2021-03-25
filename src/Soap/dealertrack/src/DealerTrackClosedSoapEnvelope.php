<?php


namespace App\Soap\dealertrack\src;


class DealerTrackClosedSoapEnvelope
{
    /**
     * @var \App\Soap\dealertrack\src\DealerTrackClosedSoapEnvelopeHeader $header
     */
    private $header = null;


    /**
     * @var \App\Soap\dealertrack\src\DealerTrackClosedSoapEnvelopeBody $body
     */
    private $body = null;

    /**
     * @return DealerTrackClosedSoapEnvelopeHeader
     */
    public function getHeader(): ?DealerTrackClosedSoapEnvelopeHeader
    {
        return $this->header;
    }

    /**
     * @param DealerTrackClosedSoapEnvelopeHeader|null $header
     */
    public function setHeader(?DealerTrackClosedSoapEnvelopeHeader $header): void
    {
        $this->header = $header;
    }

    /**
     * @return DealerTrackClosedSoapEnvelopeBody
     */
    public function getBody(): ?DealerTrackClosedSoapEnvelopeBody
    {
        return $this->body;
    }

    /**
     * @param DealerTrackClosedSoapEnvelopeBody|null $body
     */
    public function setBody(?DealerTrackClosedSoapEnvelopeBody $body): void
    {
        $this->body = $body;
    }





}