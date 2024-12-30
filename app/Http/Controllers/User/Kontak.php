<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class Kontak extends Controller
{
    public function index()
    {
        $data = [
            'profile' => 'user-profile',
            'halaman' => 'kontak',
            'logout' => 'logout'
        ];
        return view('user/kontak/kontak', $data);
    }
}
