<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing Duration.
 */
class Duration
{
    /**
     * @var \DateInterval
     */
    private $__value = null;

    /**
     * Construct.
     */
    public function __construct(\DateInterval $value)
    {
        $this->value($value);
    }

    /**
     * Gets or sets the inner value.
     *
     * @param \DateInterval $value
     *
     * @return \DateInterval
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
