<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function show_login()
    {
        if (empty(auth()->user())) {
            return view('auth.login');
        } elseif (auth()->user()->level == 'admin' or auth()->user()->level == 'karyawan') {
            return redirect('admin/dashboard');
        } else {
            return redirect('/');
        }
    }
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
            return redirect('/login')
                ->withErrors($validator)
                ->withInput();
        }
        if (!Hash::check($password, $user->password)) {
            $validator = $request->validate([
                'password' => ['required'],
            ], [

                'username.required' => 'username diisi'
            ]);
            return redirect('/login')
                ->withErrors($validator)
                ->withInput();
        }
        if (Auth::attempt($request->only('username', 'password'))) {
            return redirect('admin/dashboard');
        }
        return redirect('/login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
