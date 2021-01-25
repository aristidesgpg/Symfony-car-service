<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing PartsInvoiceSearchCriteriaType
 *
 * 
 * XSD Type: PartsInvoiceSearchCriteria
 */
class PartsInvoiceSearchCriteriaType extends ServiceLocationsSearchCriteriaType
{

    /**
     * @var string $closedScope
     */
    private $closedScope = null;

    /**
     * @var string $deliveredScope
     */
    private $deliveredScope = null;

    /**
     * @var string $deliveryScope
     */
    private $deliveryScope = null;

    /**
     * @var \DateTime $maximumClosedStamp
     */
    private $maximumClosedStamp = null;

    /**
     * @var \DateTime $minimumClosedStamp
     */
    private $minimumClosedStamp = null;

    /**
     * @var string[] $partsInvoiceNumbers
     */
    private $partsInvoiceNumbers = null;

    /**
     * @var string $soldToCustomerKey
     */
    private $soldToCustomerKey = null;

    /**
     * Gets as closedScope
     *
     * @return string
     */
    public function getClosedScope()
    {
        return $this->closedScope;
    }

    /**
     * Sets a new closedScope
     *
     * @param string $closedScope
     * @return self
     */
    public function setClosedScope($closedScope)
    {
        $this->closedScope = $closedScope;
        return $this;
    }

    /**
     * Gets as deliveredScope
     *
     * @return string
     */
    public function getDeliveredScope()
    {
        return $this->deliveredScope;
    }

    /**
     * Sets a new deliveredScope
     *
     * @param string $deliveredScope
     * @return self
     */
    public function setDeliveredScope($deliveredScope)
    {
        $this->deliveredScope = $deliveredScope;
        return $this;
    }

    /**
     * Gets as deliveryScope
     *
     * @return string
     */
    public function getDeliveryScope()
    {
        return $this->deliveryScope;
    }

    /**
     * Sets a new deliveryScope
     *
     * @param string $deliveryScope
     * @return self
     */
    public function setDeliveryScope($deliveryScope)
    {
        $this->deliveryScope = $deliveryScope;
        return $this;
    }

    /**
     * Gets as maximumClosedStamp
     *
     * @return \DateTime
     */
    public function getMaximumClosedStamp()
    {
        return $this->maximumClosedStamp;
    }

    /**
     * Sets a new maximumClosedStamp
     *
     * @param \DateTime $maximumClosedStamp
     * @return self
     */
    public function setMaximumClosedStamp(\DateTime $maximumClosedStamp)
    {
        $this->maximumClosedStamp = $maximumClosedStamp;
        return $this;
    }

    /**
     * Gets as minimumClosedStamp
     *
     * @return \DateTime
     */
    public function getMinimumClosedStamp()
    {
        return $this->minimumClosedStamp;
    }

    /**
     * Sets a new minimumClosedStamp
     *
     * @param \DateTime $minimumClosedStamp
     * @return self
     */
    public function setMinimumClosedStamp(\DateTime $minimumClosedStamp)
    {
        $this->minimumClosedStamp = $minimumClosedStamp;
        return $this;
    }

    /**
     * Adds as string
     *
     * @return self
     * @param string $string
     */
    public function addToPartsInvoiceNumbers($string)
    {
        $this->partsInvoiceNumbers[] = $string;
        return $this;
    }

    /**
     * isset partsInvoiceNumbers
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPartsInvoiceNumbers($index)
    {
        return isset($this->partsInvoiceNumbers[$index]);
    }

    /**
     * unset partsInvoiceNumbers
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPartsInvoiceNumbers($index)
    {
        unset($this->partsInvoiceNumbers[$index]);
    }

    /**
     * Gets as partsInvoiceNumbers
     *
     * @return string[]
     */
    public function getPartsInvoiceNumbers()
    {
        return $this->partsInvoiceNumbers;
    }

    /**
     * Sets a new partsInvoiceNumbers
     *
     * @param string[] $partsInvoiceNumbers
     * @return self
     */
    public function setPartsInvoiceNumbers(array $partsInvoiceNumbers)
    {
        $this->partsInvoiceNumbers = $partsInvoiceNumbers;
        return $this;
    }

    /**
     * Gets as soldToCustomerKey
     *
     * @return string
     */
    public function getSoldToCustomerKey()
    {
        return $this->soldToCustomerKey;
    }

    /**
     * Sets a new soldToCustomerKey
     *
     * @param string $soldToCustomerKey
     * @return self
     */
    public function setSoldToCustomerKey($soldToCustomerKey)
    {
        $this->soldToCustomerKey = $soldToCustomerKey;
        return $this;
    }


}

