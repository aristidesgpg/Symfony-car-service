<?php

namespace App\Soap\dealerbuilt\src\Models\Sales;

/**
 * Class representing CobuyerInfoType
 *
 * 
 * XSD Type: CobuyerInfo
 */
class CobuyerInfoType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\IdentityProfileType $identity
     */
    private $identity = null;

    /**
     * @var bool $isMarried
     */
    private $isMarried = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\DriversLicenseType $license
     */
    private $license = null;

    /**
     * @var string $relationshipType
     */
    private $relationshipType = null;

    /**
     * Gets as identity
     *
     * @return \App\Soap\dealerbuilt\src\Models\IdentityProfileType
     */
    public function getIdentity()
    {
        return $this->identity;
    }

    /**
     * Sets a new identity
     *
     * @param \App\Soap\dealerbuilt\src\Models\IdentityProfileType $identity
     * @return self
     */
    public function setIdentity(\App\Soap\dealerbuilt\src\Models\IdentityProfileType $identity)
    {
        $this->identity = $identity;
        return $this;
    }

    /**
     * Gets as isMarried
     *
     * @return bool
     */
    public function getIsMarried()
    {
        return $this->isMarried;
    }

    /**
     * Sets a new isMarried
     *
     * @param bool $isMarried
     * @return self
     */
    public function setIsMarried($isMarried)
    {
        $this->isMarried = $isMarried;
        return $this;
    }

    /**
     * Gets as license
     *
     * @return \App\Soap\dealerbuilt\src\Models\DriversLicenseType
     */
    public function getLicense()
    {
        return $this->license;
    }

    /**
     * Sets a new license
     *
     * @param \App\Soap\dealerbuilt\src\Models\DriversLicenseType $license
     * @return self
     */
    public function setLicense(\App\Soap\dealerbuilt\src\Models\DriversLicenseType $license)
    {
        $this->license = $license;
        return $this;
    }

    /**
     * Gets as relationshipType
     *
     * @return string
     */
    public function getRelationshipType()
    {
        return $this->relationshipType;
    }

    /**
     * Sets a new relationshipType
     *
     * @param string $relationshipType
     * @return self
     */
    public function setRelationshipType($relationshipType)
    {
        $this->relationshipType = $relationshipType;
        return $this;
    }


}

