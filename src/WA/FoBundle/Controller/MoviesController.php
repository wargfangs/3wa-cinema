<?php

namespace WA\FoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use WA\BoBundle\Entity\Comments;
use WA\BoBundle\Form\CommentslightType;
class MoviesController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('WABoBundle:Movies')->findAll();
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $entities,
            $this->get('request')->query->get('page', 1)/*page number*/,
            5/*limit per page*/);
        return $this->render('WAFoBundle:Movies:index.html.twig', array(
            'entities' => $pagination,
        ));
    }

    public function showAction(Request $request, $id)
    {





        $id = $this->getDoctrine()->getRepository('WABoBundle:Movies')->findOneById($id);


        $Essence = \Essence\Essence::instance( );

        $media = $Essence->embed($id->getTrailer());


        if (!$id) {
            throw $this->createNotFoundException('Unable to find Movies entity.');
        }

        $comments = new Comments();
        $comments->setUser($this->getUser());
        $comments->setMovies($id);

        $form = $this->createcommentslightForm($comments, $id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comments);
            $em->flush();

            return $this->redirect($this->generateUrl('wa_fo_movies_show', array('id' => $id->getId())));
        }
//exit(var_dump($user));

        return $this->render('WAFoBundle:Movies:show.html.twig', array(
            'entity'      => $id,
            'media' => $media,
            'validation_groups' => array('fullform'),
            'form'   => $form->createView(),

        ));
    }

    private function createcommentslightForm(Comments $comments, $movie)
    {
//        exit(var_dump($entity));



        $id = $movie;
        $form = $this->createForm(new CommentslightType(), $comments, array(
            'action' => $this->generateUrl('wa_fo_movies_show', array('id' => $id->getId())),
            'method' => 'POST',
            'attr' => array('novalidate' =>'novalidate')
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    public function favoritesfrontAction($id, $type){
        $movie = $this->getDoctrine()
            ->getRepository('WABoBundle:Movies')
            ->find($id);
        // Trouve le movie dont l'id est demandé

        $user = $this->getUser();
        // Identifie le user actuel


        // exit(var_dump($movies));
        $em = $this->getDoctrine()->getManager();
        $isMovieAlreadyLiked=false;
        if($type == 'ajout'){
            foreach($user->getMovies() as $usermovie){
                if($id == $usermovie->getId()){
                    $isMovieAlreadyLiked=true;
                }
//
            }


            if (!$isMovieAlreadyLiked) $user->addMovie($movie);
            // Ajoute le film dont l'id est demandé au user utilisé actuellement
        }
        else if($type == 'supp'){
            $user->removeMovie($movie);
            // Supprime le film dont l'id est demandé au user utilisé actuellement

        }
        $em->persist($user);
        // Sélectionne l'objet User
        $em->flush();
        // Rendre en BDD

        return $this->redirect($this->generateUrl('wa_fo_movies_show', array('id' => $movie->getId())));

    }
}