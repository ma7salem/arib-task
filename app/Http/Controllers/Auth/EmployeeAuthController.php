<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class EmployeeAuthController extends Controller
{
    public function getForm()
    {
        return view('auth.employee.login');    
    }

    public function postForm(LoginRequest $request)
    {
        $crd  = $request->validated();
        $user = Employee::where('phone', $crd['auth'])->orWhere('email', $crd['auth'])->first(); 
        if(!$user || !Hash::check($crd['password'], $user->password)){
            return back()->withInput()->withErrors(['auth' => ['Your credentials not valid.']]);
        }
        auth('employees')->login($user);
        return redirect()->intended(route('emp_home'));
    }

    public function logout()
    {
        auth('employees')->logout();
        return redirect()->route('emp_login');    
    }
}
