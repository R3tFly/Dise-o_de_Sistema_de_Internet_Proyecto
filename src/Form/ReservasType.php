<?php

namespace App\Form;

use App\Entity\Aulas;
use App\Entity\Medios;
use App\Entity\Reservas;
use App\Entity\Usuariouni;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('descripcion')
            ->add('fecha', null, [
                'widget' => 'single_text',
            ])
            ->add('estado')
            ->add('hora_inicio', null, [
                'widget' => 'single_text',
            ])
            ->add('hora_final', null, [
                'widget' => 'single_text',
            ])
            ->add('usuario_id', EntityType::class, [
                'class' => Usuariouni::class,
                'choice_label' => 'username', 
            'placeholder' => 'Selecciona un Usuario',
            ])
            ->add('medios_id', EntityType::class, [
                'class' => Medios::class,
                'choice_label' => 'nombre_medio', 
            'placeholder' => 'Selecciona un Medio',
            ])
            ->add('aulas_id', EntityType::class, [
                'class' => Aulas::class,
                'choice_label' => 'codigoAula', 
            'placeholder' => 'Selecciona un Aula',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservas::class,
        ]);
    }
}
