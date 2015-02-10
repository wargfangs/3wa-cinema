<?php

namespace WA\BoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CommentsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('note', null, array("attr" => array('class'=> "form-control")))
            ->add('content', 'textarea', array("attr" => array('class'=> "form-control")))
            ->add('state', null, array("attr" => array('class'=> "form-control")))
            ->add('dateCreated', 'datetime')
            ->add('user', null, array("attr" => array('class'=> "form-control")))
            ->add('movies', null, array("attr" => array('class'=> "form-control")))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WA\BoBundle\Entity\Comments',
            'validation_groups' => array('fullform'),
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'wa_bobundle_comments';
    }
}
