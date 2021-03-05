<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing LenderType
 *
 * 
 * XSD Type: Lender
 */
class LenderType extends ApiSourceItemType
{

    /**
     * @var string $address
     */
    private $address = null;

    /**
     * @var string $city
     */
    private $city = null;

    /**
     * @var string $code
     */
    private $code = null;

    /**
     * @var string $lenderType
     */
    private $lenderType = null;

    /**
     * @var string $name
     */
    private $name = null;

    /**
     * @var string $phone
     */
    private $phone = null;

    /**
     * @var string $state
     */
    private $state = null;

    /**
     * @var string $zip
     */
    private $zip = null;

    /**
     * Gets as address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Sets a new address
     *
     * @param string $address
     * @return self
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

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
     * Gets as code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Sets a new code
     *
     * @param string $code
     * @return self
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * Gets as lenderType
     *
     * @return string
     */
    public function getLenderType()
    {
        return $this->lenderType;
    }

    /**
     * Sets a new lenderType
     *
     * @param string $lenderType
     * @return self
     */
    public function setLenderType($lenderType)
    {
        $this->lenderType = $lenderType;
        return $this;
    }

    /**
     * Gets as name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets a new name
     *
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Gets as phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Sets a new phone
     *
     * @param string $phone
     * @return self
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
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

