<?php

namespace App\Soap\dealerbuilt\src\Models\Stock;

/**
 * Class representing ArrayOfOptionType.
 *
 * XSD Type: ArrayOfOption
 */
class ArrayOfOptionType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Stock\OptionType[]
     */
    private $option = [
    ];

    /**
     * Adds as option.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Stock\OptionType $option
     */
    public function addToOption(OptionType $option)
    {
        $this->option[] = $option;

        return $this;
    }

    /**
     * isset option.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetOption($index)
    {
        return isset($this->option[$index]);
    }

    /**
     * unset option.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetOption($index)
    {
        unset($this->option[$index]);
    }

    /**
     * Gets as option.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Stock\OptionType[]
     */
    public function getOption()
    {
        return $this->option;
    }

    /**
     * Sets a new option.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Stock\OptionType[] $option
     *
     * @return self
     */
    public function setOption(array $option)
    {
        $this->option = $option;

        return $this;
    }
}
