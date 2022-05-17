<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

use App\Models\User;
use App\Models\PasswordReset;

class ForgotPasswordController extends Controller
{
    public function showForm() {
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request) {
        $this->validate(request(), 
            ['email' => 'required|email']
        );

        $user = User::where('email', $request->email)->first();

        if (!isset($user)) {
            return redirect()->back()->withErrors(['email' => trans('User with email "'.$request->email.'"" does not exist')]);
        }

        $tokenData = PasswordReset::create([
            'email' => $request->email,
            'token' => Str::random(60),
            'created_at' => Carbon::now()
        ]);

        if ($this->sendResetEmail($user, $tokenData->token)) {
            return redirect()->back()->with('status', 'A reset link has been sent to your email address. (review logs)');
        } else {
            return redirect()->back()->withErrors(['error' => 'A Network Error occurred. Please try again.']);
        }
    }

    private function sendResetEmail($user, $token) {
        $link = config('app.url') . '/password/reset/' . $token . '?email=' . urlencode($user->email);
        try {
            \Log::info('Se enviará un correo al usuario '.$user->name.' ('.$user->email.'). El link de restablecimiento es: '.$link);
            //enviar correo al usuario
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
