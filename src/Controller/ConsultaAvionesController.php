<?php

namespace App\Controller;

use App\Repository\AvionesRepository;
use App\Repository\VuelosPersonalRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

    /**
     * @Route("/consulta/aviones")
     */
class ConsultaAvionesController extends AbstractController
{
    /**
     * @Route("/listapilotos", name="consulta_pilotos_aviones", methods={"GET", "POST"})
     */
    public function listaPilotos(Request $request, EntityManagerInterface $em, AvionesRepository $aviones): Response
    {
        $idAvion = $request->query->get('idavion', 1);
        
        $dql = "SELECT IDENTITY (p.funcion), p.nombre, p.apellido, p.id  FROM App:VuelosPersonal vp, App:Vuelos v, App:Personal p
        WHERE vp.vueloId = v.id AND p.id = vp.piloto AND {$idAvion} = v.avion ORDER BY p.id ASC";
        
       
        return $this->render('consulta_aviones/consulta_personal.html.twig',[
            "aviones" => $aviones->findAll(),
            "avion1" => $idAvion,
            "personal" => $em->createQuery($dql)->getResult(),
        ]);

    }
    
    /**
     * @Route("/listadisponible", name="consulta_disponible_aviones", methods={"GET", "POST"})
     */
    public function listaAviones(Request $request, AvionesRepository $aviones): Response
    {
        $disponible = $request->query->get('disponible', 1);
        
       
        return $this->render('consulta_aviones/consulta_disponible.html.twig',[
            "aviones" => $aviones->findAll(),
            "dispo" => $disponible,
            "disponibles" => $aviones->findByDisponible($disponible),
        ]);

    }
}
