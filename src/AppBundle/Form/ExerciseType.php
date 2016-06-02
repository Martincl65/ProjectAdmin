<?php

namespace AppBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ExerciseType extends AbstractType
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
                'time',
                TextType::class,
                array(
                    'label' => 'Durée',
                    'attr' => array(
                        'placeholder' => '00:00:00'
                    )
                )
            )
            ->add(
                'language',
                EntityType::class,
                array(
                    'label' => 'Langage',
                    'choice_label' => 'label',
                    'class' => 'AppBundle:Language',
                    'placeholder' => '',
                    'empty_data'  => null,
                    'attr' => array(
                        'placeholder' => '00:00:00'
                    ),
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('Language')
                            ->orderBy('Language.label', 'ASC');
                    }
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