<?php

namespace App\Soap\dealerbuilt\src\Models\Sales;

/**
 * Class representing StoreSetupAttributesType
 *
 * 
 * XSD Type: StoreSetupAttributes
 */
class StoreSetupAttributesType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\AddressType $address
     */
    private $address = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\PhoneNumberType $faxNumber
     */
    private $faxNumber = null;

    /**
     * @var string $legalName
     */
    private $legalName = null;

    /**
     * @var string $operatingName
     */
    private $operatingName = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\PhoneNumberType $phoneNumber
     */
    private $phoneNumber = null;

    /**
     * @var string[] $prospectAdvertisingSources
     */
    private $prospectAdvertisingSources = null;

    /**
     * @var string[] $prospectSources
     */
    private $prospectSources = null;

    /**
     * @var float $timeZoneOffset
     */
    private $timeZoneOffset = null;

    /**
     * Gets as address
     *
     * @return \App\Soap\dealerbuilt\src\Models\AddressType
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Sets a new address
     *
     * @param \App\Soap\dealerbuilt\src\Models\AddressType $address
     * @return self
     */
    public function setAddress(\App\Soap\dealerbuilt\src\Models\AddressType $address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * Gets as faxNumber
     *
     * @return \App\Soap\dealerbuilt\src\Models\PhoneNumberType
     */
    public function getFaxNumber()
    {
        return $this->faxNumber;
    }

    /**
     * Sets a new faxNumber
     *
     * @param \App\Soap\dealerbuilt\src\Models\PhoneNumberType $faxNumber
     * @return self
     */
    public function setFaxNumber(\App\Soap\dealerbuilt\src\Models\PhoneNumberType $faxNumber)
    {
        $this->faxNumber = $faxNumber;
        return $this;
    }

    /**
     * Gets as legalName
     *
     * @return string
     */
    public function getLegalName()
    {
        return $this->legalName;
    }

    /**
     * Sets a new legalName
     *
     * @param string $legalName
     * @return self
     */
    public function setLegalName($legalName)
    {
        $this->legalName = $legalName;
        return $this;
    }

    /**
     * Gets as operatingName
     *
     * @return string
     */
    public function getOperatingName()
    {
        return $this->operatingName;
    }

    /**
     * Sets a new operatingName
     *
     * @param string $operatingName
     * @return self
     */
    public function setOperatingName($operatingName)
    {
        $this->operatingName = $operatingName;
        return $this;
    }

    /**
     * Gets as phoneNumber
     *
     * @return \App\Soap\dealerbuilt\src\Models\PhoneNumberType
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Sets a new phoneNumber
     *
     * @param \App\Soap\dealerbuilt\src\Models\PhoneNumberType $phoneNumber
     * @return self
     */
    public function setPhoneNumber(\App\Soap\dealerbuilt\src\Models\PhoneNumberType $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    /**
     * Adds as string
     *
     * @return self
     * @param string $string
     */
    public function addToProspectAdvertisingSources($string)
    {
        $this->prospectAdvertisingSources[] = $string;
        return $this;
    }

    /**
     * isset prospectAdvertisingSources
     *
     * @param int|string $index
     * @return bool
     */
    public function issetProspectAdvertisingSources($index)
    {
        return isset($this->prospectAdvertisingSources[$index]);
    }

    /**
     * unset prospectAdvertisingSources
     *
     * @param int|string $index
     * @return void
     */
    public function unsetProspectAdvertisingSources($index)
    {
        unset($this->prospectAdvertisingSources[$index]);
    }

    /**
     * Gets as prospectAdvertisingSources
     *
     * @return string[]
     */
    public function getProspectAdvertisingSources()
    {
        return $this->prospectAdvertisingSources;
    }

    /**
     * Sets a new prospectAdvertisingSources
     *
     * @param string[] $prospectAdvertisingSources
     * @return self
     */
    public function setProspectAdvertisingSources(array $prospectAdvertisingSources)
    {
        $this->prospectAdvertisingSources = $prospectAdvertisingSources;
        return $this;
    }

    /**
     * Adds as string
     *
     * @return self
     * @param string $string
     */
    public function addToProspectSources($string)
    {
        $this->prospectSources[] = $string;
        return $this;
    }

    /**
     * isset prospectSources
     *
     * @param int|string $index
     * @return bool
     */
    public function issetProspectSources($index)
    {
        return isset($this->prospectSources[$index]);
    }

    /**
     * unset prospectSources
     *
     * @param int|string $index
     * @return void
     */
    public function unsetProspectSources($index)
    {
        unset($this->prospectSources[$index]);
    }

    /**
     * Gets as prospectSources
     *
     * @return string[]
     */
    public function getProspectSources()
    {
        return $this->prospectSources;
    }

    /**
     * Sets a new prospectSources
     *
     * @param string[] $prospectSources
     * @return self
     */
    public function setProspectSources(array $prospectSources)
    {
        $this->prospectSources = $prospectSources;
        return $this;
    }

    /**
     * Gets as timeZoneOffset
     *
     * @return float
     */
    public function getTimeZoneOffset()
    {
        return $this->timeZoneOffset;
    }

    /**
     * Sets a new timeZoneOffset
     *
     * @param float $timeZoneOffset
     * @return self
     */
    public function setTimeZoneOffset($timeZoneOffset)
    {
        $this->timeZoneOffset = $timeZoneOffset;
        return $this;
    }


}

