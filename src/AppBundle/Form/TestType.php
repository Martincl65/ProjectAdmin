<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class TestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'title',
                TextType::class,
                array(
                    'label' => 'Titre'
                )
            )
            ->add(
                'level',
                EntityType::class,
                array(
                    'label' => 'Niveau',
                    'choice_label' => 'label',
                    'class' => 'AppBundle:Level',
                    'placeholder' => '',
                    'empty_data'  => null
                )
            )
            ->add(
                'exercises',
                EntityType::class,
                array(
                    'label' => 'Exercices',
                    'choice_label' => 'title',
                    'class' => 'AppBundle:Exercise',
                    'multiple' => true,
                    'placeholder' => '',
                    'empty_data'  => null
                )
            )
            ->add(
                'detail',
                TextareaType::class,
                array(
                    'label' => 'Consigne',
                    'attr' => array(
                        'rows' => 20
                    )
                )
            );
    }
}