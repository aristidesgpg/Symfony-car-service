<?php

namespace App\Soap\dealertrack\src;

/**
 * Class representing ClosedRepairOrderDetail
 */
class ClosedRepairOrderDetail
{

    /**
     * @var int $lineNumber
     */
    private $lineNumber = null;

    /**
     * @var \App\Soap\dealertrack\src\Labor[] $laborDetails
     */
    private $laborDetails = null;

    /**
     * @var \App\Soap\dealertrack\src\Parts $parts
     */
    private $parts = null;

    /**
     * @var \App\Soap\dealertrack\src\Comments $comments
     */
    private $comments = null;

    /**
     * Gets as lineNumber
     *
     * @return int
     */
    public function getLineNumber()
    {
        return $this->lineNumber;
    }

    /**
     * Sets a new lineNumber
     *
     * @param int $lineNumber
     * @return self
     */
    public function setLineNumber($lineNumber)
    {
        $this->lineNumber = $lineNumber;
        return $this;
    }

    /**
     * Adds as labor
     *
     * @return self
     * @param \App\Soap\dealertrack\src\Labor $labor
     */
    public function addToLaborDetails(\App\Soap\dealertrack\src\Labor $labor)
    {
        $this->laborDetails[] = $labor;
        return $this;
    }

    /**
     * isset laborDetails
     *
     * @param int|string $index
     * @return bool
     */
    public function issetLaborDetails($index)
    {
        return isset($this->laborDetails[$index]);
    }

    /**
     * unset laborDetails
     *
     * @param int|string $index
     * @return void
     */
    public function unsetLaborDetails($index)
    {
        unset($this->laborDetails[$index]);
    }

    /**
     * Gets as laborDetails
     *
     * @return \App\Soap\dealertrack\src\Labor[]
     */
    public function getLaborDetails()
    {
        return $this->laborDetails;
    }

    /**
     * Sets a new laborDetails
     *
     * @param \App\Soap\dealertrack\src\Labor[] $laborDetails
     * @return self
     */
    public function setLaborDetails(array $laborDetails)
    {
        $this->laborDetails = $laborDetails;
        return $this;
    }

    /**
     * Gets as parts
     *
     * @return \App\Soap\dealertrack\src\Parts
     */
    public function getParts()
    {
        return $this->parts;
    }

    /**
     * Sets a new parts
     *
     * @param \App\Soap\dealertrack\src\Parts $parts
     * @return self
     */
    public function setParts(\App\Soap\dealertrack\src\Parts $parts)
    {
        $this->parts = $parts;
        return $this;
    }

    /**
     * Gets as comments
     *
     * @return \App\Soap\dealertrack\src\Comments
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Sets a new comments
     *
     * @param \App\Soap\dealertrack\src\Comments $comments
     * @return self
     */
    public function setComments(\App\Soap\dealertrack\src\Comments $comments)
    {
        $this->comments = $comments;
        return $this;
    }


}

