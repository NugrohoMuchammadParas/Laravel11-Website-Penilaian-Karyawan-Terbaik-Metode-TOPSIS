<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class ModelKaryawan extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'karyawan';
    protected $primaryKey = 'id_karyawan';
    protected $fillable = ['id_karyawan', 'id_akun', 'nama', 'lahir', 'telepon', 'email', 'alamat'];


    public function getAll()
    {
        return self::all();
    }

    public function getById($id)
    {
        return self::find($id);
    }

    public function getByName($name)
    {
        return self::where('nama', $name)->first();
    }

    public function getIdByName($nama)
    {
        $result = self::where('nama', $nama)->first();
        return $result ? $result->id_karyawan : null;
    }

    public function tambah($data)
    {
        self::create($data);
    }

    public function ubah($id, $data)
    {
        $result = self::find($id);
        $result->update($data);
    }

    public function hapus($id)
    {
        $result = self::find($id);
        $result->delete($id);
    }
}
