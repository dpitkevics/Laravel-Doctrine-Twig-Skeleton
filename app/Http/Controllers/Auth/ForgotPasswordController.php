<?php

namespace App\Http\Controllers\Auth;

use App\Forms\Auth\LinkRequestForm;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Kris\LaravelFormBuilder\FormBuilder;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showLinkRequestForm(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(LinkRequestForm::class, [
            'url' => url('password/email'),
        ]);

        return view('auth.passwords.email', compact('form'));
    }
}
