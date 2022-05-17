<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\PasswordReset;

class ResetPasswordController extends Controller
{
    public function showResetForm(Request $request)
    {
        $token = $request->route()->parameter('token');
        
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function reset(Request $request) {
        $request->validate($this->rules());

        $tokenData = PasswordReset::where('token', $request->token)->first();
        if (!$tokenData) return view('auth.passwords.email')->withErrors(['error' => 'The token provided is invalid. Request password reset again']);

        $user = User::where('email', $tokenData->email)->first();

        if (!$user) return redirect()->back()->withErrors(['email' => 'Email not found']);

        $user->password = $request->password;
        $user->setRememberToken(Str::random(60));
        $user->save();
        \Auth::guard()->login($user);

        //Borrar token
        PasswordReset::where('email', $user->email)->delete();

        \Log::info('Se enviará un correo al usuario '.$user->name.' ('.$user->email.') confirmando el cambio de contraseña. ');

        return redirect()->to('/');
    }

    protected function rules() {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ];
    }
}
