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
    public function __construct (UserRepository $userRepository, EntityManagerInterface $em, UserPasswordEncoderInterface $passwordEncoder) {
        $this->userRepository  = $userRepository;
        $this->em              = $em;
        $this->passwordEncoder = $passwordEncoder;
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
            "ROLE_PARTS_ADVISOR",
            "ROLE_SALES_MANAGER",
            "ROLE_SALES_AGENT"
        ];
        
        //role is invalid
        if(!$role || !in_array($role, $roles)){
            return false;
        }

        return true;
    }

    /**
     * @param  User    $user
     * @param  string  $password
     * 
     * @return string
     */
    public function passwordEncoder($user, $password){
        return $this->passwordEncoder->encodePassword($user, $password);
    }

    /**
     * @param  User  $user
     * @param  array $array
     * 
     * @return boolean
     */
    public function massAssign($user, $array){
       
        //update values
        $roles         = $array['roles'] ?? $user->getRoles();
        $firstName     = $array['firstName'] ?? $user->getFirstName();
        $lastName      = $array['lastName'] ?? $user->getLastName();
        $email         = $array['email'] ?? $user->getEmail();
        $phone         = $array['phone'] ?? $user->getPhone();
        $pin           = $array['pin'] ?? $user->getPin();
        $password      = $array['password'] ? $this->passwordEncoder($user, $password) : $user->getPassword();
        $certification = $array['certification'] ?? $user->getCertification();
        $experience    = $array['experience'] ?? $user->getExperience();

        $user->setFirstName($firstName)
             ->setLastName($lastName)
             ->setEmail($email)
             ->setPhone($phone)
             ->setPassword($password)
             ->setPin($pin)
             ->setRoles($roles);

        if(in_array('ROLE_TECHNICIAN', $roles)){
            $user->setCertification($certification)
                 ->setExperience($experience);
        }

        $this->em->persist($user);
        $this->em->flush();

        return true;
    }

}
