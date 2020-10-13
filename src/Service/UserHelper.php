<?php

namespace App\Service;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class UserHelper
 *
 * @package App\Service
 */
class UserHelper {
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * UserHelper constructor.
     *
     * @param UserRepository      $userRepository
     * @param EntityManagerInterface $em
     */
    public function __construct (UserRepository $userRepository, EntityManagerInterface $em) {
        $this->userRepository = $userRepository;
        $this->em                = $em;
    }

    /**
     * @param  string  $role
     * 
     * @return boolean
     */
    public function isValidRole (string $role) {

        $roles = [
            "ROLE_ADMIN", 
            "ROLE_SERVICE_MANAGER",
            "ROLE_SERVICE_ADVISOR",
            "ROLE_TECHNICIAN",
            "ROLE_PARTS_ADVISTOR",
            "ROLE_SALES_MANAGER",
            "ROLE_SALES_AGENT"
        ];
        
        //role is invalid
        if(!$role || !in_array($role, $roles)){
            return false;
        }

        return true;
    }

}
