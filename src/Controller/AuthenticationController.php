<?php

namespace App\Controller;

use App\Entity\User;
use App\Helper\iServiceLoggerTrait;
use App\Repository\RepairOrderRepository;
use App\Repository\UserRepository;
use App\Service\Authentication;
use App\Service\PasswordHelper;
use App\Service\SettingsHelper;
use Exception;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
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
     *             @SWG\Property(
     *                  property="roles",
     *                  type="array",
     *                  description="Array of user roles granted",
     *                  @SWG\Items(type="string", description="ex: ROLE_ADVISOR")
     *             )
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
     * @param RepairOrderRepository        $repairOrderRepository
     * @param SettingsHelper               $settingsHelper
     * @param PasswordHelper               $passwordHelper
     * @param Authentication               $authentication
     * @param UserRepository               $userRepository
     *
     * @return Response
     */
    public function authenticateAction (Request $request, UserPasswordEncoderInterface $passwordEncoder,
                                        RepairOrderRepository $repairOrderRepository, SettingsHelper $settingsHelper,
                                        PasswordHelper $passwordHelper, Authentication $authentication,
                                        UserRepository $userRepository): Response {
        $username = $request->get('username');  // tperson@iserviceauto.com
        $password = $request->get('password');  // test
        $linkHash = $request->get('linkHash');  // a94a8fe5ccb19ba61c4c0873d391e987982fbbd3
        $pin      = $request->get('pin');       // 1234

        // Defaults
        $tokenUsername = null;
        $roles         = null;
        $ttl           = 28800; // Default 8 hours
        $reason        = null;
        $user          = null;

        // Something wasn't passed
        if ((!$username || !$password) && !$linkHash && (!$username || !$pin)) {
            $reason = 'Failed Login. Reason: Missing required parameters';
            goto INVALID_LOGIN;
        }

        // Standard user login
        if ($username && $password) {
            /** @var User $user */
            $user = $userRepository->findOneBy(['email' => $username]);

            // User was found...
            if ($user) {
                $isValid = $passwordEncoder->isPasswordValid($user, $password);

                // But it was invalid
                if (!$isValid) {
                    $reason = 'Failed Login for user' . $user->getId() . '. Reason: User was found but password was invalid';
                    goto INVALID_LOGIN;
                }

                // Successful regular user login
                $tokenUsername = $user->getEmail();
                $roles         = $user->getRoles();

                goto LOGIN;
            }
        }

        // Tech Pin login
        if ($username && $pin) {
            /** @var User $user */
            $user = $userRepository->findOneBy(['email' => $username]);

            // User was found
            if ($user) {
                // It wasn't a tech, only techs have pins
                if (!$user->isTechnician()) {
                    $reason = 'Failed Tech Login for user ' . $user->getEmail() . '. Reason: Not a technician';
                    goto INVALID_LOGIN;
                }

                $isValid = $pin === $user->getPin();

                // Invalid pin
                if (!$isValid) {
                    $reason = 'Failed Tech Login for user ' . $user->getEmail() . '. Reason: Wrong pin';
                    goto INVALID_LOGIN;
                }

                // Successful regular user login
                $tokenUsername = $user->getEmail();
                $roles         = $user->getRoles();
                $ttl           = 3600; // Techs get logged in 1 hour

                goto LOGIN;
            }
        }

        // Logging in from customer app
        if ($linkHash) {
            $repairOrder = $repairOrderRepository->findByUID($linkHash);
            if (!$repairOrder) {
                $reason = 'Failed Customer Login. Reason: Repair Order not found';
                goto INVALID_LOGIN;
            }

            // Successful customer "login"
            $tokenUsername = $repairOrder->getPrimaryCustomer()->getPhone();
            $roles         = ['ROLE_CUSTOMER'];

            goto LOGIN;
        }

        // Logging in from tech app OR trying to use wordpress credentials
        if ($username) {
            try {
                $techAppUsername = $settingsHelper->getSetting('techAppUsername');
                $techAppPassword = $settingsHelper->getSetting('techAppPassword');
            } catch (Exception $e) {
                return $this->handleView($this->view('Technician app settings have not been set up yet', Response::HTTP_NOT_ACCEPTABLE));
            }

            if ($username === $techAppUsername) {
                if ($passwordHelper->validatePassword($password, $techAppPassword)) {
                    $tokenUsername = 'technician';
                    $roles         = ['ROLE_TECHNICIAN'];
                    $ttl           = 31536000; // 1 year

                    goto LOGIN;
                }

                $reason = 'Failed Tech App Login. Reason: Invalid Tech App Credentials';
                goto INVALID_LOGIN;
            }

            // Try to login via wordpress credentials
            $username = $authentication->wordpressLogin($username, $password);

            if (!$username) {
                $reason = 'Failed Admin Login. Reason: Invalid Wordpress Credentials';
                goto INVALID_LOGIN;
            }

            $user = $userRepository->findOneBy(['email' => $username]);
            if (!$user) {
                $reason = 'Failed Admin Login for user ' . $username . '. Reason: Wordpress Credentials are correct but user is not on this server';
                goto INVALID_LOGIN;
            }

            $tokenUsername = $user->getEmail();
            $roles         = ['ROLE_ADMIN'];

            goto LOGIN;
        }

        LOGIN:

        // Last check validation before we make the token
        if (!$tokenUsername) {
            $reason = 'Failed Login. Reason: No $tokenUsername found';
            goto INVALID_LOGIN;
        }

        if (!$roles){
            $reason = 'Failed Login. Reason: No $roles found';
            goto INVALID_LOGIN;
        }

        // Create the token
        $token = $authentication->getJWT($tokenUsername, $ttl);

        // Something went wrong trying to get the token
        if (!$token) {
            $this->logger->critical('A JWT was unable to be built', ['username' => $tokenUsername, 'ttl' => $ttl, 'roles' => $roles]);
            return $this->handleView($this->view('Something went wrong. Please try again later', Response::HTTP_INTERNAL_SERVER_ERROR));
        }

        $view = $this->view([
            'token' => $token,
            'roles' => $roles,
            'user'  => $user
        ]);

        if ($user instanceof User) {
            $view->getContext()->setGroups(['user_list']);
        }

        return $this->handleView($view);

        INVALID_LOGIN:

        $this->logInfo($reason);
        return $this->handleView($this->view('Invalid Login', Response::HTTP_FORBIDDEN));
    }
}
