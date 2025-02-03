<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function viewRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $rules = $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'string'],
        ]);

        User::create($rules);

        return redirect('/login');
    }
}
