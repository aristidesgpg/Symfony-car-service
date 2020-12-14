<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class InternalMessageController extends AbstractController
{
    /**
     * @Route("/internal/message", name="internal_message")
     */
    public function index()
    {
        return $this->render('internal_message/index.html.twig', [
            'controller_name' => 'InternalMessageController',
        ]);
    }
}
