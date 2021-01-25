<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ProspectPushRequestType.
 *
 * XSD Type: ProspectPushRequest
 */
class ProspectPushRequestType
{
    /**
     * @var string
     */
    private $advertisingSource = null;

    /**
     * @var string
     */
    private $customerKey = null;

    /**
     * @var string
     */
    private $dealKey = null;

    /**
     * @var string
     */
    private $externalProspectId = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\IdentityProfileType
     */
    private $identity = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\DriversLicenseType
     */
    private $license = null;

    /**
     * @var string
     */
    private $prospectSource = null;

    /**
     * @var string
     */
    private $salesNumber = null;

    /**
     * @var int
     */
    private $storeId = null;

    /**
     * Gets as advertisingSource.
     *
     * @return string
     */
    public function getAdvertisingSource()
    {
        return $this->advertisingSource;
    }

    /**
     * Sets a new advertisingSource.
     *
     * @param string $advertisingSource
     *
     * @return self
     */
    public function setAdvertisingSource($advertisingSource)
    {
        $this->advertisingSource = $advertisingSource;

        return $this;
    }

    /**
     * Gets as customerKey.
     *
     * @return string
     */
    public function getCustomerKey()
    {
        return $this->customerKey;
    }

    /**
     * Sets a new customerKey.
     *
     * @param string $customerKey
     *
     * @return self
     */
    public function setCustomerKey($customerKey)
    {
        $this->customerKey = $customerKey;

        return $this;
    }

    /**
     * Gets as dealKey.
     *
     * @return string
     */
    public function getDealKey()
    {
        return $this->dealKey;
    }

    /**
     * Sets a new dealKey.
     *
     * @param string $dealKey
     *
     * @return self
     */
    public function setDealKey($dealKey)
    {
        $this->dealKey = $dealKey;

        return $this;
    }

    /**
     * Gets as externalProspectId.
     *
     * @return string
     */
    public function getExternalProspectId()
    {
        return $this->externalProspectId;
    }

    /**
     * Sets a new externalProspectId.
     *
     * @param string $externalProspectId
     *
     * @return self
     */
    public function setExternalProspectId($externalProspectId)
    {
        $this->externalProspectId = $externalProspectId;

        return $this;
    }

    /**
     * Gets as identity.
     *
     * @return \App\Soap\dealerbuilt\src\Models\IdentityProfileType
     */
    public function getIdentity()
    {
        return $this->identity;
    }

    /**
     * Sets a new identity.
     *
     * @return self
     */
    public function setIdentity(\App\Soap\dealerbuilt\src\Models\IdentityProfileType $identity)
    {
        $this->identity = $identity;

        return $this;
    }

    /**
     * Gets as license.
     *
     * @return \App\Soap\dealerbuilt\src\Models\DriversLicenseType
     */
    public function getLicense()
    {
        return $this->license;
    }

    /**
     * Sets a new license.
     *
     * @return self
     */
    public function setLicense(\App\Soap\dealerbuilt\src\Models\DriversLicenseType $license)
    {
        $this->license = $license;

        return $this;
    }

    /**
     * Gets as prospectSource.
     *
     * @return string
     */
    public function getProspectSource()
    {
        return $this->prospectSource;
    }

    /**
     * Sets a new prospectSource.
     *
     * @param string $prospectSource
     *
     * @return self
     */
    public function setProspectSource($prospectSource)
    {
        $this->prospectSource = $prospectSource;

        return $this;
    }

    /**
     * Gets as salesNumber.
     *
     * @return string
     */
    public function getSalesNumber()
    {
        return $this->salesNumber;
    }

    /**
     * Sets a new salesNumber.
     *
     * @param string $salesNumber
     *
     * @return self
     */
    public function setSalesNumber($salesNumber)
    {
        $this->salesNumber = $salesNumber;

        return $this;
    }

    /**
     * Gets as storeId.
     *
     * @return int
     */
    public function getStoreId()
    {
        return $this->storeId;
    }

    /**
     * Sets a new storeId.
     *
     * @param int $storeId
     *
     * @return self
     */
    public function setStoreId($storeId)
    {
        $this->storeId = $storeId;

        return $this;
    }
}
