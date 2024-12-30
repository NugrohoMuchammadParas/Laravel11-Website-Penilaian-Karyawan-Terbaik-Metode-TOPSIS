<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ModelAkun;

class Login extends Controller
{
    public function index_login()
    {
        $data = [
            'register' => 'register',
        ];
        return view('home/login', $data);
    }

    public function data_login(Request $request)
    {
        $data_akun = new ModelAkun();

        $username = $request->username;
        $password = $request->password;
        $hasil = $data_akun->getByUsername($username);

        if ($hasil) {
            if ($hasil['level'] == 'admin') {
                if ($hasil['password'] == $password) {
                    $data_session = [
                        'id_akun' => $hasil['id_akun'],
                        'username' => $hasil['username'],
                        'nama' => $hasil['nama'],
                        'file' => $hasil['file'],
                        'level' => $hasil['level'],
                        'status' => $hasil['status'],
                    ];
                    $request->session()->put($data_session);

                    return redirect()->to('admin-home');
                } else {
                    $request->validate([
                        'username' => 'required',
                        'password' => 'required',
                    ], [
                        'username.required' => 'Username harus diisi.',
                        'Password.required' => 'Password harus diisi.',
                    ]);

                    return redirect()->to('login');
                }
            } else {
                if ($hasil['password'] == $password) {
                    $data_session = [
                        'id_akun' => $hasil['id_akun'],
                        'username' => $hasil['username'],
                        'nama' => $hasil['nama'],
                        'file' => $hasil['file'],
                        'level' => $hasil['level'],
                        'status' => $hasil['status'],
                    ];
                    $request->session()->put($data_session);

                    return redirect()->to('user-home');
                } else {
                    $request->validate([
                        'username' => 'required',
                        'password' => 'required',
                    ], [
                        'username.required' => 'Username harus diisi.',
                        'Password.required' => 'Password harus diisi.',
                    ]);

                    return redirect()->to('login');
                }
            }
        } else {
            $request->validate([
                'username' => 'required',
                'password' => 'required',
            ], [
                'username.required' => 'Username harus diisi.',
                'Password.required' => 'Password harus diisi.',
            ]);

            return redirect()->to('login');
        }
    }
}
