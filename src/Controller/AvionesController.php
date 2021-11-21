<?php

namespace App\Controller;

use App\Entity\Aviones;
use App\Form\AvionesType;
use App\Repository\AvionesRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @Route("/aviones")
 */
class AvionesController extends AbstractController
{
    /*Ruta que devuelve la vista de la página principal de aviones */
    
    /**
     * @Route("/", name="aviones_principal")
     */
    public function principal(){
        return $this->render('aviones/principal_bases.html.twig');
    }

    /*Ruta que devuelve la lista de aviones con todos sus campos y lo visualiza en la página index.
    *Esta página también contiene el paginador que mediante el dql obtiene todo el array de objetos de
    *vuelos
    *El paginador muestra la cantidad de filas que le pasamos por parámetros y divide la paǵina en 
    *pequeñas listas de visualizaciones para así ver por completo el contenido.
    */

    /**
     * @Route("/index", name="aviones_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $em, PaginatorInterface $paginator, Request $request): Response
    {
        $dql   = "SELECT a FROM App:Aviones a";
        $query = $em->createQuery($dql);
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            5 /*limit per page*/
        );
        return $this->render('aviones/index.html.twig', [
            'pagination' => $pagination,
        ]);
    }

    /** 
     * Esta página crea nuevos aviones con el form que autogeneró el crud.
     * Con esto podemos crear aviones desde la pantalla principal y designarle esta tarea
     * a un usuario específico.
    */
    
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
