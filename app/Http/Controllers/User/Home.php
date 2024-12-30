<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ModelAkun;
use App\Models\ModelKaryawan;
use App\Models\ModelLaporan;
use App\Models\ModelPerangkingan;

class Home extends Controller
{
    public function index()
    {
        $data_karyawan = new ModelKaryawan();
        $data_akun = new ModelAkun();
        $data_laporan = new ModelLaporan();
        $data_perangkingan = new ModelPerangkingan();

        $data = [
            'profile' => 'user-profile',
            'halaman' => 'home',
            'logout' => 'logout',
            'karyawan' => $data_karyawan->getAll(),
            'akun' => $data_akun->getAll(),
            'laporan' => $data_laporan->getAll(),
            'perangkingan' => $data_perangkingan->getAll(),
        ];

        return view('user/home/home', $data);
    }
}
