<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class SubLocationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void 
    {
        foreach (range(1, 100) as $i) {
            $builder->add('field'.$i, TextType::class, [
                'attr' => [
                    'foo' => 123,
                ],
            ]);
        }
    }
}
