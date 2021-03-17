<?php


namespace App\Soap\dealerbuilt\src;


class DealerBuiltSoapEnvelope
{
    /**
     * @var \App\Soap\dealerbuilt\src\DealerBuiltSoapEnvelopeHeader $header
     */
    private $header = null;


    /**
     * @var \App\Soap\dealerbuilt\src\DealerBuiltSoapEnvelopeBody $body
     */
    private $body = null;

    /**
     * @return DealerBuiltSoapEnvelopeHeader
     */
    public function getHeader(): ?DealerBuiltSoapEnvelopeHeader
    {
        return $this->header;
    }

    /**
     * @param DealerBuiltSoapEnvelopeHeader|null $header
     */
    public function setHeader(?DealerBuiltSoapEnvelopeHeader $header): void
    {
        $this->header = $header;
    }

    /**
     * @return DealerBuiltSoapEnvelopeBody
     */
    public function getBody(): ?DealerBuiltSoapEnvelopeBody
    {
        return $this->body;
    }

    /**
     * @param DealerBuiltSoapEnvelopeBody|null $body
     */
    public function setBody(?DealerBuiltSoapEnvelopeBody $body): void
    {
        $this->body = $body;
    }





}