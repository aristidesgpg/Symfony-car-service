<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfChartEntryType.
 *
 * XSD Type: ArrayOfChartEntry
 */
class ArrayOfChartEntryType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ChartEntryType[]
     */
    private $chartEntry = [
    ];

    /**
     * Adds as chartEntry.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ChartEntryType $chartEntry
     */
    public function addToChartEntry(ChartEntryType $chartEntry)
    {
        $this->chartEntry[] = $chartEntry;

        return $this;
    }

    /**
     * isset chartEntry.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetChartEntry($index)
    {
        return isset($this->chartEntry[$index]);
    }

    /**
     * unset chartEntry.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetChartEntry($index)
    {
        unset($this->chartEntry[$index]);
    }

    /**
     * Gets as chartEntry.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ChartEntryType[]
     */
    public function getChartEntry()
    {
        return $this->chartEntry;
    }

    /**
     * Sets a new chartEntry.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ChartEntryType[] $chartEntry
     *
     * @return self
     */
    public function setChartEntry(array $chartEntry)
    {
        $this->chartEntry = $chartEntry;

        return $this;
    }
}
