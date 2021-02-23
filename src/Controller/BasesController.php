<?php

namespace App\Controller;

use App\Repository\BasesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BasesController extends AbstractController
{
    /**
     * @Route("/bases", name="bases")
     */
    public function index(): Response
    {
        return $this->render('bases/index.html.twig', [
            'controller_name' => 'BasesController',
        ]);
    }
    /**
     * @Route("/bases/lista", name="lista_bases")
     */
    public function lista(BasesRepository $basesRepository){
        $bases = $basesRepository->findAll();
        return $this->render('bases/listado_bases.html.twig',
        ['bases' => $bases]);
    }
}
