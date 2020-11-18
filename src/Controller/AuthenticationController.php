<?php

namespace App\Controller;

use App\Entity\User;
use App\Helper\iServiceLoggerTrait;
use App\Repository\RepairOrderRepository;
use App\Service\PasswordHelper;
use App\Service\SettingsHelper;
use App\Service\WordpressLogin;
use Exception;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Exception\JWTEncodeFailureException;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class AuthenticationController
 *
 * @package App\Controller
 */
class AuthenticationController extends AbstractFOSRestController {
    use iServiceLoggerTrait;

    /**
     * @Rest\Post("/api/authentication/authenticate")
     *
     * @SWG\Tag(name="Authentication")
     * @SWG\Post(description="Endpoint to authenticate with the back-end. Needs to be either a user/pass combo, a
     *                                 user/pin combo, or just a link hash (customer app)")
     * @SWG\Parameter(
     *     name="username",
     *     in="formData",
     *     required=false,
     *     type="string",
     *     description="The username/email of the account",
     * )
     * @SWG\Parameter(
     *     name="password",
     *     in="formData",
     *     required=false,
     *     type="string",
     *     description="The password of the account",
     * )
     * @SWG\Parameter(
     *     name="linkHash",
     *     in="formData",
     *     required=false,
     *     type="string",
     *     description="Link Hash from customer app",
     * )
     * @SWG\Parameter(
     *     name="pin",
     *     in="formData",
     *     required=false,
     *     type="string",
     *     description="Pin for the user if not using a password to login",
     * )
     * @SWG\Response(
     *     response=200,
     *     description="Returns a JWT token",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="token", type="string", description="JSON Web Token"),
     *         )
     * )
     * @SWG\Response(
     *     response=403,
     *     description="Invalid Login",
     * )
     * @SWG\Response(
     *     response=500,
     *     description="Login Failed. Please try again later."
     * )
     *
     * @param Request                      $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param JWTEncoderInterface          $JWTEncoder
     * @param RepairOrderRepository        $repairOrderRepository
     * @param SettingsHelper               $settingsHelper
     * @param PasswordHelper               $passwordHelper
     * @param WordpressLogin               $wordpressLogin
     *
     * @return Response
     */
    public function authenticateAction (Request $request, UserPasswordEncoderInterface $passwordEncoder,
                                        JWTEncoderInterface $JWTEncoder, RepairOrderRepository $repairOrderRepository,
                                        SettingsHelper $settingsHelper, PasswordHelper $passwordHelper,
                                        WordpressLogin $wordpressLogin) {
        $username      = $request->get('username');  // tperson@iserviceauto.com
        $password      = $request->get('password');  // test
        $linkHash      = $request->get('linkHash');  // a94a8fe5ccb19ba61c4c0873d391e987982fbbd3
        $pin           = $request->get('pin');
        $tokenUsername = null;

        if ((!$username || !$password) && !$linkHash && (!$username || !$pin)) {
            goto INVALID;
        }

        // Standard login
        if ($username && $password) {
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

        // Tech Pin login
        if ($username && $pin) {
            /** @var User $user */
            $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(['email' => $username]);

            // User was found
            if ($user) {
                // Validate if tech
                if (!$user->isTechnician()) {
                    goto INVALID;
                }

                $isValid = $pin === $user->getPin();

                // But it was invalid
                if (!$isValid) {
                    goto INVALID;
                }

                // Successful regular user login
                $tokenUsername = $user->getEmail();
                goto TOKEN;
            }
        }

        // Logging in from customer app
        if ($linkHash) {
            $repairOrder = $repairOrderRepository->findByUID($linkHash);
            if (!$repairOrder) {
                goto INVALID;
            }

            // Successful customer "login"
            $tokenUsername = $repairOrder->getPrimaryCustomer()->getPhone();
            goto TOKEN;
        }

        // Logging in from tech app
        if ($username) {
            try {
                $techAppUsername = $settingsHelper->getSetting('techAppUsername');
                $techAppPassword = $settingsHelper->getSetting('techAppPassword');

                if ($username === $techAppUsername) {
                    if ($passwordHelper->validatePassword($password, $techAppPassword)) {
                        $tokenUsername = 'technician';
                        goto TOKEN;
                    } else {
                        goto INVALID;
                    }
                }
            } catch (Exception $e) {
                $this->logInfo('Technician App Username not found in settings and wasn\'t created.');
            }
        }

        // WP admin
        if ($username && $password) {
            // First try dealer
            $dealerResponse = $wordpressLogin->validateUserPassword($username, $password);

            if ($dealerResponse) {
                $tokenUsername = 'dealer';
                goto TOKEN;
            }

            // Now try iService agent
//            $agentResponse = $wordpressLogin->validateUserPassword($username, $password, false);
//            if ($agentResponse) {
//                $tokenUsername = 'iservice';
//                goto TOKEN;
//            }
        }

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
