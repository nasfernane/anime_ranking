<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


use App\Models\User;

use App\Http\Requests\StoreUser;
use App\Http\Requests\LoginUser;

class AuthController extends Controller
{

    public function logIn (LoginUser $request) {
        // vérifie la validité des infos utilisateurs (voit class LoginUser dans Requests)
        $validated = $request->validated();

          if (Auth::attempt($validated)) {
            return redirect()->intended('/');
          }

          return back()->withErrors([
            'username' => 'Vos identifiants sont incorrects',
          ]);
    }

    public function signUp (StoreUser $request) {
        $validated = $request->validated();

          $user = new User();
          $user->username = $validated["username"];
          $user->password = Hash::make($validated["password"]);
          $user->save();

          Auth::login($user);
        
          return redirect(route('animes.index'));
    }

    public function signOut (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}