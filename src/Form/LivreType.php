<?php

namespace App\Form;

use App\Entity\Auteur;
use App\Entity\User;
use App\Entity\GenreLitteraire;
use App\Entity\Livre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LivreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('isbn')
            ->add('date_parution', null, [
                'widget' => 'single_text'
            ])
            ->add('auteur', EntityType::class, [
                'class' => Auteur::class,

                'choice_label' => function($auteur) {
                    return $auteur->getNom() . " " . $auteur->getPrenom();
                },
                'multiple' => true,
            ])
            ->add('genre', EntityType::class, [
                'class' => GenreLitteraire::class,
                'choice_label' => 'libelle',
            ])
            ->add('emprupt', EntityType::class, [
                'class' => User::class,

                'choice_label' => function($user) {
                    return $user->getNom(). " " . $user->getPrenom().' - '.$user->getEmail();
                },
                'multiple' => false,
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Livre::class,
        ]);
    }
}
