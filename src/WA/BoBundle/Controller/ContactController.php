<?php

namespace WA\BoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WA\BoBundle\Form\ContactType;

class ContactController extends Controller
{
    public function contactAction(Request $request)
    {
        $form = $this->createForm(new ContactType(), null, array(
            'action' => $this->generateUrl('wa_bo_contact'),
            'method' => 'POST',
            'attr' => array('novalidate' =>'novalidate')

        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        $form->handleRequest($request);

        if ($form->isValid()) {

            return $this->redirect($this->generateUrl('wa_bo_page'));
        }

        return $this->render('WABoBundle:Default:contact.html.twig', array('form' => $form->createView()));
    }


}
