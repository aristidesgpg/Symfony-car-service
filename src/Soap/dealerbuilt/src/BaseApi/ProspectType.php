<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ProspectType.
 *
 * XSD Type: Prospect
 */
class ProspectType extends ApiStoreItemType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\IdentityProfileType
     */
    private $attributes = null;

    /**
     * @var string
     */
    private $dealKey = null;

    /**
     * @var string
     */
    private $driverLicenseNumber = null;

    /**
     * @var string
     */
    private $errorMessage = null;

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ProspectReferencesType
     */
    private $references = null;

    /**
     * @var string
     */
    private $upsource = null;

    /**
     * Gets as attributes.
     *
     * @return \App\Soap\dealerbuilt\src\Models\IdentityProfileType
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Sets a new attributes.
     *
     * @return self
     */
    public function setAttributes(\App\Soap\dealerbuilt\src\Models\IdentityProfileType $attributes)
    {
        $this->attributes = $attributes;

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
     * Gets as driverLicenseNumber.
     *
     * @return string
     */
    public function getDriverLicenseNumber()
    {
        return $this->driverLicenseNumber;
    }

    /**
     * Sets a new driverLicenseNumber.
     *
     * @param string $driverLicenseNumber
     *
     * @return self
     */
    public function setDriverLicenseNumber($driverLicenseNumber)
    {
        $this->driverLicenseNumber = $driverLicenseNumber;

        return $this;
    }

    /**
     * Gets as errorMessage.
     *
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * Sets a new errorMessage.
     *
     * @param string $errorMessage
     *
     * @return self
     */
    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;

        return $this;
    }

    /**
     * Gets as references.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ProspectReferencesType
     */
    public function getReferences()
    {
        return $this->references;
    }

    /**
     * Sets a new references.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ProspectReferencesType $references
     *
     * @return self
     */
    public function setReferences(ProspectReferencesType $references)
    {
        $this->references = $references;

        return $this;
    }

    /**
     * Gets as upsource.
     *
     * @return string
     */
    public function getUpsource()
    {
        return $this->upsource;
    }

    /**
     * Sets a new upsource.
     *
     * @param string $upsource
     *
     * @return self
     */
    public function setUpsource($upsource)
    {
        $this->upsource = $upsource;

        return $this;
    }
}
