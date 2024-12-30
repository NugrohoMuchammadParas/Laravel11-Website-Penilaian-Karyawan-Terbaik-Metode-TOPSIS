<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class ModelJarakPositif extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'jarak_positif';
    protected $primaryKey = 'id_jarak_positif';
    protected $fillable = ['id_jarak_positif', 'id_alternatif', 'id_karyawan', 'nilai'];


    public function getAll()
    {
        return self::all();
    }

    public function getById($id)
    {
        return self::find($id);
    }

    public function cekData($data)
    {
        return self::where('id_jarak_positif', $data['id_jarak_positif'])->get();
    }

    public function tambah($data)
    {
        self::create($data);
    }

    public function ubah($id, $data)
    {
        $jarak_positif = self::find($id);
        $jarak_positif->update($data);
    }

    public function hapus($id)
    {
        $jarak_positif = self::find($id);
        $jarak_positif->delete($id);
    }

    public function karyawan()
    {
        return $this->belongsTo(ModelKaryawan::class, 'id_karyawan', 'id_karyawan');
    }

    public function getNameByIdAll()
    {
        return self::join('karyawan', 'jarak_positif.id_karyawan', '=', 'karyawan.id_karyawan')
            ->select('jarak_positif.*', 'karyawan.nama as nama')
            ->get();
    }
}
