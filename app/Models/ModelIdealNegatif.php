<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelIdealNegatif extends Model
{
    protected $table = 'ideal_negatif';
    protected $primaryKey = 'id_ideal_negatif';
    protected $fillable = ['id_ideal_negatif', 'id_alternatif', 'nama', 'kinerja', 'komunikasi', 'kerjasama', 'kreativitas', 'disiplin'];


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
        return self::where('id_ideal_negatif', $data['id_ideal_negatif'])->get();
    }

    public function tambah($data)
    {
        self::create($data);
    }

    public function ubah($id, $data)
    {
        $ideal_negatif = self::find($id);
        $ideal_negatif->update($data);
    }

    public function hapus($id)
    {
        $ideal_negatif = self::find($id);
        $ideal_negatif->delete($id);
    }
}
