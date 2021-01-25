<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullOemServiceProfiles.
 */
class PullOemServiceProfiles
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\VehiclesInquiryType
     */
    private $inquiry = null;

    /**
     * Gets as inquiry.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\VehiclesInquiryType
     */
    public function getInquiry()
    {
        return $this->inquiry;
    }

    /**
     * Sets a new inquiry.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\VehiclesInquiryType $inquiry
     *
     * @return self
     */
    public function setInquiry(BaseApi\VehiclesInquiryType $inquiry)
    {
        $this->inquiry = $inquiry;

        return $this;
    }
}
