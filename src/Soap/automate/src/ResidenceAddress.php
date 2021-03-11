<?php

namespace App\Soap\automate\src;

/**
 * Class representing ResidenceAddress
 */
class ResidenceAddress
{

    /**
     * @var string $lineOne
     */
    private $lineOne = null;

    /**
     * @var string $cityName
     */
    private $cityName = null;

    /**
     * @var string $countryID
     */
    private $countryID = null;

    /**
     * @var int $postcode
     */
    private $postcode = null;

    /**
     * @var string $stateOrProvinceCountrySubDivisionID
     */
    private $stateOrProvinceCountrySubDivisionID = null;

    /**
     * @var string $countyCountrySubDivision
     */
    private $countyCountrySubDivision = null;

    /**
     * Gets as lineOne
     *
     * @return string
     */
    public function getLineOne()
    {
        return $this->lineOne;
    }

    /**
     * Sets a new lineOne
     *
     * @param string $lineOne
     * @return self
     */
    public function setLineOne($lineOne)
    {
        $this->lineOne = $lineOne;
        return $this;
    }

    /**
     * Gets as cityName
     *
     * @return string
     */
    public function getCityName()
    {
        return $this->cityName;
    }

    /**
     * Sets a new cityName
     *
     * @param string $cityName
     * @return self
     */
    public function setCityName($cityName)
    {
        $this->cityName = $cityName;
        return $this;
    }

    /**
     * Gets as countryID
     *
     * @return string
     */
    public function getCountryID()
    {
        return $this->countryID;
    }

    /**
     * Sets a new countryID
     *
     * @param string $countryID
     * @return self
     */
    public function setCountryID($countryID)
    {
        $this->countryID = $countryID;
        return $this;
    }

    /**
     * Gets as postcode
     *
     * @return int
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Sets a new postcode
     *
     * @param int $postcode
     * @return self
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
        return $this;
    }

    /**
     * Gets as stateOrProvinceCountrySubDivisionID
     *
     * @return string
     */
    public function getStateOrProvinceCountrySubDivisionID()
    {
        return $this->stateOrProvinceCountrySubDivisionID;
    }

    /**
     * Sets a new stateOrProvinceCountrySubDivisionID
     *
     * @param string $stateOrProvinceCountrySubDivisionID
     * @return self
     */
    public function setStateOrProvinceCountrySubDivisionID($stateOrProvinceCountrySubDivisionID)
    {
        $this->stateOrProvinceCountrySubDivisionID = $stateOrProvinceCountrySubDivisionID;
        return $this;
    }

    /**
     * Gets as countyCountrySubDivision
     *
     * @return string
     */
    public function getCountyCountrySubDivision()
    {
        return $this->countyCountrySubDivision;
    }

    /**
     * Sets a new countyCountrySubDivision
     *
     * @param string $countyCountrySubDivision
     * @return self
     */
    public function setCountyCountrySubDivision($countyCountrySubDivision)
    {
        $this->countyCountrySubDivision = $countyCountrySubDivision;
        return $this;
    }


}

