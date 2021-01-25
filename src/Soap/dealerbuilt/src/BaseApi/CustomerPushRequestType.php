<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing CustomerPushRequestType
 *
 * 
 * XSD Type: CustomerPushRequest
 */
class CustomerPushRequestType
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
     * @var string $customerKey
     */
    private $customerKey = null;

    /**
     * @var string $externalCustomerId
     */
    private $externalCustomerId = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\IdentityProfileType $identity
     */
    private $identity = null;

    /**
     * @var bool $isWholesale
     */
    private $isWholesale = null;

    /**
     * @var int $sourceId
     */
    private $sourceId = null;

    /**
     * @var string $spouseName
     */
    private $spouseName = null;

    /**
     * @var int $userStoreId
     */
    private $userStoreId = null;

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
     * Gets as externalCustomerId
     *
     * @return string
     */
    public function getExternalCustomerId()
    {
        return $this->externalCustomerId;
    }

    /**
     * Sets a new externalCustomerId
     *
     * @param string $externalCustomerId
     * @return self
     */
    public function setExternalCustomerId($externalCustomerId)
    {
        $this->externalCustomerId = $externalCustomerId;
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
     * Gets as sourceId
     *
     * @return int
     */
    public function getSourceId()
    {
        return $this->sourceId;
    }

    /**
     * Sets a new sourceId
     *
     * @param int $sourceId
     * @return self
     */
    public function setSourceId($sourceId)
    {
        $this->sourceId = $sourceId;
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

    /**
     * Gets as userStoreId
     *
     * @return int
     */
    public function getUserStoreId()
    {
        return $this->userStoreId;
    }

    /**
     * Sets a new userStoreId
     *
     * @param int $userStoreId
     * @return self
     */
    public function setUserStoreId($userStoreId)
    {
        $this->userStoreId = $userStoreId;
        return $this;
    }


}

