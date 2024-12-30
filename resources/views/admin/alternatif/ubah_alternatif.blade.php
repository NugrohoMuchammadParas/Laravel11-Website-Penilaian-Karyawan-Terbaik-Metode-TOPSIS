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
                            <div class="card-title">Ubah Data Alternatif</div>
                        </div>
                        <div class="card-body">
                            <form action="/admin-alternatif-ubah-data/<?= $alternatif['id_alternatif'] ?>" method="POST"
                                id="formInput" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('nama') has-error has-feedback @enderror">
                                            <label for="nama">Nama :</label>
                                            <select class="form-select form-control" id="nama" name="nama"
                                                value="<?= $alternatif['nama'] ?>">
                                                <option value="<?= $alternatif['nama'] ?>" class="select">
                                                    <?= $alternatif['nama'] ?>
                                                </option>
                                                <option disabled>
                                                    ---Pilihan---
                                                </option>
                                                <?php foreach ($karyawan as $isi) : ?>
                                                <option value="<?= $isi['nama'] ?>"><?= $isi['nama'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <small id="nama"
                                                class="form-text text-muted @error('nama') text-danger @enderror">
                                                @error('nama')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group @error('kinerja') has-error has-feedback @enderror">
                                            <label for="kinerja">Kinerja :</label>
                                            <input type="number" value="<?= $alternatif['kinerja'] ?>" name="kinerja"
                                                class="form-control" id="kinerja" placeholder="Input Data......" />
                                            <small id="kinerja"
                                                class="form-text text-muted @error('kinerja') text-danger @enderror">
                                                @error('kinerja')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group @error('komunikasi') has-error has-feedback @enderror">
                                            <label for="komunikasi">Komunikasi :</label>
                                            <input type="number" value="<?= $alternatif['komunikasi'] ?>"
                                                name="komunikasi" class="form-control" id="komunikasi"
                                                placeholder="Input Data......" />
                                            <small id="komunikasi"
                                                class="form-text text-muted @error('komunikasi') text-danger @enderror">
                                                @error('komunikasi')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group @error('kerjasama') has-error has-feedback @enderror">
                                            <label for="kerjasama">Kerjasama :</label>
                                            <input type="number" value="<?= $alternatif['kerjasama'] ?>"
                                                name="kerjasama" class="form-control" id="kerjasama"
                                                placeholder="Input Data......" />
                                            <small id="kerjasama"
                                                class="form-text text-muted @error('kerjasama') text-danger @enderror">
                                                @error('kerjasama')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group @error('kreativitas') has-error has-feedback @enderror">
                                            <label for="kreativitas">Kreativitas :</label>
                                            <input type="number" value="<?= $alternatif['kreativitas'] ?>"
                                                name="kreativitas" class="form-control" id="kreativitas"
                                                placeholder="Input Data......" />
                                            <small id="kreativitas"
                                                class="form-text text-muted @error('kreativitas') text-danger @enderror">
                                                @error('kreativitas')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group @error('disiplin') has-error has-feedback @enderror">
                                            <label for="disiplin">Disiplin :</label>
                                            <input type="number" value="<?= $alternatif['disiplin'] ?>" name="disiplin"
                                                class="form-control" id="disiplin" placeholder="Input Data......" />
                                            <small id="disiplin"
                                                class="form-text text-muted @error('disiplin') text-danger @enderror">
                                                @error('disiplin')
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
