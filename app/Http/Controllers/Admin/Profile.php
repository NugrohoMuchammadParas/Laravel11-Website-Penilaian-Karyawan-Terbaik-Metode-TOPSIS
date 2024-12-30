<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelAkun;

class Profile extends Controller
{
    public function index_ubah($id)
    {
        $data_akun = new ModelAkun();

        $data = [
            "kembali" => "/admin-home",
            'profile' => '/admin-profile',
            'halaman' => 'akun',
            'logout' => '/logout',
            "akun" => $data_akun->getById($id),
        ];

        return view('admin/profile/profile', $data);
    }

    public function ubah(Request $request, $id)
    {
        $data_akun = new ModelAkun();
        $data_id = $data_akun->getById($id);

        $id_akun = session()->get('id_akun');

        if ($data_id['username'] == $request->username) {
            $request->validate([
                'username' => 'required|min:4|max:30',
                'password' => 'required|min:4|max:30',
                'nama' => 'required|min:4|max:30',
                'file' => 'image|mimes:jpg,png|max:2048',
            ], [
                'username.required' => 'Username harus diisi.',
                'username.min' => 'Username harus memiliki minimal 4 karakter.',
                'username.max' => 'Username harus memiliki maximal 30 karakter.',
                'password.required' => 'Password harus diisi.',
                'password.min' => 'Password harus memiliki minimal 4 karakter.',
                'password.max' => 'Password harus memiliki maximal 30 karakter.',
                'nama.required' => 'Nama harus diisi.',
                'nama.min' => 'Nama harus memiliki minimal 4 karakter.',
                'nama.max' => 'Nama harus memiliki maximal 30 karakter.',
                'file.image' => 'File yang diunggah harus berupa gambar.',
                'file.mimes' => 'File harus berformat JPG atau PNG.',
                'file.max' => 'File tidak boleh lebih dari 2MB.',
            ]);
        } else {
            $request->validate([
                'username' => 'required|unique:akun|min:4|max:30',
                'password' => 'required|min:4|max:30',
                'nama' => 'required|min:4|max:30',
                'file' => 'image|mimes:jpg,png|max:2048',
            ], [
                'username.required' => 'Username harus diisi.',
                'username.unique' => 'Username sudah terdaftar di sistem.',
                'username.min' => 'Username harus memiliki minimal 4 karakter.',
                'username.max' => 'Username harus memiliki maximal 30 karakter.',
                'password.required' => 'Password harus diisi.',
                'password.min' => 'Password harus memiliki minimal 4 karakter.',
                'password.max' => 'Password harus memiliki maximal 30 karakter.',
                'nama.required' => 'Nama harus diisi.',
                'nama.min' => 'Nama harus memiliki minimal 4 karakter.',
                'nama.max' => 'Nama harus memiliki maximal 30 karakter.',
                'file.image' => 'File yang diunggah harus berupa gambar.',
                'file.mimes' => 'File harus berformat JPG atau PNG.',
                'file.max' => 'File tidak boleh lebih dari 2MB.',
            ]);
        }

        $data_nama = '';
        $file = $request->file('file');
        if ($file == null) {
            $data_nama = 'default.png';
        } else {
            $data_nama = $file->getClientOriginalName();
            $file->move('assets/img/', $data_nama);
        }

        $data = [
            'id_akun' => $id_akun,
            'username' => $request->username,
            'password' => $request->password,
            'nama' => $request->nama,
            'file' => $data_nama,
            'level' => 'admin',
            'status' => 'active',
        ];
        $data_akun->ubah($id, $data);

        $data_flash = [
            'icon' => 'fas fa-check',
            'state' => 'success',
            'message' => 'Data Berhasil Diubah !!',
            'title' => 'Ubah Data',
        ];
        session()->flash('data_flash', $data_flash);

        $akun = $data_akun->getById($id);
        $data_session = [
            'id_akun' => $akun['id_akun'],
            'username' => $akun['username'],
            'nama' => $akun['nama'],
            'file' => $akun['file'],
            'level' => $akun['level'],
            'status' => $akun['status'],
        ];
        session()->put($data_session);

        return redirect()->to('admin-home');
    }
}
