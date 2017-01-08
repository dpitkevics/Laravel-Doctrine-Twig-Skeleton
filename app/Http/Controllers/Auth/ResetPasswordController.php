<?php

namespace App\Http\Controllers\Auth;

use App\Entities\User;
use App\Forms\Auth\ResetForm;
use App\Http\Controllers\Controller;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Kris\LaravelFormBuilder\FormBuilder;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->middleware('guest');

        $this->entityManager = $entityManager;
    }

    public function showResetForm(Request $request, FormBuilder $formBuilder, $token = null)
    {
        $form = $formBuilder->create(ResetForm::class, [
            'url' => url('password/reset'),
            'data' => [
                'token' => $token,
            ],
        ]);

        return view('auth.passwords.reset')->with(
            ['email' => $request->email, 'form' => $form]
        );
    }

    /**
     * Reset the given user's password.
     *
     * @param  User $user
     * @param  string $password
     */
    protected function resetPassword($user, $password)
    {
        $user->setPassword(bcrypt($password));
        $user->setRememberToken(Str::random(60));

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        $this->guard()->login($user);
    }
}
