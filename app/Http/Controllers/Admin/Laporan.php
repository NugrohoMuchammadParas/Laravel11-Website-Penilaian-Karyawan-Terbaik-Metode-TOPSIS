<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModelKaryawan;
use Illuminate\Http\Request;
use App\Models\ModelLaporan;

class Laporan extends Controller
{
    public function index()
    {
        $data_laporan = new ModelLaporan();

        $data = [
            'tambah' => "admin-laporan-tambah",
            'ubah' => "admin-laporan-ubah",
            'download' => "admin-laporan-download",
            'hapus' => "admin-laporan-hapus",
            'profile' => 'admin-profile',
            'halaman' => 'laporan',
            'logout' => 'logout',
            'laporan' => $data_laporan->getNameByIdAll(),
        ];

        return view('admin/laporan/laporan', $data);
    }

    public function index_tambah()
    {
        $data_karyawan = new ModelKaryawan();

        $data = [
            'kembali' => "admin-laporan",
            'profile' => 'admin-profile',
            'halaman' => 'laporan',
            'logout' => 'logout',
            'karyawan' => $data_karyawan->getAll(),
        ];

        return view('admin/laporan/tambah_laporan', $data);
    }

    public function tambah(Request $request)
    {
        $data_laporan = new Modellaporan();
        $data_karyawan = new ModelKaryawan();

        $id_karyawan = $data_karyawan->getIdByName($request->nama);

        $id_akun = session()->get('id_akun');

        $request->validate([
            'nama' => 'required|min:4|max:30',
            'tanggal' => 'required|date',
            'file' => 'required|file|mimes:pdf|max:2048',
        ], [
            'nama.required' => 'Nama harus diisi.',
            'nama.min' => 'Nama harus memiliki minimal 4 karakter.',
            'nama.max' => 'Nama harus memiliki maximal 30 karakter.',
            'tanggal.required' => 'Tanggal harus diisi.',
            'tanggal.required' => 'Tanggal harus berupa tanggal yang valid.',
            'file.required' => 'File harus diisi.',
            'file.file' => 'File harus berupa file.',
            'file.mimes' => 'File harus berformat PDF.',
            'file.max' => 'File tidak boleh lebih dari 2MB.',
        ]);

        $file = $request->file('file');
        $nama_file = $file->getClientOriginalName();
        $file->move('pdf/', $nama_file);

        $data = [
            'id_akun' => $id_akun,
            'id_karyawan' => $id_karyawan,
            'tanggal' => $request->tanggal,
            'file' => $nama_file,
        ];
        $data_laporan->tambah($data);

        $data_flash = [
            'icon' => 'fas fa-check',
            'state' => 'success',
            'message' => 'Data Berhasil Ditambah !!',
            'title' => 'Tambah Data',
        ];
        session()->flash('data_flash', $data_flash);

        return redirect()->to('admin-laporan');
    }

    public function index_ubah($id)
    {
        $data_laporan = new Modellaporan();
        $data_karyawan = new ModelKaryawan();

        $laporan = $data_laporan->getById($id);

        $data = [
            "kembali" => "/admin-laporan",
            'profile' => '/admin-profile',
            'halaman' => 'laporan',
            'logout' => '/logout',
            "laporan" => $data_laporan->getNameById($laporan->id_karyawan),
            'karyawan' => $data_karyawan->getAll()
        ];

        return view('admin/laporan/ubah_laporan', $data);
    }

    public function ubah(Request $request, $id)
    {
        $data_laporan = new Modellaporan();
        $data_karyawan = new ModelKaryawan();

        $karyawan = $data_karyawan->getByName($request->nama);
        $file_laporan = $data_laporan->getIdByLaporan($id);
        $id_karyawan = $data_karyawan->getIdByName($request->nama);

        $id_akun = session()->get('id_akun');

        if ($karyawan['nama'] == $request->nama) {
            $request->validate([
                'nama' => 'required|min:4|max:30',
                'tanggal' => 'required|date',
                'file' => 'file|mimes:pdf|max:2048',
            ], [
                'nama.required' => 'Nama harus diisi.',
                'nama.min' => 'Nama harus memiliki minimal 4 karakter.',
                'nama.max' => 'Nama harus memiliki maximal 30 karakter.',
                'tanggal.required' => 'Tanggal harus diisi.',
                'tanggal.required' => 'Tanggal harus berupa tanggal yang valid.',
                'file.required' => 'File harus diisi.',
                'file.file' => 'File harus berupa file.',
                'file.mimes' => 'File harus berformat PDF.',
                'file.max' => 'Ukuran file tidak boleh lebih dari 2MB.',
            ]);
        } else {
            $request->validate([
                'nama' => 'required|min:4|max:30',
                'tanggal' => 'required|date',
                'file' => 'file|mimes:pdf|max:2048',
            ], [
                'nama.required' => 'Nama harus diisi.',
                'nama.unique' => 'Nama sudah terdaftar di sistem.',
                'nama.min' => 'Nama harus memiliki minimal 4 karakter.',
                'nama.max' => 'Nama harus memiliki maximal 30 karakter.',
                'tanggal.required' => 'Tanggal harus diisi.',
                'tanggal.required' => 'Tanggal harus berupa tanggal yang valid.',
                'file.required' => 'File harus diisi.',
                'file.file' => 'File harus berupa file.',
                'file.mimes' => 'File harus berformat PDF.',
                'file.max' => 'Ukuran file tidak boleh lebih dari 2MB.',
            ]);
        }

        $data_nama = '';
        $file = $request->file('file');
        if ($file == null) {
            $data_nama = $file_laporan['file'];
        } else {
            $data_nama = $file->getClientOriginalName();
            $file->move('pdf/', $data_nama);
        }

        $data = [
            'id_laporan' => $id,
            'id_akun' => $id_akun,
            'id_karyawan' => $id_karyawan,
            'tanggal' => $request->tanggal,
            'file' => $data_nama,
        ];
        $data_laporan->ubah($id, $data);

        $data_flash = [
            'icon' => 'fas fa-check',
            'state' => 'success',
            'message' => 'Data Berhasil Diubah !!',
            'title' => 'Ubah Data',
        ];
        session()->flash('data_flash', $data_flash);

        return redirect()->to('admin-laporan');
    }

    public function hapus($id)
    {
        $data_laporan = new Modellaporan();
        $data_laporan->hapus($id);

        $data_flash = [
            'icon' => 'fas fa-check',
            'state' => 'success',
            'message' => 'Data Berhasil Dihapus !!',
            'title' => 'Hapus Data',
        ];
        session()->flash('data_flash', $data_flash);

        return redirect()->to('admin-laporan');
    }

    public function download($id)
    {
        $data_laporan = new ModelLaporan();
        $data_file = $data_laporan->getById($id);
        $isi = $data_file['file'];

        $data_flash = [
            'icon' => 'fas fa-check',
            'state' => 'success',
            'message' => 'Data Berhasil Didownload !!',
            'title' => 'Download Data',
        ];
        session()->flash('data_flash', $data_flash);

        return response()->download('pdf/' . $isi);
    }
}
