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
                            <div class="card-title">Ubah Data Kriteria</div>
                        </div>
                        <div class="card-body">
                            <form action="/admin-kriteria-ubah-data/<?= $kriteria['id_kriteria'] ?>" method="POST"
                                id="formInput" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('kriteria') has-error has-feedback @enderror">
                                            <label for="kriteria">Kriteria :</label>
                                            <input type="text" value="<?= $kriteria['kriteria'] ?>" name="kriteria"
                                                class="form-control" id="kriteria" placeholder="Input Data......" />
                                            <small id="kriteria"
                                                class="form-text text-muted @error('kriteria') text-danger @enderror">
                                                @error('kriteria')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group @error('keterangan') has-error has-feedback @enderror">
                                            <label for="keterangan">Keterangan :</label>
                                            <input type="text" value="<?= $kriteria['keterangan'] ?>"
                                                name="keterangan" class="form-control" id="keterangan"
                                                placeholder="Input Data......" />
                                            <small id="keterangan"
                                                class="form-text text-muted @error('keterangan') text-danger @enderror">
                                                @error('keterangan')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group @error('bobot') has-error has-feedback @enderror">
                                            <label for="bobot">Bobot :</label>
                                            <input type="text" value="<?= $kriteria['bobot'] ?>" name="bobot"
                                                class="form-control" id="bobot" placeholder="Input Data......" />
                                            <small id="bobot"
                                                class="form-text text-muted @error('bobot') text-danger @enderror">
                                                @error('bobot')
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
