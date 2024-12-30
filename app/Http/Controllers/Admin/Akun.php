<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelAkun;

class Akun extends Controller
{
    public function index()
    {
        $data_akun = new ModelAkun();

        $data = [
            'tambah' => "admin-akun-tambah",
            'ubah' => "admin-akun-ubah",
            'hapus' => "admin-akun-hapus",
            'profile' => 'admin-profile',
            'halaman' => 'akun',
            'logout' => 'logout',
            'akun' => $data_akun->getAll(),
        ];

        return view('admin/akun/akun', $data);
    }

    public function index_tambah()
    {
        $data = [
            'kembali' => "admin-akun",
            'profile' => 'admin-profile',
            'halaman' => 'akun',
            'logout' => 'logout',
        ];

        return view('admin/akun/tambah_akun', $data);
    }

    public function tambah(Request $request)
    {
        $data_akun = new Modelakun();

        $request->validate([
            'username' => 'required|unique:akun|min:4|max:30',
            'password' => 'required|min:4|max:30',
            'nama' => 'required|min:4|max:30',
            'file' => 'image|mimes:jpg,png|max:2048',
            'level' => 'required',
            'status' => 'required',
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
            'level.required' => 'Level harus diisi.',
            'status.required' => 'Status harus diisi.',
        ]);

        $data_nama = '';
        $file = $request->file('file');
        if ($file == null) {
            $data_nama = 'default.png';
        } else {
            $data_nama = $file->getClientOriginalName();
            $file->move('assets/img/', $data_nama);
        }

        $data = [
            'username' => $request->username,
            'password' => $request->password,
            'nama' => $request->nama,
            'file' => $data_nama,
            'level' => $request->level,
            'status' => $request->status,
        ];
        $data_akun->tambah($data);

        $data_flash = [
            'icon' => 'fas fa-check',
            'state' => 'success',
            'message' => 'Data Berhasil Ditambah !!',
            'title' => 'Tambah Data',
        ];
        session()->flash('data_flash', $data_flash);

        return redirect()->to('admin-akun');
    }

    public function index_ubah($id)
    {
        $data_akun = new Modelakun();

        $data = [
            "kembali" => "/admin-akun",
            'profile' => '/admin-profile',
            'halaman' => 'akun',
            'logout' => '/logout',
            "akun" => $data_akun->getById($id),
        ];

        return view('admin/akun/ubah_akun', $data);
    }

    public function ubah(Request $request, $id)
    {
        $data_akun = new Modelakun();
        $data_id = $data_akun->getById($id);

        if ($data_id['username'] == $request->username) {
            $request->validate([
                'username' => 'required|min:4|max:30',
                'password' => 'required|min:4|max:30',
                'nama' => 'required|min:4|max:30',
                'file' => 'image|mimes:jpg,png|max:2048',
                'level' => 'required',
                'status' => 'required',
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
                'level.required' => 'Level harus diisi.',
                'status.required' => 'Status harus diisi.',
            ]);
        } else {
            $request->validate([
                'username' => 'required|unique:akun|min:4|max:30',
                'password' => 'required|min:4|max:30',
                'nama' => 'required|min:4|max:30',
                'file' => 'image|mimes:jpg,png|max:2048',
                'level' => 'required',
                'status' => 'required',
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
                'level.required' => 'Level harus diisi.',
                'status.required' => 'Status harus diisi.',
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
            'id_akun' => $id,
            'username' => $request->username,
            'password' => $request->password,
            'nama' => $request->nama,
            'file' => $data_nama,
            'level' => $request->level,
            'status' => $request->status,
        ];
        $data_akun->ubah($id, $data);

        $data_flash = [
            'icon' => 'fas fa-check',
            'state' => 'success',
            'message' => 'Data Berhasil Diubah !!',
            'title' => 'Ubah Data',
        ];
        session()->flash('data_flash', $data_flash);

        return redirect()->to('admin-akun');
    }

    public function hapus($id)
    {
        $data_akun = new Modelakun();
        $data_akun->hapus($id);

        $data_flash = [
            'icon' => 'fas fa-check',
            'state' => 'success',
            'message' => 'Data Berhasil Dihapus !!',
            'title' => 'Hapus Data',
        ];
        session()->flash('data_flash', $data_flash);

        return redirect()->to('admin-akun');
    }
}
