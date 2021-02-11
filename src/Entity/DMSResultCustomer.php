<?php

namespace App\Entity;

/**
 * Class DMSResultCustomer.
 */
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
    public function setName($name): DMSResultCustomer
    {
        $this->name = $name;

        return $this;
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
    public function setPhoneNumbers($phoneNumbers): DMSResultCustomer
    {
        $this->phoneNumbers = $phoneNumbers;

        return $this;
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
    public function setEmail($email): DMSResultCustomer
    {
        $this->email = $email;

        return $this;
    }
}
