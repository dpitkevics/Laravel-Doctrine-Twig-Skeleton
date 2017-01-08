<?php

namespace App\Forms\Auth;

use Kris\LaravelFormBuilder\Form;

class LinkRequestForm extends Form
{
    protected $formOptions = [
        'method' => 'POST',
    ];

    public function buildForm()
    {
        $this
            ->add('email', 'email')
            ->add('submit', 'submit', [
                'label' => 'Recover Password',
            ]);
    }
}
