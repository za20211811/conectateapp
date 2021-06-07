<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $userS = Socialite::driver($provider)->user();

        if(!$usuario = User::where('provider_id',$userS->getId())->first()){
            if(!$usuario = User::where('email',$userS->getEmail())->first())
            {
                $usuario = User::create([
                    'nombre' => $this->getNombre($userS->getName()),
                    'apellido'=> $this->getApellido($userS->getName()),
                    'email'=>$userS->getEmail(),
                    'prodiver'=> $provider,
                    'provider_id'=>$userS->getId(),
                ]);


            }
        }

    }

    public function getNombre($nombre)
    {
        return substr($nombre,0,strpos($nombre," "));
    }

    public function getApellido($nombre){
        return substr($nombre,strpos($nombre," ")+1,strlen($nombre)-strpos($nombre," ")-1);
    }
}
