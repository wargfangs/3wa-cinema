<?php

namespace WA\BoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints as Assert;
class ContactType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'email', array(
                "attr" => array('class'=> "form-control"),
                'constraints'=> array(
                    new Assert\NotBlank(
                        array('message' => "Votre email est vide")),
                    new Assert\Email(
                        array(
                        'message' => 'Votre email n est pas valide.',
                    )))
            ))
            ->add('name', 'text', array(
                "attr" => array('class'=> "form-control"),
                'constraints'=> array(
                    new Assert\NotBlank(
                        array('message' => "Votre nom est vide")),
                    new Assert\Length(
                            array(
                        'min'   => 3,
                        'max'   => 10,
                        'minMessage' => 'Votre nom doit contenir au minimum {{ limit }} caractères.',
                        'maxMessage' => 'Votre nom doit contenir au maximum {{ limit }} caractères.',

                        )))
            ))
            ->add('message', 'textarea', array(
                "attr" => array('class'=> "form-control",'label'=>"message"),
                'constraints'=> array(
                    new Assert\NotBlank(
                        array('message' => "Votre message est vide")),
                    new Assert\Length(
                        array(
                            'min'   => 3,
                            'max'   => 10,
                            'minMessage' => 'Votre nom doit contenir au minimum {{ limit }} caractères.',
                            'maxMessage' => 'Votre nom doit contenir au maximum {{ limit }} caractères.',

                        )))
            ))
            ->add('sexe', 'choice', array(
                'choices' => array("h" =>'homme', "f" => 'femme'),
                'required'=> false,
                'constraints'=>array(
                    new Assert\Choice(array(
                    'choices' => array('h', 'f'),
                    'message' => 'Choisissez un genre valide.',
                )))
            ))
            ->add('movie', 'entity', array(
                'class' => 'WABoBundle:Movies',
                'property' => 'title',
            ))
            ->add('cinema', 'entity', array(
                'class' => 'WABoBundle:Cinema',
                'property' => 'title',
            ))



        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            '' => ''
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'form_contact';
    }
}
