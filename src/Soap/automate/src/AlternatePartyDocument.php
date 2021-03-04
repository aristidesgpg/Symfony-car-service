<?php

namespace App\Soap\automate\src;

/**
 * Class representing AlternatePartyDocument
 */
class AlternatePartyDocument extends DocumentIDType
{

    /**
     * @var string $documentType
     */
    private $documentType = null;

    /**
     * @var \App\Soap\automate\src\EffectivePeriod $effectivePeriod
     */
    private $effectivePeriod = null;

    /**
     * @var string $issuingName
     */
    private $issuingName = null;

    /**
     * Gets as documentType
     *
     * @return string
     */
    public function getDocumentType()
    {
        return $this->documentType;
    }

    /**
     * Sets a new documentType
     *
     * @param string $documentType
     * @return self
     */
    public function setDocumentType($documentType)
    {
        $this->documentType = $documentType;
        return $this;
    }

    /**
     * Gets as effectivePeriod
     *
     * @return \App\Soap\automate\src\EffectivePeriod
     */
    public function getEffectivePeriod()
    {
        return $this->effectivePeriod;
    }

    /**
     * Sets a new effectivePeriod
     *
     * @param \App\Soap\automate\src\EffectivePeriod $effectivePeriod
     * @return self
     */
    public function setEffectivePeriod(\App\Soap\automate\src\EffectivePeriod $effectivePeriod)
    {
        $this->effectivePeriod = $effectivePeriod;
        return $this;
    }

    /**
     * Gets as issuingName
     *
     * @return string
     */
    public function getIssuingName()
    {
        return $this->issuingName;
    }

    /**
     * Sets a new issuingName
     *
     * @param string $issuingName
     * @return self
     */
    public function setIssuingName($issuingName)
    {
        $this->issuingName = $issuingName;
        return $this;
    }


}

