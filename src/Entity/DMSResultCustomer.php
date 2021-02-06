<?php

namespace App\Entity;

class DMSResultCustomer
{
    private $name;
    private $phoneNumbers;
    private $email;

    /**
     * @return mixed
     */
    public function getName()
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

    /**
     * @return mixed
     */
    public function getPhoneNumbers()
    {
        return $this->phoneNumbers;
    }

    /**
     * @param mixed $phoneNumbers
     */
    public function setPhoneNumbers($phoneNumbers): void
    {
        $this->phoneNumbers = $phoneNumbers;
    }

    /**
     * @return mixed
     */
    public function getEmail()
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
