<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing StorePersonsType.
 *
 * XSD Type: StorePersons
 */
class StorePersonsType extends ApiStoreItemType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\SalesPersonType[]
     */
    private $persons = null;

    /**
     * Adds as salesPerson.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\SalesPersonType $salesPerson
     */
    public function addToPersons(SalesPersonType $salesPerson)
    {
        $this->persons[] = $salesPerson;

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
     * @return \App\Soap\dealerbuilt\src\BaseApi\SalesPersonType[]
     */
    public function getPersons()
    {
        return $this->persons;
    }

    /**
     * Sets a new persons.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\SalesPersonType[] $persons
     *
     * @return self
     */
    public function setPersons(array $persons)
    {
        $this->persons = $persons;

        return $this;
    }
}
