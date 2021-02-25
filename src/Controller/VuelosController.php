<?php

namespace App\Controller;

use App\Entity\Vuelos;
use App\Form\VuelosType;
use App\Repository\VuelosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/vuelos")
 */
class VuelosController extends AbstractController
{
    /**
     * @Route("/", name="vuelos_principal")
     */
    public function principal()
    {
        return $this->render('vuelos/principal_vuelos.html.twig');
    }
    /**
     * @Route("/index", name="vuelos_index", methods={"GET"})
     */
    public function index(VuelosRepository $vuelosRepository): Response
    {
        return $this->render('vuelos/index.html.twig', [
            'vuelos' => $vuelosRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="vuelos_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $vuelo = new Vuelos();
        $form = $this->createForm(VuelosType::class, $vuelo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($vuelo);
            $entityManager->flush();

            return $this->redirectToRoute('vuelos_index');
        }

        return $this->render('vuelos/new.html.twig', [
            'vuelo' => $vuelo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/show", name="vuelos_show", methods={"GET"})
     */
    public function show(Vuelos $vuelo): Response
    {
        return $this->render('vuelos/show.html.twig', [
            'vuelo' => $vuelo,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="vuelos_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Vuelos $vuelo): Response
    {
        $form = $this->createForm(VuelosType::class, $vuelo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vuelos_index');
        }

        return $this->render('vuelos/edit.html.twig', [
            'vuelo' => $vuelo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="vuelos_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Vuelos $vuelo): Response
    {
        if ($this->isCsrfTokenValid('delete'.$vuelo->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($vuelo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('vuelos_index');
    }
}
