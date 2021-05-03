<?php

namespace App\Soap\cdk\src;

/**
 * Class representing AuthenticationTokenType
 *
 * 
 * XSD Type: authenticationToken
 */
class AuthenticationTokenType
{

    /**
     * @var string $password
     */
    private $password = null;

    /**
     * @var string $username
     */
    private $username = null;

    /**
     * Gets as password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Sets a new password
     *
     * @param string $password
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Gets as username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Sets a new username
     *
     * @param string $username
     * @return self
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }


}

