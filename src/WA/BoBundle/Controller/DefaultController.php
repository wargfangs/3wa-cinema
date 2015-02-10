<?php

namespace WA\BoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('WABoBundle:Default:index.html.twig', array('name' => $name));
    }
}
