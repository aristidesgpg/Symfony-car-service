<?php

namespace App\Soap\automate\src;

/**
 * Class representing DocumentIdentificationGroup
 */
class DocumentIdentificationGroup
{

    /**
     * @var \App\Soap\automate\src\DocumentIdentification $documentIdentification
     */
    private $documentIdentification = null;

    /**
     * @var \App\Soap\automate\src\AlternateDocumentIdentification $alternateDocumentIdentification
     */
    private $alternateDocumentIdentification = null;

    /**
     * Gets as documentIdentification
     *
     * @return \App\Soap\automate\src\DocumentIdentification
     */
    public function getDocumentIdentification()
    {
        return $this->documentIdentification;
    }

    /**
     * Sets a new documentIdentification
     *
     * @param \App\Soap\automate\src\DocumentIdentification $documentIdentification
     * @return self
     */
    public function setDocumentIdentification(\App\Soap\automate\src\DocumentIdentification $documentIdentification)
    {
        $this->documentIdentification = $documentIdentification;
        return $this;
    }

    /**
     * Gets as alternateDocumentIdentification
     *
     * @return \App\Soap\automate\src\AlternateDocumentIdentification
     */
    public function getAlternateDocumentIdentification()
    {
        return $this->alternateDocumentIdentification;
    }

    /**
     * Sets a new alternateDocumentIdentification
     *
     * @param \App\Soap\automate\src\AlternateDocumentIdentification $alternateDocumentIdentification
     * @return self
     */
    public function setAlternateDocumentIdentification(\App\Soap\automate\src\AlternateDocumentIdentification $alternateDocumentIdentification)
    {
        $this->alternateDocumentIdentification = $alternateDocumentIdentification;
        return $this;
    }


}

