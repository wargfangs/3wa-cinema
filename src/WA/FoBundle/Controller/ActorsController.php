<?php

namespace WA\FoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ActorsController extends Controller
{
    public function indexAction()
    {
//        $em = $this->getDoctrine()->getManager();
//
//        $entities = $em->getRepository('WABoBundle:Actors')->findAll();

        $entities=$this->get('actors_list')->actorslistIndex();
        $pagination  = $this->get('paginator_manager')->paginatorIndex($entities);

        return $this->render('WAFoBundle:Actors:index.html.twig', array(
            'entities' => $pagination,
        ));
    }
}