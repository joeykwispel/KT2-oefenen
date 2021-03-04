<?php

namespace App\Controller;

use App\Entity\SubProducten;
use App\Form\SubProductenType;
use App\Repository\SubProductenRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/sub/producten")
 */
class SubProductenController extends AbstractController
{
    /**
     * @Route("/", name="sub_producten_index", methods={"GET"})
     */
    public function index(SubProductenRepository $subProductenRepository): Response
    {
        return $this->render('sub_producten/index.html.twig', [
            'sub_productens' => $subProductenRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="sub_producten_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $subProducten = new SubProducten();
        $form = $this->createForm(SubProductenType::class, $subProducten);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($subProducten);
            $entityManager->flush();

            return $this->redirectToRoute('sub_producten_index');
        }

        return $this->render('sub_producten/new.html.twig', [
            'sub_producten' => $subProducten,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sub_producten_show", methods={"GET"})
     */
    public function show(SubProducten $subProducten): Response
    {
        return $this->render('sub_producten/show.html.twig', [
            'sub_producten' => $subProducten,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="sub_producten_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, SubProducten $subProducten): Response
    {
        $form = $this->createForm(SubProductenType::class, $subProducten);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sub_producten_index');
        }

        return $this->render('sub_producten/edit.html.twig', [
            'sub_producten' => $subProducten,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sub_producten_delete", methods={"DELETE"})
     */
    public function delete(Request $request, SubProducten $subProducten): Response
    {
        if ($this->isCsrfTokenValid('delete'.$subProducten->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($subProducten);
            $entityManager->flush();
        }

        return $this->redirectToRoute('sub_producten_index');
    }
}
