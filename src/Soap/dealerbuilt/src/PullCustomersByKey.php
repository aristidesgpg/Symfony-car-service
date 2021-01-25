<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullCustomersByKey
 */
class PullCustomersByKey
{

    /**
     * @var string[] $customerKeys
     */
    private $customerKeys = null;

    /**
     * Adds as string
     *
     * @return self
     * @param string $string
     */
    public function addToCustomerKeys($string)
    {
        $this->customerKeys[] = $string;
        return $this;
    }

    /**
     * isset customerKeys
     *
     * @param int|string $index
     * @return bool
     */
    public function issetCustomerKeys($index)
    {
        return isset($this->customerKeys[$index]);
    }

    /**
     * unset customerKeys
     *
     * @param int|string $index
     * @return void
     */
    public function unsetCustomerKeys($index)
    {
        unset($this->customerKeys[$index]);
    }

    /**
     * Gets as customerKeys
     *
     * @return string[]
     */
    public function getCustomerKeys()
    {
        return $this->customerKeys;
    }

    /**
     * Sets a new customerKeys
     *
     * @param string[] $customerKeys
     * @return self
     */
    public function setCustomerKeys(array $customerKeys)
    {
        $this->customerKeys = $customerKeys;
        return $this;
    }


}

