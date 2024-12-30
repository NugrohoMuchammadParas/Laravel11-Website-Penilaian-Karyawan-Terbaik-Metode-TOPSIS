<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Logout extends Controller
{
    public function index_logout()
    {
        session()->flush();

        return redirect()->to('/');
    }
}
