<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DefaultController
 *
 * @package App\Controller
 */
class DefaultController extends AbstractController {

    /**
     * @Route("/")
     *
     * @return Response
     */
    public function index () {
        return new Response('home page');
    }

    /**
     * @Route("/test/{slug}")
     *
     * @param $slug
     *
     * @return Response
     */
    public function test ($slug) {
        return $this->render('default/test.html.twig', [
            'slug' => $slug
        ]);
    }
}
