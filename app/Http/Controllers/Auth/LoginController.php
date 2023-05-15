<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

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
    //protected $redirectTo = RouteServiceProvider::HOME;

     //Cliente


     public function login(Request $request)
     {
         $this->validateLogin($request);
        
         // Si la clase usa el rasgo ThrottlesLogins, podemos acelerar automáticamente
         // los intentos de inicio de sesión para esta aplicación. Teclearemos esto por el nombre de usuario y
         // la dirección IP del cliente que realiza estas solicitudes en esta aplicación.
         if (method_exists($this, 'hasTooManyLoginAttempts') &&
             $this->hasTooManyLoginAttempts($request)) {
             $this->fireLockoutEvent($request);
 
             return $this->sendLockoutResponse($request);
         }
 
         if ($this->attemptLogin($request) && $this->attemptLogin($request) != 'inactivo') {
 
             if ($request->hasSession()) {
                 $request->session()->put('auth.password_confirmed_at', time());
             }
 
             return $this->sendLoginResponse($request);      
             
         }else if($this->attemptLogin($request) == 'inactivo') { // Verifica si el usuario esta inactivo
            
             return redirect()->route('login')->with('status', 'Esta cuenta se encuentra inactiva, para ingresar y habilitar la cuenta debes de llevar el costo del plan que adquiriste al gimnasio.');  
         }
 
         // Si el intento de inicio de sesión no tuvo éxito, incrementaremos el número de intentos
         // para iniciar sesión y redirigir al usuario al formulario de inicio de sesión. Por supuesto, cuando esto
         // el usuario supera su número máximo de intentos, será bloqueado.
         $this->incrementLoginAttempts($request);
 
         return $this->sendFailedLoginResponse($request); 
     }

     public function username()
    {
        return 'id';
    }


     protected function attemptLogin(Request $request)
     {
         // Me permite buscar y verificar si el usuario esta
         // permitido entrar a la aplicacion por medio del estado
         // (activo o inactivo), al no ser asi me retorna un string
         $user = Cliente::find($request->input('id'));
         if (!empty($user)) {
             if (Hash::check($request->input('password'), $user->password)) {
                 if ($user->estado_id != 1) {
                     return 'inactivo';
                 }
             }
         }
 
         return $this->guard()->attempt(
             $this->credentials($request), $request->boolean('remember')
         );
     }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
