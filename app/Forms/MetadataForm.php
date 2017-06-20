<?php

namespace App\Forms;

use App\Keyword;
use App\Location;
use Kris\LaravelFormBuilder\Form;


class MetadataForm extends Form
{
    public function buildForm()
    {

        $this
            ->add('location', 'select', [
                'choices' => Location::all()->pluck('location', 'id')->toArray(),
                'selected' => function ($data) {

                    return $data? $data->id: null;
                },
                'empty_value' => '=== Select Location ==='
            ])
            ->add('tags', 'choice', [
                'choices' => Keyword::all()->pluck('key', 'id')->toArray(),
                'selected' => function ($data) {
                    return $data? array_pluck($data, 'id'): null;
                },
                'expanded' => true,
                'multiple' => true
            ])
            ->add('submit', 'submit', ['label' => 'Save', 'attr' => ['class' => 'btn btn-primary']]);
    }
}
