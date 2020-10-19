<?php

namespace App\Service;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class SecurityHelper
 *
 * @package App\Service
 */
class SecurityHelper {
    /**
     * SecurityHelper constructor.
     *
     */
    public function __construct () {
    }

    /**
     * @param  User   $user
     * @param  string $answer
     * 
     * @return boolean
     */
    public function validateSecurity(User $user, string $answer){
        //validate params
        if(!$user || !$answer){
            return false;
        }
        //check answer
        if(!password_verify(strtolower($answer), $user->getSecurityAnswer())){
            return false;
        }

        return true;
    }
}
