<?php

namespace App\Form;

use App\Entity\MerlinSpeech;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MerlinSpeechType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fair')
            ->add('content')
            ->add('created_at')
            ->add('subject')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MerlinSpeech::class,
        ]);
    }
}
