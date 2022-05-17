<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function create() {
        return view('auth.login');
    }

    public function store() {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withInput()->withErrors([
                'message' => 'The email or password is incorrect, please try again'
            ]);
        }
        
        return redirect()->to('/');
    }

    public function logout() {
        auth()->logout();
        return redirect()->to('/');
    }
}
