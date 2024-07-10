<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;

class LocationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('locationNumber', NumberType::class);
        $builder->add('subLocations', CollectionType::class, [
            'entry_type' => SubLocationType::class,
            'allow_add' => true,
            'allow_delete' => true,
        ]);
    }
}
