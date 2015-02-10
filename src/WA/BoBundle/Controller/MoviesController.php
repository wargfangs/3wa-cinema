<?php

namespace WA\BoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use WA\BoBundle\Entity\Movies;
use WA\BoBundle\Form\MoviesType;

/**
 * Movies controller.
 *
 */
class MoviesController extends Controller
{

    /**
     * Lists all Movies entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('WABoBundle:Movies')->findAll();
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $entities,
            $this->get('request')->query->get('page', 1)/*page number*/,
            5/*limit per page*/);




        return $this->render('WABoBundle:Movies:index.html.twig', array(
            'entities' => $pagination,


        ));
    }
    /**
     * Creates a new Movies entity.
     *
     */

    public function showcartAction(Request $request){

        $session = $request->getSession();

        // utilise une valeur par défaut si la clé n'existe pas
        $panier = $session->get('panier');


        return $this->render('WABoBundle:cart:cart.html.twig', array(
            'panier' => $panier

        ));

    }

    public function addcartAction(Request $request, $id){

        $session = $request->getSession();

        // utilise une valeur par défaut si la clé n'existe pas
        $panier = $session->get('panier', array());


        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('WABoBundle:Movies')->find($id);

        $panier[]=array('id'=>$id, 'title'=>$entities->getTitle());
        $session->set('panier', $panier);


        return $this->redirect($this->generateUrl('movies'));

    }

    public function removecartAction(Request $request, $id){

        $session = $request->getSession();

        // utilise une valeur par défaut si la clé n'existe pas
        $panier = $session->get('panier', array());


        unset($panier[$id]);
        $session->set('panier', $panier);


        return $this->redirect($this->generateUrl('movies'));
    }

    public function createAction(Request $request)
    {
        $entity = new Movies();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->upload();
            $em->persist($entity);
            $em->flush();


            return $this->redirect($this->generateUrl('movies_show', array('id' => $entity->getId())));
        }

        return $this->render('WABoBundle:Movies:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }



    /**
     * Creates a form to create a Movies entity.
     *
     * @param Movies $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Movies $entity)
    {
        $form = $this->createForm(new MoviesType(), $entity, array(
            'action' => $this->generateUrl('movies_create'),
            'method' => 'POST',
            'attr' => array('novalidate' =>'novalidate'),
            'validation_groups' => array('fullform'),
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }



    /**
     * Displays a form to create a new Movies entity.
     *
     */
    public function newAction()
    {
        $entity = new Movies();
        $form   = $this->createCreateForm($entity);

        return $this->render('WABoBundle:Movies:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),

        ));
    }


    /**
     * Finds and displays a Movies entity.
     *
     */
    public function showAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WABoBundle:Movies')->find($id);

        $Essence = \Essence\Essence::instance( );

        $media = $Essence->embed($entity->getTrailer());


        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Movies entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WABoBundle:Movies:show.html.twig', array(
            'entity'      => $entity,
            'media' => $media,
            'delete_form' => $deleteForm->createView(),
            'validation_groups' => array('fullform'),

        ));
    }

    /**
     * Displays a form to edit an existing Movies entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WABoBundle:Movies')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Movies entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WABoBundle:Movies:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Movies entity.
    *
    * @param Movies $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Movies $entity)
    {
        $form = $this->createForm(new MoviesType(), $entity, array(
            'action' => $this->generateUrl('movies_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Movies entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WABoBundle:Movies')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Movies entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $entity->upload();
            $em->flush();

            return $this->redirect($this->generateUrl('movies_show', array('id' => $id)));
        }

        return $this->render('WABoBundle:Movies:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Movies entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('WABoBundle:Movies')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Movies entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('movies'));
    }

    /**
     * Creates a form to delete a Movies entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('movies_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    public function CoverAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $cover = $em ->getRepository('WABoBundle:Movies')->findOneById($id);
        if($cover->getCover() == true){
            $cover->setCover(false);
        }
        else{
            $cover->setCover(true);
        }

        $em->persist($cover);
        $em->flush();

        return $this->redirect($this->generateUrl('wa_bo_page'));
    }

    public function VisibleAction($id)
    {
        $this->get('visible_manager')->visibleIndex($id);

        return $this->redirect($this->generateUrl('wa_bo_page'));
    }

    public function favoritesAction($id, $type)
    {
        $movies = $this->getDoctrine()
            ->getRepository('WABoBundle:Movies')
            ->find($id);
        // Trouve le movie dont l'id est demandé

        $user = $this->getUser();
        // Identifie le user actuel

        $em = $this->getDoctrine()->getManager();

        if($type == 'ajout'){
            $user->addMovie($movies);

            // Ajoute le film dont l'id est demandé au user utilisé actuellement
        }
        else if($type == 'supp'){
            $user->removeMovie($movies);
            // Supprime le film dont l'id est demandé au user utilisé actuellement

        }
        $em->persist($user);
        // Sélectionne l'objet User
        $em->flush();
        // Rendre en BDD

        return $this->redirect($this->generateUrl('movies'));

    }

    public function pdfAction(Request $request, Movies $id)
    {
        $pdfObj = $this->get("white_october.tcpdf")->create();
        $type = $request->query->get('type', 'I');
        // set document information
        $pdfObj->SetCreator(PDF_CREATOR);
        $pdfObj->SetAuthor('SymfoAcademy');
        $pdfObj->SetTitle('Profil de film');
        $pdfObj->SetSubject('Profil de film');
        $pdfObj->SetKeywords('Profil de film, SymfoAcademy Solution');

// set default header data
// remove default header/footer
        $pdfObj->setPrintHeader(false);
        $pdfObj->setPrintFooter(false);


// set margins
        $pdfObj->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdfObj->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdfObj->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
        $pdfObj->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
        $pdfObj->setImageScale(PDF_IMAGE_SCALE_RATIO);

        //$pdfObj->SetFont('/usr/share/fonts/helvetica.ttf', '', 14, '', true);
        //$fontname = $pdfObj->addTTFfont('/path-to-font/DejaVuSans.ttf', 'TrueTypeUnicode', '', 32);
        $pdfObj->AddPage();
// ---------------------------------------------------------

// set default font subsetting mode
        $pdfObj->setFontSubsetting(true);

// set text shadow effect
        $pdfObj->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

        $barcodeobj = new \TCPDF2DBarcode('http://www.tcpdf.org', 'QRCODE,H');

        // Set some content to print
        $html = $this->renderView('WABoBundle:Movies:pdf.html.twig',
            array(
                'entity' => $id,
            ));


// Print text using writeHTMLCell()
        $pdfObj->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

        // ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
        $path = $this->get('kernel')->getRootDir() . '/../web';

        $pdfObj->Output('movie_pdf.pdf', $type);


    }

}
