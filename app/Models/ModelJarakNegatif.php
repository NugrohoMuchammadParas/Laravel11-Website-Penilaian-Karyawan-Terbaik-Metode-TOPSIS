<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class ModelJarakNegatif extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'jarak_negatif';
    protected $primaryKey = 'id_jarak_negatif';
    protected $fillable = ['id_jarak_negatif', 'id_alternatif', 'id_karyawan', 'nilai'];


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
        return self::where('id_jarak_negatif', $data['id_jarak_negatif'])->get();
    }

    public function tambah($data)
    {
        self::create($data);
    }

    public function ubah($id, $data)
    {
        $jarak_negatif = self::find($id);
        $jarak_negatif->update($data);
    }

    public function hapus($id)
    {
        $jarak_negatif = self::find($id);
        $jarak_negatif->delete($id);
    }

    public function karyawan()
    {
        return $this->belongsTo(ModelKaryawan::class, 'id_karyawan', 'id_karyawan');
    }

    public function getNameByIdAll()
    {
        return self::join('karyawan', 'jarak_negatif.id_karyawan', '=', 'karyawan.id_karyawan')
            ->select('jarak_negatif.*', 'karyawan.nama as nama')
            ->get();
    }
}
