<?php

namespace App\Service;

use App\Entity\User;
use App\Entity\ForgotPassword;
use App\Repository\UserRepository;
use App\Repository\ForgotPasswordRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;
/**
 * Class SecurityHelper
 *
 * @package App\Service
 */
class SecurityHelper {
    /**
     * @var Container
     */
    private $container;

    /**
     * @var String
     */
    private $secret;

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var ForgotPasswordRepository
     */
    private $forgotPasswordRepository;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * SecurityHelper constructor.
     *
     */
    public function __construct (Container $container, UserPasswordEncoderInterface $passwordEncoder, UserRepository $userRepository, ForgotPasswordRepository $forgotPasswordRepository, EntityManagerInterface $em) {
        $this->container                 = $container;
        $this->secret                    = $this->container->getParameter('reset_password_secret');
        $this->passwordEncoder           = $passwordEncoder;
        $this->userRepository            = $userRepository;
        $this->forgotPasswordRepository  = $forgotPasswordRepository;
        $this->em                        = $em;
    }

    /**
     * @param  User   $user
     * @param  String $answer
     * 
     * @return Boolean
     */
    public function validateSecurity(User $user, String $answer){
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

    /**
     * @param  User   $user
     * @param  String $email
     * 
     * @return String
     */
    public function generateToken(User $user, String $email){
        //generate token
        $token = password_hash($email, PASSWORD_DEFAULT);
        //get expired date
        $date  = date('Y-m-d H:i:s', strtotime('1 hour'));
        //save forgot password token in table
        $forgotPassword = $this->forgotPasswordRepository->findOneBy(["user" => $user->getId()]);
        if(!$forgotPassword){
            $forgotPassword = new ForgotPassword();
            $forgotPassword->setUser($user->getId());
        }
        $forgotPassword->setToken($token)->setExpirationDate(new \DateTime($date));
        $this->em->persist($forgotPassword);
        $this->em->flush();

        return $token;
    }

    /**
     * @param  String $token
     * 
     * @return Boolean
     */
    public function validateToken(String $token){
        //find the token on the table
        $forgotPassword = $this->forgotPasswordRepository->findOneBy([
            "token" => $token,
            "used"  => false,
        ]);

        if(!$token){
            return false;
        }

        // check the expiration time - note this will cause an error if there is no 'exp' claim in the token
        $expiration         = $forgotPassword->getExpirationDate();
        $now                = new \DateTime();
        $tokenExpired       = $now > $expiration;

        // verify it matches the token
        $signatureValid     = ($token == $forgotPassword->getToken());

        if ($tokenExpired || !$signatureValid) {
            return false;
        }

        //once verified, set used true
        $forgotPassword->setUsed(true);
        $this->em->persist($forgotPassword);
        $this->em->flush();

        return true;
    }

    /**
     * @param  String $token
     * @param  String $password
     * 
     * @return Boolean
     */
    public function resetPassword(String $token, String $password){
        //find the token on the table
        $forgotPassword = $this->forgotPasswordRepository->findOneBy([
            "token" => $token
        ]);
        
        //if token does not exist
        if(!$forgotPassword){
            return false;
        }
        
        // get User
        $user = $this->userRepository->findOne($forgotPassword->getUser());
        //reset pasword for the User
        $user->setPassword($this->passwordEncoder->encodePassword($user, $password));

        $this->em->persist($user);
        $this->em->flush();

        return true;
    }
}
