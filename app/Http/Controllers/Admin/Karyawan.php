<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelKaryawan;

class Karyawan extends Controller
{
    public function index()
    {
        $data_karyawan = new ModelKaryawan();

        $data = [
            'tambah' => "admin-karyawan-tambah",
            'ubah' => "admin-karyawan-ubah",
            'hapus' => "admin-karyawan-hapus",
            'profile' => 'admin-profile',
            'halaman' => 'karyawan',
            'logout' => 'logout',
            'karyawan' => $data_karyawan->getAll(),
        ];

        return view('admin/karyawan/karyawan', $data);
    }

    public function index_tambah()
    {
        $data = [
            'kembali' => "admin-karyawan",
            'profile' => 'admin-profile',
            'halaman' => 'karyawan',
            'logout' => 'logout',
        ];

        return view('admin/karyawan/tambah_karyawan', $data);
    }

    public function tambah(Request $request)
    {
        $data_karyawan = new ModelKaryawan();

        $id_akun = session()->get('id_akun');

        $request->validate([
            'nama' => 'required|unique:karyawan|min:4|max:30',
            'lahir' => 'required|date',
            'telepon' => 'required|numeric',
            'email' => 'required|email',
            'alamat' => 'required|min:4|max:100',
        ], [
            'nama.required' => 'Nama harus diisi.',
            'nama.unique' => 'Nama sudah terdaftar di sistem.',
            'nama.min' => 'Nama harus memiliki minimal 4 karakter.',
            'nama.max' => 'Nama harus memiliki maximal 30 karakter.',
            'lahir.required' => 'Tanggal lahir harus diisi.',
            'lahir.date' => 'Tanggal lahir harus berupa tanggal yang valid.',
            'telepon.required' => 'Nomor telepon harus diisi.',
            'telepon.numeric' => 'Nomor telepon harus berupa angka.',
            'email.required' => 'Alamat email harus diisi.',
            'email.email' => 'Alamat email harus berupa alamat email yang valid.',
            'alamat.required' => 'Alamat harus diisi.',
            'alamat.min' => 'Alamat harus memiliki minimal 4 karakter.',
            'alamat.max' => 'Alamat harus memiliki maximal 100 karakter.',
        ]);

        $data = [
            'id_akun' => $id_akun,
            'nama' => $request->nama,
            'lahir' => $request->lahir,
            'telepon' => $request->telepon,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ];
        $data_karyawan->tambah($data);

        $data_flash = [
            'icon' => 'fas fa-check',
            'state' => 'success',
            'message' => 'Data Berhasil Ditambah !!',
            'title' => 'Tambah Data',
        ];
        session()->flash('data_flash', $data_flash);

        return redirect()->to('admin-karyawan');
    }

    public function index_ubah($id)
    {
        $data_karyawan = new ModelKaryawan();

        $data = [
            "kembali" => "/admin-karyawan",
            'profile' => '/admin-profile',
            'halaman' => 'karyawan',
            'logout' => '/logout',
            "karyawan" => $data_karyawan->getById($id),
        ];

        return view('admin/karyawan/ubah_karyawan', $data);
    }

    public function ubah(Request $request, $id)
    {
        $data_karyawan = new ModelKaryawan();
        $data_id = $data_karyawan->getById($id);

        $id_akun = session()->get('id_akun');

        if ($data_id['nama'] == $request->nama) {
            $request->validate([
                'nama' => 'required|min:4|max:30',
                'lahir' => 'required|date',
                'telepon' => 'required|numeric',
                'email' => 'required|email',
                'alamat' => 'required|min:4|max:100',
            ], [
                'nama.required' => 'Nama harus diisi.',
                'nama.min' => 'Nama harus memiliki minimal 4 karakter.',
                'nama.max' => 'Nama harus memiliki maximal 30 karakter.',
                'lahir.required' => 'Tanggal lahir harus diisi.',
                'lahir.date' => 'Tanggal lahir harus berupa tanggal yang valid.',
                'telepon.required' => 'Nomor telepon harus diisi.',
                'telepon.numeric' => 'Nomor telepon harus berupa angka.',
                'email.required' => 'Alamat email harus diisi.',
                'email.email' => 'Alamat email harus berupa alamat email yang valid.',
                'alamat.required' => 'Alamat harus diisi.',
                'alamat.min' => 'Alamat harus memiliki minimal 4 karakter.',
                'alamat.max' => 'Alamat harus memiliki maximal 100 karakter.',
            ]);
        } else {
            $request->validate([
                'nama' => 'required|unique:karyawan|min:4|max:30',
                'lahir' => 'required|date',
                'telepon' => 'required|numeric',
                'email' => 'required|email',
                'alamat' => 'required|min:4|max:100',
            ], [
                'nama.required' => 'Nama harus diisi.',
                'nama.unique' => 'Nama sudah terdaftar di sistem.',
                'nama.min' => 'Nama harus memiliki minimal 4 karakter.',
                'nama.max' => 'Nama harus memiliki maximal 30 karakter.',
                'lahir.required' => 'Tanggal lahir harus diisi.',
                'lahir.date' => 'Tanggal lahir harus berupa tanggal yang valid.',
                'telepon.required' => 'Nomor telepon harus diisi.',
                'telepon.numeric' => 'Nomor telepon harus berupa angka.',
                'email.required' => 'Alamat email harus diisi.',
                'email.email' => 'Alamat email harus berupa alamat email yang valid.',
                'alamat.required' => 'Alamat harus diisi.',
                'alamat.min' => 'Alamat harus memiliki minimal 4 karakter.',
                'alamat.max' => 'Alamat harus memiliki maximal 100 karakter.',
            ]);
        }

        $data = [
            'id_karyawan' => $id,
            'id_akun' => $id_akun,
            'nama' => $request->nama,
            'lahir' => $request->lahir,
            'telepon' => $request->telepon,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ];
        $data_karyawan->ubah($id, $data);

        $data_flash = [
            'icon' => 'fas fa-check',
            'state' => 'success',
            'message' => 'Data Berhasil Diubah !!',
            'title' => 'Ubah Data',
        ];
        session()->flash('data_flash', $data_flash);

        return redirect()->to('admin-karyawan');
    }

    public function hapus($id)
    {
        $data_karyawan = new ModelKaryawan();
        $data_karyawan->hapus($id);

        $data_flash = [
            'icon' => 'fas fa-check',
            'state' => 'success',
            'message' => 'Data Berhasil Dihapus !!',
            'title' => 'Hapus Data',
        ];
        session()->flash('data_flash', $data_flash);

        return redirect()->to('admin-karyawan');
    }
}
