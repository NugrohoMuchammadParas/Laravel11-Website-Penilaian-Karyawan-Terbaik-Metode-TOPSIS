<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelIdealPositif extends Model
{
    protected $table = 'ideal_positif';
    protected $primaryKey = 'id_ideal_positif';
    protected $fillable = ['id_ideal_positif', 'id_alternatif', 'nama', 'kinerja', 'komunikasi', 'kerjasama', 'kreativitas', 'disiplin'];


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
        return self::where('id_ideal_positif', $data['id_ideal_positif'])->get();
    }

    public function tambah($data)
    {
        self::create($data);
    }

    public function ubah($id, $data)
    {
        $ideal_positif = self::find($id);
        $ideal_positif->update($data);
    }

    public function hapus($id)
    {
        $ideal_positif = self::find($id);
        $ideal_positif->delete($id);
    }
}
