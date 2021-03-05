<?php

namespace App\Soap\dealerbuilt\src\Models;

/**
 * Class representing AddressType
 *
 * 
 * XSD Type: Address
 */
class AddressType
{

    /**
     * @var string $city
     */
    private $city = null;

    /**
     * @var string $country
     */
    private $country = null;

    /**
     * @var string $county
     */
    private $county = null;

    /**
     * @var string $line1
     */
    private $line1 = null;

    /**
     * @var string $line2
     */
    private $line2 = null;

    /**
     * @var string $state
     */
    private $state = null;

    /**
     * @var string $zip
     */
    private $zip = null;

    /**
     * Gets as city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Sets a new city
     *
     * @param string $city
     * @return self
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * Gets as country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Sets a new country
     *
     * @param string $country
     * @return self
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * Gets as county
     *
     * @return string
     */
    public function getCounty()
    {
        return $this->county;
    }

    /**
     * Sets a new county
     *
     * @param string $county
     * @return self
     */
    public function setCounty($county)
    {
        $this->county = $county;
        return $this;
    }

    /**
     * Gets as line1
     *
     * @return string
     */
    public function getLine1()
    {
        return $this->line1;
    }

    /**
     * Sets a new line1
     *
     * @param string $line1
     * @return self
     */
    public function setLine1($line1)
    {
        $this->line1 = $line1;
        return $this;
    }

    /**
     * Gets as line2
     *
     * @return string
     */
    public function getLine2()
    {
        return $this->line2;
    }

    /**
     * Sets a new line2
     *
     * @param string $line2
     * @return self
     */
    public function setLine2($line2)
    {
        $this->line2 = $line2;
        return $this;
    }

    /**
     * Gets as state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Sets a new state
     *
     * @param string $state
     * @return self
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * Gets as zip
     *
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Sets a new zip
     *
     * @param string $zip
     * @return self
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
        return $this;
    }


}

