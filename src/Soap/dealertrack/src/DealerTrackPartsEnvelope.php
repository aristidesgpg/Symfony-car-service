<?php


namespace App\Soap\dealertrack\src;


class DealerTrackPartsEnvelope
{
    /**
     * @var \App\Soap\dealertrack\src\DealerTrackPartsEnvelopeHeader $header
     */
    private $header = null;


    /**
     * @var \App\Soap\dealertrack\src\DealerTrackPartsEnvelopeBody $body
     */
    private $body = null;

    /**
     * @return DealerTrackPartsEnvelopeHeader
     */
    public function getHeader(): ?DealerTrackPartsEnvelopeHeader
    {
        return $this->header;
    }

    /**
     * @param DealerTrackPartsEnvelopeHeader|null $header
     */
    public function setHeader(?DealerTrackPartsEnvelopeHeader $header): void
    {
        $this->header = $header;
    }

    /**
     * @return DealerTrackPartsEnvelopeBody
     */
    public function getBody(): ?DealerTrackPartsEnvelopeBody
    {
        return $this->body;
    }

    /**
     * @param DealerTrackPartsEnvelopeBody|null $body
     */
    public function setBody(?DealerTrackPartsEnvelopeBody $body): void
    {
        $this->body = $body;
    }





}