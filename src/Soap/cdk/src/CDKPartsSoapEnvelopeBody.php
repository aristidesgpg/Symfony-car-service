<?php


namespace App\Soap\cdk\src;


class CDKPartsSoapEnvelopeBody
{

    /**
     * @var \App\Soap\cdk\src\PartsPricingResponse  $partsPricingResponse
     */
    private $partsPricingResponse;

    /**
     * @return PartsPricingResponse
     */
    public function getPartsPricingResponse(): PartsPricingResponse
    {
        return $this->partsPricingResponse;
    }

    /**
     * @param PartsPricingResponse $partsPricingResponse
     */
    public function setPartsPricingResponse(PartsPricingResponse $partsPricingResponse): void
    {
        $this->partsPricingResponse = $partsPricingResponse;
    }





}