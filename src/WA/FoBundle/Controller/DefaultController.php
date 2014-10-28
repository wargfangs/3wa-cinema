<?php

namespace WA\FoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $actors = $em->getRepository('WABoBundle:Actors')->findAll();

        $directors = $em->getRepository('WABoBundle:Directors')->findAll();

        $moviescover= $em->getRepository('WABoBundle:Movies')->getMoviesCover();

        $anticipatedmovies= $em->getRepository('WABoBundle:Movies')->getAnticipatedMovies();

        $movieandcinema = $em->getRepository('WABoBundle:Movies')->getMovieAndCinema();

        $sessions = $em->getRepository('WABoBundle:Sessions')->findAll();

        $movies = $em->getRepository('WABoBundle:Movies')->findAll();

        $moviesession = $em->getRepository('WABoBundle:Movies')->getMovieSession();
        //exit(var_dump($moviesession));



        return $this->render('WAFoBundle:Default:index.html.twig', array(
            'actors' => $actors, 'directors' => $directors,
            'moviescover' => $moviescover, 'anticipatedmovies' => $anticipatedmovies,
            'movieandcinema' => $movieandcinema, 'sessions' => $sessions,
            'moviesession' => $moviesession, 'movies' => $movies,


        ));
    }

}
