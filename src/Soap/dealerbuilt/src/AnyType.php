<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing AnyType.
 */
class AnyType
{
    /**
     * @var mixed
     */
    private $__value = null;

    /**
     * Construct.
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->value($value);
    }

    /**
     * Gets or sets the inner value.
     *
     * @param mixed $value
     *
     * @return mixed
     */
    public function value()
    {
        if ($args = func_get_args()) {
            $this->__value = $args[0];
        }

        return $this->__value;
    }

    /**
     * Gets a string value.
     *
     * @return string
     */
    public function __toString()
    {
        return strval($this->__value);
    }
}
