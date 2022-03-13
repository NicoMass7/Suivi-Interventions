<?php

namespace App\Form;

use App\Entity\Astreinte;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AstreinteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('categorie', TextType::class, array('label' => 'Catégorie astreinte :', 'attr' => array(
                'class' => 'form-control',
                'title' => 'Catégorie astreinte',
                'placeholder' => 'Catégorie astreinte'
            )))
            ->add('demiJournee', TextType::class, array('label' => 'Valeur demi-journée :', 'attr' => array(
                'class' => 'form-control',
                'title' => 'Valeur demi-journée',
                'placeholder' => 'Valeur demi-journée'
            )))
            ->add('journee', TextType::class, array('label' => 'Valeur journée :', 'attr' => array(
                'class' => 'form-control',
                'title' => 'Valeur journée',
                'placeholder' => 'Valeur journée'
            )))
            ->add('nuit', TextType::class, array('label' => 'Valeur nuit :', 'attr' => array(
                'class' => 'form-control',
                'title' => 'Valeur nuit',
                'placeholder' => 'Valeur nuit'
            )))
            ->add('ferie', TextType::class, array('label' => 'Valeur jour férié :', 'attr' => array(
                'class' => 'form-control',
                'title' => 'Valeur jour férié',
                'placeholder' => 'Valeur jour férié'
            )))
            ->add('weekEnd', TextType::class, array('label' => 'Valeur week-end :', 'attr' => array(
                'class' => 'form-control',
                'title' => 'Catégorie week-end',
                'placeholder' => 'Catégorie week-end'
            )))
            ->add('semaine', TextType::class, array('label' => 'Valeur semaine :', 'attr' => array(
                'class' => 'form-control',
                'title' => 'Valeur semaine',
                'placeholder' => 'Valeur semaine'
            )))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Astreinte::class,
        ]);
    }
}
