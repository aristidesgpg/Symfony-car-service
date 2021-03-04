<?php

namespace App\Entity;

/**
 * Class DMSResultAdvisor.
 */
class DMSResultAdvisor
{
    /**
     * @var ?int
     */
    private $id;

    /**
     * @var ?string
     */
    private $firstName;

    /**
     * @var ?string
     */
    private $lastName;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id): DMSResultAdvisor
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param $firstName
     */
    public function setFirstName($firstName): DMSResultAdvisor
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName): DMSResultAdvisor
    {
        $this->lastName = $lastName;

        return $this;
    }
}
