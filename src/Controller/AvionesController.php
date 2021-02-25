<?php

namespace App\Controller;

use App\Entity\Aviones;
use App\Form\AvionesType;
use App\Repository\AvionesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/aviones")
 */
class AvionesController extends AbstractController
{
    /**
     * @Route("/", name="aviones_principal")
     */
    public function principal(){
        return $this->render('aviones/principal_bases.html.twig');
    }
    /**
     * @Route("/index", name="aviones_index", methods={"GET"})
     */
    public function index(AvionesRepository $avionesRepository): Response
    {
        return $this->render('aviones/index.html.twig', [
            'aviones' => $avionesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="aviones_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $avione = new Aviones();
        $form = $this->createForm(AvionesType::class, $avione);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($avione);
            $entityManager->flush();

            return $this->redirectToRoute('aviones_index');
        }

        return $this->render('aviones/new.html.twig', [
            'avione' => $avione,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/show", name="aviones_show", methods={"GET"})
     */
    public function show(Aviones $avione): Response
    {
        return $this->render('aviones/show.html.twig', [
            'avione' => $avione,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="aviones_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Aviones $avione): Response
    {
        $form = $this->createForm(AvionesType::class, $avione);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('aviones_index');
        }

        return $this->render('aviones/edit.html.twig', [
            'avione' => $avione,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="aviones_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Aviones $avione): Response
    {
        if ($this->isCsrfTokenValid('delete'.$avione->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($avione);
            $entityManager->flush();
        }

        return $this->redirectToRoute('aviones_index');
    }
}
