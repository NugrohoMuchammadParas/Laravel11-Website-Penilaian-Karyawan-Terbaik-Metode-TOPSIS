<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelKaryawan;
use App\Models\ModelAlternatif;
use App\Models\ModelKriteria;
use App\Models\ModelPembagi;
use App\Models\ModelTerbobotR;
use App\Models\ModelTerbobotY;
use App\Models\ModelIdealPositif;
use App\Models\ModelIdealNegatif;
use App\Models\ModelJarakPositif;
use App\Models\ModelJarakNegatif;
use App\Models\ModelPerangkingan;

class Alternatif extends Controller
{
    public function index()
    {
        $data_alternatif = new ModelAlternatif();

        $data = [
            'tambah' => "admin-alternatif-tambah",
            'ubah' => "admin-alternatif-ubah",
            'hapus' => "admin-alternatif-hapus",
            'profile' => 'admin-profile',
            'halaman' => 'alternatif',
            'logout' => 'logout',
            'alternatif' => $data_alternatif->getNameByIdAll(),
        ];

        return view('admin/alternatif/alternatif', $data);
    }

    public function index_tambah()
    {
        $data_karyawan = new ModelKaryawan();

        $data = [
            'kembali' => "admin-alternatif",
            'profile' => 'admin-profile',
            'halaman' => 'alternatif',
            'logout' => 'logout',
            'karyawan' => $data_karyawan->getAll(),
        ];

        return view('admin/alternatif/tambah_alternatif', $data);
    }

    public function tambah(Request $request)
    {
        $data_alternatif = new ModelAlternatif();
        $data_kriteria = new ModelKriteria();
        $data_karyawan = new ModelKaryawan();

        $alternatif = $data_alternatif->getAll();
        $kriteria = $data_kriteria->getAll();
        $id_karyawan = $data_karyawan->getIdByName($request->nama);

        $id_akun = session()->get('id_akun');

        if (count($kriteria) < 5 || count($kriteria) > 5) {
            $data_flash = [
                'icon' => 'fas fa-times',
                'state' => 'danger',
                'message' => 'Harus 5 Data Kriteria !!',
                'title' => 'Data Kriteria',
            ];
            session()->flash('data_flash', $data_flash);

            return redirect()->to('admin-kriteria');
        }

        $request->validate([
            'nama' => 'required',
            'kinerja' => 'required|integer',
            'komunikasi' => 'required|integer',
            'kerjasama' => 'required|integer',
            'kreativitas' => 'required|integer',
            'disiplin' => 'required|integer',
        ], [
            'nama.required' => 'Nama harus diisi.',
            'kinerja.required' => 'Kinerja harus diisi.',
            'kinerja.integer' => 'Kinerja harus berupa angka bilangan bulat.',
            'komunikasi.required' => 'Komunikasi harus diisi.',
            'komunikasi.integer' => 'Komunikasi harus berupa angka bilangan bulat.',
            'kerjasama.required' => 'Kerjasama harus diisi.',
            'kerjasama.integer' => 'Kerjasama harus berupa angka bilangan bulat.',
            'kreativitas.required' => 'Kreativitas harus diisi.',
            'kreativitas.integer' => 'Kreativitas harus berupa angka bilangan bulat.',
            'disiplin.required' => 'Disiplin harus diisi.',
            'disiplin.integer' => 'Disiplin harus berupa angka bilangan bulat.',
        ]);

        $data = [
            'id_akun' => $id_akun,
            'id_karyawan' => $id_karyawan,
            'kinerja' => $request->kinerja,
            'komunikasi' => $request->komunikasi,
            'kerjasama' => $request->kerjasama,
            'kreativitas' => $request->kreativitas,
            'disiplin' => $request->disiplin,
        ];
        $data_alternatif->tambah($data);

        if (count($alternatif) < 2) {
            $data_flash = [
                'icon' => 'fas fa-times',
                'state' => 'danger',
                'message' => 'Harus 2 Data Alternatif !!',
                'title' => 'Data Alternatif',
            ];
            session()->flash('data_flash', $data_flash);

            return redirect()->to('admin-alternatif');
        }

        $data_flash = [
            'icon' => 'fas fa-check',
            'state' => 'success',
            'message' => 'Data Berhasil Ditambah !!',
            'title' => 'Tambah Data',
        ];
        session()->flash('data_flash', $data_flash);

        $this->pembagi();

        return redirect()->to('admin-alternatif');
    }

    public function index_ubah($id)
    {
        $data_alternatif = new ModelAlternatif();
        $data_karyawan = new ModelKaryawan();

        $alternatif = $data_alternatif->getById($id);

        $data = [
            "kembali" => "/admin-alternatif",
            'profile' => '/admin-profile',
            'halaman' => 'alternatif',
            'logout' => '/logout',
            'karyawan' => $data_karyawan->getAll(),
            "alternatif" => $data_alternatif->getNameById($alternatif->id_karyawan),
        ];

        return view('admin/alternatif/ubah_alternatif', $data);
    }

    public function ubah(Request $request, $id)
    {
        $data_alternatif = new ModelAlternatif();
        $data_kriteria = new ModelKriteria();
        $data_karyawan = new ModelKaryawan();

        $alternatif = $data_alternatif->getAll();
        $kriteria = $data_kriteria->getAll();
        $karyawan = $data_karyawan->getByName($request->nama);
        $id_karyawan = $data_karyawan->getIdByName($request->nama);

        $id_akun = session()->get('id_akun');

        if (count($kriteria) < 5 || count($kriteria) > 5) {
            $data_flash = [
                'icon' => 'fas fa-times',
                'state' => 'danger',
                'message' => 'Harus 5 Data Kriteria !!',
                'title' => 'Data Kriteria',
            ];
            session()->flash('data_flash', $data_flash);

            return redirect()->to('admin-kriteria');
        }

        if ($karyawan['nama'] == $request->nama) {
            $request->validate([
                'nama' => 'required',
                'kinerja' => 'required|integer',
                'komunikasi' => 'required|integer',
                'kerjasama' => 'required|integer',
                'kreativitas' => 'required|integer',
                'disiplin' => 'required|integer',
            ], [
                'nama.required' => 'Nama harus diisi.',
                'kinerja.required' => 'Kinerja harus diisi.',
                'kinerja.integer' => 'Kinerja harus berupa angka bilangan bulat.',
                'komunikasi.required' => 'Komunikasi harus diisi.',
                'komunikasi.integer' => 'Komunikasi harus berupa angka bilangan bulat.',
                'kerjasama.required' => 'Kerjasama harus diisi.',
                'kerjasama.integer' => 'Kerjasama harus berupa angka bilangan bulat.',
                'kreativitas.required' => 'Kreativitas harus diisi.',
                'kreativitas.integer' => 'Kreativitas harus berupa angka bilangan bulat.',
                'disiplin.required' => 'Disiplin harus diisi.',
                'disiplin.integer' => 'Disiplin harus berupa angka bilangan bulat.',
            ]);
        } else {
            $request->validate([
                'nama' => 'required|unique:alternatif',
                'kinerja' => 'required|integer',
                'komunikasi' => 'required|integer',
                'kerjasama' => 'required|integer',
                'kreativitas' => 'required|integer',
                'disiplin' => 'required|integer',
            ], [
                'nama.required' => 'Nama harus diisi.',
                'nama.unique' => 'Nama sudah terdaftar di sistem.',
                'kinerja.required' => 'Kinerja harus diisi.',
                'kinerja.integer' => 'Kinerja harus berupa angka bilangan bulat.',
                'komunikasi.required' => 'Komunikasi harus diisi.',
                'komunikasi.integer' => 'Komunikasi harus berupa angka bilangan bulat.',
                'kerjasama.required' => 'Kerjasama harus diisi.',
                'kerjasama.integer' => 'Kerjasama harus berupa angka bilangan bulat.',
                'kreativitas.required' => 'Kreativitas harus diisi.',
                'kreativitas.integer' => 'Kreativitas harus berupa angka bilangan bulat.',
                'disiplin.required' => 'Disiplin harus diisi.',
                'disiplin.integer' => 'Disiplin harus berupa angka bilangan bulat.',
            ]);
        }

        $data = [
            'id_alternatif' => $id,
            'id_akun' => $id_akun,
            'id_karyawan' => $id_karyawan,
            'kinerja' => $request->kinerja,
            'komunikasi' => $request->komunikasi,
            'kerjasama' => $request->kerjasama,
            'kreativitas' => $request->kreativitas,
            'disiplin' => $request->disiplin,
        ];
        $data_alternatif->ubah($id, $data);

        if (count($alternatif) < 2) {
            $data_flash = [
                'icon' => 'fas fa-times',
                'state' => 'danger',
                'message' => 'Harus 2 Data Alternatif !!',
                'title' => 'Data Alternatif',
            ];
            session()->flash('data_flash', $data_flash);

            return redirect()->to('admin-alternatif');
        }

        $data_flash = [
            'icon' => 'fas fa-check',
            'state' => 'success',
            'message' => 'Data Berhasil Diubah !!',
            'title' => 'Ubah Data',
        ];
        session()->flash('data_flash', $data_flash);

        $this->pembagi();

        return redirect()->to('admin-alternatif');
    }

    public function hapus($id)
    {
        $data_alternatif = new ModelAlternatif();
        $data_kriteria = new ModelKriteria();

        $alternatif = $data_alternatif->getAll();
        $kriteria = $data_kriteria->getAll();

        if (count($kriteria) < 5 || count($kriteria) > 5) {
            $data_flash = [
                'icon' => 'fas fa-times',
                'state' => 'danger',
                'message' => 'Harus 5 Data Kriteria !!',
                'title' => 'Data Kriteria',
            ];
            session()->flash('data_flash', $data_flash);

            return redirect()->to('admin-kriteria');
        }

        if (count($alternatif) < 3) {
            $data_flash = [
                'icon' => 'fas fa-times',
                'state' => 'danger',
                'message' => 'Harus 2 Data Alternatif !!',
                'title' => 'Data Alternatif',
            ];
            session()->flash('data_flash', $data_flash);

            return redirect()->to('admin-alternatif');
        }

        $data_alternatif->hapus($id);

        $data_flash = [
            'icon' => 'fas fa-check',
            'state' => 'success',
            'message' => 'Data Berhasil Dihapus !!',
            'title' => 'Hapus Data',
        ];
        session()->flash('data_flash', $data_flash);

        $this->pembagi();

        return redirect()->to('admin-alternatif');
    }

    public function pembagi()
    {
        $data_alternatif = new ModelAlternatif();
        $alternatif = $data_alternatif->getAll();
        $alternatif_array = $alternatif->toArray();

        $nilai_alternatif = array();
        foreach ($alternatif_array as $key => $value) {
            foreach ($value as $name => $age) {
                if ($name == "id_alternatif") {
                    $nilai_alternatif[$key][$name] = (int)$age;
                } elseif ($name == "id_akun") {
                    $nilai_alternatif[$key][$name] = (int)$age;
                } elseif ($name == "id_karyawan") {
                    $nilai_alternatif[$key][$name] = (int)$age;
                } else {
                    $nilai_alternatif[$key][$name] = (int) $age;
                }
            }
        }

        $tukar_nilai_alternatif = array();
        foreach ($nilai_alternatif as $row) {
            foreach ($row as $index => $value) {
                if (!isset($tukar_nilai_alternatif[$index])) {
                    $tukar_nilai_alternatif[$index] = [];
                }
                $tukar_nilai_alternatif[$index][] = $value;
            }
        }

        $pangkat_nilai_alternatif = array();
        foreach ($tukar_nilai_alternatif as $index => $member) {
            foreach ($member as $name => $age) {
                if ($index == "id_alternatif") {
                    $pangkat_nilai_alternatif[$name][$index] = (int)$age;
                } elseif ($index == "id_akun") {
                    $pangkat_nilai_alternatif[$name][$index] = (int)$age;
                } elseif ($index == "id_karyawan") {
                    $pangkat_nilai_alternatif[$name][$index] = (int)$age;
                } else {
                    $pangkat_nilai_alternatif[$name][$index] = pow((int)$age, 2);
                }
            }
        }

        $tukar_pangkat_alternatif = array();
        foreach ($pangkat_nilai_alternatif as $row) {
            foreach ($row as $index => $value) {
                if (!isset($tukar_pangkat_alternatif[$index])) {
                    $tukar_pangkat_alternatif[$index] = [];
                }
                $tukar_pangkat_alternatif[$index][] = $value;
            }
        }

        $tambah_pangkat_alternatif = array();
        foreach ($tukar_pangkat_alternatif as $index => $member) {
            $hasil = 0;
            foreach ($member as $name => $age) {
                if ($index == "id_alternatif") {
                    $hasil = (int)$age;
                } elseif ($index == "id_akun") {
                    $hasil = (int)$age;
                } elseif ($index == "id_karyawan") {
                    $hasil = (int)$age;
                } else {
                    $hasil += (int)$age;
                }
            }
            $tambah_pangkat_alternatif[] = $hasil;
        }

        $sqrt_pangkat_alternatif = array();
        foreach ($tambah_pangkat_alternatif as $value) {
            $sqrt_pangkat_alternatif[] = sqrt($value);
        }

        $data_pembagi = new ModelPembagi();
        $data = [
            'id_pembagi' => 1,
            'id_alternatif' => 1,
            'nama' => 'Pembagi',
            'kinerja' => $sqrt_pangkat_alternatif[4],
            'komunikasi' => $sqrt_pangkat_alternatif[5],
            'kerjasama' => $sqrt_pangkat_alternatif[6],
            'kreativitas' => $sqrt_pangkat_alternatif[7],
            'disiplin' => $sqrt_pangkat_alternatif[8],
        ];

        $cek = count($data_pembagi->cekData($data));
        if ($cek > 0) {
            $data_pembagi->ubah(1, $data);
        } else {
            $data_pembagi->tambah($data);
        }

        $this->nilai_r();
    }

    public function nilai_r()
    {
        $data_pembagi = new ModelPembagi();
        $data_alternatif = new ModelAlternatif();

        $pembagi = $data_pembagi->getAll();
        $alternatif = $data_alternatif->getAll();
        $pembagi_array = $pembagi->toArray();
        $alternatif_array = $alternatif->toArray();

        $nilai_terbobot_r = array();
        foreach ($alternatif_array as $index => $member) {
            foreach ($member as $name => $age) {
                $hasil = 0;
                if ($name == "kinerja") {
                    $hasil = (int) $age / $pembagi_array[0]['kinerja'];
                    $nilai_terbobot_r[$index][$name] = $hasil;
                } elseif ($name == "komunikasi") {
                    $hasil = (int) $age / $pembagi_array[0]['komunikasi'];
                    $nilai_terbobot_r[$index][$name] = $hasil;
                } elseif ($name == "kerjasama") {
                    $hasil = (int) $age / $pembagi_array[0]['kerjasama'];
                    $nilai_terbobot_r[$index][$name] = $hasil;
                } elseif ($name == "kreativitas") {
                    $hasil = (int) $age / $pembagi_array[0]['kreativitas'];
                    $nilai_terbobot_r[$index][$name] = $hasil;
                } elseif ($name == "disiplin") {
                    $hasil = (int) $age / $pembagi_array[0]['disiplin'];
                    $nilai_terbobot_r[$index][$name] = $hasil;
                } else {
                    $nilai_terbobot_r[$index][$name] = (int)$age;
                }
            }
        }

        $i = 1;
        $data_terbobot_r = new ModelTerbobotR();
        foreach ($nilai_terbobot_r as $key => $value) {
            $nilai_id_terbobot_r = 0;
            $nilai_kinerja = 0;
            $nilai_komunikasi = 0;
            $nilai_kerjasama = 0;
            $nilai_kreativitas = 0;
            $nilai_disiplin = 0;
            $nilai_id_karyawan = 0;
            $nilai_tanggal = '';
            foreach ($value as $index => $member) {
                if ($index == "id_alternatif") {
                    $nilai_id_terbobot_r = (int)$member;
                } elseif ($index == "id_karyawan") {
                    $nilai_id_karyawan = (int)$member;
                } elseif ($index == "kinerja") {
                    $nilai_kinerja = (float)$member;
                } elseif ($index == "komunikasi") {
                    $nilai_komunikasi = (float)$member;
                } elseif ($index == "kerjasama") {
                    $nilai_kerjasama = (float)$member;
                } elseif ($index == "kreativitas") {
                    $nilai_kreativitas = (float)$member;
                } elseif ($index == "disiplin") {
                    $nilai_disiplin = (float)$member;
                } else {
                    $nilai_tanggal = (string)$member;
                }
            }

            $data = [
                'id_terbobot_r' => $nilai_id_terbobot_r,
                'id_alternatif' => $nilai_id_terbobot_r,
                'id_karyawan' => $nilai_id_karyawan,
                'kinerja' => $nilai_kinerja,
                'komunikasi' => $nilai_komunikasi,
                'kerjasama' => $nilai_kerjasama,
                'kreativitas' => $nilai_kreativitas,
                'disiplin' => $nilai_disiplin,
            ];

            $cek = count($data_terbobot_r->cekData($data));
            if ($cek > 0) {
                $data_terbobot_r->ubah($nilai_id_terbobot_r, $data);
            } else {
                $data_terbobot_r->tambah($data);
            }
            $i++;
        }

        $this->nilai_y();
    }

    public function nilai_y()
    {
        $data_terbobot_r = new ModelTerbobotR();
        $data_kriteria = new ModelKriteria();

        $terbobot_r = $data_terbobot_r->getAll();
        $kriteria = $data_kriteria->getAll();
        $terbobot_r_array = $terbobot_r->toArray();
        $kriteria_array = $kriteria->toArray();

        $tukar_nilai_terbobot_r = array();
        foreach ($terbobot_r_array as $row) {
            foreach ($row as $index => $value) {
                if (!isset($tukar_nilai_terbobot_r[$index])) {
                    $tukar_nilai_terbobot_r[$index] = [];
                }
                $tukar_nilai_terbobot_r[$index][] = $value;
            }
        }

        $i = 1;
        $nilai_terbobot_y = array();
        foreach ($tukar_nilai_terbobot_r as $index => $member) {
            foreach ($member as $name => $age) {
                $hasil = 0;
                if ($index == "kinerja") {
                    $hasil =  (float) $age * (int) $kriteria_array[0]['bobot'];
                    $nilai_terbobot_y[$name][$index] = $hasil;
                } elseif ($index == "komunikasi") {
                    $hasil =  (float) $age * (int) $kriteria_array[1]['bobot'];
                    $nilai_terbobot_y[$name][$index] = $hasil;
                } elseif ($index == "kerjasama") {
                    $hasil =  (float) $age * (int) $kriteria_array[2]['bobot'];
                    $nilai_terbobot_y[$name][$index] = $hasil;
                } elseif ($index == "kreativitas") {
                    $hasil =  (float) $age * (int) $kriteria_array[3]['bobot'];
                    $nilai_terbobot_y[$name][$index] = $hasil;
                } elseif ($index == "disiplin") {
                    $hasil =  (float) $age * (int) $kriteria_array[4]['bobot'];
                    $nilai_terbobot_y[$name][$index] = $hasil;
                } else {
                    $nilai_terbobot_y[$name][$index] = (int)$age;
                }
            }
        }

        $data_terbobot_y = new ModelTerbobotY();
        foreach ($nilai_terbobot_y as $key => $value) {
            $nilai_id_terbobot_y = 0;
            $nilai_id_alternatif = 0;
            $nilai_kinerja = 0;
            $nilai_komunikasi = 0;
            $nilai_kerjasama = 0;
            $nilai_kreativitas = 0;
            $nilai_disiplin = 0;
            $nilai_id_karyawan = 0;
            $nilai_tanggal = '';
            foreach ($value as $index => $member) {
                if ($index == "id_terbobot_r") {
                    $nilai_id_terbobot_y = (int)$member;
                } elseif ($index == "id_alternatif") {
                    $nilai_id_alternatif = (int)$member;
                } elseif ($index == "id_karyawan") {
                    $nilai_id_karyawan = (int)$member;
                } elseif ($index == "kinerja") {
                    $nilai_kinerja = (float)$member;
                } elseif ($index == "komunikasi") {
                    $nilai_komunikasi = (float)$member;
                } elseif ($index == "kerjasama") {
                    $nilai_kerjasama = (float)$member;
                } elseif ($index == "kreativitas") {
                    $nilai_kreativitas = (float)$member;
                } elseif ($index == "disiplin") {
                    $nilai_disiplin = (float)$member;
                } else {
                    $nilai_tanggal = (string)$member;
                }
            }

            $data = [
                'id_terbobot_y' => $nilai_id_terbobot_y,
                'id_alternatif' => $nilai_id_alternatif,
                'id_karyawan' => $nilai_id_karyawan,
                'kinerja' => $nilai_kinerja,
                'komunikasi' => $nilai_komunikasi,
                'kerjasama' => $nilai_kerjasama,
                'kreativitas' => $nilai_kreativitas,
                'disiplin' => $nilai_disiplin,
            ];

            $cek = count($data_terbobot_y->cekData($data));
            if ($cek > 0) {
                $data_terbobot_y->ubah($nilai_id_terbobot_y, $data);
            } else {
                $data_terbobot_y->tambah($data);
            }
            $i++;
        }

        $this->ideal_positif();
    }

    public function ideal_positif()
    {
        $data_terbobot_y = new ModelTerbobotY();
        $terbobot_y = $data_terbobot_y->getAll();
        $terbobot_y_array = $terbobot_y->toArray();

        $tukar_nilai_terbobot_y = array();
        foreach ($terbobot_y_array as $row) {
            foreach ($row as $index => $value) {
                if (!isset($tukar_nilai_terbobot_y[$index])) {
                    $tukar_nilai_terbobot_y[$index] = [];
                }
                $tukar_nilai_terbobot_y[$index][] = $value;
            }
        }

        $nilai_ideal_a_plus = array();
        foreach ($tukar_nilai_terbobot_y as $index => $member) {
            $hasil = 0;
            if ($index == "id_terbobot_y") {
                $hasil = max($tukar_nilai_terbobot_y['id_terbobot_y']);
                $nilai_ideal_a_plus[] = $hasil;
            } elseif ($index == "id_alternatif") {
                $hasil = max($tukar_nilai_terbobot_y['id_alternatif']);
                $nilai_ideal_a_plus[] = $hasil;
            } elseif ($index == "kinerja") {
                $hasil = max($tukar_nilai_terbobot_y['kinerja']);
                $nilai_ideal_a_plus[] = $hasil;
            } elseif ($index == "komunikasi") {
                $hasil = min($tukar_nilai_terbobot_y['komunikasi']);
                $nilai_ideal_a_plus[] = $hasil;
            } elseif ($index == "kerjasama") {
                $hasil = max($tukar_nilai_terbobot_y['kerjasama']);
                $nilai_ideal_a_plus[] = $hasil;
            } elseif ($index == "kreativitas") {
                $hasil = max($tukar_nilai_terbobot_y['kreativitas']);
                $nilai_ideal_a_plus[] = $hasil;
            } elseif ($index == "disiplin") {
                $hasil = min($tukar_nilai_terbobot_y['disiplin']);
                $nilai_ideal_a_plus[] = $hasil;
            } else {
                $nilai_ideal_a_plus[] = 'A+';
            }
        }

        $data_ideal_positif = new ModelIdealPositif();

        $data = [
            'id_ideal_positif' => 1,
            'id_alternatif' => 1,
            'nama' => $nilai_ideal_a_plus[2],
            'kinerja' => $nilai_ideal_a_plus[3],
            'komunikasi' => $nilai_ideal_a_plus[4],
            'kerjasama' => $nilai_ideal_a_plus[5],
            'kreativitas' => $nilai_ideal_a_plus[6],
            'disiplin' => $nilai_ideal_a_plus[7],
        ];

        $cek = count($data_ideal_positif->cekData($data));
        if ($cek > 0) {
            $data_ideal_positif->ubah(1, $data);
        } else {
            $data_ideal_positif->tambah($data);
        }

        $this->ideal_negatif();
    }

    public function ideal_negatif()
    {
        $data_terbobot_y = new ModelTerbobotY();
        $terbobot_y = $data_terbobot_y->getAll();
        $terbobot_y_array = $terbobot_y->toArray();

        $tukar_nilai_terbobot_y = array();
        foreach ($terbobot_y_array as $row) {
            foreach ($row as $index => $value) {
                if (!isset($tukar_nilai_terbobot_y[$index])) {
                    $tukar_nilai_terbobot_y[$index] = [];
                }
                $tukar_nilai_terbobot_y[$index][] = $value;
            }
        }

        $nilai_ideal_a_min = array();
        foreach ($tukar_nilai_terbobot_y as $index => $member) {
            $hasil = 0;
            if ($index == "id_terbobot_y") {
                $hasil = max($tukar_nilai_terbobot_y['id_terbobot_y']);
                $nilai_ideal_a_min[] = $hasil;
            } elseif ($index == "id_alternatif") {
                $hasil = max($tukar_nilai_terbobot_y['id_alternatif']);
                $nilai_ideal_a_min[] = $hasil;
            } elseif ($index == "kinerja") {
                $hasil = min($tukar_nilai_terbobot_y['kinerja']);
                $nilai_ideal_a_min[] = $hasil;
            } elseif ($index == "komunikasi") {
                $hasil = max($tukar_nilai_terbobot_y['komunikasi']);
                $nilai_ideal_a_min[] = $hasil;
            } elseif ($index == "kerjasama") {
                $hasil = min($tukar_nilai_terbobot_y['kerjasama']);
                $nilai_ideal_a_min[] = $hasil;
            } elseif ($index == "kreativitas") {
                $hasil = min($tukar_nilai_terbobot_y['kreativitas']);
                $nilai_ideal_a_min[] = $hasil;
            } elseif ($index == "disiplin") {
                $hasil = max($tukar_nilai_terbobot_y['disiplin']);
                $nilai_ideal_a_min[] = $hasil;
            } else {
                $nilai_ideal_a_min[] = 'A-';
            }
        }

        $data_ideal_negatif = new ModelIdealNegatif();

        $data = [
            'id_ideal_negatif' => 1,
            'id_alternatif' => 1,
            'nama' => $nilai_ideal_a_min[2],
            'kinerja' => $nilai_ideal_a_min[3],
            'komunikasi' => $nilai_ideal_a_min[4],
            'kerjasama' => $nilai_ideal_a_min[5],
            'kreativitas' => $nilai_ideal_a_min[6],
            'disiplin' => $nilai_ideal_a_min[7],
        ];

        $cek = count($data_ideal_negatif->cekData($data));
        if ($cek > 0) {
            $data_ideal_negatif->ubah(1, $data);
        } else {
            $data_ideal_negatif->tambah($data);
        }

        $this->jarak_positif();
    }

    public function jarak_positif()
    {
        $data_terbobot_y = new ModelTerbobotY();
        $data_ideal_positif = new ModelIdealPositif();

        $terbobot_y = $data_terbobot_y->getAll();
        $ideal_positif = $data_ideal_positif->getAll();
        $terbobot_y_array = $terbobot_y->toArray();
        $ideal_positif_array = $ideal_positif->toArray();

        $nilai_d_plus = array();
        foreach ($terbobot_y_array as $index => $member) {
            foreach ($member as $name => $age) {
                $hasil = 0;
                if ($name == "kinerja") {
                    $hasil = pow($ideal_positif_array[0]['kinerja'] - (float)$age, 2);
                    $nilai_d_plus[$index][$name] = $hasil;
                } elseif ($name == "komunikasi") {
                    $hasil = pow($ideal_positif_array[0]['komunikasi'] - (float)$age, 2);
                    $nilai_d_plus[$index][$name] = $hasil;
                } elseif ($name == "kerjasama") {
                    $hasil = pow($ideal_positif_array[0]['kerjasama'] - (float)$age, 2);
                    $nilai_d_plus[$index][$name] = $hasil;
                } elseif ($name == "kreativitas") {
                    $hasil = pow($ideal_positif_array[0]['kreativitas'] - (float)$age, 2);
                    $nilai_d_plus[$index][$name] = $hasil;
                } elseif ($name == "disiplin") {
                    $hasil = pow($ideal_positif_array[0]['disiplin'] - (float)$age, 2);
                    $nilai_d_plus[$index][$name] = $hasil;
                } else {
                    $nilai_d_plus[$index][$name] = (int)$age;
                }
            }
        }

        $nilai_tambah_d = array();
        foreach ($nilai_d_plus as $index => $member) {
            $hasil = 0;
            foreach ($member as $name => $age) {
                if ($name == "kinerja" || $name == "komunikasi" || $name == "kerjasama" || $name == "kreativitas" || $name == "disiplin") {
                    $hasil += (float)$age;
                }
            }
            $nilai_tambah_d[] = $hasil;
        }

        $x = 0;
        $data_jarak_positif = new ModelJarakPositif();
        foreach ($nilai_tambah_d as $value) {
            $data = [
                'id_jarak_positif' => $nilai_d_plus[$x]['id_terbobot_y'],
                'id_alternatif' => $nilai_d_plus[$x]['id_alternatif'],
                'id_karyawan' => $nilai_d_plus[$x]['id_karyawan'],
                'nilai' => sqrt($value),
            ];

            $cek = count($data_jarak_positif->cekData($data));
            if ($cek > 0) {
                $data_jarak_positif->ubah($nilai_d_plus[$x]['id_terbobot_y'], $data);
            } else {
                $data_jarak_positif->tambah($data);
            }
            $x++;
        }

        $this->jarak_negatif();
    }

    public function jarak_negatif()
    {
        $data_terbobot_y = new ModelTerbobotY();
        $data_ideal_negatif = new ModelIdealNegatif();

        $terbobot_y = $data_terbobot_y->getAll();
        $ideal_negatif = $data_ideal_negatif->getAll();

        $terbobot_y_array = $terbobot_y->toArray();
        $ideal_negatif_array = $ideal_negatif->toArray();

        $nilai_d_min = array();
        foreach ($terbobot_y_array as $index => $member) {
            foreach ($member as $name => $age) {
                $hasil = 0;
                if ($name == "kinerja") {
                    $hasil = pow($ideal_negatif_array[0]['kinerja'] - (float)$age, 2);
                    $nilai_d_min[$index][$name] = $hasil;
                } elseif ($name == "komunikasi") {
                    $hasil = pow($ideal_negatif_array[0]['komunikasi'] - (float)$age, 2);
                    $nilai_d_min[$index][$name] = $hasil;
                } elseif ($name == "kerjasama") {
                    $hasil = pow($ideal_negatif_array[0]['kerjasama'] - (float)$age, 2);
                    $nilai_d_min[$index][$name] = $hasil;
                } elseif ($name == "kreativitas") {
                    $hasil = pow($ideal_negatif_array[0]['kreativitas'] - (float)$age, 2);
                    $nilai_d_min[$index][$name] = $hasil;
                } elseif ($name == "disiplin") {
                    $hasil = pow($ideal_negatif_array[0]['disiplin'] - (float)$age, 2);
                    $nilai_d_min[$index][$name] = $hasil;
                } else {
                    $nilai_d_min[$index][$name] = (int)$age;
                }
            }
        }

        $nilai_tambah_d = array();
        foreach ($nilai_d_min as $index => $member) {
            $hasil = 0;
            foreach ($member as $name => $age) {
                if ($name == "kinerja" || $name == "komunikasi" || $name == "kerjasama" || $name == "kreativitas" || $name == "disiplin") {
                    $hasil += (float)$age;
                }
            }
            $nilai_tambah_d[] = $hasil;
        }

        $x = 0;
        $data_jarak_negatif = new ModelJarakNegatif();
        foreach ($nilai_tambah_d as $value) {
            $data = [
                'id_jarak_negatif' => $nilai_d_min[$x]['id_terbobot_y'],
                'id_alternatif' => $nilai_d_min[$x]['id_alternatif'],
                'id_karyawan' => $nilai_d_min[$x]['id_karyawan'],
                'nilai' => sqrt($value),
            ];

            $cek = count($data_jarak_negatif->cekData($data));
            if ($cek > 0) {
                $data_jarak_negatif->ubah($nilai_d_min[$x]['id_terbobot_y'], $data);
            } else {
                $data_jarak_negatif->tambah($data);
            }
            $x++;
        }

        $this->perangkingan();
    }

    public function perangkingan()
    {
        $data_alternatif = new ModelAlternatif();
        $data_jarak_positif = new ModelJarakPositif();
        $data_jarak_negatif = new ModelJarakNegatif();

        $alternatif = $data_alternatif->getAll();
        $jarak_positif = $data_jarak_positif->getAll();
        $jarak_negatif = $data_jarak_negatif->getAll();
        $alternatif_array = $alternatif->toArray();
        $jarak_positif_array = $jarak_positif->toArray();
        $jarak_negatif_array = $jarak_negatif->toArray();

        $nilai_v = array();
        foreach ($jarak_negatif_array as $index => $member) {
            $hasil = 0;
            foreach ($member as $name => $age) {
                if ($name == "id_jarak_negatif") {
                    $nilai_v[$index][$name] = (int)$age;
                } elseif ($name == "id_alternatif") {
                    $nilai_v[$index][$name] = (int)$age;
                } elseif ($name == "id_karyawan") {
                    $nilai_v[$index][$name] = (int)$age;
                } elseif ($name == "created_at") {
                    $nilai_v[$index][$name] = (string)$age;
                } elseif ($name == "updated_at") {
                    $nilai_v[$index][$name] = (string)$age;
                } else {
                    $hasil = (float) $jarak_negatif_array[$index][$name] / ((float) $jarak_positif_array[$index][$name] + (float) $jarak_negatif[$index][$name]);
                    $nilai_v[$index][$name] = $hasil;
                }
            }
        }

        $v = 0;
        $rank_nilai = array();
        foreach ($nilai_v as $index => $member) {
            foreach ($member as $name => $age) {
                if ($name == 'nilai') {
                    $rank_nilai[$index]['id_perangkingan'] = (int)$alternatif_array[$v]['id_alternatif'];
                    $rank_nilai[$index]['id_alternatif'] = (int)$alternatif_array[$v]['id_alternatif'];
                    $rank_nilai[$index]['id_karyawan'] = (int)$alternatif_array[$v]['id_karyawan'];;
                    $rank_nilai[$index]['nilai'] = $nilai_v[$v]['nilai'];
                    $v++;
                }
            }
        }

        usort($rank_nilai, function ($a, $b) {
            return $b['nilai'] <=> $a['nilai'];
        });

        $data_perangkingan = new ModelPerangkingan();

        $x = 0;
        $y = 1;
        $perangkingan = array();
        foreach ($rank_nilai as $index => $member) {
            foreach ($member as $name => $age) {
                if ($name == 'nilai') {
                    $perangkingan[$index]['id_perangkingan'] = (int)$rank_nilai[$x]['id_perangkingan'];
                    $perangkingan[$index]['id_alternatif'] = (int)$rank_nilai[$x]['id_alternatif'];
                    $perangkingan[$index]['id_karyawan'] = (string)$rank_nilai[$x]['id_karyawan'];
                    $perangkingan[$index]['nilai'] = (float)$rank_nilai[$x]['nilai'];
                    $perangkingan[$index]['rank'] = $y;

                    $data = [
                        'id_perangkingan' => (int)$rank_nilai[$x]['id_perangkingan'],
                        'id_alternatif' => (int)$rank_nilai[$x]['id_alternatif'],
                        'id_karyawan' => (string)$rank_nilai[$x]['id_karyawan'],
                        'nilai' => (float)$rank_nilai[$x]['nilai'],
                        'rank' => $y,
                    ];

                    $cek = count($data_perangkingan->cekData($data));
                    if ($cek > 0) {
                        $data_perangkingan->ubah($rank_nilai[$x]['id_perangkingan'], $data);
                    } else {
                        $data_perangkingan->tambah($data);
                    }
                    $x++;
                    $y++;
                }
            }
        }
    }
}
