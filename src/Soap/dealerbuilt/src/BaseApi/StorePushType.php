<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing StorePushType
 *
 * 
 * XSD Type: StorePush
 */
class StorePushType
{

    /**
     * @var int $storeId
     */
    private $storeId = null;

    /**
     * @var bool $operationCode
     */
    private $operationCode = null;

    /**
     * @var bool $isWarrantyPayment
     */
    private $isWarrantyPayment = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Accounting\AccountingTransactionPushRequestType $element
     */
    private $element = null;

    /**
     * Gets as storeId
     *
     * @return int
     */
    public function getStoreId()
    {
        return $this->storeId;
    }

    /**
     * Sets a new storeId
     *
     * @param int $storeId
     * @return self
     */
    public function setStoreId($storeId)
    {
        $this->storeId = $storeId;
        return $this;
    }

    /**
     * Gets as operationCode
     *
     * @return bool
     */
    public function getOperationCode()
    {
        return $this->operationCode;
    }

    /**
     * Sets a new operationCode
     *
     * @param bool $operationCode
     * @return self
     */
    public function setOperationCode($operationCode)
    {
        $this->operationCode = $operationCode;
        return $this;
    }

    /**
     * Gets as isWarrantyPayment
     *
     * @return bool
     */
    public function getIsWarrantyPayment()
    {
        return $this->isWarrantyPayment;
    }

    /**
     * Sets a new isWarrantyPayment
     *
     * @param bool $isWarrantyPayment
     * @return self
     */
    public function setIsWarrantyPayment($isWarrantyPayment)
    {
        $this->isWarrantyPayment = $isWarrantyPayment;
        return $this;
    }

    /**
     * Gets as element
     *
     * @return \App\Soap\dealerbuilt\src\Models\Accounting\AccountingTransactionPushRequestType
     */
    public function getElement()
    {
        return $this->element;
    }

    /**
     * Sets a new element
     *
     * @param \App\Soap\dealerbuilt\src\Models\Accounting\AccountingTransactionPushRequestType $element
     * @return self
     */
    public function setElement(\App\Soap\dealerbuilt\src\Models\Accounting\AccountingTransactionPushRequestType $element)
    {
        $this->element = $element;
        return $this;
    }


}

