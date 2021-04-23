<?php

namespace App\Entity;

class DMSResultTechnician
{
    /**
     * @var ?string
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

    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id): DMSResultTechnician
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
    public function setFirstName($firstName): DMSResultTechnician
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
    public function setLastName($lastName): DMSResultTechnician
    {
        $this->lastName = $lastName;

        return $this;
    }
}
