<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullOemServiceProfile
 */
class PullOemServiceProfile
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\VehicleInquiryType $inquiry
     */
    private $inquiry = null;

    /**
     * Gets as inquiry
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\VehicleInquiryType
     */
    public function getInquiry()
    {
        return $this->inquiry;
    }

    /**
     * Sets a new inquiry
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\VehicleInquiryType $inquiry
     * @return self
     */
    public function setInquiry(\App\Soap\dealerbuilt\src\BaseApi\VehicleInquiryType $inquiry)
    {
        $this->inquiry = $inquiry;
        return $this;
    }


}

