<?php

namespace App\Controller;

use Http\Client\Exception;
use Nexy\Slack\Client;
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
     * @param LoggerInterface $iserviceLogger
     * @param Client          $slack
     *
     * @return JsonResponse
     */
    public function authenticate (Request $request, LoggerInterface $iserviceLogger, Client $slack) {
        $test = ['test' => 'test'];

        $iserviceLogger->info('bacon2');

        $message = $slack->createMessage()->from('khan')->withIcon(':ghost:')->setText('Ah, Kirk, my old friend...');
        try {
            $slack->sendMessage($message);
        } catch (Exception $e) {
            return new JsonResponse($e->getMessage());
        }

        return new JsonResponse($test);
    }
}
