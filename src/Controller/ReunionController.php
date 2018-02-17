<?php

namespace App\Controller;

use App\Entity\Reunion;
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
}
