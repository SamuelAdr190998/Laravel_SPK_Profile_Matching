<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UbahPasswordController extends Controller
{
    public function index()
    {
        $datas = [
            'titlePage' => 'Ubah Password'
        ];

        return view('admin.pages.ubahpassword', $datas);
    }

    public function store(Request $request)
    {
        $validateRequest = $request->validate(
            [
                'password' => 'required|confirmed'
            ],
            [
                'password.required' => 'Field Password Wajib Diisi',
                'password.confirmed' => 'Password Tidak Sama'
            ]
        );

        $UpdateAccount = Auth()->user;
        $UpdateAccount->password = Hash::make($validateRequest['password']);
        $UpdateAccount->save();

        return redirect()->to('ubah-password')->with('successMessage', 'Berhasil mengubah password');
    }
}
