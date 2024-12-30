<x-admin>
    <x-slot:profile>{{ $profile }}</x-slot:profile>
    <x-slot:halaman>{{ $halaman }}</x-slot:halaman>
    <x-slot:logout>{{ $logout }}</x-slot:logout>
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data Laporan</h4>
                                <button class="btn btn-black btn-round ms-auto btn-sm" id="tambah"
                                    data-pages="<?= $tambah ?>">
                                    <i class="fa fa-plus"></i>
                                    Tambah
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php if (session('data_flash')): ?>
                            <script>
                                function myFunction() {
                                    var placementFrom = 'top';
                                    var placementAlign = 'right';
                                    var state = '<?= session('data_flash.state') ?>';
                                    var style = 'withicon';
                                    var content = {};

                                    content.message = '<?= session('data_flash.message') ?>';
                                    content.title = '<?= session('data_flash.title') ?>';
                                    content.icon = '<?= session('data_flash.icon') ?>';
                                    content.url = '';
                                    content.target = "_blank";

                                    $.notify(content, {
                                        type: state,
                                        placement: {
                                            from: placementFrom,
                                            align: placementAlign,
                                        },
                                        time: 1000,
                                        delay: 5000,
                                        animate: {
                                            enter: 'animated fadeInDown',
                                            exit: 'animated fadeOutUp'
                                        }
                                    });
                                }

                                window.onload = myFunction;
                            </script>
                            <?php endif; ?>
                            <div class="table-responsive">
                                <table id="viewTable" class="table">
                                    <thead>
                                        <tr>
                                            <th style="width: 8%">No</th>
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th>File</th>
                                            <th style="width: 33%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($laporan as $data) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $data['nama'] ?></td>
                                            <td><?= $data['tanggal'] ?></td>
                                            <td><?= $data['file'] ?></td>
                                            <td style="justify-content: center;">
                                                <button type="button" class="btn-round btn btn-black btn-sm ubah"
                                                    id="ubah" data-id="<?= $data['id_laporan'] ?>"
                                                    data-pages="<?= $ubah ?>">
                                                    <i class="fas fa-edit"></i>
                                                    Ubah
                                                </button>
                                                <button type="button" class="btn-round btn btn-black btn-sm download"
                                                    style="margin-left: 5px; margin-right: 5px;" id="download"
                                                    data-id="<?= $data['id_laporan'] ?>" data-pages="<?= $download ?>">
                                                    <i class="fas fa-download"></i>
                                                    Unduh
                                                </button>
                                                <button type="button" class="btn-round btn btn-black btn-sm hapus"
                                                    id="hapus" data-id="<?= $data['id_laporan'] ?>"
                                                    data-pages="<?= $hapus ?>">
                                                    <i class="fas fa-trash-alt"></i>
                                                    Hapus
                                                </button>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
