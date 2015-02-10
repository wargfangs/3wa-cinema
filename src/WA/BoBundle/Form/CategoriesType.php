<?php

namespace WA\BoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CategoriesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, array("attr" => array('class'=> "form-control")))
            ->add('description', 'textarea', array("attr" => array('class'=> "form-control")))
            ->add('position', null, array("attr" => array('class'=> "form-control")))
            ->add('file','file')

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WA\BoBundle\Entity\Categories'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'wa_bobundle_categories';
    }
}
