<?php

namespace App\Form;

use App\Entity\Taxi;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type as Type;

class TaxiType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', Type\TextType::class, [
                'label' => 'Prénom',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Merci de saisir le prénom du client'
                ]
            ])
            ->add('prenom', Type\TextType::class, [
                'label' => 'Nom',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Merci de saisir le nom du client'
                ]
            ])
            ->add('raison_sociale', Type\TextType::class, [
                'label' => 'Raison sociale ',
                'required' => true,
                'disabled' => false,
                'attr' => [
                    'placeholder' => 'Raison sociale',
                ]
            ])

            ->add('activite', Type\ChoiceType::class, [
                'label' => 'activite',
                'required' => false,
                'placeholder' => "Démarrage d'activité ?",
                'choices' => [
                    'OUI' => 'oui',
                    'NON' => 'non'
                ],
                'expanded' => false,
                'multiple' => false
            ])
            ->add('assure', Type\ChoiceType::class, [
                'label' => 'assure',
                'required' => false,
                'placeholder' => 'Véhicule assuré actuellement ?',
                'choices' => [
                    'OUI' => 'oui',
                    'NON' => 'non'
                ],
                'expanded' => false,
                'multiple' => false
            ])
            ->add('ancienne', Type\ChoiceType::class, [
                'label' => 'ancienne',
                'required' => false,
                'placeholder' => 'Assurance résiliée ?',
                'choices' => [
                    'OUI' => 'oui',
                    'NON' => 'non'
                ],
                'expanded' => false,
                'multiple' => false
            ])
            ->add('motif',  Type\ChoiceType::class, [
                'label' => 'motif',
                'required' => false,
                'placeholder' => '--Merci de Choisir --',
                'choices' => [
                    'Sinistre' => 'Sinistre',
                    'Non paiement' => 'Non paiement',
                    'Suspension de permis' => 'Suspension de permis',
                    'Echéance' => 'Echéance'
                ],
                'expanded' => false,
                'multiple' => false
            ])
            ->add('tele', Type\TextType::class, [
                'label' => 'Téléphone 2',
                'required' => true,
                'disabled' => false,
                'attr' => [
                    'placeholder' => 'Merci de saisir le numéro de téléphone'
                ]
            ])
            ->add('email', Type\EmailType::class, [
                'label' => 'Email',
                'required' => true,
                'disabled' => false,
                'attr' => [
                    'placeholder' => "Merci de saisir l'adresse email"
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Taxi::class,
        ]);
    }
}
