<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelKriteria;

class Kriteria extends Controller
{
    public function index()
    {
        $data_kriteria = new ModelKriteria();

        $data = [
            'tambah' => "admin-kriteria-tambah",
            'ubah' => "admin-kriteria-ubah",
            'hapus' => "admin-kriteria-hapus",
            'profile' => 'admin-profile',
            'halaman' => 'kriteria',
            'logout' => 'logout',
            'kriteria' => $data_kriteria->getAll(),
        ];

        return view('admin/kriteria/kriteria', $data);
    }

    public function index_tambah()
    {
        $data = [
            'kembali' => "admin-kriteria",
            'profile' => 'admin-profile',
            'halaman' => 'kriteria',
            'logout' => 'logout',
        ];

        return view('admin/kriteria/tambah_kriteria', $data);
    }

    public function tambah(Request $request)
    {
        $data_kriteria = new ModelKriteria();

        $id_akun = session()->get('id_akun');

        $request->validate([
            'kriteria' => 'required|unique:kriteria|min:4|max:30',
            'keterangan' => 'required|min:4|max:30',
            'bobot' => 'required|integer',
        ], [
            'kriteria.required' => 'Kriteria harus diisi.',
            'kriteria.unique' => 'Kriteria sudah terdaftar di sistem.',
            'kriteria.min' => 'Kriteria harus memiliki minimal 4 karakter.',
            'kriteria.max' => 'Kriteria harus memiliki maximal 30 karakter.',
            'keterangan.required' => 'Keterangan harus diisi.',
            'keterangan.min' => 'Keterangan harus memiliki minimal 4 karakter.',
            'keterangan.max' => 'Keterangan harus memiliki maximal 30 karakter.',
            'bobot.required' => 'Bobot harus diisi.',
            'bobot.integer' => 'Bobot harus berupa angka bilangan bulat.',
        ]);

        $data = [
            'id_akun' => $id_akun,
            'kriteria' => $request->kriteria,
            'keterangan' => $request->keterangan,
            'bobot' => $request->bobot,
        ];
        $data_kriteria->tambah($data);

        $data_flash = [
            'icon' => 'fas fa-check',
            'state' => 'success',
            'message' => 'Data Berhasil Ditambah !!',
            'title' => 'Tambah Data',
        ];
        session()->flash('data_flash', $data_flash);

        return redirect()->to('admin-kriteria');
    }

    public function index_ubah($id)
    {
        $data_kriteria = new ModelKriteria();

        $data = [
            "kembali" => "/admin-kriteria",
            'profile' => '/admin-profile',
            'halaman' => 'kriteria',
            'logout' => '/logout',
            "kriteria" => $data_kriteria->getById($id),
        ];

        return view('admin/kriteria/ubah_kriteria', $data);
    }

    public function ubah(Request $request, $id)
    {
        $data_kriteria = new ModelKriteria();
        $data_id = $data_kriteria->getById($id);

        $id_akun = session()->get('id_akun');

        if ($data_id['kriteria'] == $request->kriteria) {
            $request->validate([
                'kriteria' => 'required|min:4|max:30',
                'keterangan' => 'required|min:4|max:30',
                'bobot' => 'required|integer',
            ], [
                'kriteria.required' => 'Kriteria harus diisi.',
                'kriteria.min' => 'Kriteria harus memiliki minimal 4 karakter.',
                'kriteria.max' => 'Kriteria harus memiliki maximal 30 karakter.',
                'keterangan.required' => 'Keterangan harus diisi.',
                'keterangan.min' => 'Keterangan harus memiliki minimal 4 karakter.',
                'keterangan.max' => 'Keterangan harus memiliki maximal 30 karakter.',
                'bobot.required' => 'Bobot harus diisi.',
                'bobot.integer' => 'Bobot harus berupa angka bilangan bulat.',
            ]);
        } else {
            $request->validate([
                'kriteria' => 'required|unique:kriteria|min:4|max:30',
                'keterangan' => 'required|min:4|max:30',
                'bobot' => 'required|integer',
            ], [
                'kriteria.required' => 'Kriteria harus diisi.',
                'kriteria.unique' => 'Kriteria sudah terdaftar di sistem.',
                'kriteria.min' => 'Kriteria harus memiliki minimal 4 karakter.',
                'kriteria.max' => 'Kriteria harus memiliki maximal 30 karakter.',
                'keterangan.required' => 'Keterangan harus diisi.',
                'keterangan.min' => 'Keterangan harus memiliki minimal 4 karakter.',
                'keterangan.max' => 'Keterangan harus memiliki maximal 30 karakter.',
                'bobot.required' => 'Bobot harus diisi.',
                'bobot.integer' => 'Bobot harus berupa angka bilangan bulat.',
            ]);
        }

        $data = [
            'id_kriteria' => $id,
            'id_akun' => $id_akun,
            'kriteria' => $request->kriteria,
            'keterangan' => $request->keterangan,
            'bobot' => $request->bobot,
        ];
        $data_kriteria->ubah($id, $data);

        $data_flash = [
            'icon' => 'fas fa-check',
            'state' => 'success',
            'message' => 'Data Berhasil Diubah !!',
            'title' => 'Ubah Data',
        ];
        session()->flash('data_flash', $data_flash);

        return redirect()->to('admin-kriteria');
    }

    public function hapus($id)
    {
        $data_kriteria = new ModelKriteria();
        $data_kriteria->hapus($id);

        $data_flash = [
            'icon' => 'fas fa-check',
            'state' => 'success',
            'message' => 'Data Berhasil Dihapus !!',
            'title' => 'Hapus Data',
        ];
        session()->flash('data_flash', $data_flash);

        return redirect()->to('admin-kriteria');
    }
}
