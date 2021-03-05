<?php

namespace App\Soap\dealerbuilt\src\Models;

/**
 * Class representing NameType
 *
 * 
 * XSD Type: Name
 */
class NameType
{

    /**
     * @var string $firstName
     */
    private $firstName = null;

    /**
     * @var string $lastName
     */
    private $lastName = null;

    /**
     * @var string $middleName
     */
    private $middleName = null;

    /**
     * @var string $singularName
     */
    private $singularName = null;

    /**
     * @var string $suffix
     */
    private $suffix = null;

    /**
     * @var string $title
     */
    private $title = null;

    /**
     * Gets as firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Sets a new firstName
     *
     * @param string $firstName
     * @return self
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * Gets as lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Sets a new lastName
     *
     * @param string $lastName
     * @return self
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * Gets as middleName
     *
     * @return string
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * Sets a new middleName
     *
     * @param string $middleName
     * @return self
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;
        return $this;
    }

    /**
     * Gets as singularName
     *
     * @return string
     */
    public function getSingularName()
    {
        return $this->singularName;
    }

    /**
     * Sets a new singularName
     *
     * @param string $singularName
     * @return self
     */
    public function setSingularName($singularName)
    {
        $this->singularName = $singularName;
        return $this;
    }

    /**
     * Gets as suffix
     *
     * @return string
     */
    public function getSuffix()
    {
        return $this->suffix;
    }

    /**
     * Sets a new suffix
     *
     * @param string $suffix
     * @return self
     */
    public function setSuffix($suffix)
    {
        $this->suffix = $suffix;
        return $this;
    }

    /**
     * Gets as title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets a new title
     *
     * @param string $title
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }


}

