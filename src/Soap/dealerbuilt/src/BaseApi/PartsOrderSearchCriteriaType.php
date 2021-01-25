<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing PartsOrderSearchCriteriaType.
 *
 * XSD Type: PartsOrderSearchCriteria
 */
class PartsOrderSearchCriteriaType extends ServiceLocationsSearchCriteriaType
{
    /**
     * @var \DateTime
     */
    private $maxOrderDate = null;

    /**
     * @var \DateTime
     */
    private $maximumCloseDate = null;

    /**
     * @var \DateTime
     */
    private $minOrderDate = null;

    /**
     * @var \DateTime
     */
    private $mininumCloseDate = null;

    /**
     * @var string
     */
    private $openScope = null;

    /**
     * @var string
     */
    private $orderTransmissionScope = null;

    /**
     * @var string
     */
    private $specialOrderScope = null;

    /**
     * @var string[]
     */
    private $vendorCodes = null;

    /**
     * Gets as maxOrderDate.
     *
     * @return \DateTime
     */
    public function getMaxOrderDate()
    {
        return $this->maxOrderDate;
    }

    /**
     * Sets a new maxOrderDate.
     *
     * @return self
     */
    public function setMaxOrderDate(\DateTime $maxOrderDate)
    {
        $this->maxOrderDate = $maxOrderDate;

        return $this;
    }

    /**
     * Gets as maximumCloseDate.
     *
     * @return \DateTime
     */
    public function getMaximumCloseDate()
    {
        return $this->maximumCloseDate;
    }

    /**
     * Sets a new maximumCloseDate.
     *
     * @return self
     */
    public function setMaximumCloseDate(\DateTime $maximumCloseDate)
    {
        $this->maximumCloseDate = $maximumCloseDate;

        return $this;
    }

    /**
     * Gets as minOrderDate.
     *
     * @return \DateTime
     */
    public function getMinOrderDate()
    {
        return $this->minOrderDate;
    }

    /**
     * Sets a new minOrderDate.
     *
     * @return self
     */
    public function setMinOrderDate(\DateTime $minOrderDate)
    {
        $this->minOrderDate = $minOrderDate;

        return $this;
    }

    /**
     * Gets as mininumCloseDate.
     *
     * @return \DateTime
     */
    public function getMininumCloseDate()
    {
        return $this->mininumCloseDate;
    }

    /**
     * Sets a new mininumCloseDate.
     *
     * @return self
     */
    public function setMininumCloseDate(\DateTime $mininumCloseDate)
    {
        $this->mininumCloseDate = $mininumCloseDate;

        return $this;
    }

    /**
     * Gets as openScope.
     *
     * @return string
     */
    public function getOpenScope()
    {
        return $this->openScope;
    }

    /**
     * Sets a new openScope.
     *
     * @param string $openScope
     *
     * @return self
     */
    public function setOpenScope($openScope)
    {
        $this->openScope = $openScope;

        return $this;
    }

    /**
     * Gets as orderTransmissionScope.
     *
     * @return string
     */
    public function getOrderTransmissionScope()
    {
        return $this->orderTransmissionScope;
    }

    /**
     * Sets a new orderTransmissionScope.
     *
     * @param string $orderTransmissionScope
     *
     * @return self
     */
    public function setOrderTransmissionScope($orderTransmissionScope)
    {
        $this->orderTransmissionScope = $orderTransmissionScope;

        return $this;
    }

    /**
     * Gets as specialOrderScope.
     *
     * @return string
     */
    public function getSpecialOrderScope()
    {
        return $this->specialOrderScope;
    }

    /**
     * Sets a new specialOrderScope.
     *
     * @param string $specialOrderScope
     *
     * @return self
     */
    public function setSpecialOrderScope($specialOrderScope)
    {
        $this->specialOrderScope = $specialOrderScope;

        return $this;
    }

    /**
     * Adds as string.
     *
     * @return self
     *
     * @param string $string
     */
    public function addToVendorCodes($string)
    {
        $this->vendorCodes[] = $string;

        return $this;
    }

    /**
     * isset vendorCodes.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetVendorCodes($index)
    {
        return isset($this->vendorCodes[$index]);
    }

    /**
     * unset vendorCodes.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetVendorCodes($index)
    {
        unset($this->vendorCodes[$index]);
    }

    /**
     * Gets as vendorCodes.
     *
     * @return string[]
     */
    public function getVendorCodes()
    {
        return $this->vendorCodes;
    }

    /**
     * Sets a new vendorCodes.
     *
     * @param string[] $vendorCodes
     *
     * @return self
     */
    public function setVendorCodes(array $vendorCodes)
    {
        $this->vendorCodes = $vendorCodes;

        return $this;
    }
}
