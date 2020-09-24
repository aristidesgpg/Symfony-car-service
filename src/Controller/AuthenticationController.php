<?php

namespace App\Controller;

use App\Service\SlackClient;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AuthenticationController
 *
 * @package App\Controller
 *
 * @Route("/authentication")
 */
class AuthenticationController {

    /**
     * @Route("/authenticate", methods={"POST"})
     *
     * @param Request         $request
     * @param SlackClient     $slack
     *
     * @return JsonResponse
     */
    public function authenticate (Request $request, SlackClient $slack) {
        $test = ['test' => 'test'];

        $slack->sendMessage('Khan', 'Ah, Kirk, my old friend...');

        return new JsonResponse($test);
    }
}
