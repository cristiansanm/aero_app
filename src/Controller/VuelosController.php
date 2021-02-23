<?php

namespace App\Controller;

use App\Repository\VuelosRepository;
use App\Repository\VuelosPersonalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VuelosController extends AbstractController
{
    /**
     * @Route("/vuelos", name="vuelos")
     */
    public function index(): Response
    {
        return $this->render('vuelos/index.html.twig', [
            'controller_name' => 'VuelosController',
        ]);
    }

    /**
     * @Route("/vuelos/lista", name="lista_vuelos")
     */
    public function listaVuelos(VuelosPersonalRepository $vuePersonalRepos, VuelosRepository $vuelosRepository){
        $vuelosPersonal = $vuePersonalRepos->findAll();
        $vuelos = $vuelosRepository->findAll();
        return $this->render('vuelos/listado_vuelos.html.twig', [
            'vuePer' => $vuelosPersonal,
            'vuelos' => $vuelos
        ]);
    }
}
