<?php

namespace App\Controller;

use App\Entity\Personal;
use App\Repository\AvionesRepository;
use App\Repository\BasesRepository;
use App\Repository\PersonalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
* @Route("/consulta/bases")
*/
class ConsultaBasesController extends AbstractController
{
    /**
     * @Route("/listabases", name="lista_bases", methods={"GET", "POST"})
     */
    public function listaEnBase(Request $request, PersonalRepository $personal,BasesRepository $bases): Response {
        
        $idbase = $request->query->get('personal', 1);
        

        return $this->render('consulta_bases/consulta_persona.html.twig',[
            'bases'=>$bases->findAll(),
            'base1' => $idbase,
            'personal' => $personal->findByBase($idbase),
        ]);
    }
    

    /**
     * @Route("/listaaviones", name="lista_aviones", methods={"GET", "POST"})
     */
    public function listaEnAviones(Request $request, AvionesRepository $aviones,BasesRepository $bases): Response {
        
        $idbase = $request->query->get('aviones', 1);
        

        return $this->render('consulta_bases/consulta_avion.html.twig',[
            'bases'=>$bases->findAll(),
            'base1' => $idbase,
            'aviones' => $aviones->findByAvion($idbase),
        ]);
    }


    // /**
    //  * @Route("/personas", name="persona_en_base", methods={"GET", "POST"})
    //  */
    // public function personaEnBase(Request $request, PersonalRepository $personal){
        
        
    // }

}

