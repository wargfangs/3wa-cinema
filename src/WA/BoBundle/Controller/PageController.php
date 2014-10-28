<?php

namespace WA\BoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use WA\BoBundle\Entity\Movies;
use Symfony\Component\HttpFoundation\Request;
use WA\BoBundle\Form\MovieslightType;
class PageController extends Controller
{
    public function pageAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('WABoBundle:Categories')->findAll();

        $actors = $em->getRepository('WABoBundle:Actors')->findAll();

        $directors = $em->getRepository('WABoBundle:Directors')->findAll();

        $tags = $em->getRepository('WABoBundle:Tags')->findAll();

        $movies = $em->getRepository('WABoBundle:Movies')->find(1);

        $cinema = $em->getRepository('WABoBundle:Cinema')->findAll();

        $moviesbyid = $em->getRepository('WABoBundle:Movies')->getALLMoviesById();

        $commentsbyid = $em->getRepository('WABoBundle:Comments')->getALLCommentsById();

        $moviesbynum = $em->getRepository('WABoBundle:Movies')->getALLMoviesByNumber();

        $actorsbynum = $em->getRepository('WABoBundle:Actors')->getALLActorsByNumber();

        $directorsbynum = $em->getRepository('WABoBundle:Directors')->getALLDirectorsByNumber();

        $categoriesbynum = $em->getRepository('WABoBundle:Categories')->getALLCategoriesByNumber();

        $cinemasbynum = $em->getRepository('WABoBundle:Cinema')->getALLCinemasByNumber();

        $catfantastique = $em->getRepository('WABoBundle:Movies')->getCatFantastique();

        $catsf = $em->getRepository('WABoBundle:Movies')->getCatSF();

        $cataction = $em->getRepository('WABoBundle:Movies')->getCatAction();

        $catthriller = $em->getRepository('WABoBundle:Movies')->getCatThriller();

        $cataventure = $em->getRepository('WABoBundle:Movies')->getCatAventure();

        $movieandcinema = $em->getRepository('WABoBundle:Movies')->getMovieAndCinema();

        $moviescover= $em->getRepository('WABoBundle:Movies')->getMoviesCover();

        $anticipatedmovies= $em->getRepository('WABoBundle:Movies')->getAnticipatedMovies();

        $moviesbycat= $em->getRepository('WABoBundle:Categories')->getMoviesByCat();

        $moviesbyview= $em->getRepository('WABoBundle:Movies')->getMoviesByView();

        $user = $this->get('security.context')->getToken()->getUser();


        $entity = new Movies();
        $form = $this->createmovieslightForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();






            return $this->redirect($this->generateUrl('movies_show', array('id' => $entity->getId())));
        }



        // exit(var_dump($moviesbycat));
        return $this->render('WABoBundle:Default:page.html.twig',
            array( 'categories' => $categories,
                'actors' => $actors, 'directors' => $directors,
                'movies' => $movies, 'cinema' => $cinema,
                'moviesbyid' => $moviesbyid, 'commentsbyid' => $commentsbyid,
                'moviesbynum' => $moviesbynum, 'actorsbynum' => $actorsbynum,
                'directorsbynum' => $directorsbynum, 'categoriesbynum' => $categoriesbynum,
                'cinemasbynum' => $cinemasbynum, 'catfantastique' => $catfantastique,
                'catsf' => $catsf, 'cataction' => $cataction,
                'catthriller' => $catthriller, 'cataventure' => $cataventure,
                'movieandcinema' => $movieandcinema, 'moviescover' => $moviescover,
                'anticipatedmovies' => $anticipatedmovies, 'moviesbycat' => $moviesbycat,
                'moviesbyview' => $moviesbyview, 'user' => $user, 'entity' => $entity,
                'form'   => $form->createView(), 'tags' => $tags,
            ));
    }

    private function createmovieslightForm(Movies $entity)
    {
        $form = $this->createForm(new MovieslightType(), $entity, array(
            'action' => $this->generateUrl('wa_bo_page'),
            'method' => 'POST',
            'attr' => array('novalidate' =>'novalidate')
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }



    public function searchAction(Request $request){

        $req = $request->query->get('search');
        $finder = $this->container->get('fos_elastica.finder.website.movies');

        $results = $finder->find($req);

        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('WABoBundle:Movies')->findAll();

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $entities,
            $this->get('request')->query->get('page', 1)/*page number*/,
            5/*limit per page*/);

        return $this->render('WABoBundle:search:search.html.twig',
            array( 'results' => $results,
                   'entities' => $pagination,
            ));
    }

    public function TagsAction(){

        $em = $this->getDoctrine()->getManager();

        $tagscould = $em->getRepository('WABoBundle:Tags')->findAll();


        return $this->render('WABoBundle:search:search.html.twig',
            array( 'tags' => $tagscould,
            ));
    }


    public function payboxAction(){

        $paybox = $this->get('lexik_paybox.request_handler');
        $paybox->setParameters(array(
            'PBX_CMD'          => 'CMD'.time(),
            'PBX_DEVISE'       => '978',
            'PBX_PORTEUR'      => 'test@paybox.com',
            'PBX_RETOUR'       => 'Mt:M;Ref:R;Auto:A;Erreur:E',
            'PBX_TOTAL'        => '1000',
            'PBX_TYPEPAIEMENT' => 'CARTE',
            'PBX_TYPECARTE'    => 'CB',
            'PBX_EFFECTUE'     => $this->generateUrl('lexik_paybox_sample_return', array('status' => 'success'), true),
            'PBX_REFUSE'       => $this->generateUrl('lexik_paybox_sample_return', array('status' => 'denied'), true),
            'PBX_ANNULE'       => $this->generateUrl('lexik_paybox_sample_return', array('status' => 'canceled'), true),
            'PBX_RUF1'         => 'POST',
            'PBX_REPONDRE_A'   => $this->generateUrl('lexik_paybox_ipn', array('time' => time()), true),
        ));

        return $this->render(
            'LexikPayboxBundle:Sample:index.html.twig',
            array(
                'url'  => $paybox->getUrl(),
                'form' => $paybox->getForm()->createView(),
            )
        );
    }

}

