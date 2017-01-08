<?php

namespace App\Forms\Auth;

use Kris\LaravelFormBuilder\Form;

class RegisterForm extends Form
{
    protected $formOptions = [
        'method' => 'POST',
    ];

    public function buildForm()
    {
        $this
            ->add('first_name', 'text')
            ->add('last_name', 'text')
            ->add('username', 'text')
            ->add('email', 'email')
            ->add('password', 'password')
            ->add('password_confirmation', 'password')
            ->add('submit', 'submit', [
                'label' => 'Register',
            ]);
    }
}
