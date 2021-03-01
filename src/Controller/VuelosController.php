<?php

namespace App\Controller;

use App\Entity\Vuelos;
use App\Form\VuelosType;
use App\Repository\AvionesRepository;
use App\Repository\CiudadesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
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
    public function index(EntityManagerInterface $em, Request $request, PaginatorInterface $paginator): Response
    {
        $dql   = "SELECT v FROM App:Vuelos v";
        $query = $em->createQuery($dql);
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );
        return $this->render('vuelos/index.html.twig', [
            'pagination'=>$pagination,
        ]);
    }

    /**
     * @Route("/new", name="vuelos_new", methods={"GET","POST"})
     */
    public function new(Request $request, AvionesRepository $a, CiudadesRepository $c): Response
    {
        $vuelo = new Vuelos();
        
        $origen = $request->query->get('origen', null);
        $destino = $request->query->get('destino', null);
        $fecha = $request->query->get('fecha', null);
        $hora = $request->query->get('hora', null);
        $avion = $request->query->get('avion', 1);


        if ($origen != null && $destino != null && $fecha != null && $hora != null && $avion != null) {
            $or = $c->findByOrigenOne($origen);
            $des = $c->findByDestinoOne($destino);
            $avi = $a->findByAvionOne($avion);
            $fec = new \DateTime($fecha);
            $hor = new \DateTime($hora);
            $vuelo = $vuelo->setOrigen($or);
            $vuelo = $vuelo->setDestino($des);
            $vuelo = $vuelo->setFecha($fec);
            $vuelo = $vuelo->setHora($hor);
            $vuelo = $vuelo->setAvion($avi);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($vuelo);
            $entityManager->flush();
            

            return $this->redirectToRoute('vuelos_personal_new');
        }

        return $this->render('vuelos/new.html.twig', [
            'origen' => $c->findAll(),
            'destino' => $c->findAll(),
            'aviones' => $a->findAll(),

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
