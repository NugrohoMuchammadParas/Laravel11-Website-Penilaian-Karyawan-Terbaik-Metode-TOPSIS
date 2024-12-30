<x-user>
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
                                <h4 class="card-title">Data Karyawan</h4>
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
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Lahir</th>
                                            <th>Telepon</th>
                                            <th>Alamat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($karyawan as $data) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td class="dtr-control"><?= $data['nama'] ?></td>
                                            <td class="dtr-control"><?= $data['lahir'] ?></td>
                                            <td class="dtr-control"><?= $data['telepon'] ?></td>
                                            <td class="dtr-control"><?= $data['alamat'] ?></td>
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
</x-user>
