<?php

namespace App\Form;

use App\Entity\TipoUsuario;
use App\Entity\Usuariouni;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UsuariouniType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username')
            
            ->add('password')
            ->add('nombre')
            ->add('apellido')           
            ->add('tipoUsuario', EntityType::class, [
                'class' => TipoUsuario::class,
                'choice_label' => 'nombreTipo', // Cambia 'id' por 'nombreMedio' para usar el nombre como etiqueta
            'placeholder' => 'Selecciona un tipo de Usuario',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Usuariouni::class,
        ]);
    }
}
