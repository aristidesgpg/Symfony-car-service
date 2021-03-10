<?php

namespace App\Security;

use Lexik\Bundle\JWTAuthenticationBundle\Security\Guard\JWTTokenAuthenticator;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

/**
 * Class Authenticator.
 */
class Authenticator extends JWTTokenAuthenticator
{
    /**
     * @param mixed $preAuthToken
     *
     * @return UserInterface|void|null
     */
    public function getUser($preAuthToken, UserProviderInterface $userProvider)
    {
        $user = parent::getUser($preAuthToken, $userProvider);

        return $user;
        dump($user);
        exit;
        // @TODO: Use the user to get if they need to re-authenticate
        // @TODO: Update settings every time tech app changes
        // @TODO: Update user every time their password has been changed
    }
}
