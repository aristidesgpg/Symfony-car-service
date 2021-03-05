<?php


namespace App\Soap\dealerbuilt\src;


class DealerBuiltSoapEnvelopeByKey
{
    /**
     * @var \App\Soap\dealerbuilt\src\DealerBuiltSoapEnvelopeHeaderByKey $header
     */
    private $header = null;


    /**
     * @var \App\Soap\dealerbuilt\src\DealerBuiltSoapEnvelopeBodyByKey $body
     */
    private $body = null;

    /**
     * @return DealerBuiltSoapEnvelopeHeaderByKey
     */
    public function getHeader(): ?DealerBuiltSoapEnvelopeHeaderByKey
    {
        return $this->header;
    }

    /**
     * @param DealerBuiltSoapEnvelopeHeaderByKey|null $header
     */
    public function setHeader(?DealerBuiltSoapEnvelopeHeaderByKey $header): void
    {
        $this->header = $header;
    }

    /**
     * @return DealerBuiltSoapEnvelopeBodyByKey
     */
    public function getBody(): ?DealerBuiltSoapEnvelopeBodyByKey
    {
        return $this->body;
    }

    /**
     * @param DealerBuiltSoapEnvelopeBodyByKey|null $body
     */
    public function setBody(?DealerBuiltSoapEnvelopeBodyByKey $body): void
    {
        $this->body = $body;
    }





}