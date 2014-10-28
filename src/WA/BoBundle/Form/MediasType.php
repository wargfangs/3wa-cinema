<?php

namespace WA\BoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MediasType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('moviesId', null, array("attr" => array('class'=> "form-control")))
            ->add('nature', null, array("attr" => array('class'=> "form-control")))
            ->add('picture', null)
            ->add('video', 'text', array("attr" => array('class'=> "form-control")))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WA\BoBundle\Entity\Medias'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'wa_bobundle_medias';
    }
}
