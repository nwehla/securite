<?php

namespace App\Form;

use App\Entity\Auteurs;
use App\Entity\Articles;
use App\Entity\Categorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class ArticlesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('contenu')
            ->add('date')
            ->add('resume')
            ->add('images')          
            ->add("categorie",EntityType::class,[
                'class'=>Categorie::class,
                'placeholder'=>'selectionnner une categorie',

                'choice_label'=>'titre',
                /*utiliser un checkbox à choix unique ou multiple
                'multiple'=>true,
                'expanded'=>true,*/
            ])
            ->add("auteurs",EntityType::class,[
                'class'=>Auteurs::class,
                'placeholder'=>'selectionnner une auteur',

                'choice_label'=>'nom',
                /*utiliser un checkbox à choix unique ou multiple
                'multiple'=>true,*/
                'expanded'=>true,
            ])
            ->add("valider",SubmitType::class)
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Articles::class,
        ]);
    }
}
