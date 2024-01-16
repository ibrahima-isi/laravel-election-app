<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
//        User::create([
//           'name' => 'Admin',
//           'email' => 'ibra@test.fr',
//           'password' => Hash::make('passer'),
//        ]);
        \auth()->logout();
        return view('auth.login');
    }
    public function doLogin(LoginRequest $request)
    {
        $credentials = $request->validated();
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended(route('candidat'));
        }
        return to_route('auth.login')
            ->withErrors([
                'email' => 'Email ou mot de passe Incorrect',
                'password' => 'Email ou mot de passe Incorrect',
            ]);
    }

    public  function logout()
    {
        Auth::logout();
        return to_route('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function doRegister(LoginRequest $request)
    {
        $credentials = $request->validated();
        if($credentials){
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role'=> $request->input('role'),
            ]);
            if(Auth::attempt($credentials)){
                $request->session()->regenerate();
                return redirect()->intended(route('candidat'));
            }
        }
        return redirect()->route('auth.register');
//        dd($credentials);
    }
}

