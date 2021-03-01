<?php

namespace App\Controller;

use App\Repository\FuncionesRepository;
use App\Repository\PersonalRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

    /**
     * @Route("/consulta/personal")
     */
class ConsultaPersonalController extends AbstractController
{
    /**
     * @Route("/porFuncion", name="consulta_personal_funcion", methods={"GET", "POST"})
     */
    public function personalFuncion(FuncionesRepository $funciones, Request $request, PersonalRepository $personal): Response
    {
        $funcion = $request->query->get('funcion', 1);

        return $this->render('consulta_personal/consulta_funcion.html.twig', [
            'funciones' => $funciones->findAll(),
            'funcion1' => $funcion,
            'personal' => $personal->findByFuncion($funcion),
        ]);
    }

    /**
     * @Route("/porFecha", name="consulta_personal_fecha", methods={"GET", "POST"})
     */
    public function personalFecha(EntityManagerInterface $em, PersonalRepository $per, FuncionesRepository $funciones, Request $request): Response
    {
        $opcion = $request->query->get('opcion', '0');
        $idpersonal = $request->query->get('idpersonal', 1);
        $funcion = $request->query->get('funcion', 1);

        if($opcion == 0){
            $opcion='< CURRENT_DATE()';
        }
        else{
            $opcion='> CURRENT_DATE()';
        }

        if(isset($opcion) && isset($idpersonal) && isset($funcion)){    
            if($funcion == 1){
                $dql="SELECT p.id, p.nombre, p.apellido, v.fecha, IDENTITY(vp.vueloId) FROM App:Personal p, App:VuelosPersonal vp, App:Vuelos v
                WHERE {$idpersonal} = p.id AND p.id = vp.piloto AND vp.vueloId = v.id AND v.fecha {$opcion}";
            }
            else if($funcion == 2){
                $dql="SELECT cp.id, cp.nombre, cp.apellido, v.fecha, IDENTITY(vp.vueloId) FROM App:Personal cp, App:VuelosPersonal vp, App:Vuelos v
                WHERE '{$idpersonal}' = cp.id AND cp.id = vp.copiloto AND vp.vueloId = v.id AND v.fecha {$opcion}";
            }
            else if($funcion == 3){
                $dql="SELECT ing.id, ing.nombre, ing.apellido, v.fecha, IDENTITY(vp.vueloId) FROM App:Personal ing, App:VuelosPersonal vp, App:Vuelos v
                WHERE {$idpersonal} = ing.id AND ing.id = vp.ingeniero AND vp.vueloId = v.id AND v.fecha {$opcion}";
            }
            else if($funcion == 4){
                $dql="SELECT aux.id, aux.nombre, aux.apellido, v.fecha, IDENTITY(vp.vueloId) FROM App:Personal aux, App:VuelosPersonal vp, App:Vuelos v
                WHERE {$idpersonal} = aux.id AND aux.id = vp.auxiliar AND vp.vueloId = v.id AND v.fecha {$opcion}";
            }
        }

        return $this->render('consulta_personal/consulta_fecha.html.twig', [
            'funciones' => $funciones->findAll(),
            'pilotos' => $per->findByFuncion(1),
            'copilotos' => $per->findByFuncion(2),
            'ingenieros' => $per->findByFuncion(3),
            'auxiliares' => $per->findByFuncion(4),
            'funcion1' => $funcion,
            'opcion1' => $opcion,
            'idpersonal' => $idpersonal,
            'personal' => $em->createQuery($dql)->getResult(),
        ]);
    }
}
