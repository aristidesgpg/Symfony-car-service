<?php

namespace App\Entity;

/**
 * Class DMSResultCustomer.
 */
class DMSResultCustomer
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $phoneNumbers = [];

    /**
     * @var string
     */
    private $email;

    /**
     * @return mixed
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getPhoneNumbers(): array
    {
        return $this->phoneNumbers;
    }

    public function setPhoneNumbers(array $phoneNumbers): void
    {
        $this->phoneNumbers = $phoneNumbers;
    }

    /**
     * @return mixed
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }
}
