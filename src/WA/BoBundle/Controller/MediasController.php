<?php

namespace WA\BoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use WA\BoBundle\Entity\Medias;
use WA\BoBundle\Form\MediasType;

/**
 * Medias controller.
 *
 */
class MediasController extends Controller
{

    /**
     * Lists all Medias entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('WABoBundle:Medias')->findAll();
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $entities,
            $this->get('request')->query->get('page', 1)/*page number*/,
            5/*limit per page*/);
        return $this->render('WABoBundle:Medias:index.html.twig', array(
            'entities' => $pagination,
        ));
    }
    /**
     * Creates a new Medias entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Medias();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('medias_show', array('id' => $entity->getId())));
        }

        return $this->render('WABoBundle:Medias:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Medias entity.
     *
     * @param Medias $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Medias $entity)
    {
        $form = $this->createForm(new MediasType(), $entity, array(
            'action' => $this->generateUrl('medias_create'),
            'method' => 'POST',
            'attr' => array('novalidate' =>'novalidate')
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Medias entity.
     *
     */
    public function newAction()
    {
        $entity = new Medias();
        $form   = $this->createCreateForm($entity);

        return $this->render('WABoBundle:Medias:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Medias entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WABoBundle:Medias')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Medias entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WABoBundle:Medias:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Medias entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WABoBundle:Medias')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Medias entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WABoBundle:Medias:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Medias entity.
    *
    * @param Medias $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Medias $entity)
    {
        $form = $this->createForm(new MediasType(), $entity, array(
            'action' => $this->generateUrl('medias_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Medias entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WABoBundle:Medias')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Medias entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $entity->upload();
            $em->flush();

            return $this->redirect($this->generateUrl('medias_show', array('id' => $id)));
        }

        return $this->render('WABoBundle:Medias:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Medias entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('WABoBundle:Medias')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Medias entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('medias'));
    }

    /**
     * Creates a form to delete a Medias entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('medias_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
