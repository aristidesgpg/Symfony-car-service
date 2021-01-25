<?php

namespace App\Soap\dealerbuilt\src\Models\Accounting;

/**
 * Class representing ArrayOfGlMonthlySummaryType.
 *
 * XSD Type: ArrayOfGlMonthlySummary
 */
class ArrayOfGlMonthlySummaryType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Accounting\GlMonthlySummaryType[]
     */
    private $glMonthlySummary = [
    ];

    /**
     * Adds as glMonthlySummary.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Accounting\GlMonthlySummaryType $glMonthlySummary
     */
    public function addToGlMonthlySummary(GlMonthlySummaryType $glMonthlySummary)
    {
        $this->glMonthlySummary[] = $glMonthlySummary;

        return $this;
    }

    /**
     * isset glMonthlySummary.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetGlMonthlySummary($index)
    {
        return isset($this->glMonthlySummary[$index]);
    }

    /**
     * unset glMonthlySummary.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetGlMonthlySummary($index)
    {
        unset($this->glMonthlySummary[$index]);
    }

    /**
     * Gets as glMonthlySummary.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Accounting\GlMonthlySummaryType[]
     */
    public function getGlMonthlySummary()
    {
        return $this->glMonthlySummary;
    }

    /**
     * Sets a new glMonthlySummary.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Accounting\GlMonthlySummaryType[] $glMonthlySummary
     *
     * @return self
     */
    public function setGlMonthlySummary(array $glMonthlySummary)
    {
        $this->glMonthlySummary = $glMonthlySummary;

        return $this;
    }
}
