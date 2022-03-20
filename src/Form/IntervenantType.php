<?php

namespace App\Form;

use App\Entity\Astreinte;
use App\Entity\Intervenant;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class IntervenantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, array('label' => 'Nom :', 'attr' => array(
                'class' => 'form-control',
                'title' => 'Nom',
                'placeholder' => 'Nom'
            )))
            ->add('prenom', TextType::class, array('label' => 'Prénom :', 'attr' => array(
                'class' => 'form-control',
                'title' => 'Prénom',
                'placeholder' => 'Prénom'
            )))
            ->add('trigramme', TextType::class, array('label' => 'Trigramme :', 'attr' => array(
                'class' => 'form-control',
                'title' => 'Trigramme',
                'placeholder' => 'Trigramme'
            )))
            ->add('mail', EmailType::class, array('label' => 'Adresse mail :', 'attr' => array(
                'class' => 'form-control',
                'title' => 'Adresse mail',
                'placeholder' => 'Adresse mail'
            )))
            ->add('salaire', TextType::class, array('label' => 'Salaire annuel :', 'attr' => array(
                'class' => 'form-control',
                'title' => 'Salaire annuel',
                'placeholder' => 'Salaire annuel'
            )))
            ->add('catAstreinte', EntityType::class, [
                'class' => Astreinte::class,
                'placeholder' => 'Astreinte',
                'required'   => false,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c')->orderBy('c.id', 'ASC');
                },
                'choice_label' => 'categorie',
                'label' => 'Catégorie d\'astreinte :',
                'attr' => array(
                    'class' => 'form-control',
                    'title' => 'Catégorie',
                )
            ])
            ->add('idResponsable', EntityType::class, [
                'class' => Intervenant::class,
                'placeholder' => 'Responsable',
                'required'   => false,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c')->where('c.idResponsable IS NULL')->orderBy('c.nom', 'ASC');
                },
                'choice_label' => function (Intervenant $intervenant) {
                    return $intervenant->getNom() . ' ' . $intervenant->getPrenom();
                },
                'label' => 'Nom du responsable :',
                'attr' => array(
                    'class' => 'form-control',
                    'title' => 'Nom du responsable'
                )
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Intervenant::class,
        ]);
    }
}
