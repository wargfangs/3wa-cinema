<?php

namespace WA\BoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'email', array("attr" => array('class'=> "form-control")))
            ->add('username', null, array("attr" => array('class'=> "form-control")))
            ->add('password', 'password', array("attr" => array('class'=> "form-control")))
            ->add('ville', null, array("attr" => array('class'=> "form-control")))
            ->add('zipcode', null, array("attr" => array('class'=> "form-control")))
            ->add('tel', null, array("attr" => array('class'=> "form-control")))
            ->add('enabled', 'checkbox', array("attr" => array('class'=> "form-control")))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WA\BoBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'wa_bobundle_user';
    }
}
