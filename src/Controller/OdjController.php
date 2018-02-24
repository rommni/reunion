<?php
/**
 * Created by PhpStorm.
 * User: romain
 * Date: 2/24/18
 * Time: 6:05 PM
 */

namespace App\Controller;


use App\Entity\Odj;
use App\Entity\Reunion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route("/odj")
 */
class OdjController extends Controller
{
    /**
     * @Route("/new/{id}", methods="POST")
     */
    public function newOdj(Reunion $reunion){
        $odj = new Odj();
        $odj->setReunion($reunion);
        $em = $this->getDoctrine()->getManager();
        $em->persist($odj);
        $em->flush();

        return new Response($odj->getId());
    }

    /**
     * @Route("/update/titre/{id}", methods="PATCH")
     */
    public function updateTitreOdj(Odj $odj, Request $request)
    {
        $titre = $request->request->get('titre');
        $odj->setTitre($titre);
        $this->getDoctrine()->getManager()->flush();

        return new Response();
    }

    /**
     * @Route("/update/echanges/{id}", methods="PATCH")
     */
    public function updateEchangesOdj(Odj $odj,Request $request)
    {
        $echanges=$request->request->get('echanges');
        $odj->setEchanges($echanges);
        $this->getDoctrine()->getManager()->flush();

        return new Response();
    }



    /**
     * @Route("/delete/{id}", methods="DELETE")
     */
    public function deleteOdj(Odj $odj){
        $em = $this->getDoctrine()->getManager();
        $em->remove($odj);
        $em->flush();

        return new Response();
    }

    /**
     * @Route("/get/{id}", methods="GET")
     */
    public function getOdjId(Reunion $reunion){
        $odjs = $reunion->getOdjs();
        $data = [];
        foreach($odjs as $odj){
            array_push($data, $odj->getId());
        }

        return new JsonResponse($data);
    }

}