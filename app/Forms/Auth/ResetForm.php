<?php

namespace App\Forms\Auth;

use Kris\LaravelFormBuilder\Form;

class ResetForm extends Form
{
    protected $formOptions = [
        'method' => 'POST',
    ];

    public function buildForm()
    {
        $this
            ->add('email', 'email')
            ->add('password', 'password')
            ->add('password_confirmation', 'password')
            ->add('token', 'hidden', [
                'default_value' => isset($this->data['token']) ? $this->data['token'] : null,
            ])
            ->add('submit', 'submit', [
                'label' => 'Reset Password',
            ]);
    }
}
