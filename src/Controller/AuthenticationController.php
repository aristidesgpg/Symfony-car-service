<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\RepairOrderRepository;
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
     * @param RepairOrderRepository        $repairOrderRepository
     *
     * @return Response
     */
    public function authenticateAction (Request $request, UserPasswordEncoderInterface $passwordEncoder,
                                        JWTEncoderInterface $JWTEncoder, RepairOrderRepository $repairOrderRepository) {
        $username      = $request->get('username');  // tperson@iserviceauto.com
        $password      = $request->get('password');  // test
        $linkHash      = $request->get('link_hash'); // a94a8fe5ccb19ba61c4c0873d391e987982fbbd3
        $tokenUsername = null;

        if ((!$username || !$password) && !$linkHash) {
            goto INVALID;
        }

        if ($username) {
            /** @var User $user */
            $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(['email' => $username]);

            // User was found
            if ($user) {
                $isValid = $passwordEncoder->isPasswordValid($user, $password);

                // But it was invalid
                if (!$isValid) {
                    goto INVALID;
                }

                // Successful regular user login
                $tokenUsername = $user->getEmail();
                goto TOKEN;
            }
        }

        // Logging in from customer side
        if ($linkHash) {
            $repairOrder = $repairOrderRepository->findByUID($linkHash);
            if (!$repairOrder){
                goto INVALID;
            }

            // Successful customer "login"
            $tokenUsername = '8479025995';
            goto TOKEN;
        }

        // @TODO: Tech login

        INVALID:
        return $this->handleView($this->view('Invalid Login', Response::HTTP_FORBIDDEN));

        TOKEN:
        try {
            $token = $JWTEncoder->encode([
                'username' => $tokenUsername
            ]);
        } catch (JWTEncodeFailureException $e) {
            return $this->handleView($this->view('Login Failed. Please try again later.', Response::HTTP_INTERNAL_SERVER_ERROR));
        }

        return $this->handleView($this->view(['token' => $token], Response::HTTP_OK));
    }
}
