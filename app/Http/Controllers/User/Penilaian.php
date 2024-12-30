<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ModelPerangkingan;

class Penilaian extends Controller
{
    public function index()
    {
        $data_perangkingan = new ModelPerangkingan();

        $data = [
            'profile' => 'user-profile',
            'halaman' => 'penilaian',
            'logout' => 'logout',
            'penilaian' => $data_perangkingan->getOrderedByRank(),
        ];

        return view('user/penilaian/penilaian', $data);
    }
}
