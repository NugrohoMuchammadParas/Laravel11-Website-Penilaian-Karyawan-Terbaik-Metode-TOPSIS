<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class Kontak extends Controller
{
    public function index()
    {
        $data = [
            'profile' => 'admin-profile',
            'halaman' => 'kontak',
            'logout' => 'logout',
        ];

        return view('admin/kontak/kontak', $data);
    }
}
