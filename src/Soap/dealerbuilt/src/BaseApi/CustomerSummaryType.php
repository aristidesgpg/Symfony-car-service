<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing CustomerSummaryType
 *
 * 
 * XSD Type: CustomerSummary
 */
class CustomerSummaryType extends ApiSourceItemType
{

    /**
     * @var string $customerKey
     */
    private $customerKey = null;

    /**
     * @var \DateTime $modifiedStamp
     */
    private $modifiedStamp = null;

    /**
     * Gets as customerKey
     *
     * @return string
     */
    public function getCustomerKey()
    {
        return $this->customerKey;
    }

    /**
     * Sets a new customerKey
     *
     * @param string $customerKey
     * @return self
     */
    public function setCustomerKey($customerKey)
    {
        $this->customerKey = $customerKey;
        return $this;
    }

    /**
     * Gets as modifiedStamp
     *
     * @return \DateTime
     */
    public function getModifiedStamp()
    {
        return $this->modifiedStamp;
    }

    /**
     * Sets a new modifiedStamp
     *
     * @param \DateTime $modifiedStamp
     * @return self
     */
    public function setModifiedStamp(\DateTime $modifiedStamp)
    {
        $this->modifiedStamp = $modifiedStamp;
        return $this;
    }


}

