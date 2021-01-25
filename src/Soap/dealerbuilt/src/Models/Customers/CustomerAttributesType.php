<?php

namespace App\Soap\dealerbuilt\src\Models\Customers;

/**
 * Class representing CustomerAttributesType
 *
 * 
 * XSD Type: CustomerAttributes
 */
class CustomerAttributesType
{

    /**
     * @var bool $allowsEmailContact
     */
    private $allowsEmailContact = null;

    /**
     * @var bool $allowsMailContact
     */
    private $allowsMailContact = null;

    /**
     * @var bool $allowsPhoneContact
     */
    private $allowsPhoneContact = null;

    /**
     * @var bool $allowsSmsContact
     */
    private $allowsSmsContact = null;

    /**
     * @var string $comments
     */
    private $comments = null;

    /**
     * @var string $customerNumber
     */
    private $customerNumber = null;

    /**
     * @var string $customerType
     */
    private $customerType = null;

    /**
     * @var string $driverLicenseNumber
     */
    private $driverLicenseNumber = null;

    /**
     * @var string $driverLicenseState
     */
    private $driverLicenseState = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\IdentityProfileType $identity
     */
    private $identity = null;

    /**
     * @var bool $isDealerToDealer
     */
    private $isDealerToDealer = null;

    /**
     * @var bool $isMarried
     */
    private $isMarried = null;

    /**
     * @var bool $isWholesale
     */
    private $isWholesale = null;

    /**
     * @var \DateTime $lastContactDate
     */
    private $lastContactDate = null;

    /**
     * @var \DateTime $modifiedStamp
     */
    private $modifiedStamp = null;

    /**
     * @var string $spouseName
     */
    private $spouseName = null;

    /**
     * Gets as allowsEmailContact
     *
     * @return bool
     */
    public function getAllowsEmailContact()
    {
        return $this->allowsEmailContact;
    }

    /**
     * Sets a new allowsEmailContact
     *
     * @param bool $allowsEmailContact
     * @return self
     */
    public function setAllowsEmailContact($allowsEmailContact)
    {
        $this->allowsEmailContact = $allowsEmailContact;
        return $this;
    }

    /**
     * Gets as allowsMailContact
     *
     * @return bool
     */
    public function getAllowsMailContact()
    {
        return $this->allowsMailContact;
    }

    /**
     * Sets a new allowsMailContact
     *
     * @param bool $allowsMailContact
     * @return self
     */
    public function setAllowsMailContact($allowsMailContact)
    {
        $this->allowsMailContact = $allowsMailContact;
        return $this;
    }

    /**
     * Gets as allowsPhoneContact
     *
     * @return bool
     */
    public function getAllowsPhoneContact()
    {
        return $this->allowsPhoneContact;
    }

    /**
     * Sets a new allowsPhoneContact
     *
     * @param bool $allowsPhoneContact
     * @return self
     */
    public function setAllowsPhoneContact($allowsPhoneContact)
    {
        $this->allowsPhoneContact = $allowsPhoneContact;
        return $this;
    }

    /**
     * Gets as allowsSmsContact
     *
     * @return bool
     */
    public function getAllowsSmsContact()
    {
        return $this->allowsSmsContact;
    }

    /**
     * Sets a new allowsSmsContact
     *
     * @param bool $allowsSmsContact
     * @return self
     */
    public function setAllowsSmsContact($allowsSmsContact)
    {
        $this->allowsSmsContact = $allowsSmsContact;
        return $this;
    }

    /**
     * Gets as comments
     *
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Sets a new comments
     *
     * @param string $comments
     * @return self
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
        return $this;
    }

    /**
     * Gets as customerNumber
     *
     * @return string
     */
    public function getCustomerNumber()
    {
        return $this->customerNumber;
    }

    /**
     * Sets a new customerNumber
     *
     * @param string $customerNumber
     * @return self
     */
    public function setCustomerNumber($customerNumber)
    {
        $this->customerNumber = $customerNumber;
        return $this;
    }

    /**
     * Gets as customerType
     *
     * @return string
     */
    public function getCustomerType()
    {
        return $this->customerType;
    }

    /**
     * Sets a new customerType
     *
     * @param string $customerType
     * @return self
     */
    public function setCustomerType($customerType)
    {
        $this->customerType = $customerType;
        return $this;
    }

    /**
     * Gets as driverLicenseNumber
     *
     * @return string
     */
    public function getDriverLicenseNumber()
    {
        return $this->driverLicenseNumber;
    }

    /**
     * Sets a new driverLicenseNumber
     *
     * @param string $driverLicenseNumber
     * @return self
     */
    public function setDriverLicenseNumber($driverLicenseNumber)
    {
        $this->driverLicenseNumber = $driverLicenseNumber;
        return $this;
    }

    /**
     * Gets as driverLicenseState
     *
     * @return string
     */
    public function getDriverLicenseState()
    {
        return $this->driverLicenseState;
    }

    /**
     * Sets a new driverLicenseState
     *
     * @param string $driverLicenseState
     * @return self
     */
    public function setDriverLicenseState($driverLicenseState)
    {
        $this->driverLicenseState = $driverLicenseState;
        return $this;
    }

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
     * Gets as isDealerToDealer
     *
     * @return bool
     */
    public function getIsDealerToDealer()
    {
        return $this->isDealerToDealer;
    }

    /**
     * Sets a new isDealerToDealer
     *
     * @param bool $isDealerToDealer
     * @return self
     */
    public function setIsDealerToDealer($isDealerToDealer)
    {
        $this->isDealerToDealer = $isDealerToDealer;
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
     * Gets as isWholesale
     *
     * @return bool
     */
    public function getIsWholesale()
    {
        return $this->isWholesale;
    }

    /**
     * Sets a new isWholesale
     *
     * @param bool $isWholesale
     * @return self
     */
    public function setIsWholesale($isWholesale)
    {
        $this->isWholesale = $isWholesale;
        return $this;
    }

    /**
     * Gets as lastContactDate
     *
     * @return \DateTime
     */
    public function getLastContactDate()
    {
        return $this->lastContactDate;
    }

    /**
     * Sets a new lastContactDate
     *
     * @param \DateTime $lastContactDate
     * @return self
     */
    public function setLastContactDate(\DateTime $lastContactDate = null)
    {
        $this->lastContactDate = $lastContactDate;
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
    public function setModifiedStamp(\DateTime $modifiedStamp = null)
    {
        $this->modifiedStamp = $modifiedStamp;
        return $this;
    }

    /**
     * Gets as spouseName
     *
     * @return string
     */
    public function getSpouseName()
    {
        return $this->spouseName;
    }

    /**
     * Sets a new spouseName
     *
     * @param string $spouseName
     * @return self
     */
    public function setSpouseName($spouseName)
    {
        $this->spouseName = $spouseName;
        return $this;
    }


}

