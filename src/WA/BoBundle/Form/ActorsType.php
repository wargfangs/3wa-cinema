<?php

namespace WA\BoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints as Assert;

class ActorsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', null, array("attr" => array('class'=> "form-control"),
                'constraints'=> array(
                    new Assert\NotBlank(
                        array('message' => "Le nom est vide")),
                    new Assert\Length(
                        array(
                            'min'   => 3,
                            'max'   => 10,
                            'minMessage' => 'Le nom doit contenir au minimum {{ limit }} caractères.',
                            'maxMessage' => 'Le nom doit contenir au maximum {{ limit }} caractères.',

                        )))
            ))
            ->add('lastname', null, array("attr" => array('class'=> "form-control"),
                'constraints'=> array(
                    new Assert\NotBlank(
                        array('message' => "Le prénom est vide")),
                    new Assert\Length(
                        array(
                            'min'   => 3,
                            'max'   => 10,
                            'minMessage' => 'Le prénom doit contenir au minimum {{ limit }} caractères.',
                            'maxMessage' => 'Le prénom doit contenir au maximum {{ limit }} caractères.',

                        )))
            ))
            ->add('dob', 'date')
            ->add('city', null, array("attr" => array('class'=> "form-control"),
                'constraints'=> array(
                    new Assert\NotBlank(
                        array('message' => "La ville est vide")),
                    new Assert\Length(
                        array(
                            'min'   => 3,
                            'max'   => 10,
                            'minMessage' => 'La ville doit contenir au minimum {{ limit }} caractères.',
                            'maxMessage' => 'La ville doit contenir au maximum {{ limit }} caractères.',

                        )))
            ))
            ->add('file', 'file')
            ->add('fb', null, array("attr" => array('class'=> "form-control"),
                   'constraints' => array(
                    new Assert\NotBlank(
                        array('message' => "Le Fb est vide")),
                    new Assert\Url(
                        array('message' => 'Url non valide')
                    ))
            ))
            ->add('nationality', null, array("attr" => array('class'=> "form-control"),
                'constraints'=> array(
                    new Assert\NotBlank(
                        array('message' => "La nationalité est vide")),
                    new Assert\Length(
                        array(
                            'min'   => 3,
                            'max'   => 10,
                            'minMessage' => 'La nationalité doit contenir au minimum {{ limit }} caractères.',
                            'maxMessage' => 'La nationalité doit contenir au maximum {{ limit }} caractères.',

                        )))
            ))
            ->add('biography', 'textarea', array("attr" => array('class'=> "form-control"),
                'constraints'=> array(
                    new Assert\NotBlank(
                        array('message' => "La biographie est vide")),
                    new Assert\Length(
                        array(
                            'min'   => 3,
                            'max'   => 30,
                            'minMessage' => 'La biographie doit contenir au minimum {{ limit }} caractères.',
                            'maxMessage' => 'Le biographie doit contenir au maximum {{ limit }} caractères.',

                        )))
            ))
            ->add('roles', 'textarea', array("attr" => array('class'=> "form-control"),
                'constraints'=> array(
                    new Assert\NotBlank(
                        array('message' => "Le rôle est vide")),
                    new Assert\Length(
                        array(
                            'min'   => 3,
                            'max'   => 10,
                            'minMessage' => 'Le rôle doit contenir au minimum {{ limit }} caractères.',
                            'maxMessage' => 'Le rôle doit contenir au maximum {{ limit }} caractères.',

                        )))
            ))
            ->add('qi', null, array("attr" => array('class'=> "form-control"),
                'constraints'=> array(
                    new Assert\NotBlank(
                        array('message' => "Le QI est vide")),
                    new Assert\Type(
                        array(
                            'type'   => 'numeric',
                            'message' => 'La valeur {{ value }} n est pas un type {{ type }} valide',

                        )))
            ))
            ->add('recompenses', 'textarea', array("attr" => array('class'=> "form-control")))
            ->add('dateCreated','datetime')
            ->add('dateDeleted','datetime')
            ->add('movies', null, array("attr" => array('class'=> "form-control"),
                    'constraints'=> array(
                        new Assert\NotBlank(
                            array('message' => "Le movie est vide")),
                    )
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WA\BoBundle\Entity\Actors'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'wa_bobundle_actors';
    }
}
