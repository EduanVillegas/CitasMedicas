<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //retorna la vista de Login
    public function showLoginForm()
    {
        return view('auth.login');
        //borramos la ruta que laravel genera por defecto
    }

    //Verificar credenciales del usuario
    // valida la peticion de inicio de sesion del usuario,
    // si son correctas las credenciales
    public function login(Request $request)
    {


        $this->validateLogin($request);
        //comprueba que los datos existan en la base de datos
        // return $request->password."  ".Hash::make($request->password);
        if (Auth::attempt(['email' => $request->email, 'password' =>  $request->password])) {
            return redirect()->route('main');
        }
        // if(Auth::attempt(['email' => $request->email,
        //                 'contrasena' => $request->password,
        //                 'activo' => 1])){

        //     //return redirect()->route('home');
        //     return "home";
        // }
        return "no se pudo";
        // retornamos a la vista anterior (login), con un mensaje de error
        // segun corresponda, ademas del input que el usuario ha escrito
        // para que esto funcione, en el campo input del userame se debe agregar:
        // value="{{ old('username) }}"
        // return back()
        //     ->withErrors(['username'=> trans('auth.failed')])
        //     ->withInput(request(['username']));
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/login');
    }


    protected function validateLogin(Request $req)
    {
        $this->validate($req, [
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
    }
}
