<?php

namespace App\Form;

use App\Entity\aulas;
use App\Entity\medios;
use App\Entity\Reservaciones;
use App\Entity\usuariouni;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservacionesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('descripcion')
            ->add('fecha', null, [
                'widget' => 'single_text',
            ])
            //->add('estado')
            ->add('hora_inicio', null, [
                'widget' => 'single_text',
            ])
            ->add('hora_final', null, [
                'widget' => 'single_text',
            ])
            /*->add('usuario_id', EntityType::class, [
                'class' => Usuariouni::class,
                'choice_label' => 'username', 
            'placeholder' => 'Selecciona un Usuario',
            ])*/
            ->add('medios_id', EntityType::class, [
                'class' => Medios::class,
                'choice_label' => 'tipo_medio_id.nombreMedio', 
            'placeholder' => 'Selecciona un Medio',
            ])
            ->add('aulas_id', EntityType::class, [
                'class' => Aulas::class,
                'choice_label' => 'codigo', 
            'placeholder' => 'Selecciona un Aula',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservaciones::class,
        ]);
    }
}
