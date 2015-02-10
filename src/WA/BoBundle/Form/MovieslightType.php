<?php

namespace WA\BoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MovieslightType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text', array("attr" => array('class'=> "form-control")))
            ->add('synopsis', 'textarea', array("attr" => array('class'=> "form-control")))
            ->add('categories', null, array("attr" => array('class'=> "form-control")))


        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WA\BoBundle\Entity\Movies'
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
