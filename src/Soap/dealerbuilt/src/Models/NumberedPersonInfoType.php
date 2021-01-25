<?php

namespace App\Soap\dealerbuilt\src\Models;

/**
 * Class representing NumberedPersonInfoType.
 *
 * XSD Type: NumberedPersonInfo
 */
class NumberedPersonInfoType
{
    /**
     * @var string
     */
    private $eventDescription = null;

    /**
     * @var string
     */
    private $eventID = null;

    /**
     * @var \DateTime
     */
    private $eventOccurrenceDateTime = null;

    /**
     * @var string
     */
    private $factoryID = null;

    /**
     * @var bool
     */
    private $isActive = null;

    /**
     * @var string
     */
    private $number = null;

    /**
     * @var string
     */
    private $otherId = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\NameType
     */
    private $personalName = null;

    /**
     * @var string
     */
    private $specialRemarksDescription = null;

    /**
     * @var string
     */
    private $ssn = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\AddressType
     */
    private $streetAddress = null;

    /**
     * @var string
     */
    private $username = null;

    /**
     * Gets as eventDescription.
     *
     * @return string
     */
    public function getEventDescription()
    {
        return $this->eventDescription;
    }

    /**
     * Sets a new eventDescription.
     *
     * @param string $eventDescription
     *
     * @return self
     */
    public function setEventDescription($eventDescription)
    {
        $this->eventDescription = $eventDescription;

        return $this;
    }

    /**
     * Gets as eventID.
     *
     * @return string
     */
    public function getEventID()
    {
        return $this->eventID;
    }

    /**
     * Sets a new eventID.
     *
     * @param string $eventID
     *
     * @return self
     */
    public function setEventID($eventID)
    {
        $this->eventID = $eventID;

        return $this;
    }

    /**
     * Gets as eventOccurrenceDateTime.
     *
     * @return \DateTime
     */
    public function getEventOccurrenceDateTime()
    {
        return $this->eventOccurrenceDateTime;
    }

    /**
     * Sets a new eventOccurrenceDateTime.
     *
     * @param \DateTime $eventOccurrenceDateTime
     *
     * @return self
     */
    public function setEventOccurrenceDateTime(\DateTime $eventOccurrenceDateTime = null)
    {
        $this->eventOccurrenceDateTime = $eventOccurrenceDateTime;

        return $this;
    }

    /**
     * Gets as factoryID.
     *
     * @return string
     */
    public function getFactoryID()
    {
        return $this->factoryID;
    }

    /**
     * Sets a new factoryID.
     *
     * @param string $factoryID
     *
     * @return self
     */
    public function setFactoryID($factoryID)
    {
        $this->factoryID = $factoryID;

        return $this;
    }

    /**
     * Gets as isActive.
     *
     * @return bool
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Sets a new isActive.
     *
     * @param bool $isActive
     *
     * @return self
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Gets as number.
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Sets a new number.
     *
     * @param string $number
     *
     * @return self
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Gets as otherId.
     *
     * @return string
     */
    public function getOtherId()
    {
        return $this->otherId;
    }

    /**
     * Sets a new otherId.
     *
     * @param string $otherId
     *
     * @return self
     */
    public function setOtherId($otherId)
    {
        $this->otherId = $otherId;

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
     * Gets as specialRemarksDescription.
     *
     * @return string
     */
    public function getSpecialRemarksDescription()
    {
        return $this->specialRemarksDescription;
    }

    /**
     * Sets a new specialRemarksDescription.
     *
     * @param string $specialRemarksDescription
     *
     * @return self
     */
    public function setSpecialRemarksDescription($specialRemarksDescription)
    {
        $this->specialRemarksDescription = $specialRemarksDescription;

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
     * Gets as streetAddress.
     *
     * @return \App\Soap\dealerbuilt\src\Models\AddressType
     */
    public function getStreetAddress()
    {
        return $this->streetAddress;
    }

    /**
     * Sets a new streetAddress.
     *
     * @param \App\Soap\dealerbuilt\src\Models\AddressType $streetAddress
     *
     * @return self
     */
    public function setStreetAddress(AddressType $streetAddress)
    {
        $this->streetAddress = $streetAddress;

        return $this;
    }

    /**
     * Gets as username.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Sets a new username.
     *
     * @param string $username
     *
     * @return self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }
}
