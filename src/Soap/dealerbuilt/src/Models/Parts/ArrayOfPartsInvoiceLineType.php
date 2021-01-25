<?php

namespace App\Soap\dealerbuilt\src\Models\Parts;

/**
 * Class representing ArrayOfPartsInvoiceLineType.
 *
 * XSD Type: ArrayOfPartsInvoiceLine
 */
class ArrayOfPartsInvoiceLineType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Parts\PartsInvoiceLineType[]
     */
    private $partsInvoiceLine = [
    ];

    /**
     * Adds as partsInvoiceLine.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Parts\PartsInvoiceLineType $partsInvoiceLine
     */
    public function addToPartsInvoiceLine(PartsInvoiceLineType $partsInvoiceLine)
    {
        $this->partsInvoiceLine[] = $partsInvoiceLine;

        return $this;
    }

    /**
     * isset partsInvoiceLine.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPartsInvoiceLine($index)
    {
        return isset($this->partsInvoiceLine[$index]);
    }

    /**
     * unset partsInvoiceLine.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPartsInvoiceLine($index)
    {
        unset($this->partsInvoiceLine[$index]);
    }

    /**
     * Gets as partsInvoiceLine.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Parts\PartsInvoiceLineType[]
     */
    public function getPartsInvoiceLine()
    {
        return $this->partsInvoiceLine;
    }

    /**
     * Sets a new partsInvoiceLine.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Parts\PartsInvoiceLineType[] $partsInvoiceLine
     *
     * @return self
     */
    public function setPartsInvoiceLine(array $partsInvoiceLine)
    {
        $this->partsInvoiceLine = $partsInvoiceLine;

        return $this;
    }
}
