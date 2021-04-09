<?php


namespace App\Soap\cdk\src;


class CDKPartsSoapEnvelope
{
    /**
     * @var \App\Soap\cdk\src\CDKPartsSoapEnvelopeBody $body
     */
    private $body = null;


    /**
     * @return CDKPartsSoapEnvelopeBody
     */
    public function getBody(): ?CDKPartsSoapEnvelopeBody
    {
        return $this->body;
    }

    /**
     * @param CDKPartsSoapEnvelopeBody|null $body
     */
    public function setBody(?CDKPartsSoapEnvelopeBody $body): void
    {
        $this->body = $body;
    }





}