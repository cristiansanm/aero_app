<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConsultaVuelosController extends AbstractController
{
    /**
     * @Route("/consulta/vuelos", name="consulta_vuelos")
     */
    public function index(): Response
    {
        return $this->render('consulta_vuelos/index.html.twig', [
            'controller_name' => 'ConsultaVuelosController',
        ]);
    }
}
