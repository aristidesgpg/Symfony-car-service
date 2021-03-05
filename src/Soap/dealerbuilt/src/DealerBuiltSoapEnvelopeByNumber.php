<?php


namespace App\Soap\dealerbuilt\src;


class DealerBuiltSoapEnvelopeByNumber
{
    /**
     * @var \App\Soap\dealerbuilt\src\DealerBuiltSoapEnvelopeHeaderByNumber $header
     */
    private $header = null;


    /**
     * @var \App\Soap\dealerbuilt\src\DealerBuiltSoapEnvelopeBodyByNumber $body
     */
    private $body = null;

    /**
     * @return DealerBuiltSoapEnvelopeHeaderByNumber
     */
    public function getHeader(): ?DealerBuiltSoapEnvelopeHeaderByNumber
    {
        return $this->header;
    }

    /**
     * @param DealerBuiltSoapEnvelopeHeaderByNumber|null $header
     */
    public function setHeader(?DealerBuiltSoapEnvelopeHeaderByNumber $header): void
    {
        $this->header = $header;
    }

    /**
     * @return DealerBuiltSoapEnvelopeBodyByNumber
     */
    public function getBody(): ?DealerBuiltSoapEnvelopeBodyByNumber
    {
        return $this->body;
    }

    /**
     * @param DealerBuiltSoapEnvelopeBodyByNumber|null $body
     */
    public function setBody(?DealerBuiltSoapEnvelopeBodyByNumber $body): void
    {
        $this->body = $body;
    }





}