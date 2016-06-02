<?php

namespace AppBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class DeveloperType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'lastName',
                TextType::class,
                array(
                    'label' => 'Nom'
                )
            )->add(
                'firstName',
                TextType::class,
                array(
                    'label' => 'Prenom'
                )
            )->add(
                'username',
                TextType::class,
                array(
                    'label' => 'Identifiant'
                )
            )->add(
                'password',

                PasswordType::class,
                array(
                    'label' => 'Mot de passe'
                )
            )
            ->add(
                'test',
                EntityType::class,
                array(
                    'label' => 'Test',
                    'choice_label' => 'title',
                    'class' => 'AppBundle:Test',
                    'placeholder' => '',
                    'empty_data'  => null
                )
            );
    }
}