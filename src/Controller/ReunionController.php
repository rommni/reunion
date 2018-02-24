<?php

namespace App\Controller;

use App\Entity\Odj;
use App\Entity\Reunion;
use App\Form\OdjsType;
use App\Form\ReunionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ReunionController extends Controller
{
    /**
     * @Route("/", name="reunion")
     */
    public function index()
    {
        $reunions = $this->getDoctrine()->getRepository(Reunion::class)->findAll();
        return $this->render('reunion/index.html.twig', array('reunions'=> $reunions));
    }

    /**
     * @Route("/add", name="reunion_add")
     */
    public function add(Request $request)
    {
        $reunion = new Reunion();
        $form = $this->createForm(ReunionType::class, $reunion);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $reunion = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($reunion);
            $em->flush();

            return $this->redirectToRoute('reunion');
        }

        return $this->render('reunion/add.html.twig', array('form'=>$form->createView()));

    }

    /**
     * @Route("/{id}", name="reunion_show")
     */
    public function show(Request $request, Reunion $reunion){
        $form = $this->createForm(OdjsType::class, $reunion);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $reunion = $form->getData();

            $this->getDoctrine()->getManager()->flush();

        }

        return $this->render('reunion/show.html.twig', array('reunion' => $reunion, 'form' => $form->createView()));
    }

    /**
     * @Route("/cr/{id}", name="reunion_cr")
     */
    public function cr(Request $request, Reunion $reunion){
        $repo = $this->getDoctrine()->getRepository(Odj::class);
        $query = $repo->getQueryByReunion($reunion);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            10
        );

        return $this->render('reunion/cr.html.twig', array('pagination'=>$pagination, 'reunion'=>$reunion));
    }

    /**
     * @Route("/delete/{id}", name="reunion_delete")
     */
    public function delete(Reunion $reunion){
        $em = $this->getDoctrine()->getManager();
        $em->remove($reunion);
        $em->flush();
        return $this->redirectToRoute('reunion');
    }
}
