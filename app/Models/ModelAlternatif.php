<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class ModelAlternatif extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'alternatif';
    protected $primaryKey = 'id_alternatif';
    protected $fillable = ['id_alternatif', 'id_akun', 'id_karyawan', 'kinerja', 'komunikasi', 'kerjasama', 'kreativitas', 'disiplin'];


    public function getAll()
    {
        return self::all();
    }

    public function getById($id)
    {
        return self::find($id);
    }

    public function getMaxId()
    {
        return self::max('id_alternatif');
    }

    public function tambah($data)
    {
        self::create($data);
    }

    public function ubah($id, $data)
    {
        $alternatif = self::find($id);
        $alternatif->update($data);
    }

    public function hapus($id)
    {
        $alternatif = self::find($id);
        $alternatif->delete($id);
    }

    public function karyawan()
    {
        return $this->belongsTo(ModelKaryawan::class, 'id_karyawan', 'id_karyawan');
    }

    public function getNameByIdAll()
    {
        return self::join('karyawan', 'alternatif.id_karyawan', '=', 'karyawan.id_karyawan')
            ->select('alternatif.*', 'karyawan.nama as nama')
            ->get();
    }

    public function getNameById($id_Karyawan)
    {
        return self::join('karyawan', 'alternatif.id_karyawan', '=', 'karyawan.id_karyawan')
            ->where('alternatif.id_karyawan', $id_Karyawan)
            ->select('alternatif.*', 'karyawan.nama as nama')
            ->first();
    }
}
