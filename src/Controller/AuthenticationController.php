<?php

namespace App\Controller;

use App\Service\MarkdownHelper;
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
     *
     * @return JsonResponse
     */
    public function authenticate (Request $request, LoggerInterface $iserviceLogger) {
        $test = ['test' => 'test'];

        $iserviceLogger->info('bacon2');

        return new JsonResponse($test);
    }
}
