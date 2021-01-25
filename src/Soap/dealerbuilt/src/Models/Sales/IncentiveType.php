<?php

namespace App\Soap\dealerbuilt\src\Models\Sales;

/**
 * Class representing IncentiveType.
 *
 * XSD Type: Incentive
 */
class IncentiveType
{
    /**
     * @var bool
     */
    private $deleteFlag = null;

    /**
     * @var string
     */
    private $department = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $incentiveAmount = null;

    /**
     * @var int
     */
    private $itemizationId = null;

    /**
     * @var string
     */
    private $name = null;

    /**
     * @var string
     */
    private $note = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $residual = null;

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
     * Gets as incentiveAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getIncentiveAmount()
    {
        return $this->incentiveAmount;
    }

    /**
     * Sets a new incentiveAmount.
     *
     * @return self
     */
    public function setIncentiveAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $incentiveAmount)
    {
        $this->incentiveAmount = $incentiveAmount;

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
     * Gets as note.
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Sets a new note.
     *
     * @param string $note
     *
     * @return self
     */
    public function setNote($note)
    {
        $this->note = $note;

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
