<?php

namespace App\Controller;

use App\Repository\AvionesRepository;
use App\Repository\CiudadesRepository;
use App\Repository\VuelosRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

    /**
     * @Route("/consulta/vuelos")
     */
class ConsultaVuelosController extends AbstractController
{
    
    /**
     * @Route("/personalabordo", name="consulta_vuelos_personal", methods={"GET", "POST"})
     */
    public function personalVuelo(EntityManagerInterface $em, Request $request, VuelosRepository $vuelos ): Response
    {
        $vuelo = $request->query->get('vuelo', 1);
        
        $dql = "SELECT p.apellido pil, p.id pilid, cp.apellido cpil, cp.id cpilid, ing.apellido inge, ing.id ingeid, aux.apellido auxi, aux.id auxid 
        FROM App:Personal p, App:Personal cp, App:Personal ing, App:Personal aux, App:VuelosPersonal vp
        WHERE vp.vueloId = {$vuelo} AND p.id = vp.piloto AND cp.id = vp.copiloto
        AND ing.id = vp.ingeniero AND aux.id = vp.auxiliar";
        
        return $this->render('consulta_vuelos/consulta_personal.html.twig', [
            'vuelos' => $vuelos->findAll(),
            'vuelo1' => $vuelo,
            'personal' => $em->createQuery($dql)->getResult(),
        ]);
    }
    
    /**
     * @Route("/segunOrDeFe", name="consulta_vuelos_varios", methods={"GET", "POST"})
     */
    public function variosVuelos(Request $request, VuelosRepository $vuelos, CiudadesRepository $ciudades ): Response
    {
        $opcion = $request->query->get('opcion', 0);
        $dato = $request->query->get('dato', null);
        if( $opcion == 0){
            $op = $vuelos->findByOrigen($dato);
        }
        else if( $opcion == 1){
            $op = $vuelos->findByDestino($dato);
        }
        else if( $opcion == 2){
            $op = $vuelos->findByFecha($dato);
        }
        
        return $this->render('consulta_vuelos/consulta_varios.html.twig', [
            'opcion' => $opcion,
            'dato'=> $dato,
            'ciudades' => $ciudades->findAll(),
            'personal' => $op,
        ]);
    }

    /**
     * @Route("/tipoavion", name="consulta_vuelos_avion", methods={"GET", "POST"})
     */
    public function avionVuelo(Request $request, VuelosRepository $vuelos, AvionesRepository $aviones): Response
    {
        $avion = $request->query->get('avion', 1);

        return $this->render('consulta_vuelos/consulta_avion.html.twig', [
            'aviones' => $aviones->findAll(),
            'avion1' => $avion,
            'vuelos' => $vuelos->findByAvion($avion),
        ]);
    }
}
