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
                            <div class="card-title">Ubah Data Laporan</div>
                        </div>
                        <div class="card-body">
                            <form action="/admin-laporan-ubah-data/<?= $laporan['id_laporan'] ?>" method="POST"
                                id="formInput" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('nama') has-error has-feedback @enderror">
                                            <label for="nama">Nama :</label>
                                            <select class="form-select form-control" id="nama" name="nama"
                                                value="<?= $laporan['nama'] ?>">
                                                <option value="<?= $laporan['nama'] ?>" class="select">
                                                    <?= $laporan['nama'] ?>
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
                                        <div class="form-group @error('tanggal') has-error has-feedback @enderror">
                                            <label for="tanggal">Tanggal :</label>
                                            <input type="date" value="<?= $laporan['tanggal'] ?>" name="tanggal"
                                                class="form-control" id="tanggal" placeholder="Input Data......" />
                                            <small id="tanggal"
                                                class="form-text text-muted @error('tanggal') text-danger @enderror">
                                                @error('tanggal')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group @error('file') has-error has-feedback @enderror">
                                            <label for="file">File :</label>
                                            <input type="file" value="<?= $laporan['file'] ?>" name="file"
                                                class="form-control" id="file" placeholder="Input Data......" />
                                            <small id="file"
                                                class="form-text text-muted @error('file') text-danger @enderror">
                                                @error('file')
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
