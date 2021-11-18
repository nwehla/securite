<?php

namespace App\Form;

use App\Entity\Utilisateurs;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class)
            ->add('prenom',TextType::class)
            ->add('photo',TextType::class)
            ->add('datedenaissance',DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('login',TextType::class)
            ->add('motdepasse',TextType::class)
            ->add('adresse',TextType::class)
            ->add('email',EmailType::class,["attr"=>[
                "placeholder"=>"entrez un email valide"
            ]])
            ->add('role',ChoiceType::class , [
                "choices" =>["proprietaire"=>"proprietaire","locataire"=>"locataire","administrateur"=>"administrateur","gestionnaire"=>"administrateur"]
            ])
            ->add('envoyer',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateurs::class,
        ]);
    }
}
