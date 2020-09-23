<?php

namespace App\Controller;

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
     * @param Request          $request
     *
     * @return JsonResponse
     */
    public function authenticate (Request $request) {
        $test = ['test' => 'test'];

        return new JsonResponse($test);
    }
}
