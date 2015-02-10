<?php

namespace WA\BoBundle\Services;

use Symfony\Component\HttpFoundation\Request;
use WA\BoBundle\Entity\Actors;

use Doctrine\ORM\EntityManager;

class ActorsServices
{

    protected $em;

    public function __construct(EntityManager $em){
        $this->em = $em;
    }

    public function actorslistIndex()
    {


        $entities = $this->em->getRepository('WABoBundle:Actors')->findAll();
////        $paginator  = $this->get('knp_paginator');
////        $pagination = $paginator->paginate(
////            $entities,
////            $this->get('request')->query->get('page', 1)/*page number*/,
////            5/*limit per page*/);
////        return $this->render('WABoBundle:Actors:index.html.twig', array(
////            'entities' => $pagination,
//
//        ));

        return $entities;
    }

}