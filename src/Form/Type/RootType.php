<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;

class RootType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('locations', CollectionType::class, [
            'entry_type' => LocationType::class,
            'allow_add' => true,
            'allow_delete' => true,
        ]);
    }
}
