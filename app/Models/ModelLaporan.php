<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class ModelLaporan extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'laporan';
    protected $primaryKey = 'id_laporan';
    protected $fillable = ['id_laporan', 'id_akun', 'id_karyawan', 'tanggal', 'file'];


    public function getAll()
    {
        return self::all();
    }

    public function getById($id)
    {
        return self::find($id);
    }

    public function getIdByLaporan($id)
    {
        return self::find($id);
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

    public function getNameByIdAll()
    {
        return self::join('karyawan', 'laporan.id_karyawan', '=', 'karyawan.id_karyawan')
            ->select('laporan.*', 'karyawan.nama as nama')
            ->get();
    }

    public function getNameById($id_Karyawan)
    {
        return self::join('karyawan', 'laporan.id_karyawan', '=', 'karyawan.id_karyawan')
            ->where('laporan.id_karyawan', $id_Karyawan)
            ->select('laporan.*', 'karyawan.nama as nama')
            ->first();
    }
}
