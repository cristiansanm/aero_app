<?php

namespace App\Form;

use App\Entity\VuelosPersonal;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VuelosPersonal1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('vueloId')
            ->add('piloto')
            ->add('copiloto')
            ->add('ingeniero')
            ->add('auxiliar')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => VuelosPersonal::class,
        ]);
    }
}
