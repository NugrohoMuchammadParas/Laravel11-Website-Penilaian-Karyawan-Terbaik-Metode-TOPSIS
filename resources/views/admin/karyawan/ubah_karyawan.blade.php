<x-admin>
    <x-slot:profile>{{ $profile }}</x-slot:profile>
    <x-slot:halaman>{{ $halaman }}</x-slot:halaman>
    <x-slot:logout>{{ $logout }}</x-slot:logout>
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Ubah Data Karyawan</div>
                        </div>
                        <div class="card-body">
                            <form action="/admin-karyawan-ubah-data/<?= $karyawan['id_karyawan'] ?>" method="POST"
                                id="formInput" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('nama') has-error has-feedback @enderror">
                                            <label for="nama">Nama :</label>
                                            <input type="text" value="<?= $karyawan['nama'] ?>" name="nama"
                                                class="form-control" id="nama" placeholder="Input Data......" />
                                            <small id="nama"
                                                class="form-text text-muted @error('nama') text-danger @enderror">
                                                @error('nama')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group @error('lahir') has-error has-feedback @enderror">
                                            <label for="lahir">Lahir :</label>
                                            <input type="date" value="<?= $karyawan['lahir'] ?>" name="lahir"
                                                class="form-control" id="lahir" placeholder="Input Data......" />
                                            <small id="lahir"
                                                class="form-text text-muted @error('lahir') text-danger @enderror">
                                                @error('lahir')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group @error('telepon') has-error has-feedback @enderror">
                                            <label for="telepon">Telepon :</label>
                                            <input type="text" value="<?= $karyawan['telepon'] ?>" name="telepon"
                                                class="form-control" id="telepon" placeholder="Input Data......" />
                                            <small id="telepon"
                                                class="form-text text-muted @error('telepon') text-danger @enderror">
                                                @error('telepon')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group @error('email') has-error has-feedback @enderror">
                                            <label for="email">Email :</label>
                                            <input type="email" value="<?= $karyawan['email'] ?>" name="email"
                                                class="form-control" id="email" placeholder="Input Data......" />
                                            <small id="email"
                                                class="form-text text-muted @error('email') text-danger @enderror">
                                                @error('email')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group @error('alamat') has-error has-feedback @enderror">
                                            <label for="alamat">Alamat :</label>
                                            <textarea class="form-control" placeholder="Input Data......" id="alamat" value="<?= $karyawan['alamat'] ?>"
                                                name="alamat" rows="5"><?= $karyawan['alamat'] ?></textarea>
                                            <small id="alamat"
                                                class="form-text text-muted @error('alamat') text-danger @enderror">
                                                @error('alamat')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <button type="button" class="btn btn-rounded btn-sm btn-black mx-2"
                                            id="kembali" data-pages="<?= $kembali ?>"><i
                                                class="fas fa-arrow-circle-left"></i> Kembali</button>
                                        <button type="button" class="btn btn-rounded btn-sm btn-black mx-2"
                                            id="simpan_ubah"><i class="fas fa-download"></i> Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
