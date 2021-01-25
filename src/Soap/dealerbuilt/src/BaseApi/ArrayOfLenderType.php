<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfLenderType
 *
 * 
 * XSD Type: ArrayOfLender
 */
class ArrayOfLenderType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\LenderType[] $lender
     */
    private $lender = [
        
    ];

    /**
     * Adds as lender
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\LenderType $lender
     */
    public function addToLender(\App\Soap\dealerbuilt\src\BaseApi\LenderType $lender)
    {
        $this->lender[] = $lender;
        return $this;
    }

    /**
     * isset lender
     *
     * @param int|string $index
     * @return bool
     */
    public function issetLender($index)
    {
        return isset($this->lender[$index]);
    }

    /**
     * unset lender
     *
     * @param int|string $index
     * @return void
     */
    public function unsetLender($index)
    {
        unset($this->lender[$index]);
    }

    /**
     * Gets as lender
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\LenderType[]
     */
    public function getLender()
    {
        return $this->lender;
    }

    /**
     * Sets a new lender
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\LenderType[] $lender
     * @return self
     */
    public function setLender(array $lender)
    {
        $this->lender = $lender;
        return $this;
    }


}

