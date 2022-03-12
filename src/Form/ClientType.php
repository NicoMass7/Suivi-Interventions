<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('societe', TextType::class, array('label' => 'Nom de la société :', 'attr' => array(
                'class' => 'form-control',
                'title' => 'Nom de la société',
                'placeholder' => 'Nom de la société'
            )))
            ->add('adresse', TextType::class, array('label' => 'Adresse :', 'attr' => array(
                'class' => 'form-control',
                'title' => 'Adresse',
                'placeholder' => 'Adresse'
            )))
            ->add('codePostal', TextType::class, array('label' => 'Code postal :', 'attr' => array(
                'class' => 'form-control',
                'title' => 'Code postal',
                'placeholder' => 'Code postal'
            )))
            ->add('ville', TextType::class, array('label' => 'Ville :', 'attr' => array(
                'class' => 'form-control',
                'title' => 'Ville',
                'placeholder' => 'Ville'
            )))
            ->add('contact', TextType::class, array('label' => 'Contact :', 'attr' => array(
                'class' => 'form-control',
                'title' => 'Contact',
                'placeholder' => 'Nom du contact'
            )))
            ->add('telephone', TextType::class, array('label' => 'Téléphone :', 'attr' => array(
                'class' => 'form-control',
                'title' => 'Téléphone',
                'placeholder' => 'Téléphone'
            )))
            ->add('mailClient', EmailType::class, array('label' => 'Adresse mail :', 'attr' => array(
                'class' => 'form-control',
                'title' => 'Adresse mail',
                'placeholder' => 'Adresse mail'
            )))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
