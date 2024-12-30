<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ModelKaryawan;

class Karyawan extends Controller
{
    public function index()
    {
        $data_karyawan = new ModelKaryawan();

        $data = [
            'profile' => 'user-profile',
            'halaman' => 'karyawan',
            'logout' => 'logout',
            'karyawan' => $data_karyawan->getAll(),
        ];

        return view('user/karyawan/karyawan', $data);
    }
}
