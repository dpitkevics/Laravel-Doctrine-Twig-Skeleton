<?php

namespace App\Forms\Auth;

use Kris\LaravelFormBuilder\Form;

class LoginForm extends Form
{
    protected $formOptions = [
        'method' => 'POST',
    ];

    public function buildForm()
    {
        $this
            ->add('email', 'text')
            ->add('password', 'password')
            ->add('submit', 'submit', [
                'label' => 'Login',
            ]);
    }
}
