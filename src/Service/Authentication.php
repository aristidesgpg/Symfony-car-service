<?php

namespace App\Service;

use App\Entity\User;
use FOS\RestBundle\View\View;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Exception\JWTEncodeFailureException;
use Symfony\Component\HttpFoundation\Response;

class Authentication {
    /**
     * @var WordpressLogin
     */
    private $wordpressLogin;

    /**
     * @var JWTEncoderInterface
     */
    private $jwtEncoder;

    /**
     * Authentication constructor.
     *
     * @param WordpressLogin      $wordpressLogin
     * @param JWTEncoderInterface $JWTEncoder
     */
    public function __construct (WordpressLogin $wordpressLogin, JWTEncoderInterface $JWTEncoder) {
        $this->wordpressLogin = $wordpressLogin;
        $this->jwtEncoder     = $JWTEncoder;
    }

    /**
     * @param string $username
     * @param string $password
     *
     * @return bool|string
     */
    public function wordpressLogin (string $username, string $password) {
        return $this->wordpressLogin->validateUserPassword($username, $password);
    }

    /**
     * @param string $tokenUsername
     * @param int    $ttl
     *
     * @return string|bool
     */
    public function getJWT (string $tokenUsername, int $ttl) {
        try {
            $token = $this->jwtEncoder->encode([
                'username' => $tokenUsername,
                'exp'      => time() + $ttl
            ]);
        } catch (JWTEncodeFailureException $e) {
            return false;
        }

        return $token;
    }
}
