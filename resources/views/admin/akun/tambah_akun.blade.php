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
                            <div class="card-title">Tambah Data Akun</div>
                        </div>
                        <div class="card-body">
                            <form action="admin-akun-tambah-data" method="POST" id="formInput"
                                enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('username') has-error has-feedback @enderror">
                                            <label for="username">Username :</label>
                                            <input type="text" name="username" class="form-control" id="username"
                                                placeholder="Input Data......" />
                                            <small id="username"
                                                class="form-text text-muted @error('username') text-danger @enderror">
                                                @error('username')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group @error('password') has-error has-feedback @enderror">
                                            <label for="password">Password :</label>
                                            <input type="password" name="password" class="form-control" id="password"
                                                placeholder="Input Data......" />
                                            <small id="password"
                                                class="form-text text-muted @error('password') text-danger @enderror">
                                                @error('password')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group @error('nama') has-error has-feedback @enderror">
                                            <label for="nama">Nama :</label>
                                            <input type="text" name="nama" class="form-control" id="nama"
                                                placeholder="Input Data......" />
                                            <small id="nama"
                                                class="form-text text-muted @error('nama') text-danger @enderror">
                                                @error('nama')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group @error('file') has-error has-feedback @enderror">
                                            <label for="file">File :</label>
                                            <input type="file" name="file" class="form-control" id="file"
                                                placeholder="Input Data......" />
                                            <small id="file"
                                                class="form-text text-muted @error('file') text-danger @enderror">
                                                @error('file')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group @error('level') has-error has-feedback @enderror">
                                            <label for="level">Level :</label>
                                            <select class="form-select form-control" id="level" name="level">
                                                <option class="select" disabled>Pilih Data</option>
                                                <option value="admin">Admin</option>
                                                <option value="user">User</option>
                                            </select>
                                            <small id="level"
                                                class="form-text text-muted @error('level') text-danger @enderror">
                                                @error('level')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group @error('status') has-error has-feedback @enderror">
                                            <label for="status">Status :</label>
                                            <select class="form-select form-control" id="status" name="status">
                                                <option class="select" disabled>Pilih Data</option>
                                                <option value="active">Active</option>
                                                <option value="nonactive">Non Active</option>
                                            </select>
                                            <small id="status"
                                                class="form-text text-muted @error('status') text-danger @enderror">
                                                @error('status')
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
                                            id="simpan_tambah"><i class="fas fa-download"></i> Simpan</button>
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
