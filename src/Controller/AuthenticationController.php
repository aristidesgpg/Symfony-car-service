<?php

namespace App\Controller;

use App\Entity\User;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\Route;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Exception\JWTEncodeFailureException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class AuthenticationController
 *
 * @package App\Controller
 * @Route("/api/authentication")
 */
class AuthenticationController extends AbstractFOSRestController {

    /**
     * @Rest\Post("/authenticate")
     *
     * @param Request                      $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param JWTEncoderInterface          $JWTEncoder
     *
     * @return Response
     */
    public function authenticateAction (Request $request, UserPasswordEncoderInterface $passwordEncoder, JWTEncoderInterface $JWTEncoder) {
        $data     = json_decode($request->getContent());
        $username = $data->username;
        $password = $data->password;

        /** @var User $user */
        $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(['email' => $username]);

        if (!$user) {
            return new JsonResponse('Invalid Login', Response::HTTP_FORBIDDEN);
        }

        $isValid = $passwordEncoder->isPasswordValid($user, $password);

        if (!$isValid) {
            return new JsonResponse('Invalid Login', Response::HTTP_FORBIDDEN);
        }

        try {
            $token = $JWTEncoder->encode([
                'username' => $user->getEmail()
            ]);
        } catch (JWTEncodeFailureException $e) {
            return new JsonResponse('Login Failed. Please try again later.', Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return new JsonResponse(['token' => $token]);
    }
}
