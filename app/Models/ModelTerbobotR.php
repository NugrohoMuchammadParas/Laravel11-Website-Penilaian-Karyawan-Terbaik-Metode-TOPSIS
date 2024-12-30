<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class ModelTerbobotR extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'terbobot_r';
    protected $primaryKey = 'id_terbobot_r';
    protected $fillable = ['id_terbobot_r', 'id_alternatif', 'id_karyawan', 'kinerja', 'komunikasi', 'kerjasama', 'kreativitas', 'disiplin'];


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
        return self::where('id_terbobot_r', $data['id_terbobot_r'])->get();
    }

    public function tambah($data)
    {
        self::create($data);
    }

    public function ubah($id, $data)
    {
        $terbobot_r = self::find($id);
        $terbobot_r->update($data);
    }

    public function hapus($id)
    {
        $terbobot_r = self::find($id);
        $terbobot_r->delete($id);
    }

    public function karyawan()
    {
        return $this->belongsTo(ModelKaryawan::class, 'id_karyawan', 'id_karyawan');
    }

    public function getNameByIdAll()
    {
        return self::join('karyawan', 'terbobot_r.id_karyawan', '=', 'karyawan.id_karyawan')
            ->select('terbobot_r.*', 'karyawan.nama as nama')
            ->get();
    }
}
