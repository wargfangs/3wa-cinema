<?php

namespace WA\BoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MoviesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('typeFilm', 'text', array("attr" => array('class'=> "form-control")))
            ->add('title', 'text', array("attr" => array('class'=> "form-control")))
            ->add('synopsis', 'textarea', array("attr" => array('class'=> "form-control")))
            ->add('description', 'textarea', array("attr" => array('class'=> "form-control")))
            ->add('notePresse', null, array("attr" => array('class'=> "form-control")))
            ->add('file','file')
            ->add('trailer', 'text', array("attr" => array('class'=> "form-control")))
            ->add('languages', 'text', array("attr" => array('class'=> "form-control")))
            ->add('distributeur', 'text', array("attr" => array('class'=> "form-control")))
            ->add('bo', 'text', array("attr" => array('class'=> "form-control")))
            ->add('annee', null, array("attr" => array('class'=> "form-control")))
            ->add('budget', null, array("attr" => array('class'=> "form-control")))
            ->add('duree', null, array("attr" => array('class'=> "form-control")))
            ->add('dateRelease', null)
            ->add('visible', null, array("attr" => array('class'=> "form-control")))
            ->add('cover', null, array("attr" => array('class'=> "form-control")))
            ->add('categories', null, array("attr" => array('class'=> "form-control")))
            ->add('actors', null, array("attr" => array('class'=> "form-control")))
            ->add('cinemas', null, array("attr" => array('class'=> "form-control")))
            ->add('directors', null, array("attr" => array('class'=> "form-control")))
            ->add('tags', null, array("attr" => array('class'=> "form-control")))


        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WA\BoBundle\Entity\Movies',
            'validation_groups' => array('fullform'),
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'wa_bobundle_movies';
    }
}
