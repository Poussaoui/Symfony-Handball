<?php

namespace App\Form;

use App\Entity\Matche;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MatcheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('domicile_exterieur')
            ->add('equipe_adverse')
            ->add('date_heure')
            ->add('num_semaine')
            ->add('num_journee')
            ->add('gymnase')
            ->add('equipe_locale')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Matche::class,
        ]);
    }
}
