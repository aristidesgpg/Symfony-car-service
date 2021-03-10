<?php


namespace App\Soap\dealerbuilt\src;


class DealerBuiltSoapEnvelopePullParts
{
    /**
     * @var \App\Soap\dealerbuilt\src\DealerBuiltSoapEnvelopeHeaderPullParts $header
     */
    private $header = null;


    /**
     * @var \App\Soap\dealerbuilt\src\DealerBuiltSoapEnvelopeBodyPullParts $body
     */
    private $body = null;

    /**
     * @return DealerBuiltSoapEnvelopeHeaderPullParts
     */
    public function getHeader(): ?DealerBuiltSoapEnvelopeHeaderPullParts
    {
        return $this->header;
    }

    /**
     * @param DealerBuiltSoapEnvelopeHeaderPullParts|null $header
     */
    public function setHeader(?DealerBuiltSoapEnvelopeHeaderPullParts $header): void
    {
        $this->header = $header;
    }

    /**
     * @return DealerBuiltSoapEnvelopeBodyPullParts
     */
    public function getBody(): ?DealerBuiltSoapEnvelopeBodyPullParts
    {
        return $this->body;
    }

    /**
     * @param DealerBuiltSoapEnvelopeBodyPullParts|null $body
     */
    public function setBody(?DealerBuiltSoapEnvelopeBodyPullParts $body): void
    {
        $this->body = $body;
    }





}