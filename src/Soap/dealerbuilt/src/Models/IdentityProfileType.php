<?php

namespace App\Soap\dealerbuilt\src\Models;

/**
 * Class representing IdentityProfileType.
 *
 * XSD Type: IdentityProfile
 */
class IdentityProfileType
{
    /**
     * @var string
     */
    private $address1 = null;

    /**
     * @var string
     */
    private $address2 = null;

    /**
     * @var \DateTime
     */
    private $birthDate = null;

    /**
     * @var string
     */
    private $city = null;

    /**
     * @var string
     */
    private $citySubDivisionName = null;

    /**
     * @var string
     */
    private $country = null;

    /**
     * @var string
     */
    private $county = null;

    /**
     * @var string
     */
    private $emailAddress = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\NameType
     */
    private $personalName = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\PhoneNumberType[]
     */
    private $phoneNumbers = null;

    /**
     * @var string
     */
    private $sex = null;

    /**
     * @var string
     */
    private $spouseAddress1 = null;

    /**
     * @var string
     */
    private $spouseAddress2 = null;

    /**
     * @var string
     */
    private $spouseCity = null;

    /**
     * @var string
     */
    private $spouseCountry = null;

    /**
     * @var string
     */
    private $spouseCounty = null;

    /**
     * @var string
     */
    private $spouseEmailAddress = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\NameType
     */
    private $spouseName = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\PhoneNumberType[]
     */
    private $spousePhoneNumbers = null;

    /**
     * @var string
     */
    private $spouseSsn = null;

    /**
     * @var string
     */
    private $spouseState = null;

    /**
     * @var string
     */
    private $spouseZip = null;

    /**
     * @var string
     */
    private $ssn = null;

    /**
     * @var string
     */
    private $state = null;

    /**
     * @var string
     */
    private $zip = null;

    /**
     * Gets as address1.
     *
     * @return string
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * Sets a new address1.
     *
     * @param string $address1
     *
     * @return self
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;

        return $this;
    }

    /**
     * Gets as address2.
     *
     * @return string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * Sets a new address2.
     *
     * @param string $address2
     *
     * @return self
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;

        return $this;
    }

    /**
     * Gets as birthDate.
     *
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Sets a new birthDate.
     *
     * @param \DateTime $birthDate
     *
     * @return self
     */
    public function setBirthDate(\DateTime $birthDate = null)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Gets as city.
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Sets a new city.
     *
     * @param string $city
     *
     * @return self
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Gets as citySubDivisionName.
     *
     * @return string
     */
    public function getCitySubDivisionName()
    {
        return $this->citySubDivisionName;
    }

    /**
     * Sets a new citySubDivisionName.
     *
     * @param string $citySubDivisionName
     *
     * @return self
     */
    public function setCitySubDivisionName($citySubDivisionName)
    {
        $this->citySubDivisionName = $citySubDivisionName;

        return $this;
    }

    /**
     * Gets as country.
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Sets a new country.
     *
     * @param string $country
     *
     * @return self
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Gets as county.
     *
     * @return string
     */
    public function getCounty()
    {
        return $this->county;
    }

    /**
     * Sets a new county.
     *
     * @param string $county
     *
     * @return self
     */
    public function setCounty($county)
    {
        $this->county = $county;

        return $this;
    }

    /**
     * Gets as emailAddress.
     *
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * Sets a new emailAddress.
     *
     * @param string $emailAddress
     *
     * @return self
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    /**
     * Gets as personalName.
     *
     * @return \App\Soap\dealerbuilt\src\Models\NameType
     */
    public function getPersonalName()
    {
        return $this->personalName;
    }

    /**
     * Sets a new personalName.
     *
     * @param \App\Soap\dealerbuilt\src\Models\NameType $personalName
     *
     * @return self
     */
    public function setPersonalName(NameType $personalName)
    {
        $this->personalName = $personalName;

        return $this;
    }

    /**
     * Adds as phoneNumber.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\PhoneNumberType $phoneNumber
     */
    public function addToPhoneNumbers(PhoneNumberType $phoneNumber)
    {
        $this->phoneNumbers[] = $phoneNumber;

        return $this;
    }

    /**
     * isset phoneNumbers.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPhoneNumbers($index)
    {
        return isset($this->phoneNumbers[$index]);
    }

    /**
     * unset phoneNumbers.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPhoneNumbers($index)
    {
        unset($this->phoneNumbers[$index]);
    }

    /**
     * Gets as phoneNumbers.
     *
     * @return \App\Soap\dealerbuilt\src\Models\PhoneNumberType[]
     */
    public function getPhoneNumbers()
    {
        return $this->phoneNumbers;
    }

    /**
     * Sets a new phoneNumbers.
     *
     * @param \App\Soap\dealerbuilt\src\Models\PhoneNumberType[] $phoneNumbers
     *
     * @return self
     */
    public function setPhoneNumbers(array $phoneNumbers)
    {
        $this->phoneNumbers = $phoneNumbers;

        return $this;
    }

    /**
     * Gets as sex.
     *
     * @return string
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Sets a new sex.
     *
     * @param string $sex
     *
     * @return self
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Gets as spouseAddress1.
     *
     * @return string
     */
    public function getSpouseAddress1()
    {
        return $this->spouseAddress1;
    }

    /**
     * Sets a new spouseAddress1.
     *
     * @param string $spouseAddress1
     *
     * @return self
     */
    public function setSpouseAddress1($spouseAddress1)
    {
        $this->spouseAddress1 = $spouseAddress1;

        return $this;
    }

    /**
     * Gets as spouseAddress2.
     *
     * @return string
     */
    public function getSpouseAddress2()
    {
        return $this->spouseAddress2;
    }

    /**
     * Sets a new spouseAddress2.
     *
     * @param string $spouseAddress2
     *
     * @return self
     */
    public function setSpouseAddress2($spouseAddress2)
    {
        $this->spouseAddress2 = $spouseAddress2;

        return $this;
    }

    /**
     * Gets as spouseCity.
     *
     * @return string
     */
    public function getSpouseCity()
    {
        return $this->spouseCity;
    }

    /**
     * Sets a new spouseCity.
     *
     * @param string $spouseCity
     *
     * @return self
     */
    public function setSpouseCity($spouseCity)
    {
        $this->spouseCity = $spouseCity;

        return $this;
    }

    /**
     * Gets as spouseCountry.
     *
     * @return string
     */
    public function getSpouseCountry()
    {
        return $this->spouseCountry;
    }

    /**
     * Sets a new spouseCountry.
     *
     * @param string $spouseCountry
     *
     * @return self
     */
    public function setSpouseCountry($spouseCountry)
    {
        $this->spouseCountry = $spouseCountry;

        return $this;
    }

    /**
     * Gets as spouseCounty.
     *
     * @return string
     */
    public function getSpouseCounty()
    {
        return $this->spouseCounty;
    }

    /**
     * Sets a new spouseCounty.
     *
     * @param string $spouseCounty
     *
     * @return self
     */
    public function setSpouseCounty($spouseCounty)
    {
        $this->spouseCounty = $spouseCounty;

        return $this;
    }

    /**
     * Gets as spouseEmailAddress.
     *
     * @return string
     */
    public function getSpouseEmailAddress()
    {
        return $this->spouseEmailAddress;
    }

    /**
     * Sets a new spouseEmailAddress.
     *
     * @param string $spouseEmailAddress
     *
     * @return self
     */
    public function setSpouseEmailAddress($spouseEmailAddress)
    {
        $this->spouseEmailAddress = $spouseEmailAddress;

        return $this;
    }

    /**
     * Gets as spouseName.
     *
     * @return \App\Soap\dealerbuilt\src\Models\NameType
     */
    public function getSpouseName()
    {
        return $this->spouseName;
    }

    /**
     * Sets a new spouseName.
     *
     * @param \App\Soap\dealerbuilt\src\Models\NameType $spouseName
     *
     * @return self
     */
    public function setSpouseName(NameType $spouseName)
    {
        $this->spouseName = $spouseName;

        return $this;
    }

    /**
     * Adds as phoneNumber.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\PhoneNumberType $phoneNumber
     */
    public function addToSpousePhoneNumbers(PhoneNumberType $phoneNumber)
    {
        $this->spousePhoneNumbers[] = $phoneNumber;

        return $this;
    }

    /**
     * isset spousePhoneNumbers.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetSpousePhoneNumbers($index)
    {
        return isset($this->spousePhoneNumbers[$index]);
    }

    /**
     * unset spousePhoneNumbers.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetSpousePhoneNumbers($index)
    {
        unset($this->spousePhoneNumbers[$index]);
    }

    /**
     * Gets as spousePhoneNumbers.
     *
     * @return \App\Soap\dealerbuilt\src\Models\PhoneNumberType[]
     */
    public function getSpousePhoneNumbers()
    {
        return $this->spousePhoneNumbers;
    }

    /**
     * Sets a new spousePhoneNumbers.
     *
     * @param \App\Soap\dealerbuilt\src\Models\PhoneNumberType[] $spousePhoneNumbers
     *
     * @return self
     */
    public function setSpousePhoneNumbers(array $spousePhoneNumbers)
    {
        $this->spousePhoneNumbers = $spousePhoneNumbers;

        return $this;
    }

    /**
     * Gets as spouseSsn.
     *
     * @return string
     */
    public function getSpouseSsn()
    {
        return $this->spouseSsn;
    }

    /**
     * Sets a new spouseSsn.
     *
     * @param string $spouseSsn
     *
     * @return self
     */
    public function setSpouseSsn($spouseSsn)
    {
        $this->spouseSsn = $spouseSsn;

        return $this;
    }

    /**
     * Gets as spouseState.
     *
     * @return string
     */
    public function getSpouseState()
    {
        return $this->spouseState;
    }

    /**
     * Sets a new spouseState.
     *
     * @param string $spouseState
     *
     * @return self
     */
    public function setSpouseState($spouseState)
    {
        $this->spouseState = $spouseState;

        return $this;
    }

    /**
     * Gets as spouseZip.
     *
     * @return string
     */
    public function getSpouseZip()
    {
        return $this->spouseZip;
    }

    /**
     * Sets a new spouseZip.
     *
     * @param string $spouseZip
     *
     * @return self
     */
    public function setSpouseZip($spouseZip)
    {
        $this->spouseZip = $spouseZip;

        return $this;
    }

    /**
     * Gets as ssn.
     *
     * @return string
     */
    public function getSsn()
    {
        return $this->ssn;
    }

    /**
     * Sets a new ssn.
     *
     * @param string $ssn
     *
     * @return self
     */
    public function setSsn($ssn)
    {
        $this->ssn = $ssn;

        return $this;
    }

    /**
     * Gets as state.
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Sets a new state.
     *
     * @param string $state
     *
     * @return self
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Gets as zip.
     *
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Sets a new zip.
     *
     * @param string $zip
     *
     * @return self
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }
}
