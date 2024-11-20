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
<!-- Main -->
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Transaksi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="?page=dashboard">Home</a></li>
                <li class="breadcrumb-item">Sim Akademik</li>
                <li class="breadcrumb-item active">Data Transaksi</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
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
                                $sqlSiswa = "SELECT s.nis, s.nama, k.nama_kelas FROM tb_siswa s LEFT JOIN tb_kelas k ON s.id_kelas = k.id_kelas";
                                $stmt = $pdo->query($sqlSiswa);
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