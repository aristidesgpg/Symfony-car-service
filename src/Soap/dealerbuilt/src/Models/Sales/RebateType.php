<?php

namespace App\Soap\dealerbuilt\src\Models\Sales;

/**
 * Class representing RebateType.
 *
 * XSD Type: Rebate
 */
class RebateType
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
    private $rebateAmount = null;

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
     * Gets as rebateAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getRebateAmount()
    {
        return $this->rebateAmount;
    }

    /**
     * Sets a new rebateAmount.
     *
     * @return self
     */
    public function setRebateAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $rebateAmount)
    {
        $this->rebateAmount = $rebateAmount;

        return $this;
    }
}
