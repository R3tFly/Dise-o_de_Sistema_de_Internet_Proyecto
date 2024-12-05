<?php

namespace App\Form;

use App\Entity\Medios;
use App\Entity\TipoMedio;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MediosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        
            ->add('cantidad')
            ->add('tipo_medio_id', EntityType::class, [
                'class' => TipoMedio::class,
                'choice_label' => 'nombreMedio', // Cambia 'id' por 'nombreMedio' para usar el nombre como etiqueta
            'placeholder' => 'Selecciona un tipo de medio',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Medios::class,
        ]);
    }
}
