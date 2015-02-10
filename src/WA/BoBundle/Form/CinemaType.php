<?php

namespace WA\BoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CinemaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, array("attr" => array('class'=> "form-control")))
            ->add('ville', null, array("attr" => array('class'=> "form-control")))
            ->add('position', null, array("attr" => array('class'=> "form-control")))
            ->add('movies', null, array("attr" => array('class'=> "form-control")))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WA\BoBundle\Entity\Cinema'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'wa_bobundle_cinema';
    }
}
