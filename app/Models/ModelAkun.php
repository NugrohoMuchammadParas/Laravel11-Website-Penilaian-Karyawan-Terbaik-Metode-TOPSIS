<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class ModelAkun extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'akun';
    protected $primaryKey = 'id_akun';
    protected $fillable = ['id_akun', 'username', 'password', 'nama', 'file', 'level', 'status'];


    public function getAll()
    {
        return self::all();
    }

    public function getById($id)
    {
        return self::find($id);
    }

    public function getByUsername($data)
    {
        return self::where(['username' => $data])->first();
    }

    public function tambah($data)
    {
        self::create($data);
    }

    public function ubah($id, $data)
    {
        $akun = self::find($id);
        $akun->update($data);
    }

    public function hapus($id)
    {
        $akun = self::find($id);
        $akun->delete($id);
    }
}
