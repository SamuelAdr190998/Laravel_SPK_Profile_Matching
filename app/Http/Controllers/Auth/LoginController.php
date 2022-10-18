<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function indexLogin()
    {
        $datas = [
            'titlePage' => 'Login'
        ];

        return view('auth', $datas);
    }

    public function logicLogin(Request $request)
    {
        $credentials = $request->validate(
            [
                'username' => ['required'],
                'password' => ['required'],
            ],
            [
                'username.required' => 'Field Username Wajib Diisi',
                'password.required' => 'Field Password Wajib Diisi'
            ]
        );

        if (Auth::attempt($credentials, $request->get('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'username' => 'Username atau Password Belum Benar. Silahkan Coba Lagi!.',
        ])->onlyInput('username');
    }
}
