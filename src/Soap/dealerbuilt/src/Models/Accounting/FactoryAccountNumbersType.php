<?php

namespace App\Soap\dealerbuilt\src\Models\Accounting;

/**
 * Class representing FactoryAccountNumbersType
 *
 * 
 * XSD Type: FactoryAccountNumbersType
 */
class FactoryAccountNumbersType
{

    /**
     * @var string $factory
     */
    private $factory = null;

    /**
     * @var string[] $factoryAccountNumbers
     */
    private $factoryAccountNumbers = null;

    /**
     * Gets as factory
     *
     * @return string
     */
    public function getFactory()
    {
        return $this->factory;
    }

    /**
     * Sets a new factory
     *
     * @param string $factory
     * @return self
     */
    public function setFactory($factory)
    {
        $this->factory = $factory;
        return $this;
    }

    /**
     * Adds as string
     *
     * @return self
     * @param string $string
     */
    public function addToFactoryAccountNumbers($string)
    {
        $this->factoryAccountNumbers[] = $string;
        return $this;
    }

    /**
     * isset factoryAccountNumbers
     *
     * @param int|string $index
     * @return bool
     */
    public function issetFactoryAccountNumbers($index)
    {
        return isset($this->factoryAccountNumbers[$index]);
    }

    /**
     * unset factoryAccountNumbers
     *
     * @param int|string $index
     * @return void
     */
    public function unsetFactoryAccountNumbers($index)
    {
        unset($this->factoryAccountNumbers[$index]);
    }

    /**
     * Gets as factoryAccountNumbers
     *
     * @return string[]
     */
    public function getFactoryAccountNumbers()
    {
        return $this->factoryAccountNumbers;
    }

    /**
     * Sets a new factoryAccountNumbers
     *
     * @param string[] $factoryAccountNumbers
     * @return self
     */
    public function setFactoryAccountNumbers(array $factoryAccountNumbers)
    {
        $this->factoryAccountNumbers = $factoryAccountNumbers;
        return $this;
    }


}

