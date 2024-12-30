<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class About extends Controller
{
    public function index()
    {
        $data = [
            'profile' => 'user-profile',
            'halaman' => 'about',
            'logout' => 'logout'
        ];
        return view('user/about/about', $data);
    }
}
