<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing DropdownListSearchCriteriaType.
 *
 * XSD Type: DropdownListSearchCriteria
 */
class DropdownListSearchCriteriaType extends StoresSearchCriteriaType
{
    /**
     * @var string[]
     */
    private $codeTypes = null;

    /**
     * Adds as string.
     *
     * @return self
     *
     * @param string $string
     */
    public function addToCodeTypes($string)
    {
        $this->codeTypes[] = $string;

        return $this;
    }

    /**
     * isset codeTypes.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetCodeTypes($index)
    {
        return isset($this->codeTypes[$index]);
    }

    /**
     * unset codeTypes.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetCodeTypes($index)
    {
        unset($this->codeTypes[$index]);
    }

    /**
     * Gets as codeTypes.
     *
     * @return string[]
     */
    public function getCodeTypes()
    {
        return $this->codeTypes;
    }

    /**
     * Sets a new codeTypes.
     *
     * @param string[] $codeTypes
     *
     * @return self
     */
    public function setCodeTypes(array $codeTypes)
    {
        $this->codeTypes = $codeTypes;

        return $this;
    }
}
