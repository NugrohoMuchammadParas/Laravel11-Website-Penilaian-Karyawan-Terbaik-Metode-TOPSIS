<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Metode TOPSIS</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="/assets/img/favicons/favicon.ico" type="image/x-icon" />

    <script src="/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["/assets/css/fonts.min.css"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <link rel="stylesheet" href="/assets/table/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/table/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/table/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/css/plugins.min.css" />
    <link rel="stylesheet" href="/assets/css/kaiadmin.min.css" />
</head>

<body>
    <div class="wrapper">
        <script>
            window.onload = function() {
                window.print();
            };
        </script>
        <div class="container-fluid">
            <div class="page-inner">
                <div class="row mt-5">
                    <div class="col text-center">
                        <h1 class="font-weight-bold">KARYAWAN TERBAIK METODE TOPSIS</h1>
                        <h5 class="font-weight-bold">Algorithm Web Store</h5>
                    </div>
                </div>
                <div class="row pb-4">
                    <div class="col text-center">
                        <h5 class="font-weight-bold"><?php echo date('l, d F Y'); ?></h5>
                    </div>
                    <br>
                    <div class="row mt-5">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">DATA SETIAP ALTERNATIF</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table viewTable">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Kinerja</th>
                                                    <th>Komunikasi</th>
                                                    <th>Kerjasama</th>
                                                    <th>Kreativitas</th>
                                                    <th>Disiplin</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($alternatif as $data) : ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td><?= $data['nama'] ?></td>
                                                    <td><?= $data['kinerja'] ?></td>
                                                    <td><?= $data['komunikasi'] ?></td>
                                                    <td><?= $data['kerjasama'] ?></td>
                                                    <td><?= $data['kreativitas'] ?></td>
                                                    <td><?= $data['disiplin'] ?></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">DATA SETIAP PEMBAGI ALTERNATIF</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table viewTable">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Kinerja</th>
                                                    <th>Komunikasi</th>
                                                    <th>Kerjasama</th>
                                                    <th>Kreativitas</th>
                                                    <th>Disiplin</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($pembagi as $data) : ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td>PEMBAGI</td>
                                                    <td><?= $data['kinerja'] ?></td>
                                                    <td><?= $data['komunikasi'] ?></td>
                                                    <td><?= $data['kerjasama'] ?></td>
                                                    <td><?= $data['kreativitas'] ?></td>
                                                    <td><?= $data['disiplin'] ?></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">DATA MATRIX TERNOMALISASI TERBOBOT R</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table viewTable">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Kinerja</th>
                                                    <th>Komunikasi</th>
                                                    <th>Kerjasama</th>
                                                    <th>Kreativitas</th>
                                                    <th>Disiplin</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($terbobot_r as $data) : ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td><?= $data['nama'] ?></td>
                                                    <td><?= $data['kinerja'] ?></td>
                                                    <td><?= $data['komunikasi'] ?></td>
                                                    <td><?= $data['kerjasama'] ?></td>
                                                    <td><?= $data['kreativitas'] ?></td>
                                                    <td><?= $data['disiplin'] ?></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">DATA MATRIX TERNOMALISASI TERBOBOT Y</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table viewTable">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Kinerja</th>
                                                    <th>Komunikasi</th>
                                                    <th>Kerjasama</th>
                                                    <th>Kreativitas</th>
                                                    <th>Disiplin</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($terbobot_y as $data) : ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td><?= $data['nama'] ?></td>
                                                    <td><?= $data['kinerja'] ?></td>
                                                    <td><?= $data['komunikasi'] ?></td>
                                                    <td><?= $data['kerjasama'] ?></td>
                                                    <td><?= $data['kreativitas'] ?></td>
                                                    <td><?= $data['disiplin'] ?></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">SOLUSI IDEAL POSITIF A+</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table viewTable">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Kinerja</th>
                                                    <th>Komunikasi</th>
                                                    <th>Kerjasama</th>
                                                    <th>Kreativitas</th>
                                                    <th>Disiplin</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($ideal_positif as $data) : ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td>A+</td>
                                                    <td><?= $data['kinerja'] ?></td>
                                                    <td><?= $data['komunikasi'] ?></td>
                                                    <td><?= $data['kerjasama'] ?></td>
                                                    <td><?= $data['kreativitas'] ?></td>
                                                    <td><?= $data['disiplin'] ?></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">SOLUSI IDEAL NEGATIF A-</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table viewTable">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Kinerja</th>
                                                    <th>Komunikasi</th>
                                                    <th>Kerjasama</th>
                                                    <th>Kreativitas</th>
                                                    <th>Disiplin</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($ideal_negatif as $data) : ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td>A-</td>
                                                    <td><?= $data['kinerja'] ?></td>
                                                    <td><?= $data['komunikasi'] ?></td>
                                                    <td><?= $data['kerjasama'] ?></td>
                                                    <td><?= $data['kreativitas'] ?></td>
                                                    <td><?= $data['disiplin'] ?></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">JARAK TERBOBOT IDEAL D+</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table viewTable">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($jarak_positif as $data) : ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td><?= $data['nama'] ?></td>
                                                    <td><?= $data['nilai'] ?></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">JARAK TERBOBOT IDEAL D-</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table viewTable">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($jarak_negatif as $data) : ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td><?= $data['nama'] ?></td>
                                                    <td><?= $data['nilai'] ?></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">PERANGKINGAN</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table viewTable">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Nilai</th>
                                                    <th>Rank</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($penilaian as $data) : ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td><?= $data['nama'] ?></td>
                                                    <td><?= $data['nilai'] ?></td>
                                                    <td><?= $data['rank'] ?></td>
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
        </div>

        <script src="/assets/js/core/jquery-3.7.1.min.js"></script>
        <script src="/assets/js/core/popper.min.js"></script>
        <script src="/assets/js/core/bootstrap.min.js"></script>
        <script src="/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
        <script src="/assets/js/plugin/chart.js/chart.min.js"></script>
        <script src="/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>
        <script src="/assets/js/plugin/chart-circle/circles.min.js"></script>
        <script src="/assets/js/plugin/datatables/datatables.min.js"></script>
        <script src="/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
        <script src="/assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
        <script src="/assets/js/plugin/jsvectormap/world.js"></script>
        <script src="/assets/js/plugin/sweetalert/sweetalert.min.js"></script>
        <script src="/assets/js/kaiadmin.min.js"></script>
        <script src="/assets/js/setting-demo.js"></script>
        <script src="/assets/table/datatables/jquery.dataTables.min.js"></script>
        <script src="/assets/table/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="/assets/table/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="/assets/table/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="/assets/table/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="/assets/table/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="/assets/table/jszip/jszip.min.js"></script>
        <script src="/assets/table/pdfmake/pdfmake.min.js"></script>
        <script src="/assets/table/pdfmake/vfs_fonts.js"></script>
        <script src="/assets/table/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="/assets/table/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="/assets/table/datatables-buttons/js/buttons.colVis.min.js"></script>

        <script>
            $(function() {
                $('.viewTable').DataTable({
                    "paging": false,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": false,
                    "info": false,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                $("#basic-datatables").DataTable({});

                $("#multi-filter-select").DataTable({
                    pageLength: 5,
                    initComplete: function() {
                        this.api()
                            .columns()
                            .every(function() {
                                var column = this;
                                var select = $(
                                        '<select class="form-select"><option value=""></option></select>'
                                    )
                                    .appendTo($(column.footer()).empty())
                                    .on("change", function() {
                                        var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                        column
                                            .search(val ? "^" + val + "$" : "", true, false)
                                            .draw();
                                    });

                                column
                                    .data()
                                    .unique()
                                    .sort()
                                    .each(function(d, j) {
                                        select.append(
                                            '<option value="' + d + '">' + d + "</option>"
                                        );
                                    });
                            });
                    },
                });

                // Add Row
                $("#add-row").DataTable({
                    pageLength: 5,
                });

                var action =
                    '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

                $("#addRowButton").click(function() {
                    $("#add-row")
                        .dataTable()
                        .fnAddData([
                            $("#addName").val(),
                            $("#addPosition").val(),
                            $("#addOffice").val(),
                            action,
                        ]);
                    $("#addRowModal").modal("hide");
                });
            });
        </script>

</body>

</html>
