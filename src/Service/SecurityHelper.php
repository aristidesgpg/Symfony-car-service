<?php

namespace App\Service;

use App\Entity\User;
use App\Repository\UserRepository;
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
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * SecurityHelper constructor.
     *
     */
    public function __construct (Container $container, UserPasswordEncoderInterface $passwordEncoder, UserRepository $userRepository, EntityManagerInterface $em) {
        $this->container       = $container;
        $this->secret          = $this->container->getParameter('reset_password_secret');
        $this->passwordEncoder = $passwordEncoder;
        $this->userRepository  = $userRepository;
        $this->em              = $em;
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
     * @param  String $text
     * 
     * @return Boolean
     */
    public function base64UrlEncode(String $text)
    {
        return str_replace(
            ['+', '/', '='],
            ['-', '_', ''],
            base64_encode($text)
        );
    }

    /**
     * @param  String $email
     * 
     * @return String
     */
    public function generateToken(String $email){
        // Create the token header
        $header = json_encode([
            'typ' => 'JWT',
            'alg' => 'HS256'
        ]);
        // Create the token payload
        $payload = json_encode([
            'email' => $email,
            'exp'   => date('Y-m-d H:i:s', strtotime('1 hour'))
        ]);

        // Encode Header
        $base64UrlHeader    = $this->base64UrlEncode($header);
        // Encode Payload
        $base64UrlPayload   = $this->base64UrlEncode($payload);
        // Create Signature Hash
        $signature          = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $this->secret, true);
        // Encode Signature to Base64Url String
        $base64UrlSignature = $this->base64UrlEncode($signature);
        // Create Token
        $token              = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;

        return $token;
    }

    /**
     * @param  String $token
     * 
     * @return Boolean
     */
    public function validateToken(String $token){
        // split the token
        $tokenParts         = explode('.', $token);
        $header             = base64_decode($tokenParts[0]);
        $payload            = base64_decode($tokenParts[1]);
        $signatureProvided  = $tokenParts[2];

        // check the expiration time - note this will cause an error if there is no 'exp' claim in the token
        $expiration         = date(json_decode($payload)->exp);
        $now                = date('Y-m-d H:i:s');
        $tokenExpired       = $now > $expiration;

        // build a signature based on the header and payload using the secret
        $base64UrlHeader    = $this->base64UrlEncode($header);
        $base64UrlPayload   = $this->base64UrlEncode($payload);
        $signature          = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $this->secret, true);
        $base64UrlSignature = $this->base64UrlEncode($signature);

        // verify it matches the signature provided in the token
        $signatureValid     = ($base64UrlSignature === $signatureProvided);

        if ($tokenExpired || !$signatureValid) {
            return false;
        }

        return true;
    }

    /**
     * @param  String $token
     * @param  String $password
     * 
     * @return Boolean
     */
    public function resetPassword(String $token, String $password){
        //if token is valid
        if(!$this->validateToken($token) || !$password){
            return false;
        }
        // split the token
        $tokenParts = explode('.', $token);
        $payload    = base64_decode($tokenParts[1]);
        // get the email from payload
        $email      = json_decode($payload)->email;
        // get User from email
        $user       = $this->userRepository->findOneByEmail($email);
        //reset pasword for the User
        $user->setPassword($this->passwordEncoder->encodePassword($user, $password));

        $this->em->persist($user);
        $this->em->flush();

        return true;
    }
}
