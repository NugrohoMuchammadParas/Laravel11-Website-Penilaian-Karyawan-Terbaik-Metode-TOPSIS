<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelPembagi extends Model
{
    protected $table = 'pembagi';
    protected $primaryKey = 'id_pembagi';
    protected $fillable = ['id_pembagi', 'id_alternatif', 'nama', 'kinerja', 'komunikasi', 'kerjasama', 'kreativitas', 'disiplin'];


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
        return self::where('id_pembagi', $data['id_pembagi'])->get();
    }

    public function tambah($data)
    {
        self::create($data);
    }

    public function ubah($id, $data)
    {
        $pembagi = self::find($id);
        $pembagi->update($data);
    }

    public function hapus($id)
    {
        $pembagi = self::find($id);
        $pembagi->delete($id);
    }
}
