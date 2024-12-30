<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class ModelPerangkingan extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'perangkingan';
    protected $primaryKey = 'id_perangkingan';
    protected $fillable = ['id_perangkingan', 'id_alternatif', 'id_karyawan', 'nilai', 'rank'];


    public function getAll()
    {
        return self::all();
    }

    public function getById($id)
    {
        return self::find($id);
    }

    public function karyawan()
    {
        return $this->belongsTo(ModelKaryawan::class, 'id_karyawan', 'id_karyawan');
    }

    public function cekData($data)
    {
        return self::where('id_perangkingan', $data['id_perangkingan'])->get();
    }

    public function tambah($data)
    {
        self::create($data);
    }

    public function ubah($id, $data)
    {
        $perangkingan = self::find($id);
        $perangkingan->update($data);
    }

    public function hapus($id)
    {
        $perangkingan = self::find($id);
        $perangkingan->delete($id);
    }

    public function getOrderedByRank()
    {
        return self::join('karyawan', 'perangkingan.id_karyawan', '=', 'karyawan.id_karyawan')
            ->select('perangkingan.*', 'karyawan.nama as nama')
            ->orderBy('rank', 'asc')->get();
    }
}
