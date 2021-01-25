<?php

namespace App\Soap\dealerbuilt\src;

class DealerBuiltSoapEnvelope
{
    /**
     * @var \App\Soap\dealerbuilt\src\DealerBuiltSoapEnvelopeHeader
     */
    private $header = null;

    /**
     * @var \App\Soap\dealerbuilt\src\DealerBuiltSoapEnvelopeBody
     */
    private $body = null;

    /**
     * @return DealerBuiltSoapEnvelopeHeader
     */
    public function getHeader(): ?DealerBuiltSoapEnvelopeHeader
    {
        return $this->header;
    }

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

    public function setBody(?DealerBuiltSoapEnvelopeBody $body): void
    {
        $this->body = $body;
    }
}
