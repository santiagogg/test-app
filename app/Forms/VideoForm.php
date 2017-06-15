<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class VideoForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('title', 'text')
            ->add('file', 'file')
            ->add('submit', 'submit', ['label' => 'Save',  'attr' => ['class' => 'btn btn-primary']]);
    }
}
