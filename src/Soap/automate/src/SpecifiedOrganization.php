<?php

namespace App\Soap\automate\src;

/**
 * Class representing SpecifiedOrganization
 */
class SpecifiedOrganization
{

    /**
     * @var string $companyName
     */
    private $companyName = null;

    /**
     * @var \App\Soap\automate\src\PrimaryContact $primaryContact
     */
    private $primaryContact = null;

    /**
     * @var \App\Soap\automate\src\PostalAddress $postalAddress
     */
    private $postalAddress = null;

    /**
     * Gets as companyName
     *
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * Sets a new companyName
     *
     * @param string $companyName
     * @return self
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
        return $this;
    }

    /**
     * Gets as primaryContact
     *
     * @return \App\Soap\automate\src\PrimaryContact
     */
    public function getPrimaryContact()
    {
        return $this->primaryContact;
    }

    /**
     * Sets a new primaryContact
     *
     * @param \App\Soap\automate\src\PrimaryContact $primaryContact
     * @return self
     */
    public function setPrimaryContact(\App\Soap\automate\src\PrimaryContact $primaryContact)
    {
        $this->primaryContact = $primaryContact;
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

