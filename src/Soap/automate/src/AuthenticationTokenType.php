<?php

namespace App\Soap\automate\src;

/**
 * Class representing AuthenticationTokenType.
 *
 * XSD Type: authenticationToken
 */
class AuthenticationTokenType
{
    /**
     * @var string
     */
    private $userName = null;

    /**
     * @var string
     */
    private $password = null;

    /**
     * Gets as userName.
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Sets a new userName.
     *
     * @param string $userName
     *
     * @return self
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Gets as password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Sets a new password.
     *
     * @param string $password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}
