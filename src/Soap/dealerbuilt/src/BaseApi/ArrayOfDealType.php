<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfDealType.
 *
 * XSD Type: ArrayOfDeal
 */
class ArrayOfDealType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\DealType[]
     */
    private $deal = [
    ];

    /**
     * Adds as deal.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DealType $deal
     */
    public function addToDeal(DealType $deal)
    {
        $this->deal[] = $deal;

        return $this;
    }

    /**
     * isset deal.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetDeal($index)
    {
        return isset($this->deal[$index]);
    }

    /**
     * unset deal.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetDeal($index)
    {
        unset($this->deal[$index]);
    }

    /**
     * Gets as deal.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\DealType[]
     */
    public function getDeal()
    {
        return $this->deal;
    }

    /**
     * Sets a new deal.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DealType[] $deal
     *
     * @return self
     */
    public function setDeal(array $deal)
    {
        $this->deal = $deal;

        return $this;
    }
}
