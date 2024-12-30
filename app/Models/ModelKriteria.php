<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class ModelKriteria extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'kriteria';
    protected $primaryKey = 'id_kriteria';
    protected $fillable = ['id_kriteria', 'id_akun', 'kriteria', 'keterangan', 'bobot'];


    public function getAll()
    {
        return self::all();
    }

    public function getById($id)
    {
        return self::find($id);
    }

    public function tambah($data)
    {
        self::create($data);
    }

    public function ubah($id, $data)
    {
        $kriteria = self::find($id);
        $kriteria->update($data);
    }

    public function hapus($id)
    {
        $kriteria = self::find($id);
        $kriteria->delete($id);
    }
}
