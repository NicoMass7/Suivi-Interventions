<?php

namespace App\Form;

use App\Entity\Rh;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class RhType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomRh', TextType::class, array('label' => 'Nom :', 'attr' => array(
                'class' => 'form-control',
                'title' => 'Nom',
                'placeholder' => 'Nom'
            )))
            ->add('prenomRh', TextType::class, array('label' => 'Prénom :', 'attr' => array(
                'class' => 'form-control',
                'title' => 'Prénom',
                'placeholder' => 'Prénom'
            )))
            ->add('mailRh', EmailType::class, array('label' => 'Adresse mail :', 'attr' => array(
                'class' => 'form-control',
                'title' => 'Adresse mail',
                'placeholder' => 'Adresse mail'
            )))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Rh::class,
        ]);
    }
}
