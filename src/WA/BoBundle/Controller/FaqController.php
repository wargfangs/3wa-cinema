<?php

namespace WA\BoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FaqController extends Controller
{
    public function faqAction($name)
    {
        return $this->render('WABoBundle:Default:faq.html.twig', array('name' => $name));
    }
}
