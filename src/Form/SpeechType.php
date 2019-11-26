<?php

namespace App\Form;

use App\Entity\Speech;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SpeechType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('personage', null, [
                'label' => 'Personnage'
            ])
            ->add('context', null, [
                'label' => 'Contexte'
            ])
            ->add('subject', null, [
                'label' => 'Sujet'
            ])
            ->add('fair', null, [
                'label' => 'Juste'
            ])
            ->add('content', null, [
                'label' => 'Mots'
            ])
            ->add('created_at', null, [
                'label' => 'Médité le'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Speech::class,
        ]);
    }
}
