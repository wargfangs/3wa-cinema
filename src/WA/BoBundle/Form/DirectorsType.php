<?php

namespace WA\BoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DirectorsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', null, array("attr" => array('class'=> "form-control")))
            ->add('lastname', null, array("attr" => array('class'=> "form-control")))
            ->add('dob','date')
            ->add('fb', null, array("attr" => array('class'=> "form-control")))
            ->add('biography', 'textarea', array("attr" => array('class'=> "form-control")))
            ->add('file', 'file')
            ->add('movies', null, array("attr" => array('class'=> "form-control")))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WA\BoBundle\Entity\Directors'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'wa_bobundle_directors';
    }
}
