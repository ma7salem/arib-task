<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManagerAuthController extends Controller
{
    public function getForm()
    {
        return view('auth.manager.login');    
    }

    public function postForm(LoginRequest $request)
    {
        $crd  = $request->validated();
        $user = User::where('phone', $crd['auth'])->orWhere('email', $crd['auth'])->first(); 
        if(!$user || !Hash::check($crd['password'], $user->password)){
            return back()->withInput()->withErrors(['auth' => ['Your credentials not valid.']]);
        }
        $rememberMe = $request->has('remember_me') ? true : false;
        auth()->login($user, $rememberMe);
        return redirect()->intended(route('home'));
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');    
    }
}
