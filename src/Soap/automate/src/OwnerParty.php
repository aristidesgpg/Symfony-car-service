<?php

namespace App\Soap\automate\src;

/**
 * Class representing OwnerParty
 */
class OwnerParty
{

    /**
     * @var int $partyID
     */
    private $partyID = null;

    /**
     * @var string $dealerManagementSystemID
     */
    private $dealerManagementSystemID = null;

    /**
     * @var \App\Soap\automate\src\AlternatePartyDocument[] $alternatePartyDocument
     */
    private $alternatePartyDocument = [
        
    ];

    /**
     * @var \App\Soap\automate\src\SpecifiedPerson $specifiedPerson
     */
    private $specifiedPerson = null;

    /**
     * @var \App\Soap\automate\src\SpecifiedOrganization $specifiedOrganization
     */
    private $specifiedOrganization = null;

    /**
     * @var \App\Soap\automate\src\Privacy $privacy
     */
    private $privacy = null;

    /**
     * Gets as partyID
     *
     * @return int
     */
    public function getPartyID()
    {
        return $this->partyID;
    }

    /**
     * Sets a new partyID
     *
     * @param int $partyID
     * @return self
     */
    public function setPartyID($partyID)
    {
        $this->partyID = $partyID;
        return $this;
    }

    /**
     * Gets as dealerManagementSystemID
     *
     * @return string
     */
    public function getDealerManagementSystemID()
    {
        return $this->dealerManagementSystemID;
    }

    /**
     * Sets a new dealerManagementSystemID
     *
     * @param string $dealerManagementSystemID
     * @return self
     */
    public function setDealerManagementSystemID($dealerManagementSystemID)
    {
        $this->dealerManagementSystemID = $dealerManagementSystemID;
        return $this;
    }

    /**
     * Adds as alternatePartyDocument
     *
     * @return self
     * @param \App\Soap\automate\src\AlternatePartyDocument $alternatePartyDocument
     */
    public function addToAlternatePartyDocument(\App\Soap\automate\src\AlternatePartyDocument $alternatePartyDocument)
    {
        $this->alternatePartyDocument[] = $alternatePartyDocument;
        return $this;
    }

    /**
     * isset alternatePartyDocument
     *
     * @param int|string $index
     * @return bool
     */
    public function issetAlternatePartyDocument($index)
    {
        return isset($this->alternatePartyDocument[$index]);
    }

    /**
     * unset alternatePartyDocument
     *
     * @param int|string $index
     * @return void
     */
    public function unsetAlternatePartyDocument($index)
    {
        unset($this->alternatePartyDocument[$index]);
    }

    /**
     * Gets as alternatePartyDocument
     *
     * @return \App\Soap\automate\src\AlternatePartyDocument[]
     */
    public function getAlternatePartyDocument()
    {
        return $this->alternatePartyDocument;
    }

    /**
     * Sets a new alternatePartyDocument
     *
     * @param \App\Soap\automate\src\AlternatePartyDocument[] $alternatePartyDocument
     * @return self
     */
    public function setAlternatePartyDocument(array $alternatePartyDocument)
    {
        $this->alternatePartyDocument = $alternatePartyDocument;
        return $this;
    }

    /**
     * Gets as specifiedPerson
     *
     * @return \App\Soap\automate\src\SpecifiedPerson
     */
    public function getSpecifiedPerson()
    {
        return $this->specifiedPerson;
    }

    /**
     * Sets a new specifiedPerson
     *
     * @param \App\Soap\automate\src\SpecifiedPerson $specifiedPerson
     * @return self
     */
    public function setSpecifiedPerson(\App\Soap\automate\src\SpecifiedPerson $specifiedPerson)
    {
        $this->specifiedPerson = $specifiedPerson;
        return $this;
    }

    /**
     * Gets as specifiedOrganization
     *
     * @return \App\Soap\automate\src\SpecifiedOrganization
     */
    public function getSpecifiedOrganization()
    {
        return $this->specifiedOrganization;
    }

    /**
     * Sets a new specifiedOrganization
     *
     * @param \App\Soap\automate\src\SpecifiedOrganization $specifiedOrganization
     * @return self
     */
    public function setSpecifiedOrganization(\App\Soap\automate\src\SpecifiedOrganization $specifiedOrganization)
    {
        $this->specifiedOrganization = $specifiedOrganization;
        return $this;
    }

    /**
     * Gets as privacy
     *
     * @return \App\Soap\automate\src\Privacy
     */
    public function getPrivacy()
    {
        return $this->privacy;
    }

    /**
     * Sets a new privacy
     *
     * @param \App\Soap\automate\src\Privacy $privacy
     * @return self
     */
    public function setPrivacy(\App\Soap\automate\src\Privacy $privacy)
    {
        $this->privacy = $privacy;
        return $this;
    }


}

