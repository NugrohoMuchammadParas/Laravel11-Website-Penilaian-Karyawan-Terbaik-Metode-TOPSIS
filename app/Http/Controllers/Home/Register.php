<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ModelAkun;

class Register extends Controller
{
    public function index_register()
    {
        $data = [
            'kembali' => 'login',
        ];
        return view('home/register', $data);
    }

    public function data_register(Request $request)
    {
        $data_akun = new ModelAkun();

        $request->validate([
            'username' => 'required|unique:akun|min:4|max:20',
            'password' => 'required|min:4|max:20',
        ], [
            'username.required' => 'Username harus diisi.',
            'username.unique' => 'Username sudah terdaftar di sistem.',
            'username.min' => 'Username harus memiliki minimal 4 karakter.',
            'username.max' => 'Username harus memiliki maximal 20 karakter.',
            'password.required' => 'Password harus diisi.',
            'password.min' => 'Password harus memiliki minimal 4 karakter.',
            'password.max' => 'Password harus memiliki maximal 20 karakter.',
        ]);

        $data = [
            'username' => $request->username,
            'password' => $request->password,
            'nama' => 'User',
            'file' => 'default.png',
            'level' => 'user',
            'status' => 'active',
        ];
        $data_akun->tambah($data);

        $data_flash = [
            'icon' => 'fas fa-check',
            'state' => 'success',
            'message' => 'Data Berhasil Disimpan !!',
            'title' => 'Simpan Data',
        ];
        session()->flash('data_flash', $data_flash);

        return redirect()->to('register');
    }
}
