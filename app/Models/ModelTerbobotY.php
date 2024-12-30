<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class ModelTerbobotY extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'terbobot_y';
    protected $primaryKey = 'id_terbobot_y';
    protected $fillable = ['id_terbobot_y', 'id_alternatif', 'id_karyawan', 'kinerja', 'komunikasi', 'kerjasama', 'kreativitas', 'disiplin'];


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
        return self::where('id_terbobot_y', $data['id_terbobot_y'])->get();
    }

    public function tambah($data)
    {
        self::create($data);
    }

    public function ubah($id, $data)
    {
        $terbobot_y = self::find($id);
        $terbobot_y->update($data);
    }

    public function hapus($id)
    {
        $terbobot_y = self::find($id);
        $terbobot_y->delete($id);
    }

    public function karyawan()
    {
        return $this->belongsTo(ModelKaryawan::class, 'id_karyawan', 'id_karyawan');
    }

    public function getNameByIdAll()
    {
        return self::join('karyawan', 'terbobot_y.id_karyawan', '=', 'karyawan.id_karyawan')
            ->select('terbobot_y.*', 'karyawan.nama as nama')
            ->get();
    }
}
