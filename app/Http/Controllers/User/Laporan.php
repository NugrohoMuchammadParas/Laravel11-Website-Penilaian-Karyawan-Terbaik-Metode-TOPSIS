<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ModelLaporan;

class Laporan extends Controller
{
    public function index()
    {
        $data_laporan = new ModelLaporan();

        $data = [
            'download' => "admin-laporan-download",
            'profile' => 'user-profile',
            'halaman' => 'laporan',
            'logout' => 'logout',
            'laporan' => $data_laporan->getNameByIdAll(),
        ];

        return view('user/laporan/laporan', $data);
    }

    public function download($id)
    {
        $data_laporan = new ModelLaporan();
        $data_file = $data_laporan->getById($id);
        $file = $data_file['file'];

        $data_flash = [
            'icon' => 'fas fa-check',
            'state' => 'success',
            'message' => 'Data Berhasil Didownload !!',
            'title' => 'Download Data',
        ];
        session()->flash('data_flash', $data_flash);

        return response()->download('pdf/' . $file);
    }
}
