<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing CheckSearchCriteriaType.
 *
 * XSD Type: CheckSearchCriteria
 */
class CheckSearchCriteriaType extends CompaniesSearchCriteriaType
{
    /**
     * @var string[]
     */
    private $checkNumbers = null;

    /**
     * @var \DateInterval
     */
    private $maxElapsedSinceUpdate = null;

    /**
     * Adds as string.
     *
     * @return self
     *
     * @param string $string
     */
    public function addToCheckNumbers($string)
    {
        $this->checkNumbers[] = $string;

        return $this;
    }

    /**
     * isset checkNumbers.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetCheckNumbers($index)
    {
        return isset($this->checkNumbers[$index]);
    }

    /**
     * unset checkNumbers.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetCheckNumbers($index)
    {
        unset($this->checkNumbers[$index]);
    }

    /**
     * Gets as checkNumbers.
     *
     * @return string[]
     */
    public function getCheckNumbers()
    {
        return $this->checkNumbers;
    }

    /**
     * Sets a new checkNumbers.
     *
     * @param string[] $checkNumbers
     *
     * @return self
     */
    public function setCheckNumbers(array $checkNumbers)
    {
        $this->checkNumbers = $checkNumbers;

        return $this;
    }

    /**
     * Gets as maxElapsedSinceUpdate.
     *
     * @return \DateInterval
     */
    public function getMaxElapsedSinceUpdate()
    {
        return $this->maxElapsedSinceUpdate;
    }

    /**
     * Sets a new maxElapsedSinceUpdate.
     *
     * @return self
     */
    public function setMaxElapsedSinceUpdate(\DateInterval $maxElapsedSinceUpdate)
    {
        $this->maxElapsedSinceUpdate = $maxElapsedSinceUpdate;

        return $this;
    }
}
