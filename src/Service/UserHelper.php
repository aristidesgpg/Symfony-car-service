<?php

namespace App\Service;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class UserHelper.
 */
class UserHelper
{
    /** @var string[] */
    public const USER_ROLES = [
        'ROLE_ADMIN',
        'ROLE_SERVICE_MANAGER',
        'ROLE_SERVICE_ADVISOR',
        'ROLE_TECHNICIAN',
        'ROLE_PARTS_ADVISOR',
        'ROLE_SALES_MANAGER',
        'ROLE_SALES_AGENT',
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
     */
    public function __construct(
        UserRepository $userRepository,
        EntityManagerInterface $em,
        UserPasswordEncoderInterface $passwordEncoder
    ) {
        $this->userRepository = $userRepository;
        $this->em = $em;
        $this->passwordEncoder = $passwordEncoder;
    }

    public function isValidRole(string $role): bool
    {
        $roles = self::USER_ROLES;

        //role is invalid
        if (!$role || !in_array($role, $roles)) {
            return false;
        }

        return true;
    }

    public function passwordEncoder(User $user, string $password): string
    {
        return $this->passwordEncoder->encodePassword($user, $password);
    }
}
