<?php

namespace App\Controller;

use App\Repository\PersonalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonalController extends AbstractController
{
    /**
     * @Route("/personal", name="personal")
     */
    public function index(): Response
    {
        return $this->render('personal/index.html.twig', [
            'controller_name' => 'PersonalController',
        ]);
    }

    /**
     * @Route("/personal/lista", name="lista_personal")
     */
    public function listadoPersonal(PersonalRepository $personalRepository){
        $personal = $personalRepository->findAll();

        return $this->render('personal/listado_personal.html.twig', [
            'personal' => $personal
        ]);
    }

}
