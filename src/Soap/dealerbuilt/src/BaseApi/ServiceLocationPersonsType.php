<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ServiceLocationPersonsType.
 *
 * XSD Type: ServiceLocationPersons
 */
class ServiceLocationPersonsType extends ApiServiceLocationItemType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType[]
     */
    private $persons = null;

    /**
     * Adds as numberedPersonInfo.
     *
     * @return self
     */
    public function addToPersons(\App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType $numberedPersonInfo)
    {
        $this->persons[] = $numberedPersonInfo;

        return $this;
    }

    /**
     * isset persons.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPersons($index)
    {
        return isset($this->persons[$index]);
    }

    /**
     * unset persons.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPersons($index)
    {
        unset($this->persons[$index]);
    }

    /**
     * Gets as persons.
     *
     * @return \App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType[]
     */
    public function getPersons()
    {
        return $this->persons;
    }

    /**
     * Sets a new persons.
     *
     * @param \App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType[] $persons
     *
     * @return self
     */
    public function setPersons(array $persons)
    {
        $this->persons = $persons;

        return $this;
    }
}
