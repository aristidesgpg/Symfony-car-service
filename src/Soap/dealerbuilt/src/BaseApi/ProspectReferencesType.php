<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ProspectReferencesType
 *
 * 
 * XSD Type: ProspectReferences
 */
class ProspectReferencesType
{

    /**
     * @var string $customerKey
     */
    private $customerKey = null;

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


}

