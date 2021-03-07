<?php

namespace App\Controller;

use App\Repository\ProductenRepository;
use App\Repository\SubProductenRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index(ProductenRepository $productenRepository, SubProductenRepository $subProductenRepository): Response
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'Welcome',
            'productens' => $productenRepository->findAll(),
            'sub_productens' => $subProductenRepository->findAll(),
        ]);
    }
}
