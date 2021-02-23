<?php

namespace App\Controller;

use App\Repository\AvionesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AvionesController extends AbstractController
{
    /**
     * @Route("/aviones", name="aviones")
     */
    public function index(): Response
    {
        return $this->render('aviones/index.html.twig', [
            'controller_name' => 'AvionesController',
        ]);
    }
     /**
     * @Route("/aviones/lista", name="lista_aviones")
     */
    public function lista(AvionesRepository $avionesRepository){
        $aviones = $avionesRepository->findAll();
        return $this->render('aviones/listado_aviones.html.twig',
        ['aviones' => $aviones]);
    }
}
