<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConsultaPersonalController extends AbstractController
{
    /**
     * @Route("/consulta/personal", name="consulta_personal")
     */
    public function index(): Response
    {
        return $this->render('consulta_personal/index.html.twig', [
            'controller_name' => 'ConsultaPersonalController',
        ]);
    }
}
