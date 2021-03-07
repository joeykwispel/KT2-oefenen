<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WinkelmandController extends AbstractController
{
    /**
     * @Route("/winkelmand", name="winkelmand")
     */
    public function index(): Response
    {
        return $this->render('winkelmand/index.html.twig', [
            'controller_name' => 'WinkelmandController',
        ]);
    }
}
