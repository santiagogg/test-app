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
                    return $data->id;
                }])
            ->add('tags', 'choice', [
                'choices' => Keyword::all()->pluck('key', 'id')->toArray(),
                'selected' => function ($data) {
                    return array_pluck($data, 'id');
                },
                'expanded' => true,
                'multiple' => true
            ])
            ->add('submit', 'submit', ['label' => 'Save', 'attr' => ['class' => 'btn btn-primary']]);
    }
}
