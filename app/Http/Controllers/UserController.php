<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function showChangeEmailForm() {
        return view('users.update-email');
    }

    public function updateEmail(Request $request) {
        $users = User::where('email', $request->email)->get();

        if (count($users) > 0) {
            return back()->withInput()->withErrors([
                'message' => 'There is a user with the email provided'
            ]);
        }
        $user = User::where('email', auth()->user()->email)->first();
        $user->email = $request->email;
        $user->save();
        return redirect()->to('/');
    }

    public function users() {
        $users = User::all();
        return view('users.list')->with('users', $users);
    }

    public function showChangeStatusForm($user_id) {
        $user = User::where('id', $user_id)->first();
        return view('users.status')->with('user', $user);
    }

    public function updateStatus(Request $request) {
        $user = User::where('id', $request->id)->first();

        $user->status = $request->status;
        $user->save();
        return back()->with('status', 'Successful update');

        $user = User::where('id', $user_id)->first();
        return view('users.status')->with('user', $user);
    }

}
