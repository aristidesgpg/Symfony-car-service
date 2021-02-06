<?php

namespace App\Soap\automate\src;

/**
 * Class representing DocumentIdentification
 */
class DocumentIdentification
{

    /**
     * @var string $documentID
     */
    private $documentID = null;

    /**
     * Gets as documentID
     *
     * @return string
     */
    public function getDocumentID()
    {
        return $this->documentID;
    }

    /**
     * Sets a new documentID
     *
     * @param string $documentID
     * @return self
     */
    public function setDocumentID($documentID)
    {
        $this->documentID = $documentID;
        return $this;
    }


}

