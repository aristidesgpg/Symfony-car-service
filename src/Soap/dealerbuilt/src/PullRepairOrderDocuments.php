<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullRepairOrderDocuments.
 */
class PullRepairOrderDocuments
{
    /**
     * @var string[]
     */
    private $repairOrderKeys = null;

    /**
     * @var string
     */
    private $documentType = null;

    /**
     * @var string
     */
    private $format = null;

    /**
     * Adds as string.
     *
     * @return self
     *
     * @param string $string
     */
    public function addToRepairOrderKeys($string)
    {
        $this->repairOrderKeys[] = $string;

        return $this;
    }

    /**
     * isset repairOrderKeys.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetRepairOrderKeys($index)
    {
        return isset($this->repairOrderKeys[$index]);
    }

    /**
     * unset repairOrderKeys.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetRepairOrderKeys($index)
    {
        unset($this->repairOrderKeys[$index]);
    }

    /**
     * Gets as repairOrderKeys.
     *
     * @return string[]
     */
    public function getRepairOrderKeys()
    {
        return $this->repairOrderKeys;
    }

    /**
     * Sets a new repairOrderKeys.
     *
     * @param string[] $repairOrderKeys
     *
     * @return self
     */
    public function setRepairOrderKeys(array $repairOrderKeys)
    {
        $this->repairOrderKeys = $repairOrderKeys;

        return $this;
    }

    /**
     * Gets as documentType.
     *
     * @return string
     */
    public function getDocumentType()
    {
        return $this->documentType;
    }

    /**
     * Sets a new documentType.
     *
     * @param string $documentType
     *
     * @return self
     */
    public function setDocumentType($documentType)
    {
        $this->documentType = $documentType;

        return $this;
    }

    /**
     * Gets as format.
     *
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Sets a new format.
     *
     * @param string $format
     *
     * @return self
     */
    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }
}
