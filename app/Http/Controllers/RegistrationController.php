<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegistrationController extends Controller
{
    public function create() {
        return view('auth.register');
    }

    public function store(Request $request) {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ]);

        $user = User::create(request(['name', 'email', 'password']));
        
        auth()->login($user);
        
        return redirect()->to('/');
    }
}
