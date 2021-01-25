<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing LaborOperationType.
 *
 * XSD Type: LaborOperation
 */
class LaborOperationType
{
    /**
     * @var string
     */
    private $code = null;

    /**
     * @var string
     */
    private $description = null;

    /**
     * @var string
     */
    private $quickCode = null;

    /**
     * Gets as code.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Sets a new code.
     *
     * @param string $code
     *
     * @return self
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Gets as description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets a new description.
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Gets as quickCode.
     *
     * @return string
     */
    public function getQuickCode()
    {
        return $this->quickCode;
    }

    /**
     * Sets a new quickCode.
     *
     * @param string $quickCode
     *
     * @return self
     */
    public function setQuickCode($quickCode)
    {
        $this->quickCode = $quickCode;

        return $this;
    }
}
