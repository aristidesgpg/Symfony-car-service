<?php

namespace App\Soap\automate\src;

/**
 * Class representing ServiceTechnicianParty
 */
class ServiceTechnicianParty
{

    /**
     * @var string $dealerManagementSystemID
     */
    private $dealerManagementSystemID = null;

    /**
     * @var \App\Soap\automate\src\SpecifiedPerson $specifiedPerson
     */
    private $specifiedPerson = null;

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


}

