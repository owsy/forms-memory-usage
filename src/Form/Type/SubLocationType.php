<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class SubLocationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void 
    {
        $builder->add('subLocationNumber', NumberType::class);
        $builder->add('buildings', CollectionType::class, [
            'entry_type' => BuildingType::class,
            'allow_add' => true,
            'allow_delete' => true,
        ]);

    }
}
