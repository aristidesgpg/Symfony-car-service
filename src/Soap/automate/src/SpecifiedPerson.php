<?php

namespace App\Soap\automate\src;

/**
 * Class representing SpecifiedPerson
 */
class SpecifiedPerson
{

    /**
     * @var string $givenName
     */
    private $givenName = null;

    /**
     * @var string $middleName
     */
    private $middleName = null;

    /**
     * @var string $familyName
     */
    private $familyName = null;

    /**
     * @var string $birthDate
     */
    private $birthDate = null;

    /**
     * @var \App\Soap\automate\src\ResidenceAddress $residenceAddress
     */
    private $residenceAddress = null;

    /**
     * @var \App\Soap\automate\src\TelephoneCommunication[] $telephoneCommunication
     */
    private $telephoneCommunication = [
        
    ];

    /**
     * @var \App\Soap\automate\src\PostalAddress $postalAddress
     */
    private $postalAddress = null;

    /**
     * Gets as givenName
     *
     * @return string
     */
    public function getGivenName()
    {
        return $this->givenName;
    }

    /**
     * Sets a new givenName
     *
     * @param string $givenName
     * @return self
     */
    public function setGivenName($givenName)
    {
        $this->givenName = $givenName;
        return $this;
    }

    /**
     * Gets as middleName
     *
     * @return string
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * Sets a new middleName
     *
     * @param string $middleName
     * @return self
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;
        return $this;
    }

    /**
     * Gets as familyName
     *
     * @return string
     */
    public function getFamilyName()
    {
        return $this->familyName;
    }

    /**
     * Sets a new familyName
     *
     * @param string $familyName
     * @return self
     */
    public function setFamilyName($familyName)
    {
        $this->familyName = $familyName;
        return $this;
    }

    /**
     * Gets as birthDate
     *
     * @return string
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Sets a new birthDate
     *
     * @param string $birthDate
     * @return self
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
        return $this;
    }

    /**
     * Gets as residenceAddress
     *
     * @return \App\Soap\automate\src\ResidenceAddress
     */
    public function getResidenceAddress()
    {
        return $this->residenceAddress;
    }

    /**
     * Sets a new residenceAddress
     *
     * @param \App\Soap\automate\src\ResidenceAddress $residenceAddress
     * @return self
     */
    public function setResidenceAddress(\App\Soap\automate\src\ResidenceAddress $residenceAddress)
    {
        $this->residenceAddress = $residenceAddress;
        return $this;
    }

    /**
     * Adds as telephoneCommunication
     *
     * @return self
     * @param \App\Soap\automate\src\TelephoneCommunication $telephoneCommunication
     */
    public function addToTelephoneCommunication(\App\Soap\automate\src\TelephoneCommunication $telephoneCommunication)
    {
        $this->telephoneCommunication[] = $telephoneCommunication;
        return $this;
    }

    /**
     * isset telephoneCommunication
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTelephoneCommunication($index)
    {
        return isset($this->telephoneCommunication[$index]);
    }

    /**
     * unset telephoneCommunication
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTelephoneCommunication($index)
    {
        unset($this->telephoneCommunication[$index]);
    }

    /**
     * Gets as telephoneCommunication
     *
     * @return \App\Soap\automate\src\TelephoneCommunication[]
     */
    public function getTelephoneCommunication()
    {
        return $this->telephoneCommunication;
    }

    /**
     * Sets a new telephoneCommunication
     *
     * @param \App\Soap\automate\src\TelephoneCommunication[] $telephoneCommunication
     * @return self
     */
    public function setTelephoneCommunication($telephoneCommunication)
    {
        $this->telephoneCommunication = $telephoneCommunication;
        return $this;
    }

    /**
     * Gets as postalAddress
     *
     * @return \App\Soap\automate\src\PostalAddress
     */
    public function getPostalAddress()
    {
        return $this->postalAddress;
    }

    /**
     * Sets a new postalAddress
     *
     * @param \App\Soap\automate\src\PostalAddress $postalAddress
     * @return self
     */
    public function setPostalAddress(\App\Soap\automate\src\PostalAddress $postalAddress)
    {
        $this->postalAddress = $postalAddress;
        return $this;
    }


}

