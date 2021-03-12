<?php

namespace App\Service;

use App\Entity\ForgotPassword;
use App\Entity\User;
use App\Repository\ForgotPasswordRepository;
use App\Repository\UserRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class SecurityHelper.
 */
class SecurityHelper
{
    /**
     * @var Container
     */
    private $container;

    /**
     * @var string
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
     */
    public function __construct(Container $container, UserPasswordEncoderInterface $passwordEncoder, UserRepository $userRepository, ForgotPasswordRepository $forgotPasswordRepository, EntityManagerInterface $em)
    {
        $this->container = $container;
        $this->secret = $this->container->getParameter('reset_password_secret');
        $this->passwordEncoder = $passwordEncoder;
        $this->userRepository = $userRepository;
        $this->forgotPasswordRepository = $forgotPasswordRepository;
        $this->em = $em;
    }

    /**
     * @return bool
     */
    public function validateSecurity(User $user, string $answer)
    {
        //validate params
        if (!$user || !$answer) {
            return false;
        }
        //check answer
        if (!password_verify(strtolower($answer), $user->getSecurityAnswer())) {
            return false;
        }

        return true;
    }

    /**
     * @return string
     */
    public function generateToken(User $user, string $email)
    {
        //generate token
        $raw = password_hash($email, PASSWORD_DEFAULT);
        $pattern = "/[\/]+/i";
        $token = preg_replace($pattern, '', $raw);

        // get expired date
        $date = (new DateTime())->modify('+1 hour');

        // save forgot password token in table
        $forgotPassword = $this->forgotPasswordRepository->findOneBy(['user' => $user->getId()]);

        if (!$forgotPassword) {
            $forgotPassword = new ForgotPassword();
            $forgotPassword->setUser($user->getId());
        }

        $forgotPassword->setToken($token)->setExpirationDate($date)->setUsed(false);
        $this->em->persist($forgotPassword);
        $this->em->flush();

        return $token;
    }

    /**
     * @return bool
     */
    public function validateToken(string $token)
    {
        //find the token on the table
        $forgotPassword = $this->forgotPasswordRepository->findOneBy([
            'token' => $token,
            'used' => false,
        ]);

        if (!$forgotPassword) {
            return false;
        }

        // check the expiration time - note this will cause an error if there is no 'exp' claim in the token
        $expiration = $forgotPassword->getExpirationDate();
        $now = new DateTime();
        $tokenExpired = $now > $expiration;

        // verify it matches the token
        $signatureValid = ($token == $forgotPassword->getToken());

        if ($tokenExpired || !$signatureValid) {
            return false;
        }

        return true;
    }

    /**
     * @return bool
     */
    public function resetPassword(string $token, string $password)
    {
        //find the token on the table
        $forgotPassword = $this->forgotPasswordRepository->findOneBy([
            'token' => $token,
            'used' => false,
        ]);

        //if token does not exist
        if (!$forgotPassword) {
            return false;
        }

        // get User
        $user = $this->userRepository->find($forgotPassword->getUser());

        //reset pasword for the User
        $user->setPassword($this->passwordEncoder->encodePassword($user, $password));
        //once verified, set used true
        $forgotPassword->setUsed(true);

        $this->em->persist($forgotPassword);

        $this->em->persist($user);
        $this->em->flush();

        return true;
    }
}
