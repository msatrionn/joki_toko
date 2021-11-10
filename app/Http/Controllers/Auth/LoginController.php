<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $user = User::where('username', $username)->first();
        if (!$user) {
            $validator = $request->validate([
                'username' => ['required'],
            ], [

                'username.required' => 'username diisi'
            ]);
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }
        if (!Hash::check($password, $user->password)) {
            $validator = $request->validate([
                'password' => ['required'],
            ], [

                'username.required' => 'username diisi'
            ]);
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }
        if (Auth::attempt($request->only('username', 'password'))) {
            return redirect('dashboard');
        }
        return redirect('/');
    }
}
