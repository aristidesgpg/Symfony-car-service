<?php


namespace App\Soap\dealerbuilt\src;


class DealerBuiltSoapEnvelopeEstimateJobCodes
{
    /**
     * @var \App\Soap\dealerbuilt\src\DealerBuiltSoapEnvelopeHeaderEstimateJobCodes $header
     */
    private $header = null;


    /**
     * @var \App\Soap\dealerbuilt\src\DealerBuiltSoapEnvelopeBodyEstimateJobCodes $body
     */
    private $body = null;

    /**
     * @return DealerBuiltSoapEnvelopeHeaderEstimateJobCodes
     */
    public function getHeader(): ?DealerBuiltSoapEnvelopeHeaderEstimateJobCodes
    {
        return $this->header;
    }

    /**
     * @param DealerBuiltSoapEnvelopeHeaderEstimateJobCodes|null $header
     */
    public function setHeader(?DealerBuiltSoapEnvelopeHeaderEstimateJobCodes $header): void
    {
        $this->header = $header;
    }

    /**
     * @return DealerBuiltSoapEnvelopeBodyEstimateJobCodes
     */
    public function getBody(): ?DealerBuiltSoapEnvelopeBodyEstimateJobCodes
    {
        return $this->body;
    }

    /**
     * @param DealerBuiltSoapEnvelopeBodyEstimateJobCodes|null $body
     */
    public function setBody(?DealerBuiltSoapEnvelopeBodyEstimateJobCodes $body): void
    {
        $this->body = $body;
    }

}