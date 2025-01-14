<?php
$simAkademik_5 = "active";
$pageName = 'transaksi';
?>
<?php
$query_kelas = "SELECT * FROM tb_kelas";
$stmt_kelas = $pdo->prepare($query_kelas);
$stmt_kelas->execute();
$kelas_list = $stmt_kelas->fetchALL(PDO::FETCH_ASSOC);
?>
<?php
$kelas_siswa = "Semua Kelas"; // Default value
$kelas_query = ""; // Default query

if (isset($_SESSION['user']) && $_SESSION['role'] === 'walikelas') {
    $query_wali = "SELECT k.nama_kelas FROM tb_walikelas w LEFT JOIN tb_kelas k ON k.id_kelas = w.id_kelas WHERE w.id_user = :id_user";
    $stmt_wali = $pdo->prepare($query_wali);
    $stmt_wali->bindParam(':id_user', $_SESSION['id'], PDO::PARAM_INT);
    $stmt_wali->execute();
    $d_wali = $stmt_wali->fetch(PDO::FETCH_ASSOC);
    $kelas_siswa = $d_wali['nama_kelas'] ?? "Semua Kelas";

    $kelas_query = "WHERE k.nama_kelas = '$kelas_siswa'";
} elseif (isset($_POST['kelas_siswa'])) {
    $kelas_siswa = $_POST['kelas_siswa'];
    $kelas_query = ("$kelas_siswa" != "Semua Kelas") ? "WHERE k.nama_kelas = '$kelas_siswa'" : "";
}
?>
<!-- Main -->
<main id="main" class="main">

    <div class="pagetitle d-flex align-items-center">
        <span class="col-sm-6">
            <h1>Data Transaksi</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="?page=dashboard">Home</a></li>
                    <li class="breadcrumb-item">Sim Akademik</li>
                    <li class="breadcrumb-item active">Data Transaksi</li>
                </ol>
            </nav>
        </span>
        <span class="col-sm-3 fs-5"><?php echo $kelas_siswa; ?></span>
        <?php
        if (isset($_SESSION['user']) && in_array($_SESSION['role'], ['admin', 'petugas', 'wakasek'])) {
        ?>
            <form class="col-sm-3" action="?page=<?php echo $pageName ?>" method="post">
                <select class="form-select" name="kelas_siswa" id="kelas_siswa" onchange="this.form.submit()">
                    <option value="" disabled selected>-- Pilih Kelas --</option>
                    <option value="Semua Kelas">Semua Kelas</option>
                    <?php foreach ($kelas_list as $kelas) { ?>
                        <option value="<?php echo $kelas['nama_kelas']; ?>"><?php echo $kelas['nama_kelas']; ?></option>
                    <?php } ?>
                </select>
            </form>
        <?php }
        ?>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="table-responsive text-nowrap">
                        <table id="dataTableTransaksi" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                if ($_SESSION['role'] == 'siswa') {
                                    $sqlSiswa = "SELECT s.nis, s.nama, k.nama_kelas FROM tb_siswa s LEFT JOIN tb_kelas k ON s.id_kelas = k.id_kelas WHERE nis = :nis";
                                    $stmt = $pdo->prepare($sqlSiswa);
                                    $stmt->bindParam(':nis', $_SESSION['id'], PDO::PARAM_STR);
                                    $stmt->execute();
                                } else {
                                    $sqlSiswa = "SELECT s.nis, s.nama, k.nama_kelas FROM tb_siswa s LEFT JOIN tb_kelas k ON s.id_kelas = k.id_kelas $kelas_query";
                                    $stmt = $pdo->query($sqlSiswa);
                                }

                                $no = 1;
                                foreach ($stmt as $siswa) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo htmlspecialchars($siswa['nis']); ?></td>
                                        <td><?php echo htmlspecialchars($siswa['nama']); ?></td>
                                        <td><?php echo htmlspecialchars($siswa['nama_kelas']); ?></td>
                                        <td>
                                            <a href="?page=<?php echo $pageName ?>&alert=info_nilai&nis=<?php echo $siswa['nis']; ?>" class="btn btn-primary"><i class="bi bi-file-earmark-bar-graph-fill" style="color: white;"></i></a>
                                            <a href="?page=<?php echo $pageName ?>&alert=info_bayar&nis=<?php echo $siswa['nis']; ?>" class="btn btn-success"><i class="bi bi-cash" style="color: white"></i></a>

                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- NILAI -->
        <?php include "nilai.php"; ?>
        <!-- NILAI -->


        <!-- BAYAR -->
        <?php include "bayar.php"; ?>
        <!-- BAYAR -->


</main>
<!-- Main -->


<script>
    $(document).ready(function() {
        var table = $('#dataTableTransaksi').DataTable({
            dom: '<"d-flex justify-content-between align-items-center px-3 py-3"Brf>t<"d-flex justify-content-between align-items-center px-3 py-3"lip>',
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search for records...",
                lengthMenu: "Show _MENU_ entries",
                info: "Showing _START_ to _END_ of _TOTAL_ entries",
                paginate: {
                    previous: "Previous",
                    next: "Next",
                },
            },
            buttons: [{
                    extend: 'excelHtml5',
                    text: 'Export to Excel',
                    title: function() {
                        var currentPage = table.page.info().page + 1;
                        return 'Data Excel - Page ' + currentPage;
                    },
                    exportOptions: {
                        modifier: {
                            page: 'current',
                        },
                    },
                },
                {
                    extend: 'pdfHtml5',
                    text: 'Export to PDF',
                    title: function() {
                        var currentPage = table.page.info().page + 1;
                        return 'Data PDF - Page ' + currentPage;
                    },
                    exportOptions: {
                        modifier: {
                            page: 'current',
                        },
                    },
                },
                {
                    extend: 'print',
                    text: 'Print',
                    title: function() {
                        var currentPage = table.page.info().page + 1;
                        return 'Print - Data for Page ' + currentPage;
                    },
                    exportOptions: {
                        modifier: {
                            page: 'current',
                        },
                    },
                },
            ],
            paging: true,
            lengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 100],
            ],
            pageLength: 10,
            createdRow: function(row, data, dataIndex) {
                // Center-align text in each cell
                $(row).find('td').css('text-align', 'center');
            },
            columnDefs: [{
                targets: '_all', // Target all columns
                className: 'text-center', // Add center alignment to header
            }, ],
        });

        // Add custom paging filter dropdown
        $('#pagingFilter').on('change', function() {
            var pageLength = $(this).val();
            table.page.len(pageLength).draw();
        });
    });
</script>