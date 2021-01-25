<?php

namespace App\Soap\dealerbuilt\src\Models\Sales;

/**
 * Class representing HardAddType.
 *
 * XSD Type: HardAdd
 */
class HardAddType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $cost = null;

    /**
     * @var bool
     */
    private $deleteFlag = null;

    /**
     * @var string
     */
    private $department = null;

    /**
     * @var string
     */
    private $itemCode = null;

    /**
     * @var int
     */
    private $itemizationId = null;

    /**
     * @var string
     */
    private $name = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $price = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $residual = null;

    /**
     * Gets as cost.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Sets a new cost.
     *
     * @return self
     */
    public function setCost(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Gets as deleteFlag.
     *
     * @return bool
     */
    public function getDeleteFlag()
    {
        return $this->deleteFlag;
    }

    /**
     * Sets a new deleteFlag.
     *
     * @param bool $deleteFlag
     *
     * @return self
     */
    public function setDeleteFlag($deleteFlag)
    {
        $this->deleteFlag = $deleteFlag;

        return $this;
    }

    /**
     * Gets as department.
     *
     * @return string
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * Sets a new department.
     *
     * @param string $department
     *
     * @return self
     */
    public function setDepartment($department)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Gets as itemCode.
     *
     * @return string
     */
    public function getItemCode()
    {
        return $this->itemCode;
    }

    /**
     * Sets a new itemCode.
     *
     * @param string $itemCode
     *
     * @return self
     */
    public function setItemCode($itemCode)
    {
        $this->itemCode = $itemCode;

        return $this;
    }

    /**
     * Gets as itemizationId.
     *
     * @return int
     */
    public function getItemizationId()
    {
        return $this->itemizationId;
    }

    /**
     * Sets a new itemizationId.
     *
     * @param int $itemizationId
     *
     * @return self
     */
    public function setItemizationId($itemizationId)
    {
        $this->itemizationId = $itemizationId;

        return $this;
    }

    /**
     * Gets as name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets a new name.
     *
     * @param string $name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets as price.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Sets a new price.
     *
     * @return self
     */
    public function setPrice(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Gets as residual.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getResidual()
    {
        return $this->residual;
    }

    /**
     * Sets a new residual.
     *
     * @return self
     */
    public function setResidual(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $residual)
    {
        $this->residual = $residual;

        return $this;
    }
}
