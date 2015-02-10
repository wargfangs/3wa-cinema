<?php

namespace WA\BoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use WA\BoBundle\Entity\Actors;
use WA\BoBundle\Form\ActorsType;

/**
 * Actors controller.
 *
 */
class ActorsController extends Controller
{

    /**
     * Lists all Actors entities.
     *
     */
    public function indexAction()
    {
//        $em = $this->getDoctrine()->getManager();
//
//        $entities = $em->getRepository('WABoBundle:Actors')->findAll();

        $entities=$this->get('actors_list')->actorslistIndex();
        $pagination  = $this->get('paginator_manager')->paginatorIndex($entities);

        return $this->render('WABoBundle:Actors:index.html.twig', array(
            'entities' => $pagination,

        ));
    }
    /**
     * Creates a new Actors entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Actors();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->upload();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('actors_show', array('id' => $entity->getId())));
        }

        return $this->render('WABoBundle:Actors:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Actors entity.
     *
     * @param Actors $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Actors $entity)
    {
        $form = $this->createForm(new ActorsType(), $entity, array(
            'action' => $this->generateUrl('actors_create'),
            'method' => 'POST',
            'attr' => array('novalidate' =>'novalidate')
        ));

        $form->add('submit', 'submit', array('label' => 'Create', 'attr' => array('class' => 'btn btn-primary')));

        return $form;
    }

    /**
     * Displays a form to create a new Actors entity.
     *
     */
    public function newAction()
    {
        $entity = new Actors();
        $form   = $this->createCreateForm($entity);

        return $this->render('WABoBundle:Actors:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Actors entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WABoBundle:Actors')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Actors entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WABoBundle:Actors:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Actors entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WABoBundle:Actors')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Actors entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WABoBundle:Actors:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Actors entity.
    *
    * @param Actors $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Actors $entity)
    {
        $form = $this->createForm(new ActorsType(), $entity, array(
            'action' => $this->generateUrl('actors_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Actors entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WABoBundle:Actors')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Actors entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $entity->upload();
            $em->flush();

            return $this->redirect($this->generateUrl('actors_show', array('id' => $id)));
        }

        return $this->render('WABoBundle:Actors:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Actors entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('WABoBundle:Actors')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Actors entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('actors'));
    }

    /**
     * Creates a form to delete a Actors entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('actors_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
