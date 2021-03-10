<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfDocumentType
 *
 * 
 * XSD Type: ArrayOfDocument
 */
class ArrayOfDocumentType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\DocumentType[] $document
     */
    private $document = [
        
    ];

    /**
     * Adds as document
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\DocumentType $document
     */
    public function addToDocument(\App\Soap\dealerbuilt\src\BaseApi\DocumentType $document)
    {
        $this->document[] = $document;
        return $this;
    }

    /**
     * isset document
     *
     * @param int|string $index
     * @return bool
     */
    public function issetDocument($index)
    {
        return isset($this->document[$index]);
    }

    /**
     * unset document
     *
     * @param int|string $index
     * @return void
     */
    public function unsetDocument($index)
    {
        unset($this->document[$index]);
    }

    /**
     * Gets as document
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\DocumentType[]
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * Sets a new document
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DocumentType[] $document
     * @return self
     */
    public function setDocument(array $document)
    {
        $this->document = $document;
        return $this;
    }


}

