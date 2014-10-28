<?php

namespace WA\BoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use WA\BoBundle\Entity\Cinema;
use WA\BoBundle\Form\CinemaType;

/**
 * Cinema controller.
 *
 */
class CinemaController extends Controller
{

    /**
     * Lists all Cinema entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('WABoBundle:Cinema')->findAll();
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $entities,
            $this->get('request')->query->get('page', 1)/*page number*/,
            5/*limit per page*/);
        return $this->render('WABoBundle:Cinema:index.html.twig', array(
            'entities' => $pagination,
        ));
    }
    /**
     * Creates a new Cinema entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Cinema();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cinema_show', array('id' => $entity->getId())));
        }

        return $this->render('WABoBundle:Cinema:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Cinema entity.
     *
     * @param Cinema $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Cinema $entity)
    {
        $form = $this->createForm(new CinemaType(), $entity, array(
            'action' => $this->generateUrl('cinema_create'),
            'method' => 'POST',
            'attr' => array('novalidate' =>'novalidate')
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Cinema entity.
     *
     */
    public function newAction()
    {
        $entity = new Cinema();
        $form   = $this->createCreateForm($entity);

        return $this->render('WABoBundle:Cinema:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Cinema entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WABoBundle:Cinema')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cinema entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WABoBundle:Cinema:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Cinema entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WABoBundle:Cinema')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cinema entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WABoBundle:Cinema:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Cinema entity.
    *
    * @param Cinema $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Cinema $entity)
    {
        $form = $this->createForm(new CinemaType(), $entity, array(
            'action' => $this->generateUrl('cinema_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Cinema entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WABoBundle:Cinema')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cinema entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $entity->upload();
            $em->flush();

            return $this->redirect($this->generateUrl('cinema_show', array('id' => $id)));
        }

        return $this->render('WABoBundle:Cinema:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Cinema entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('WABoBundle:Cinema')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Cinema entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('cinema'));
    }

    /**
     * Creates a form to delete a Cinema entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cinema_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
