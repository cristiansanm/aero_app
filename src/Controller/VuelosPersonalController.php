<?php

namespace App\Controller;

use App\Entity\VuelosPersonal;
use App\Form\VuelosPersonalType;
use App\Repository\VuelosPersonalRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/vuelos/personal")
 */
class VuelosPersonalController extends AbstractController
{
    /**
     * @Route("/", name="vuelos_personal_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $em, Request $request, PaginatorInterface $paginator): Response
    {
        $dql   = "SELECT vp FROM App:VuelosPersonal vp";
        $query = $em->createQuery($dql);
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );
        return $this->render('vuelos_personal/index.html.twig', [
            'pagination' => $pagination,
        ]);
    }

    /**
     * @Route("/new", name="vuelos_personal_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $vuelosPersonal = new VuelosPersonal();
        $form = $this->createForm(VuelosPersonalType::class, $vuelosPersonal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($vuelosPersonal);
            $entityManager->flush();

            return $this->redirectToRoute('vuelos_index');
        }

        return $this->render('vuelos_personal/new.html.twig', [
            'vuelos_personal' => $vuelosPersonal,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/show", name="vuelos_personal_show", methods={"GET"})
     */
    public function show(VuelosPersonal $vuelosPersonal): Response
    {
        return $this->render('vuelos_personal/show.html.twig', [
            'vuelos_personal' => $vuelosPersonal,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="vuelos_personal_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, VuelosPersonal $vuelosPersonal): Response
    {
        $form = $this->createForm(VuelosPersonalType::class, $vuelosPersonal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vuelos_personal_index');
        }

        return $this->render('vuelos_personal/edit.html.twig', [
            'vuelos_personal' => $vuelosPersonal,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="vuelos_personal_delete", methods={"DELETE"})
     */
    public function delete(Request $request, VuelosPersonal $vuelosPersonal): Response
    {
        if ($this->isCsrfTokenValid('delete'.$vuelosPersonal->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($vuelosPersonal);
            $entityManager->flush();
        }

        return $this->redirectToRoute('vuelos_personal_index');
    }
}
