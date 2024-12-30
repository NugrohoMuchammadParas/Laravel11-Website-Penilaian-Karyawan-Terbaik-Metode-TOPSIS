<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class About extends Controller
{
    public function index()
    {
        $data = [
            'profile' => 'admin-profile',
            'halaman' => 'about',
            'logout' => 'logout',
        ];

        return view('admin/about/about', $data);
    }
}
