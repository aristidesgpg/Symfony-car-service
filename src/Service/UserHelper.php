<?php

namespace App\Service;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class UserHelper
 *
 * @package App\Service
 */
class UserHelper {
    /** @var string[] */
    public const USER_ROLES = [
        "ROLE_ADMIN",
        "ROLE_SERVICE_MANAGER",
        "ROLE_SERVICE_ADVISOR",
        "ROLE_TECHNICIAN",
        "ROLE_PARTS_ADVISOR",
        "ROLE_SALES_MANAGER",
        "ROLE_SALES_AGENT"
    ];

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * UserHelper constructor.
     *
     * @param UserRepository               $userRepository
     * @param EntityManagerInterface       $em
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct (UserRepository $userRepository, EntityManagerInterface $em,
                                 UserPasswordEncoderInterface $passwordEncoder) {
        $this->userRepository  = $userRepository;
        $this->em              = $em;
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @param string $role
     *
     * @return boolean
     */
    public function isValidRole (string $role) {
        $roles = self::USER_ROLES;

        //role is invalid
        if (!$role || !in_array($role, $roles)) {
            return false;
        }

        return true;
    }

    /**
     * @param User   $user
     * @param string $password
     *
     * @return string
     */
    public function passwordEncoder (User $user, string $password) {
        return $this->passwordEncoder->encodePassword($user, $password);
    }

}
