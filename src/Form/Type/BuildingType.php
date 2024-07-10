<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class BuildingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void 
    {
        $builder->add('buildingNumber', NumberType::class);
        foreach (range(1, 100) as $i) {
            $builder->add('buildingField'.$i, TextType::class, [
                'attr' => [
                    'foo' => 123,
                ],
            ]);
        }
    }
}
