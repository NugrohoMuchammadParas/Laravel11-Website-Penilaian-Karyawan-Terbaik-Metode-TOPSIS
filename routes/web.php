<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin;
use App\Http\Controllers\User;
use App\http\Controllers\Home;


Route::get('/', [Home\Login::class, 'index_login']);

Route::get('login', [Home\Login::class, 'index_login']);
Route::post('login-data', [Home\Login::class, 'data_login']);

Route::get('register', [Home\Register::class, 'index_register']);
Route::post('register-data', [Home\Register::class, 'data_register']);

Route::get('logout', [Home\Logout::class, 'index_logout']);


Route::get('user-home', [User\Home::class, 'index']);

Route::get('user-karyawan', [User\Karyawan::class, 'index']);

Route::get('user-penilaian', [User\Penilaian::class, 'index']);

Route::get('user-laporan', [User\Laporan::class, 'index']);
Route::get('user-laporan-download/{id}', [User\Laporan::class, 'download']);

Route::get('user-about', [User\About::class, 'index']);

Route::get('user-kontak', [User\Kontak::class, 'index']);

Route::get('user-profile/{id}', [User\Profile::class, 'index_ubah']);
Route::post('user-ubah-profile/{id}', [User\Profile::class, 'ubah']);


Route::get('admin-home', [Admin\Home::class, 'index']);

Route::get('admin-karyawan', [Admin\Karyawan::class, 'index']);
Route::get('admin-karyawan-tambah', [Admin\Karyawan::class, 'index_tambah']);
Route::post('admin-karyawan-tambah-data', [Admin\Karyawan::class, 'tambah']);
Route::get('admin-karyawan-ubah/{id}', [Admin\Karyawan::class, 'index_ubah']);
Route::post('admin-karyawan-ubah-data/{id}', [Admin\Karyawan::class, 'ubah']);
Route::get('admin-karyawan-hapus/{id}', [Admin\Karyawan::class, 'hapus']);

Route::get('admin-kriteria', [Admin\Kriteria::class, 'index']);
Route::get('admin-kriteria-tambah', [Admin\Kriteria::class, 'index_tambah']);
Route::post('admin-kriteria-tambah-data', [Admin\Kriteria::class, 'tambah']);
Route::get('admin-kriteria-ubah/{id}', [Admin\Kriteria::class, 'index_ubah']);
Route::post('admin-kriteria-ubah-data/{id}', [Admin\Kriteria::class, 'ubah']);
Route::get('admin-kriteria-hapus/{id}', [Admin\Kriteria::class, 'hapus']);

Route::get('admin-alternatif', [Admin\Alternatif::class, 'index']);
Route::get('admin-alternatif-tambah', [Admin\Alternatif::class, 'index_tambah']);
Route::post('admin-alternatif-tambah-data', [Admin\Alternatif::class, 'tambah']);
Route::get('admin-alternatif-ubah/{id}', [Admin\Alternatif::class, 'index_ubah']);
Route::post('admin-alternatif-ubah-data/{id}', [Admin\Alternatif::class, 'ubah']);
Route::get('admin-alternatif-hapus/{id}', [Admin\Alternatif::class, 'hapus']);

Route::get('admin-penilaian', [Admin\Penilaian::class, 'index']);
Route::get('admin-penilaian-perhitungan', [Admin\Penilaian::class, 'index_perhitungan']);
Route::get('admin-penilaian-print', [Admin\Penilaian::class, 'index_print_penilaian']);
Route::get('admin-perhitungan-print', [Admin\Penilaian::class, 'index_print_perhitungan']);

Route::get('admin-laporan', [Admin\Laporan::class, 'index']);
Route::get('admin-laporan-tambah', [Admin\Laporan::class, 'index_tambah']);
Route::post('admin-laporan-tambah-data', [Admin\Laporan::class, 'tambah']);
Route::get('admin-laporan-ubah/{id}', [Admin\Laporan::class, 'index_ubah']);
Route::post('admin-laporan-ubah-data/{id}', [Admin\Laporan::class, 'ubah']);
Route::get('admin-laporan-hapus/{id}', [Admin\Laporan::class, 'hapus']);
Route::get('admin-laporan-download/{id}', [Admin\Laporan::class, 'download']);

Route::get('admin-akun', [Admin\Akun::class, 'index']);
Route::get('admin-akun-tambah', [Admin\Akun::class, 'index_tambah']);
Route::post('admin-akun-tambah-data', [Admin\Akun::class, 'tambah']);
Route::get('admin-akun-ubah/{id}', [Admin\Akun::class, 'index_ubah']);
Route::post('admin-akun-ubah-data/{id}', [Admin\Akun::class, 'ubah']);
Route::get('admin-akun-hapus/{id}', [Admin\Akun::class, 'hapus']);

Route::get('admin-about', [Admin\About::class, 'index']);

Route::get('admin-kontak', [Admin\Kontak::class, 'index']);

Route::get('admin-profile/{id}', [Admin\Profile::class, 'index_ubah']);
Route::post('admin-ubah-profile/{id}', [Admin\Profile::class, 'ubah']);
