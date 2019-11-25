<?php

namespace App\Form;

use App\Entity\MerlinSpeech;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MerlinSpeechType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('subject', null, [
                'label' => 'Sujet'
            ])
            ->add('text', null, [
                'label' => 'Mots'
            ])
            ->add('truthful', null, [
                'label' => 'Véridique'
            ])
            ->add('last_occurrence', null, [
                'label' => 'Dernière élocution',
                'disabled' => true
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MerlinSpeech::class,
            'translation_domain' => 'forms'
        ]);
    }
}
