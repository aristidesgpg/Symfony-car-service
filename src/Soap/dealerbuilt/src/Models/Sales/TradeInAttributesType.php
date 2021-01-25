<?php

namespace App\Soap\dealerbuilt\src\Models\Sales;

/**
 * Class representing TradeInAttributesType.
 *
 * XSD Type: TradeInAttributes
 */
class TradeInAttributesType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $acv = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $allowance = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $payoff = null;

    /**
     * @var \DateTime
     */
    private $payoffDate = null;

    /**
     * Gets as acv.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getAcv()
    {
        return $this->acv;
    }

    /**
     * Sets a new acv.
     *
     * @return self
     */
    public function setAcv(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $acv)
    {
        $this->acv = $acv;

        return $this;
    }

    /**
     * Gets as allowance.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getAllowance()
    {
        return $this->allowance;
    }

    /**
     * Sets a new allowance.
     *
     * @return self
     */
    public function setAllowance(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $allowance)
    {
        $this->allowance = $allowance;

        return $this;
    }

    /**
     * Gets as payoff.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getPayoff()
    {
        return $this->payoff;
    }

    /**
     * Sets a new payoff.
     *
     * @return self
     */
    public function setPayoff(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $payoff)
    {
        $this->payoff = $payoff;

        return $this;
    }

    /**
     * Gets as payoffDate.
     *
     * @return \DateTime
     */
    public function getPayoffDate()
    {
        return $this->payoffDate;
    }

    /**
     * Sets a new payoffDate.
     *
     * @return self
     */
    public function setPayoffDate(\DateTime $payoffDate)
    {
        $this->payoffDate = $payoffDate;

        return $this;
    }
}
