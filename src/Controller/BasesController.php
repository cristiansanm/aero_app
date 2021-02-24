<?php

namespace App\Controller;

use App\Entity\Aviones;
use App\Entity\Bases;
use App\Entity\Personal;
use App\Form\AvionesType;
use App\Form\BasesType;
use App\Repository\AvionesRepository;
use App\Repository\BasesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * @Route("/bases")
 */
class BasesController extends AbstractController
{
    /**
     * @Route("/", name="bases_principal")
     */
    public function principal(){
        return $this->render('bases/principal_bases.html.twig');
    }
    /**
     * @Route("/index", name="bases_index", methods={"GET"})
     */
    public function index(BasesRepository $basesRepository): Response
    {
        return $this->render('bases/index.html.twig', [
            'bases' => $basesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="bases_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $basis = new Bases();
        $form = $this->createForm(BasesType::class, $basis);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($basis);
            $entityManager->flush();

            return $this->redirectToRoute('bases_index');
        }

        return $this->render('bases/new.html.twig', [
            'basis' => $basis,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bases_show", methods={"GET"})
     */
    public function show(Bases $basis): Response
    {
        return $this->render('bases/show.html.twig', [
            'basis' => $basis,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="bases_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Bases $basis): Response
    {
        $form = $this->createForm(BasesType::class, $basis);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bases_index');
        }

        return $this->render('bases/edit.html.twig', [
            'basis' => $basis,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bases_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Bases $basis): Response
    {
        if ($this->isCsrfTokenValid('delete'.$basis->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($basis);
            $entityManager->flush();
        }

        return $this->redirectToRoute('bases_index');
    }
    /**
     * @Route ("/baseid", name="base_id")
     */
    public function listaId(BasesRepository $base){
        return $this->render('bases' => $base);
    }
}
